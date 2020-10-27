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
<?php require 'config.php' ;?>
<?php
$id=$_REQUEST['qid'];
?>
<?php
if (isset($_POST['update'])) {
    $testid=isset($_POST['sel'])?$_POST['sel']:'';
    $qt=isset($_POST['questitle'])?$_POST['questitle']:'';
    $opt1=isset($_POST['opt1'])?$_POST['opt1']:'';
    $opt2=isset($_POST['opt2'])?$_POST['opt2']:'';
    $opt3=isset($_POST['opt3'])?$_POST['opt3']:'';
    $opt4=isset($_POST['opt4'])?$_POST['opt4']:'';
    $ans=isset($_POST['ans'])?$_POST['ans']:'';

    $sql="UPDATE question SET online_exam_id='".$testid."', 
    ques_title='".$qt."',`option1`='".$opt1."',
    `option2`='".$opt2."',`option3`='".$opt3."',`option4`='".$opt4."',
    `ansoption`='".$ans."' WHERE ques_id='".$id."'";
    $result=$conn->query($sql);
    if ($result === true) {
        header('location:exam.php'); 
    } else {
        $errors= array('input' => 'form', 'msg'=> $conn->error);
    }
    $conn->close();
}
?>