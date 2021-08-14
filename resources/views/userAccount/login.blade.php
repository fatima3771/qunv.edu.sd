@extends('site.layouts.master')

@section('content')
<style>
 .progress {
        height: 5px;
    }

    .control-label {
        text-align: left !important;
        padding-bottom: 7px;
    }

    .form-horizontal {
        padding: 25px 20px;
        border: 1px solid #eee;
        border-radius: 5px;
    }

    select.form-control:focus {
        border-color: #e9ab66;
        box-shadow: none;
    }

    .block-help {
        font-weight: 300;
    }

    .terms {
        text-decoration: underline;
    }

    .modal {
        text-align: center;
        padding: 0!important;
    }

    .modal:before {
        content: '';
        display: inline-block;
        height: 100%;
        vertical-align: middle;
        margin-right: -4px;
    }

    .modal-dialog {
        display: inline-block;
        text-align: left;
        vertical-align: middle;
    }

    .divider {
        position: absolute;
        height: 2px;
        border: 1px solid #eee;
        width: 100%;
        top: 10px;
        z-index: -5;
    }

    .ex-account {
        position: relative;
    }

    .ex-account p {
        background-color: rgba(255, 255, 255, 0.41);
    }

    select:hover {
        color: #444645;
        background: #ddd;
    }

    .fa-file-text {
        color: #edda39;
    }

    .mar-top-bot-50 {
        margin-top: 50px;
        margin-bottom: 50px;
    }
</style>
<div class="dt-sc-margin100"></div>
<div id="main">
    <div class="page-header parallax" style="background-image:url({{ request()->root() }}./public/autostars/images/headerBg.jpg);">
    	<div class="container">
        	<h1 class="page-title">@lang('site.login')</h1>
       	</div>
    </div>

    <div class="utility-bar">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8 col-sm-6 col-xs-8">
                    <ol class="breadcrumb">
                        <li><a href="{{ request()->root() }}">@lang('site.home')</a></li>
                        <li class="active">@lang('site.login')</li>
                    </ol>
            	</div>
                <div class="col-md-4 col-sm-6 col-xs-4">
                </div>
            </div>
      	</div>
    </div>

    <div class="main" role="main">
    	<div id="content" class="content full">
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Tearms &amp; Conditions</h4>
                        </div>
                        <div class="modal-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum dolores quod quos quae, blanditiis delectus velit, eaque quas facere aliquam earum in quisquam quo autem nisi, eligendi quia quibusdam aperiam?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


        	<div class="container">
            	<div class="row">
                	<div class="col-md-8">
                        <h2>مرحبا بك في إنجز، منصة العمل الحر </h2>
                        <p>يسرنا إختيارك لموقع إنجر للعمل الحر، فقط قم بتسجيل الدخول أو سجل حساباً جديداً لتتمكن من شراء وبيع الخدمات.</p>
                        <div class="spacer-20"></div>
                        <div class="icon-box ibox-rounded ibox-light ibox-effect">
                            <div class="ibox-icon">
                                <i class="fa fa-list-alt"></i>
                            </div>
                            <h3>إعرض خدماتك للجمهور</h3>
                            <p>قم بعرض الخدمات التي تتقنها للجميع، إعرضها في الموقع، وتحصل على أرباحك.</p>
                        </div>
                        <div class="spacer-20"></div>
                        <div class="icon-box ibox-rounded ibox-light ibox-effect">
                            <div class="ibox-icon">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            <h3>اشتري الخدمات</h3>
                            <p>عدد كبير من المستقلين يقدمون عصارة خبرتهم وأعمالهم في شكل خدمات متميزة، قم بالشراء منهم الآن.</p>
                        </div>
                        <div class="spacer-20"></div>
                        <div class="icon-box ibox-rounded ibox-light ibox-effect">
                            <div class="ibox-icon">
                                <i class="fa fa-smile-o"></i>
                            </div>
                            <h3>إضمن حقوقك </h3>
                            <p>إنجز تضمن للمشتري الحصول على مستحقاته من بيع الخدمات، كما تضمن للشاري الحصول على الخدمة المطلوبة بجودة عالية.</p>
                        </div>
                        <hr class="fw">

                    </div>
                    <div class="col-md-4">
                    	<section class="signup-form sm-margint">
                            <form method="POST" action="{{ route('userAccount.login') }}">
                                {{ csrf_field() }}
                            	<!-- Regular Signup -->
                                <div class="regular-signup">
                        			<h3>تسجيل الدخول</h3>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                    
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> تذكرني
                                    </label>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        نسيت كلمة المرور?
                                    </a>
                                    
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="تسجيل الدخول">
                                    <div class="spacer-20"></div>
                                    <a class="btn btn-link" href="{{ request()->root() }}/register">
                                        لا أملك حساباً، تسجيل مستخدم جديد؟
                                    </a>
                                </div>
                                <!-- Social Signup -->
                                <div class="social-signup">
                                	<span class="or-break">أو</span>
                					<button onClick="window.open('register/facebook','_self');" type="button" class="btn btn-block btn-facebook btn-social"><i class="fa fa-facebook"></i> سجل الدخول باستخدام فيسبوك</button>
                					<button onClick="window.open('register/google','_self');" type="button" class="btn btn-block btn-danger btn-social"><i class="fa fa-google"></i> سجل الدخول باستخدام قوقل</button>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
   	</div>

