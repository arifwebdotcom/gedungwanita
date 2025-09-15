<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<?php
$breadcrumb_items = [
    'title' => 'Suplier Pakan',
    'items' => [
        ['name' => 'Master', 'active' => false],
        ['name' => 'Suplier Pakan', 'active' => true]
    ]
];
?>

<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Penjadwalan</span>
            <span class="text-muted mt-1 fw-bold fs-7">Data Jadwal Member</span>
        </h3>       
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3 row">
        <div class="col app-calendar-sidebar border-end  col-12 col-md-2" id="app-calendar-sidebar">
            <div class="border-bottom my-sm-0 mb-4 p-5">
                <button class="btn btn-primary btn-toggle-sidebar w-100 waves-effect waves-light"  data-bs-toggle="modal" data-bs-target="#jadwal_modal" id="btn_create" aria-controls="addEventSidebar">
                    <i class="icon-base ri ri-add-line icon-16px me-1_5"></i>
                    <span class="align-middle">Tambah Pendaftaran</span>
                </button>
            </div>            
                <h5>Event Filters</h5>            
                <div class="form-check form-check-secondary mb-5 ms-2">
                    <input class="form-check-input select-all" type="checkbox" id="selectAll" data-value="all" >
                    <label class="form-check-label" for="selectAll">View All</label>
                </div>
                <div class="app-calendar-events-filter text-heading">
                    <?php foreach($kategori as $row){ ?>
                    <div class="form-check mb-5 ms-2">
                        <input class="form-check-input input-filter"
                            type="checkbox"
                            id="select-<?= $row->id ?>"
                            data-value="<?= $row->id ?>"
                            data-color="<?= $row->color ?>"
                            checked
                            style="background-color: <?= $row->color ?>; border-color: <?= $row->color ?>;">
                        <label class="form-check-label" for="select-<?= $row->id ?>">
                        <?= $row->namakategori ?>
                        </label>
                    </div>
                    <?php } ?>        
                </div>
        </div>
        <div class="col app-calendar-content col-12 col-md-10" >
            <div id="calendar"></div>
        </div>
    </div>
    <!--begin::Body-->
