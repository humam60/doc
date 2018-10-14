<?php

include_once('include/c.php');
$x='';
if (isset($_GET['status'])AND isset($_GET['id'])){
    $sql=mysqli_query($conn,"UPDATE `patien` SET `status` = '$_GET[status]' WHERE `id` = '$_GET[id]' ");
    $pots=mysqli_query($conn,"SELECT * FROM `patien`  WHERE `status`='published'");

    if (isset($sql)){


        $x= '<div class="alert alert-success" role="alert"> تم الحذف بنجاح   </div>';
    }
}


if (isset($_GET['delete'])){
    $sql=mysqli_query($conn,"DELETE FROM `patien` WHERE `id`= '$_GET[delete]'");
    if (isset($sql)){


        $x= '<div class="alert alert-success" role="alert"> تم الحذف بنجاح   </div>';
    }}
?>






<div class="col-md-12" >


    <div class="panel panel-info">
        <div class="panel-heading"><b>المقالات </b></div>
        <div class="panel-body" >

            <table class="table table-hover">

                <thead>

                <tr>

                    <th>#</th>
                    <th>اسم المريض </th>
                    <th>عمر المريض </th>
                    <th>جنس المريض</th>
                    <th>اختيار المريض</th>


                </tr>

                </thead>
                <tbody>

                <?php
                $date=date('Y-M-d');


                $posts=mysqli_query($conn,"SELECT * FROM `patien` WHERE  `status`='published' AND DATE(x) = CURDATE() ");
                $num=1;
                while ($post=mysqli_fetch_assoc($posts)) {

                    echo '<tr>
                    <td>'.$num.'</td>
                  
                  
                    <td>'.substr($post['p_name'],0,30).'</td>
                    <td>'.$post['p_age'].'</td>
                    <td>'.$post['p_address'].'</td> 
                            
                
                
                
                   <td><a href="patin.php?id='.$post['id'].'" type="button" class="btn btn-primary btn-xs">اختيار </a></td>
                </tr>';
                    $num++;
                }
                ?>


                </tbody>
            </table>

            <?php echo $x; ?>
        </div>
    </div>