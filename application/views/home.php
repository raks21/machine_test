<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
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
	
			<?php
				$user = $this->session->userdata('user');
				extract($user);
				var_dump($user);
			?>
			<h2>Welcome to Homepage </h2>
			<h4>User Info:</h4>
			<p>Fullname: <?php echo $firstname.$lastname; ?></p>
			<p>Email: <?php echo $email; ?></p>
			<form method = "post" action = "<?php echo base_url(); ?>index.php/user/update" enctype="multipart/form-data;charset=utf-8">
			<p>Select Department: 
				<select name="dept" class="form-control input-sm dept" >
					<?php foreach ($dept as $st) { ?>
						<?php if($department == $st['id']){ ?>
							<option value="<?php echo $st['id'];?>"><?php echo $st['Name'];?></option>					
						<?php }else{ ?>
							<!-- <option value="0">Select Department</option> -->

						<option value="<?php echo $st['id'];?>"><?php echo $st['Name'];?></option>					
					<?php }}?>
				</select>
			</p>
			<p>Select Sub Department: 
				<select name="subdept" class="form-control input-sm subdept">
					<?php foreach ($dept as $st) { ?>
					<?php if($department == $st['id']){ ?>
						<option value="<?php echo $st['id'];?>"><?php echo $st['sub_dept'];?></option>	
					<?php }} ?>	
				</select>
			</p>			
			<img style="width: 190px;height: 190px;border-radius: 112px;border: 3px solid #a7a7a7;margin-left: 16%;" 
			<?php if(!$photo) {?>
			src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
			<?php }else{ ?>
			src="data:image/png;base64,<?php echo $photo; ?>"
			<?php } ?>
			class="avatar img-circle img-thumbnail media-object image-size" id="preview" data-bind="attr:{src: headlineImage}" style="width: 314px;height: 173px;">					
				<h6>Upload a different photo...</h6>
				<input type="file" name="img" id="img" class="text-center center-block file-upload form-control-file edit">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="submit" name="submit" value="Submit" class="btn btn-info edit">
			</form>
			
			<a href="<?php echo base_url(); ?>index.php/user/logout" class="btn btn-danger">Logout</a>
		
		</div>
		</body>
		<script>
			$('.dept').on('change',function(){
				//var state = this.value;
				var dept = $(".dept option:selected").val();
				$.ajax({
					url:'<?php echo base_url();?>index.php/user/getSubDept',
					type:'post',
					data:{dept:dept},
					success:function(response)
					{
						$(".subdept").html(response);
					}
				});
			});

			var fileTag = document.getElementById("img"),
			preview = document.getElementById("preview");
			
			fileTag.addEventListener("change", function() {
			changeImage(this);
			});

			function changeImage(input) {
			var reader;

			if (input.files && input.files[0]) {
				reader = new FileReader();

				reader.onload = function(e) {
				preview.setAttribute('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}
		</script>
		</html>