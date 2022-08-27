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

				<?php
				if (isset($_SESSION['delete'])) {
					echo $_SESSION['delete']; // Display the Session 'delete'
					unset($_SESSION['delete']); // Removes the Session 'delete'
				}
				?>

				<?php
				if (isset($_SESSION['update'])) {
					echo $_SESSION['update']; // Display the Session 'update'
					unset($_SESSION['update']); // Removes the Session 'update'
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

			<?php

			// Instantiate ReadAdmin
			$readAdmin = new ReadAdmin($db);
			$results = $readAdmin->start();

			// Loop each item
			foreach ($results['data'] as $result) {

				echo
				"
				<tr>
					<td>" . $result['id'] . "</td>
					<td>" . $result['full_name'] . "</td>
					<td>" . $result['username'] . "</td>
					<td class='btns'>
						<a class='btn-secondary' href='" . MANAGE_UPDATE_ADMIN_URL . "?id=" . $result['id'] . "'>
							Update Admin
						</a>
						<a class='btn-danger' href='" . DELETE_ADMIN_URL . "?id=" . $result['id'] . "'>
							Delete Admin
						</a>
				</td>
				</tr>
				";
			}
			?>
		</table>
		<!-- Table Section Ends -->
	</div>
</div>
<!-- Main Content Section Ends-->

<?php include('partials/footer.php'); ?>