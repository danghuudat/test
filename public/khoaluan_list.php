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
$khoaluan= $c_khoaluan->getList();

$listKhoaLuan=$khoaluan['khoaluan'];


$c_sinhvien=new C_sinhvien();
$sinhvien=$c_sinhvien->getList();
$listSinhVien=$sinhvien['sinhvien'];

$c_giaovien=new C_giaovien();
$giaovien=$c_giaovien->getList();
$listGiaovien=$giaovien['giaovien'];

if (isset($_POST['sinhvien'])){
    $isExist=$c_khoaluan->check($_POST['sinhvien']);
    if($isExist['isExist']==false){
        $newkhoaluan=$c_khoaluan->add($_POST['sinhvien'],$_POST['giaovien'],$_POST['detai'],$_POST['bailam'],$_POST['diem']);
    }
    else{
        $exist="sinh viên đã làm khóa luận";
    }
}
if(isset($_GET['deleteid'])){
    $deletekhoaluan=$c_khoaluan->delete($_GET['deleteid']);
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

                <li href="#" class="list-group-item menu1">
                    Ngành
                </li>
                <li href="nganh_list.php" class="list-group-item menu1">
                    Bộ môn
                </li>
                <li href="sinhvien_list" class="list-group-item menu1">
                    Sinh viên
                </li>
                <li href="giaovien_list.php" class="list-group-item menu1">
                    Giáo viên
                </li>
                <li href="khoaluan_list.php" class="list-group-item menu1">
                    Khóa luận
                </li>
            </ul>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h2 style="margin-top:0px; margin-bottom:0px;"> Danh sách ngành </h2>
                </div>
            </div>
            <div class="panel-body" style="box-sizing: border-box;border: 1px solid rgb(221,221,221)">
                <table id="table_detai" class="table table-striped table-bordered" cellspacing="0" >
                    <thead>
                    <tr>
                        <td>STT</td>
                        <td>Tên sinh viên</td>
                        <td>Mã sinh viên</td>
                        <td>Đề tài</td>
                        <td>Điểm</td>
                        <td>Tên giáo viên</td>
                        <td>Mã giáo viên</td>
                        <td></td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=1;
                    foreach ($listKhoaLuan as $record){
                        echo"<tr>";
                        echo"<td>".$i."</td>";
                        echo"<td>".$record->sinhvien."</td>";
                        echo"<td>".$record->masv."</td>";
                        echo"<td><a href='".$record->bailam."'>".$record->tendetai."</a></td>";
                        echo"<td>".$record->diem."</td>";

                        echo"<td>".$record->giaovien."</td>";
                        echo"<td>".$record->magv."</td>";



                        echo"<td><a href='khoaluan_update.php?id=".$record->ID."'>update</a></td>";
                        echo"<td><a href='khoaluan_list.php?deleteid=".$record->ID."'>delete</a></td>";

                        echo"</tr>";
                        $i++;
                    }
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td>STT</td>
                        <td>Tên sinh viên</td>
                        <td>Mã sinh viên</td>
                        <td>Đề tài</td>
                        <td>Điểm</td>

                        <td>Tên giáo viên</td>
                        <td>Mã giáo viên</td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tfoot>
                </table>

            </div>
            <div class="panel-body" style="box-sizing: border-box;border: 1px solid rgb(221,221,221)">
                <?php
                if (isset($exist)){
                    echo"<div class='alert alert-danger'>Sinh viên đã làm khóa luận</div>";
                }
                ?>

                <form method="POST" action="#">
                    <label for="sinhvien">Sinh viên </label>
                    <select name="sinhvien" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                        <?php
                        foreach ($listSinhVien as $sv){
                            echo"<option value='".$sv->sinhvien_id."' data-subtext='".$sv->tensinhvien."'>".$sv->masv."</option>";

                        }

                        ?>
                    </select>
                    <br>

                    <br>
                    <label for="giaovien">Giáo viên </label>
                    <select name="giaovien" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                        <?php
                        foreach ($listGiaovien as $sv){
                            echo"<option value='".$sv->giaovien_id."' data-subtext='".$sv->tengiaovien."'>".$sv->magiaovien."</option>";

                        }

                        ?>
                    </select>
                    <br>
                    <br>

                    <label for="detai">Tên đề tài</label>
                    <input id="detai" class="form-control" name="detai" type="text" required>
                    <br>

                    <label for="bailam">Link bài làm</label>
                    <input id="bailam" name="bailam" type="text" class="form-control" required>

                    <br>

                    <label for="diem">Điểm</label>
                    <input id="diem" name="diem" type="number" class="form-control" min="0" max="10" required>

                    <br>
                    <br>
                    <button type="submit" class="btn">Thêm khóa luận</button>
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
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/my.js"></script>

</body>
<script>
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#table_detai tfoot td').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search "  style="width: 100%"/>' );
        } );

        // DataTable
        var table = $('#table_detai').DataTable();

        // Apply the search
        table.columns().every( function () {
            var that = this;

            $( 'input', this.footer() ).on( 'keyup change clear', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    } );
</script>
</html>
