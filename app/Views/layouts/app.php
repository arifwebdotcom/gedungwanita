<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Koperasi PPN</title>
		<meta name="description" content="Koperasi Pinsar Petelur Nasional" />
		<meta name="keywords" content="Koperasi Pinsar Petelur Nasional" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Koperasi Pinsar Petelur Nasional" />
		<meta property="og:url" content="https://koperasippn.com/" />
		<meta property="og:site_name" content="Koperasi PPN" />
		<link rel="shortcut icon" href="<?= base_url() ?>assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="<?= base_url() ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url() ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url() ?>assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/> 
		<link href="<?= base_url() ?>assets/css/custom.css" rel="stylesheet" type="text/css" />
		<style>
			.select2-container {
				z-index: 1600; /* Adjust as needed */
			}
		</style>
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" style="background-image: url(<?= base_url() ?>assets/media/patterns/header-bg.jpg)" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-enabled">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					

				<!-- Header -->
				<?= $this->include('layouts/navbar'); ?>
					
					
					<!--begin::Toolbar-->
					<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
							
							<?= view_cell('App\Cells\SubNavCell::setMenuBarModul') ?>	
							<!--begin::Actions-->
							<div class="d-flex align-items-center py-3 py-md-1">
										
								<!--begin::Button-->
								<a href="#" class="btn btn-bg-white btn-active-color-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">Tambah Anggota</a>
								<!--end::Button-->
							</div>
							<!--end::Actions-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Toolbar-->
					<!--begin::Container-->
					<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
					
						<?= $this->include('layouts/menubar'); ?>
						
						<!--begin::Post-->
						<div class="content flex-row-fluid" id="kt_content">
							<!--begin::Row-->
							<?= $this->renderSection('content'); ?>
							
						</div>
						<!--end::Post-->
					</div>
					<!--end::Container-->
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-xxl d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted fw-bold me-1">2021©</span>
								<a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
							</div>
							<!--end::Copyright-->
							<!--begin::Menu-->
							<ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
								<li class="menu-item">
									<a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
								</li>
								<li class="menu-item">
									<a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a>
								</li>
								<li class="menu-item">
									<a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
								</li>
							</ul>
							<!--end::Menu-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--end::Activities drawer-->	
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->
		<!--end::Main-->
		<?= view_cell('App\Cells\ModalAddCell::getDataModal') ?>
		
		<script>var hostUrl = "<?= base_url() ?>assets/";</script>
		<script>var base_url = "<?= base_url() ?>";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="<?= base_url() ?>assets/plugins/global/plugins.bundle.js"></script>
		<script src="<?= base_url() ?>assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="<?= base_url() ?>assets/js/custom/widgets.js"></script>
		<script src="<?= base_url() ?>assets/js/custom/apps/chat/chat.js"></script>
		<script src="<?= base_url() ?>assets/js/custom/modals/create-app.js"></script>
		<script src="<?= base_url() ?>assets/js/custom/modals/upgrade-plan.js"></script>
		<script src="<?= base_url() ?>assets/js/custom/documentation/general/toastr.js"></script>
		<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-LWmdCm3ybl8nFlXU"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
		
		
			<script> 

				if(<?= user()->iscomplete ?> == 0 && <?= user()->isadmin ?> != 1){				
					$(window).on('load', function() {
						$('#kt_modal_create_app').modal('show');
					});
					var def = 0;

					$("#bersedia").on('change', function() {

						if ($(this).is(':checked') && def == 0) {
							
							$.ajax({
								url: '<?= route_to('dashboard.payment') ?>',
								method: 'POST',
								dataType: 'json',
								data: { first_name: $("#first_name").val(), email: $("#email").val(),phone: $("#nohp").val()},
								success: function(data) {		
									def = 1;
									window.snap.embed(data.snapToken, {
										embedId: 'snap-container'
									});
									// SnapToken acquired from previous step
									snap.pay(data.snapToken, {
									// Optional
									onSuccess: function(result){
										/* You may add your own implementation here */
										alert("payment success!"); console.log(result);
									},
									onPending: function(result){
										/* You may add your own implementation here */
										alert("wating your payment!"); console.log(result);
									},
									onError: function(result){
										/* You may add your own implementation here */
										alert("payment failed!"); console.log(result);
									},
									onClose: function(){
										/* You may add your own implementation here */
										alert('you closed the popup without finishing the payment');
									}
									});						
								}
							});
							
						} else if($(this).is(':checked') && def == 1){
							$("#snap-container").show();
						}else if(!$(this).is(':checked')){
							$("#snap-container").hide();
						}
					});
					
				}
				
				// var input1 = document.querySelector("#jenispakan");

				// // Initialize Tagify components on the above inputs
				// new Tagify(input1);

				//var form;
				
					// Tags. For more info, please visit the official plugin site: https://yaireo.github.io/tagify/
					var tags = new Tagify(document.querySelector('#jenispakan'), {
						whitelist: ["Sentrat", "Pakan Jadi", "Self Mixing"],
						maxTags: 5,
						dropdown: {
							maxItems: 10,           // <- mixumum allowed rendered suggestions
							enabled: 0,             // <- show suggestions on focus
							closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
						}
					});
					tags.on("change", function(){
						// Revalidate the field when an option is chosen
						validator.revalidateField('tags');
					});

					$.ajax({
						url: '<?= route_to('doc.tagify') ?>',
						method: 'GET',
						dataType: 'json',
						success: function(data) {
							// Update the Tagify whitelist with the received data
							var whitelist = data;
							var tagss = new Tagify(document.querySelector('#pullet'), {
								whitelist: whitelist,
								maxTags: 5,
								dropdown: {
									maxItems: 10,           // <- mixumum allowed rendered suggestions
									enabled: 0,             // <- show suggestions on focus
									closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
								}
							});
							tagss.on("change", function(){
								// Revalidate the field when an option is chosen
								validator.revalidateField('tagss');
							});
						},
						error: function(xhr, status, error) {
							console.error(xhr.responseText);
						}
					});
					

					// Due date. For more info, please visit the official plugin site: https://flatpickr.js.org/
					

				toastr.options = {
					"closeButton": true,
					"debug": false,
					"newestOnTop": false,
					"progressBar": true,
					"positionClass": "toast-top-right",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};
			var _BASE = '<?= base_url() ?>';
			const ajaxRequest = (route, method = 'post', data = null) => {
				return new Promise((resolve, reject) => {
					$.ajax({
						url: route,
						type: method,
						dataType: 'json',
						data: data,
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
								resolve(response)
							} else {
								reject(response)
							}
						},
						error: function(err) {
							Swal.close()
							reject(err)
						}
					});
				})
			}
		</script>

		<?= $this->renderSection('script'); ?>
	</body>  
	<!--end::Body-->
</html>