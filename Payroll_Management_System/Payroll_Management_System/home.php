<?php include 'db_connect.php' ?>
<style>
    /* Apply background image to the entire page */
    body {
        background: url('payroll8.jpg') no-repeat center center fixed;
        background-size: cover;
    }

    .welcome-card {
        background: linear-gradient(to left, #f5efe6, #7B3F00); /* Right-to-left fading chocolate */
        color: #fff;
        padding: 20px;
    }
</style>

<div class="containe-fluid">
	<div class="row">
		<div class="col-lg-12"></div>
	</div>

	<div class="row mt-3 ml-3 mr-3">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body welcome-card">
					<?php echo "Welcome back ". $_SESSION['login_name']."!"  ?>
				</div>
			</div>
		</div>
	</div>
</div>

<script></script>
