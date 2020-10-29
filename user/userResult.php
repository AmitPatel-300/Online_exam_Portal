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
<div id="add">
<div id="nav2">
<ul>
<li><a href="user.php">User Side</a>
<li><a href="profile.php">Profile</a>
<li><a href="userResult.php">Result</a>
<li><a href="logout.php">Logout</a>
</ul>
<table>
<tr>
<th>Exam Name</th>
<th>Total Marks</th>
<th>Your Marks</th>
<th>Result</th>
</tr>
<?php
$sql2="select * from result where user_email='".$email."' ";
$result=$conn->query($sql2);
if ($result->num_rows>0) {
    while ($rows=$result->fetch_assoc()) {
        $en=$rows['exam_name'];
        $tm=$rows['total_marks'];
        $ym=$rows['your_marks'];
        $status=$rows['status'];
        echo '<tr>
        <td>'.$en.'</td>
        <td>'.$tm.'</td>
        <td>'.$ym.'</td>
        <td>'.$status.'</td>
        </tr>';
    }
}
?>
</table>
</div>
</div>
<?php include 'footer.php'?>