<?php
session_start();
if(!isset($_SESSION['user_name'])){
    header("location:dangnhap.php");
}
include('../controller/c_nganh.php');
include('../controller/c_khoa.php');
include('../controller/c_khoaluan.php');
include('../controller/c_sinhvien.php');
include('../controller/c_giaovien.php');

$c_nganh= new C_nganh();
$nganh=$c_nganh->getList();
$listNganh=$nganh['nganh'];


$c_khoa=new C_khoa();
$khoa=$c_khoa->getListKhoa();
$listKhoa=$khoa['khoa'];

$c_khoaluan = new C_khoaluan();
$khoaluan= $c_khoaluan->getDetail($_GET['id']);

$khoaluan_detail=$khoaluan['khoaluan'];


$c_sinhvien=new C_sinhvien();
$sinhvien=$c_sinhvien->getList();
$listSinhVien=$sinhvien['sinhvien'];

$c_giaovien=new C_giaovien();
$giaovien=$c_giaovien->getList();
$listGiaovien=$giaovien['giaovien'];

if(isset($_POST['sinhvien'])){
    $isExist=$c_khoaluan->checkforupdate($_POST['sinhvien'],$_POST['id']);

    if($isExist['isExist']==false){
        $newkhoaluan=$c_khoaluan->update($_POST['detai'],$_POST['sinhvien'],$_POST['giaovien'],$_POST['bailam'],$_POST['diem'],$_POST['id']);
    }
    else{
        $exist="sinh viên đã làm khóa luận";
    }
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
            <div class="col-md-9">
                <?php
                if(isset($exist)){
                    echo "<div class='alert alert-danger'>Sinh viên đã làm khóa luận</div>";
                }
                ?>
                <form method="POST" action="#">
                    <input name="id" type="hidden" value="<?php echo $khoaluan_detail->ID;?>">

                    <label for="sinhvien">Sinh viên </label>
                    <select name="sinhvien" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                        <?php
                        foreach ($listSinhVien as $sv){
                            if($sv->tensinhvien==$khoaluan_detail->sinhvien){
                                echo"<option value='".$sv->sinhvien_id."' data-subtext='".$sv->tensinhvien."' selected>".$sv->masv."</option>";

                            }
                            else{
                                echo"<option value='".$sv->sinhvien_id."' data-subtext='".$sv->tensinhvien."'>".$sv->masv."</option>";

                            }

                        }

                        ?>
                    </select>
                    <br>
                    <?php
                    ?>
                    <br>
                    <label for="giaovien">Giáo viên </label>
                    <select name="giaovien" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                        <?php
                        foreach ($listGiaovien as $sv){
                            if($sv->tengiaovien==$khoaluan_detail->giaovien) {
                                echo"<option value='".$sv->giaovien_id."' data-subtext='".$sv->tengiaovien."' selected>".$sv->magiaovien."</option>";
                            }
                            else{
                                echo"<option value='".$sv->giaovien_id."' data-subtext='".$sv->tengiaovien."' >".$sv->magiaovien."</option>";

                            }
                        }

                        ?>
                    </select>

                    <br>
                    <br>
                    <label for="detai">Tên đề tài</label>
                    <input id="detai" class="form-control" name="detai" type="text" placeholder="<?php echo $khoaluan_detail->tendetai ?>" required>
                    <br>

                    <label for="bailam">Link bài làm</label>
                    <input id="bailam" name="bailam" type="text" class="form-control"  placeholder="<?php echo $khoaluan_detail->bailam ?>" value="<?php echo $khoaluan_detail->bailam ?>" required>

                    <br>

                    <label for="diem">Điểm</label>
                    <input id="diem" name="diem" type="number" class="form-control" min="0" max="10"  placeholder="<?php echo $khoaluan_detail->diem ?>" required>

                    <br>
                    <br>



                    <button type="submit" class="btn btn-primary">Sửa</button>
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
<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

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
