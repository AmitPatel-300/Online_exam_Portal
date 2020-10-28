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
$page;
$num_per_page;
global $total_page;
$start_from;
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
        $qt=$rows['ques_title'];
        $opt1=$rows['option1'];
        $opt2=$rows['option2'];
        $opt3=$rows['option3'];
        $opt4=$rows['option4'];
        $ans=$rows['ansoption'];
      ?>
      <p id="ques"><?php echo $qt;?></p>
      <p id="radioques"><input type="radio" name="selected" value="1" id="opt"><?php echo $opt1;?><br>
      <input type="radio" name="selected" value="2" id="opt"><?php echo $opt2;?><br>
      <input type="radio" name="selected" value="3" id='opt'><?php echo $opt3;?><br>
      <input type="radio" name="selected" value="4" id="opt"><?php echo $opt4;?><br>
       </p>
      <?php
    }
}
?>

</div>
<?php
if ($page==1) {
    echo "<a id='NP' href='startExam.php?id=".$id." && page=".($page+1)."'>Next</a>";
}

?>
<?php
$sql3="Select * from question where online_exam_id='".$id."'";
$result3=$conn->query($sql3);
$count=$result3->num_rows;
$total_page=ceil($count/$num_per_page);
if ($page>1 && $page!=$total_page) {
    echo "<a id='NP' href='startExam.php?id=".$id." && page=".($page+1)."'>Next</a>";
}

if ($page>1 && $page!=$total_page) {
    echo "<a id='NP' href='startExam.php?id=".$id." &&  page=".($page-1)."'>Previous</a>";
}
if($page>1 && $page==$total_page) {
    echo "<a id='NP' href='startExam.php?id=".$id." &&  page=".($page-1)."'>Previous</a>";
}
for ($i=1;$i<=$total_page;$i++) {
    //echo "<a id='NP' href='startExam.php?page=".$i."'>$i</a>";
}
?>
</div>
</div>
<?php include 'footer.php';?>