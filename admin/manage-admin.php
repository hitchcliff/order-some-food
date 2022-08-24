<?php include('partials/menu.php'); ?>

<!-- Main Content Section Starts -->
<div class="main-content">
	<div class="wrapper">
		<h2>Manage Admin</h2>

		<br />
		<a href="add-admin.php" class="btn-primary">Add admin</a>
		<br />
		<br />

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
	</div>
</div>
<!-- Main Content Section Ends-->

<?php include('partials/footer.php'); ?>