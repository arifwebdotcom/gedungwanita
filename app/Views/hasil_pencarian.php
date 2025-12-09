<h5 class="mt-2 mb-0">Detail Client</h5>
<ul class="list-unstyled my-3 py-1 container">
    <li class="d-flex align-items-center mb-4">
        <i class="icon-base ri ri-group-3-line icon-24px"></i>
        <span class="fw-medium mx-2">Pasangan:</span>
        <span><?= $booking->cpp." & ".$booking->cpw ?></span>
    </li>

    <li class="d-flex align-items-center mb-4">
        <i class="icon-base ri ri-check-line icon-24px"></i>
        <span class="fw-medium mx-2">Status:</span>
        <span><?= $booking->status ?></span>
    </li>

    <li class="d-flex align-items-center mb-4">
        <i class="icon-base ri ri-calendar-check-line icon-24px"></i>
        <span class="fw-medium mx-2">Tanggal:</span>
        <span><?= $booking->tanggal ?></span>
    </li>

    <li class="d-flex align-items-center mb-4">
        <i class="icon-base ri ri-timer-2-line icon-24px"></i>
        <span class="fw-medium mx-2">Sesi:</span>
        <span><?= $booking->sesi ?></span>
    </li>
    <li class="d-flex align-items-center mb-4">
        <i class="icon-base ri ri-booklet-line icon-24px"></i>
        <span class="fw-medium mx-2">Keterangan:</span>
        <span><?= $booking->keterangan ?></span>
    </li>
</ul>

<h5>Detail Pembayaran</h5>

<?php
$mapping = [
    'KEEP'  => ['color' => 'timeline-point-warning', 'label' => 'KEEP'],
    'DP'    => ['color' => 'timeline-point-primary', 'label' => 'DP'],
    '50%'   => ['color' => 'timeline-point-success', 'label' => '50%'],
    'LUNAS' => ['color' => 'timeline-point-info', 'label' => 'LUNAS'],
];

$order = ['KEEP','DP','50%','LUNAS'];

usort($transaksi, function($a, $b) use ($order){
    return array_search($a->status, $order) - array_search($b->status, $order);
});
?>
<div class="container">
    <ul class="timeline card-timeline mb-0 ">
    <?php if ($transaksi): ?>
        <?php foreach ($transaksi as $t): ?>
            <?php 
                $color = $mapping[$t->status]['color'];
                $label = $mapping[$t->status]['label'];
            ?>
            <li class="timeline-item timeline-item-transparent">
                <span class="timeline-point <?= $color ?>"></span>

                <div class="timeline-event">
                    <div class="timeline-header mb-3">
                        <h6 class="mb-0"><?= $label ?> ~ <?= $t->pj ?></h6>
                        <small class="text-body-secondary"><?= $t->tglbayar ?></small>
                    </div>

                    <p class="mb-2"><?= esc($t->keterangan) ?></p>
                    <p class="mb-2"><?= rupiah($t->nominal) ?></p>
                </div>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <li class="timeline-item timeline-item-transparent">
            <span class="timeline-point timeline-point-warning"></span>
            <div class="timeline-event">
                <h6 class="mb-0">Belum ada transaksi</h6>
            </div>
        </li>
    <?php endif; ?>
    </ul>
</div>