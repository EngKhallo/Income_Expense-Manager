<?php
require_once("./config/connection.php");
$conn = connect();
if(isset($_POST['income_submit']) && !empty($_POST['income_submit'])):
    $conn = connect();

    $name = $_POST['name'];
    $category = $_POST['income_category'];
    $amount = $_POST['amount'];
    $account= $_POST['account'];
    $date= $_POST['date'];
    $description= $_POST['description']; 

    if($conn):
    $sql = "INSERT INTO income(income_name, inc_cat_id, Amount, account_id, income_date, inc_description)
    VALUES ('$name','$category','$amount', '$account', '$date', '$description')";
    $process = mysqli_query($conn, $sql);
    else:
        print_r("There is a connection error");
    endif;

    if($process) header("Location: transactions.php?msg=success");
    if(!$process) die("Database Insertion failed" . print_r(mysqli_error($conn)));
endif;

if(isset($_POST['expense_submit']) && !empty($_POST['expense_submit'])):
    $name = $_POST['name'];
    $category = $_POST['expense_category'];
    $amount = $_POST['amount'];
    $account = $_POST['account'];
    $date = $_POST['date'];
    $description = $_POST['description'];

    $sql = "insert into expense(expense_name, exp_cat_id, Amount, account_id, expense_date, exp_description)
    values ('$name', '$category', '$amount', '$account', '$date', '$description')";
    $result = mysqli_query($conn, $sql);

    if($result) header("Location: transactions.php?msg=success");
    if(!$result) die("Insertion Failed" . mysqli_error($conn));
