@extends('site.layouts.master')

@section('css')
    <!-- Bootstrap Material Design -->
@stop

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
                            
                               <form method="POST" action="{{ route('userAccount.register') }}">
                                   {{ csrf_field() }}
                                   <!-- Regular Signup -->
                                   <div class="regular-signup">
                                       <h3>تسجيل الدخول</h3>
                                       <div class="form-group {{ $errors->first('name', 'has-error') }}">
                                            {!! $errors->first('name', '<label class="label label-danger">:message</label><br>') !!}
                                            <input id="name" type="name" placeholder="الاسم رباعي" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                       </div>
                                       <label for="gender">النوع</label> <br />
                                       <?php $gender = ['Male'=>1,'Female'=>2]; ?>
                                       {{Form::radio('gender',1,true)}} ذكر 
                                       {{Form::radio('gender',2)}} أنثى

                                       <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                            {!! $errors->first('email', '<label class="label label-danger">:message</label><br>') !!}
                                           <input id="email" type="email" placeholder="البريد الإلكتروني" class="form-control" name="email" value="{{ old('email') }}" required>
                                       </div>
                                       
                                       <div class="form-group {{ $errors->first('email-confirm', 'has-error') }}">
                                            {!! $errors->first('email-confirm', '<label class="label label-danger">:message</label><br>') !!}
                                            <input id="email-confirm" placeholder="تأكيد البريد الإلكتروني" type="email-confirm" class="form-control" name="email-confirm" value="{{ old('email-confirm') }}" required autofocus>
                                       </div>
                                       
                                       <div class="form-group {{ $errors->first('password', 'has-error') }}">
                                            {!! $errors->first('password', '<label class="label label-danger">:message</label><br>') !!}
                                            <input id="password" placeholder="كلمة المرور" type="password" class="form-control" name="password" required>
                                       </div>
                                       
                                       <div class="form-group {{ $errors->first('password-confirm', 'has-error') }}">
                                           {!! $errors->first('password-confirm', '<label class="label label-danger">:message</label><br>') !!}
                                           <input id="password-confirm" placeholder="تأكيد كلمة المرور" type="password" class="form-control has-error" name="password-confirm" required>
                                       </div>

                                        
                                        <label>
                                            {!! $errors->first('confirmRegulations', '<label class="label label-danger">:message</label><br>') !!}
                                            <input type="checkbox" name="confirmRegulations"> أوافق على شروط الإشتراك بموقع إنجز. <a href="">الإطلاع على الشروط</a>
                                       </label>
   
                                       <a class="btn btn-link" href="{{ route('password.request') }}">
                                           نسيت كلمة المرور?
                                       </a>
                                       
                                       <input type="submit" class="btn btn-primary btn-lg btn-block" value="التسجيل">
                                       <div class="spacer-20"></div>
                                       <a class="btn btn-link" href="{{ request()->root() }}/login">
                                           لديك حساب، يمكنك تسجيل الدخول من هنا
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




               
         
@stop

@section('scripts')
@stop