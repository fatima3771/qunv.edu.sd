<?php $__env->startSection('content'); ?>


<div class="padding-15">

    

    <div class="login-box">

        <!-- login form -->
        <form class="sky-form boxed" role="form" method="POST" action="<?php echo e(route('mtCPanel.login.submit')); ?>">
            <?php echo e(csrf_field()); ?>

            <header><i class="fa fa-users"></i> Sign In</header>

            <?php if(isset($loginError)): ?>
                <div class="alert alert-danger noborder text-center weight-400 nomargin noradius"><?php echo e(Lang::get('admin.loginErrorMessage')); ?></div>
            <?php endif; ?>
            <!--
            <div class="alert alert-danger noborder text-center weight-400 nomargin noradius">
                Invalid Email or Password!
            </div>

            <div class="alert alert-warning noborder text-center weight-400 nomargin noradius">
                Account Inactive!
            </div>

            <div class="alert alert-default noborder text-center weight-400 nomargin noradius">
                <strong>Too many failures!</strong> <br />
                Please wait: <span class="inlineCountdown" data-seconds="180"></span>
            </div>
            -->

            <fieldset>	
            
                <section>
                    <label class="label">E-mail</label>
                    <label class="input">
                        <i class="icon-append fa fa-envelope"></i>
                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo app('translator')->getFromJson('admin.email'); ?>" required autofocus>
                        <span class="tooltip tooltip-top-right">Email Address</span>
                        <?php if($errors->has('email')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </label>
                </section>
                
                <section>
                    <label class="label">Password</label>
                    <label class="input">
                        <i class="icon-append fa fa-lock"></i>
                        <input id="password" type="password" class="form-control" name="password" placeholder="<?php echo app('translator')->getFromJson('admin.password'); ?>" required>
                        <b class="tooltip tooltip-top-right">Type your Password</b>
                        <?php if($errors->has('password')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>><i></i> <?php echo app('translator')->getFromJson('admin.rememberMe'); ?>
                    </label>
                </section>

            </fieldset>

            <footer>
                <button type="submit" class="btn btn-primary pull-right">Sign In</button>
                <div class="forgot-password pull-left">
                    <a href="<?php echo e(route('password.request')); ?>"><?php echo app('translator')->getFromJson('admin.forgetPassword'); ?></a> <br />
                </div>
            </footer>
        </form>
        <!-- /login form -->

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('mtCPanel.layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>