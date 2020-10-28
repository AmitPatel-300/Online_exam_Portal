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
<div id="add">
<div id="nav2">
<ul>
<li><a href="user.php">User Side</a>
<li><a href="#">Exam</a>
<li><a href="profile.php">Profile</a>
<li><a href="logout.php">Logout</a>
</ul>
Click on Exam tab to view exam list....
</div>
</div>

<?php include 'footer.php';?>