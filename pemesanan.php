<?php
  include('dbconnect.php');
  include('sessioncheck.php');
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-default no-margin">
    <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header fixed-brand">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"  id="menu-toggle">
                      <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
                    </button>
                    <a class="navbar-brand" href="#"><i class="fa fa-rocket fa-4"></i> KANTIN BENGKOK</a>
                </div><!-- navbar-header-->

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active" ><button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2"> <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span></button></li>
                            </ul>
                </div><!-- bs-example-navbar-collapse-1 -->
    </nav>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
            	<li class="disabled">
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-user fa-stack-1x "></i></span>admin</a>
                </li>
                <li>
                    <a href="dashboard.html"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span>Dashboard</a>
                </li>
                <li class="active">
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-shopping-cart fa-stack-1x "></i></span>Pemesanan</a>
                </li>
                <li>
                    <a href="daftar-menu.html"><span class="fa-stack fa-lg pull-left"><i class="fa fa-book fa-stack-1x "></i></span>Daftar Menu</a>
                </li>
                <li>
                    <a href="index.html"><span class="fa-stack fa-lg pull-left"><i class="fa fa-sign-out fa-stack-1x "></i></span>Sign Out</a>
                </li>
            </ul>
        </div><!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid xyz">
                <div class="row">
                    <div class="col-lg-12">
                        <center><h1>Pemesanan</h1></center>
                        <table class="table">
                        	<thead>
                        		<tr>
                        			<th>Pemesan</th>
                        			<th>Waktu Pesan</th>
                                    <th>Order</th>
                                    <th>Alamat</th>
                                    <th>Telp</th>
                        			<th>Konfirmasi</th>
                        		</tr>
                        	</thead>
                        	<tbody>
                            <?php
                              $res = $db->query("select * from pesanan;");
                              while ($row = $res->fetch_assoc()){
                                echo "<tr>";
                                echo "<td>".$row[pemesan]."</td>";
                                echo "<td>12-Apr-17</td>";
                                $res2 = $db->query("select * from pesanansatuan join menu on (menu=id) where idpesanan=".$row[id].";");
                                $str="";
                                while ($row2 = $res2->fetch_assoc()){
                                  $str = $str.$row2[jumlah]."bh"." ".$row2[nama]."<br/>";
                                }
                                echo "<td>".$str."</td>";
                                echo "<td>".$row[lokasi]."</td>";
                                echo "<td>".$row[telepon]."</td>";
                                echo '<td><input type="checkbox"/></td>';
                                echo "</tr>";
                              }
                             ?>
                        	</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery-3.2.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sidebar_menu.js"></script>
</body>

</html>
