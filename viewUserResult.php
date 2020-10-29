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
<li><a href="viewUserResult.php">Results</a>
<li><a href="logout.php">Logout</a>
</ul>
<table>
<tr>
<th>User Email</th>
<th>Exam Name</th>
<th>Total Marks</th>
<th>Marks Achieve</th>
<th>Result</th>
</tr>
<?php
$sql2="select * from result ";
$result=$conn->query($sql2);
if ($result->num_rows>0) {
    while ($rows=$result->fetch_assoc()) {
        $um=$rows['user_email'];
        $en=$rows['exam_name'];
        $tm=$rows['total_marks'];
        $ym=$rows['your_marks'];
        $status=$rows['status'];
        echo '<tr>
        <td>'.$um.'</td>
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