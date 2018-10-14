<?php
session_start();

include_once('include/header.php');
//include_once('c.php');

$date=date('Y-M-d');
$x='';


if (isset($_SESSION['user'])!=true)
{
    header("Location:ind.php");
}




if (isset($_POST['submit'])){
$x='<div class="alert alert-success" role="alert" >    تم ادخال اسم المريض   </div>';

   
    $name = strip_tags($_POST['p_name']);
    $age = ($_POST['p_age']);
    $city = ($_POST['p_city']);
    $gender = ($_POST['p_gender']);
    $p_num = ($_POST['p_num']);


    $insert = "INSERT INTO `patien`(`p_name`, `p_age`,`p_city`,`status`,`date`,`p_num`,`p_address` ,`p_ill`) VALUES ('$name','$age','$city','published','$date','$p_num','$gender','false')";
        mysqli_query($conn, $insert);

}


?>


<article class="col-md-9 col-lg-9 art_bg" style="background: rgba(238, 238, 238, 0.32);margin-right: 107px;">
<?php echo $x; ?>
    <div  class="page-header"><h1>   تسجيل بيانات المرضى </h1></div>

<div class="container-fluid col-md-9" style="margin-right:107px">

						<form action="" method="post">
                            <div class="form-group row" >
                                <label for="p_name " class="col-sm-2 control-label">اسم المراجع </label>
                                <div class="col-sm-10">
                                    <input  type="text" class="form-control" id="p_name" name="p_name" placeholder="اسم المستخدم" required>
                                </div>
                            </div> 
							
							<div class="form-group row" >
                                <label for="p_age " class="col-sm-2 control-label">عمر المريض</label>
                                <div class="col-sm-10">
                                    <input  type="number" class="form-control" id="p_age" name="p_age" placeholder="عمر المريض" required>
                                </div>
                            </div>
							
							<div class="form-group row" >
                                <label for="p_city " class="col-sm-2 control-label">سكن المريض</label>
                                <div class="col-sm-10">
                                    <input  type="text" class="form-control" id="p_city" name="p_city" placeholder="سكن المريض" required>
                                </div>
                            </div>
							<div class="form-group row" >
                                <label for="p_num" class="col-sm-2 control-label">رقم المريض</label>
                                <div class="col-sm-10">
                                    <input  type="number" class="form-control" id="p_num" name="p_num" placeholder="رقم المريض" required>
                                </div>
                            </div>

                            <div class="form-group row" style="padding-top: 25px;">
                                <label for="p_gender"  id=grender class="col-sm-2 control-label" > تحديد الجنس</label>
                                <div class="col-sm-10">
                                    <select required name="p_gender" id="p_gender" class="form-control col-md-3">
                                        <option value="" > اختر الجنس </option>
                                        <option value="male">ذكر </option>
                                        <option value="female">انثى </option>
                                    </select>
                                </div>
                            </div>

                           

                            <button type="submit" name="submit"  id="submit" class="btn btn-default pull-left" style="margin-bottom: 25px; margin-top: 25px; margin: 15px;">حفظ </button>
                            </form>

</div>


</article>








<?php
include('include/footer.php');



?>
