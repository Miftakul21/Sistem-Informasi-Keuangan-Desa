<?php
require 'cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Dashboard - Admin</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
<?php
  require ('koneksi.php');
  require ('sidebar.php');




?>
    <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow d-flex justify-content-between">
            <h1>Data Pinjaman Anggaran</h1>
            <a href="pinjaman.php" class="btn btn-danger">Kembali</a>
        </nav>

        <!-- Informasi Data Anggota Peminjam -->
        <div class="container-fluid">
            <button class="btn btn-warning fa fa-edit" data-toggle="modal" data-target="#myKaryawanEdit">Edit</button>
            <div class="card mt-2 shadow-sm" style="width: 70%;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <table class="table table-borderless">
                              <tbody>
                                <tr>
                                  <th>Kode</th>
                                  <td>: Pribadi</td>
                                </tr>                               
                              </tbody>
                              <tbody>
                                <tr>
                                  <th>Nama</th>
                                  <td>: Mark</td>
                                </tr>                               
                              </tbody>
                              <tbody>
                                <tr>
                                  <th>Dukuh</th>
                                  <td>: Dukuh 1</td>
                                </tr>                               
                              </tbody>
                              <tbody>
                                <tr>
                                  <th>Alamat</th>
                                  <td>: Mijil</td>
                                </tr>                               
                              </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table class="table table-borderless">
                              <tbody>
                                <tr>
                                  <th>Nominal Pinjam</th>
                                  <td>: Rp. 1.000.000</td>
                                </tr>                               
                              </tbody>
                              <tbody>
                                <tr>
                                  <th>Jumlah Pokok</th>
                                  <td>: Rp.1.000</td>
                                </tr>                               
                              </tbody>
                              <tbody>
                                <tr>
                                  <th>Jumlah Jasa</th>
                                  <td>: Rp.2.000</td>
                                </tr>                               
                              </tbody>
                              <tbody>
                                <tr>
                                  <th>Jangka Pinjaman</th>
                                  <td>: 12 Bulan</td>
                                </tr>                               
                              </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table class="table table-borderless">
                              <tbody>
                                <tr>
                                  <th>Pinjaman Penelusuran</th>
                                  <td>: Rp. 1.500.000</td>
                                </tr>                               
                              </tbody>
                              <tbody>
                                <tr>
                                  <th>Pinjaman Gabungan</th>
                                  <td>: Rp. 55.000</td>
                                </tr>                               
                              </tbody>
                              <tbody>
                                <tr>
                                  <th>Keterangan</th>
                                  <td>: Perpanjangan</td>
                                </tr>                               
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Memasukan Data Informasi Pribadi -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">

            </div>
          </div>
          <div class="row">
            <div class="col-md-6">

            </div>
          </div>
        </div>
      </div>
      <?php require 'footer.php'?>
    </div>

  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php require 'logout-modal.php'; ?>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script type="text/javascript">
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = '#858796';

      function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
          prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
          sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
          dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
          s = '',
          toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
          };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
          s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
          s[1] = s[1] || '';
          s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
      }

      // Area Chart Example
      var ctx = document.getElementById("myAreaChart");
      var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["7 hari lalu","6 hari lalu", "5 hari lalu", "4 hari lalu", "3 hari lalu", "2 hari lalu", "1 hari lalu"],
          datasets: [{
            label: "Pendapatan",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [<?php echo $tujuhhari['0']?>, <?php echo $enamhari['0'] ?>, <?php echo $limahari['0'] ?>, <?php echo $empathari['0'] ?>, <?php echo $tigahari['0'] ?>, <?php echo $duahari['0'] ?>, <?php echo $satuhari['0'] ?>],
          }],
        },
        options: {
          maintainAspectRatio: false,
          layout: {
            padding: {
              left: 10,
              right: 25,
              top: 25,
              bottom: 0
            }
          },
          scales: {
            xAxes: [{
              time: {
                unit: 'date'
              },
              gridLines: {
                display: false,
                drawBorder: false
              },
              ticks: {
                maxTicksLimit: 7
              }
            }],
            yAxes: [{
              ticks: {
                maxTicksLimit: 5,
                padding: 10,
                // Include a dollar sign in the ticks
                callback: function(value, index, values) {
                  return 'Rp.' + number_format(value);
                }
              },
              gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2]
              }
            }],
          },
          legend: {
            display: false
          },
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
            callbacks: {
              label: function(tooltipItem, chart) {
                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
              }
            }
          }
        }
      });        
    </script>
  
    <script type="text/javascript">
        
        // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = '#858796';
      // Pie Chart Example
      var ctx = document.getElementById("myPieChart");
      var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: ["Pendapatan", "Pengeluaran", "Sisa"],
          datasets: [{
            data: [<?php echo $jumlahmasuk/1000000 ?>, <?php echo $jumlahkeluar/1000000 ?>, <?php echo $uang/1000000 ?>],
            backgroundColor: ['#4e73df', '#e74a3b', '#36b9cc'],
            hoverBackgroundColor: ['#2e59d9', '#e74a3b', '#2c9faf'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
          }],
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
          },
          legend: {
            display: false
          },
          cutoutPercentage: 80,
        },
      });
    </script>
  </body>
</html>
