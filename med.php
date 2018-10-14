<?php
session_start();
include_once('include/header.php');
if (isset($_SESSION['user'])!=true)
{
    header("Location:ind.php");

}
    $x="";
$edit_id=0;
$re="";
$re1="";
$edit_value=0;
$num=0;

?>


<?php
if (isset($_POST['submit'])) {

        $med = strip_tags($_POST['med']);
        $insert = "INSERT INTO `medic`(`med_name`) VALUES ('$med')";
        mysqli_query($conn, $insert);

    }


    if (isset($_POST['update'])){


        $med = strip_tags($_POST['med']);
        $update = "UPDATE `medic` SET `med_name`='$med' WHERE `id`='$_POST[ed]'";
        mysqli_query($conn, $update)or die(mysqli_error());
        header("Location: med.php");


        }





if (isset($_GET['del'])){

    $dele=mysqli_query($conn,"DELETE FROM `medic` WHERE `id`= '$_GET[del]'");
    $x='<div class="alert alert-success" role="alert" >   تم حذف العلاج   </div>';
}


if (isset($_GET['edit'])){
    $edit =mysqli_query($conn,"SELECT `med_name` FROM `medic` WHERE id='$_GET[edit]'");
    $re=mysqli_fetch_assoc($edit);
    $edit_id=$_GET['edit'];
    $re1=$re['med_name'];


        }


?>


<link href="css/med.css" rel="stylesheet">

<div class="col-sm-4 col-md-offset-0">
    <div class="panel panel-default">
        <div class="panel-heading">اضافه علاج </div>

        <div class="panel-body">

            <form action="#" method="post" enctype="multipart/form-data">

                <input type="text" id="ed" name="ed"  value="<?php echo $edit_id; ?>" hidden>
                <div class="form-group col-sm-12" dir="rtl">
                    <label for="xx" class="col-sm-12 control-label">  اضافه علاج جديد </label>

                    <input type="text" class="form-control col-sm-12" id="med" name="med"
                          value="<?php echo $re1; ?>" placeholder=" ادخل العلاج هنا ">
                </div>
                <div class="form-group col-sm-12" dir="rtl">



                </div>
                <div class="form-group ">
                    <?php
                    if (isset($_GET['edit'])){
                    echo'<button type="submit" name="update" id="update" class="btn btn-primary center-block "
                            style="margin-top: 10px">تعديل </button>';}else
                    {
                        echo'<button type="submit" name="submit" id="submit" class="btn btn-primary center-block "
                            style="margin-top: 10px">اضافه </button>';
                    }
                            ?>
                </div>
            </form>
        </div>
    </div>
</div>

<!--here is the table
-->
<div class="col-sm-8" dir="ltr">



    <div class="card mx-auto " >

        <div class="card-body" id="deliveriesDataStorageBody" role="tabpanel">

            <div class="table-responsive scrollable">
                <table class="table table-sm table-striped table-hover text-nowrap grid-welcm">
                    <thead class="default">
                    <tr>
                        <th>ID</th>
                        <th>medicine name</th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                        <?php
                        $sql = mysqli_query($conn, "SELECT * FROM `medic`");
                        while ($post=mysqli_fetch_assoc($sql)) {
                            ++$num;
                            echo '<td>'.$num.'</td>
                                    <td>'.$post['med_name'].'</td>
                        <td> <td class="text-right">
                            <a href="med.php?edit='.$post['id'].'" type="button" class="btn btn-outline-primary">Edit</a>
                            <a  href="med.php?del='.$post['id'].'" class="button alert tiny">Delete</a></td>
                            
                    </tr>';}


 ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>


            </div>




<?php
include_once ('include/footer.php');
?>
