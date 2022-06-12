<?php include("Interface/header.php"); ?>
<form method="POST">
    <div class="row mb-3 mt-4">
        <input type="text" class="form-control" name="name" placeholder="Please enter your Full Name" required/>
    </div>
    <div class="row mb-3">
        <input type="text" class="form-control" name="staffNo" placeholder="Please enter your Staff Number" required/>
    </div>
    <div class="d-grid gap-1">
        <button class="btn btn-primary" name="access" type="submit">Lets Go</button>
    </div>
</form>

<?php 
if(isset($_POST['access'])){
    $name = $_POST['name'];
    $staffNo = $_POST['staffNo'];

    $query_access = mysqli_query($con,"SELECT * FROM user WHERE user_staffid= '$staffNo'");
    $result_access = mysqli_fetch_array($query_access);
    
    if($result_access>0){
        echo 'you have answer the question';
    }else{
        $query_submit = mysqli_query($con,"INSERT INTO user(user_name, user_staffid) VALUES ('$name','$staffNo')");
        $_SESSION['name'] = $name;
        $_SESSION['staffNo'] = $staffNo;

        echo '<script>window.location.href="trivia.php"</script>';
    }
    
}

?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/myjs.js"></script>
<script type="text/javascript" src="js/sweetalert.js"></script>
<?php include("Interface/footer.php"); ?>