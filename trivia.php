<?php include("Interface/header.php"); ?>

<?php
    $count = 1;
    //show all questions
    $query_question = mysqli_query($con,"SELECT * FROM questions WHERE fk_question_trivia_id = '2' ORDER BY RAND()");
    ?>
        <form method="POST"> 
    <?php
    while($result_question = mysqli_fetch_array($query_question)){
    $question = $result_question['question'];
    $question_id = $result_question['question_id'];
?>
    <br/>
    <b>Question <?php echo $count ?> ::</b><br/>
    <b><?php echo $question ?></b>
        <?php
            //show all option
            $query_option = mysqli_query($con,"SELECT * FROM options WHERE fk_option_question_id = '$question_id' ORDER BY RAND()");
        ?>
                <div class="form-check">
                
        <?php
            while($result_option = mysqli_fetch_array($query_option)){
                $option = $result_option['option_list'];
                $option_rid = $result_option['question_rid'];
                echo'<input class="form-check-input" type="radio" name="option'.$count.'" value="'.$option_rid.'">&nbsp;'.$option.'<br /><br />';
            }
        ?>
                </div>
        <?php
    $count++;
    }
?>
    <button class="btn btn-primary" name="saveDetail" type="submit">Save</button>
    </form>

<?php
 if(isset($_POST['saveDetail'])){
     echo $option1 = $_POST['option1'];
     echo $option2 = $_POST['option2'];
     echo $option3 = $_POST['option3'];
     echo $option4 = $_POST['option4'];
     echo $option5 = $_POST['option5'];
     echo $option6 = $_POST['option6'];
     echo $option7 = $_POST['option7'];
     echo $option8 = $_POST['option8'];
     echo $option9 = $_POST['option9'];
     echo $option10 = $_POST['option10'];
 }

?>

<?php include("Interface/footer.php"); ?>