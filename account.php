<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Interface/style/bootstrap/css/bootstrap.min.css" media="screen">
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>-->
    <link href="Interface/style/chosen/chosen.css" rel="stylesheet">
    <link href="Interface/style/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="Interface/style/css/style1.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="Interface/style/DataTables/css/jquery.dataTables.css">
    <link href="Interface/style/summernote/summernote-lite.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="Interface/style/DataTables/dataTables.bootstrap5.min.css">-->
  </head>
  <?php
        include("includes/config.php"); 
      session_start();
      $staffNo = $_SESSION['staffNo'];
      $name = $_SESSION['name'];
      
  ?>

<body>
<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" style="color: aqua;">KPJ Klang Trivia Game</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      </ul>
      <span class="navbar-text" style="color: aquamarine;">
        Welcome! : <?php echo $name;?>
      </span>
    </div>
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col">
            <?php if(@$_GET['q']==1){ ?>
            <div class="position-absolute top-50 start-50 translate-middle">
                <div class="card shadow-lg bg-body rounded" style="width: 500px;">
                    <h5 class="card-header  bg-info">Are you ready!</h5>
                    <div class="card-body">
                        <?php
                            $query_trivia = mysqli_query($con,"SELECT * FROM trivia_type WHERE type_priority = 'yes'");
                            $result_trivia = mysqli_fetch_array($query_trivia);
                            $type_id = $result_trivia['type_id'];
                            $type_total = $result_trivia['type_total'];
                            $type_minute = $result_trivia['total_minute'];
                        ?>
                        <div class="row">
                            <div class="col-5"><b>Total Questions</b></div>
                            <div class="col-7"><?php echo $type_total; ?></div>
                        </div>
                        <div class="row mt-2 mb-2">
                            <div class="col-5"><b>Time Limit</b></div>
                            <div class="col-7"><?php echo $type_minute; ?> Minutes</div>
                        </div>
                        <p class="card-text">i) Attempts must be submitted before time expires, or they are not count</p>
                        <p class="card-text">ii) User are not allowed to redo or retake the trivia</p>
                        <?php

                            $queryQuiz = mysqli_query($con,"SELECT * FROM user WHERE user_staffid= '$staffNo'");
                            $resultQuiz = mysqli_fetch_array($queryQuiz);

                            $query_countactive = mysqli_query($con,"SELECT count(*) FROM questions WHERE fk_question_trivia_id = '$type_id'");
                            $result_countactive = mysqli_fetch_array($query_countactive);
                            $questionCount = $result_countactive[0];

                            if($resultQuiz['has_submit']=='no'){
                                function randomGen($min, $max, $quantity) {
                                  $numbers = range($min, $max);
                                  shuffle($numbers);
                                  return array_slice($numbers, 0, $quantity);
                                }
                                $r = (randomGen(1,$questionCount,$type_total));
                                $_SESSION['arr'] = $r;
                                $arrlength = count($r);
                                echo '<a href="account.php?q=quiz&step=2&eid='.$type_id.'&n=1&t='.$type_total.'" class="btn btn-primary">Lets Play</a>';
                                
                               
                            }else{
                                echo '<b>You have already submitted</b>';
                            }
                        ?>
                      
                    </div>
                  </div>
            </div>
            <?php }?>
            <?php if(@$_GET['q']== 'quiz' && @$_GET['step']== 2){
                $arr = $_SESSION['arr'];
                $eid = @$_GET['eid'];
                $sn=@$_GET['n'];
                $total = @$_GET['t'];
                $rand = $arr[$sn-1];
                $query_allQuest = mysqli_query($con,"SELECT * FROM questions WHERE question_count='$rand' AND fk_question_trivia_id='$eid'"); 
                echo '<div class="card shadow-lg bg-body rounded" style="margin:5%">';
                echo '<div class="card-body">';
                while($row=mysqli_fetch_array($query_allQuest)){
                    $qns = $row['question'];
                    $qid = $row['question_id'];
                    echo '<b>Question &nbsp;'.$sn.'&nbsp;::<br />'.$qns.'</b>';
                }
                $option_query=mysqli_query($con,"SELECT * FROM options WHERE fk_option_question_id ='$qid' ORDER BY RAND()");
                echo '<form action="update.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST"  class="form-horizontal">
                    <br />';
                while($row = mysqli_fetch_array($option_query)){
                    $option=$row['option_list'];
                    $optionid=$row['question_rid'];
                    echo '<div class="form-check">';
                    echo '<input class="form-check-input" type="radio" name="ans" value="'.$optionid.'">'.$option.'<br /><br />';
                    echo '</div>';
                }
                echo'<br /><button type="submit" class="btn btn-primary">Submit</button></form></div></div>';
            ?>
            <?php } ?>
            <!-- Complete-->
            <?php if(@$_GET['q']=='complete'){ ?>
            <div class="position-absolute top-50 start-50 translate-middle">
                <div class="card text-center bg-dark shadow-lg bg-body rounded" style="width: 500px;">
                    <img src="Interface/flower.JPG" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Congratulation</h5>
                        <p class="card-text">You have successfully attempt the trivia contest. We will announced the winner during the dinner receptal</p>
                        <a href="logout.php" class="btn btn-primary">Go Homepage</a>
                        <p class="card-text"><small class="text-muted">Thank You</small></p>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>

</div>


</body>
</footer>

<script src="Interface/style/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="Interface/style/jQuery/jquery-3.6.0.min.js"></script>
<script src="Interface/style/DataTables/js/jquery.dataTables.min.js"></script>
<script src="Interface/style/DataTables/js/dataTables.bootstrap5.min.js"></script>
<script src="Interface/style/summernote/summernote-lite.js"></script>

<script>
  window.setTimeout(function() {
$(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
});
}, 2000);
  </script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script>
$('#summernote').summernote({
  placeholder: 'Enter Product Details',
  tabsize: 2,
  height: 120,
  toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['view', ['fullscreen', 'codeview', 'help']]
  ]
});
$('#summernote_spec').summernote({
  placeholder: 'Enter Product Details',
  tabsize: 2,
  height: 120,
  toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['view', ['fullscreen', 'codeview', 'help']]
  ]
});
</script>
<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>
</body>
</html>