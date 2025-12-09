<?= $this->extend('template'); ?>

<?= $this->section('content'); ?>


<!-- Sections:Start -->

  <div data-bs-spy="scroll" class="scrollspy-example">
    <!-- Hero: Start -->
    <section id="landingHero" class="landing-hero position-relative">      
    <div class="container">
        <div class="col-md">
            <div class="card">
                <h5 class="card-header">Masukkan kode untuk melihat jadwal</h5>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6 row">
                            <div class="col-md-6">
                                <label class="form-label" for="nowa">Masukkan No WhatsApp</label>
                                <input type="text" id="nowa" class="form-control" placeholder="08xxxxxxxxxx">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="nowa">Masukkan Captcha</label>
                                <div class="input-group mb-2">                                    
                                    <input type="text" id="captcha-input" class="form-control" placeholder="Masukkan captcha">                            
                                    <button class="btn btn-outline-primary" type="button" id="kirim-kode">Kirim Kode</button>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div id="captcha-img"></div>
                                    <button type="button" class="btn btn-sm btn-secondary ms-2" id="reload-captcha">↻</button>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-6 mt-0">
                            <label class="form-label" for="kode">Masukkan Kode</label>
                            <div class="input-group">                                
                                <input type="text" id="kode" class="form-control" placeholder="Masukkan Kode" aria-label="Buka Jadwal" aria-describedby="buka-jadwal">
                                <button class="btn btn-outline-primary waves-effect" type="button" id="buka-jadwal">Buka Jadwal</button>
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
        </div>
      <div class="card px-4">
        <div class="row">
          <div id="calendar"></div>
        </div>
      </div>
    </div>
        
    </section>

    <!-- Contact Us: End -->
  </div>
  <?= $this->endSection(); ?>
    

    <?= $this->section('script') ?>
    <div id="toast-container" class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 2000;"></div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    
    <script src="../assets/js/ui-modals.js"></script>
    <script src="../assets/js/ui-toasts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script>

    
    var calendar;

    $(document).ready(function() {
        loadcalendar(); // kalender tampil tapi KOSONG
    });

    function loadCaptcha() {
        $.ajax({
            url: "/captcha",
            type: "GET",
            dataType: "json",
            success: function(res) {
                $("#captcha-img").html(res.image);
            }
        });
    }

    loadCaptcha();

    $("#reload-captcha").on("click", function() {
        loadCaptcha();
    });

    $("#buka-jadwal").on("click", function() {
        $.ajax({
            url: "/cekkode",
            type: "POST",
            dataType: "json",
            data: {
                kode: $("#kode").val().trim(),
            },
            success: function(res) {
                if (!res.status) {
                    Swal.fire({
                        icon: "error",
                        title: "Error !",
                        text: res.message,
                        timer: 1500,
                        showConfirmButton: true
                    });                    
                    return;
                }
                loadCalendarEvents();
                Swal.fire({
                              icon: "success",
                              title: "Berhasil membuka jadwal",
                              text: "Jika anda merefresh halaman maka data akan hilang!",
                              timer: 1500,
                              showConfirmButton: false
                          });
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });

    $("#kirim-kode").on("click", function() {

        let nomor = $("#nowa").val().trim();
        let captcha = $("#captcha-input").val().trim();

        if (nomor === "") {        
            Swal.fire({
                icon: "error",
                title: "Error !",
                text: "Nomor WA harus diisi!",
                timer: 1500,
                showConfirmButton: true
            });
            return;
        }

        if (captcha === "") {
            Swal.fire({
                icon: "error",
                title: "Error !",
                text: "Captcha harus diisi!",
                timer: 1500,
                showConfirmButton: true
            });
            return;
        }

        $.ajax({
            url: "/sendwa",
            type: "POST",
            dataType: "json",
            data: {
                number: nomor,
                captcha: captcha,
            },
            success: function(res) {
                if (!res.status) {
                    Swal.fire({
                        icon: "error",
                        title: "Error !",
                        text: res.message,
                        timer: 1500,
                        showConfirmButton: true
                    });
                    //alert(res.message);
                    loadCaptcha();
                    return;
                }
                Swal.fire({
                              icon: "success",
                              title: "Tersedia",
                              text: "Kode berhasil dikirim!",
                              timer: 1500,
                              showConfirmButton: false
                          });
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });
    const rupiah = (number) => {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR"
        }).format(number);
    }

    function loadcalendar() {
        var calendarEl = document.getElementById('calendar');

        calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            themeSystem: 'bootstrap5',
            headerToolbar: {
                left: 'prev,next today exportImage',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listDay,listWeek'
            },
            customButtons: {
                exportImage: {
                    text: 'Export Image',
                    click: function() {
                        let calendarEl = document.getElementById("calendar");
                        html2canvas(calendarEl).then(canvas => {
                            let link = document.createElement('a');
                            link.download = 'calendar.png';
                            link.href = canvas.toDataURL("image/png");
                            link.click();
                        });
                    }
                }
            },

            // 🔥 Kalender pertama kali KOSONG
            events: [],

            eventDisplay: 'block',
            eventContent: function(arg) {
                return { html: `<div class="fc-event-title">${arg.event.title}</div>` };
            },
            eventDidMount: function(info) {
                if (info.event.extendedProps.color) {
                    info.el.style.backgroundColor = info.event.extendedProps.color;
                    info.el.style.borderColor = info.event.extendedProps.color;
                    info.el.classList.add('text-white', 'border-0', 'rounded-pill', 'px-2');
                }
            }
        });

        calendar.render();
    }

    function loadCalendarEvents() {
        $.ajax({
            url: "/datacalendar",
            dataType: "json",
            success: function(res) {
                calendar.removeAllEvents();  // bersihkan dulu
                calendar.addEventSource(res); // tambahkan event baru
                calendar.refetchEvents(); // refresh display
            }
        });
    }
</script>
  <?= $this->endSection(); ?>