<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Interface/style/bootstrap/css/bootstrap.min.css" media="screen">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="Interface/style/DataTables/css/jquery.dataTables.css">
    <link href="Interface/style/summernote/summernote-lite.css" rel="stylesheet">

  </head>
  <body>

<header>
    <?php
    session_start();
    include("includes/config.php");
    if(isset($_SESSION['message'])){
        $_SESSION['message'];
        echo "<div class='alert alert-success mt-3 ms-5' role='alert' style='position : absolute; width:500px'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"
        . $_SESSION['message'] .
        "</div>";

        unset($_SESSION['message']);
    }   
    
?>
</header>
      <main>
        <div class="container-fluid">
            <div class="row m-5 shadow bg-body rounded" style="height: 600px;">

                <div class="col-12">
                    <div class="row">
                            <div class="col-12">
                            <center><h2 style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">Sign in</h2></center>
                            <center><span style="color: grey; font-size: 13px;">Free access to our quiz system</span></center>
                            
                              <div class="tab-content" id="pills-tabContent">
                                  <!--Nav bar Sign In-->
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <form method="POST">
                                        <div class="row mb-3 mt-4">
                                            <input type="text" class="form-control" name="username" placeholder="Please enter your username" required/>
                                        </div>
                                        <div class="row mb-3">
                                            <input type="password" class="form-control" name="password" placeholder="Please enter your password" required/>
                                        </div>
                                        <div class="d-grid gap-1">
                                            <button class="btn btn-primary" name="login" type="submit">Sign In</button>
                                        </div>
                                    </form>
                                </div>
                              </div>
                            </div>
                            
                        <div class="col-3"></div>
                    </div>

                </div>
            </div>

<?php
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //check username and password
    $Query_Check = mysqli_query($con,"SELECT * FROM admin_acc WHERE (admin_username ='$username' AND admin_password = '$password')");
    $result = mysqli_fetch_array($Query_Check);
    
    if($result>0){
         
            $_SESSION['username'] = $result['admin_username'];
            echo '<script>window.location.href="home.php"</script>';

    }else{
        $_SESSION['message'] = 'username not found';
        echo '<script>window.location.href="index.php"</script>';
    }
}
?>


<?php include("Interface/footer.php");