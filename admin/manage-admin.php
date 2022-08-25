<?php include('partials/menu.php'); ?>

<!-- Main Content Section Starts -->
<div class="main-content">
	<div class="wrapper">
		<h2>Manage Admin</h2>

		<!-- Message Section Starts -->
		<div class="message-container">
			<a href="add-admin.php" class="btn-primary">Add admin</a>
			<div class="message">
				<?php
				if (isset($_SESSION['add'])) {
					echo $_SESSION['add']; // Displays the Session 'add'
					unset($_SESSION['add']); // Removes the Session 'add'
				}
				?>
			</div>
		</div>
		<!-- Message Section Ends-->

		<!-- Table Section Starts -->
		<table class="tbl-full">
			<tr>
				<th>
					S.N.
				</th>
				<th>Full Name</th>
				<th>Username</th>
				<th>Actions</th>
			</tr>
			<tr>
				<td>1.</td>
				<td>Kevin Nacario</td>
				<td>notkev1n</td>
				<td>
					<button class="btn-secondary">
						Update Admin
					</button>
					<button class="btn-danger">
						Delete Admin
					</button>
				</td>
			</tr>
		</table>
		<!-- Table Section Ends -->
	</div>
</div>
<!-- Main Content Section Ends-->

<?php include('partials/footer.php'); ?>