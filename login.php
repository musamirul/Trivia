<?php include("Interface/header.php"); ?>
<form method="POST">
    <div class="row mb-3 mt-4">
        <input type="text" class="form-control" name="ic" placeholder="Please enter your IC Number" required/>
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
    $ic = $_POST['ic'];
    $staffNo = $_POST['staffNo'];

    $query_access = mysqli_query($con,"SELECT * FROM user WHERE user_ic = '$ic'");
    $result_access = mysqli_fetch_array($query_access);
    
    if($result_access>0){
        echo 'found';
    }else{
        $query_submit = mysqli_query($con,"INSERT INTO user(user_ic, user_staffid) VALUES ('$ic','$staffNo')");
        $_SESSION['ic'] = $ic;
        echo '<script>window.location.href="trivia.php"</script>';
    }
    
}

?>

<?php include("Interface/footer.php"); ?>