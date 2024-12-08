<?php

    // Memeriksa apakah data telah disubmit
    if (isset($_POST['username'])) {
        // Mengambil data dari formulir
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        // Password tidak ditampilkan, tetapi kita ambil untuk tujuan validasi atau penyimpanan
        $password = htmlspecialchars($_POST['password']);

        //Memproses array barang dan jumlah
        $barang = isset($_POST['barang']) ? $_POST['barang'] : []; // Array jumlah produk
        $jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : array(); // Array jumlah produk

        $json_barang = json_encode($barang);
        // Menghubungkan ke file koneksi.php
        include 'Koneksi_web.php';
        // Query untuk menyimpan data
        $sql = "INSERT INTO transaksi (nama,email, password, data_barang) VALUES ('$username', '$email', '$password', '$json_barang')";

        // Menjalankan query
        if (mysqli_query($conn, $sql)) {
            echo "Data berhasil disimpan!";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }

        // Menutup Koneksi
        mysqli_close($conn);

    
        // Tampilan data dalam tabel
        $tampil = "
        <style>
            body {
                font-family: 'Courier New', Courier, monospace;
                font-size: 14px;
                margin: 20px;
                background-color: #f9f9f9;
            }       
            .invoice {
                width: 500px;
                margin: 0 auto;
                background-color: #fff;
                border: 1px solid #ddd;
                border-radius: 8px;
            
            }
            h2 {
                display: flex;
                justify-content: center;
                text-align: center;
                font-size: 22px;
                color: #333;
                margin: 0 0 20px;
            }
            .content {
                margin: 10px 0;
                color: #555;
            }
            .item {
                margin: 5px 0;
            }
            table { 
                display: flex;
                justify-content: center;
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
                
            }
            th, td {
                padding: 10px;
                text-align: left; 
                border: 1px solid #ddd; 
            }
            th {
                background-color: #f4f4f4; 
                font-weight: bold;
            }   
            .footer {
                text-align: center; 
                margin-top: 20px; 
                font-style: italic;
                color: #777;
            }
            .line {
                border-top: 1px dashed #000;
                margin: 1px 10px 0;
            }
            .header {
                text-align: center; /* Perbaikan di sini */
            }
            .logo {
                font-size: 18px;
                font-weight: bold;
            }
            .separator {
                width: 100%;
                max-width: 4000px;
                display: block;
                margin: 10px auto;
            }
            img.gambar {
                width: 100%;
                max-width: 400px;
                display: block;
                margin: 10px auto;
            }
        </style>
        <div class='invoice'>
            <h2>invoice</h2>
            <img src='https://3.bp.blogspot.com/-U8uh0D18jIk/UbgpTu4BeeI/AAAAAAAAACQ/w7KZvxBktYk/s1600/gambar+laptop+asus+core+i3.jpg' class='gambar' alt='Logo'> 
            <table>
                <tr>
                    <th>Field</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>".$username."</td>
                </tr>                <tr>
                    <td>Email</td>
                    <td>".$email."</td> 
                </tr>
                <tr>
                    <td>Password</td>
                    <td>".$password."</td>
                </tr>
                <tr>
                    <td>Barang yang dipilih</td>
                    <td>";      
                
                // Menampilkan produk yang dipilih dan jumlahnya
                if (!empty($barang)) {
                    foreach ($barang as $key => $product) {
                        $product_quantity = $jumlah[$key]; // Jumlah produk yang dipilih
                        $tampil .= "<p>$product - Jumlah: $product_quantity</p>";
                    }
                } else {
                    $tampil .= "<p>Tidak ada barang yang dipilih.</p>";
                }
                    
                $tampil .= "
                    </td>
                </tr>
            </table>
            <div class='footer'>
                Terima Kasih atas partisipasi Anda!!
            </div>
        </div>";
    } else {
        $tampil = "<p style='text-align:center; font-size: 18px;'>Data Tidak disubmit</p>";
    }
    
    echo $tampil; // Perbaikan di sini
    ?>