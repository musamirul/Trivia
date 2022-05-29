<?php
    include("Interface/header.php");
    $_SESSION['trivia'];
?>
<h2>Create Question</h2>
<form method="post">
    <input type="text" name="question" placeholder="Enter question"/>
    <input type="number" name="choice" placeholder="Enter Total Choice"/>
    <button type="submit" name="createQuestion">Create Question</button>
</form>

 <table id="example" class="display center" style="width: 100%; text-align: center; font-size: 13px;">
    <thead>
        <tr>
            <th>Question ID</th>
            <th>Question</th>
            <th>Question Choice</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            //display all table data
            $query_showData = mysqli_query($con,"SELECT * FROM questions");
            while($result_showData = mysqli_fetch_array($query_showData)){
            $question_id = $result_showData['question_id'];
        ?>
        <tr>
            <td><?php echo $result_showData['question_id']; ?></td>
            <td><?php echo $result_showData['question']; ?></td>
            <td><?php echo $result_showData['question_choice']; ?></td>
            <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#QuestionModal<?php echo $question_id ?>">Add Answer</button>
            </td>
        </tr>
            <div class="modal fade" id="QuestionModal<?php echo $question_id ?>" tabindex="-1" aria-labelledby="editModalLabel" class="modal fade" role="dialog">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel"><strong><?php echo $result_showData['question']; ?></strong></h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form method="POST">
                        <div class="row mb-3 mt-4">
                            <label class="col-sm-2 col-form-label">Correct</label>
                            <div class="col-sm-10">
                                <?php
                                    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                                    echo $correct_rida = substr(str_shuffle($permitted_chars), 0, 5).''.rand(1000000000,100000000000);
                                ?>
                                <input type="hidden" value="<?php echo $correct_rida ?>" name="correct_rid">
                                <input type="text" class="form-control" name="correct" placeholder="enter correct answer" required/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Wrong</label>
                            <div class="col-sm-10">
                                <?php
                                    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                                    echo $wrongOne_rida = substr(str_shuffle($permitted_chars), 0, 5).''.rand(1000000000,100000000000);
                                ?>
                                <input type="hidden" value="<?php echo $wrongOne_rida ?>" name="wrongOne_rid">
                                <input type="text" class="form-control" name="wrong_one" required/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Wrong</label>
                            <div class="col-sm-10">
                                <?php
                                    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                                    echo $wrongTwo_rida = substr(str_shuffle($permitted_chars), 0, 5).''.rand(1000000000,100000000000);
                                ?>
                                <input type="hidden" value="<?php echo $wrongTwo_rida ?>" name="wrongTwo_rid">
                                <input type="text" class="form-control" name="wrong_two" required/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Wrong</label>
                            <div class="col-sm-10">
                                <?php
                                    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                                    echo $wrongThree_rida = substr(str_shuffle($permitted_chars), 0, 5).''.rand(1000000000,100000000000);
                                ?>
                                <input type="hidden" value="<?php echo $wrongThree_rida ?>" name="wrongThree_rid">
                                <input type="text" class="form-control" name="wrong_three" required/>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <input type="hidden" value="<?php echo $result_showData['question_id']; ?>" name="question_id">
                        <button class="btn btn-primary" name="saveDetail" type="submit">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>   
                </div>
                </div>
            </div>
        <?php
            }
        ?>
    </tbody>
</table>
<?php
    if(isset($_POST['saveDetail'])){
        $correct = $_POST['correct'];
        $wrong_one = $_POST['wrong_one'];
        $wrong_two = $_POST['wrong_two'];
        $wrong_three = $_POST['wrong_three'];

        $correct_rid = $_POST['correct_rid'];
        $wrongOne_rid = $_POST['wrongOne_rid'];
        $wrongTwo_rid = $_POST['wrongTwo_rid'];
        $wrongThree_rid = $_POST['wrongThree_rid'];

        $Quest_id = $_POST['question_id'];
        $query_addcorrect = mysqli_query($con,"INSERT INTO answers(answer_rid, fk_answer_question_id) VALUES ('$correct_rid','$Quest_id')");

        $query_addcorrect_opt = mysqli_query($con,"INSERT INTO options(question_rid, option_list, fk_option_question_id) 
        VALUES ('$correct_rid','$correct','$Quest_id')");

        $query_addwrongOne_opt = mysqli_query($con,"INSERT INTO options(question_rid, option_list, fk_option_question_id) 
        VALUES ('$wrongOne_rid','$wrong_one','$Quest_id')");

        $query_addwrongTwo_opt = mysqli_query($con,"INSERT INTO options(question_rid, option_list, fk_option_question_id) 
        VALUES ('$wrongTwo_rid','$wrong_two','$Quest_id')");

        $query_addwrongThree_opt = mysqli_query($con,"INSERT INTO options(question_rid, option_list, fk_option_question_id) 
        VALUES ('$wrongThree_rid','$wrong_three','$Quest_id')");

        echo '<script>window.location.href="Admin_AddQuestion.php"</script>';

    }
?>
<?php
    if(isset($_POST['createQuestion'])){

        $question = $_POST['question'];
        $choice = $_POST['choice'];
        $trivia = $_SESSION['trivia'];
        $query_updateQuestion = mysqli_query($con,"INSERT INTO questions(question, question_choice, fk_question_trivia_id) 
        VALUES ('$question','$choice','$trivia')");

        echo '<script>window.location.href="Admin_AddQuestion.php"</script>';
    }
?>
<?php include("Interface/footer.php") ?>