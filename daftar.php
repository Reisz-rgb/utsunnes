<?php
$error_message = '';
$data_registrasi = null;
$umur = 0;

if (isset($_POST['submit'])) {
    $nama_depan = htmlspecialchars($_POST['nama_depan'] ?? '');
    $nama_belakang = htmlspecialchars($_POST['nama_belakang'] ?? '');
    $asal_kota = htmlspecialchars($_POST['asal_kota'] ?? '');
    $umur = (int)($_POST['umur'] ?? 0);

    // SOAL NO. 5: Validasi Umur Minimal 10
    if ($umur < 10) {
        $error_message = "Error: Umur yang dimasukkan minimal adalah 10. Saat ini Umur Anda adalah $umur.";
    } else {
        $data_registrasi = [
            "Nama Depan" => $nama_depan,
            "Nama Belakang" => $nama_belakang,
            "Asal Kota" => $asal_kota,
            "Umur" => $umur,
        ];
    }
} else {
    $error_message = "Peringatan: Data tidak ditemukan. Silakan isi form registrasi terlebih dahulu.";
}

?>

<html>
    <head>
        <title>::Data Registrasi::</title>
        <style type="text/css">

            body{
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                min-height: 100vh;
                padding-top: 20px;
                padding-bottom: 20px;
                background-color: #f4f7f6;
                background-size: cover;
                background-image: url("https://cdn.arstechnica.net/wp-content/uploads/2023/06/bliss-update-1440x960.jpg");
                background-attachment: fixed;
                background-position: center;
                margin: 0;
                padding: 0;
            }
            .container{
                margin: 20px auto;
                background-color: white;
                padding: 40px;
                border-radius: 12px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.15);
                max-width: 650px;
                width: 90%;
            }
            h1{
                text-align: center;
                color: #007bff; 
                margin-bottom: 10px;
                font-size: 32px;
                font-weight: 700;
            }
            h2{
                 text-align: center;
                 color: #333;
                 margin-top: 30px;
                 margin-bottom: 20px;
                 font-size: 24px;
            }
            .success-message, .error-message{
                padding: 18px;
                margin-bottom: 30px;
                border-radius: 8px;
                text-align: center;
                font-weight: 600;
                font-size: 16px;
            }
            .success-message{
                 background-color: #e6f7ff; 
                 color: #0056b3;
                 border: 1px solid #b3e0ff;
            }
            .error-message{
                background-color: #fff0f0;
                color: #cc0000;
                border: 1px solid #ffb3b3;
            }
            
            .data-summary table{
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
                border: 1px solid #eee;
                border-radius: 8px;
                overflow: hidden;
            }
            .data-summary th, .data-summary td{
                padding: 15px;
                text-align: left;
                border-bottom: 1px solid #f0f0f0;
            }
            .data-summary th{
                background-color: #f8f9fa;
                font-weight: 600;
                color: #495057;
                width: 35%;
            }
            .data-summary td{
                background-color: #ffffff;
                color: #343a40;
            }
            
            .loop-table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            .loop-table th, .loop-table td {
                padding: 12px;
                text-align: center;
                border: 1px solid #ddd;
            }
            .loop-table th {
                background-color: #007bff;
                color: white;
            }
            .loop-table tr:nth-child(even) {
                background-color: #f0f8ff;
            }

            .back-button{
                text-align: center;
                margin-top: 30px;
            }
            .back-button a{
                background-color: #6c757d; 
                color: white;
                padding: 12px 28px;
                text-decoration: none;
                border-radius: 6px;
                display: inline-block;
                font-weight: 600;
                transition: background-color 0.3s;
            }
            .back-button a:hover{
                background-color: #5a6268;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Data Registrasi</h1>
            
            <?php if (!empty($error_message)): ?>
                <div class="error-message">
                    <?php echo $error_message; ?>
                </div>
                <div class="back-button">
                    <a href="index.html">Kembali ke Form</a>
                </div>
            <?php elseif ($data_registrasi): ?>
                <div class="success-message">
                    Registrasi Berhasil! Data pengguna dan hasil perulangan umur ditampilkan di bawah.
                </div>
                
                <div class="data-summary">
                    <table>
                        <?php foreach ($data_registrasi as $label => $value): ?>
                        <tr>
                            <th><?php echo $label; ?></th>
                            <td><?php echo $value; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>

                <h2>Hasil Perulangan (Umur = <?php echo $umur; ?>)</h2>
                <p style="text-align: center; color: #666; font-style: italic;">
                    Hanya menampilkan baris Genap dan melewati baris 4 & 8.
                </p>
                <table class="loop-table">
                    <tr>
                        <th style="width: 20%;">Nomor Iterasi</th>
                        <th>Keterangan</th>
                    </tr>
                    <?php 
                    for ($i = 1; $i <= $umur; $i++): 
                        
                        // SOAL NO. 4: Skip Baris 4 dan 8
                        if ($i == 4 || $i == 8) {
                            continue;
                        }
                        
                        // SOAL NO. 3: Hanya tampilkan baris genap
                        if ($i % 2 == 0): 
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td>Baris Genap ke-<?php echo $i/2; ?></td>
                        </tr>
                    <?php 
                        endif;
                    endfor;
                    ?>
                </table>
                
                <div class="back-button">
                    <a href="index.html">Kembali ke Form</a>
                </div>
            <?php endif; ?>
        </div>
    </body>
</html>