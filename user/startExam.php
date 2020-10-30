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
$page=1;
global $num_per_page;
global $total_page;
$start_from;
global $qt,$opt1,$opt2,$opt3,$opt4,$ans,$user_ans,$Ans;
?>
<?php
session_start();
$email=$_SESSION['userEmail'];
if ($email == '') {
    $se="please login first";
    header('location:../homepage.php');
}
$session=$_SESSION['sessionid'];
?>
<?php include 'header.php';?>
<?php include 'config.php' ?>
<?php
if (isset($_GET['page'])) {
    $page=$_GET['page'];
} else {
    $page=1;
}
$num_per_page=1;
$start_from=($page-1)*$num_per_page;
?>

<?php 
if (isset($_POST['submit'])) {
    $qid=isset($_POST['quesid'])?$_POST['quesid']:'';
    $qt=isset($_POST['ques'])?$_POST['ques']:'';
    $opt1=isset($_POST['opt1'])?$_POST['opt1']:'';
    $opt2=isset($_POST['opt2'])?$_POST['opt2']:'';
    $opt3=isset($_POST['opt3'])?$_POST['opt3']:'';
    $opt4=isset($_POST['opt4'])?$_POST['opt4']:'';
    $ans=isset($_POST['ans'])?$_POST['ans']:'';
    $user_ans=$_POST['selected'];

    $SQL="DELETE FROM user_answer WHERE `session_id`='".$session."' &&
     question='".$qt."'";
    $RESULT=$conn->query($SQL);
    if ($RESULT === true) {
                //echo '<script>alert("deleted");</script>';
    } else {
             $errors= array('input' => 'form', 'msg'=> $conn->error);
    }

    $sql="INSERT into user_answer (`session_id`, `online_exam_id`, 
    `ques_id`,`question`,`option1`,  `option2`,`option3`, `option4`,
    `correct_ans`,`user_ans`) VALUES ('".$session."','".$id."', '".$qid."', '".$qt."', 
    '".$opt1."','".$opt2."','".$opt3."', '".$opt4."','".$ans."','".$user_ans."')";
    if ($conn-> query($sql) === true) {
        // echo '<script>alert("inserted");</script>';
    } else {
        $errors= array('input' => 'form', 'msg'=> $conn->error);
    }
}
?>
<?php
$sql3="Select * from question where online_exam_id='".$id."'";
$result3=$conn->query($sql3);
$count=$result3->num_rows;
$total_page=ceil($count/$num_per_page);
?>
<?php if ($page>$total_page) {
    header("location:viewResult.php?id=$id");
}
?>
<div id="add">
<div id="nav2">
<ul>
<li><a href="user.php">User Side</a>
<li><a href="profile.php">Profile</a>
<li><a href="result.php">Result</a>
<li><a href="logout.php">Logout</a>
</ul>
<div id="startexam">
<?php
$sql="Select * from question where online_exam_id='".$id."' limit $start_from,$num_per_page ";
$result=$conn->query($sql);
if ($result->num_rows>0) {
    while ($rows=$result->fetch_assoc()) {
        $qid=$rows['ques_id'];
        $qt=$rows['ques_title'];
        $opt1=$rows['option1'];
        $opt2=$rows['option2'];
        $opt3=$rows['option3'];
        $opt4=$rows['option4'];
        $ans=$rows['ansoption'];
        ?>   
      <form action="startExam.php?page=<?php echo ($page+1);?>&id=<?php echo
        $id;?>" method=POST>
      <p id="ques">Q.<?php echo $page;?> <?php echo $qt;?></p>
      <p id="radioques">
      <input type="hidden" name="quesid" value="<?php echo $qid?>">
      <input type="hidden" name="ques" value="<?php echo $qt?>">
      <input type="hidden" name="opt1" value="<?php echo $opt1?>">
      <input type="hidden" name="opt2" value="<?php echo $opt2?>">
      <input type="hidden" name="opt3" value="<?php echo $opt3?>">
      <input type="hidden" name="opt4" value="<?php echo $opt4?>">
      <input type="hidden" name="ans" value="<?php echo $ans?>">
      <input type="hidden" name="selected" value="0">
        <?php
        $sql2="SELECT * from user_answer where session_id='".$session."' &&
       question='".$qt."'";
        $result2=$conn->query($sql2);
        if ($result2->num_rows>0) {
            while ($rows2=$result2->fetch_assoc()) {
                $Ans=$rows2['user_ans'];
            }
        }
        ?>
      <input type="radio" name="selected" value="1" id="opt1" <?php if ($Ans==1) :?>
      checked<?php endif ?>><?php echo $opt1;?><br>
      <input type="radio" name="selected" value="2" id="opt2" <?php if ($Ans==2) :?>
      checked<?php endif?>><?php echo $opt2;?><br>
      <input type="radio" name="selected" value="3" id='opt3' <?php if ($Ans==3) :?>
      checked<?php endif?>><?php echo $opt3;?><br>
      <input type="radio" name="selected" value="4" id="opt4" <?php if ($Ans==4) :?>
      checked<?php endif?>><?php echo $opt4;?><br>
        <?php if ($page ==1) :?><input id="option" type="submit" 
      name="submit" value="Next">
        <?php endif ?>
        <?php if ($page>1 && $page!=$total_page) :?><?php echo 
        "<a id='NP' href='startExam.php?page=".($page-1)."&id=".$id."'>
        Previous</a>";?>
      <input id="option" type="submit" name="submit" value="Next">
        <?php endif ?>
        <?php if ($page>1 && $page==$total_page) :?><?php echo 
        "<a id='NP' href='startExam.php?page=".($page-1)."&id=".$id."'>
        Previous</a>";?>
        <input id="option" type="submit" name="submit" value="Finish">
        <?php endif?>
       </p>
    </form>
      <?php
    }
}
?>

</div>
</div>
</div>
<?php include 'footer.php';?>