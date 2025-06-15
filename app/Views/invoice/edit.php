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
            <span class="card-label fw-bolder fs-3 mb-1">Edit Invoice</span>
            <span class="text-muted mt-1 fw-bold fs-7">Data Invoice</span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <form method="post" enctype="multipart/form-data" id="invoice_form">
    <div class="card-body py-3 row">
        <!--begin::Table container-->
        <div class="fv-row mb-10 col-lg-4">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                <span class="required">No Invoice</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Nomor Invoice"></i>
            </label>
            <input type="text" class="form-control form-control-lg form-control-solid" name="noinvoice" id="noinvoice" placeholder=""  value="<?= $invoice->noinvoice; ?>" />
            <label class="form-check form-check-custom form-check-solid me-10">
                <input class="form-check-input h-20px w-20px" type="checkbox" name="status" value="LUNAS" <?= ($invoice->status=="LUNAS"?"checked='checked'":""); ?>>
                <span class="form-check-label fw-bold">Lunaskan Invoice</span>
            </label>
            <!--end::Input-->
        </div>        
        <div class="d-flex flex-column mb-7 fv-row col-lg-4">
            <label class="required fs-6 fw-bold mb-2">Tanggal Invoice</label>
            <!--begin::Input-->
            <div class="position-relative d-flex align-items-center">
                <!--begin::Icon-->
                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                <span class="svg-icon svg-icon-2 position-absolute mx-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="black" />
                        <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="black" />
                        <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <!--end::Icon-->
                <!--begin::Datepicker-->
                <input class="form-control form-control-solid ps-12 periode" placeholder="Select a date" name="tglinvoice" id="tglinvoice" value="<?= date("d-m-Y",strtotime($invoice->tglinvoice)); ?>" />
                <!--end::Datepicker-->                    
            </div>            
        </div>      
        <!--begin::Table container-->
        <div class="fv-row mb-10 col-lg-4">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                <span class="required">Nama Invoice</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Nama Invoice"></i>
            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="hidden" name="id" id="id" value="<?= $id; ?>">
            <input type="text" class="form-control form-control-lg form-control-solid" name="namainvoice" id="namainvoice" placeholder=""  value="<?= $invoice->nama; ?>" />
            
            <!--end::Input-->
        </div>        
        <!--begin::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-10 col-lg-4 notmodal">
            <label class="required fs-6 fw-bold mb-2">Kategori Invoice</label>
            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select Kategori Invoice" name="kategoriinvoicefk" id="kategoriinvoicefk" >
            <option value="0">Pilih Kategori</option>
            <?php foreach ($kategoriinvoice as $row) :  {?>
                <option value="<?= $row->id ?>" <?= ($row->id==$invoice->kategoriinvoicefk?"selected":"") ?>><?= $row->kategoriinvoice ?></option>
            <?php }
            endforeach ?>
            </select>
        </div>
        <!--end::Input group-->
        <div class="fv-row mb-10 col-lg-4 notmodal">
            <label class="required fs-6 fw-bold mb-2">Anggota</label>
            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select Periode" name="usersfk" id="usersfk" disabled>
            <option value="0">Pilih Anggota</option>
            <?php foreach ($user as $row) :  {?>
                <option value="<?= $row->id ?>" <?= ($row->id==$invoice->usersfk?"selected":"") ?>><?= $row->namapeternakan ?></option>
            <?php }
            endforeach ?>
            </select>
        </div>
        <!--end::Input group-->   
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-7 fv-row col-lg-4">
            <label class="required fs-6 fw-bold mb-2">Tanggal Jatuh Tempo</label>
                <!--begin::Input-->
                <div class="position-relative d-flex align-items-center">
                    <!--begin::Icon-->
                    <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                    <span class="svg-icon svg-icon-2 position-absolute mx-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="black" />
                            <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="black" />
                            <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <!--end::Icon-->
                    <!--begin::Datepicker-->
                    <input class="form-control form-control-solid ps-12 periode" placeholder="Select a date" name="expired" id="expired" value="<?= date("d-m-Y",strtotime($invoice->expired)); ?>"  />
                    <!--end::Datepicker-->
                </div>
                <!--begin::Label-->
        </div>         
        <!--begin::Input group--> 
        <!--begin::Input group-->                                
        <div class="card-header border-0 pt-5" style="padding:10px">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Komponen Invoice</span>
                <span class="text-muted mt-1 fw-bold fs-7">Data Komponen Invoice</span>
            </h3>
        </div>
        <div class="col-lg-12 row">
            <!--begin::Header-->
            <hr >
            <!--begin::Input group-->
            <div class="d-flex flex-column mb-8 fv-row col-lg-4">
                <!--begin::Label-->
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Nama</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Nama"></i>
                </label>
                <!--end::Label-->
                <input class="form-control form-control-solid" value="" name="nama" id="nama" />
                <input type="hidden" class="form-control form-control-solid" value="" name="indez" id="indez" />
            </div>
            <!--end::Input group-->   
            <!--begin::Input group-->
            <div class="d-flex flex-column mb-8 fv-row col-lg-2">
                <!--begin::Label-->
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Harga</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Harga"></i>
                </label>
                <!--end::Label-->
                <input type="number" class="form-control form-control-solid" value="" name="harga" id="harga" />
            </div>
            <!--end::Input group-->  
            <!--begin::Input group-->
            <div class="d-flex flex-column mb-8 fv-row col-lg-2">
                <!--begin::Label-->
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Qty</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Qty"></i>
                </label>
                <!--end::Label-->
                <input type="number" class="form-control form-control-solid" value="" name="qty" id="qty" />
            </div>
            <!--end::Input group-->   
            <!--begin::Input group-->
            <div class="d-flex flex-column mb-8 fv-row col-lg-2">
                <!--begin::Label-->
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Sub Total</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Harga"></i>
                </label>
                <!--end::Label-->
                <input type="number" class="form-control form-control-solid" value="" name="subtotal" id="subtotal" />
            </div>
            <!--end::Input group-->   
            
            <div class="fv-row mb-10 col-lg-8">
                <label class='form-label'>Keterangan <span class='text-danger'>*</span></label>
                <textarea rows='5' class='form-control form-control-lg form-control-solid' placeholder='Keterangan' name='keterangan' id='keterangan' ></textarea>
            </div>
            <!--end::Input group-->  
            <div class="col-md-3 pt-4">
                <button type="button" class="btn btn-primary mt-5" id="add-row">Tambah</button>
                <button type="button" class="btn btn-danger mt-5" id="delete-row">Hapus</button>
            </div>            
            <div class="row table-responsive">
                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3" id="komponen-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Sub Total</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($invoiced as $row){ ?>
                        <tr>
                            <td><?= $row->nama ?></td>
                            <td><?= $row->qty ?></td>
                            <td><?= $row->harga ?></td>
                            <td><?= $row->subtotal ?></td>
                            <td><?= $row->keterangan ?></td>
                        </tr>
                    <?php } ?>
                       
                    </tbody>
                </table>
            </div>
            <div class="row mt-4 justify-content-end">
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-8 fv-row col-lg-2">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">Total Harga</span>
                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Harga"></i>
                    </label>
                    <!--end::Label-->
                    <input type="text" class="form-control form-control-solid" value="<?= $invoice->total ?>" name="total_harga" id="total_harga" />
                </div>
                
            </div>
        </div>
            <!--end::Input group-->  
            <div class="d-flex flex-stack pt-10">
                <!--begin::Wrapper-->
                <div class="me-2">
                    <a href="<?= route_to('user.index') ?>"><button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                        <span class="svg-icon svg-icon-3 me-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="black"></rect>
                                <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="black"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Back</button>
                    </a>
                </div>
                <!--end::Wrapper-->
                <!--begin::Wrapper-->
                <div>
                    <button type="submit" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
                        <span class="indicator-label">Submit
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                        <span class="svg-icon svg-icon-3 ms-2 me-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black"></rect>
                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon--></span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>                
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Table container-->    
        <!--end::Input group-->     
        <!--end::Table container-->
    </div>
    </form>
    <!--begin::Body-->
