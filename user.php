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
<?php include 'header.php';?>
<?php include 'config.php';?>
<div id="add">
<div id="nav2">
<ul>
<li><a href="admin.php">Admin Side</a>
<li><a href="exam.php">Exam</a>
<li><a href="user.php">User</a>
<li><a href="logout.php">Logout</a>
</ul>
Users List
<table>
<tr>
<th>User Name/th>
<th>Email</th>
<th>Password</th>
<th>Date Of Birth</th>
<th>Mobile No.</th>
<th>Address</th>
<th>Action</th>
</tr>
<?php
$sql2="select * from users";
$result=$conn->query($sql2);
if ($result->num_rows>0) {
    while ($rows=$result->fetch_assoc()) {
        $uid=$rows['user_id'];
        $uname=$rows['user_name'];
        $email=$rows['email'];
        $pass=$rows['password'];
        $dob=$rows['dob'];
        $mno=$rows['mobile_no'];
        $add=$rows['address'];
        echo '<tr>
        <td>'.$uname.'</td>
        <td>'.$email.'</td>
        <td>'.$pass.'</td>
        <td>'.$dob.'</td>
        <td>'.$mno.'</td>
        <td>'.$add.'</td>
        <td id="row" ><a href="deleteUser.php?id='.$uid.'">Delete</a></td>
        </tr>';
    }
}
?>
</table>
</div>
</div>
<?php include 'footer.php';?>