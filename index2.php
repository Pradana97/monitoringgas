<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Bootstrap 3.3.7 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="asset/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="asset/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="asset/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="asset/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="asset/dist/css/skins/_all-skins.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="asset/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <!-- Daterange picker -->
    <!-- bootstrap wysihtml5 - text editor -->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> -->
    <style>
        div.dataTables_wrapper {
            margin-bottom: 3em;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                "dom": '<"top"fl>rt<"bottom"ip><"clear">'
            });

        });
    </script>
    <title></title>
</head>
<!-- ------------------------------------------------------------------- -->

<body>
    <nav class="navbar navbar-expand-md bg-purple navbar-dark">
        <a class="navbar-brand" href="index.php">
            <img src="img/Logo.png" alt="logo" style="width:100px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="collapsibleNavbar" style="font-weight: bold;">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Papan Instrumen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index3.php">Grafik</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index2.php">Lapaoran</a>
                </li>
            </ul>
        </div>

        <div>
            <marquee width="500" height="20">Monitoring Kadar Gas Dalam Ruangan, Hati-Hati Kadar Gas Yang Tinggi</marquee>
        </div>
    </nav>
    <br>

    <!-- ------------------------------------------------------------------------------- -->

    <div>
        <table style="width: 100%; text-align: center; font-weight: bold; color: white;">
            <tr>
                <td style="font-size: 35px;">DASHBOARD APLIKASI KADAR GAS DALAM RUANGAN </td>
            </tr>
            <tr>
                <td style="font-size: 25px;"> By : Andre Ade</td>
            </tr>
        </table>
    </div>
    <br>
    <br>

    <!-- -------------------------------------------------------------------------------- -->

    <div class="row">
        <div class="col-lg-12">

            <div class="bg-green" style="padding: 10px;">

                <table id="example" class="table table-striped table-bordered" style="width:100%; text-align: center;">
                    <thead style="background-color: #002B2A;">
                        <tr>
                            <th style="font-weight: bold; color: white;">ID</th>
                            <th style="font-weight: bold; color: white;">GAS1</th>
                            <th style="font-weight: bold; color: white;">GAS2</th>
                            <th style="font-weight: bold; color: white;">SUHU</th>
                            <th style="font-weight: bold; color: white;">KELEMBABAN</th>
                            <th style="font-weight: bold; color: white;">JAM</th>
                            <th style="font-weight: bold; color: white;">TANGGAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "gas");
                        $data = mysqli_query($con, "select * from insertdata");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr class="table-primary">
                                <td><?php echo $d['id']; ?></td>
                                <td><?php echo $d['gas1']; ?></td>
                                <td><?php echo $d['gas2']; ?></td>
                                <td><?php echo $d['suhu']; ?></td>
                                <td><?php echo $d['kelembaban']; ?></td>
                                <td><?php echo $d['time']; ?></td>
                                <td><?php echo $d['date']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
    <br>
    <br>

</body>

</html>