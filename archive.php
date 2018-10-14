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
    if (isset($sql)){


        $x= '<div class="alert alert-success" role="alert"> تم الحذف بنجاح   </div>';
    }


}

?>



<div class="panel panel-info">
    <?php echo $x; ?>
        <div class="panel-heading"><b>المقالات </b></div>
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
                    <!--<th>تعديل</th>-->
                    <th>حذف</th>
                </tr>

                </thead>
                <tbody>

                <?php
                $per_page=10;
                if (!isset($_GET['page'])){
                    $page=1;


                }else{
                    $page=(int)$_GET['page'];
                }

                $start_from=($page-1)*$per_page;

                $posts=mysqli_query($conn,"SELECT * FROM `patien`  ORDER BY `id` DESC LIMIT $start_from ,$per_page");
                $num=1;
                while ($post=mysqli_fetch_assoc($posts)) {

                    echo '<tr>
                    <td>'.$num.'</td>

                    <td>'.substr($post['p_name'],0,30).'</td>
                    <td>'.substr($post['p_age'],0,30).'</td>
                    <td>'.$post['p_address'].'</td>
                    <td>'.$post['date'].'</td>
                    
                    
                    <td><a target="_self" href="patin.php?id='.$post['id'].'" type="button" class="btn btn-primary btn-xs" target="_blank"> مشاهده ملف المريض </a></td> 
                            
                    <!--td><a href="edit-post.php?id='.$post['id'].'" type="button" class="btn btn-warning btn-xs">تعديل</a></td-->
                    <td><a href="archive.php?delete='.$post['id'].'.$page='.$page.'" type="button" class="btn btn-warning btn-xs">حذف</a></td>
                </tr>';
                    $num++;
                }
                ?>


</tbody>
</table>
<?php
$page_sql=mysqli_query($conn,"SELECT * FROM `patien`");
$count_page=mysqli_num_rows($page_sql);
$total_page=ceil($count_page/$per_page);?>

<nav class="text-center">

    <ul class="pagination">
        <?php

        for ($i=1;$i<=$total_page;$i++){
            echo '<li '.($page==$i?'class="active"' : '').' ><a href="archive.php?page='.$i.'">'.$i.'</a> </li>';


        }

        ?>




    </ul>
</nav>


</div>
</div>


<?php

include_once("include/footer.php");
 ?>