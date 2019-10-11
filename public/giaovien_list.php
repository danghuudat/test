<?php
session_start();
if(!isset($_SESSION['user_name'])){
    header("location:dangnhap.php");
}
include('../controller/c_bomon.php');
include('../controller/c_giaovien.php');

$c_bomon=new C_bomon();
$bomon=$c_bomon->getListBomon();
$listBomon=$bomon['bomon'];
$c_giaovien=new C_giaovien();
if(isset($_POST['tengv'])){
    $isExist=$c_giaovien->check($_POST['magv']);
    if($isExist['isExist']==false){
        $newgv=$c_giaovien->add($_POST['magv'],$_POST['tengv'],$_POST['bomon']);
    }
    else{
        $exist="Giáo viên đã tồn tại";
    }
}
$giaovien=$c_giaovien->getList();
$listGiaovien=$giaovien['giaovien'];
if(isset($_GET['deleteid'])){
    $newgiaovien=$c_giaovien->delete($_GET['deleteid']);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Quản lý đồ án</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Trang chủ</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">



            <ul class="nav navbar-nav pull-right">
                <?php
                if(isset($_SESSION['user_name'])){
                    ?>
                    <li>
                        <a>
                            <span class ="glyphicon glyphicon-user"></span>
                            <?php echo $_SESSION['user_name']; ?>
                        </a>
                    </li>

                    <li>
                        <a href="logout.php">Đăng xuất</a>
                    </li>

                    <?php
                }
                else{
                    ?>

                    ?>
                    <li>
                        <a href="dangnhap.php">Đăng nhập</a>
                    </li>
                    <?php
                }
                ?>



            </ul>
        </div>



        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">

    <!-- slider -->
    <div class="row carousel-holder">
        <div class="col-md-12">
            <div>
                <img src="image/800x300.png" style="width: 100%;height: 300px">
            </div>
        </div>
    </div>
    <!-- end slide -->

    <div class="space20"></div>


    <div class="row main-left">
        <div class="col-md-3 ">
            <ul class="list-group" id="menu">
                <li  class="list-group-item menu1">
                    <a href="khoa_list.php">Khoa</a>
                </li>
                <li  class="list-group-item menu1">
                    <a href="nganh_list.php">Ngành</a>
                </li>
                <li class="list-group-item menu1">
                    <a href="bomon_list.php">Bộ môn</a>
                </li>
                <li class="list-group-item menu1">
                    <a href="sinhvien_list.php">Sinh viên</a>
                </li>
                <li class="list-group-item menu1">
                    <a href="giaovien_list.php">Giáo viên</a>
                </li>
                <li class="list-group-item menu1">
                    <a href="khoaluan_list.php">Khóa luận</a>
                </li>
            </ul>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h2 style="margin-top:0px; margin-bottom:0px;"> Danh sách giáo viên </h2>
                </div>
            </div>
            <div class="panel-body" style="box-sizing: border-box;border: 1px solid rgb(221,221,221)">
                <table id="khoaTable" class="table table-striped table-bordered" cellspacing="0" >
                    <thead>
                    <tr>
                        <td>STT</td>
                        <td>Mã giáo viên</td>
                        <td>Tên giáo viên</td>
                        <td>Tên bộ môn</td>
                        <td></td>
                        <td></td>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=1;
                    foreach ($listGiaovien as $record){
                        echo"<tr>";
                        echo"<td>".$i."</td>";
                        echo"<td>".$record->magiaovien."</td>";
                        echo"<td>".$record->tengiaovien."</td>";
                        echo"<td>".$record->bomon."</td>";

                        echo"<td><a href='giaovien_update.php?id=".$record->giaovien_id."'>update</a></td>";
                        echo"<td><a href='giaovien_list.php?deleteid=".$record->giaovien_id."'>delete</a></td>";

                        echo"</tr>";
                        $i++;
                    }
                    ?>
                    </tbody>
                </table>

            </div>
            <div class="panel-body" style="box-sizing: border-box;border: 1px solid rgb(221,221,221)">
                <?php
                if (isset($exist)){
                    echo"<div class='alert alert-danger'>Giáo viên tồn tại</div>";
                }
                ?>

                <form method="POST" action="giaovien_list.php">
                    <label for="tengv">Tên giáo viên</label>
                    <input class="form-control" type="text" name="tengv" id="tengv" placeholder="Tên giáo viên" required><br>
                    <label for="magv">Mã giáo viên</label>
                    <input class="form-control" type="text" name="magv" id="magv" placeholder="Mã giáo viên" required><br>
                    <select name="bomon" class="form-control">
                        <?php
                            foreach ($listBomon as $bm){
                                echo"<option value='".$bm->ID."'>".$bm->name."</option>";
                            }
                        ?>
                    </select>
                    <br>
                    <button type="submit" class="btn">Thêm giáo viên</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- end Page Content -->

<!-- Footer -->
<hr>
<footer>
    <div class="row">
        <div class="col-md-12">
            <p>Copyright &copy; Your Website 2014</p>
        </div>
    </div>
</footer>
<!-- end Footer -->
<!-- jQuery -->
<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/my.js"></script>

</body>
<script>
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        // DataTable
        var table = $('#khoaTable').DataTable();

        // Apply the search
    } );
</script>
</html>