endif;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="./plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="./plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="./plugins/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="./plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- Daterange picker plugins css -->
    <link href="./plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="./plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper" class="">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down   d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-email-outline"></i>
                                <span class="badge gradient-1 badge-pill badge-primary">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">3 New Messages</span>

                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Saiful Islam</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/2.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Adam Smith</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Can you do me a favour?</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Barak Obama</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/4.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Hilari Clinton</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hello</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-pill gradient-2 badge-primary">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">2 New Notifications</span>

                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events near you</h6>
                                                    <span class="notification-text">Within next 5 days</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Started</h6>
                                                    <span class="notification-text">One hour ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Ended Successfully</h6>
                                                    <span class="notification-text">One hour ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events to Join</h6>
                                                    <span class="notification-text">After two days</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown d-none d-md-flex">
                            <a href="javascript:void(0)" class="log-user" data-toggle="dropdown">
                                <span>English</span> <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                            </a>
                            <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="javascript:void()">English</a></li>
                                        <li><a href="javascript:void()">Dutch</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile   dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="app-profile.html"><i class="icon-user"></i>
                                                <span>Profile</span></a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.html"><i class="icon-envelope-open"></i>
                                                <span>Inbox</span>
                                                <div class="badge gradient-3 badge-pill badge-primary">3</div>
                                            </a>
                                        </li>

                                        <hr class="my-2">
                                        <li>
                                            <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock
                                                    Screen</span></a>
                                        </li>
                                        <li><a href="page-login.html"><i class="icon-key"></i> <span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label text-primary">Dashboard</li>
                    <li>
                        <a class="#" href="./index.php" aria-expanded="false">
                            <i class="fas fa-tachometer-alt"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="transactions.php" aria-expanded="false">
                            <i class="fas fa-money-check-alt"></i><span class="nav-text">Transactions</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="" href="./incomes.php" aria-expanded="false">
                            <i class="fas fa-sort-amount-up-alt"></i><span class="nav-text">Incomes</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="./expenses.php" aria-expanded="false">
                            <i class="fas fa-sort-amount-down-alt"></i><span class="nav-text">Expenses</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="javascript:void()" aria-expanded="false">
                            <i class="fas fa-window-restore"></i> <span class="nav-text">Accounts</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="javascript:void()" aria-expanded="false">
                            <i class="fas fa-th-large"></i><span class="nav-text">Budget</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fas fa-cogs"></i><span class="nav-text">Settings</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./Income_category.php">Income Category</a></li>
                            <li><a href="./expense_category.php">Expense Category</a></li>
                        </ul>
                    </li>



                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="far fa-chart-bar"></i><span class="nav-text">Reports</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="#"><i class="fas fa-project-diagram"></i>Income vs Expenses</a></li>
                            <li><a href="#"><i class="fas fa-chart-line"></i> Data in Graphs</a></li>
                            <li><a href="#"><i class="fas fa-plus-square"></i> Income Reports</a></li>
                            <li><a href="#"><i class="fas fa-minus-square"></i> Expense Reports</a></li>
                            <li><a href="#"><i class="fas fa-chart-area"></i> OverAll Data</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="" href="javascript:void()" aria-expanded="false">
                            <i class="fas fa-users-cog"></i><span class="nav-text">Users</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title text-success"><i class="fas fa-plus"></i> Incomes</div>
                                <form action="transactions.php" method="POST">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <input type="text" name="name" class="form-control" placeholder="Income Name">
                                        </div>
                                        <div class="col-12 mb-4">
                                            <select name="income_category" class="form-control btn btn-info text-white rounded h5">
                                                <option value="">Income Category</option>
                                                <?php
                                                    $sql = "select * from income_category";
                                                    $result = mysqli_query($conn, $sql);
                                                ?>
                                                        <?php while ($row = mysqli_fetch_object($result)) : ?>
                                                            <option value="<?php  echo $row->inc_cat_id; ?>" class="bg-white text-dark h5"><?php echo $row->income_type; ?></option>
                                                        <?php endwhile;?>
                                            </select>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <input type="text" class="form-control" placeholder="Amount" name="amount">
                                        </div>
                                        <div class="col-12 mb-4">

                                            <select name="account" class="form-control btn btn-success text-white rounded h5">
                                                <option value="">Accounts</option>
                                            <?php
                                                    $sql = "select * from accounts";
                                                    $result = mysqli_query($conn, $sql);
                                                ?>
                                                    <?php while ($row = mysqli_fetch_object($result)) : ?>
                                                        <option value="<?php echo $row->account_id; ?>" class="bg-white text-dark h5"><?php echo $row->account_name; ?></option>
                                                    <?php endwhile; ?>
                                            </select>
                                        </div>

                                        <div class="col-12 mb-4">
                                            <div class="">
                                                <div class="input-group">
                                                    <input type="date" name="date" class="form-control" id="" placeholder="mm/dd/yyyy">
                                                    <span class="input-group-append"><span class="input-group-text"><i class="mdi mdi-calendar-check"></i></span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Enter more Description..."></textarea>
                                        </div>
                                        <div class="col-6 mt-4">
                                            <!-- <button type="submit" name="income_submit" class="btn btn-success text-white btn-lg w-50">Submit</button> -->
                                            <input type="submit" name="income_submit" class="btn btn-success text-white btn-lg w-50">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title text-danger"><i class="fas fa-minus"></i> Expenses</div>
                                <form action="transactions.php" method="POST">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <input type="text" name="name" class="form-control" placeholder="Expense Name">
                                        </div>
                                        <div class="col-12 mb-4">
                                           <select name="expense_category" class="form-control btn btn-danger text-white rounded h5">
                                               <option value="">Expense Category</option>
                                               <?php
                                                    $conn = connect();
                                                    $sql = "select * from expense_category";
                                                    $result = mysqli_query($conn, $sql);
                                                    while($row= mysqli_fetch_object($result)):
                                               ?>
                                                <option value="<?php echo $row->exp_cat_id; ?>" class="bg-white text-dark h5"><?php echo $row->expense_type; ?></option>
                                            <?php endwhile; ?>
                                           </select>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <input name="amount" type="text" class="form-control" placeholder="Amount">
                                        </div>
                                        <div class="col-12 mb-4">
                                            <select name="account" class="form-control btn btn-info text-white rounded h5">
                                                <option value="" class="h6">Accounts</option>
                                                <?php
                                                    $sql = "select * from accounts";
                                                    $result = mysqli_query($conn, $sql);
                                                    while($row= mysqli_fetch_object($result)):
                                                ?>
                                                <option value="<?php echo $row->account_id;?>" class="bg-white text-dark h5"><?php echo $row->account_name;?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="">
                                                <div class="input-group">
                                                <input type="date" name="date" class="form-control" id="" placeholder="mm/dd/yyyy">
                                                    <span class="input-group-append"><span class="input-group-text"><i class="mdi mdi-calendar-check"></i></span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Enter more Description..."></textarea>
                                        </div>
                                        <div class="col-6 mt-4">
                                            <input type="submit" name="expense_submit" class="btn btn-danger btn-lg w-50" style="width: auto;">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************
            Content body end
        ***********************************-->


    <!--**********************************
            Footer start
        ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018
            </p>
        </div>
    </div>
    <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>


    <script src="./plugins/moment/moment.js"></script>
    <script src="./plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="./plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="./plugins/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
    <script src="./plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
    <script src="./plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="./plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="./plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="./plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script src="./js/plugins-init/form-pickers-init.js"></script>


</body>

</html>