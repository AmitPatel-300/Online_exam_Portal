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
global $id;
$id=$_REQUEST['id'];
?>
<?php include 'header.php';?>
<?php include 'config.php';?>
<?php
if (isset($_POST['Ques'])) {
    $testid=isset($_POST['sel'])?$_POST['sel']:'';
    $qt=isset($_POST['questitle'])?$_POST['questitle']:'';
    $opt1=isset($_POST['opt1'])?$_POST['opt1']:'';
    $opt2=isset($_POST['opt2'])?$_POST['opt2']:'';
    $opt3=isset($_POST['opt3'])?$_POST['opt3']:'';
    $opt4=isset($_POST['opt4'])?$_POST['opt4']:'';
    $ans=isset($_POST['ans'])?$_POST['ans']:'';
    echo $testid;

    $sql="INSERT into question (`online_exam_id`, `ques_title`, 
    `option1`,  `option2`,`option3`, `option4`,`ansoption`) VALUES 
    ('".$testid."','".$qt."', '".$opt1."', '".$opt2."', '".$opt3."',
    '".$opt4."', '".$ans."')";
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
<li><a href="">User</a>
<li><a href="homepage.php">Logout</a>
</ul>
<div id="quesform">
<form action="addQues.php" method="POST">
<label>Exam *</label> 
<?php 
$sql="Select * from online_exam where online_exam_id='".$id."'";
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
<input type="text" name="questitle" required><br><br>
<label>Option 1 *</label>
<input type="text" name="opt1" required><br><br>
<label>Option 2 *</label>
<input type="text" name="opt2" required><br><br>
<label>Option 3 *</label>
<input type="text" name="opt3" required><br><br>
<label>Option 4 *</label>
<input type="text" name="opt4" required><br><br>
<label>Answer *</label>
<input type="text" name="ans" required><br><br>
<input type="submit" name="Ques" value="ADD" id="ques">
<input type="reset">
</form>
</div>
</div>
</div>
<?php include 'footer.php';?>