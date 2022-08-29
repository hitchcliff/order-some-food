<?php include('partials/menu.php'); ?>

<!-- Main Content Starts -->
<div class="main-content">
	<div class="wrapper">
		<h2>Update Password</h2>

		<!-- Message Starts -->
		<div class="message-container">
			<div class="message error">
				<?php
				if (isset($_SESSION['update-password'])) {
					echo $_SESSION['update-password']; // Displays the Session 'update password'
					unset($_SESSION['update-password']); // Displays the Session 'update password'
				}
				?>
			</div>
		</div>
		<!-- Message Ends-->

		<!-- Form Section Starts -->
		<form action="<?php echo CHANGE_PASSWORD ?>" method="POST" class="form">
			<div class="form-group">
				<label for="full_name">Old Password:</label>
				<input class="form-input" type="password" placeholder="Enter old password" name="old_password">
			</div>
			<div class="form-group">
				<label for="Username">New Password:</label>
				<input class="form-input" type="password" placeholder="Enter new password" name="new_password">
			</div>
			<div class="form-group">
				<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
				<button class="btn-secondary" name="update-admin-password-submit" type="submit">Submit</button>
			</div>
		</form>
		<!-- Form Section Ends -->

	</div>
</div>
<!-- End Content Ends -->

<?php include('partials/footer.php'); ?>