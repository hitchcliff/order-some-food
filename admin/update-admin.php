<?php include('partials/menu.php'); ?>

<!-- Main Content Section Starts -->
<div class="main-content">
	<div class="wrapper">
		<h2>Update admin</h2>

		<!-- Message Section Starts -->
		<div class="message-container">
			<div class="message">
				<?php
				if (isset($_SESSION['update'])) {
					echo $_SESSION['update']; // Displays the Session 'add'
					unset($_SESSION['update']); // Removes the Session 'add'
				}
				?>
			</div>
		</div>
		<!-- Message Section Ends-->

		<!-- Form Section Starts -->
		<form action="<?php echo UPDATE_ADMIN_URL ?>" method="POST" class="form">
			<div class="form-group">
				<label for="full_name">Change Name:</label>
				<input class="form-input" type="text" placeholder="Enter new name" name="full_name">
			</div>
			<div class="form-group">
				<label for="Username">Change Username:</label>
				<input class="form-input" type="text" placeholder="Enter new username" name="username">
			</div>
			<!-- <div class="form-group">
				<label for="Username">Password:</label>
				<input class="form-input" type="password" placeholder="Enter password" name="password">
			</div> -->
			<div class="form-group">
				<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
				<button class="btn-secondary" name="update-admin-submit" type="submit">Submit</button>
			</div>
		</form>
		<!-- Form Section Ends -->
	</div>

</div>

<?php include('partials/footer.php'); ?>