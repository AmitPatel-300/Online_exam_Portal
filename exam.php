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
date_default_timezone_set("Asia/Calcutta");
$datetime=date("Y-m-d H:i:s");
?>
<?php include 'header.php';?>
<?php include 'config.php';?>
<?php
if (isset($_POST['EXAM'])) {
    $name=isset($_POST['examtitle'])?$_POST['examtitle']:'';
    $ques=isset($_POST['examques'])?$_POST['examques']:'';
    $right=isset($_POST['examright'])?$_POST['examright']:'';
    $wrong=isset($_POST['examwrong'])?$_POST['examwrong']:'';
    echo '<script>document.getElementById("examform").style.display="none";
    </script>';

    $sql="INSERT into online_exam (`online_exam_title`, `online_exam_datetime`, 
    `total_question`, `marks_per_right_ans`, `marks_per_wrong_ans`) VALUES 
    ('".$name."', '".$datetime."', '".$ques."', '".$right."',
    '".$wrong."')";
    if ($conn-> query($sql) === true) {
        header("location:exam.php");
    } else {
         $errors= array('input' => 'form', 'msg'=> $conn->error);
    }
    $conn->close();
}
?>
<div id="add">
<div id="nav2">
<ul>
<li><a href="admin.php">Admin Side</a>
<li><a href="exam.php">Exam</a>
<li><a href="user.php">User</a>
<li><a href="logout.php">Logout</a>
</ul>
Online exam List
<input id="exam" type="submit" value="ADD">
<table>
<tr>
<th>Exam Title</th>
<th>Exam date_time</th>
<th>Total Question</th>
<th>Marks per_right_ans</th>
<th>Marks per_wrong_ans</th>
<th>Question</th>
<th>Action</th>
</tr>
<?php
$sql2="select * from online_exam";
$result=$conn->query($sql2);
if ($result->num_rows>0) {
    while ($rows=$result->fetch_assoc()) {
        $id=$rows['online_exam_id'];
        $t=$rows['online_exam_title'];
        $d=$rows['online_exam_datetime'];
        $tot=$rows['total_question'];
        $mr=$rows['marks_per_right_ans'];
        $mw=$rows['marks_per_wrong_ans'];
        echo '<tr>
        <td>'.$t.'</td>
        <td>'.$d.'</td>
        <td>'.$tot.'</td>
        <td>'.$mr.'</td>
        <td>'.$mw.'</td>
        <td id="row" ><a href="addQues.php?id='.$id.'">Add question</a>/<a href="viewQues.php?id='.$id.'">View question</a></td>
        <td id="row" ><a href="editExam.php?id='.$id.'">Edit</a> / <a href="deleteExam.php?id='.$id.'">Delete</a></td>
        </tr>';
    }
}
?>
</table>
<div id="examform">
<form action="exam.php" method="POST">
<label>Exam Title:</label>
<input type="text" name="examtitle" required><br><br>
<label>Exam date_time:</label>
<input type="text" name="examdt" value="<?php echo $datetime;?>" disabled><br><br>
<label>Total Question:</label>
<input type="text" name="examques" required><br><br>
<label>Marks per_right_ans:</label>
<input type="text" name="examright" required><br><br>
<label>Marks per_wrong_ans:</label>
<input type="text" name="examwrong" required><br><br>
<input type="submit" name="EXAM" value="ADD" id="EXAM">
<input type="reset">
</form>
</div>
</div>
</div>
<?php include 'footer.php';?>