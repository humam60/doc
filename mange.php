<?php
session_start();
include_once ("include/header.php");
//include_once('include/c.php');
?>
<?php
$x='';
if (isset($_SESSION['user'])!=true)
{
    header("Location:ind.php");
}



if (isset($_GET['status'])AND isset($_GET['id']) ){
    $sql=mysqli_query($conn,"UPDATE `patien` SET `status` = '$_GET[status]' WHERE `id` = '$_GET[id]' ");
    $pots=mysqli_query($conn,"SELECT * FROM `patien`  WHERE `status`='published'");

    if (isset($sql)){


        $x= '<div class="alert alert-success" role="alert"> تم الحذف بنجاح   </div>';
    }
}



if (isset($_GET['status'])AND isset($_GET['id']) AND isset($_GET['ent'])){
    $sql=mysqli_query($conn,"UPDATE `patien` SET `status` = '$_GET[status]',`p_ill`='$_GET[ent]' WHERE `id` = '$_GET[id]' ");
    $pots=mysqli_query($conn,"SELECT * FROM `patien`  WHERE `status`='published'");


}


if (isset($_GET['delete'])){
    $sql=mysqli_query($conn,"DELETE FROM `patien` WHERE `id`= '$_GET[delete]'");

    if (isset($sql)){


        $x= '<div class="alert alert-success" role="alert"> تم الحذف بنجاح   </div>';
    }
}
?>






<div class="col-md-12">


    <div class="panel panel-info">
        <div class="panel-heading"><b>السجل اليومي </b></div>
        <div class="panel-body">

            <table class="table table-hover">

                <thead>

                <tr>

                    <th>#</th>
                    <th>اسم المريض </th>
                    <th>عمر المريض </th>
                    <th>جنس المريض</th>
                     <th>الادخال</th>
                     <th>الحاله</th>
                    <th>تعديل</th>
                    <th>حذف</th>

                </tr>

                </thead>
                <tbody>

                <?php
                 $date=date('Y-M-d');


                $posts=mysqli_query($conn,"SELECT * FROM `patien` WHERE DATE(x) = CURDATE() ");
                $num=1;
                while ($post=mysqli_fetch_assoc($posts)) {

                    echo '<tr>
                    <td>'.$num.'</td>
                  
                  
                    <td>'.substr($post['p_name'],0,30).'</td>
                    <td>'.$post['p_age'].'</td>
                    <td>'.$post['p_address'].'</td> 
                            <!--تواجد المريض-->
                    <td>'.($post['status']=='dreft'? '<a href="mange.php?status=published&id='.$post['id'].'" 
type="button" class="btn btn-info btn-xs">اخفاء</a>':'<a href="mange.php?status=dreft&id='.$post['id'].'"
 type="button" class="btn btn-success btn-xs">تشغيل</a>' ).'</td>  
                    
<!--
                دخل للطبيب او لم يدخل-->
  <td>'.($post['p_ill']=='false'? '<a href="mange.php?status=dreft&id='.$post['id'].'&ent=true " type="button"
 class="btn btn-info btn-xs">لم يدخل </a>':'<a href="mange.php?status=published&id='.$post['id'].'&ent=false " type="button"
 class="btn btn-success btn-xs">تم الدخول </a>' ).'</td>  
              
                
                
                   <td><a href="mange.php?id='.$post['id'].'" type="button" class="btn btn-warning btn-xs">تعديل</a></td>
                    <td><a href="mange.php?delete='.$post['id'].'" type="button" class="btn btn-warning btn-xs">حذف</a></td>
                </tr>';
                    $num++;
                }
                ?>


                </tbody>
            </table>

<?php echo $x; ?>
        </div>
    </div>
