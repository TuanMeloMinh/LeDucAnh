<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Thêm mã giảm giá</h5>
                    <p style="color:red;">
                        <?php echo $message??""; ?>
                    </p>
                </div>
                <i style="color:red;">
                </i>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Mã giảm giá</label>
                                    <input type="text" class="form-control" placeholder="Code" value="<?php echo $code??""; ?>" name="code">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Phần trăm giảm</label>
                                    <input type="number" class="form-control" placeholder="%" name="percent" min="0" max="100" value="<?php echo $percent??""; ?>">
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-danger">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>