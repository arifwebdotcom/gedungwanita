<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<?php
$breadcrumb_items = [
    'title' => 'Client',
    'items' => [
        ['name' => 'Master', 'active' => false],
        ['name' => 'Client', 'active' => true]
    ]
];
?>

<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Detail</span>
            <span class="text-muted mt-1 fw-bold fs-7">Data Client</span>
        </h3>
        <div class="card-toolbar">            
            
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="row">
            <form id="client_form" class="form row">
            <!--begin::Table-->
            <div class="col-md-4 mb-2">
                <div class="form-floating form-floating-outline mb-2">
                    <select id="tipefk" name="tipefk" class="form-select">
                        <?php foreach($tipe as $t): ?>
                            <option value="<?= $t->id ?>"><?= $t->tipeevent ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="tipefk">Tipe Event</label>
                </div>
                <div class="form-floating form-floating-outline mb-2">                
                    <input type="hidden" id="idclient" name="idclient" class="form-control" value="<?= isset($client) ? $client->id : '' ?>">
                    <input type="hidden" id="bookingfk" name="bookingfk" class="form-control" value="<?= isset($client) ? $client->bookingid : '' ?>">
                    <input type="text" id="pemesan" name="pemesan" class="form-control" placeholder="Pemesan" value="<?= isset($client) ? $client->pemesan : '' ?>">
                    <label for="pemesan">Pemesan</label>
                </div>
                <div class="form-floating form-floating-outline mb-2">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?= isset($client) ? $client->email : '' ?>">
                    <label for="email">Email</label>
                </div>
                <div class="form-floating form-floating-outline mb-2">
                    <textarea id="alamat" name="alamat" class="form-control" placeholder="Alamat" style="height: 100px"><?= isset($client) ? $client->alamat : '' ?></textarea>
                    <label for="alamat">Alamat</label>
                </div>
                <div class="form-floating form-floating-outline mb-2">
                    <input type="text" id="nohp" name="nohp" class="form-control" placeholder="No HP" value="<?= isset($client) ? $client->nohp : '' ?>">
                    <label for="nohp">No HP</label>
                </div>
                <div class="form-floating form-floating-outline mb-2">
                    <input type="text" id="nohpsaudara" name="nohpsaudara" class="form-control" placeholder="No HP Saudara" value="<?= isset($client) ? $client->nohpsaudara : '' ?>">
                    <label for="nohpsaudara">No HP Saudara</label>
                </div>

            </div>
            <div class="col-md-4 mb-2">
                <div class="form-floating form-floating-outline mb-2">
                    <input type="text" id="cpp" name="cpp" class="form-control" placeholder="CPP" value="<?= isset($client) ? $client->cpp : '' ?>">
                    <label for="cpp">CPP</label>
                </div>
                <div class="form-floating form-floating-outline mb-2">
                    <input type="text" id="igcpp" name="igcpp" class="form-control" placeholder="Instagram CPP" value="<?= isset($client) ? $client->igcpp : '' ?>">
                    <label for="igcpp">IG CPP</label>
                </div>
                <div class="form-floating form-floating-outline mb-2">
                    <input type="text" id="cpw" name="cpw" class="form-control" placeholder="CPW" value="<?= isset($client) ? $client->cpw : '' ?>">
                    <label for="cpw">CPW</label>
                </div>
                <div class="form-floating form-floating-outline mb-2">
                    <input type="text" id="igcpw" name="igcpw" class="form-control" placeholder="Instagram CPW" value="<?= isset($client) ? $client->igcpw : '' ?>">
                    <label for="igcpw">IG CPW</label>
                </div>
                <div class="form-floating form-floating-outline mb-2">
                    <input type="text"  id="hargaasli" name="hargaasli" class="form-control rupiah" placeholder="Harga Asli" value="<?= isset($client) ? $client->hargaasli : '' ?>">
                    <label for="hargaasli">Harga Asli</label>
                </div>
                <div class="form-floating form-floating-outline mb-2">
                    <input type="text"  id="hargadeal" name="hargadeal" class="form-control rupiah" placeholder="Harga Deal" value="<?= isset($client) ? $client->hargadeal : '' ?>">
                    <label for="hargadeal">Harga Deal</label>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-floating form-floating-outline mb-2">
                    <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal" value="<?= isset($client) ? date("Y-m-d",strtotime($client->tanggal)) : '' ?>">
                    <label for="tanggal">Tanggal</label>
                </div>
                <div class="form-floating form-floating-outline mb-2">
                    <select id="sesi" name="sesi" class="form-select">
                        <option value="PAGI" <?= isset($client) ? $client->sesi == 'PAGI' ? 'selected' : '' : '' ?>>PAGI</option>
                        <option value="SIANG" <?= isset($client) ? $client->sesi == 'SIANG' ? 'selected' : '' : '' ?>>SIANG</option>
                        <option value="MALAM" <?= isset($client) ? $client->sesi == 'MALAM' ? 'selected' : '' : '' ?>>MALAM</option>
                    </select>
                    <label for="sesi">Sesi</label>
                </div>
                <div class="form-floating form-floating-outline mb-2">
                    <select id="status" name="status" class="form-select">
                        <option value="KEEP" <?= isset($client) ? $client->status == 'KEEP' ? 'selected' : '' : '' ?>>KEEP</option>
                        <option value="DP" <?= isset($client) ? $client->status == 'DP' ? 'selected' : '' : '' ?>>DP</option>
                        <option value="50%" <?= isset($client) ? $client->status == '50%' ? 'selected' : '' : '' ?>>50%</option>
                        <option value="LUNAS" <?= isset($client) ? $client->status == 'LUNAS' ? 'selected' : '' : '' ?>>LUNAS</option>
                    </select>
                    <label for="status">Status</label>
                </div>
                <div class="form-floating form-floating-outline mb-2">
                    <select id="paket" name="paket" class="form-select">
                        <?php foreach($paket as $p): ?>
                            <option value="<?= $p->id ?>" <?= isset($client) ? $client->paketfk == $p->id ? 'selected' : '' : '' ?>><?= $p->paket ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="paket">Paket</label>
                </div>
                <div class="form-floating form-floating-outline mb-2">
                    <input type="text"  id="kursi" name="kursi" class="form-control" placeholder="Kursi" value="<?= isset($client) ? $client->kursi : '' ?>">
                    <label for="kursi">Jumlah Kursi</label>
                </div>
                <div class="form-floating form-floating-outline">
                    <textarea id="keterangan" name="keterangan" class="form-control" style="height: 120px" placeholder="Detail"><?= isset($client) ? $client->keterangan : '' ?></textarea>
                    <label for="keterangan">Keterangan</label>
                </div>
            </div>
            <div class="col-md-12 mb-2">
                <div class="mt-6">
                    <button type="submit" class="btn btn-primary me-3 waves-effect waves-light">Simpan Perubahan</button>
                </div>
            </div>
            </form>
        </div>
        <!--end::Table container-->
    </div>
    <!--begin::Body-->