</div>
<!--end::Tables Widget 11-->
<div class="modal fade" id="jadwal_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <h5 class="modal-title" id="modal_title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="jadwal_form" class="form" >
                    <!--begin::Input group-->
                    <div class="d-flex flex-column fv-row">
                        <input type="hidden" name="id" id="id">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Member</span>                            
                        </label>
                        <!--end::Label-->
                        <select id="member" name="memberfk" class="select2" style="width: 100%;">
                            <?php foreach($member as $row) {?>
                            <option value="<?= $row->id; ?>" data-usia="<?= $row->usia; ?>"><?= $row->nama; ?></option>
                            <?php } ?>                            
                        </select>
                    </div>     
                    <div class="d-flex flex-column fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Kelas</span>                            
                        </label>
                        <!--end::Label-->
                        <select id="kelas" name="kelasfk" class="select2" style="width: 100%;">
                            <?php foreach($kelas as $row) {?>
                            <option value="<?= $row->id; ?>"><?= $row->kelas; ?></option>
                            <?php } ?>                            
                        </select>
                    </div> 
                    <div class="d-flex flex-column fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Kategori</span>                            
                        </label>
                        <!--end::Label-->
                        <select id="kategori" name="kategorifk" class="select2" style="width: 100%;">
                            <?php foreach($kategori as $row) {?>
                            <option value="<?= $row->id; ?>"><?= $row->namakategori; ?></option>
                            <?php } ?>                            
                        </select>
                    </div>                       
                    <div class="d-flex flex-column fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Paket</span>                            
                        </label>
                        <!--end::Label-->
                        <select id="paket" name="paketfk" class="select2" style="width: 100%;">
                            <?php foreach($paket as $row) {?>
                            <option value="<?= $row->id; ?>"  data-periodebulan="<?= $row->periodebulan; ?>" data-biaya="<?= $row->biaya; ?>"><?= $row->keterangan; ?></option>
                            <?php } ?>                            
                        </select>
                    </div>         
                    <div class="d-flex flex-column fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Pilih Hari (multiple)</span>                            
                        </label>
                        <select id="hari" name="hari[]" class="select2" multiple="multiple" style="width: 100%;">
                            <option value="1">Senin</option>
                            <option value="2">Selasa</option>
                            <option value="3">Rabu</option>
                            <option value="4">Kamis</option>
                            <option value="5">Jum'at</option>
                            <option value="6">Sabtu</option>
                        </select>
                    </div>         
                    <div class="row">
                        <div class=" flex-column fv-row col-md-6" id="divjamsesi1">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required" id="labeljamsesi1">Jam Hari 1</span>                            
                            </label>
                            <!--end::Label-->
                            <select id="jamsesi1" name="jamsesi1" class="form-control">
                                <option value="08:00">08:00</option>
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                                <option value="13:00">13:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                                <option value="17:00">17:00</option>
                                <option value="18:00">18:00</option>
                                <option value="19:00">19:00</option>
                            </select>
                        </div>            
                        <div class=" flex-column fv-row col-md-6" id="divjamsesi2">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required" id="labeljamsesi2">Jam Hari 2</span>                            
                            </label>
                            <!--end::Label-->
                            <select id="jamsesi2" name="jamsesi2" class="form-control">
                                <option value="08:00">08:00</option>
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                                <option value="13:00">13:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                                <option value="17:00">17:00</option>
                                <option value="18:00">18:00</option>
                                <option value="19:00">19:00</option>
                            </select>
                        </div>            
                    </div>            
                    <div class="d-flex flex-column fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Tgl Mulai</span>                            
                        </label>
                        <!--end::Label-->
                        <input type="date" class="form-control form-control-solid" placeholder="" id="mulai" name="mulai" />
                    </div>    
                    <div class="d-flex flex-column fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Perkiraan Tgl Selesai</span>                            
                        </label>
                        <!--end::Label-->
                        <input type="date" class="form-control form-control-solid" placeholder="" id="selesai" name="selesai" />
                    </div>   
                    <div class="d-flex flex-column fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Biaya</span>                            
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="" id="biaya" name="biaya" readonly="readonly" />
                    </div>       
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->            
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Card-->
<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->section('script') ?>

<!-- FullCalendar -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

