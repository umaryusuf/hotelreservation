<?php  
session_start();
error_reporting(0);

$message = "";

if(!$_SESSION['user']){
    $message = "You are not authorized to view this page until you logged in";
    header("location: login.php");
}else {

require_once 'connect.php';  

$username = $_SESSION['user'];
$query = "SELECT * FROM `users` WHERE `username`='$username'";
$result = mysqli_query($dbc, $query);

if(mysqli_num_rows($result) > 0){
    while($data = mysqli_fetch_assoc($result)){
       $user_id = $data['id'];
       $firstname = $data['firstname'];    
       $lastname = $data['lastname'];
       $username = $data['username'];
       $phone = $data['phone'];
       $email = $data['email'];
       $gender = $data['gender'];
       $city = $data['city'];
       $country = $data['country'];
       $state = $data['state'];
       $picture = $data['picture'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | Hotel Reservation System</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
</head>
<body>
	<nav class="navbar  navbar-default navbar-fixed-top" >
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navBar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand fa fa-outdent" id="menu-toggle"></a>
                <a class="navbar-brand" href="home.php">Hotel Reservation</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                  <li class="<?php echo !$_GET['action'] ? 'active' : '' ?>"><a href="home.php">Home</a></li>
                  <li class="<?php echo $_GET['action'] == 'view_profile' ? 'active' : '' ?>"><a href="home.php?action=view_profile">Profile</a></li>
                  <li class="<?php echo $_GET['action'] == 'view_booking' ? 'active' : '' ?>"><a href="home.php?action=view_booking">View Booking</a></li>
                  <li class="<?php echo $_GET['action'] == 'reservation' ? 'active' : '' ?>"><a href="home.php?action=reservation">Reservation</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                	<li><a href="logout.php">logout</a></li>
                </ul>
            </div>
        </div>
	</nav>

    <main id="wrapper" class="menuDisplayed">
        <!--sidebar-->
        <div id="sidebar-wrapper">
            <div class="sidebar-header">
                <div class="row">
                    <div class="col-xs-5 profile-photo">
                        <img src="assets/img/profiles/<?php echo $data['picture']; ?>" class="img img-circle" alt="<?php echo $firstname.' '.$lastname; ?>" width="80" height="80" />
                    </div>
                    <div class="col-xs-7 profile-info">
                        <h3 style="color: #ddd;"><?php echo $_SESSION['user']; ?></h3>
                    </div>
                </div>
            </div>
            <ul id="sidebar-nav" >
                <li><a href="home.php?action=view_profile"><i class="icons fa fa-user fa-fw"></i> View Profile</a></li>
                <li><a href="home.php?action=change_profile"><i class="icons fa fa-edit fa-fw"></i> Change Profile</a></li>
                <li><a href="home.php?action=change_password"><i class="icons fa fa-edit fa-fw"></i> Change Password</a></li>
                <li><a href="home.php?action=view_booking"><i class="icons fa fa-eye fa-fw"></i> View Booking</a></li>
                <li><a href="logout.php"><i class="icons fa fa-sign-out fa-fw"></i> Logout</a></li>
            </ul>
        </div>

        <!--content-->
        <section id="page-content-wrapper">
            <div class="container-fliud">
              
                <?php 

                switch ($_GET['action']) {
                    case 'view_profile':
                        require_once 'includes/view_profile.php';
                        break;
                    case 'change_profile':
                        require_once 'includes/change_profile.php';
                        break;
                    case 'change_profile_picture':
                        require_once 'includes/change_profile_picture.php';
                        break;
                    case 'change_password':
                        require_once 'includes/change_password.php';
                        break;
                    case 'view_booking':
                        require_once 'includes/view_booking.php';
                        break;
                    case 'reservation':
                        require_once 'includes/reservation.php';
                        break;
                    default:
                        require_once 'includes/home.php';
                        break;
                }

            ?>
          </div>
        </section>

    </main>


	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript">
        $(function(){
            $('#menu-toggle').click(function(e){
                e.preventDefault();
                $('#wrapper').toggleClass('menuDisplayed');
            });

        });
  </script>

</body>
</html>

<?php } } } ?>