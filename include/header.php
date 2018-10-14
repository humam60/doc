<?php
//include_once ("session.php");
include_once ("c.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-rtl.min.css" rel="stylesheet">


	

  
  
  </head>
  <body>
  

  <div class="row" style="color: #ffff00" id="hot">
     <section><img src="./img/index.gif" style="height: 100px"></section>


  </div>



<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="l.php">برنامج العياده</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        <li style="background: rgba(221, 221, 221, 0.18);"><a href="l.php">
                <i class="glyphicon glyphicon-user"></i>  اضف مريض <span class="sr-only">(current)</span></a></li>

      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li style="background: rgba(221, 221, 221, 0.18); margin-right: 16px;"><a href="mange.php">اداره المرضى</a></li>

      </ul>
      <ul class="nav navbar-nav">
        <li style="background: rgba(221, 221, 221, 0.18); margin-right: 1px;"><a href="show_p.php">عرض المرضى <span class="sr-only">(current)</span></a></li>
        <li style="background: rgba(221, 221, 221, 0.18); margin-right: 2px;">
            <a href="p_general.php">العرض الخاص بالطبيب <span class="sr-only">(current)</span></a></li>
        <li><a href="archive.php" style="background: rgba(221, 221, 221, 0.18);margin-right: 2px;">الارشيف </a></li>

      </ul>
     


      <form action="search.php" class="navbar-form navbar-left" method="get">
        <div class="form-group">
          <input type="text" class="form-control" name="q" placeholder="البحث عن مريض ">
        </div>
        <button type="submit" class="btn btn-default"> بحث </button>

      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
