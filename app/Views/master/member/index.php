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
            <span class="card-label fw-bolder fs-3 mb-1">Master Member</span>
            <span class="text-muted mt-1 fw-bold fs-7">Data Member</span>
        </h3>
        <div class="card-toolbar">            
            <a href="!#" id='btn_create' class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#member_modal">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->Tambah Member</a>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <div class="table-responsive text-nowrap">
                <table class="table" id="member_table"  style="width:100%">
                <thead>
                    <tr>
                    <th class="w-25px rounded-start">
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-13-check">
                        </div>
                    </th>
                    <th>Nama</th>
                    <th>Tgl Lhir</th>
                    <th>Wa Ortu</th>
                    <th>Harapan Ortu</th>
                    <th>Actions</th>
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
<div class="modal fade" id="member_modal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modal_title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form id="member_form" class="form" >
        <div class="row">
            <div class="col mb-6 mt-2">
            <div class="form-floating form-floating-outline">
                <input type="hidden" name="id" id="id">
                <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Enter Name">
                <label for="kelas">Member</label>
            </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col mb-2">
            <div class="form-floating form-floating-outline">
                <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
                <label for="keterangan">Keterangan</label>
            </div>
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

<div class="modal fade" id="upload_member_modal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modal_title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form id="member_upload_form" class="form" enctype="multipart/form-data">
        <div class="row">
            <div class="col mb-6 mt-2">
            <div class="form-floating form-floating-outline">
                <input type="hidden" name="id" id="id">
                <input type="file" id="image" name="image" class="form-control" placeholder="Enter Name">
                <label for="image">Foto Anak</label>
            </div>
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

