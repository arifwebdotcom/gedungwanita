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
                <button class="btn btn-primary btn-toggle-sidebar w-100 waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#addEventSidebar" aria-controls="addEventSidebar">
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
                    <?php foreach($paket as $row){ ?>
                    <div class="form-check mb-5 ms-2">
                        <input class="form-check-input input-filter"
                            type="checkbox"
                            id="select-<?= $row->id ?>"
                            data-value="<?= $row->id ?>"
                            data-color="<?= $row->color ?>"
                            checked
                            style="background-color: <?= $row->color ?>; border-color: <?= $row->color ?>;">
                        <label class="form-check-label" for="select-<?= $row->id ?>">
                        <?= $row->namapaket ?>
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
<div class="modal fade" id="suplierpakan_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 id="modal_title">Penjadwalan</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="suplierpakan_form" class="form" >
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-7 fv-row">
                        <input type="hidden" name="id" id="id">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Suplier Pakan</span>                            
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="" id="suplierpakan" name="suplierpakan" />
                    </div>     
                    <div class="d-flex flex-column mb-7 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Alamat</span>                            
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="" id="alamat" name="alamat" />
                    </div>                   
                    <div class="d-flex flex-column mb-7 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">No HP</span>                            
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="" id="nohp" name="nohp" />
                    </div>    
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">Discard</button>
                        <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
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
  document.addEventListener('DOMContentLoaded', function () {
  var calendarEl = document.getElementById('calendar');

  // ambil semua id paket dari PHP (default semua dipilih)  
  var selectedPaket = <?= json_encode(array_map('intval', array_column($paket, 'id'))); ?>;


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
          let filtered = response.filter(ev => selectedPaket.includes(parseInt(ev.paket_id)));
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