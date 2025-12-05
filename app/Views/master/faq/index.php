<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<?php
$breadcrumb_items = [
    'title' => 'Faq',
    'items' => [
        ['name' => 'Master', 'active' => false],
        ['name' => 'Faq', 'active' => true]
    ]
];
?>

<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Master</span>
            <span class="text-muted mt-1 fw-bold fs-7">Data Faq</span>
        </h3>
        <div class="card-toolbar">            
            <a href="!#" id='btn_create' class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#faq_modal">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->Tambah Faq</a>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <div class="table-responsive text-nowrap">
                <table class="table" id="faq_table"  style="width:100%">
                <thead>
                    <tr>
                    <th class="w-25px rounded-start">
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-13-check">
                        </div>
                    </th>
                    <th>Pertanyaan</th>
                    <th>Jawaban</th>
                    <th>Prioritas</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0"> 
                         
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
    </div>
    <!--begin::Body-->
</div>
<!--end::Tables Widget 11-->
<div class="modal fade" id="faq_modal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form id="faq_form" class="form" >
        <div class="modal-header">
        <h5 class="modal-title" id="modal_title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        
        <div class="col-md-12 mb-2">
            <input type="hidden" name="id" id="id">
            <div class="form-floating form-floating-outline">
                <textarea id="pertanyaan" name="pertanyaan" class="form-control" style="height: 120px" placeholder="Pertanyaan"></textarea>                
                <label for="pertanyaan">Pertanyaan</label>
            </div>
        </div>

        <!-- Email -->
        <div class="col-md-12 mb-2">
            <div class="form-floating form-floating-outline">
                <textarea id="jawaban" name="jawaban" class="form-control" style="height: 120px" placeholder="Jawaban"></textarea>
                <label for="jawaban">Jawaban</label>
            </div>
        </div>  
         <div class="col-md-12 mb-2">
            <div class="form-floating form-floating-outline">
                <input type="number" id="prioritas" name="prioritas" class="form-control" placeholder="Prioritas"/>
                <label for="prioritas">Prioritas</label>
            </div>
        </div>       
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
        </div>
        </form>
    </div>
    </div>
</div>
<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->section('script') ?>


<script>
    $(document).ready(function() {
        //$("#faq_table").DataTable();
        showFaq();
    });


    const showFaq = () => {      
        console.log("show");
        const columns = [
            {
                width: "10%",
                sortable: false,
                render: function(data, type, row, meta) {
                    return `<div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input widget-13-check" type="checkbox" value="${row.id}">
                            </div>`;
                }
            },
            {
                name: "Pertanyaan",
                data: "pertanyaan"
            },
            {
                name: "Jawaban",
                data: "jawaban"
            },
            {
                name: "Prioritas",
                data: "prioritas"
            },
            {
                width: "10%",
                sortable: false,
                render: function(data, type, row, meta) {
                    return `<button class="btn btn-sm btn-text-secondary rounded-pill btn-icon item-edit edit" id="edit">
                                <i class="icon-base ri ri-edit-box-line icon-22px"></i>
                            </button>
                            <button class="btn btn-sm btn-text-secondary rounded-pill btn-icon item-edit delete" id="delete">
                                <i class="icon-base ri ri-delete-bin-fill icon-22px"></i>
                            </button>
                            `;
                }
            },
            
        ];


        var table = $('#faq_table').DataTable({
            searching: true,
            destroy: true,
            lengthChange: false,
            ajax: {
                url: "<?= route_to('faq.datatable') ?>",
            },
            columns: columns,
            "dom":
                "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
        });
    }

    $('#btn_create').on('click', function() {
        $("#faq_modal #modal_title").text("Tambah Faq");
        $("#faq_modal").modal("show");
    });

    $('#faq_table tbody').on('click', '#edit', function() {
        var data = $('#faq_table').DataTable().row($(this).parents('tr')).data();
        $("#faq_modal #pertanyaan").val(data.pertanyaan);
        $("#faq_modal #jawaban").val(data.jawaban);
        $("#faq_modal #id").val(data.id);
        $("#faq_modal #modal_title").text("Edit Faq");
        $("#faq_modal").modal("show");
    });

    $('#faq_table tbody').on('click', '#delete', function() {
        var data = $('#faq_table').DataTable().row($(this).parents('tr')).data();
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "data "+data.faq+" akan dihapus dari sistem",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Silahkan!",
            cancelButtonText: "Tidak, Jangan dihapus!",
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: `<?= base_url() ?>faq/delete/${data.id}`,
                    type: 'post',
                    dataType: 'json',
                    data: "id="+data.id,
                    beforeSend: function() {
                        Swal.fire({ 
                            allowOutsideClick: false,
                            title: 'Harap Menunggu',
                            text: 'Permintaan sedang di proses.',
                            showCancelButton: false,
                            showConfirmButton: false,
                            didOpen: () => {
                                Swal.showLoading()
                            }
                        })
                    },
                    success: function(response) {
                        Swal.close()
                        if (response.status) {                
                            showFaq();
                            toastr.warning(response.messages);
                        } else {
                            toastr.error("Gagal!");
                        }
                    },
                    error: function(err) {
                        toastr.error(err);
                    }
                });
            } else if (result.dismiss === "cancel") {
                toastr.error("data "+data.faq+" tidak jadi dihapus");                
            }
        });
        
        

    });


    $('#faq_modal').on('hidden.bs.modal', function(e) {
        $(this).find("input,textarea").val('').end();
    }) 

    $('#faq_form').on('submit', function(e) {
        e.preventDefault()
        var form_data = $(this).serializeArray();
        let id = $('#faq_form #id').val();
        let route = (id != '') ?
            `<?= base_url() ?>faq/${id}/edit` :
            "<?= route_to('faq.store') ?>";
        
        $.ajax({
            url: route,
            type: 'post',
            dataType: 'json',
            data: form_data,
            success: function(response) {                
                if (response.status) {
                    $("#faq_modal").modal("hide");
                    showFaq();
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
<?= $this->endSection() ?>