<!-- modal detail -->
<div class="modal fade" id="modalLong" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalLongTitle">Data Anak</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">            
            <div class="row g-6">                
                <div class="col-sm-6 form-password-toggle">
                    <div class="form-floating form-floating-outline mb-5 form-control-validation">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anak" autofocus />
                    <label for="nama">Nama Anak</label>
                    </div>
                </div>
                <div class="col-sm-6 form-password-toggle">
                    <div class="mb-6">
                    <label class="d-block form-label">Jenis Kelamin</label>
                    <div class="d-flex gap-4">
                        <div class="form-check mb-0">
                        <input type="radio" id="jeniskelamin-male" name="jeniskelamin" class="form-check-input" value="L" required checked>
                        <label class="form-check-label" for="jeniskelamin-male">Laki-laki</label>
                        </div>
                        <div class="form-check mb-0">
                        <input type="radio" id="jeniskelamin-female" name="jeniskelamin" class="form-check-input" value="P" required>
                        <label class="form-check-label" for="jeniskelamin-female">Perempuan</label>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6 form-password-toggle">
                    <div class="form-floating form-floating-outline mb-5 form-control-validation">
                    <input type="date" class="form-control" id="tgllahir" name="tgllahir" placeholder="Masukkan tgllahir" />
                    <label for="tgllahir">Tgl Lahir</label>
                    </div>
                </div>
                <div class="col-sm-6 form-password-toggle">
                    <div class="form-floating form-floating-outline mb-6">
                    <textarea class="form-control h-px-100" id="alamat" name="alamat" placeholder="Alamat Rumah"></textarea>
                    <label for="alamat">Alamat</label>
                    </div>
                </div>
                <div class="col-sm-6 form-password-toggle">
                    <div class="form-floating form-floating-outline mb-5 form-control-validation">
                    <input type="text" class="form-control" id="sekolah" name="sekolah" placeholder="Masukkan Sekolah" />
                    <label for="sekolah">Sekolah</label>
                    </div>
                </div>
                <div class="col-sm-6 form-password-toggle">
                    <div class="form-floating form-floating-outline mb-5 form-control-validation">
                    <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan Kelas" />
                    <label for="kelas">Kelas</label>
                    </div>
                </div>
                <div class="col-sm-6 form-password-toggle">
                    <div class="form-floating form-floating-outline mb-5 form-control-validation">
                    <input type="text" class="form-control" id="namaortu" name="namaortu" placeholder="Masukkan Nama Ortu" />
                    <label for="namaortu">Nama Ortu</label>
                    </div>
                </div>
                <div class="col-sm-6 form-password-toggle">
                    <div class="form-floating form-floating-outline mb-5 form-control-validation">
                    <input type="text" class="form-control" id="waortu" name="waortu" placeholder="Masukkan Wa Ortu" />
                    <label for="waortu">Wa Ortu</label>
                    </div>
                </div>       
                <hr>
                <div class="content-header mb-4">
                    <h6 class="mb-0">Kebiasaan</h6>
                    <small>Kebiasaan Sehari-hari Anak.</small>
                  </div>
                  <div class="row g-6">
                    <div class="col-sm-6 form-password-toggle">
                      <div class="mb-6">
                        <label class="d-block form-label">1. Apakah anak memiliki jadwal tidur yang teratur?</label>
                        <div class="d-flex gap-4">
                          <div class="form-check mb-0">
                            <input type="radio" id="tidurteratur-male" name="tidurteratur" class="form-check-input" value="YA" required checked>
                            <label class="form-check-label" for="tidurteratur-male">YA</label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="radio" id="tidurteratur-female" name="tidurteratur" class="form-check-input" value="TIDAK" required>
                            <label class="form-check-label" for="tidurteratur-female">TIDAK</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-3 form-password-toggle">
                      <div class="form-floating form-floating-outline mb-5 form-control-validation">
                        <input type="time" class="form-control" id="tidurmulai" name="tidurmulai" placeholder="Masukkan Jam Tidur" />
                        <label for="tidurmulai">Jam Tidur</label>
                      </div>
                    </div>
                    <div class="col-sm-3 form-password-toggle">
                      <div class="form-floating form-floating-outline mb-5 form-control-validation">
                        <input type="time" class="form-control" id="bangun" name="bangun" placeholder="Masukkan Jam Bangun" />
                        <label for="bangun">Jam Bangun</label>
                      </div>
                    </div>
                    <div class="col-sm-6 form-password-toggle">
                      <div class="mb-6">
                        <label class="d-block form-label">2. Apakah anak cukup istirahat setiap hari (tidur siang, tidak mudah mengantuk)?</label>
                        <div class="d-flex gap-4">
                          <div class="form-check mb-0">
                            <input type="radio" id="cukupistirahat-male" name="cukupistirahat" class="form-check-input" value="YA" required checked>
                            <label class="form-check-label" for="cukupistirahat-male">YA</label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="radio" id="cukupistirahat-female" name="cukupistirahat" class="form-check-input" value="TIDAK" required>
                            <label class="form-check-label" for="cukupistirahat-female">TIDAK</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 form-password-toggle">
                      <div class="mb-6">
                        <label class="d-block form-label">3.	Apakah anak cenderung malas bergerak dan banyak terpapar screentime (nonton tv/gadget)?</label>
                        <div class="d-flex gap-4">
                          <div class="form-check mb-0">
                            <input type="radio" id="malasgerak-male" name="malasgerak" class="form-check-input" value="YA" required checked>
                            <label class="form-check-label" for="malasgerak-male">YA</label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="radio" id="malasgerak-female" name="malasgerak" class="form-check-input" value="TIDAK" required>
                            <label class="form-check-label" for="malasgerak-female">TIDAK</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 form-password-toggle">
                      <div class="mb-6">
                        <label class="d-block form-label">4.	Apakah anak memiliki kesulitan untuk fokus saat melakukan aktivitas/ belajar?</label>
                        <div class="d-flex gap-4">
                          <div class="form-check mb-0">
                            <input type="radio" id="sulitfokus-male" name="sulitfokus" class="form-check-input" value="YA" required checked>
                            <label class="form-check-label" for="sulitfokus-male">YA</label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="radio" id="sulitfokus-female" name="sulitfokus" class="form-check-input" value="TIDAK" required>
                            <label class="form-check-label" for="sulitfokus-female">TIDAK</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 form-password-toggle">
                      <div class="mb-6">
                        <label class="d-block form-label">5.	Apakah anak mudah lelah saat melakukan kegiatan fisik seperti lari, melompat, atau memanjat?</label>
                        <div class="d-flex gap-4">
                          <div class="form-check mb-0">
                            <input type="radio" id="mudahlelah-male" name="mudahlelah" class="form-check-input" value="YA" required checked>
                            <label class="form-check-label" for="mudahlelah-male">YA</label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="radio" id="mudahlelah-female" name="mudahlelah" class="form-check-input" value="TIDAK" required>
                            <label class="form-check-label" for="mudahlelah-female">TIDAK</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 form-password-toggle">
                      <div class="mb-6">
                        <label class="d-block form-label">6.	Apakah anak disekolah mengikuti ekstrakurikuler?</label>
                        <div class="d-flex gap-4">
                          <div class="form-check mb-0">
                            <input type="radio" id="ikutekstra-male" name="ikutekstra" class="form-check-input" value="YA" required checked>
                            <label class="form-check-label" for="ikutekstra-male">YA</label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="radio" id="ikutekstra-female" name="ikutekstra" class="form-check-input" value="TIDAK" required>
                            <label class="form-check-label" for="ikutekstra-female">TIDAK</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 form-password-toggle">
                      <div class="form-floating form-floating-outline mb-5 form-control-validation">
                        <input type="text" class="form-control" id="namaekstra" name="namaekstra" placeholder="Masukkan Nama Ortu" />
                        <label for="namaekstra">Nama Ekstrakurikuler</label>
                      </div>
                    </div>
                    <div class="col-sm-6 form-password-toggle">
                      <div class="mb-6">
                        <label class="d-block form-label">7.	Apakah saat di dalam kelas anak bisa duduk dengan tenang?</label>
                        <div class="d-flex gap-4">
                          <div class="form-check mb-0">
                            <input type="radio" id="bisatenang-male" name="bisatenang" class="form-check-input" value="YA" required checked>
                            <label class="form-check-label" for="bisatenang-male">YA</label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="radio" id="bisatenang-female" name="bisatenang" class="form-check-input" value="TIDAK" required>
                            <label class="form-check-label" for="bisatenang-female">TIDAK</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 form-password-toggle">
                      <div class="form-floating form-floating-outline mb-5 form-control-validation">
                        <input type="text" class="form-control" id="keluhan" name="keluhan" placeholder="Masukkan Keluhan" />
                        <label for="keluhan">Nama Keluhan</label>
                      </div>
                    </div>                                    
                  </div>  
                  <hr>
                  <div class="content-header mb-4">
                    <h6 class="mb-0">Perilaku</h6>
                    <small>Perilaku Gerak dan Minat Fisik Anak.</small>
                  </div>
                  <div class="row g-6">
                    <div class="col-sm-6 form-password-toggle">
                      <div class="mb-6">
                        <label class="d-block form-label">1.	Apakah anak suka bergerak atau aktif secara fisik?</label>
                        <div class="d-flex gap-4">
                          <div class="form-check mb-0">
                            <input type="radio" id="sukafisik-male" name="sukafisik" class="form-check-input" value="YA" required checked>
                            <label class="form-check-label" for="sukafisik-male">YA</label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="radio" id="sukafisik-female" name="sukafisik" class="form-check-input" value="CUKUP" required>
                            <label class="form-check-label" for="sukafisik-female">CUKUP</label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="radio" id="sukafisik-female" name="sukafisik" class="form-check-input" value="KURANG" required>
                            <label class="form-check-label" for="sukafisik-female">KURANG</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 form-password-toggle">
                      <div class="form-floating form-floating-outline mb-6">
                        <textarea class="form-control h-px-100" id="kegiatanfavorit" name="kegiatanfavorit" placeholder="Lari / Memanjat / Berenang "></textarea>
                        <label for="kegiatanfavorit">2.	Apa kegiatan fisik favorit anak di rumah</label>
                      </div>
                    </div>
                    <div class="col-sm-6 form-password-toggle">
                      <div class="mb-6">
                        <label class="d-block form-label">3.	Apakah anak menunjukkan ketertarikan terhadap aktivitas olahraga tertentu?</label>
                        <div class="d-flex gap-4">
                          <div class="form-check mb-0">
                            <input type="radio" id="tertarikolahraga-male" name="tertarikolahraga" class="form-check-input" value="YA" required checked>
                            <label class="form-check-label" for="tertarikolahraga-male">YA</label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="radio" id="tertarikolahraga-female" name="tertarikolahraga" class="form-check-input" value="TIDAK" required>
                            <label class="form-check-label" for="tertarikolahraga-female">BELUM TERLIHAT</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 form-password-toggle">
                      <div class="form-floating form-floating-outline mb-5 form-control-validation">
                        <input type="text" class="form-control" id="jenisolahraga" name="jenisolahraga" placeholder="Masukkan Jenis Olahraga" />
                        <label for="jenisolahraga">Jenis Olahraga</label>
                      </div>
                    </div>                    
                  </div>
                  <hr>
                  <div class="content-header mb-4">
                    <h6 class="mb-0">Catatan</h6>
                    <small>Catatan Kesehatan Umum.</small>
                  </div>
                  <div class="row g-6">
                    <div class="col-sm-6 form-password-toggle">
                      <div class="mb-6">
                        <label class="d-block form-label">1.	Apakah ada kondisi kesehatan yang perlu diperhatikan saat anak beraktivitas fisik? (contoh: tidak boleh terlalu kecapekan, flat foot,dll)</label>
                        <div class="d-flex gap-4">
                          <div class="form-check mb-0">
                            <input type="radio" id="perludiperhatikan-male" name="perludiperhatikan" class="form-check-input" value="YA" required checked>
                            <label class="form-check-label" for="perludiperhatikan-male">YA</label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="radio" id="perludiperhatikan-female" name="perludiperhatikan" class="form-check-input" value="TIDAK" required>
                            <label class="form-check-label" for="perludiperhatikan-female">TIDAK</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 form-password-toggle">
                      <div class="form-floating form-floating-outline mb-5 form-control-validation">
                        <input type="text" class="form-control" id="jelaskanperludiperhatikan" name="jelaskanperludiperhatikan" placeholder="Masukkan Penjelasan" />
                        <label for="jelaskanperludiperhatikan">Jika ya, jelaskan secara singkat</label>
                      </div>
                    </div>
                  <div class="row g-6">
                    <div class="col-sm-6 form-password-toggle">
                      <div class="mb-6">
                        <label class="d-block form-label">2.	Apakah anak sedang dalam pengawasan khusus dari dokter atau terapis?</label>
                        <div class="d-flex gap-4">
                          <div class="form-check mb-0">
                            <input type="radio" id="diawasidokter-male" name="diawasidokter" class="form-check-input" value="YA" required checked>
                            <label class="form-check-label" for="diawasidokter-male">YA</label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="radio" id="diawasidokter-female" name="diawasidokter" class="form-check-input" value="TIDAK" required>
                            <label class="form-check-label" for="diawasidokter-female">TIDAK</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 form-password-toggle">
                      <div class="form-floating form-floating-outline mb-5 form-control-validation">
                        <input type="text" class="form-control" id="terapi" name="terapi" placeholder="Masukkan Terapi" />
                        <label for="terapi">Jika ya, sebutkan jenis pengobatan/ terapi</label>
                      </div>
                    </div>
                    <div class="col-sm-6 form-password-toggle">
                      <div class="mb-6">
                        <label class="d-block form-label">3.	Apakah anak memiliki riwayat gangguan kesehatan sebelumnya ?</label>
                        <div class="d-flex gap-4">
                          <div class="form-check mb-0">
                            <input type="radio" id="gangguankesehatan-male" name="gangguankesehatan" class="form-check-input" value="YA" required checked>
                            <label class="form-check-label" for="gangguankesehatan-male">YA</label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="radio" id="gangguankesehatan-female" name="gangguankesehatan" class="form-check-input" value="TIDAK" required>
                            <label class="form-check-label" for="gangguankesehatan-female">TIDAK</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 form-password-toggle">
                      <div class="form-floating form-floating-outline mb-6">
                        <textarea class="form-control h-px-100" id="jenisgangguankesehatan" name="jenisgangguankesehatan" placeholder="Patah Tulang / Kejang / Asma "></textarea>
                        <label for="jenisgangguankesehatan">Jika ya, Sebutkan Gangguan Kesehatan</label>
                      </div>
                    </div>
                    <div class="col-sm-6 form-password-toggle">
                      <div class="mb-6">
                        <label class="d-block form-label">4.	Apakah anak memiliki riwayat/post opname sebelumnya ?</label>
                        <div class="d-flex gap-4">
                          <div class="form-check mb-0">
                            <input type="radio" id="postopname-male" name="postopname" class="form-check-input" value="YA" required checked>
                            <label class="form-check-label" for="postopname-male">YA</label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="radio" id="postopname-female" name="postopname" class="form-check-input" value="TIDAK" required>
                            <label class="form-check-label" for="postopname-female">TIDAK</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 form-password-toggle">
                      <div class="form-floating form-floating-outline mb-5 form-control-validation">
                        <input type="text" class="form-control" id="kapan" name="kapan" placeholder="Masukkan Terapi" />
                        <label for="kapan">Jika ya, Kapan ?</label>
                      </div>
                    </div>
                    <div class="col-sm-6 form-password-toggle">
                      <div class="mb-6">
                        <label class="d-block form-label">5.	Apakah anak melalui fase merangkak sebelum belajar berdiri/berjalan?</label>
                        <div class="d-flex gap-4">
                          <div class="form-check mb-0">
                            <input type="radio" id="merangkak-male" name="merangkak" class="form-check-input" value="YA" required checked>
                            <label class="form-check-label" for="merangkak-male">YA</label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="radio" id="merangkak-female" name="merangkak" class="form-check-input" value="TIDAK" required>
                            <label class="form-check-label" for="merangkak-female">TIDAK</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 form-password-toggle">
                      <div class="mb-6">
                        <label class="d-block form-label">Apakah harapan/ tujuan orang tua mendaftarkan Ananda di FunFit?</label>
                        <div class="gap-4">
                          <div class="form-check mb-0 mb-6">
                            <input type="checkbox" id="harapanortu-1" name="harapanortu" class="form-check-input" value="1">
                            <label class="form-check-label" for="harapanortu-1">Mengisi Waktu Luang</label>
                          </div>
                          <div class="form-check mb-0 mb-6">
                            <input type="checkbox" id="harapanortu-2" name="harapanortu" class="form-check-input" value="2">
                            <label class="form-check-label" for="harapanortu-2">Agar Anak Tidak Malas Bergerak</label>
                          </div>
                          <div class="form-check mb-0 mb-6">
                            <input type="checkbox" id="harapanortu-3" name="harapanortu" class="form-check-input" value="3">
                            <label class="form-check-label" for="harapanortu-3">Untuk mengeksplor/ mengetahui minat bakat anak dibidang olahraga</label>
                          </div>
                          <div class="form-check mb-0 mb-6">
                            <input type="checkbox" id="harapanortu-4" name="harapanortu" class="form-check-input" value="4">
                            <label class="form-check-label" for="harapanortu-4">Ada keluhan khusus</label>
                          </div>
                          <div class="form-check mb-0 mb-6">
                            <input type="checkbox" id="harapanortu-5" name="harapanortu" class="form-check-input" value="5">
                            <label class="form-check-label" for="harapanortu-5">Agar anak lebih atletis</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="p-4 border rounded">
                      Saya memahami bahwa kegiatan di gym anak bersifat optional/ tambahan yang tidak dapat menggantikan terapi dan sekolah. Saya juga memahami akan adanya resiko-resiko yang mungkin dapat terjadi disaat aktivitas gym berlangsung meskipun kelas sudah dipersiapkan agar anak aman dan nyaman. Saya tidak berkeberatan apabila ada kemungkinan wajah anak saya terlihat saat proses pengambilan gambar/ video untuk kepentingan promosi atau edukasi.
                    </div>
                    <div class="mb-5 py-2 form-control-validation">
                      <div class="form-check mb-0">
                        <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                        <label class="form-check-label" for="terms-conditions">
                          Saya Setuju
                        </label>
                      </div>
                    </div>                    
                  </div>   
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
        </div>
        </div>
    </div>
