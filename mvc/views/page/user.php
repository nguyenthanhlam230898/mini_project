<script type="text/javascript">
    function mess_add(){
        alert("Bạn không có quyền thêm user");
    }
    function mess_edit(){
        alert("Bạn không có quyền sửa user");
    }
    function mess_del(){
        alert("Bạn không có quyền Delete user");
    }
</script>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                <use xlink:href="#stroked-home"></use>
            </svg></a></li>
            <li class="active">Danh sách thành viên</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách thành viên</h1>
        </div>
    </div>
    <!--/.row-->
    <div id="toolbar" class="btn-group">
        <a href="./user/add" onclick="<?php if(isset($data['result'])){ echo "mess_add()";} ?>" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Thêm thành viên
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
                                <th data-field="name" data-sortable="true">Họ & Tên</th>
                                <th data-field="price" data-sortable="true">Email</th>
                                <th>Quyền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                            foreach ($data["data"] as $value)
                            {
                                ?>
                                

                                <tr>
                                    <td ><?php echo $value["user_id"]; ?></td>
                                    <td ><?php echo $value["user_full"]; ?></td>
                                    <td><?php echo $value["user_mail"]; ?></td>
                                    <td><span class="label <?php if($value['user_level']==1){echo "label-danger";}else{echo 'label-success';} ?>">
                                        <?php
                                        if($value["user_level"] == 1){
                                            echo "admin";
                                        }else{
                                            echo "member";
                                        }
                                        ?>
                                    </span></td>
                                    <td class="form-group">
                                        <a href="./user/edit/<?php echo $value["user_id"]; ?>" onclick="<?php if(isset($data['result_edit'])){ echo "mess_edit()";} ?>" class="btn btn-primary">edit</a>
                                        <a href="./user/delete/<?php echo $value["user_id"]; ?>" onclick="<?php if(isset($data['result_del'])){ echo "mess_del()";} ?>" class="btn btn-danger">Delete</i></a>
                                    </td>
                                </tr>
                            <?php } ?>
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
<!--/.main-->

<script src="./public/js/jquery-1.11.1.min.js"></script>
<script src="./public/js/bootstrap.min.js"></script>
<script src="./public/js/bootstrap-table.js"></script>