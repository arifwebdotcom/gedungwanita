<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<style>
    body {
        font-family: DejaVu Sans, sans-serif;
        font-size: 13px;
        line-height: 1.5;
        margin: 40px;
    }

    h2, h3 {
        text-align: center;
        margin: 0;
        padding: 0;
    }

    ol {
        margin-top: 15px;
        margin-left: 15px;
    }

    .signature-container {
        margin-top: 50px;
        width: 100%;
        text-align: center;
    }

    .signature-row {
        display: flex;
        justify-content: space-between;
        margin-top: 60px;
    }

    .sign-block {
        width: 45%;
        text-align: center;
    }

    .line {
        margin-top: 50px;
        border-top: 1px dotted #000;
        width: 70%;
        margin-left: auto;
        margin-right: auto;
    }
</style>

</head>
<body>

<h2>SYARAT & KETENTUAN SEWA</h2>
<h3>GEDUNG SASANA KRIDA KUSUMA</h3>

<ol>
    <li>Tanda jadi minimal Rp 5.000.000,- (Tiga Juta Rupiah) pada waktu deal tanggal yang dipilih</li>
    <li>Pembayaran angsuran 50% dari total biaya sewa Gedung, dibayarkan 3 bulan sebelum acara berlangsung</li>
    <li>Pelunasan dibayarkan maksimal 2 minggu sebelum acara berlangsung</li>
    <li>Pembatalan penyewa Gedung dengan alasan apapun, Uang Tanda Jadi hangus (tidak bisa dikembalikan)</li>
    <li>Pembatalan dalam jangka waktu 2 bulan sebelum acara. Angsuran 50% tidak dapat dikembalikan kepada Penyewa</li>
    <li>Apabila ada penambahan sewa ruang sayap utara dikenakan biaya Rp 1.500.000,- per ruang (ada 2 ruang tersedia)</li>
    <li>Penambahan Sewa Tenda, Kursi & Meja Taplak, diwajibkan dari Gedung Sasana Krida Kusuma</li>
    <li>Apabila durasi melebihi waktu yang sudah disepakati, dikenakan biaya over time Rp 1.000.000,- per jam</li>
    <li>Penyewa menyatakan telah membaca, memahami, dan menyetujui syarat dan ketentuan yang tertera pada dokumen ini</li>
</ol>

<p style="margin-top:30px;">
    Ditandatangani di <?= $kota ?>, ........................................................
</p>

<table style="width:100%; margin-top:70px; text-align:center;">
    <tr>
        <td style="width:50%;">
            PENYEWA
            <br><br><br><br>
            <span style="border-top: 1px dotted #000; padding-top:5px; display:inline-block; width:70%;"></span>
        </td>

        <td style="width:50%;">
            MANAGEMENT GEDUNG SKK
            <br><br><br><br>
            <span style="border-top: 1px dotted #000; padding-top:5px; display:inline-block; width:70%;"></span>
        </td>
    </tr>
</table>

</body>
</html>
