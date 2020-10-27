<?php 
/**
 * Template File Doc Comment
 *
 *  PHP version 7
 * 
 * @category Template_Class
 * @package  Template_Class
 * @author   Author <author@domain.com>
 * @license  https://opensource.org/licenses/MIT MIT license
 * @link     http://localhost/
 */
$err='';
$emailerr='';
$login='';
session_start();
?>
 
<?php include 'header.php'?>
<?php include 'config.php' ?>
<?php 
if (isset($_POST['submit'])) {
    $email=isset($_POST['email'])?$_POST['email']:'';
    $pass=isset($_POST['pass'])?$_POST['pass']:'';

    $sel=isset($_POST['sel'])?$_POST['sel']:'';
    if ($sel == '0') {
        $err="Please select login type";
    } 

    if ($sel == '1') {
        
        $sql="select * from admin";
        $result=$conn->query($sql);
        if ($result->num_rows>0) {
            while ($rows=$result->fetch_assoc()) {
                if ($rows['admin_email']== $email && $rows['admin_pass']==$pass) {
                    $_SESSION['adminEmail']=$email;
                    header('location:admin.php');
                } else {
                    $login="Email or password not match";
                }

            }
        }
        
    }
    if ($sel == '2') {
        header('location:user.php');
    } 
}
?>
<body>
<div id="main">
<?php echo $err;?>
<?php echo $login;?>
<?php echo $emailerr;?>
<?php echo $se;?>
<div id="sub">
<form action="homepage.php" method="POST">
<label>LOGIN TYPE</label>
<select name="sel">
<option value="0">Select login type</option><?php echo $err?>
<option value="1">Admin</option>
<option value="2">User</option>
</select><br>
<label>Email:</label>
<input type="email" name="email" required><br>
<label>Password:</label>
<input type="password" name="pass" required><br>
<input type="submit" name="submit" value="submit">
</form>
</div>
</div>
</body>
<?php include 'footer.php'?>