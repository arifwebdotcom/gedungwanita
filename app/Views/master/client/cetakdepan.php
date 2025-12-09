<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<style>
    body {
        font-family: DejaVu Sans, sans-serif;
        font-size: 13px;
    }

    .wrapper {
        width: 100%;
        border: 2px solid #000;
        padding: 15px;
    }

    .top-section {
        display: flex;
        align-items: center;
        padding-bottom: 10px;
        border-bottom: 2px solid black;
    }

    .logo img {
        width: 120px;
    }

    .header-text {
        width: 100%;
        text-align: center;
        font-weight: bold;
        line-height: 1.3;
    }

    .judul {
        text-align: center;
        margin-top: 20px;
        margin-bottom: 20px;
        font-weight: bold;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    td {
        padding: 4px 5px;
        vertical-align: top;
    }

    .bordered {
        border: 1px solid #000;
    }

    .sub-title {
        font-weight: bold;
        margin-top: 10px;
    }

    .col-title {
        text-align: center;
        font-weight: bold;
        padding: 5px;
        border-bottom: 1px solid black;
    }

</style>
</head>

<body>
<div class="wrapper">

    <!-- HEADER -->
    <div class="top-section">
        <div class="logo">
            <img src="<?= base_url('/assets/img/logo.png') ?>" alt="Logo">
        </div>
        <div class="header-text">
            YAYASAN DHARMA KUSUMA <br>
            BADAN PENGELOLA <br>
            SASANA KRIDA KUSUMA <br>
            JL. MENTERI SUPENO NO. 1 – MANAHAN <br>
            TELP. (0271) 717508 – 717508 – 717338 <br>
            SURAKARTA – 57139
        </div>
    </div>

    <!-- TITLE -->
    <div class="judul">
        PERSETUJUAN/ANTARA GEDUNG SASANA KRIDA KUSUMA <br>
        DENGAN (PIHAK PENYEWA)
    </div>

    <!-- FORM ATAS -->
    <table>
        <tr>
            <td width="20%">DENGAN</td>
            <td class="bordered" width="60%">: <?= $penyewa ?></td>
            <td width="20%" style="text-align:right;">(PIHAK PENYEWA)</td>
        </tr>
    </table>

    <br>

    <table>
        <tr>
            <td width="20%">PENANGGUNG JAWAB</td>
            <td>: <?= $penanggung ?></td>
            <td width="20%">NO TELEPON</td>
            <td>: <?= $telepon ?></td>
        </tr>
        <tr>
            <td>ALAMAT</td>
            <td colspan="3">: <?= $alamat ?></td>
        </tr>
    </table>

    <br><br>

    <!-- DETAIL ACARA -->
    <table class="bordered">
        <tr>
            <td width="50%">
                <table width="100%">
                    <tr><td>ACARA</td><td>: <?= $acara ?></td></tr>
                    <tr><td>TEMPAT</td><td>: <?= $tempat ?></td></tr>
                    <tr><td>TARIF SEWA</td><td>: <?= $tarif ?></td></tr>
                    <tr><td>JUMLAH TAMU</td><td>: <?= $tamu ?></td></tr>
                </table>
            </td>

            <td width="50%">
                <table width="100%">
                    <tr><td>HARI/TANGGAL</td><td>: <?= $tanggal ?></td></tr>
                    <tr><td>WAKTU</td><td>: <?= $waktu ?></td></tr>
                    <tr><td>RESEPSI</td><td>: <?= $resepsi ?></td></tr>
                </table>
            </td>
        </tr>
    </table>

    <br>

    <!-- Lain lain & perincian -->
    <table class="bordered">
        <tr>
            <td width="50%" class="col-title">LAIN LAIN</td>
            <td width="50%" class="col-title">PERINCIAN</td>
        </tr>
        <tr>
            <td style="height: 300px; vertical-align: top; padding:10px;">
                <?= $lainlain ?>
            </td>
            <td style="height: 300px; vertical-align: top; padding:10px;">
                <?= $perincian ?>
            </td>
        </tr>
    </table>

</div>
</body>
</html>
