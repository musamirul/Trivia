<table id="example" class="shadow-lg display center mt-5" style="width: 100%; text-align: center;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Staff ID</th>
            <th>Right Ans</th>
            <th>Wrong Ans</th>
            <th>Total Score</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            //display all table data
            $query_showData = mysqli_query($con,"SELECT * FROM user");
            while($result_showData = mysqli_fetch_array($query_showData)){

            $user_id = $result_showData['user_id'];
            $query_showHist = mysqli_query($con,"SELECT * FROM history WHERE fk_history_user_id='$user_id'");
            $result_showHist = mysqli_fetch_array($query_showHist);
        ?>
        <tr>
            <td><?php echo $result_showData['user_id'] ?></td>
            <td><?php echo $result_showData['user_name']; ?></td>
            <td><?php echo $result_showData['user_staffid']; ?></td>
            <td><?php echo $result_showHist['history_right']; ?></td>
            <td><?php echo $result_showHist['history_wrong']; ?></td>
            <td><?php echo $result_showHist['history_score']; ?></td>
            <td><?php echo $result_showHist['history_date']; ?></td>
            <td></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>