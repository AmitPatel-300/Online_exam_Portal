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
$id=$_REQUEST['id'];
?>
<?php include 'header.php';?>
<?php include 'config.php';?>
<?php
$sql="Select * from question WHERE ques_id='".$id."'";
$result=$conn->query($sql);
if ($result->num_rows>0) {
    while ($rows=$result->fetch_assoc()) {
        $eid=$rows['online_exam_id'];
        $qt=$rows['ques_title'];
        $opt1=$rows['option1'];
        $opt2=$rows['option2'];
        $opt3=$rows['option3'];
        $opt4=$rows['option4'];
        $ans=$rows['ansoption'];
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
<div id="quesform">
<form action="updateQues.php?qid=<?php echo $id;?>" method="POST">
<label>Exam *</label> 
<?php 
$sql="Select * from online_exam where online_exam_id='".$eid."'";
$result=$conn->query($sql);
if ($result->num_rows>0) {
    while ($row=$result->fetch_assoc()) {
        ?>
<select name="sel">
    <option value="<?php echo $row['online_exam_id'];?>"><?php echo $row['online_exam_title'];?></option>
</select><br><br>
         <?php
    }
}
?>   
<label>Question Title *</label>
<input type="text" name="questitle" value="<?php echo $qt; ?>"><br><br>
<label>Option 1 *</label>
<input type="text" name="opt1" value="<?php echo $opt1; ?>"><br><br>
<label>Option 2 *</label>
<input type="text" name="opt2" value="<?php echo $opt2; ?>"><br><br>
<label>Option 3 *</label>
<input type="text" name="opt3" value="<?php echo $opt3; ?>"><br><br>
<label>Option 4 *</label>
<input type="text" name="opt4" value="<?php echo $opt4; ?>"><br><br>
<label>Answer *</label>
<input type="text" name="ans" value="<?php echo $ans; ?>"><br><br>
<input type="submit" name="update" value="Update">
</form>
</div>
</div>
</div>
<?php include 'footer.php';?>