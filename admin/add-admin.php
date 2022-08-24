<?php include('partials/menu.php'); ?>

<!-- Main Content Section Starts -->
<div class="main-content">
	<div class="wrapper">
		<h2>Add admin</h2>

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
	$admin->create();
};



?>