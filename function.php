<?php
function deleteChildrenMenu($parent_id,$menuList,$con){
    foreach($menuList as $item){
        if($item['parent_id'] == $parent_id){
            deleteChildrenMenu($item['id'],$menuList,$con);
            mysqli_query($con, "DELETE FROM `menu` WHERE `id` = " . $item['id']);
        }
    }
}
function showMenuSelectBox($list, $num, $parent_id) {
    $num++;
    foreach ($list as $item) {
        $selected = "";
        if($item['id'] == $parent_id){
            $selected = "selected";
        }
        echo "<option value='".$item['id']."' ".$selected.">" . str_repeat("---", $num - 1) . $item['name'] . "</option>";
        if (!empty($item['children'])) {
            showMenuSelectBox($item['children'], $num, $parent_id);
        }
    }
}

function showMenuTree($list, $num, $config_name) {
    $num++;
    foreach ($list as $item) {
        echo renderTemplate('admin/li-template.php', array('num' => $num, 'config_name' => $config_name, 'row' => $item));
        if (!empty($item['children'])) {
            showMenuTree($item['children'], $num, $config_name);
        }
    }
}

function renderTemplate($filePath, $params) {
    $output = "";
  
    extract($params);

    ob_start();

    include $filePath;

    $output = ob_get_clean();
    return $output;
}

function createMenuTree(&$menuList, $parent_id) {
    $menuTree = array();
    foreach ($menuList as $key => $menu) {
        if ($menu['parent_id'] == $parent_id) {
            $children = createMenuTree($menuList, $menu['id']);
            if ($children) {
                $menu['children'] = $children;
            }
            $menuTree[] = $menu;
            unset($menuList[$key]);
        }
    }
    return $menuTree;
}

function getAllFiles() {
    $allFiles = array();
    $allDirs = glob('uploads/*');
    foreach ($allDirs as $dir) {
        $allFiles = array_merge($allFiles, glob($dir . "/*"));
    }
    return $allFiles;
}

function uploadFiles($uploadedFiles) {
    $files = array();
    $errors = array();
    $returnFiles = array();
    foreach ($uploadedFiles as $key => $values) {
        if (is_array($values)) {
            foreach ($values as $index => $value) {
                $files[$index][$key] = $value;
            }
        } else {
            $files[$key] = $values;
        }
    }
    $uploadPath = "../uploads/" . date('d-m-Y', time());
    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }
    if (is_array(reset($files))) {
        foreach ($files as $file) {
            $result = processUploadFile($file, $uploadPath);
            if ($result['error']) {
                $errors[] = $result['message'];
            } else {
                $returnFiles[] = $result['path'];
            }
        }
    } else { 
        $result = processUploadFile($files, $uploadPath);
        if ($result['error']) {
            return array(
                'errors' => $result['message']
            );
        } else {
            return array(
                'path' => $result['path']
            );
        }
    }
    return array(
        'errors' => $errors,
        'uploaded_files' => $returnFiles
    );
}

function processUploadFile($file, $uploadPath) {
    $file = validateUploadFile($file, $uploadPath);
    if ($file != false) {
        $file["name"] = str_replace(' ', '_', $file["name"]);
        if (move_uploaded_file($file["tmp_name"], $uploadPath . '/' . $file["name"])) {
            return array(
                'error' => false,
                'path' => str_replace('../', '', $uploadPath) . '/' . $file["name"]
            );
        }
    } else {
        return array(
            'error' => false,
            'message' => "File tải lên " . basename($file["name"]) . " không hợp lệ."
        );
    }
}


function validateUploadFile($file, $uploadPath) {

    if ($file['size'] > 2 * 1024 * 1024) { 
        return false;
    }
    $validTypes = array("jpg", "jpeg", "png", "bmp", "xlsx", "xls");
    $fileType = strtolower(substr($file['name'], strrpos($file['name'], ".") + 1));
    if (!in_array($fileType, $validTypes)) {
        return false;
    }
    $num = 0;
    $fileName = substr($file['name'], 0, strrpos($file['name'], "."));
    while (file_exists($uploadPath . '/' . $fileName . '.' . $fileType)) {
        $fileName = $fileName . "(" . $num . ")";
        $num++;
    }
    if ($num != 0) {
        $fileName = substr($file['name'], 0, strrpos($file['name'], ".")) . "(" . $num . ")";
    } else {
        $fileName = substr($file['name'], 0, strrpos($file['name'], "."));
    }
    $file['name'] = $fileName . '.' . $fileType;
    return $file;
}

function loginFromSocialCallBack($socialUser) {
    include './connect_db.php';
    $result = mysqli_query($con, "Select `id`,`username`,`email`,`fullname` from `user` WHERE `email` ='" . $socialUser['email'] . "'");
    if ($result->num_rows == 0) {
        $result = mysqli_query($con, "INSERT INTO `user` (`fullname`,`email`, `status`, `created_time`, `last_updated`) VALUES ('" . $socialUser['name'] . "', '" . $socialUser['email'] . "', 1, " . time() . ", '" . time() . "');");
        if (!$result) {
            echo mysqli_error($con);
            exit;
        }
        $result = mysqli_query($con, "Select `id`,`username`,`email`,`fullname` from `user` WHERE `email` ='" . $socialUser['email'] . "'");
    }
    if ($result->num_rows > 0) {
        $user = mysqli_fetch_assoc($result);
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['current_user'] = $user;
        header('Location: ./login.php');
    }
}

function validateDateTime($date) {
    preg_match('/^[0-9]{1,2}-[0-9]{1,2}-[0-9]{4}$/', $date, $matches);
    if (count($matches) == 0) { 
        return false;
    }
    $separateDate = explode('-', $date);
    $day = (int) $separateDate[0];
    $month = (int) $separateDate[1];
    $year = (int) $separateDate[2];
    if ($month == 2) {
        if ($year % 4 == 0) {
            if ($day > 29) {
                return false;
            }
        } else { 
            if ($day > 28) {
                return false;
            }
        }
    }
    switch ($month) {
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            if ($day > 31) {
                return false;
            }
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            if ($day > 30) {
                return false;
            }
            break;
    }
    return true;
}

?>