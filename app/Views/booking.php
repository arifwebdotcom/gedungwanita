<?= $this->extend('template'); ?>

<?= $this->section('content'); ?>

  <div data-bs-spy="scroll" class="scrollspy-example">
    <!-- Hero: Start -->
    <section id="landingHero" class="landing-hero position-relative">      
    <div class="container">
      <div class="card px-4">
        <div class="row">
          <div class="col-lg-7 card-body border-end p-8 ps-7">
            <form method="post" action="/booking/submit" id="booking_form">
            <h4 class="mb-2">Form Booking</h4>
            <p class="mb-0">
              Kategori Event
            </p>
            <div class="row my-8 gx-5">
              <div class="col-md mb-md-0 mb-2">
                <div class="form-check custom-option custom-option-basic checked">
                  <label class="form-check-label custom-option-content form-check-input-payment gap-4 align-items-center" for="Wedding">
                    <input name="tipefk" class="form-check-input my-2" type="radio" value="1" id="Wedding" checked="">
                    <span class="custom-option-body">
                      <img src="/assets/img/wedding.png" alt="wedding" width="58" style="visibility: visible;">
                      <span class="text-nowrap">Wedding</span>
                    </span>
                  </label>
                </div>
              </div>
              <div class="col-md mb-md-0 mb-2">
                <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content form-check-input-payment gap-4 align-items-center" for="NonWedding">
                    <input name="tipefk" class="form-check-input my-2" type="radio" value="2" id="NonWedding">
                    <span class="custom-option-body">
                      <img src="/assets/img/event.png" alt="nonwedding" width="58" style="visibility: visible;">
                      <span class="ms-4">Non Wedding</span>
                    </span>
                  </label>
                </div>
              </div>
            </div>
            <h4 class="mb-6">Detail Pemesan</h4>            
              <div class="row g-4">
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline ">
                    <input type="text" class="form-control" id="pemesan" name="pemesan" required aria-describedby="pemesan">
                    <label for="pemesan">NamaPemesan</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input type="text" id="nohp" class="form-control" name="nohp" aria-describedby="nohp">
                    <label for="nohp">No HP</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input type="text" id="cpp" class="form-control" name="cpp" aria-describedby="cpp">
                    <label for="cpp">Nama Calon Pengantin Pria</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input type="text" id="cpw" class="form-control" name="cpw" aria-describedby="cpw">
                    <label for="cpw">Nama Calon Pengantin Wanita</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input type="email" id="email" class="form-control" name="email" aria-describedby="email">
                    <label for="email">Email</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input type="text" id="alamat" class="form-control" name="alamat" aria-describedby="alamat">
                    <label for="alamat">Alamat</label>
                  </div>
                </div>
              </div>
            
            <div id="form-credit-card">
              <h4 class="mt-8 mb-6">Informasi Event</h4>              
                <div class="row g-4">
                  <div class="col-md-3">
                    <div class="form-floating form-floating-outline">
                      <input type="date" id="tanggal" class="form-control" name="tanggal" aria-describedby="tanggal">
                      <label for="tanggal">Tanggal</label>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-floating form-floating-outline">
                      <select class="form-control" id="sesi" name="sesi">
                        <option value="" disabled selected>Pilih Sesi</option>
                        <option value="PAGI">PAGI</option>
                        <option value="SIANG">SIANG</option>
                        <option value="MALAM">MALAM</option>
                      </select>
                      <label for="sesi">Sesi</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating form-floating-outline">
                      <select class="form-control" id="paket" name="paketfk">
                        <option value="" disabled selected>Pilih Paket</option>
                        <?php foreach($paket as $p){ ?>
                        <option value="<?= $p->id ?>"><?= $p->paket ?></option>
                        <?php } ?>                       
                      </select>
                      <label for="paket">Paket</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-floating form-floating-outline">
                      <textarea class="form-control" id="keterangan" name="keterangan" style="height: 100px;"></textarea>
                      <label for="keterangan">Catatan</label>
                    </div>
                  </div>                  
                </div>
            </div>
          </div>
          <div class="col-lg-5 card-body p-8 pe-7">
            <h4 class="mb-2">Fasilitas</h4>
            <p class="mb-8" id="fasilitas">
            </p>
            <div class="bg-lightest p-6 rounded">
              <p>Catatan</p>
              <p id="catatan"></p>
            </div>
            <div class="mt-5">
              <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0">Harga</p>
                <h6 class="mb-0 harga">Rp. 0,-</h6>
              </div>              
              <hr>
              <div class="d-flex justify-content-between align-items-center pb-1">
                <p class="mb-0">Total Harga</p>
                <h6 class="mb-0 harga">Rp. 0,-</h6>
              </div>
              <p></p>
              <div class="accordion" id="accordionFront">
                <div class="accordion-item active">
                  <h2 class="accordion-header" id="head-Three">
                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#snk" aria-expanded="false" aria-controls="snk">Syarat & Ketentuan</button>
                  </h2>
                  <div id="snk" class="accordion-collapse collapse" aria-labelledby="snk" data-bs-parent="#accordionFront">
                    <div class="accordion-body" id="snk">
                      
                    </div>
                  </div>
                </div>
                </div>
              <div class="d-grid mt-5">
                <button class="btn btn-success waves-effect waves-light" type="submit">
                  <span class="me-2">Simpan</span>
                  <i class="icon-base ri ri-arrow-right-line icon-16px scaleX-n1-rtl"></i>
                </button>
              </div>

              <p class="mt-8 mb-0">Dengan mengklik simpan saya telah membaca dan menyetujui syarat dan ketentuan yang berlaku.</p>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
        
    </section>

    <!-- Contact Us: End -->
  </div>
  <?= $this->endSection(); ?>
  
    <!-- Page JS -->
     <?= $this->section('script') ?>
    <script>

      $("#tanggal, #sesi").on("change", function () {
          let tanggal = $("#tanggal").val();
          let sesi = $("#sesi").val();

          if (tanggal && sesi) {
              $.ajax({
                  url: "<?= base_url('/cekavailable') ?>",
                  method: "POST",
                  data: {
                      tanggal: tanggal,
                      sesi: sesi
                  },
                  success: function(res) {
                      if (res.status) {
                          // Available
                          Swal.fire({
                              icon: "success",
                              title: "Tersedia",
                              text: res.messages,
                              timer: 1500,
                              showConfirmButton: false
                          });
                      } else {
                          // Not available
                          Swal.fire({
                              icon: "error",
                              title: "Tidak Tersedia",
                              text: res.messages
                          });

                          // Optional: reset sesi/tanggal
                          // $("#sesi").val("");
                      }
                  }
              });
          }
      });

      const paketData = <?= json_encode($paket) ?>;
      document.getElementById('paket').addEventListener('change', function() {
          let selectedId = this.value;

          // cari data berdasarkan id
          let data = paketData.find(x => x.id == selectedId);

          // tampilkan fasilitas
          if (data) {
              document.getElementById('fasilitas').innerHTML = data.fasilitas;
              document.getElementById('catatan').innerHTML = data.catatan;
              document.getElementById('snk').innerHTML = data.syarat;
              Array.from(document.getElementsByClassName('harga')).forEach(el => {
                  el.innerHTML = rupiah(data.harga);
              });
          }
      });
     $('#whatsappnot').floatingWhatsApp({
        phone: '62895343619616',     // nomor WA kamu (pakai format internasional)
        popupMessage: 'Ada yang bisa dibantu?', 
        showPopup: true,             // tampilkan popup chat
        position: 'right',           // left atau right
        message: 'Halo, saya mau tanya...', 
        headerTitle: 'Chat dengan Kami',
        size: '60px',
        backgroundColor: '#25d366',  // warna tombol
        showOnIE: false
    });

    const rupiah = (number) => {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR"
        }).format(number);
    }

    $('#booking_form').on('submit', function(e) {
        e.preventDefault()
        var form_data = $(this).serializeArray();
        
        let route = "<?= route_to('booking.store') ?>";
        
        $.ajax({
            url: route,
            type: 'post',
            dataType: 'json',
            data: form_data,
            success: function(response) {                
                if (response.status) {                    
                    toastr.success(response.messages,"Sukses");
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
    <?= $this->endSection(); ?>