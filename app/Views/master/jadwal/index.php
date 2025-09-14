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
                            <option value="<?= $row->id; ?>"><?= $row->nama; ?></option>
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
                            <span class="required">Perminggu</span>                            
                        </label>
                        <!--end::Label-->
                        <input type="number" class="form-control form-control-solid" placeholder="" id="perminggu" name="perminggu" />
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
                            <span class="required">Tgl Selesai</span>                            
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
                        <input type="text" class="form-control form-control-solid" placeholder="" id="biaya" name="biaya" />
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


    $(document).ready(function () {
        $('#member').select2({
            theme: 'bootstrap-5',
            placeholder: "Pilih Member...",
            allowClear: true,
            dropdownParent: $('#jadwal_modal') // biar dropdown gak ketutup modal backdrop
        });
        
        $('#kategori').select2({
            theme: 'bootstrap-5',
            placeholder: "Pilih Member...",
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
        Swal.fire({
          title: pasien,
          text: 'Jadwal: ' + waktu,
          icon: 'info',
          confirmButtonText: 'OK',
          customClass: {
            confirmButton: 'btn btn-primary'
          },
          buttonsStyling: false
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




</script>

<?= $this->endSection() ?>