</div>

<div class="card mb-6">
    <!-- Current Plan -->
    <h5 class="card-header">Current Plan</h5>
    <div class="card-body pt-1">
        <div class="row">
        <div class="col-md-6 mb-1">
            <?php
            $mapping = [
                'KEEP'  => ['color' => 'timeline-point-warning', 'label' => 'KEEP'],
                'DP'    => ['color' => 'timeline-point-primary', 'label' => 'DP'],
                '50%'   => ['color' => 'timeline-point-success', 'label' => '50%'],
                'LUNAS' => ['color' => 'timeline-point-info', 'label' => 'LUNAS'],
            ];

            $order = ['KEEP', 'DP', '50%', 'LUNAS'];

            usort($transaksi, function($a, $b) use ($order) {
                return array_search($a->status, $order) - array_search($b->status, $order);
            });

            ?>
            <ul class="timeline card-timeline mb-0">
                <?php 
                if($transaksi && count($transaksi) > 0) {
                foreach ($transaksi as $t): ?>

                    <?php 
                        $tipe = $t->status;  
                        $color = $mapping[$tipe]['color'];
                        $label = $mapping[$tipe]['label'];
                        $waktu = $t->tglbayar; 
                    ?>

                    <li class="timeline-item timeline-item-transparent">
                        <span class="timeline-point <?= $color ?>"></span>

                        <div class="timeline-event">
                            <div class="timeline-header mb-3">
                                <h6 class="mb-0"><?= $label ?> ~ <?= $t->pj ?></h6>
                                <small class="text-body-secondary"><?= $waktu ?></small>
                            </div>

                            <p class="mb-2"><?= esc($t->keterangan) ?></p>
                            <p class="mb-2"><?= rupiah($t->nominal) ?></p>
                        </div>
                    </li>

                <?php endforeach;
                }else{
                    echo '<li class="timeline-item timeline-item-transparent">
                        <span class="timeline-point timeline-point-warning"></span>
                        <div class="timeline-event">
                            <div class="timeline-header mb-3">
                                <h6 class="mb-0">Belum ada transaksi</h6>
                            </div>
                        </div>
                    </li>';
                } ?>
            </ul>
        </div>
        <?php

        $startDate = date('Y-m-d', strtotime($client->tanggal));

        $today = new DateTime(date('Y-m-d')); // normalisasi jam ke 00:00:00
        $start = new DateTime($startDate);

        $remainingDays = (int)$today->diff($start)->format('%a');

        if ($today > $start) {
            $remainingDays = 0;
        }

        $status = $client->status;

        // Tentukan class width progres
        $progressClass = match($status) {
            'DP'     => 'w-25',
            '50%'    => 'w-50',
            'LUNAS'  => 'w-100',
            default  => 'w-0',
        };
        ?>

        <div class="col-md-6">
            <?php if($client->status != 'LUNAS'): ?>
                <div class="alert alert-warning mb-6 alert-dismissible" role="alert">
                    <h5 class="alert-heading mb-1 d-flex align-items-center">
                        <span class="alert-icon rounded"><i class="icon-base ri ri-alert-line icon-22px"></i></span>
                        <span>Transaksi belum lunas!</span>
                    </h5>            
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                    <div class="plan-statistics">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-1"><?= $remainingDays ?></h6>
                        <h6 class="mb-1">Days Remaining</h6>
                    </div>
                    <div class="progress rounded bg-label-primary mb-1">
                        <div class="progress-bar <?= $progressClass ?> rounded" role="progressbar" aria-valuenow="<?= str_replace('%', '', $status) ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small><?= $remainingDays ?> hari sebelum acara</small>
                </div>
            <?php else: ?>
                <div class="alert alert-success mb-6 alert-dismissible" role="alert">
                    <h5 class="alert-heading mb-1 d-flex align-items-center">
                        <span class="alert-icon rounded"><i class="icon-base ri ri-alert-line icon-22px"></i></span>
                        <span>Transaksi sudah lunas!</span>
                    </h5>            
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                    <div class="plan-statistics">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-1"><?= $remainingDays ?></h6>
                        <h6 class="mb-1">Days Remaining</h6>
                    </div>
                    <div class="progress rounded bg-label-primary mb-1">
                        <div class="progress-bar <?= $progressClass ?> rounded" role="progressbar" aria-valuenow="<?= str_replace('%', '', $status) ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small><?= $remainingDays ?> hari sebelum acara</small>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-12 d-flex gap-2 mt-6 flex-wrap">
            <button class="btn btn-primary me-2 waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#pricingModal">Tambah Cicilan</button>            
        </div>
        </div>
    </div>
    <!-- /Current Plan -->
    </div>