</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#email').blur(function() {
            var email = $('#email').val();
            if (IsEmail(email) == false) {
                $('#sign-up').attr('disabled', true);
                $('#popover-email').removeClass('hide');
            } else {
                $('#popover-email').addClass('hide');
            }
        });
        $('#password').keyup(function() {
            var password = $('#password').val();
            if (checkStrength(password) == false) {
                $('#sign-up').attr('disabled', true);
            }
        });
        $('#confirm-password').blur(function() {
            if ($('#password').val() !== $('#confirm-password').val()) {
                $('#popover-cpassword').removeClass('hide');
                $('#sign-up').attr('disabled', true);
            } else {
                $('#popover-cpassword').addClass('hide');
            }
        });
        $('#contact-number').blur(function() {
            if ($('#contact-number').val().length != 10) {
                $('#popover-cnumber').removeClass('hide');
                $('#sign-up').attr('disabled', true);
            } else {
                $('#popover-cnumber').addClass('hide');
                $('#sign-up').attr('disabled', false);
            }
        });
        $('#sign-up').hover(function() {
            if ($('#sign-up').prop('disabled')) {
                $('#sign-up').popover({
                    html: true,
                    trigger: 'hover',
                    placement: 'below',
                    offset: 20,
                    content: function() {
                        return $('#sign-up-popover').html();
                    }
                });
            }
        });

        function IsEmail(email) {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!regex.test(email)) {
                return false;
            } else {
                return true;
            }
        }

        function checkStrength(password) {
            var strength = 0;


            //If password contains both lower and uppercase characters, increase strength value.
            if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
                strength += 1;
                $('.low-upper-case').addClass('text-success');
                $('.low-upper-case i').removeClass('fa-file-text').addClass('fa-check');
                $('#popover-password-top').addClass('hide');


            } else {
                $('.low-upper-case').removeClass('text-success');
                $('.low-upper-case i').addClass('fa-file-text').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }

            //If it has numbers and characters, increase strength value.
            if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) {
                strength += 1;
                $('.one-number').addClass('text-success');
                $('.one-number i').removeClass('fa-file-text').addClass('fa-check');
                $('#popover-password-top').addClass('hide');

            } else {
                $('.one-number').removeClass('text-success');
                $('.one-number i').addClass('fa-file-text').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }

            //If it has one special character, increase strength value.
            if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
                strength += 1;
                $('.one-special-char').addClass('text-success');
                $('.one-special-char i').removeClass('fa-file-text').addClass('fa-check');
                $('#popover-password-top').addClass('hide');

            } else {
                $('.one-special-char').removeClass('text-success');
                $('.one-special-char i').addClass('fa-file-text').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }

            if (password.length > 7) {
                strength += 1;
                $('.eight-character').addClass('text-success');
                $('.eight-character i').removeClass('fa-file-text').addClass('fa-check');
                $('#popover-password-top').addClass('hide');

            } else {
                $('.eight-character').removeClass('text-success');
                $('.eight-character i').addClass('fa-file-text').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }




            // If value is less than 2

            if (strength < 2) {
                $('#result').removeClass()
                $('#password-strength').addClass('progress-bar-danger');

                $('#result').addClass('text-danger').text('Very Week');
                $('#password-strength').css('width', '10%');
            } else if (strength == 2) {
                $('#result').addClass('good');
                $('#password-strength').removeClass('progress-bar-danger');
                $('#password-strength').addClass('progress-bar-warning');
                $('#result').addClass('text-warning').text('Week')
                $('#password-strength').css('width', '60%');
                return 'Week'
            } else if (strength == 4) {
                $('#result').removeClass()
                $('#result').addClass('strong');
                $('#password-strength').removeClass('progress-bar-warning');
                $('#password-strength').addClass('progress-bar-success');
                $('#result').addClass('text-success').text('Strength');
                $('#password-strength').css('width', '100%');

                return 'Strong'
            }

        }

    });
</script>
<script src="vendor/password-checker.js"></script>
@endsection