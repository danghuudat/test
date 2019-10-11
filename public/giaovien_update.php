<?php
session_start();
if(!isset($_SESSION['user_name'])){
    header("location:dangnhap.php");
}
include('../controller/c_giaovien.php');
include('../controller/c_bomon.php');

$c_giaovien=new C_giaovien();
$giaovien=$c_giaovien->getDetail($_GET['id']);
$giaovien_detail=$giaovien['giaovien'];
$c_bomon=new C_bomon();
$bomon=$c_bomon->getListBomon();
$listBomon=$bomon['bomon'];
if(isset($_POST['tengv'])){
    $isExist=$c_giaovien->checkforupdate($_POST['magv'],$_POST['id']);
    if($isExist['isExist']==false){
        $newkhoa=$c_giaovien->update($_POST['id'],$_POST['tengv'],$_POST['bomon'],$_POST['magv']);
       header("Refresh:0");
    }
    else{
        $exist="Mã giáo viên bị trùng";
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
    <link href="css/shop-homepage.css rel="stylesheet">
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
            <?php
            if(isset($isExist)){
                echo "<div class='alert alert-danger'>Mã giáo viên đã tồn tại</div>";
            }
            ?>
            <form method="POST" action="#">
                <input name="id" type="hidden" value="<?php echo $giaovien_detail->ID;?>">
                <label for="tengv">Tên giáo viên</label>
                <input type="text" placeholder="<?php echo $giaovien_detail->name;?>" name="tengv" id="tengv" class="form-control" required><br>

                <label for="magv">Mã giáo viên</label>
                <input type="text" placeholder="<?php echo $giaovien_detail->magv;?>" name="magv" id="magv" class="form-control" required><br>

                <select class="form-control" name="bomon">
                    <?php
                    foreach ($listBomon as $bm){
                        if($giaovien_detail->bomon_id==$bm->ID){
                            echo"<option value='".$bm->ID."' selected>".$bm->name."</option>";
                        }
                        else{
                            echo"<option value='".$bm->ID."'>".$bm->name."</option>";
                        }
                    }
                    ?>
                </select>
                <br>

                <button type="submit" class="btn btn-primary">Sửa</button>
            </form>
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
<script src="js/bootstrap.min.js"></script>
<script src="js/my.js"></script>

</body>

</html>
