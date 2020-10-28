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
global $examid;
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
<?php include 'config.php' ?>
<?php
if (isset($_POST['select'])) {
    $examid=isset($_POST['examsel'])?$_POST['examsel']:'';
    $sql="Select * from online_exam where online_exam_id='".$examid."'";
    $result=$conn->query($sql);
    if ($result->num_rows>0) {
        while ($rows=$result->fetch_assoc()) {
            $title=$rows['online_exam_title'];
            $date=$rows['online_exam_datetime'];
            $total=$rows['total_question'];
            $mr=$rows['marks_per_right_ans'];
            $mw=$rows['marks_per_wrong_ans'];
        }
    }
}
?>
<div id="add">
<div id="nav2">
<ul>
<li><a href="user.php">User Side</a>
<li><a href="viewExam">Exam</a>
<li><a href="profile.php">Profile</a>
<li><a href="result.php">Result</a>
<li><a href="logout.php">Logout</a>
</ul>
Select Your exam...<br><br>
<form action="user.php" method="POST">
<select name="examsel" id="optionselector"  style="width:600px;height:30px">
<option value="0">Select....</option>
<?php
$sql="Select * from online_exam";
$result=$conn->query($sql);
if ($result->num_rows>0) {
    while ($rows=$result->fetch_assoc()) {
        $exam=$rows['online_exam_title'];
        ?>
    <option value="<?php echo $rows['online_exam_id']?>"><?php echo $exam;?></option>
        <?php
    }
}
?>
 </select> <br>
 <input id="selexam" type="submit" name="select" value="click to view exam details" style="width:300px;color:red">
</form>
 <div id="examform"><br>
     Exam detail
<form action="" method="POST">
<label>Exam Title:</label>
<input type="text" name="examtitle" required><br><br>
<label>Exam date_time:</label>
<input type="text" name="examdt"><br><br>
<label>Total Question:</label>
<input type="text" name="examques" required><br><br>
<label>Marks per_right_ans:</label>
<input type="text" name="examright" required><br><br>
<label>Marks per_wrong_ans:</label>
<input type="text" name="examwrong" required><br><br>
<input type="submit" name="EXAM" value="Enroll" id="EXAM">
</form>
</div>   
</div>
</div>

<?php include 'footer.php';?>