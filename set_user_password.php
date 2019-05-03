<?php
	include 'util.php';
	my_session_start();
	if($_SESSION["user_type"] == "Admin")
	{
	include 'admin_menu.php';
	}else{
	include 'menu.php';
	}
	if(isset($_SESSION["forgot_user_password"])) {
		$ButtonText = "Change Password";
		unset($_SESSION["forgot_user_password"]);
	}
	else {
		$ButtonText = "Register";
	}
?>
<html>
	<head>
		<title>Set Your Password</title>
		<script src="set_password_validation.js"></script>
	</head>

	<body>

		<div class="row">
			<div class="medium-8 column">
				<section>
					<form id="add_user_profile_form" name="add_user_profile_form" method="post" action="set_user_password_mediator.php" onsubmit="return validateSetForm()" enctype="multipart/form-data">
						<fieldset>
						<legend><strong>Set your password</legend></strong>
							<?php
								if(isset($_SESSION["set_user_password"]) and isset($_SESSION["error_flag"])){
									echo "<font color=red>".$_SESSION["set_user_password"]."</font></strong></legend>";
								}
								else if(isset($_SESSION["set_user_password"])){
									echo "<legend><strong>".$_SESSION["set_user_password"]."</strong></legend>";
								}
							?>
							<div class="row">
								<div class="small-12 column">
									<label for="user_email_address">Email Address <large style="color:red;font-weight: bold;" > *</large>
										<input  type="email" readonly autocomplete="off" type="text" id="user_email_address" name="user_email_address" <?php if(isset($_SESSION["email"])) echo "value = ".$_SESSION["email"]; ?> placeholder="Email Address" required>
									</label>
								</div>
								<div class="small-12 column">
									<label for="user_email_address">One-time Password <large style="color:red;font-weight: bold;"> *</large><small> (Check your email for the one-time password)<small>
										<input  autocomplete="off" type="text" id="user_one_time_password" name="user_one_time_password" placeholder="One-time Password" required>
									</label>
								</div>
								<div class="small-12 column">
									<label for="user_email_address">New Password <large style="color:red;font-weight: bold;"> *</large>
										<input  autocomplete="off" type="password" id="user_new_password" name="user_new_password" placeholder="New Password" required>
									</label>
								</div>
								<div class="small-12 column">
									<label for="user_email_address">Re-enter New Password <large style="color:red;font-weight: bold;"> *</large>
										<input  autocomplete="off" type="password" id="user_rnew_password" name="user_rnew_password" placeholder="Re-enter New Password" required>
									</label>
								</div>
								<div class="small-12 column">
									<button class="secondary hollow button" type="submit" name="password_change_submit">
										<span><?php echo $ButtonText; ?></span>
									</button>
								</div>
							</div>
						</fieldset>
					</form>
				</section>
			</div>
		</div>


	</body>
<?php
	include 'footer.php';
?>
</html>
