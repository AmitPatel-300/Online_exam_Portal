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
<?php require 'config.php' ;?>
<?php
$id=$_REQUEST['id'];
?>
<?php
if (isset($_POST['update'])) {
    $name=isset($_POST['examtitle'])?$_POST['examtitle']:'';
    $ques=isset($_POST['examques'])?$_POST['examques']:'';
    $right=isset($_POST['examright'])?$_POST['examright']:'';
    $wrong=isset($_POST['examwrong'])?$_POST['examwrong']:'';

    $sql="UPDATE online_exam SET online_exam_title='".$name."', 
    online_exam_datetime='".$date."',`total_question`='".$ques."',
     `marks_per_right_ans`='".$right."', marks_per_wrong_ans='".$wrong."'
     WHERE online_exam_id='".$id."'";
    $result=$conn->query($sql);
    if ($result === true) {
        header('location:exam.php'); 
    } else {
        $errors= array('input' => 'form', 'msg'=> $conn->error);
    }
    $conn->close();
}
?>