<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="position-relative">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-6 mx-4">
          <!-- Login -->
          <div class="card p-sm-7 p-2">
            <!-- Logo -->
            <div class="app-brand justify-content-center mt-5">
              <a href="index.html" class="app-brand-link gap-3">
                <span class="app-brand-logo demo">
                  
                </span>
              </a>
            </div>
            <!-- /Logo -->

            <div class="card-body mt-1">
              <h4 class="mb-1">Welcome to Sasana Krida Kusuma! 👋🏻</h4>
              <p class="mb-5">Please sign-in to your account and start the adventure</p>
             <?= view('Myth\Auth\Views\_message_block') ?>
              <form id="formAuthentication" novalidate="novalidate" class="mb-5" action="<?= url_to('login') ?>" method="POST">
                <div class="form-floating form-floating-outline mb-5 form-control-validation">
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="login"
                    placeholder="Enter your email or username"
                    autofocus <?= session('errors.login') ? ' is-invalid' : '' ?> />
                  <label for="email">Email or Username</label>
                </div>
                <div class="mb-5">
                  <div class="form-password-toggle form-control-validation">
                    <div class="input-group input-group-merge">
                      <div class="form-floating form-floating-outline">
                        <input
                          type="password"
                          id="password"
                          class="form-control"
                          name="password"
                          placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                          aria-describedby="password" <?= session('errors.login') ? ' is-invalid' : '' ?> />
                        <label for="password">Password</label>
                      </div>
                      <span class="input-group-text cursor-pointer"
                        ><i class="icon-base ri ri-eye-off-line icon-20px"></i
                      ></span>
                    </div>
                  </div>
                </div>
                <div class="mb-5 pb-2 d-flex justify-content-between pt-2 align-items-center">
                  <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                  <a href="auth-forgot-password-basic.html" class="float-end mb-1">
                    <span>Forgot Password?</span>
                  </a>
                </div>
                <div class="mb-5">
                  <button class="btn btn-primary d-grid w-100" type="submit">login</button>
                </div>
              </form>

              <p class="text-center mb-5">
                <span>New on our platform?</span>
                <a href="auth-register-basic.html">
                  <span>Create an account</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Login -->
          <img
            src="../assets/img/illustrations/tree-3.png"
            alt="auth-tree"
            class="authentication-image-object-left d-none d-lg-block" />
          <img
            src="../assets/img/illustrations/auth-basic-mask-light.png"
            class="authentication-image d-none d-lg-block scaleX-n1-rtl"
            height="172"
            alt="triangle-bg" />
          <img
            src="../assets/img/illustrations/tree.png"
            alt="auth-tree"
            class="authentication-image-object-right d-none d-lg-block" />
        </div>
      </div>
    </div>

<?= $this->endSection() ?>
