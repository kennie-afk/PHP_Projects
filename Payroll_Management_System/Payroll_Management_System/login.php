<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>FiveSenses' Payroll Management System</title>

  <?php 
  include('./header.php'); 
  include('./db_connect.php'); 
  session_start();
  if(isset($_SESSION['login_id'])) {
    header("location:index.php?page=home");
    exit();
  }
  ?>

  <style>
    /* Full-Screen Background Image */
    body {
      width: 100%;
      height: 100vh;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: Arial, sans-serif;
      background: url('assets/images/chocolate.jpg') no-repeat center center fixed;
      background-size: cover;
    }

    /* Ultra-Transparent Water-Like Login Container */
    .login-container {
      width: 400px;
      padding: 20px;
      background: rgba(255, 255, 255, 0.15); /* More realistic water-like transparency */
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      backdrop-filter: blur(10px); /* Glass effect for true transparency */
      border: 1px solid rgba(255, 255, 255, 0.3); /* Soft border for better realism */
    }

    /* Change Labels and Headings to White */
    .login-container h3,
    .form-group label {
      font-weight: bold;
      color: white !important;
    }

    /* Chocolate Gradient Button (Right to Left, Ending in Off-White) */
    .btn-chocolate {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: none;
      color: white;
      background: linear-gradient(to left, #FAF3E0, #8B4513); /* Off-white to dark chocolate */
      transition: background 0.3s ease;
    }

    /* Hover Effect (Darkens Slightly) */
    .btn-chocolate:hover {
      background: linear-gradient(to left, #F2E8D5, #703A11); /* Softer hover */
    }

    .alert {
      margin-top: 10px;
    }
  </style>

</head>
<body>

  <div class="login-container">
    <h3 class="text-center">Login</h3>
    
    <form id="login-form">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-chocolate">Login</button>
    </form>
  </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#login-form').submit(function(e){
    e.preventDefault();
    let form = $(this);
    let button = form.find('button');
    
    button.prop('disabled', true).text('Logging in...');
    
    if(form.find('.alert-danger').length > 0) 
      form.find('.alert-danger').remove();

    $.ajax({
      url: 'ajax.php?action=login',
      method: 'POST',
      data: form.serialize(),
      error: function(err) {
        console.log(err);
        button.prop('disabled', false).text('Login');
      },
      success: function(resp) {
        if(resp == 1) {
          location.href = 'index.php?page=home';
        } else if(resp == 2) {
          location.href = 'voting.php';
        } else {
          form.prepend('<div class="alert alert-danger">Username or password is incorrect.</div>');
          button.prop('disabled', false).text('Login');
        }
      }
    });
  });
</script>

</body>
</html>
