<?php include('partials/header.php'); ?>
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
		<form action="<?php echo CREATE_ADMIN_URL ?>" method="POST" class="form">
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