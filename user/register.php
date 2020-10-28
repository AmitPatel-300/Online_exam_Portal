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
$emailerr='';
$phoneerr='';
?>
<?php include 'header.php';?>
<?php include 'config.php';?>
<?php
if (isset($_POST['register'])) {
    $un=isset($_POST['uname'])?$_POST['uname']:'';
    $email=isset($_POST['email'])?$_POST['email']:'';
    $pass=isset($_POST['pass'])?$_POST['pass']:'';
    $dob=isset($_POST['dob'])?$_POST['dob']:'';
    $mno=isset($_POST['mno'])?$_POST['mno']:'';
    $add=isset($_POST['add'])?$_POST['add']:'';

    $sql2="Select * from users";
    $result2=$conn->query($sql2);
    if ($result2->num_rows>0) {
        while ($row=$result2->fetch_assoc()) {
            if ($email == $row['email'] ) {
                echo '<script>alert("Email already exist")</script>';
            }
            if ($mno == $row['mobile_no'] ) {
                echo '<script>alert("Mobile no. already exist")</script>';
            }
        }
    }
    $sql="INSERT into users (`user_name`, `email`,`password`, 
    `dob`, `mobile_no`, `address`) VALUES 
    ('".$un."', '".$email."', '".$pass."', '".$dob."', '".$mno."',
    '".$add."')";
    if ($conn-> query($sql) === true) {
        echo '<script>alert("Registration Successful")</script>';
    } else {
            $errors= array('input' => 'form', 'msg'=> $conn->error);
    }
    $conn->close();
}
?>
<div id="add">
Registration Form
<div id="examform2">
<?php echo $emailerr;?>
<?php echo $phoneerr;?>
<form action="register.php" method="POST">
<label>User Name :</label>
<input type="text" name="uname" required><br><br>
<label>Email :</label>
<input type="email" name="email" required><br><br>
<label>Password :</label>
<input type="password" name="pass" required><br><br>
<label>DOB :</label>
<input type="date" name="dob" required><br><br>
<label>Mobile No :</label>
<input type="text" name="mno" maxlength="10" ><br><br><br><br>
<label>Address :</label>
<textarea rows="6" cols="62" name="add"></textarea>
<input type="submit" name="register" value="Submit">
<input type="reset">
</form>
</div>
</div>
<?php include 'footer.php';?>