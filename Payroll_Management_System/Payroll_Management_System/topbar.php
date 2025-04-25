<style>
  /* Navbar Styling */
  nav.navbar {
    background: linear-gradient(to left, #f5efe6, #7B3F00); /* Off-white to Chocolate */
    color: white; /* Ensure text remains visible */
    padding: 0;
    min-height: 3.5rem;
  }

  /* Adjustments for Navbar Text */
  .navbar .text-white {
    font-weight: bold;
  }

  /* Optional: Remove default Bootstrap navbar shadow */
  nav.navbar-light {
    box-shadow: none;
  }
</style>

<nav class="navbar navbar-light fixed-top" style="padding:0; min-height:3.5rem">
  <div class="container-fluid mt-2 mb-2">
    <div class="col-lg-12">
      <div class="col-md-1 float-left" style="display: flex;">
        <!-- You can place a logo or icon here if needed -->
      </div>
      <div class="col-md-4 float-left text-white">
        <large><b>Five Senses Payroll Management System</b></large>
      </div>
      <div class="col-md-2 float-right text-white">
        <a href="ajax.php?action=logout" class="text-white">
          <?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i>
        </a>
      </div>
    </div>
  </div>
</nav>
