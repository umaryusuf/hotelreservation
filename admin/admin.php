<?php  
	session_start();
	error_reporting(0);

	if(!$_SESSION['admin']){
		$message = "You are not authorized to view this page until you logged in";
		header("location:index.php");
	}
	require_once '../connect.php';

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">

        <title>Admin Panel | Hotel Reservation</title>

        <link rel="shortcut icon" href="img/hotel.PNG">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/sidebar.css">
        <link rel="stylesheet" href="../assets/css/styles.css">
    </head>
    <body>
      <!--[if lt IE 8]>
          <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->
      <nav class="navbar  navbar-default navbar-fixed-top" >
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="menu-toggle"><i class="fa fa-outdent"></i></a>
                <a class="navbar-brand" href="admin.php">Admin Panel</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                  <li class="<?php echo !$_GET['action'] ? 'active' : '' ?>"><a href="admin.php">Home</a></li>
                  <li class="<?php echo $_GET['action'] == 'rooms' ? 'active' : '' ?>"><a href="admin.php?action=rooms"> Rooms</a></li>
                  <li class="<?php echo $_GET['action'] == 'customers' ? 'active' : '' ?>"><a href="admin.php?action=customers">Customers</a></li>
                  <li class="<?php echo $_GET['action'] == 'employees' ? 'active' : '' ?>"><a href="admin.php?action=employees"> Employees</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                	<li><a href="admin.php?action=messages">Messages <i class="fa fa-envelope-o"></i></a></li>
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
                    <!-- <div class="col-xs-5 profile-photo">
                        <img src="../assets/img/profiles/user.jpg" class="img img-circle" alt="" width="80" height="80" />
                    </div> -->
                    <div class="col-xs-12 text-center">
                        <h3 style="color: #fcfcfc;"> Hotel <?php echo $_SESSION['admin']; ?></h3>
                    </div>
                </div>
            </div>
            <ul id="sidebar-nav" >
                <li>
                    <a href="admin.php">
                        <i class="icons fa fa-dashboard fa-fw"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="admin.php?action=change_password">
                        <i class="icons fa fa-lock fa-fw"></i> Change password
                    </a>
                </li>
                <li>
                    <a href="admin.php?action=messages">
                        <i class="icons fa fa-envelope-o fa-fw"></i> Messages
                    </a>
                </li>
                <li>
                    <a href="admin.php?action=rooms">
                        <i class="icons fa fa-home fa-fw"></i> Rooms
                    </a>
                </li>
                <li><a href="admin.php?action=employees"><i class="icons fa fa-users fa-fw"></i> Employees</a>
                </li>
                <li><a href="admin.php?action=customers"><i class="icons fa fa-users fa-fw"></i> Customers</a>
                </li>
                <li><a href="logout.php"><i class="icons fa fa-sign-out fa-fw"></i> Logout</a></li>
            </ul>
        </div>

        <!--content-->
        <section id="page-content-wrapper">
            <div class="container-fliud">
              
                <?php 
                if(isset($_GET["action"])){
                    switch ($_GET['action']) {
                        case 'rooms':
                            require_once 'includes/rooms.php';
                            break;
                        case 'add_room':
                            require_once 'includes/add_room.php';
                            break;
                        case 'view_all_rooms':
                            require_once 'includes/view_all_rooms.php';
                            break;
                        case 'view_booked_rooms':
                            require_once 'includes/view_booked_rooms.php';
                            break;
                        case 'edit_room':
                            require_once 'includes/edit_room.php';
                            break;
                        case 'customers':
                            require_once 'includes/customers.php';
                            break;
                        case 'view_customers':
                            require_once 'includes/view_customers.php';
                            break;
                        case 'view_booked_customers':
                            require_once 'includes/view_booked_customers.php';
                            break;
                        case 'employees':
                            require_once 'includes/employees.php';
                            break;
                        case 'add_employee':
                            require_once 'includes/add_employee.php';
                            break;
                        case 'delete_employee':
                            require_once 'includes/delete_employee.php';
                            break;
                        case 'edit_employee':
                            require_once 'includes/edit_employee.php';
                            break;
                        case 'salary':
                            require_once 'includes/salary.php';
                            break;
                        case 'change_password':
                            require_once 'includes/change_password.php';
                            break;
                        case 'un_read_messages':
                            require_once 'includes/un_read_messages.php';
                            break;
                        case 'messages':
                            require_once 'includes/messages.php';
                            break;
                        case 'read_messages':
                            require_once 'includes/read_messages.php';
                            break;
                        case 'view_new_msg':
                            require_once 'includes/view_new_msg.php';
                            break;
                        default:
                            require_once 'includes/home.php';
                            break;
                    }
                }else{
                    require_once 'includes/home.php';
                }

                    

            ?>
          </div>
        </section>

    </main>


	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $('#menu-toggle').click(function(e){
                e.preventDefault();
                $('#wrapper').toggleClass('menuDisplayed');
            });

        });
        function setDeleteAction() {
            if(confirm("Are you sure want to delete this employee")) {
                document.forms.deleteemployee.action = "admin.php?action=delete_employee";
                document.forms.deleteemployee.submit();
            }
        }
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover(); 
        });
  </script>
    </body>
</html>
