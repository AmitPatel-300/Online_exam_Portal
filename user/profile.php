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
?>
<?php
session_start();
$email=$_SESSION['userEmail'];
if ($email == '') {
    $se="please login first";
    header('location:../homepage.php');
}
?>
<?php include 'header.php';?>
<?php include 'config.php';?>
<?php
$sql="Select * from users where email='".$email."'";
$result=$conn->query($sql);
if ($result->num_rows>0) {
    while ($rows=$result->fetch_assoc()) {
        $name=$rows['user_name'];
        $email=$rows['email'];
        $pass=$rows['password'];
        $dob=$rows['dob'];
        $mno=$rows['mobile_no'];
        $add=$rows['address'];
    }
}
?>
<div id="add">
<div id="nav2">
<ul>
<li><a href="user.php">User Side</a>
<li><a href="profile.php">Profile</a>
<li><a href="userResult.php">Result</a>
<li><a href="logout.php">Logout</a>
</ul>
Profile Detail
<div id="examform2">
<form action="register.php" method="POST">
<label> Name :</label>
<input type="text" name="uname" value="<?php echo $name;?>" disabled><br><br>
<label>Email :</label>
<input type="email" name="email" value="<?php echo $email;?>" disabled><br><br>
<label>Password :</label>
<input type="password" name="pass" value="<?php echo $pass;?>" disabled><br><br>
<label>DOB :</label>
<input type="date" name="dob" value="<?php echo $dob;?>" disabled><br><br>
<label>Mobile No :</label>
<input type="text" name="mno" value="<?php echo $mno;?>" disabled ><br><br><br><br>
<label>Address :</label>
<textarea rows="6" cols="62" name="add" disabled><?php echo $add;?></textarea>
</form>
</div>
</div>
<?php include 'footer.php';?>