<?php 
    include("includes/config.php");
    session_start();
    $staffNo = $_SESSION['staffNo'];

    $query_user = mysqli_query($con,"SELECT * FROM user WHERE user_staffid = '$staffNo'");
    $result_user = mysqli_fetch_array($query_user);
    $user_id = $result_user['user_id'];

    if(@$_GET['q']=='quiz' && @$_GET['step']==2){
        $eid=@$_GET['eid'];
        $sn=@$_GET['n'];
        $total=@$_GET['t'];
        echo $ans=$_POST['ans'];
        $qid=@$_GET['qid'];
        $query_ans=mysqli_query($con,"SELECT * FROM answers WHERE answer_rid='$ans'");
        while($row=mysqli_fetch_array($query_ans)){
            $ansid=$row['answer_rid'];
        }
        if($ans != null){
            if($ans == $ansid){
                if($sn==1){
                    date_default_timezone_set("Asia/Kuala_Lumpur");
                    $date = date("Y-m-d h:i:sa");
                    //create new history for new user
                    $query_NewHistory = mysqli_query($con,"INSERT INTO history(history_score, history_right,history_wrong, history_date, fk_history_user_id, fk_history_trivia_id) 
                    VALUES ('0','0','0','$date','$user_id','$eid')");
                    $query_UpdateUser = mysqli_query($con,"UPDATE user SET has_submit='yes' WHERE user_staffid='$staffNo'");
                }
    
                $query_history = mysqli_query($con,"SELECT * FROM history WHERE fk_history_user_id = '$user_id' AND fk_history_trivia_id ='$eid'");
                while($row=mysqli_fetch_array($query_history)){
                    $score = $row['history_score'];
                    $right = $row['history_right'];
                }
                $right++;
                $query_updateHistory = mysqli_query($con,"UPDATE history SET history_score='$right',history_right='$right' 
                WHERE fk_history_user_id = '$user_id' AND fk_history_trivia_id ='$eid'");
    
            }else{
                //IF WRONG
                if($sn==1){
                    date_default_timezone_set("Asia/Kuala_Lumpur");
                    $date = date("Y-m-d h:i:sa");
                    //create new history for new user
                    $query_NewHistory = mysqli_query($con,"INSERT INTO history(history_score, history_right,history_wrong, history_date, fk_history_user_id, fk_history_trivia_id) 
                    VALUES ('0','0','0','$date','$user_id','$eid')");
                    $query_UpdateUser = mysqli_query($con,"UPDATE user SET has_submit='yes' WHERE user_staffid='$staffNo'");
                }
    
                $query_Whistory = mysqli_query($con,"SELECT * FROM history WHERE fk_history_user_id = '$user_id' AND fk_history_trivia_id ='$eid'");
                while($row=mysqli_fetch_array($query_Whistory)){
                    $score = $row['history_score'];
                    $wrong = $row['history_wrong'];
                }
                $wrong++;
                $query_WupdateHistory = mysqli_query($con,"UPDATE history SET history_wrong='$wrong' 
                WHERE fk_history_user_id = '$user_id' AND fk_history_trivia_id ='$eid'");
            }
        }elseif($ans == null){
            //IF WRONG
            if($sn==1){
                date_default_timezone_set("Asia/Kuala_Lumpur");
                $date = date("Y-m-d h:i:sa");
                //create new history for new user
                $query_NewHistory = mysqli_query($con,"INSERT INTO history(history_score, history_right,history_wrong, history_date, fk_history_user_id, fk_history_trivia_id) 
                VALUES ('0','0','0','$date','$user_id','$eid')");
                $query_UpdateUser = mysqli_query($con,"UPDATE user SET has_submit='yes' WHERE user_staffid='$staffNo'");
            }

            $query_Whistory = mysqli_query($con,"SELECT * FROM history WHERE fk_history_user_id = '$user_id' AND fk_history_trivia_id ='$eid'");
            while($row=mysqli_fetch_array($query_Whistory)){
                $score = $row['history_score'];
                $wrong = $row['history_wrong'];
            }
            $wrong++;
            $query_WupdateHistory = mysqli_query($con,"UPDATE history SET history_wrong='$wrong' 
            WHERE fk_history_user_id = '$user_id' AND fk_history_trivia_id ='$eid'");
        }
        
        if($sn != $total){
            $sn++;
            header("location:account.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total")or die("Error152");
        }else{
            header("location:account.php?q=complete")or die("Error152");
        }
    }
?>