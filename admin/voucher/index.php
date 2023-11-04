<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DANH SÁCH VOUCHER</h3>
                    <a href="./giamgia/them">
                        <i class="now-ui-icons ui-1_simple-add"></i> Thêm 
                    </a><br>
                    <i style="color: red;">
                    <?php echo $message??""; ?>
                    </i>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" style="overflow: hidden; font-family:times">
                            <thead class=" text-primary">
                                <tr>
                                    <th  style="color:black">
                                        STT
                                    </th>
                                    <th  style="color:black">
                                        Mã
                                    </th>
                                    <th  style="color:black">
                                        Giảm giá
                                    </th>
                                    <th  style="color:black">
                                        Trạng thái
                                    </th>
                                    <th  style="color:black">
                                        Chức năng
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach($allVoucher as $key => $value){
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $key + 1; ?>
                                    </td>
                                    <td>
                                        <?php echo $value['Code']; ?>
                                    </td>
                                    <td>
                                        <?php echo $value['Percent']; ?>
                                    </td>
                                    <td>
                                        <?php echo $value['isUse']==0?"Bật":"Tắt"; ?>
                                    </td>
                                    <td>
                                    <div class="btn-group dropleft" style="position: static;">
                                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:blue">
                                                Chức năng
                                            </button>
                                            <div class="dropdown-menu">
                                                <?php if($value['isUse'] == 1){ ?>
                                                <a style="color: black;" href="./giamgia/bat/<?php echo $value['ID']; ?>"><button class="dropdown-item" type="button">Bật</button></a>
                                                <?php }else{ ?>
                                                <a style="color: black;" href="./giamgia/tat/<?php echo $value['ID']; ?>"><button class="dropdown-item" type="button">Tắt</button></a>
                                                <?php } ?>
                                                <a style="color: black;" href="./giamgia/sua/<?php echo $value['ID']; ?>"><button class="dropdown-item" type="button">Sửa</button></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>