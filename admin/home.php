<?php include("Interface/header.php"); ?>
<?php
    @$page = $_GET['page'];

    if($page != ''){
        if($page == "Admin_ManageTrivia"){
            include("Admin_ManageTrivia.php");
        }
        if($page == "Admin_AddQuestion"){
            include("Admin_AddQuestion.php");
        }
    }
?>

<?php include("Interface/footer.php"); ?>