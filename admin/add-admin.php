<?php include('partials/menu.php'); ?>

<!-- Main Content Section Starts -->
<div class="main-content">
	<div class="wrapper">
		<h2>Add admin</h2>

		<!-- Message Section Starts -->
		<div class="message-container">
			<div class="message error">
				<?php
				if (isset($_SESSION['add'])) {
					echo $_SESSION['add']; // Displays the Session 'add'
					unset($_SESSION['add']); // Removes the Session 'add'
				}
				?>
			</div>
		</div>
		<!-- Message Section Ends-->

		<!-- Form Section Starts -->
		<form action="" method="POST" class="form">
			<div class="form-group">
				<label for="full_name">Full name:</label>
				<input class="form-input" type="text" placeholder="Enter name" name="full_name">
			</div>
			<div class="form-group">
				<label for="Username">Username:</label>
				<input class="form-input" type="text" placeholder="Enter username" name="username">
			</div>
			<div class="form-group">
				<label for="Username">Password:</label>
				<input class="form-input" type="password" placeholder="Enter password" name="password">
			</div>
			<div class="form-group">
				<button class="btn-secondary" name="add-admin-submit" type="submit">Submit</button>
			</div>
		</form>
		<!-- Form Section Ends -->
	</div>

</div>

<?php include('partials/footer.php'); ?>

<?php

// Check if there are submissions
if (isset($_POST['add-admin-submit'])) {
	// Instantiate Admin Object
	$admin = new Admin($db);

	// Set data
	$admin->full_name =  $_POST['full_name'];
	$admin->username = $_POST['username'];
	$admin->password = md5($_POST['password']);

	// Create
	if ($admin->create()) {
		// Add session
		$_SESSION['add'] = "Admin Added Successfully";

		// Redirect
		header("location:" . SITEURL . "admin/manage-admin.php");
	} else {
		// Add session
		$_SESSION['add'] = "Failed to Add Admin";

		// Redirect
		header("location:" . SITEURL . "admin/add-admin.php");
	}
};

?>