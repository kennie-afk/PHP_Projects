<?php include('db_connect.php') ?>
		<div class="container-fluid">
			<div class="col-lg-12">
				<br />
				<br />
				<div class="card">
					<div class="card-header">
						<span><b>Employee List</b></span>
						<button class="btn btn-primary btn-sm btn-block col-md-3 float-right" type="button" id="new_emp_btn">
							<span class="fa fa-plus"></span> Add Employee
						</button>
					</div>
					<div class="card-body">
						<table id="table" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Employee No</th>
									<th>Firstname</th>
									<th>Middlename</th>
									<th>Lastname</th>
									<th>Department</th>
									<th>Position</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									// Initialize arrays with default values
									$d_arr = ["Unset"];
									$p_arr = ["Unset"];
									
									// Fetch departments
									$dept = $conn->query("SELECT * FROM department ORDER BY name ASC");
									while ($row = $dept->fetch_assoc()) {
										$d_arr[$row['id']] = $row['name'];
									}

									// Fetch positions
									$pos = $conn->query("SELECT * FROM position ORDER BY name ASC");
									while ($row = $pos->fetch_assoc()) {
										$p_arr[$row['id']] = $row['name'];
									}

									// Fetch employees
									$employee_qry = $conn->query("SELECT * FROM `employee`") or die(mysqli_error($conn));
									while ($row = $employee_qry->fetch_array()) {
								?>
								<tr>
									<td><?php echo htmlspecialchars($row['employee_no']); ?></td>
									<td><?php echo htmlspecialchars($row['firstname']); ?></td>
									<td><?php echo htmlspecialchars($row['middlename']); ?></td>
									<td><?php echo htmlspecialchars($row['lastname']); ?></td>
									<td><?php echo isset($d_arr[$row['department_id']]) ? $d_arr[$row['department_id']] : "Unknown Department"; ?></td>
									<td><?php echo isset($p_arr[$row['position_id']]) ? $p_arr[$row['position_id']] : "Unknown Position"; ?></td>
									<td>
										<center>
											<button class="btn btn-sm btn-outline-primary view_employee" data-id="<?php echo $row['id']; ?>" type="button">
												<i class="fa fa-eye"></i>
											</button>
											<button class="btn btn-sm btn-outline-primary edit_employee" data-id="<?php echo $row['id']; ?>" type="button">
												<i class="fa fa-edit"></i>
											</button>
											<button class="btn btn-sm btn-outline-danger remove_employee" data-id="<?php echo $row['id']; ?>" type="button">
												<i class="fa fa-trash"></i>
											</button>
										</center>
									</td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});

		$(document).ready(function(){
			$('.edit_employee').click(function(){
				var $id = $(this).attr('data-id');
				uni_modal("Edit Employee", "manage_employee.php?id=" + $id);
			});

			$('.view_employee').click(function(){
				var $id = $(this).attr('data-id');
				uni_modal("Employee Details", "view_employee.php?id=" + $id, "mid-large");
			});

			$('#new_emp_btn').click(function(){
				uni_modal("New Employee", "manage_employee.php");
			});

			$('.remove_employee').click(function(){
				_conf("Are you sure to delete this employee?", "remove_employee", [$(this).attr('data-id')]);
			});
		});

		function remove_employee(id) {
			start_load();
			$.ajax({
				url: 'ajax.php?action=delete_employee',
				method: "POST",
				data: { id: id },
				error: err => console.log(err),
				success: function(resp) {
					if (resp == 1) {
						alert_toast("Employee's data successfully deleted", "success");
						setTimeout(function(){
							location.reload();
						}, 1000);
					}
				}
			});
		}
	</script>
