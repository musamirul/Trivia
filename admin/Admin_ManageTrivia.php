<?php
    unset($_SESSION['trivia']);
?>

<h2>Manage Trivia</h2>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTrivia">
    Create New Trivia
</button>


<table class="shadow-lg display center mt-5" style="width: 100%; text-align: center;">
    <thead>
        <tr>
            <th>Trivia ID</th>
            <th>Title</th>
            <th>Total Question</th>
            <th>Added Question</th>
            <th>Minutes to Complete</th>
            <th>Date</th>
            <th>Display</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            //display all table data
            $query_showData = mysqli_query($con,"SELECT * FROM trivia_type");
            while($result_showData = mysqli_fetch_array($query_showData)){
            $type_id = $result_showData['type_id'];

            $query_totalAdded = mysqli_query($con,"SELECT count(*) FROM questions WHERE fk_question_trivia_id ='$type_id'");
            $result_totalAdded = mysqli_fetch_array($query_totalAdded);
            $totalAdded = $result_totalAdded[0];
        ?>
        <tr>
            <td><?php echo $type_id; ?></td>
            <td><?php echo $result_showData['type_title']; ?></td>
            <td><?php echo $result_showData['type_total']; ?></td>
            <td><?php echo $totalAdded; ?></td>
            <td><?php echo $result_showData['total_minute']; ?></td>
            <td><?php echo $result_showData['type_date']; ?></td>
            <form method="post">
            <td class="pt-3">
                <select class="form-select form-select-sm mb-3" name="option">
                    <option value="yes" <?php if($result_showData['type_priority']=='yes'){echo 'selected';} ?>>YES</option>
                    <option value="no" <?php if($result_showData['type_priority']=='no'){echo 'selected';}  ?>>NO</option>
                </select>
            </td>
            <td>
                <div class="d-flex pt-2 justify-content-center mb-3">
                    <div class="p-2">
                        <input type="hidden" value="<?php echo $type_id; ?>" name="type_id">
                            <button type="submit" name="updateOption" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                    <div class="p-2">
                        <form method="post">
                            <input type="hidden" value="<?php echo $type_id; ?>" name="Stype_id">
                            <button type="submit" name="addQuestion" class="btn btn-primary">Add Question</button>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>

<div class="modal fade" id="createTrivia" tabindex="-1" aria-labelledby="editModalLabel" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="createTrivia">Create New trivia</strong></h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form method="POST">
            <div class="row mb-3 mt-4">
                <input type="text" class="form-control" name="title" placeholder="Enter Trivia Title" required/>
            </div>
            <div class="row mb-3">
                <input type="number" class="form-control" name="total" placeholder="Enter Total Question" required/>
            </div>
            <div class="row mb-3">
                <input type="number" class="form-control" name="minute" placeholder="Enter minutes to complete" required/>    
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Display</label>
                <div class="col-sm-10">
                      <select class="form-select" class="form-select form-select-sm" name="display_option">
                        <option value="no">No</option>
                        <option value="yes">Yes</option>                                                    
                    </select>
                </div>
            </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit" name="createTrivia">Create Trivia</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </form>   
    </div>
    </div>
</div>

<?php
    if(isset($_POST['createTrivia'])){
        $title = $_POST['title'];
        $total = $_POST['total'];
        $minute = $_POST['minute'];
        $display_option = $_POST['display_option'];
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $todayDate = date('d-m-Y');

        $query_addTrivia = mysqli_query($con,"INSERT INTO trivia_type(type_title, type_total, total_minute, type_date, type_priority) 
        VALUES ('$title','$total','$minute','$todayDate','$display_option')");
        echo '<script>window.location.href="home.php?page=Admin_ManageTrivia"</script>';
    }

    if(isset($_POST['updateOption'])){
        $id = $_POST['type_id'];
        $option = $_POST['option'];

        $query_updateOption = mysqli_query($con, "UPDATE trivia_type SET type_priority='$option' WHERE type_id ='$id'");
        echo '<script>window.location.href="home.php?page=Admin_ManageTrivia"</script>';

    }
    if(isset($_POST['addQuestion'])){
        $Stype_id = $_POST['Stype_id'];
        $_SESSION['trivia'] = $Stype_id;
        echo '<script>window.location.href="home.php?page=Admin_AddQuestion"</script>';
    }
?>