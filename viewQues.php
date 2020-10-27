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
$id=$_REQUEST['id'];
?>
<?php include 'header.php';?>
<?php include 'config.php';?>
<div id="add">
<div id="nav2">
<ul>
<li><a href="admin.php">Admin Side</a>
<li><a href="exam.php">Exam</a>
<li><a href="">User</a>
<li><a href="logout.php">Logout</a>
</ul>
<table>
<tr>
<th>Exam Id</th>
<th>Question Title</th>
<th>Option 1</th>
<th>Option 2</th>
<th>Option 3</th>
<th>Option 4</th>
<th>Answer Option</th>
<th>Action</th>
</tr>
<?php
$sql2="select * from question where online_exam_id='".$id."'";
$result=$conn->query($sql2);
if ($result->num_rows>0) {
    while ($rows=$result->fetch_assoc()) {
        $eid=$rows['ques_id'];
        $qt=$rows['ques_title'];
        $opt1=$rows['option1'];
        $opt2=$rows['option2'];
        $opt3=$rows['option3'];
        $opt4=$rows['option4'];
        $ans=$rows['ansoption'];
        echo '<tr>
        <td>'.$eid.'</td>
        <td>'.$qt.'</td>
        <td>'.$opt1.'</td>
        <td>'.$opt2.'</td>
        <td>'.$opt3.'</td>
        <td>'.$opt4.'</td>
        <td>'.$ans.'</td>
        <td id="row" ><a href="editQues.php?id='.$eid.'">Edit</a> / <a href="deleteQues.php?id='.$eid.'">Delete</a></td>
        </tr>';
    }
}
?>
</table>
</div>
</div>
<?php include 'footer.php'?>