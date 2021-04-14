<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<style>
            * 
            {
                font-family: 'Josefin Sans', sans-serif;
            }
            div
            {   
                display: flex;align-items: center;flex-direction: column;justify-content: center;text-align: center;
            }
			.form-control 
			{
    			width: 146%;
			}
        </style>
    </head>
    <body>
        <div class="centerdiv">
            <h1>Login</h1>
            <br>
            <form method="POST" action="<?php echo base_url(); ?>index.php/user/login">
				<div id="div1">
					<input type="email" name="email" class="form-control" id="email" placeholder="Enter Your email ID">
					<br>
					<input type="button" name="submit1" value="Submit" id="verify_email" class ="btn btn-primary">
				</div>
				<div id="div2">
					<input type="password" name="password" id="password" name="id" class="form-control" placeholder="Enter Your password">
					<br>
					<button name="submit2" type="submit" class ="btn btn-primary">Submit</button>
				</div>
            </form>
        </div>        
    </body>
	<script>
		$(document).ready(function()
		{	
			$("#div1").show();
			$("#div2").hide();
		});

		$("#verify_email").click(function()
		{
			var email = $("#email").val();
			$.ajax({
				type : "post",
				url : "<?php echo base_url(); ?>index.php/user/verify_email",
				data : { email : email},
				success : function(res)
				{
					if(res == true)
					{
						alert("Email Verified Successfully!!");
						$("#div1").hide();
						$("#div2").show();
					}
					else
					{
						alert("Email Not Found !! try again!!");
						window.location.href = "<?php echo base_url(); ?>index.php/user/signup";
					}
				}
			})
		});

		// $("#submit2").click(function()
		// {
		// 	var password = $("#password").val();
		// 	$.ajax({
		// 		type : "post",
		// 		url : "<?php echo base_url(); ?>index.php/user/login",
		// 		data : { email : email},
		// 		success : function(res)
		// 		{
		// 			if(res == true)
		// 			{
		// 				alert("Password Verified Successfully!!");
		// 			}
		// 			else
		// 			{
		// 				alert("Wrong Password !! try again!!");
		// 				$("#password").val("");
		// 			}
		// 		}
		// 	})
		// });
	</script>
</html>