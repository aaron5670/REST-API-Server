<div class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title"><?= lang( 'login_heading' ); ?></h4>
                            <div id="infoMessage" style="color: red"><?= $message; ?></div>
							<?= form_open( 'auth/login', array(
								'class'      => 'my-login-validation',
								'novalidate' => ''
							) ); ?>
                            <div class="form-group">
								<?= lang( 'login_identity_label', 'identity' ); ?>
								<?= form_input( $identity ); ?>
                                <div class="invalid-feedback">
                                    Email is invalid
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password"><?= lang( 'login_password_label' ); ?>
                                    <a href="forgot_password" class="float-right">
										<?= lang( 'login_forgot_password' ); ?>
                                    </a>
                                </label>
								<?= form_input( $password ); ?>
                                <div class="invalid-feedback">
                                    Password is required
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="custom-checkbox custom-control">
	                                <?= form_checkbox( 'remember', '1', false, 'id="remember" class="custom-control-input"' ); ?>
                                    <label for="remember" class="custom-control-label"><?= lang( 'login_remember_label'); ?></label>
                                </div>
                            </div>

                            <div class="form-group m-0">
								<?= form_submit( 'submit', lang( 'login_submit_btn' ), 'class="btn btn-primary btn-block"' ); ?>
                            </div>
                            <div class="mt-4 text-center">
                                Don't have an account? <a href="register">Create One</a>
                            </div>
							<?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>