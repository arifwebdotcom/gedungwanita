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
        border-top: 1px solid black;
    }

</style>
</head>

<body>
<div class="wrapper">

    <!-- HEADER -->
    <table width="100%" style="border-bottom:2px solid #000; margin-bottom:10px;">
        <tr>
            <td style="width:130px; text-align:left;">
                <img src="https://www.sasanakridakusuma.com/wp-content/uploads/2023/10/Logo-150x150.jpg" 
                    style="width:120px;">
            </td>

            <td style="text-align:center; font-weight:bold; line-height:1.3; font-size:14px;">
                YAYASAN DHARMA KUSUMA <br>
                BADAN PENGELOLA <br>
                SASANA KRIDA KUSUMA <br>
                JL. MENTERI SUPENO NO. 1 – MANAHAN <br>
                TELP. (0271) 717508 – 717508 – 717338 <br>
                SURAKARTA – 57139
            </td>
        </tr>
    </table>

    <!-- TITLE -->
    <div class="judul">
        PERSETUJUAN/ANTARA GEDUNG SASANA KRIDA KUSUMA <br>
        DENGAN (PIHAK PENYEWA)
    </div>

    <!-- FORM ATAS -->
    <table>
        <tr>
            <td width="20%">DENGAN</td>
            <td class="bordered" width="60%">: <?= $client->pemesan ?></td>
            <td width="20%" style="text-align:right;">(PIHAK PENYEWA)</td>
        </tr>
    </table>

    <br>

    <table>
        <tr>
            <td width="25%">PENANGGUNG JAWAB</td>
            <td colspan="5">: </td>
        </tr>
        <tr>
            <td>ALAMAT</td>
            <td colspan="3">: <?= $client->alamat ?></td>
            <td width="20%">NO TELEPON</td>
            <td>: <?= $client->nohp ?></td>
        </tr>
    </table>

    <!-- DETAIL ACARA -->
    <table class="bordered" style="width:100%;heigt:100%; border:1px solid #000; border-collapse: collapse;margin-bottom: -31px;">
        <tr>
            <td width="50%" style="border-right:1px solid #000;">
                <table width="100%">
                    <tr><td>ACARA</td><td>: <?= $client->tipeevent ?></td></tr>
                    <tr><td>TEMPAT</td><td>: <?= $tempat ?></td></tr>
                    <tr><td>TARIF SEWA</td><td>: <?= rupiah($client->hargadeal) ?></td></tr>
                    <tr><td>JUMLAH TAMU</td><td>: </td></tr>
                </table>
            </td>
            <?php 

            $tanggal = $client->tanggal; // contoh: 2025-12-06 00:00:00

            $hari = [
                'Sunday'    => 'Minggu',
                'Monday'    => 'Senin',
                'Tuesday'   => 'Selasa',
                'Wednesday' => 'Rabu',
                'Thursday'  => 'Kamis',
                'Friday'    => 'Jumat',
                'Saturday'  => 'Sabtu'
            ];

            $dt = new DateTime($tanggal);

            $namaHari = $hari[$dt->format('l')];
            $formatTgl = $dt->format('d-m-Y');

            ?>

            <td width="50%">
                <table width="100%">
                    <tr><td>HARI/TANGGAL</td><td>: <?= $namaHari.", ".$formatTgl ?></td></tr>
                    <tr><td>WAKTU</td><td>: <?= $client->sesi ?></td></tr>
                    <tr><td>RESEPSI</td><td>: </td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td width="50%" class="col-title" style="border-right:1px solid #000;">LAIN LAIN</td>
            <td width="50%" class="col-title">PERINCIAN</td>
        </tr>
        <tr>
            <td style="height: 450px; vertical-align: top; padding:10px; border-right:1px solid #000;">
                <?= $client->keterangan ?>
            </td>
            <td style="height: 450px; vertical-align: top; padding:10px;">
            </td>
        </tr>
    </table>

    <br>

    <!-- Lain lain & perincian -->
    <table class="bordered" style="width:100%; border:1px solid #000; border-collapse: collapse;">
        
    </table>

</div>
</body>
</html>