<div class="modal fade" id="pricingModal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
    <form id="cicilan_form" class="form" >
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modal_title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        
        <div class="col-md-12 mb-2">
            <div class="form-floating form-floating-outline">
                <input type="text" id="pj" name="pj" class="form-control" placeholder="Penanggung Jawab">
                <label for="pj">Penanggung Jawab</label>
            </div>
        </div>
        <!-- Tanggal -->
        <div class="col-md-12 mb-2">
            <div class="form-floating form-floating-outline">
                <input type="hidden" id="bookingfk" name="bookingfk" class="form-control" value="<?= isset($client) ? $client->bookingid : '' ?>">
                <input type="datetime-local" id="tanggalbayar" name="tanggalbayar" class="form-control" placeholder="Tanggal">
                <label for="tanggalbayar">Tanggal Bayar</label>
            </div>
        </div>

        <div class="row">
            
           <div class="col-md-6 mb-2">
                <div class="form-floating form-floating-outline">
                    <select id="status" name="status" class="form-select">
                        <option value="KEEP">KEEP</option>
                        <option value="DP">DP</option>
                        <option value="50%">50%</option>
                        <option value="LUNAS">LUNAS</option>
                    </select>
                    <label for="status">Status</label>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <div class="form-floating form-floating-outline">
                    <input type="number" step="1" id="nominal" name="nominal" class="form-control" placeholder="Nominal">
                    <label for="nominal">Nominal</label>
                </div>
            </div>
         </div>
        <!-- Detail -->
        <div class="col-md-12 mb-2">
            <div class="form-floating form-floating-outline">
                <textarea id="keterangan" name="keterangan" class="form-control" style="height: 120px" placeholder="Detail"></textarea>
                <label for="keterangan">Keterangan</label>
            </div>
        </div>
       
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
        </div>        
    </div>
    </form>
    </div>