<script>

    document.addEventListener("DOMContentLoaded", function() {
    // helper: reorder <option> berdasarkan value (numerik)
    function sortSelectOptionsByValue(selectEl) {
        // ambil semua option ke array
        const options = Array.from(selectEl.querySelectorAll('option')).map(opt => ({
        value: opt.value,
        text: opt.text,
        selected: opt.selected
        }));

        // sort numeric by value
        options.sort((a, b) => {
        const va = parseInt(a.value, 10);
        const vb = parseInt(b.value, 10);
        // jika bukan angka, fallback ke compare string
        if (isNaN(va) || isNaN(vb)) {
            return a.value.localeCompare(b.value);
        }
        return va - vb;
        });

        // kosongkan select dan append kembali sesuai urutan
        selectEl.innerHTML = '';
        options.forEach(o => {
        const opt = document.createElement('option');
        opt.value = o.value;
        opt.text = o.text;
        if (o.selected) opt.selected = true;
        selectEl.appendChild(opt);
        });

        // kembalikan array selected values (urut sesuai value)
        return options.filter(o => o.selected).map(o => o.value);
    }

    const select = document.getElementById('hari');
    if (!select) return;

    // 1) Urutkan DOM option berdasarkan value
    const selectedValuesSorted = sortSelectOptionsByValue(select);

    // 2) Jika sebelumnya Choices sudah di-init, destroy dulu (hindari double init)
    // NOTE: Choices instance tidak disimpan di elemen; jika kamu punya var choicesInstance simpan di luar dan destroy di sana
    // Untuk aman: kita cek window._choicesInstances (opsional)
    if (select._choicesInstance && typeof select._choicesInstance.destroy === 'function') {
        try { select._choicesInstance.destroy(); } catch(e){}
    }

    // 3) Inisialisasi Choices, matikan internal sorting supaya mempertahankan urutan DOM
    const choicesInstance = new Choices(select, {
        removeItemButton: true,
        placeholderValue: 'Pilih opsi...',
        searchPlaceholderValue: 'Cari...',
        shouldSort: false,         // biar urutan mengikuti DOM
        itemSelectText: 'Tekan untuk pilih'
    });

    // simpan instance supaya bisa di-destroy nanti bila perlu
    select._choicesInstance = choicesInstance;

    // 4) set selected items (jika ada) dalam urutan numeric
    if (selectedValuesSorted.length) {
        // setValue menerima array string (items) untuk multiple
        // gunakan setChoiceByValue jika versi Choices-mu punya fungsi itu; fallback: trigger change
        choicesInstance.setChoiceByValue = choicesInstance.setChoiceByValue || null;
        try {
        // method setValue tidak selalu tersedia; kita gunakan setValue via internal API:
        choicesInstance.setValue(selectedValuesSorted);
        } catch (e) {
        // fallback: set selected di DOM (sudah diset), lalu refresh choices (clear + re-add)
        choicesInstance.clearStore();
        selectedValuesSorted.forEach(v => choicesInstance.setValue([v]));
        }
    }
    });

    $(document).ready(function () {

        $('#hari').on('change', function () {
            var selected = $(this).val() || [];
            console.log(selected.length)
            if (selected.length === 1) {
                $('#divjamsesi1').show();
                $('#divjamsesi2').hide();
            } else if (selected.length === 2) {
                $('#divjamsesi1').show();
                $('#divjamsesi2').show();
            } else {
                $('#divjamsesi1').hide();
                $('#divjamsesi2').hide();
            }
        });

        // trigger pertama kali (supaya sesuai kondisi saat load)
        $('#hari').trigger('change');
        
        $('#member').select2({
            theme: 'bootstrap-5',
            placeholder: "Pilih Member...",
            allowClear: true,
            dropdownParent: $('#jadwal_modal') // biar dropdown gak ketutup modal backdrop
        });

        $('#paket').select2({
            theme: 'bootstrap-5',
            placeholder: "Pilih Member...",
            allowClear: true,
            dropdownParent: $('#jadwal_modal') // biar dropdown gak ketutup modal backdrop
        });
        
        $('#kelas').select2({
            theme: 'bootstrap-5',
            placeholder: "Pilih Kelas...",
            allowClear: true,
            dropdownParent: $('#jadwal_modal') // biar dropdown gak ketutup modal backdrop
        });

        $('#kategori').select2({
            theme: 'bootstrap-5',
            placeholder: "Pilih Kategori...",
            allowClear: true,
            dropdownParent: $('#jadwal_modal') // biar dropdown gak ketutup modal backdrop
        });
        $('#member').select2({
            theme: 'bootstrap-5',
            placeholder: "Pilih Member...",
            allowClear: true,
            dropdownParent: $('#jadwal_modal') // biar dropdown gak ketutup modal backdrop
        });

            
        $('#btn_create').on('click', function() {
            $("#jadwal_modal #modal_title").text("Tambah Jadwal");
            $("#jadwal_modal").modal("show");
        });

        function hitungSelesai() {
            let mulai = $("#mulai").val();
            let periode = parseInt($('#paket').find(':selected').data('periodebulan'), 10);
            let biaya = $('#paket').find(':selected').data('biaya');

            // set biaya
            if (biaya) {
                $("#biaya").val(biaya);
            }

            if (!mulai || isNaN(periode)) {
                $("#selesai").val('');
                return;
            }

            let startDate = new Date(mulai);
            if (isNaN(startDate.getTime())) {
                $("#selesai").val('');
                return;
            }

            // hitung total minggu (misalnya 3 bulan = 12 minggu)
            let totalWeeks = periode * 4;
            let endDate = new Date(startDate);
            endDate.setDate(endDate.getDate() + (totalWeeks * 7) - 1); 
            // -1 supaya pas, kalau mulai Senin maka selesai Minggu ke-12

            // format YYYY-MM-DD
            let selesai = endDate.toISOString().split('T')[0];
            $("#selesai").val(selesai);
        }

        $("#paket, #mulai").on("change", hitungSelesai);

        function setKategoriByAjax() {
            let memberId = $('#member').val();
            let usia = $('#member').find(':selected').data('usia'); // ambil usia dari option
            let kelasId = $('#kelas').val();

            if (!memberId || !kelasId) return;

            $.ajax({
                url: '/jadwal/getkategoribyusiakelas',
                type: 'POST',
                data: { usia: usia, kelasId: kelasId },
                success: function (res) {
                if (res && res.id) {
                    $('#kategori').val(res.id).trigger('change'); // auto pilih kategori
                } else {
                    $('#kategori').val(null).trigger('change'); // reset kalau ga ada cocok
                }
                }
            });
            }

        $('#member, #kelas').on('change', function () {
        setKategoriByAjax();
        });
    });

  document.addEventListener('DOMContentLoaded', function () {
  var calendarEl = document.getElementById('calendar');

  // ambil semua id kategori dari PHP (default semua dipilih)  
  var selectedPaket = <?= json_encode(array_map('intval', array_column($kategori, 'id'))); ?>;


  // Set warna awal checkbox sesuai data-color
  $('.input-filter').each(function() {
    var $this = $(this);
    var color = $this.data('color');
    if ($this.is(':checked')) {
      $this.css({
        'background-color': color,
        'border-color': color
      });
    } else {
      $this.css({
        'background-color': '#ffffff',
        'border-color': '#dee2e6'
      });
    }
  });

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    themeSystem: 'bootstrap5',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,listDay,listWeek'
    },
    buttonText: {
      month: 'Month',
      week: 'Week',
      day: 'Day',
      listDay: 'List Day',
      listWeek: 'List Week'
    },
    slotMinTime: "08:00:00",
    slotMaxTime: "20:00:00",
    eventClick: function (info) {
        var pasien = info.event.title;
        var waktu = info.event.start.toLocaleString();

        let checkinDefault = info.event.extendedProps.checkin == "1";
        let kelasDefault = info.event.extendedProps.kelas;
        let kategoriDefault = info.event.extendedProps.kategori_id;

        // format default value untuk datetime-local (yyyy-MM-ddTHH:mm)        
        let start = info.event.start;
        let year = start.getFullYear();
        let month = String(start.getMonth() + 1).padStart(2, '0'); 
        let day = String(start.getDate()).padStart(2, '0');
        let hours = String(start.getHours()).padStart(2, '0');
        let minutes = String(start.getMinutes()).padStart(2, '0');

        let defaultTanggal = `${year}-${month}-${day}T${hours}:${minutes}`;

        Swal.fire({
            title: pasien,
            html: `
            <div class="text-start">
                <p><strong>Jadwal:</strong> ${waktu}</p>
                
                <div class="mb-3">
                    <label for="checkin" class="form-label">Checkin</label>
                    <input type="checkbox" id="checkin" class="form-check-input" ${checkinDefault ? 'checked' : ''}/>
                </div>

                <div class="mb-3">
                    <label for="kelas" class="form-label">Pilih Kelas</label>
                    <select id="kelas" class="form-select">
                        <?php foreach($kelas as $row) { ?>
                        <option value="<?= $row->id; ?>" ${kelasDefault == "<?= $row->id; ?>" ? 'selected' : ''}>
                            <?= $row->kelas; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="kategori" class="form-label">Pilih Kategori</label>
                    <select id="kategori" class="form-select">
                        <?php foreach($kategori as $row) { ?>
                        <option value="<?= $row->id; ?>" ${kategoriDefault == "<?= $row->id; ?>" ? 'selected' : ''}>
                            <?= $row->namakategori; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Ubah Tanggal</label>
                    <input type="datetime-local" id="tanggal" class="form-control" value="${defaultTanggal}">
                </div>
            </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-secondary ms-2'
            },
            buttonsStyling: false,
            preConfirm: () => {
                const popup = Swal.getPopup();
                return {
                    checkin: popup.querySelector('#checkin').checked ? 1 : 0,
                    kelasfk: popup.querySelector('#kelas').value,
                    kategorifk: popup.querySelector('#kategori').value,
                    tanggal: popup.querySelector('#tanggal').value
                }
            }
        }).then((result) => {
            if (result.isConfirmed) {
                let data = {
                    id: info.event.id,
                    checkin: result.value.checkin,
                    kelasfk: result.value.kelasfk,
                    kategorifk: result.value.kategorifk,
                    tanggal: result.value.tanggal // dikirim ke backend
                };

                $.ajax({
                    url: '/jadwal/jadwalpendaftaran',
                    method: 'POST',
                    data: data,
                    success: function(res) {
                        Swal.fire('Tersimpan!', 'Data berhasil diperbarui.', 'success');
                        calendar.refetchEvents();
                    },
                    error: function() {
                        Swal.fire('Error', 'Gagal menyimpan data', 'error');
                    }
                });
            }
        });
    },
    events: function(fetchInfo, successCallback, failureCallback) {
      $.ajax({
        url: '/jadwal/datatable',
        dataType: 'json',
        success: function(response) {
          let filtered = response.filter(ev => selectedPaket.includes(parseInt(ev.kategori_id)));
          successCallback(filtered);
        },
        error: function() {
          failureCallback();
        }
      });
    },

    eventDisplay: 'block',

    eventDidMount: function(info) {
      if (info.event.extendedProps.color) {
        info.el.style.backgroundColor = info.event.extendedProps.color;
        info.el.style.borderColor = info.event.extendedProps.color;
        info.el.classList.add('text-white', 'border-0', 'rounded-pill', 'px-2');
      }
    }
  });

  $('#selectAll').prop('checked', true);

  calendar.render();
  calendar.refetchEvents(); // 🔹 biar langsung load event pertama kali

  // Checkbox filter handler
  $('.input-filter').on('change', function() {
    var $this = $(this);
    var value = parseInt($this.data('value'));
    var color = $this.data('color') || '#ffffff';

    if ($this.is(':checked')) {
      if (!selectedPaket.includes(value)) {
        selectedPaket.push(value);
      }
      $this.css({
        'background-color': color,
        'border-color': color
      });
    } else {
      selectedPaket = selectedPaket.filter(id => id !== value);
      $this.css({
        'background-color': '#ffffff',
        'border-color': '#dee2e6'
      });
    }

    // Sync selectAll
    if ($('.input-filter:checked').length === $('.input-filter').length) {
      $('#selectAll').prop('checked', true);
    } else {
      $('#selectAll').prop('checked', false);
    }

    calendar.refetchEvents();
  });

  // Select All handler
  $('#selectAll').on('change', function() {
    if ($(this).is(':checked')) {
      $('.input-filter').each(function() {
        var $this = $(this);
        var value = parseInt($this.data('value'));
        var color = $this.data('color');

        $this.prop('checked', true).css({
          'background-color': color,
          'border-color': color
        });

        if (!selectedPaket.includes(value)) {
          selectedPaket.push(value);
        }
      });
    } else {
      $('.input-filter').each(function() {
        var $this = $(this);
        var value = parseInt($this.data('value'));

        $this.prop('checked', false).css({
          'background-color': '#ffffff',
          'border-color': '#dee2e6'
        });

        selectedPaket = selectedPaket.filter(id => id !== value);
      });
    }

    calendar.refetchEvents();
  });

  
});


    $('#jadwal_form').on('submit', function(e) {
        e.preventDefault()
        var form_data = $(this).serializeArray();
        let id = $('#jadwal_form #id').val();
        let route = (id != '') ?
            `<?= base_url() ?>jadwal/${id}/edit` :
            "<?= route_to('jadwal.store') ?>";
        
        $.ajax({
            url: route,
            type: 'post',
            dataType: 'json',
            data: form_data,
            success: function(response) {                
                if (response.status) {
                    $("#jadwal_modal").modal("hide");                    
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