</div>
<!--end::Tables Widget 11-->
<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->section('script') ?>
<script src="<?= base_url() ?>assets/js/custom/documentation/forms/select2.js"></script>
<script src="<?= base_url() ?>/assets/plugins/custom/datatables/datatables.bundle.js"></script>

<script>
    var invoice_detail = new Array();
    $(document).ready(function() {
        //$('.select2').select2()

        $("#expired").flatpickr({
            enableTime: false,
            dateFormat: "d-m-Y",
            mode: "single",
            minDate: "today",
            // Disable keyboard input
            allowInput: false        
            
        });

        $("#tglinvoice").flatpickr({
            enableTime: false,
            dateFormat: "d-m-Y",
            mode: "single",
            minDate: "today",
            // Disable keyboard input
            allowInput: false        
            
        });

        $('#qty').on('change', function(){
            // Execute this function when the value of the input changes
            var harga = $("#harga").val();
            var qty = $(this).val();
            var subtotal = harga*qty;
            $("#subtotal").val(subtotal);
        });

        $('#harga').on('change', function(){
            // Execute this function when the value of the input changes
            var harga = $(this).val();
            var qty = $("#qty").val();
            var subtotal = harga*qty;
            $("#subtotal").val(subtotal);
        });

        $('#untuk').on('change', function(){
            var selectedValue = $(this).val();
            if(selectedValue === '2'){
                $('#asosiasifk').prop('disabled', false);
                $('#usersfk').prop('disabled', true);
            } else if(selectedValue === '3'){
                $('#asosiasifk').prop('disabled', true);
                $('#usersfk').prop('disabled', false);
            }else{
                $('#asosiasifk').prop('disabled', true);
                $('#usersfk').prop('disabled', true);
            }
        });
        var total_harga = <?= $invoice->total ?>;

        var komponen_table = $('#komponen-table').DataTable({
            searching: false,
            paging: false,
            destroy: true,
            lengthChange: false,
            columns: [{
                data: "nama",
                name: "Nama"
            }, 
            {
                data: "qty",
                name: "Qty"
            },
            {
                data: "harga",
                name: "Harga",
                render: function(data, type, row) {
                    if (type === 'display') {
                        return formatCurrency(data, 0); // Memanggil fungsi formatCurrency
                    }
                    return data;
                }
            }, 
            {
                data: "subtotal",
                name: "Sub Total",
                render: function(data, type, row) {
                    if (type === 'display') {
                        return formatCurrency(data, 0); // Memanggil fungsi formatCurrency
                    }
                    return data;
                }
            }, 
            {
                data: "keterangan",
                name: "Keterangan"
            }
        
            ]
        });

        function editRowByIndex(index, newData) {
            // Get the row data by index
            var rowData = table.row(index).data();

            // Update the row data with new data
            table.row(index).data(newData).draw(false);
        }

        $('#add-row').on('click', function() {
            var harga = $("#harga").val().replace(/\D/g, '');
            var subtotal = $("#subtotal").val().replace(/\D/g, '');
            total_harga = total_harga + Number(subtotal);
            var formatted_total_harga = formatCurrency(total_harga, 0);
            $("#total_harga").val(formatted_total_harga);

            console.log(formatted_total_harga)
            komponen_table.row.add({
                nama: $("#nama").val(),
                qty: $("#qty").val(),
                harga,
                subtotal,
                keterangan: $("#keterangan").val(),
            }).draw();
            invoice_detail.push({
                nama: $("#nama").val(),
                qty: $("#qty").val(),
                harga,
                subtotal,
                keterangan: $("#keterangan").val(),
            });
        });

        var komponenSelected = '';
        $("#komponen-table tbody").on("click", "tr", function() {
            komponenSelected = $("#komponen-table").DataTable().row(this).data();
            $("#nama").val(komponenSelected.nama);
            $("#qty").val(komponenSelected.qty);
            $("#harga").val(komponenSelected.harga);
            $("#subtotal").val(komponenSelected.subtotal);
            $("#keterangan").val(komponenSelected.keterangan);

            var rowIndex = $(this).index();

            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                komponen_table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });

        $('#delete-row').on('click', function() {
            if (komponenSelected === "") {
                $.toast({
                    heading: 'Gagal',
                    text: 'komponen belum dipilih.',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 3500

                });
                return;
                exit();
            }

            total_harga = total_harga - komponenSelected.subtotal;
            $("#total_harga").val(total_harga);

            komponen_table.row('.selected').remove().draw();
            const idxObj = invoice_detail.findIndex(item => {
                return item.komponenfk === komponenSelected.komponenfk && item.harga === komponenSelected.subtotal;
            });
            invoice_detail.splice(idxObj, 1);
            komponenSelected = '';
        });

    })

    

    function formatCurrency(value, decimalDigits) {
        var formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: decimalDigits,
            maximumFractionDigits: decimalDigits
        });
        return formatter.format(value);
    }
    
    $('#invoice_form').on('submit', function(e) {
        e.preventDefault()
        var form_data = $(this).serializeArray();
        let id = $('#invoice_form #id').val();
        let route = (id != '') ?
            `<?= base_url() ?>invoice/${id}/edit` :
            "<?= route_to('invoice.store') ?>";

        form_data.push({
            name: 'invoice_detail',
            value: JSON.stringify(invoice_detail)
        });
        
        $.ajax({
            url: route,
            type: 'post',
            dataType: 'json',
            data: form_data,
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
                    $("#invoice_modal").modal("hide");
                    window.location.href = '<?= route_to('invoice.index') ?>'
                    toastr.success(response.messages);
                } else {
                    toastr.error("Gagal!");
                }
            },
            error: function(err) {
                Swal.close()
                toastr.error(err);
            }
        });    
    });
</script>
<?= $this->endSection() ?>