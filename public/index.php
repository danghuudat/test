<?php 
    include('../controller/c_doan.php');
    session_start();
    $doan=new C_doan();

    if(!isset($_GET['id'])){
        $index=$doan->index();
        $menu=$index['menu'];
        $data_table=$index['data_table'];
    }
    else{
        $index=$doan->indexbyID($_GET['id']);
        $menu=$index['menu'];
        $data_table=$index['data_table'];
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
                    <li href="#" class="list-group-item menu1 active">
                    	Menu
                    </li>
                    <?php
                        foreach($menu as $mn){
                            ?>
                                <li href="#" class="list-group-item menu1">
                                    <?php echo $mn->name; ?>
                                </li>
                                <ul>
                                    <?php
                                    $nganh=explode(',', $mn->nganh);
                                        foreach ($nganh as $n) {
                                            ?>
                                               <li class="list-group-item">
                                                    <a href="./?id=<?php $tennganh=explode(":", $n); echo $tennganh[0];?>"><?php  echo $tennganh[1]; ?></a>
                                                </li> 
                                            <?php
                                        }
                                    ?>
                                </ul>
                            <?php
                        }
                     ?>
                
            </div>

            <div class="col-md-9">
	            <div class="panel panel-default">
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >

	            		<h2 style="margin-top:0px; margin-bottom:0px;"> Danh sách đề tài <?php     if(isset($_GET['id'])){
	            		        echo"ngành ".$data_table[0]->nganh;

                            }
                            ?></h2>
	            	</div>

	            	<div class="panel-body">
	            		<table id="table_detai" class="table table-striped table-bordered" cellspacing="0" >
                            <thead>
                                <tr>
                                    <th class="">STT</th>
                                    <th class="">Tên sinh viên</th>
                                    <th class="">Ngành</th>
                                    <th class="">Đề tài</th>
                                    <th class="">Tên giáo viên</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                                foreach ($data_table as $record){
                                    echo "<tr>";
                                    echo"<td>".$i."</td>";
                                    echo"<td>".$record->tensinhvien."</td>";
                                    echo"<td>".$record->nganh."</td>";
                                    echo"<td><a href='".$record->bailam."'>".$record->tendetai."</a></td>";
                                    echo"<td>".$record->tengiaovien."</td>";
                                    echo"</tr>";
                                    $i++;
                                }

                            ?>
                                <!--<tr>
                                    <td>1</td>
                                    <td>Đặng Hữu Đạt</td>
                                    <td>TI</td>
                                    <td><a href="https://drive.google.com/drive/folders/1yraHF0C1bUZ3CM_o01nFKYwkZz6hg-go">Xây dựng phần mềm bảo vệ đồ án</td>
                                    <td>Mai Thúy Nga</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Đặng Hữu Đạt</td>
                                    <td>TI</td>
                                    <td><a href="https://drive.google.com/drive/folders/1yraHF0C1bUZ3CM_o01nFKYwkZz6hg-go">Xây dựng phần mềm bảo vệ đồ án</td>
                                    <td>Mai Thúy Nga</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Đặng Hữu Đạt</td>
                                    <td>TI</td>
                                    <td><a href="https://drive.google.com/drive/folders/1yraHF0C1bUZ3CM_o01nFKYwkZz6hg-go">Xây dựng phần mềm bảo vệ đồ án</td>
                                    <td>Mai Thúy Nga</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Đặng Hữu Đạt</td>
                                    <td>TI</td>
                                    <td><a href="https://drive.google.com/drive/folders/1yraHF0C1bUZ3CM_o01nFKYwkZz6hg-go">Xây dựng phần mềm bảo vệ đồ án</td>
                                    <td>Mai Thúy Nga</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Đặng Hữu Đạt</td>
                                    <td>TI</td>
                                    <td><a href="https://drive.google.com/drive/folders/1yraHF0C1bUZ3CM_o01nFKYwkZz6hg-go">Xây dựng phần mềm bảo vệ đồ án</td>
                                    <td>Mai Thúy Nga</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Đặng Hữu Đạt</td>
                                    <td>TI</td>
                                    <td><a href="https://drive.google.com/drive/folders/1yraHF0C1bUZ3CM_o01nFKYwkZz6hg-go">Xây dựng phần mềm bảo vệ đồ án</td>
                                    <td>Mai Thúy Nga</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Đặng Hữu Đạt</td>
                                    <td>TI</td>
                                    <td><a href="https://drive.google.com/drive/folders/1yraHF0C1bUZ3CM_o01nFKYwkZz6hg-go">Xây dựng phần mềm bảo vệ đồ án</td>
                                    <td>Mai Thúy Nga</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Đặng Hữu Đạt</td>
                                    <td>TI</td>
                                    <td><a href="https://drive.google.com/drive/folders/1yraHF0C1bUZ3CM_o01nFKYwkZz6hg-go">Xây dựng phần mềm bảo vệ đồ án</td>
                                    <td>Mai Thúy Nga</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Đặng Hữu Đạt</td>
                                    <td>TI</td>
                                    <td><a href="https://drive.google.com/drive/folders/1yraHF0C1bUZ3CM_o01nFKYwkZz6hg-go">Xây dựng phần mềm bảo vệ đồ án</td>
                                    <td>Mai Thúy Nga</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Đặng Hữu Đạt</td>
                                    <td>TI</td>
                                    <td><a href="https://drive.google.com/drive/folders/1yraHF0C1bUZ3CM_o01nFKYwkZz6hg-go">Xây dựng phần mềm bảo vệ đồ án</td>
                                    <td>Mai Thúy Nga</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Đặng Hữu Đạt</td>
                                    <td>TI</td>
                                    <td><a href="https://drive.google.com/drive/folders/1yraHF0C1bUZ3CM_o01nFKYwkZz6hg-go">Xây dựng phần mềm bảo vệ đồ án</td>
                                    <td>Mai Thúy Nga</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Đặng Hữu Đạt</td>
                                    <td>TI</td>
                                    <td><a href="https://drive.google.com/drive/folders/1yraHF0C1bUZ3CM_o01nFKYwkZz6hg-go">Xây dựng phần mềm bảo vệ đồ án</td>
                                    <td>Mai Thúy Nga</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Đặng Hữu Đạt</td>
                                    <td>TI</td>
                                    <td><a href="https://drive.google.com/drive/folders/1yraHF0C1bUZ3CM_o01nFKYwkZz6hg-go">Xây dựng phần mềm bảo vệ đồ án</td>
                                    <td>Mai Thúy Nga</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Đặng Hữu Đạt</td>
                                    <td>TI</td>
                                    <td><a href="https://drive.google.com/drive/folders/1yraHF0C1bUZ3CM_o01nFKYwkZz6hg-go">Xây dựng phần mềm bảo vệ đồ án</td>
                                    <td>Mai Thúy Nga</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Đặng Hữu Đạt</td>
                                    <td>TI</td>
                                    <td><a href="https://drive.google.com/drive/folders/1yraHF0C1bUZ3CM_o01nFKYwkZz6hg-go">Xây dựng phần mềm bảo vệ đồ án</td>
                                    <td>Mai Thúy Nga</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Đặng Hữu Đạt</td>
                                    <td>TI</td>
                                    <td><a href="https://drive.google.com/drive/folders/1yraHF0C1bUZ3CM_o01nFKYwkZz6hg-go">Xây dựng phần mềm bảo vệ đồ án</td>
                                    <td>Mai Thúy Nga</td>
                                </tr>-->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="">STT</td>
                                    <td class="">Tên sinh viên</td>
                                    <td class="">Ngành</td>
                                    <td class="">Đề tài</td>
                                    <td class="">Tên giáo viên</td>
                                </tr>
                            </tfoot>
                        </table>
					</div>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>
<style>
    #table_detai{
        width: 800px !important;
    }
</style>
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
