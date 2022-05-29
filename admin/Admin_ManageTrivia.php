<?php
    session_start();
    include("../includes/config.php");
    unset($_SESSION['trivia']);
?>

<h2>Create Trivia Details</h2>
<form method="post">
    <input type="text" name="title" placeholder="Enter Trivia Title"/>
    <input type="number" name="total" placeholder="Enter Total Question"/>
    <input type="number" name="minute" placeholder="Enter minutes to complete"/>
    <button type="submit" name="createTrivia">Create Trivia</button>
</form>

<table id="example" class="display center" style="width: 100%; text-align: center;">
    <thead>
        <tr>
            <th>Trivia ID</th>
            <th>Title</th>
            <th>Total Question</th>
            <th>Minutes to Complete</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            //display all table data
            $query_showData = mysqli_query($con,"SELECT * FROM trivia_type");
            while($result_showData = mysqli_fetch_array($query_showData)){
            $type_id = $result_showData['type_id']
        ?>
        <tr>
            <td><?php echo $type_id; ?></td>
            <td><?php echo $result_showData['type_title']; ?></td>
            <td><?php echo $result_showData['type_total']; ?></td>
            <td><?php echo $result_showData['total_minute']; ?></td>
            <td><?php echo $result_showData['type_date']; ?></td>
            <td>
                <form method="post" action="Admin_AddQuestion.php">
                    <?php $_SESSION['trivia'] = $type_id ?>
                    <button type="submit" class="btn btn-primary">Add Question</button>
                </form>
            </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>

<?php
    if(isset($_POST['createTrivia'])){
        $title = $_POST['title'];
        $total = $_POST['total'];
        $minute = $_POST['minute'];
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $todayDate = date('d-m-Y');

        $query_addTrivia = mysqli_query($con,"INSERT INTO trivia_type(type_title, type_total, total_minute, type_date) 
        VALUES ('$title','$total','$minute','$todayDate')");
    }
?>