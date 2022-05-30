<?php 
    include("Interface/header.php"); 
    if(!isset($_SESSION['ic'])){
        session_unset();
        header("Location:../login.php");
    }
    $ic_number = $_SESSION['ic'];
?>

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
     $result;
     $wrong_answer = 10 - $result;
     date_default_timezone_set("Asia/Kuala_Lumpur");
     $date = date("Y-m-d h:i:sa");

     $query_user = mysqli_query($con, "SELECT * FROM user WHERE user_ic = '$ic_number'");
     $result_user = mysqli_fetch_array($query_user);
     $user_id = $result_user['user_id'];

     $query_history = mysqli_query($con,"INSERT INTO history(history_score, history_right,history_wrong, history_date, fk_history_user_id, fk_history_trivia_id) 
     VALUES ('$result','$result','$wrong_answer','$date','$user_id','2')");

     session_unset();
     echo '<script>window.location.href="login.php"</script>';
 }

?>

<?php include("Interface/footer.php"); ?>