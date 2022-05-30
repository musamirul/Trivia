<script type="text/javascript" src="Interface/style/jQuery/jquery-3.6.0.min.js"></script>

<h1 align="center" style="color:green">A countdown timer in jquery</h1>

<h3 style="color:#FF0000" align="center">
 You will be logged out in : <span id='timer'></span>
 </h3>

<script>
	//define your time in second
		var c=1200;
        var t;
        timedCount();

        function timedCount()
		{

        	var hours = parseInt( c / 3600 ) % 24;
        	var minutes = parseInt( c / 60 ) % 60;
        	var seconds = c % 60;

        	var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);

            
        	$('#timer').html(result);
            if(c == 0 )
			{
            	//setConfirmUnload(false);
                //$("#quiz_form").submit();
				window.location="logout.html";
			}
            c = c - 1;
            t = setTimeout(function()
			{
			 timedCount()
			},
			1000);
        }
	</script>