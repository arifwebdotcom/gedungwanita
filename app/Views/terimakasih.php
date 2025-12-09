<?= $this->extend('template'); ?>

<?= $this->section('content'); ?>

  <div data-bs-spy="scroll" class="scrollspy-example">
    <!-- Hero: Start -->
    <section id="landingHero" class="landing-hero position-relative">      
    <div class="container">
      <div class="card px-4">
        <div class="row">
          <div class="col-12 col-lg-8 mx-auto text-center mb-4">
            <h4>Terima Kasih! 😇</h4>
            <p>Pesanan oleh <?= $booking->pemesan ?> dengan kodebooking <b><h5><?= $booking->kodebooking ?></h5></b> sudah berhasil kami terima!</p>
            <p>Kami sudah mengirimkan detail pesanan Anda ke WhatsApp <?= $booking->nohpsaudara ?> Anda akan segera dihubungi marketing kami.</p>
            <p class="d-flex align-items-center justify-content-center">
              <span><i class="icon-base ri ri-time-line icon-20px text-heading me-1"></i></span>Waktu Pemesanan: <?= date("d-m-Y H:i:s",strtotime($booking->created_at)); ?>
            </p>
          </div>
        </div>
      </div>
    </div>
        
    </section>

    <!-- Contact Us: End -->
  </div>
  <?= $this->endSection(); ?>
  