</div>
<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->section('script') ?>

<script>
    function formatRupiah(angka) {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0
        }).format(angka);
    }

    function unformatRupiah(str) {
        return str.replace(/[^0-9]/g, '');
    }

    // Event formatting
    $('.rupiah').each(function () {
        let angka = unformatRupiah($(this).val());
        if (angka) $(this).val(formatRupiah(angka));
        console.log(formatRupiah(angka));
    });

    $('#client_form').on('submit', function(e) {
        e.preventDefault()
        $('.rupiah').each(function () {
            let angka = unformatRupiah($(this).val());
            $(this).val(angka);
        });
        var form_data = $(this).serializeArray();
        let id = $('#client_form #bookingfk').val();
        let route = (id != '') ?
            `<?= base_url() ?>client/${id}/edit` :
            "<?= route_to('client.store') ?>";
        
        $.ajax({
            url: route,
            type: 'post',
            dataType: 'json',
            data: form_data,
            success: function(response) {                
                if (response.status) {
                    toastr.success(response.messages,"Sukses");
                    //location.reload();
                } else {
                    toastr.error("Gagal!","Error");
                }
            },
            error: function(err) {
                toastr.error(err,"Error");
            }
        });    
    });

    $('#cicilan_form').on('submit', function(e) {
        e.preventDefault()
        var form_data = $(this).serializeArray();
        let id = $('#cicilan_form #bookingfk').val();
        let route = `<?= base_url() ?>client/addcicilan/${id}` ;
        
        $.ajax({
            url: route,
            type: 'post',
            dataType: 'json',
            data: form_data,
            success: function(response) {     
                console.log(response);           
                if (response.status) {
                    toastr.success(response.messages,"Sukses");
                    location.reload();
                } else {
                    toastr.error("Gagal!","Error");
                }
            },
            error: function(err) {
                toastr.error(err,"Error");
            }
        });    
    });

</script>


<?= $this->endSection() ?>