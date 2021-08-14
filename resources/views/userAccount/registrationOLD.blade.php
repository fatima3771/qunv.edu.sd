@extends('mco.layouts.master')

@section('css')
    <!-- Bootstrap Material Design -->
@stop

@section('content')
<div id="fh5co-about-us" data-section="about" style="background:url({{ asset('assets/crew/images/pageBG.jpg') }}) no-repeat;">
    <div class="container page-banner">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12">
                <ol class="breadcrumb" style="border:1px rgba(0,0,0,0.2) solid;">
                    <li><a href="index.html">@lang('site.home')</a></li>
                    <li><a href="">@lang('site.aboutProgram')</a></li>
                    <li class="active"></li>
                </ol>
            </div>
        </div>
    </div>
	<div class="container">
		<div class="row row-bottom-padded-lg" id="about-us">
            <div class="col-md-4">
                <div class="alert alert-warning">مرحبا بك</div>
                <img src="https://bikevirginia.org/wp-content/uploads/2015/04/volunteer_final.png" class="img-responsive" />
            </div>
            <div class="col-md-8">
                <h2 class="page-header"><i class="fa fa-fw fa-user"></i> تسجيل المتطوعين</h2>
                <p>
                    الرجاء ملء الاستمارة التالية بالمعلومات الصحيحة للتسجيل في السجل الطوعي الطبي لمنظمة الرعاية الطبية.
                </p>

                {!! Form::open(['url' => url('userAccount/register'), 'method' => 'post']) !!}
                    <h3 class="page-header"><i class="fa fa-fw fa-user"></i> بيانات الحساب</h3>
                    <div class="form-group {{$errors->has('username')?'has-error': false}}">
                        <label for="exampleInputEmail1">اسم الدخول</label>
                        {{Form::text('username', null,['class'=>'form-control', 'placeholder'=>'اسم الدخول'])}}
                        {!! $errors->first('username','<span class="help-block">:message</span>') !!}
                        <small id="emailHelp" class="form-text text-muted">يرجى استخدام الحروف الإنجليزية فقط في اسم الدخول، كما لا يجوز استخدام المسافات البيضاء أو الفراغات. أمثلة على أسماء دخول: 
                        <span class="text-danger">ahmed</span> | <span class="text-danger">alahmed123</span> | <span class="text-danger">ahmed_saleh</span> | <span class="text-danger">ahmed.saleh</span></small>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 {{$errors->has('password')?'has-error': false}}">
                            <label for="password">كلمة المرور</label>
                            {{Form::password('password',['class'=>'form-control', 'placeholder'=>'كلمة المرور'])}}
                        </div>
                        <div class="form-group col-md-6 {{$errors->has('password-confirm')?'has-error': false}}">
                            <label for="password-confirm">تأكيد كلمة المرور</label>
                            {{Form::password('password-confirm',['class'=>'form-control', 'placeholder'=>'تأكيد كلمة المرور'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 {{$errors->has('email')?'has-error': false}}">
                            <label for="email">البريد الإلكتروني</label>
                            {{Form::email('email', '',['class'=>'form-control', 'placeholder'=>'البريد الإلكتروني'])}}
                            <small id="emailHelp" class="form-text text-muted">يرجى إدخال بريد إلكتروني صحيح، سنقوم بإرسال كود تأكيد تفعيل الحساب إلى هذا البريد، كما أننا سوف نتواصل معك من خلاله أيضاً.</small>
                        </div>
                        <div class="form-group col-md-6 {{$errors->has('email-confirm')?'has-error': false}}">
                            <label for="email-confirm">تأكيد البريد الإلكتروني</label>
                            {{Form::text('email-confirm', '',['class'=>'form-control', 'placeholder'=>'تأكيد البريد الإلكتروني'])}}
                        </div>
                    </div>

                    <h3 class="page-header"><i class="fa fa-fw fa-user"></i> البيانات الشخصية</h3>
                    <div class="row">
                        <div class="form-group col-md-9 {{$errors->has('name')?'has-error': false}}">
                            <label for="exampleInputEmail1">الاسم (رباعي)</label>
                            {{Form::text('name', null,['class'=>'form-control', 'placeholder'=>'الاسم رباعي', 'required'=>'required'])}}
                            {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group col-md-3">
                            <label for="gender">النوع</label> <br />
                            <?php $gender = ['Male'=>1,'Female'=>2]; ?>
                            {{Form::radio('gender',1,true)}} ذكر 
                            {{Form::radio('gender',2)}} أنثى
                        </div>
                    </div>
                    <div class="form-group has-feedback row">
                        <div class="col-md-4">
                            <label for="DOB">تاريخ الميلاد</label>
                            {{Form::date('DOB','',['class'=>'form-control', 'required'=>'required'])}}
                        </div>
                        <div class="col-md-4">
                            <label for="nationality_id">الجنسية</label>
                            <?php $countries = App\Country::orderBy('countryNameAr','ASC')->pluck('countryNameAr','id'); ?>
                            {{ Form::select('nationality_id', $countries,189,['class'=>'form-control']) }}
                        </div>
                        <div class="col-md-4">
                            <label for="nationalID">الرقم الوطني</label>
                            {{Form::number('nationalID','',['class'=>'form-control', 'placeholder'=>'الرقم الوطني'])}}
                        </div>
                    </div>                    
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="mobile">رقم الموبايل</label>
                            {{Form::text('mobile','',['class'=>'form-control', 'placeholder'=>'رقم الموبايل'])}}
                        </div>
                        <div class="col-md-6">
                            <label for="phone">رقم الهاتف</label>
                            {{Form::text('phone','',['class'=>'form-control', 'placeholder'=>'رقم الهاتف'])}}
                        </div>
                    </div>        
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="city">المدينة</label>
                            {{Form::text('city','',['class'=>'form-control', 'placeholder'=>'المدينة'])}}
                        </div>
                        <div class="col-md-3">
                            <label for="dist">الحي</label>
                            {{Form::text('dist','',['class'=>'form-control', 'placeholder'=>'الحي'])}}
                        </div>
                        <div class="col-md-6">
                            <label for="address">العنوان</label>
                            {{Form::textarea('address','',['class'=>'form-control', 'rows' => 3, 'placeholder'=>'العنوان'])}}
                        </div>
                    </div>        
                    
                    <h3 class="page-header"><i class="fa fa-fw fa-graduation-cap"></i> البيانات الأكاديمية</h3>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="ruGrad">هل أنت؟</label><br />
                            {{ Form::radio('ruGrad',1,true, ['class' => 'ruGrad']) }} طالب 
                            {{ Form::radio('ruGrad',2,false, ['class' => 'ruGrad']) }} خريج
                        </div>
                        <div class="col-md-6">
                            <label for="ruMed">هل أنت كادر طبي؟</label><br />
                            {{ Form::radio('ruMed',1, false, ['class' => 'ruMed']) }} نعم 
                            {{ Form::radio('ruMed',2, false, ['class' => 'ruMed']) }} لا 
                        </div>
                    </div>
                    <div id="medGraduate" class="extraInfo" style="display:none;">
                        @include('mco.form.medGraduate')
                    </div>

                    <div id="nonMedGraduate" class="extraInfo" style="display:none;">
                        @include('mco.form.nonMedGraduate')
                    </div>

                    <div id="nonMedStudent" class="extraInfo" style="display:none;">
                        @include('mco.form.nonMedStudent')
                    </div>

                    <div id="medStudent" class="extraInfo" style="display:none;">
                        @include('mco.form.medStudent')
                    </div>

                    <h3 class="page-header"><i class="fa fa-fw fa-graduation-cap"></i> بيانات التطوع</h3>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="vol_id">نوع التطوع</label><br />
                            <?php $vols = App\VolType::orderBy('name','ASC')->pluck('name','id'); ?>
                            {{ Form::select('vol_id', $vols,'',['class'=>'form-control']) }}
                            <small id="emailHelp" class="form-text text-muted">
                                <strong>تطوع في مكاتب المنظمة :</strong> و هو تطوع لفترة زمنية طويلة ضمن أحد المكاتب التنفيذية او الفرعية للمنظمة <br/>
                                <strong>تطوع للمشاركة في المشاريع و البرامج :</strong> و هو تطوع لبرنامج واحد أو أكثر من أنشطة المنظمة وفقا لاهتمامات المتطوع.
                            </small>
                        </div>
                        <div class="col-md-6">
                            <label for="activity_id">نوعية النشاط الذي ترغب في التطوع فيه؟</label><br />
                            <?php $activities = App\ActivityType::orderBy('name','ASC')->get(); ?>
                            @foreach($activities as $activity)
                                <div class="col-md-6">
                                    {{ Form::checkbox('activity_id[]', $activity->id,'') }} {{$activity->name}} <br />
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <hr />
                    <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
		</div>
	</div>
</div>
@stop

@section('scripts')
    <script language="javascript">
        $(document).ready( function(){
            
            function selectExtraInfo(){
                var ruGrad = $('input[type="radio"][name="ruGrad"]:checked').val();
                var ruMed = $('input[type="radio"][name="ruMed"]:checked').val();

                if(ruGrad == 1 && ruMed == 1){
                    $.get('form/medStudent', function(data){
                        $('#medGraduate,#nonMedStudent,#nonMedGraduate').css('display','none');
                        $('#medStudent').show();
                    });
                }
                if(ruGrad == 2 && ruMed == 1){
                    $.get('form/medGraduate', function(data){
                        $('#medStudent,#nonMedStudent,#nonMedGraduate').css('display','none');
                        $('#medGraduate').show();
                    });
                }
                if(ruGrad == 1 && ruMed == 2){
                    $.get('form/nonMedStudent', function(data){
                        $('#medStudent,#medGraduate,#nonMedGraduate').css('display','none');
                        $('#nonMedStudent').show();
                    });
                }
                if(ruGrad == 2 && ruMed == 2){
                    $.get('form/nonMedGraduate', function(data){
                        $('#medStudent,#medGraduate,#nonMedStudent').css('display','none');
                        $('#nonMedGraduate').show();
                    });
                }

            }

            var ruGrad = $('input[type="radio"][name="ruGrad"]:checked').val();
            var ruMed = $('input[type="radio"][name="ruMed"]:checked').val();

            selectExtraInfo();

            $('.ruMed, .ruGrad').on('change', function(){
                //e.preventDefault();
                selectExtraInfo();               
            });

        });
    </script>
@stop