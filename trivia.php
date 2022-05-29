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
     $result = 0;
     $query_answer = mysqli_query($con,"SELECT * FROM answers");
     while($result_answer = mysqli_fetch_array($query_answer)){
         for($x = 1; $x<= 10; $x++){
            if(!empty($_POST["option$x"])){
                if($result_answer['answer_rid'] == $_POST["option$x"]){
                    $result++;
                }
            }
         }
        
     }
     echo $result;
 }

?>

<?php include("Interface/footer.php"); ?>