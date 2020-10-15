
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Danh sách sản phẩm</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách sản phẩm</h1>
        </div>
    </div>
    <!--/.row-->
    <div id="toolbar" class="btn-group">
        <a href="./product/add" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
        </a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">

                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="name" data-sortable="true">Tên sản phẩm</th>
                                <th data-field="price" data-sortable="true">Giá</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Danh mục</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($data["data_product"] as $row)
                                {
                            ?>
                            <tr>
                                <td ><?php echo $row["prd_id"]; ?></td>
                                <td ><?php echo $row["prd_name"]; ?></td>
                                <td ><?php echo $row["prd_price"]; ?></td>
                                <td style="text-align: center"><img width="130" height="180" src="./public/image/<?php echo $row["prd_image"]; ?>" /></td>
                                <!-- <td><span class="label label-success"></span></td> -->
                                <td><?php echo $row['cat_name']; ?></td>
                                <td class="form-group">
                                    <a href="./product/edit/<?php echo $row["prd_id"]; ?>" class="btn btn-primary"><i style="margin-right: 10px;">Update</i></a>
                                    <a onclick="return confirm('Bạn có chắn chắn xóa ?')" href="./product/delete/<?php echo $row["prd_id"]; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove" style="margin-right: 10px;">Delete</i></a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<script src="./public/js/jquery-1.11.1.min.js" /></script>
<script src="./public/js/bootstrap.min.js" /></script>
<script src="./public/js/bootstrap-table.js" /></script>