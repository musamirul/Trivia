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
<span id="timer"></span>
 

</div>


</body>
</footer>

<script src="Interface/style/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="Interface/style/jQuery/jquery-3.6.0.min.js"></script>
<script src="Interface/style/DataTables/js/jquery.dataTables.min.js"></script>
<script src="Interface/style/DataTables/js/dataTables.bootstrap5.min.js"></script>
<script src="Interface/style/summernote/summernote-lite.js"></script>
<script src="countdown/jquery.countdown.js"></script>
<script>
window.onload = function() {

    if(typeof localStorage.getItem("min") !== 'undefined' && typeof localStorage.getItem("sec") !== 'undefined' && localStorage.getItem("min")!= null && localStorage.getItem("sec")!= null ){
        var min = localStorage.getItem("min");
        var sec = localStorage.getItem("sec");
    }
    else {
       console.log("c2");
       var min = "0"+20;
       var sec = "0"+0;
    }
    var time;

    setInterval(function()
    {

        localStorage.setItem("min", min);
        localStorage.setItem("sec", sec);
        time= min +" : "+ sec;
        document.getElementById("timer").innerHTML = time ;
        if(sec == 00)
        {
            if(min !=0)
            {
                min--;
                sec=59;
                if(min < 10)
                {
                    min="0"+min;
                }
            }
        }
        else
        {
            sec--;
            if(sec < 10)
            {
                sec="0"+sec;
            }
        }

        if(sec <= 0 && min <=0) {
            localStorage.removeItem('min');
            localStorage.removeItem('sec');
            window.location="logout.php";
        }
    },1000);
}

</script>
</body>
</html>