<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>UI- FACILITIES RESERVATION</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i><img src="img/logo1.png" class="w-100"></i>
                </div>
                <div class="sidebar-brand-text mx-3">UIFR - GSD DASHBOARD</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-2">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-chart-line"></i>
                    <span>HOME</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="accounts.php">
                        <i class="fas fa-users"></i>
                        <span>ACCOUNTS</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reservation.php">
                            <i class="fas fa-ticket-alt"></i>
                            <span>RESERVATION</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="facilities.php">
                                <i class="fas fa-building"></i>
                                <span>ADD FACILITIES</span></a>
                            </li>
                           
                                <li class="nav-item">
                                    <a class="nav-link" href="announcements.php">
                                        <i class="fas fa-bullhorn"></i>
                                        <span>ANNOUNCEMENT</span></a>
                                    </li>
                                    <!-- Divider -->
                                    <hr class="sidebar-divider d-none d-md-block">
                                    <!-- Sidebar Toggler (Sidebar) -->
                                    <div class="text-center d-none d-md-inline">
                                        <button class="rounded-circle border-0" id="sidebarToggle"></button>
                                    </div>
                                </ul>
                                <!-- End of Sidebar -->
                                <!-- Content Wrapper -->
                                <div id="content-wrapper" class="d-flex flex-column">
                                    <!-- Main Content -->
                                    <div id="content">
                                        <!-- Topbar -->
                                        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                                            <!-- Topbar Navbar -->
                                            <ul class="navbar-nav ml-auto">
                                                <div class="topbar-divider d-none d-sm-block"></div>
                                                <!-- Nav Item - User Information -->
                                                <li class="nav-item dropdown no-arrow">
                                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $admin['name'] ?></span>
                                                    <i class="fas fa-user-circle h2"></i>
                                                </a>
                                                <!-- Dropdown - User Information -->
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                                aria-labelledby="userDropdown">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">
                                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                    Profile
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                    Logout
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- End of Topbar -->
                                <!-- Begin Page Content -->
                                <div class="container-fluid">

                                    <div class="row" id="form">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <div class="card">
                                                <div class="card-header">
                                                    <span class="font-weight-bold">Add Facilities</span>
                                                </div>
                                                <div class="card-body">
                                                    <form action="session.php" method="POST" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-md-12 pr-1">
                                                                <div class="form-group">
                                                                    <label>Name of Facilities</label>
                                                                    <input type="text" name="name" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 pr-1">
                                                                <div class="form-group">
                                                                    <label>Upload Image</label>
                                                                    <input type="file" name="image" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" name="addFacility" class="btn btn-success btn-fill pull-right mx-2">Add Facility</button>
                                                        <a href="#" onclick="form.hidden = true; table.hidden = false;" class="link text-success pull-right mx-2 pt-2"><u>Manage Facilities</u></a>
                                                        <div class="clearfix"></div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.container-fluid -->
                                
                                <div class="row" id="table" hidden>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <div class="card">
                                            <div class="card-header">
                                                <span class="font-weight-bold">Facilities</span>
                                                <a href="#" onclick="table.hidden = true; form.hidden = false;" class="link text-success" style="float: right;"><u>Return</u></a>
                                            </div>
                                            <div class="card-body table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $facilities = mysqli_query($conn,"SELECT * from facilities order by id desc");
                                                        while ($facility = mysqli_fetch_array($facilities)) {
                                                            ?>
                                                            <tr>
                                                                <td scope="row"><?php echo $facility['id']?></td>
                                                                <td><?php echo $facility['name']?></td>
                                                                <td>
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item" href="#View" data-toggle="modal" data-target="#viewModal<?php echo $facility['id']?>">View</a>
                                                                            <a class="dropdown-item" href="#Update" data-toggle="modal" data-target="#updateModal<?php echo $facility['id']?>">Update</a>
                                                                            <a class="dropdown-item" href="session.php?id=<?php echo $facility['id']?>&deleteFacility=">Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <!-- View -->
                                                            <div class="modal fade" id="viewModal<?php echo $facility['id']?>" tabindex="-1" role="dialog" aria-labelledby="viewModal<?php echo $facility['id']?>" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                        <!-- <div class="modal-header">
                                                            <h5 class="modal-title">View Space</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div> -->
                                                        <div class="modal-body">
                                                            <img src="uploaded_files/<?php echo $facility['image']?>" class="img-fluid" style="width:100%;height: 300px;">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <!-- <button type="button" class="btn btn-success">Save changes</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Update -->
                                            <div class="modal fade" id="updateModal<?php echo $facility['id']?>" tabindex="-1" role="dialog" aria-labelledby="updateModal<?php echo $facility['id']?>" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="session.php?id=<?php echo $facility['id']?>" method="POST" enctype="multipart/form-data">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="updateModal<?php echo $facility['id']?>">Update Facility</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12 pr-1">
                                                                        <div class="form-group">
                                                                            <label>Name of Facility</label>
                                                                            <input type="text" name="name" class="form-control" value="<?php echo $facility['name']?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Description</label>
                                                                            <textarea name="description" class="form-control" style="height: 75px; resize: none;"><?php echo $facility['description']?></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" name="updateFacility" class="btn btn-success">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="session.php?id=<?php echo $admin['id'] ?>" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $admin['name'] ?>" placeholder="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="password" name="password" value="<?php echo $admin['password'] ?>" placeholder="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact" class="col-sm-2 col-form-label">Contact</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $admin['contact'] ?>" placeholder="contact">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $admin['email'] ?>" placeholder="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="address" class="form-control" id="address" name="address" value="<?php echo $admin['address'] ?>" placeholder="address">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updateProfile" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-success" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
</body>
</html>