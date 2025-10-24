<?php
$error_message = '';
$data_registrasi = null;
$umur = 0;

if (isset($_POST['submit'])) {
    $nama_depan = htmlspecialchars($_POST['nama_depan'] ?? '');
    $nama_belakang = htmlspecialchars($_POST['nama_belakang'] ?? '');
    $asal_kota = htmlspecialchars($_POST['asal_kota'] ?? '');
    $umur = (int)($_POST['umur'] ?? 0); 

    // IMPLEMENTASI SOAL NO. 5: Validasi Umur Minimal 10
    if ($umur < 10) {
        $error_message = "Umur yang dimasukkan minimal adalah 10. Saat ini Umur Anda adalah $umur.";
    } else {
        $data_registrasi = [
            "Nama Depan" => $nama_depan,
            "Nama Belakang" => $nama_belakang,
            "Asal Kota" => $asal_kota,
            "Umur" => $umur,
        ];
    }
} else {
    $error_message = "Data tidak ditemukan. Silakan isi form registrasi terlebih dahulu.";
}
?>

<html>
    <head>
        <title>::Data Registrasi::</title>
        <style type="text/css">
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                background-size: cover;
                background-image: url("https://cdn.arstechnica.net/wp-content/uploads/2023/06/bliss-update-1440x960.jpg");
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
                padding: 20px;
            }
            .container{
                background-color: white;
                border: 3px solid grey;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                max-width: 700px; 
                width: 100%;
            }
            h1{
                text-align: center;
                color: #333;
                margin-bottom: 30px;
                font-size: 28px;
            }
            .success-message, .error-message{
                padding: 15px;
                margin-bottom: 20px;
                border-radius: 5px;
                text-align: center;
                font-weight: bold;
            }
            .success-message{
                 background-color: #d4edda;
                 color: #155724;
                 border: 1px solid #c3e6cb;
            }
            .error-message{
                background-color: #f8d7da;
                color: #721c24;
                border: 1px solid #f5c6cb;
            }
            table{
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            th, td{
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            th{
                background-color: #f8f9fa;
                font-weight: bold;
                color: #333;
                width: 30%;
            }
            td{
                color: #666;
            }
            .data-table th, .data-table td {
                width: auto;
                text-align: center;
            }
            .back-button{
                text-align: center;
                margin-top: 20px;
            }
            .back-button a{
                background-color: #007bff;
                color: white;
                padding: 12px 24px;
                text-decoration: none;
                border-radius: 5px;
                display: inline-block;
                transition: background-color 0.3s;
            }
            .back-button a:hover{
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Data Registrasi User</h1>
            
            <?php if (!empty($error_message)): ?>
                <div class="error-message">
                    <?php echo $error_message; ?>
                </div>
                <div class="back-button">
                    <a href="index.html">Kembali ke Form Registrasi</a>
                </div>
            <?php elseif ($data_registrasi): ?>
                <div class="success-message">
                    Registrasi Berhasil! Data yang Anda masukkan:
                </div>
                
                <table>
                    <?php foreach ($data_registrasi as $label => $value): ?>
                    <tr>
                        <th><?php echo $label; ?></th>
                        <td><?php echo $value; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>

                <h2 style="text-align: center; margin-top: 30px; color: #333;">Tabel Perulangan Umur (<?php echo $umur; ?> Baris)</h2>
                <table class="data-table">
                    <tr>
                        <th style="width: 20%;">Nomor Baris</th>
                        <th>Keterangan</th>
                    </tr>
                    <?php 
                    // Perulangan sebanyak nilai $umur (Soal No. 2)
                    for ($i = 1; $i <= $umur; $i++): 
                        
                        // IMPLEMENTASI SOAL NO. 4: Skip Baris 4 dan 8
                        if ($i == 4 || $i == 8) {
                            continue; 
                        }
                        
                        // IMPLEMENTASI SOAL NO. 3: Hanya tampilkan baris genap
                        if ($i % 2 == 0): 
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td>Ini adalah baris ke-<?php echo $i; ?> (Nomor Genap)</td>
                        </tr>
                    <?php 
                        endif; 
                    endfor; 
                    ?>
                </table>
                <div class="back-button">
                    <a href="index.html">Kembali ke Form Registrasi</a>
                </div>
            <?php endif; ?>
        </div>
    </body>
</html>