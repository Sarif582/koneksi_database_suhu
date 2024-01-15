<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "iot";

$koneksi = mysqli_connect($server,$username,$password,$database);

if (mysqli_connect_error()) {
    echo "database gagal terhubung";
}


$query = mysqli_query($koneksi, "SELECT * FROM suhu ORDER BY id DESC LIMIT 13");
$waktu = [];
$derajat = [];
$suhu = [];
while ($data = mysqli_fetch_array($query)) {
    $waktu[] = date('H:i:s', strtotime($data['waktu']));
    $derajat[] = $data['suhu'];
   
}
$waktu = array_reverse($waktu);
$suhu = array_reverse($suhu);
?>

<!-- Bagian untuk grafik -->
<div class="grafik-container">
    <canvas id="grafik"></canvas>
</div>

<script>
    // Ambil elemen canvas
    var ctx = document.getElementById('grafik').getContext('2d');

    // Buat grafik menggunakan Chart.js
    var iotChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($waktu); ?>,
            datasets: [{
                label: 'Suhu (°C)',
                backgroundColor: 'rgba(0, 0, 0, 0.2)', // Hitam dengan alpha 0.2
                borderColor: 'rgba(0, 0, 0, 1)',      // Hitam tanpa transparansi
                borderWidth: 1,

                data: <?php echo json_encode($derajat); ?>,
            }
           
        ]
        },
        options: {
            scales: {
                x: {
                    beginAtZero: true,
                     reverse: true,
                    ticks: {
                        fontSize: 8
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 10,
                        min: 0,
                        max: 100
                    }
                }
            },
            plugins: {
                zoom: {
                    pan: {
                        enabled: true,
                        mode: 'xy'
                    },
                    zoom: {
                        enabled: true,
                         mode: 'xy'
                    }
                }
            },
            animation: {
                duration: 0 // Menonaktifkan animasi
            }
        }
    });
</script>
