<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "iot";

$koneksi = mysqli_connect($server,$username,$password,$database);

if (mysqli_connect_error()) {
    echo "database gagal terhubung";
}


// Ambil data suhu terakhir dari database
$query = mysqli_query($koneksi, "SELECT * FROM suhu ORDER BY id DESC LIMIT 1");
$data = mysqli_fetch_array($query);

// Menentukan warna berdasarkan suhu
$cardColorClass = '';
if ($data['suhu'] < 30) {
    $message = "Suhu Dingin";
    $image = "img/dingin.png"; 
} else {
    $message = "Suhu Panas";
    $image = "img/dingin.png"; 
}

// Format data suhu dan pesan sebagai HTML yang akan dimuat ke dalam card
$html = '

<div class="col-xl-8 col-md-7 mb-5 custom-card">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <span style="font-size: 50px;">' . $message . '</span></h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="chart-pie pt-4">
            <div class="text-center">
                <img src="' . $image . '" alt="Gambar Suhu" style="width: 37%; height: auto; display: block; margin: 0 auto;">
            </div>
        </div>
    </div>
</div>
</div>

';

// Mengembalikan HTML sebagai respons untuk dimuat ke dalam card
echo $html;
?>