</div>
<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->section('script') ?>


<script>
    $(document).ready(function() {
        //$("#member_table").DataTable();
        showMember();
    });

    const showMember = () => {
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
                name: "Nama",
                data: "nama",
                render: function (data, type, row) {
                if (row.jeniskelamin === 'L') {
                    return `<div class="d-flex justify-content-start align-items-center user-name">
                            <div class="avatar-wrapper">
                              <div class="avatar me-2">
                                <img src="assets/img/avatars/${row.image}" alt="Avatar" class="rounded-circle">
                              </div>
                            </div>
                            <div class="d-flex flex-column">
                              <span class="badge rounded-pill bg-label-danger">${data}</span>
                            </div>
                          </div>`;
                } else if (row.jeniskelamin === 'P') {
                    return `<div class="d-flex justify-content-start align-items-center user-name">
                            <div class="avatar-wrapper">
                              <div class="avatar me-2">
                                <img src="assets/img/avatars/${row.image}" alt="Avatar" class="rounded-circle">
                              </div>
                            </div>
                            <div class="d-flex flex-column">
                              <span class="badge rounded-pill bg-label-info">${data}</span>
                            </div>
                          </div>`;
                } else {
                    return data; // fallback, kalau kosong/tidak ada
                }
                }
            },
            {
                name: "Tgl Lahir",
                data: "tgllahir",
                render: function (data, type, row) {
                if (!data) return "-";

                // parsing tanggal
                const dob = new Date(data); // data harus format YYYY-MM-DD dari server
                const day = String(dob.getDate()).padStart(2, '0');
                const month = String(dob.getMonth() + 1).padStart(2, '0');
                const year = dob.getFullYear();

                // hitung umur
                const today = new Date();
                let age = today.getFullYear() - year;
                const m = today.getMonth() - dob.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                    age--;
                }

                return `${day}-${month}-${year} (${age} Tahun)`;
                }
            },
            {
                name: "Wa Ortu",
                data: "waortu"
            },
            {
                name: "Harapan Ortu",
                data: "harapanortu",
                render: function (data, type, row) {
                    if (!data) return "-";

                    // mapping value ke label
                    const mapping = {
                    1: "Mengisi Waktu Luang",
                    2: "Agar Anak Tidak Malas Bergerak",
                    3: "Untuk mengeksplor/ mengetahui minat bakat anak dibidang olahraga",
                    4: "Ada keluhan khusus",
                    5: "Agar anak lebih atletis"
                    };

                    // pisahkan string "1,3" jadi array [1,3]
                    const ids = data.split(",").map(i => i.trim());

                    const labels = ids.map(i => {
                    const text = mapping[i] ?? i;
                    return `<span class="badge rounded-pill bg-label-primary mb-1">${text}</span>`;
                    });

                    // tampil ke bawah
                    return labels.join("<br>");
                }
            },
            {
                width: "10%",
                sortable: false,
                render: function(data, type, row, meta) {
                    return `<button class="btn btn-sm btn-text-secondary rounded-pill btn-icon item-upload upload" id="upload">
                                <i class="icon-base ri ri-upload-2-line icon-22px"></i>
                            </button>
                            <button class="btn btn-sm btn-text-secondary rounded-pill btn-icon item-edit edit" id="edit">
                                <i class="icon-base ri ri-edit-box-line icon-22px"></i>
                            </button>
                            <button class="btn btn-sm btn-text-secondary rounded-pill btn-icon item-edit delete" id="delete">
                                <i class="icon-base ri ri-delete-bin-fill icon-22px"></i>
                            </button>
                            <button class="btn btn-sm btn-text-secondary rounded-pill btn-icon item-edit view" id="view">
                                <i class="icon-base ri ri-eye-fill icon-22px"></i>
                            </button>
                            `;
                }
            },
            
        ];


        var table = $('#member_table').DataTable({
            searching: true,
            destroy: true,
            lengthChange: false,
            ajax: {
                url: "<?= route_to('member.datatable') ?>",
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
        $("#member_modal #modal_title").text("Tambah Member");
        $("#member_modal").modal("show");
    });

    $('#member_table tbody').on('click', '#edit', function() {
        var data = $('#member_table').DataTable().row($(this).parents('tr')).data();
        $("#member_modal #kelas").val(data.kelas);
        $("#member_modal #keterangan").val(data.keterangan);
        $("#member_modal #id").val(data.id);

        $("#member_modal #modal_title").text("Edit Member");
        $("#member_modal").modal("show");
    });
    
    $('#member_table tbody').on('click', '#upload', function() {
        var data = $('#member_table').DataTable().row($(this).parents('tr')).data();

        $("#upload_member_modal #id").val(data.id);

        $("#upload_member_modal #modal_title").text("Upload Foto Member");
        $("#upload_member_modal").modal("show");
    });

    $('#member_table tbody').on('click', '#view', function() {
        var data = $('#member_table').DataTable().row($(this).parents('tr')).data();
        $("#modalLong #nama").val(data.nama);
        $("#modalLong #tgllahir").val(data.tgllahir);
        $("#modalLong #sekolah").val(data.sekolah);
        $("#modalLong #namaortu").val(data.namaortu);
        $("#modalLong #alamat").val(data.alamat);
        $("#modalLong #kelas").val(data.kelas);
        $("#modalLong #waortu").val(data.waortu);
        setJenisKelamin(data.jeniskelamin);

        let $modal = $("#modalLong"); // biar selector fokus ke dalam modal

        $modal.find("input[name='harapanortu']").prop("checked", false);

        if (data.harapanortu) {
            let selected = data.harapanortu.split(","); // misal "1,3" jadi ["1","3"]

            selected.forEach(function(val) {
                $modal.find("input[name='harapanortu'][value='" + val.trim() + "']").prop("checked", true);
            });
        }


        // Set radio buttons
        $modal.find("input[type='radio']").each(function () {
            const name = $(this).attr("name");
            if (data[name] !== undefined) {
                if ($(this).val() == data[name]) {
                    $(this).prop("checked", true);
                }
            }
        });

        // Set input text, time, textarea
        $modal.find("input[type='text'], input[type='time'], textarea").each(function () {
            const name = $(this).attr("name");
            if (data[name] !== undefined) {
                $(this).val(data[name]);
            }
        });

        $("#modalLong #modal_title").text("Edit Member");
        $("#modalLong").modal("show");
    });

    function setJenisKelamin(value) {
        $("#modalLong input[name='jeniskelamin'][value='" + value + "']").prop("checked", true);
    }

    $('#member_table tbody').on('click', '#delete', function() {
        var data = $('#member_table').DataTable().row($(this).parents('tr')).data();
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "data "+data.member+" akan dihapus dari sistem",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Silahkan!",
            cancelButtonText: "Tidak, Jangan dihapus!",
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: `<?= base_url() ?>member/delete/${data.id}`,
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
                            showMember();
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
                toastr.error("data "+data.member+" tidak jadi dihapus");                
            }
        });
        
        

    });


    $('#member_modal').on('hidden.bs.modal', function(e) {
        $(this).find("input,textarea").val('').end();
    }) 

    $('#member_form').on('submit', function(e) {
        e.preventDefault()
        var form_data = $(this).serializeArray();
        let id = $('#member_form #id').val();
        let route = (id != '') ?
            `<?= base_url() ?>member/${id}/edit` :
            "<?= route_to('member.store') ?>";
        
        $.ajax({
            url: route,
            type: 'post',
            dataType: 'json',
            data: form_data,
            success: function(response) {                
                if (response.status) {
                    $("#member_modal").modal("hide");
                    showMember();
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
    
    $('#member_upload_form').on('submit', function(e) {
        e.preventDefault();

        // Gunakan FormData agar file ikut terkirim
        var form_data = new FormData(this);

        let id = $('#member_upload_form #id').val();
        let route = (id != '') ?
            `<?= base_url() ?>member/${id}/editupload` :
            "<?= route_to('member.storeupload') ?>";

        $.ajax({
            url: route,
            type: 'POST',
            data: form_data,
            dataType: 'json',
            contentType: false,   // penting untuk FormData
            processData: false,   // penting untuk FormData
            success: function(response) {                
                if (response.status) {
                    $("#upload_member_modal").modal("hide");
                    showMember();
                    toastr.success(response.messages, "Sukses");
                } else {
                    toastr.error("Gagal!", "Error");
                }
            },
            error: function(err) {
                toastr.error("Gagal upload!", "Error");
                console.log(err);
            }
        });    
    });

</script>
<?= $this->endSection() ?>