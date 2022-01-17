<?php
$con = mysqli_connect("localhost", "root", "", "gas");
$query = "select * from insertdata where date >= CURDATE()";
$result = mysqli_query($con, $query);
$chart_data = '';
$s = strtotime("Y-m-d 01:00:00");
$e = strtotime("Y-m-d 24:00:00");
$a = "";
while ($s != $e) {
    $s = strtotime('+30 minutes', $s);
    $a = date('H:i', $s);
}
while ($d = mysqli_fetch_array($result)) {
    $chart_data .= "{ time:'" . $d["time"] . "',gas1:'" . $d["gas1"] . "',gas2:'" . $d["gas2"] . "',suhu:'" . $d["suhu"] . "',kelembaban:'" . $d["kelembaban"] .  "'}, ";
}
$chart_data = substr($chart_data, 0, -2);
$data_chartku = json_encode($chart_data);
$date = date('d-m-Y')
?>

<!-- ------------------------------------------------------------------------------------------ -->

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>MONITORING HIDROPONIK</title>
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
    <!-- Morris chart -->
    <link rel="stylesheet" href="asset/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="asset/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="asset/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script>
        $(document).ready(function() {
            //gas
            var gas1 = document.getElementById('gas1ku').innerHTML;
            if (gas1 > 300) {
                document.getElementById("gas11").innerHTML = "Terlalu banyak gas (Bahaya)";
            } else if (gas1 <= 300) {
                document.getElementById("gas11").innerHTML = "Normal";
            }

            var gas2 = document.getElementById('gas2ku').innerHTML;
            if (gas2 > 300) {
                document.getElementById("gas21").innerHTML = "Terlalu banyak gas (Bahaya)";
            } else if (gas2 <= 300) {
                document.getElementById("gas21").innerHTML = "Normal";
            }
            //suhu
            var suhu = document.getElementById('suhuku').innerHTML;
            if (suhu > 34) {
                document.getElementById("suhu1").innerHTML = "Panas";
            } else if (suhu >= 25 || suhu <= 34) {
                document.getElementById("suhu1").innerHTML = "normal";
            } else if (suhu < 25) {
                document.getElementById("suhu1").innerHTML = "Dingin";
            }

            //kelembaban
            var kelembaban = document.getElementById('kelembabanku').innerHTML;
            if (kelembaban > 1600) {
                document.getElementById("kelembaban1").innerHTML = "Lembab";
            } else if (kelembaban > 1260 && kelembaban <= 1600) {
                document.getElementById("kelembaban1").innerHTML = "normal";
            } else if (kelembaban < 1260) {
                document.getElementById("kelembaban1").innerHTML = "Tidak Lembab";
            }
        });
    </script>
</head>

<!-- ------------------------------------------------------------------------------------------ -->

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
                <li class="nav-item active">
                    <a class="nav-link" href="index3.php">Grafik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index2.php">Lapaoran</a>
                </li>
            </ul>
        </div>

        <div>
            <marquee width="500" height="20">Monitoring Kadar Gas Dalam Ruangan, Hati-Hati Kadar Gas Yang Tinggi</marquee>
        </div>
    </nav>
    <br>
    <br>

    <!-- ------------------------------------------------------------------------------------------ -->

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
    <hr style="border: 3px solid white; margin: 30px;">
    <br>
    <table style="width: 100%; text-align: center; font-size: 30px; font-weight: bold; color: white;">
        <tr>
            <td colspan="5"><?= $date; ?></td>
        </tr>
        <tr>
            <td style=" width: 40% ; text-align: right;" id="jam"> </td>
            <td style=" width: 5%">:</td>
            <td style=" width: 5%" id="menit"> </td>
            <td style=" width: 5%">:</td>
            <td style=" width: 40% ; text-align: left;" id="detik"> </td>
        </tr>
    </table>
    <!-- ------------------------------------------------------------------------------------------ -->
    <div class="container" style="margin-top: -100px;">
        <?php
        include 'conect.php';
        $data = mysqli_query($conect, "
        select * From insertdata
        where id = (select max(id) from insertdata)");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <h3 style="visibility: hidden" id="gas1ku"><?php echo $d['gas1']; ?></h3>
            <h3 style="visibility: hidden" id="gas2ku"><?php echo $d['gas2']; ?></h3>
            <h3 style="visibility: hidden" id="suhuku"><?php echo $d['suhu']; ?></h3>
            <h3 style="visibility: hidden" id="kelembabanku"><?php echo $d['kelembaban']; ?></h3>
        <?php
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">GAS1</h3>
                        <h4 id="gas11"></h4>
                    </div>
                    <div class="box-body chart-responsive">
                        <div id="chart1"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

            <div class="col-md-12">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">GAS2</h3>
                        <h4 id="gas21"></h4>
                    </div>
                    <div class="box-body chart-responsive">
                        <div id="chart2"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

            <div class="col-md-12">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">SUHU</h3>
                        <h4 id="suhu1"></h4>
                    </div>
                    <div class="box-body chart-responsive">
                        <div id="chart3"></div>

                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

            <div class="col-md-12">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">KELEMBABAN</h3>
                        <h4 id="kelembaban1"></h4>
                    </div>
                    <div class="box-body chart-responsive">
                        <div id="chart4"></div>

                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

        </div>



    </div>
    <!-- ./wrapper -->
    <!-- jQuery 3 -->
    <script src="asset/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="asset/bower_components/raphael/raphael.min.js"></script>
    <script src="asset/bower_components/morris.js/morris.min.js"></script>
    <!-- FastClick -->
    <script src="asset/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->l
    <script src="asset/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="asset/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        Morris.Line({
            element: 'chart1',
            data: [<?php echo $chart_data; ?>],
            xkey: 'time',
            ykeys: ['gas1'],
            labels: ['timr,gas1'],
            parseTime: false,
            hideHover: true,
            lineWidth: '6px',
            stacked: true
        });
        Morris.Line({
            element: 'chart3',
            data: [<?php echo $chart_data; ?>],
            xkey: 'time',
            ykeys: ['suhu'],
            labels: ['time,suhu'],
            parseTime: false,
            hideHover: true,
            lineWidth: '6px',
            stacked: true
        });
        Morris.Line({
            element: 'chart4',
            data: [<?php echo $chart_data; ?>],
            xkey: 'time',
            ykeys: ['kelembaban'],
            labels: ['time,kelembaban'],
            parseTime: false,
            hideHover: true,
            lineWidth: '6px',
            stacked: true
        });
        Morris.Line({
            element: 'chart2',
            data: [<?php echo $chart_data; ?>],
            xkey: 'time',
            ykeys: ['gas2'],
            labels: ['time,gas2'],
            parseTime: false,
            hideHover: true,
            lineWidth: '6px',
            stacked: true
        });


        window.setTimeout("waktu()", 1000);

        function waktu() {
            var waktu = new Date();
            setTimeout("waktu()", 1000);
            document.getElementById("jam").innerHTML = waktu.getHours();
            document.getElementById("menit").innerHTML = waktu.getMinutes();
            document.getElementById("detik").innerHTML = waktu.getSeconds();
        }
    </script>


</body>

</html>