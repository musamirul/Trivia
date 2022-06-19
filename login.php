<?php 
include("includes/config.php"); 
session_start();
?>
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
      </span>
    </div>
  </div>
</nav>
<div class="container">
        <?php 
            if(isset($_SESSION['message'])){
                $_SESSION['message'];
                echo "<div class='alert alert-success mt-3 ms-5' role='alert' style='position : absolute; width:500px'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"
                . $_SESSION['message'] .
                "</div>";

                unset($_SESSION['message']);
            } 
        ?>
    <div class="row">
        <div class="col">
            <div class="position-absolute top-50 start-50 translate-middle">
                <div class="card shadow-lg bg-body rounded" style="width: 500px;">
                    <h5 class="card-header">Enter your details below</h5>
                    <div class="card-body">
                    <form method="POST">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Fullname</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" placeholder="Please enter your Full Name" required/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Staff No</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="staffNo" placeholder="Please enter your Staff Number" required/>
                            </div>
                        </div>
                        <div class="d-grid gap-1">
                            <button class="btn btn-primary" name="access" type="submit">Lets Go</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <?php 
            if(isset($_POST['access'])){
                $name = $_POST['name'];
                $staffNo = $_POST['staffNo'];

                $query_access = mysqli_query($con,"SELECT * FROM user WHERE user_staffid= '$staffNo'");
                $result_access = mysqli_fetch_array($query_access);
                
                if($result_access>0){
                    $hasSubmit = $result_access['has_submit'];
                    if($hasSubmit=='yes'){
                        $_SESSION['message'] = "You have already submit the trivia, thank you for the submission";
                        echo '<script>window.location.href="login.php"</script>';
                    }elseif($hasSubmit=='no'){
                        $_SESSION['name'] = $name;
                        $_SESSION['staffNo'] = $staffNo;
                        
                        echo '<script>window.location.href="account.php?q=1"</script>';

                    }
                }else{
                    $query_submit = mysqli_query($con,"INSERT INTO user(user_name, user_staffid,has_submit) VALUES ('$name','$staffNo','no')");
                    $_SESSION['name'] = $name;
                    $_SESSION['staffNo'] = $staffNo;

                    //echo '<script>window.location.href="trivia.php"</script>';
                    echo '<script>window.location.href="account.php?q=1"</script>';
                }
            }

            ?>
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