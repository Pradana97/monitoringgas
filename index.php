<!DOCTYPE html>
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
    <!-- Morris chart -->
    <link rel="stylesheet" href="asset/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="asset/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <!-- Daterange picker -->
    <!-- bootstrap wysihtml5 - text editor -->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script>
        $(document).ready(function() {
            ajaxCall(); // To output when the page loads
            setInterval(ajaxCall, (2 * 1000)); // x * 1000 to get it in seconds
        });

        function ajaxCall() {
            $.ajax({
                url: 'isi_data.php',
                type: 'get',
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                cache: false,
                success: function(response) {
                    //gas
                    document.getElementById('gas1').innerHTML = response[0].gas1;
                    var gas1 = document.getElementById('gas1').innerHTML;
                    if (gas1 > 300) {
                        document.getElementById("gasku1").innerHTML = "Terlalu banyak gas (Bahaya)";
                    } else if (gas1 <= 300) {
                        document.getElementById("gasku1").innerHTML = "Normal";
                    }

                    document.getElementById('gas2').innerHTML = response[0].gas2;
                    var gas2 = document.getElementById('gas2').innerHTML;
                    if (gas2 > 300) {
                        document.getElementById("gasku2").innerHTML = "Terlalu banyak gas (Bahaya)";
                    } else if (gas2 <= 300) {
                        document.getElementById("gasku2").innerHTML = "Normal";
                    }

                    //suhu
                    document.getElementById('suhu').innerHTML = response[0].suhu;
                    var suhu = document.getElementById('suhu').innerHTML;
                    if (suhu > 34) {
                        document.getElementById("suhuku").innerHTML = "Panas";
                    } else if (suhu >= 25 || suhu <= 34) {
                        document.getElementById("suhuku").innerHTML = "Normal";
                    } else if (suhu < 25) {
                        document.getElementById("suhuku").innerHTML = "Dingin";
                    }

                    //kelembaban
                    document.getElementById('kelembaban').innerHTML = response[0].kelembaban;
                    var kelembaban = document.getElementById('kelembaban').innerHTML;
                    if (kelembaban > 1600) {
                        document.getElementById("lembabku").innerHTML = "lembab";
                    } else if (kelembaban > 1260 && kelembaban <= 1600) {
                        document.getElementById("lembabku").innerHTML = "Normal";
                    } else if (kelembaban < 1260) {
                        document.getElementById("lembabku").innerHTML = "tidak lembab";
                    }
                }
            });
        };
    </script>
    <?php $date = date('d-m-Y') ?>
    <title>Monitoring Kebocoran GAS </title>
</head>

<!-- ---------------------------------------------------------------------------- -->

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
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Papan Instrumen</a>
                </li>
                <li class="nav-item">
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

    <!-- ----------------------------------------------------------------------------------- -->

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
    <br>

    <!-- ---------------------------------------------------------------------------------------->
    <section class="content">
        <div id="data" class="row" style="text-align: center; font-weight: bold;">
            <div class="col-lg-3">
                <!-- small box -->
                <div style="cursor: pointer;" class="small-box bg-red click1">
                    <div class="inner">
                        <p>GAS 1</p>
                        <h3 id="gas1"></h3>
                        <p id="gasku1"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <!-- small box -->
                <div style="cursor: pointer;" class="small-box bg-blue click1">
                    <div class="inner">
                        <p>GAS 2</p>
                        <h3 id="gas2"></h3>
                        <p id="gasku2"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <!-- small box -->
                <div style="cursor: pointer;" class="small-box bg-green">
                    <div class="inner">
                        <p>SUHU</p>
                        <h3 id="suhu"></h3>
                        <p id="suhuku"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <!-- small box -->
                <div style="cursor: pointer;" class="small-box bg-yellow">
                    <div class="inner">
                        <p>KELEMBABAN TANAH</p>
                        <h3 id="kelembaban"></h3>
                        <p id="lembabku"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br>
</body>

<!-- ------------------------------------------------------------------------------------------------- -->

<script>
    window.setTimeout("waktu()", 1000);

    function waktu() {
        var waktu = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("jam").innerHTML = waktu.getHours();
        document.getElementById("menit").innerHTML = waktu.getMinutes();
        document.getElementById("detik").innerHTML = waktu.getSeconds();
    }
</script>

</html>