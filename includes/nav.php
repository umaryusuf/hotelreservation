<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Hotel Reservation</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li class="<?php echo ($page_title == 'Homepage') ? 'active' : ''; ?>"><a href="index.php">Home</a></li>
              <li class="<?php echo ($page_title == 'About Page') ? 'active' : ''; ?>"><a href="about.php">About</a></li>
              <li class="<?php echo ($page_title == 'Service Page') ? 'active' : ''; ?>"><a href="service.php">Service</a></li>
              <li class="<?php echo ($page_title == 'Contact Page') ? 'active' : ''; ?>"><a href="contact.php">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="<?php echo ($page_title == 'Register Page') ? 'active' : ''; ?>"><a href="register.php">Sign Up</a></li>
              <li class="<?php echo ($page_title == 'Login Page') ? 'active' : ''; ?>"><a href="login.php">Sign In</a></li>
            </ul>
        </div>
    </div>
  </nav>