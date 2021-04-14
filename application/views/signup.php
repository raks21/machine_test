<!DOCTYPE html>
<html>
    <head>
        <title>Signup</title>
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
            <h1>Signup</h1>
            <br>
            <form method="POST" action="<?php echo base_url(); ?>index.php/user/insert_data">
				<div id="div3">
					<input type="text" name="firstname" class="form-control" placeholder="First Name" value="Dummy First" readonly>
					<br>
					<input type="text" name="lastname" class="form-control" placeholder="Last Name" value="Dummy Last" readonly>
					<br>
					<input type="email" name="email" class="form-control" placeholder="Email" value="dummy@dummy.com" readonly>
					<br>
					<input type="password" name="password" class="form-control" placeholder="Password" value="Dummy123" readonly>
					<br>
					<button name="submit" type="submit" class ="btn btn-primary">Submit</button>
				</div>
            </form>
        </div>        
    </body>
</html>