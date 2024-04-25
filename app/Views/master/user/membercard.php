<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<?php
$breadcrumb_items = [
    'title' => 'Member',
    'items' => [
        ['name' => 'Master', 'active' => false],
        ['name' => 'Member', 'active' => true]
    ]
];
?>

<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Kartu Member</span>
            <span class="text-muted mt-1 fw-bold fs-7">Data Member</span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <form action="<?= base_url() ?>user/<?= $id ?>/edit" method="post" enctype="multipart/form-data" id="form_import">
    <div class="card-body row">
        <div class="credit-card" style="margin: auto;">
            <div class="credit-card-front">
                <div class="credit-card-label">Kode Anggota</div>
                <div class="credit-card-number"><?= $user->kodeanggota; ?></div>
                <div class="credit-card-info">
                <div class="credit-card-holder"><?= $user->namapeternakan; ?></div>
                <div class="credit-card-expiry"><?= date("m/y",strtotime($user->tglgabung)); ?></div>
                </div>
                <img src="<?= base_url() ?>assets/media/avatars/blank.png" alt="Cardholder" class="cardholder-img">
            </div>            
        </div>
    </div>
    </form>
    <!--begin::Body-->
</div>
<!--end::Tables Widget 11-->
<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->section('script') ?>

<?= $this->endSection() ?>