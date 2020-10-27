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
$date=date("Y-m-d H:i:s");
?>
<?php
$id=$_REQUEST['id'];
?>
<?php include 'header.php';?>
<?php include 'config.php';?>
<?php
$sql="Select * from online_exam WHERE online_exam_id='".$id."'";
$result=$conn->query($sql);
if ($result->num_rows>0) {
    while ($rows=$result->fetch_assoc()) {
        $id=$rows['online_exam_id'];
        $title=$rows['online_exam_title'];
        $ques=$rows['total_question'];
        $mr=$rows['marks_per_right_ans'];
        $mw=$rows['marks_per_wrong_ans'];
    }
}
?>
<div id="add">
<div id="nav2">
<ul>
<li><a href="admin.php">Admin Side</a>
<li><a href="exam.php">Exam</a>
<li><a href="">User</a>
<li><a href="logout.php">Logout</a>
</ul>
<div id="examform2">
<form action="updateExam.php?id=<?php echo $id;?>" method="POST">
<label>Exam Title:</label>
<input type="text" name="examtitle" value="<?php echo $title ?>" ><br><br>
<label>Exam date_time:</label>
<input type="text" name="examdt" value="<?php echo $date ?>" disabled><br><br>
<label>Total Question:</label>
<input type="text" name="examques" value="<?php echo $ques ?>" ><br><br>
<label>Marks per_right_ans:</label>
<input type="text" name="examright" value="<?php echo $mr ?>"><br><br>
<label>Marks per_wrong_ans:</label>
<input type="text" name="examwrong" value="<?php echo $mw ?>"><br><br>
<input type="submit" name="update" value="Update" id=edit>
</form>
</div>
</div>
</div>
<?php include 'footer.php';?>