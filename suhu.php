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
    $cardColorClass = 'bg-primary'; // Warna biru untuk suhu di bawah 30
} else {
    $cardColorClass = 'bg-danger'; // Warna merah untuk suhu di atas 35
}


// Format data suhu dan pesan sebagai HTML yang akan dimuat ke dalam card
$html = '
<div class="col-xl-12 col-md-7 mb-5">
    <div class="card border-left-primary shadow h-100 py-2 ' . $cardColorClass . '">
        <div class="card-body">
             <div class="row no-gutters align-items-center">
                 <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Suhu (Temperatur)</div>
                       
                    <div class="mt-2">
                        <span style="font-size: 80px; color: white ">' . $data['suhu']  .  '</span><font style="font-size: 30px; color: white ">  °C</font>
                    </div>
                 </div>
            </div>
         </div>
    </div>
</div>
';

// Mengembalikan HTML sebagai respons untuk dimuat ke dalam card
echo $html;
?>
