
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li><a href="./product">Quản lý sản phẩm</a></li>
            <li class="active">Sửa sản phẩm</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa sản phẩm</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-6">
                        <?php $row = $data["data"]; ?>
                        <form role="form" method="post" action="./product/edit/<?php echo $row['prd_id']; ?>" enctype="multipart/form-data">
                            <?php 
                            if (isset($data['mess'])) {
                                ?>
                                <div class="alert alert-danger">Sản phẩm đã tồn tại. Mời bạn nhập lại.</div>
                                <?php
                            }
                            
                            ?>
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input required name="prd_name" id="prd_name" class="form-control" placeholder="" value="<?php echo $row["prd_name"]; ?>"> 
                            </div>
                            <div id="message" style="color: red;"></div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input required name="prd_price" type="number" min="0" value="<?php echo $row["prd_price"]; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Bảo hành</label>
                                <input required name="prd_warranty" value="<?php echo $row["prd_warranty"]; ?>" type="text" class="form-control">
                            </div>    
                            <div class="form-group">
                                <label>Phụ kiện</label>
                                <input required name="prd_accessories" value="<?php echo $row["prd_accessories"]; ?>" type="text" class="form-control">
                            </div>                  
                            <div class="form-group">
                                <label>Khuyến mãi</label>
                                <input required name="prd_promotion" value="<?php echo $row["prd_promotion"]; ?>" type="text" class="form-control">
                            </div>  

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ảnh sản phẩm</label>

                                <input name="prd_image" value="<?php echo $row["prd_image"]; ?>" type="file"> 
                                <br>
                                <div>
                                    <img src="./public/image/<?php echo $row["prd_image"]; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select name="cat_id" class="form-control">

                                    <?php
                                    $rows = $data["data_cat"];
                                    foreach ($data['all_cat'] as $row_cat) 
                                    // while ($row_cat = mysqli_fetch_array($data["all_cat"])) 
                                    {

                                        ?>
                                        <option <?php if($rows['cat_id'] == $row_cat['cat_id']){echo 'selected';} ?> value=<?php echo $row_cat['cat_id']; ?>><?php echo $row_cat['cat_name']; ?></option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Mô tả sản phẩm</label>
                                <textarea required name="prd_details" class="form-control" rows="3"><?php echo $row['prd_details']; ?></textarea>
                            </div>
                            <button name="sbm" type="submit" class="btn btn-success">Cập Nhập</button>
                            <!-- <button type="reset" class="btn btn-default">Làm mới</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div>  <!--/.main-->   