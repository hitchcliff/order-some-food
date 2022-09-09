<?php include('partials/header.php'); ?>

<div class="main-content login">
	<div class="wrapper">
		<div class="login-container">

			<h1>Login</h1>

			<!-- Message Section Starts -->
			<div class="message-container">
				<div class="message error">
					<?php
					if (isset($_SESSION['login'])) {
						echo $_SESSION['login']; // Displays the Session 'add'
						unset($_SESSION['login']); // Removes the Session 'add'
					}
					?>
				</div>
			</div>
			<!-- Message Section Ends-->

			<!-- Form Section Starts -->
			<form action="<?php echo LOGIN_API_URL ?>" method="POST" class="form">
				<div class="form-group">
					<label for="username">Username:</label>
					<input class="form-input" type="text" placeholder="Enter username" name="username">
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input class="form-input" type="password" placeholder="Enter password" name="password">
				</div>
				<div class="form-group">
					<button class="btn-secondary" name="login-submit" type="submit">Login</button>
				</div>
			</form>
			<!-- Form Section Ends-->
		</div>

	</div>
</div>

<?php include('./partials/footer.php'); ?>