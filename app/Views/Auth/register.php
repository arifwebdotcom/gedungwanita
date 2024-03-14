<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-up -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/background-login.png">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Logo-->
					<a href="<?= base_url(); ?>" class="mb-12">
						<!-- <img alt="Logo" src="assets/media/logos/logo-1.svg" class="h-40px" />-->
					</a> 
                    <h1> Koperasi PPN </h1>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
                        <?= view('Myth\Auth\Views\_message_block') ?>
						<form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" method="post" action="<?= url_to('register') ?>">
                            <?= csrf_field() ?>
                            <!--begin::Heading-->
							<div class="mb-10 text-center">
								<!--begin::Title-->
								<h1 class="text-dark mb-3">Registrasi Akun</h1>
								<!--end::Title-->
								<!--begin::Link-->
								<div class="text-gray-400 fw-bold fs-4">Sudah Punya Akun?
								<a href="<?= url_to('login'); ?>" class="link-primary fw-bolder">Login disini</a></div>
								<!--end::Link-->
							</div>
							<!--end::Separator-->
							<!--begin::Input group-->
							<div class="row fv-row mb-7">
								<!--begin::Col-->
								<div class="col-xl-6">
									<label class="form-label fw-bolder text-dark fs-6"><?=lang('Auth.firstName')?></label>
									<input class="form-control form-control-lg form-control-solid" type="text" placeholder="<?=lang('Auth.firstName')?>" name="first-name" autocomplete="off" />
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-xl-6">
									<label class="form-label fw-bolder text-dark fs-6"><?=lang('Auth.lastName')?></label>
									<input class="form-control form-control-lg form-control-solid" type="text" placeholder="<?=lang('Auth.lastName')?>" name="last-name" autocomplete="off" />
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<div class="fv-row mb-7">
								<label class="form-label fw-bolder text-dark fs-6">Nama Peternak</label>
								<input class="form-control form-control-lg form-control-solid <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" type="text" placeholder="Nama Peternak" name="username" autocomplete="off" value="<?= old('username') ?>"/>
							</div>
							<!--begin::Input group-->
							<div class="fv-row mb-7">
								<label class="form-label fw-bolder text-dark fs-6">Nama Peternakan</label>
								<input class="form-control form-control-lg form-control-solid" type="text" placeholder="Nama Peternakan" name="namapeternakan" autocomplete="off" />
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-7">
								<label class="form-label fw-bolder text-dark fs-6"><?=lang('Auth.email')?></label>
								<input class="form-control form-control-lg form-control-solid <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" type="email" placeholder="<?=lang('Auth.email')?>" name="email" autocomplete="off" />
								<small id="emailHelp" class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="mb-10 fv-row" data-kt-password-meter="true">
								<!--begin::Wrapper-->
								<div class="mb-1">
									<!--begin::Label-->
									<label class="form-label fw-bolder text-dark fs-6"><?=lang('Auth.password')?></label>
									<!--end::Label-->
									<!--begin::Input wrapper-->
									<div class="position-relative mb-3">
										<input class="form-control form-control-lg form-control-solid <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" type="password" placeholder="<?=lang('Auth.password')?>" name="password" autocomplete="off" />
										<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
											<i class="bi bi-eye-slash fs-2"></i>
											<i class="bi bi-eye fs-2 d-none"></i>
										</span>
									</div>
									<!--end::Input wrapper-->
									<!--begin::Meter-->
									
									<!--end::Meter-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Hint-->
								<div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
								<!--end::Hint-->
							</div>							
							<!--end::Input group=-->
							<!--begin::Input group-->
							<div class="fv-row mb-5">
								<label class="form-label fw-bolder text-dark fs-6"><?=lang('Auth.repeatPassword')?></label>
								<input class="form-control form-control-lg form-control-solid <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" type="password" placeholder="<?=lang('Auth.repeatPassword')?>" name="pass_confirm" autocomplete="off" />
							</div>

							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center">
								<button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
									<span class="indicator-label">Submit</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
				<!--begin::Footer-->
				<div class="d-flex flex-center flex-column-auto p-10">
					<!--begin::Links-->
					<div class="d-flex align-items-center fw-bold fs-6">
						<a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">About</a>
						<a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact</a>
						<a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contact Us</a>
					</div>
					<!--end::Links-->
				</div>
				<!--end::Footer-->
			</div>
			<!--end::Authentication - Sign-up-->
		</div>

<?= $this->endSection() ?>
