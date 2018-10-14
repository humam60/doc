<?php
/**
 * Created by PhpStorm.
 * User: humam
 * Date: 08/01/2017
 * Time: 10:07 ص
 */

include_once("include/header.php");
$x='';

if (isset($_GET['delete'])){
    $sql=mysqli_query($conn,"DELETE FROM `patien` WHERE `id`= '$_GET[delete]'");
    $dele=mysqli_query($conn,"DELETE FROM `p_data` WHERE `id`= '$_GET[delete]'");
    if (isset($sql)){


        $x= '<div class="alert alert-success" style="margin-left: 40px;margin-right: 20px" role="alert"> تم الحذف بنجاح   </div>';
    }


}
$date=date('Y-M-d');

?>


<?php echo $x; ?>
    <div class="panel panel-info">

        <div class="panel-heading"><b>سجل المراجعين ليوم <?php echo Date('M-d');?> </b></div>
        <div class="panel-body">

            <table class="table table-hover">

                <thead>

                <tr>

                    <th>#</th>
                    <th>اسم المريض </th>
                    <th>عمر المريض </th>
                    <th>جنس المريض</th>
                    <th> تاريخ اخر مراجعه  </th>
                    <th>ملف المريض</th>

                    <th>حذف</th>
                </tr>

                </thead>
                <tbody>

                <?php

                if (!isset($_GET['page'])){


                $posts=mysqli_query($conn,"SELECT * FROM `patien` WHERE `date`='$date' AND `p_ill`='true' ORDER BY `id` DESC ");
                $num=1;
                while ($post=mysqli_fetch_assoc($posts)) {

                    echo '<tr>
                    <td>'.$num.'</td>

                    <td>'.substr($post['p_name'],0,30).'</td>
                    <td>'.substr($post['p_age'],0,30).'</td>
                    <td>'.$post['p_address'].'</td>
                    <td>'.$post['date'].'</td>
                    
                    
                    <td><a target="_self" href="patin.php?id='.$post['id'].'" type="button" class="btn btn-primary btn-xs" > مشاهده ملف المريض </a></td> 
                            
                    
                    <td><a href="p_general.php?delete='.$post['id'].'" type="button" class="btn btn-warning btn-xs">حذف</a></td>
                </tr>';
                    $num++;
                }}
                ?>


                </tbody>
            </table>



        </div>
    </div>


<?php

include_once("include/footer.php");
?>