<?php
session_start();


include_once ("include/header.php");
if (isset($_SESSION['user'])==true)
{
    header("Location:l.php");
}



if (isset($_POST['submit'])) {
    $username = stripcslashes(mysqli_real_escape_string($conn, $_POST['username']));
    $password = md5($_POST['pass']);
    $sql = mysqli_query($conn, " SELECT username , password FROM user WHERE username = '$username' AND password = '$password'");

    if (mysqli_num_rows($sql)!= 1){

        echo "its not login";
    }
    else{

        echo " its login";

        $user=mysqli_fetch_assoc($sql);

        //$_SESSION['id']=$user['id'];
        $_SESSION['user']=$user['username'];
        $x=$_SESSION['user'];
       // echo '<meta http-equiv="refresh" content="0;URL=http://localhost/doc/l.php" />';
echo  "$x";

    }





}
?>

<div class="container-fluid col-md-8">
<form action="" method="post" class="form-horizontal">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">username </label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  name="username" id="username" placeholder="username">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit"  name="submit" id="submit" class="btn btn-default">Sign in</button>
        </div>
    </div>
</form>

</div>


<?php
include_once ('include/footer.php');


?>