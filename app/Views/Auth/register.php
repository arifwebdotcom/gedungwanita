<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
 <div class="position-relative container">
      <div class=" container-p-y">
        <div class="authentication-inner py-6 mx-4">
          <div class="bs-stepper wizard-numbered mt-2">
            <div class="col-md-12 container py-5">
              <h3>Formulir Pendaftaran Anak</h3>
              <div class="alert alert-danger alert-dismissible" role="alert" id="error" style="display:none;">
                Error !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            </div>          
            <div class="bs-stepper-header">
              <div class="step active" data-target="#datadiri">
                <button type="button" class="step-trigger" aria-selected="true">
                  <span class="bs-stepper-circle"><i class="icon-base ri ri-check-line"></i></span>
                  <span class="bs-stepper-label">
                    <span class="bs-stepper-number">01</span>
                    <span class="d-flex flex-column gap-1 ms-2">
                      <span class="bs-stepper-title">Data Anak & Ortu</span>
                      <span class="bs-stepper-subtitle">Data Anak & Orang Tua</span>
                    </span>
                  </span>
                </button>
              </div>
              <div class="line"></div>
              <div class="step" data-target="#kebiasaan">
                <button type="button" class="step-trigger" aria-selected="false">
                  <span class="bs-stepper-circle"><i class="icon-base ri ri-check-line"></i></span>
                  <span class="bs-stepper-label">
                    <span class="bs-stepper-number">02</span>
                    <span class="d-flex flex-column gap-1 ms-2">
                      <span class="bs-stepper-title">Kebiasaan Anak</span>
                      <span class="bs-stepper-subtitle">Kebiasaan Sehari-hari Anak</span>
                    </span>
                  </span>
                </button>
              </div>
              <div class="line"></div>
              <div class="step" data-target="#perilaku">
                <button type="button" class="step-trigger" aria-selected="false">
                  <span class="bs-stepper-circle"><i class="icon-base ri ri-check-line"></i></span>
                  <span class="bs-stepper-label">
                    <span class="bs-stepper-number">03</span>
                    <span class="d-flex flex-column gap-1 ms-2">
                      <span class="bs-stepper-title">Perilaku Gerak</span>
                      <span class="bs-stepper-subtitle">Perilaku Gerak dan Minat Fisik Anak</span>
                    </span>
                  </span>
                </button>
              </div>
              <div class="line"></div>
              <div class="step" data-target="#catatan">
                <button type="button" class="step-trigger" aria-selected="false">
                  <span class="bs-stepper-circle"><i class="icon-base ri ri-check-line"></i></span>
                  <span class="bs-stepper-label">
                    <span class="bs-stepper-number">04</span>
                    <span class="d-flex flex-column gap-1 ms-2">
                      <span class="bs-stepper-title">Catatan Kesehatan</span>
                      <span class="bs-stepper-subtitle">Catatan Kesehatan Umum</span>
                    </span>
                  </span>
                </button>
              </div>
            </div>
            <div class="bs-stepper-content">
              <form method="post" id="form-member" action="<?= route_to('member.store') ?>">
                <!-- Account Details -->
                <div id="datadiri" class="content active dstepper-block">
                  <div class="content-header mb-4">
                    <h6 class="mb-0">Data Anak</h6>
                    <small>Masukkan Data Anak dan Orang Tua.</small>
                  </div>
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
                    <div class="col-12 d-flex justify-content-between">
                      <button class="btn btn-outline-secondary btn-prev waves-effect" disabled="" type="button">
                        <i class="icon-base ri ri-arrow-left-line icon-sm me-sm-1 me-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                      </button>
                      <button type="button" class="btn btn-primary btn-next waves-effect waves-light"><span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="icon-base ri ri-arrow-right-line icon-sm"></i></button>
                    </div>
                  </div>
                </div>
                <!-- Personal Info -->
                <div id="kebiasaan" class="content">
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
                    
                    <div class="col-12 d-flex justify-content-between">
                      <button class="btn btn-outline-secondary btn-prev waves-effect" type="button">
                        <i class="icon-base ri ri-arrow-left-line icon-sm me-sm-1 me-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                      </button>
                      <button type="button" class="btn btn-primary btn-next waves-effect waves-light"><span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="icon-base ri ri-arrow-right-line icon-sm"></i></button>
                    </div>
                  </div>
                </div>
                <!-- Personal Info -->
                <div id="perilaku" class="content">
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
                    <div class="col-12 d-flex justify-content-between">
                      <button class="btn btn-outline-secondary btn-prev waves-effect" type="button">
                        <i class="icon-base ri ri-arrow-left-line icon-sm me-sm-1 me-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                      </button>
                      <button type="button"  class="btn btn-primary btn-next waves-effect waves-light"><span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="icon-base ri ri-arrow-right-line icon-sm"></i></button>
                    </div>
                  </div>
                </div>
                <!-- Social Links -->
                <div id="catatan" class="content">
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
                    <div class="col-12 d-flex justify-content-between">
                      <button class="btn btn-outline-secondary btn-prev waves-effect" type="button" >
                        <i class="icon-base ri ri-arrow-left-line icon-sm me-sm-1 me-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                      </button>
                      <button type="submit" class="btn btn-primary btn-submit waves-effect waves-light">Submit</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
<?= $this->endSection() ?>
