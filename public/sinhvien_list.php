<?php
session_start();
if(!isset($_SESSION['user_name'])){
    header("location:dangnhap.php");
}
include('../controller/c_nganh.php');
include('../controller/c_khoa.php');
include('../controller/c_sinhvien.php');


$c_nganh= new C_nganh();
$nganh=$c_nganh->getList();
$listNganh=$nganh['nganh'];


$c_khoa=new C_khoa();
$khoa=$c_khoa->getListKhoa();
$listKhoa=$khoa['khoa'];

$c_sinhvien=new C_sinhvien();
$sinhvien=$c_sinhvien->getList();
$listSinhvien=$sinhvien['sinhvien'];
if(isset($_POST['tensinhvien'])){
    $isExist=$c_sinhvien->check($_POST['msv']);
    if($isExist['isExist']==false){
        $newsinhvien=$c_sinhvien->add($_POST['tensinhvien'],$_POST['msv'],$_POST['nganh']);
    }else{
        $exist="Trùng mã sinh viên";
    }
}
if(isset($_GET['deleteid'])){
    $newsinhvien=$c_sinhvien->delete($_GET['deleteid']);
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
                    <h2 style="margin-top:0px; margin-bottom:0px;"> Danh sách sinh viên </h2>
                </div>
            </div>
            <div class="panel-body" style="box-sizing: border-box;border: 1px solid rgb(221,221,221)">
                <table id="khoaTable" class="table table-striped table-bordered" cellspacing="0" >
                    <thead>
                    <tr>
                        <td>STT</td>
                        <td>Mã sinh viên</td>
                        <td>Tên sinh viên</td>
                        <td>Khoa</td>
                        <td>ngành</td>
                        <td></td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=1;
                    foreach ($listSinhvien as $record){
                        echo"<tr>";
                        echo"<td>".$i."</td>";
                        echo"<td>".$record->masv."</td>";

                        echo"<td>".$record->tensinhvien."</td>";

                        echo"<td>".$record->khoa."</td>";
                        echo"<td>".$record->nganh."</td>";

                        echo"<td><a href='sinhvien_update.php?id=".$record->sinhvien_id."'>update</a></td>";
                        echo"<td><a href='sinhvien_list.php?deleteid=".$record->sinhvien_id."'>delete</a></td>";

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
                    echo"<div class='alert alert-danger'>Mã sinh viên tồn tại</div>";
                }
                ?>

                <form method="POST" action="#">
                    <label for="tensinhvien">Tên sinh viên</label>
                    <input class="form-control" type="text" name="tensinhvien" id="tensinhvien" placeholder="Tên sinh viên" required><br>
                    <label for="msv">Mã sinh viên</label>
                    <input class="form-control" type="text" name="msv" id="msv" placeholder="Mã sinh viên" required><br>

                    <label for="khoa">Khoa</label>
                    <select name="khoa" class="form-control" onchange="changeNganh(this)">
                        <option value="=0"></option>
                        <?php
                        foreach ($listKhoa as $bm){
                            echo"<option value='".$bm->ID."'>".$bm->name."</option>";
                        }
                        ?>
                    </select>
                    <br>
                    <label for="nganh">Ngành</label>
                    <select name="nganh" class="form-control" id="nganh">
                        <option value="=0"></option>
                        <?php
                        foreach ($listNganh as $n){
                            echo"<option value='".$n->nganh_id."' style='display:none' parent_id='".$n->idkhoa."'>".$n->tennganh."</option>";
                        }
                        ?>
                    </select>

                    <br>
                    <button type="submit" class="btn">Thêm ngành</button>
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
    function changeNganh(o) {
        $("#nganh").find('option').css("display","none");
        $("#nganh").find('option[parent_id="'+$(o).val()+'"]').css("display","block");
    }
</script>
</html>
