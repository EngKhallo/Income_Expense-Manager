<?php
require_once("./config/connection.php");
$conn = connect();

if (isset($_POST) && !empty($_POST)) :
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    $sql = "insert into demo(name, add_id, gender) values('$name','$address','$gender')";
    $result = mysqli_query($conn, $sql);
endif;

if($conn):
    $query = "Select d_id, name, address, gender from demo
    inner join demo_1
    on demo.add_id = demo_1.id";
    $process = mysqli_query($conn, $query);
else:
    print_r("COnnection prob");
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
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">
                    Basic Registration Form
                </h1>
            </div>
            <div class="card-body">
                 <form action="samples.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <select name="address" class="form-control ">
                            <option value="" class="bg-white text-dark h5">---Select Address---</option>
                            <?php
                            $sql = "select * from demo_1";
                            $result = mysqli_query($conn, $sql);
                            ?>
                            <?php while ($row = mysqli_fetch_object($result)) : ?>
                                <option value="<?php echo $row->id; ?>" class="bg-white text-dark h5"><?php echo $row->address; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="gender" class="form-control">
                            <option value="" class="bg-white text-dark h5">---Select Gender---</option>
                            <option value="male" class="bg-white text-dark h5">Male</option>
                            <option value="female" class="bg-white text-dark h5">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success text-white col-4" type="submit">Submit</button>
                    </div>
                </form> 
            </div>

            <div class="table-responsive container">
                <table class="table table-striped table-bordered zero-configuration">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row= mysqli_fetch_object($process)):?>
                            <tr>
                                <td><?php echo $row->d_id;?></td>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->address; ?></td>
                                <td><?php echo $row->gender; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Gender</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</body>
<script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>


</html>

