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
global $id,$examname,$total_marks,$your_score,$avg;
$id=$_REQUEST['id'];
?>
<?php
session_start();
$email=$_SESSION['userEmail'];
if ($email == '') {
    $se="please login first";
    header('location:../homepage.php');
}
if ($id=='0') {
    header("location:user.php");
}
$session=$_SESSION['sessionid'];
?>
<?php include 'header.php';?>
<?php include 'config.php' ?>
<?php
if (isset($_POST['submit'])) {
    $sessionid=isset($_POST['sess'])?$_POST['sess']:'';
    $ename=isset($_POST['examname'])?$_POST['examname']:'';
    $useremail=isset($_POST['useremail'])?$_POST['useremail']:'';
    $tm=isset($_POST['tm'])?$_POST['tm']:'';
    $ym=isset($_POST['ym'])?$_POST['ym']:'';
    $sta=isset($_POST['status'])?$_POST['status']:'';

    $sql="INSERT into result (`session_id`, `exam_name`, 
    `user_email`, `total_marks`,`your_marks`,`status`) VALUES 
    ('".$sessionid."','".$ename."', '".$useremail."', '".$tm."', '".$ym."', 
    '".$sta."')";
    if ($conn-> query($sql) === true) {
        header('location:user.php');
    } else {
        $errors= array('input' => 'form', 'msg'=> $conn->error);
    }
    $conn->close();
}
?>
<?php
$sql="select * from online_exam where online_exam_id='".$id."'";
$result=$conn->query($sql);
if ($result->num_rows>0) {
    while ($row=$result->fetch_assoc()) {
        $examname=$row['online_exam_title'];
        $mr=$row['marks_per_right_ans'];
        $mw=$row['marks_per_wrong_ans'];
    }
}
?>

<div id="NAV">
<div id="NAV">
<table>
<tr>
<th>Exam Name</th>
<th>Question</th>
<th>Option 1</th>
<th>Option 2</th>
<th>Option 3</th>
<th>Option 4</th>
<th>Correct Answer</th>
<th>Your Answer</th>
</tr>
<?php
$sql2="select * from user_answer where online_exam_id='".$id."'";
$result=$conn->query($sql2);
$count=$result->num_rows;
$total_marks=$count*$mr;
$avg=ceil($total_marks/2);
echo '<p>Total Marks :: ';echo $total_marks;
echo '</p>';
if ($result->num_rows>0) {
    while ($rows=$result->fetch_assoc()) {
        $qt=$rows['question'];
        $opt1=$rows['option1'];
        $opt2=$rows['option2'];
        $opt3=$rows['option3'];
        $opt4=$rows['option4'];
        $correct_ans=$rows['correct_ans'];
        $user_ans=$rows['user_ans'];
        echo '<tr>
        <td>'.$examname.'</td>
        <td>'.$qt.'</td>
        <td>'.$opt1.'</td>
        <td>'.$opt2.'</td>
        <td>'.$opt3.'</td>
        <td>'.$opt4.'</td>
        <td>'.$correct_ans.'</td>
        <td>'.$user_ans.'</td>
        </tr>';
        if ($user_ans==$correct_ans) {
            $your_score=$your_score+$mr;
        } else {
            $your_score=$your_score-$mw;
        }
    }
}
echo '<p>Your Marks :: ';
echo $your_score;
echo '</p>';

echo '<p>Result :: ';
if ($your_score >$avg) {
    $status="Pass";
    echo $status;
} else {
    $status="Fail";
    echo $status;
}
echo '</p>';
?>
</table>
<form action="viewResult.php" method="POST">
<input type="hidden" name="sess" value="<?php echo $session?>">
<input type="hidden" name="examname" value="<?php echo $examname?>">
<input type="hidden" name="useremail" value="<?php echo $email?>">
<input type="hidden" name="tm" value="<?php echo $total_marks?>">
<input type="hidden" name="ym" value="<?php echo $your_score?>">
<input type="hidden" name="status" value="<?php echo $status?>">
<input id="home" type="submit" name="submit" value="Home">
</form>
</div>
</div>
<?php include 'footer.php';?>