@extends('site.layouts.master')

@section('content')


<section class="page-header dark page-header-xs">
	<div class="container">

		<h1>التسجيل للعضوية - طلاب</h1>

		<!-- breadcrumbs -->
		<ol class="breadcrumb">
			<li class="home"><i class="fa fa-home"></i> <a href="{{ route('home', [app()->getLocale()]) }}">@lang('site.home')</a></li>
			<li><a>التسجيل للعضوية</a></li>
			<li>طلاب</li>
		</ol><!-- /breadcrumbs -->

	</div>
</section>

<section>
    <div class="container">
        
        <div class="row">

            <div class="col-md-6 col-sm-6">
                <h3>أحكام عامة و شروط الاشتراك في العضوية : </h3>
                <ol>
                    <li> أن يكون العضو ضمن تخصص العلاج الطبيعي في حال العضوية العادية أو عضوية الطلاب . </li>
                    <li> أن يتم الموافقة على طلب العضوية من قبل ادارة الشبكة . </li>
                    <li> سداد الرسوم المقررة للعضوية وفقا لما تحدده لائحة السداد ولائحة الاسترداد . </li>
                    <li> يحق للعضو التمتع بامتيازات العضوية التي تحددها الشبكة وفقا لفئة عضويته و خلال فترة تسجيله و يحق للشبكة ايقاف او تعليق او تجميد العضوية او الامتيازات لأي عضو بشكل مؤقت أو دائم  وفقا لما تقتضيه ادارة الشبكة ودون أي التزام مالي أو قانوني من الشبكة . </li>
                    <li> يحق للعضو كتابة عضوية الشبكة ضمن السيرة الذاتية . </li>
                    <li> لا يحق للعضو التصريح أو اتخاذ أي اجراء باسم الشبكة . </li>
                    <li> لادارة الشبكة الحق في قبول او رفض طلبات العضوية ، و في حال الرفض تكون رسوم العضوية مستردة وفقا لسياسة الاسترداد . </li>
                    <li> لادارة الشبكة الحق في التعديل في امتيازات الاعضاء متى ما رأت ذلك مناسبا أو لأي ظروف طارئة . </li>
                    <li> يلتزم العضو بكل ما يصدر عن ادارة الشبكة من لوائح و نظم و قوانين ، و في حال مخالفتها يحق لادارة الشبكة اتخاذ أي اجراءات تراها مناسبة  . </li>
                    <li> يحق للعضو المشاركة في برامج الشبكة وفق الشروط المحددة و الفرص المحددة و الالتزامات المحددة لكل برنامج على حدى . </li>
                    <li> يحق لادارة الشبكة اتخاذ كافة الاجراءات و القرارات التي تحقق تطوير الشبكة و فائدة عضويتها . </li>
                    <li> يحق لادارة الشبكة تعديل رسوم العضوية ، و الزام الاعضاء بسداد التعديل متى ما رأت ذلك مناسبا ووفقا لمقتضيات الظروف ، و في حال مخالفة العضو يحق لادارة الشبكة اتخاذ أي اجراء تجاهه . </li>
                    <li> يلتزم المشترك / العضو بالاستفادة من الامتيازات الممنوحة له بشكل شخصي فقط و لا يحق له منحها أو تحويلها أو اهدائها لأي شخص . </li>
                </ol>
                <hr>
                <h3>لائحة السداد و الاسترداد ( العضوية ) </h3>
                <ol>
                    <li>يلزم العضو بسداد رسوم العضوية المقررة وفقا لنوع العضوية . </li>
                    <li>يحق للعضو استرداد كافة الرسوم ناقصا رسوم الاجراءات الادارية (20% من الرسوم ) في حال رفض عضويته من ادارة الشبكة فقط . </li>
                    <li>لا يوجد أي استرداد للرسوم للعضوية المجمدة أو الملغية من قبل ادارة الشبكة . </li>
                    <li>يحصل العضو على ايصال مالي الكتروني .  </li>
                </ol>

            </div>


            <!-- LOGIN -->
            <div class="col-md-6 col-sm-6">
                <h3>التسجيل للعضوية - طلاب</h3>
                <!-- ALERT -->
                <!--
                <div class="alert alert-mini alert-danger mb-30">
                    <strong>Oh snap!</strong> Login Incorrect!
                </div>
                -->
                <!-- /ALERT -->

                <!-- register form -->
                <form class="m-0 sky-form boxed1" action="{{ route('membership.students.registration') }}" method="post" data-success="Sent! Thank you!" data-toastr-position="top-right">
                    {{ csrf_field() }}
                    
                    <fieldset class="m-0">					
                        <header>
                            <i class="fa fa-users"></i> البيانات الشخصية
                            {{-- {!! $errors->first('name', '<label class="label label-danger">:message</label><br>') !!} --}}
                        </header>
                            <label class="input mb-10 {{ $errors->first('name', 'error') }}">
                                <input class="{{ $errors->first('name', 'error') }}" type="text" name="name" placeholder="الاسم باللغة العربية ( رباعي )" value="{{ old('name') }}">
                                <b class="tooltip tooltip-bottom-right">يرجى إدخال الاسم بالعربي ( رباعي )</b>
                                @if ($errors->has('name'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </label>
                        
                            <label class="input mb-10">
                                <input class="{{ $errors->first('nameEn', 'error') }}" type="text" name="nameEn" placeholder="الاسم باللغة الإنجليزية ( رباعي )" value="{{ old('nameEn') }}">
                                <b class="tooltip tooltip-bottom-right">يرجى إدخال الاسم باللغة الإنجليزية ( رباعي )</b>
                                @if ($errors->has('nameEn'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('nameEn') }}</strong>
                                    </span>
                                @endif
                            </label>
                        
                            <label class="input mb-10">
                                <i class="ico-append fa fa-envelope"></i>
                                <input class="{{ $errors->first('email', 'error') }}" type="text" name="email" placeholder="@lang('site.email')" value="{{ old('email') }}">
                                <b class="tooltip tooltip-bottom-right">يرجى إدخال البريد الإلكتروني</b>
                                @if ($errors->has('email'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </label>
                        
                            <label class="input mb-10">
                                <i class="ico-append fa fa-envelope"></i>
                                <input class="{{ $errors->first('email', 'error') }}" type="text" name="email-confirm" placeholder="@lang('site.email-confirm')" value="{{ old('email-confirm') }}">
                                <b class="tooltip tooltip-bottom-right">يرجى إدخال البريد الإلكتروني مرة أخرى للتأكيد</b>
                                @if ($errors->has('email-confirm'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('email-confirm') }}</strong>
                                    </span>
                                @endif
                            </label>
                        
                            <label class="input mb-10">
                                <i class="ico-append fa fa-lock"></i>
                                <input class="{{ $errors->first('password', 'error') }}" type="password" name="password" placeholder="@lang('site.password')">
                                <b class="tooltip tooltip-bottom-right">يرجى إدخال كلمة المرور - باللغة الإنجليزية</b>
                                @if ($errors->has('password'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </label>
                        
                            <label class="input mb-10">
                                <i class="ico-append fa fa-lock"></i>
                                <input class="{{ $errors->first('password', 'error') }}" type="password" name="password-confirm" placeholder="@lang('site.password-confirm')">
                                <b class="tooltip tooltip-bottom-right">يرجى إعادة إدخال كلمة المرور</b>
                                @if ($errors->has('password-confirm'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('password-confirm') }}</strong>
                                    </span>
                                @endif
                            </label>
                        
                            <hr />

                            <label class="select mb-10 mt-20">
                                <select class="{{ $errors->first('gender', 'error') }}" name="gender">
                                    <option value="0" selected disabled>النوع</option>
                                    <option value="1" {{ old('gender')==1? 'selected' : '' }}>ذكر</option>
                                    <option value="2" {{ old('gender')==2? 'selected' : '' }}>أنثى</option>
                                </select>
                                <i></i>
                            </label>

                            <label class="input mb-10">
                                <i class="ico-append fa fa-calendar"></i>
                                <input class="{{ $errors->first('DOB', 'error') }}" type="date" name="DOB" data-format="9999-99-99" data-placeholder="_" placeholder="@lang('site.DOB')" value="{{ old('DOB') }}">
                                <b class="tooltip tooltip-bottom-right">يرجى إدخال كلمة مرور باللغة الإنجليزية</b>
                                @if ($errors->has('DOB'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('DOB') }}</strong>
                                    </span>
                                @endif
                            </label>
                        
                            <label class="input mb-10">
                                <i class="ico-append fa fa-phone"></i>
                                <input style="direction: ltr;" class="masked {{ $errors->first('phone_no', 'error') }}" type="text" name="phone_no" data-format="+999 9999 99999" data-placeholder="X" placeholder="@lang('site.phone_no')" value="{{ old('phone_no') }}">
                                <b class="tooltip tooltip-bottom-right">يرجى إدخال كلمة مرور باللغة الإنجليزية</b>
                                @if ($errors->has('phone_no'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('phone_no') }}</strong>
                                    </span>
                                @endif
                            </label>
                        
                            <label class="input mb-10">
                                <i class="ico-append fa fa-whatsapp"></i>
                                <input style="direction: ltr;" class="masked {{ $errors->first('whatsapp_no', 'error') }}" type="text" name="whatsapp_no" data-format="+999 9999 99999" data-placeholder="X" placeholder="@lang('site.whatsapp_no')" value="{{ old('whatsapp_no') }}">
                                <b class="tooltip tooltip-bottom-right">يرجى إدخال كلمة مرور باللغة الإنجليزية</b>
                                @if ($errors->has('whatsapp_no'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('whatsapp_no') }}</strong>
                                    </span>
                                @endif
                            </label>
                        
                            <label class="input mb-10">
                                <i class="ico-append fa fa-address-card"></i>
                                <input class="{{ $errors->first('national_no', 'error') }}" type="text" name="national_no" placeholder="@lang('site.national_no')" value="{{ old('national_no') }}">
                                <b class="tooltip tooltip-bottom-right">يرجى إدخال كلمة مرور باللغة الإنجليزية</b>
                                @if ($errors->has('national_no'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('national_no') }}</strong>
                                    </span>
                                @endif
                            </label>
                        
                            <label class="input mb-10">
                                <i class="ico-append fa fa-home"></i>
                                <input class="{{ $errors->first('address', 'error') }}" type="text" name="address" placeholder="@lang('site.address')" value="{{ old('address') }}">
                                <b class="tooltip tooltip-bottom-right">يرجى إدخال كلمة مرور باللغة الإنجليزية</b>
                                @if ($errors->has('address'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </label>

                            <hr />
                            <header>
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i> البيانات الأكاديمية
                            </header>

                            <label class="select mb-10 mt-20">
                                <select class="{{ $errors->first('academic_degree_id', 'error') }}" name="academic_degree_id">
                                    <option value="0" selected disabled>الدرجة العلمية</option>
                                    @foreach (App\AcademicDegree::whereIn('id',[1,2])->get() as $degree)
                                        <option value="{{ $degree->id }}" {{ old('academic_degree_id')==$degree->id? 'selected' : '' }}>{{ $degree->title }}</option>
                                    @endforeach
                                </select>
                                <i></i>
                            </label>

                            <label class="select mb-10 mt-20">
                                <select class="{{ $errors->first('university_id', 'error') }}" name="university_id" id="university_id">
                                    <option value="0" selected disabled>الجامعة</option>
                                    @foreach (App\University::get() as $university)
                                        <option value="{{ $university->id }}" {{ old('university_id')==$university->id? 'selected' : '' }}>{{ $university->title }}</option>
                                    @endforeach
                                    <option value="other">أخرى</option>
                                </select>
                                <i></i>
                            </label>

                            <label class="input mb-10" id="other_university" @if(old('university_id') != 'other')) style="display: none" @endif>
                                <i class="ico-append fa fa-address-card"></i>
                                <input class="{{ $errors->first('other_university', 'error') }}" type="text" name="other_university" placeholder="@lang('site.other_university')" value="{{ old('other_university') }}">
                                @if ($errors->has('other_university'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('other_university') }}</strong>
                                    </span>
                                @endif
                            </label>

                            <label class="select mb-10 mt-20">
                                <select class="{{ $errors->first('level', 'error') }}" name="level">
                                    <option value="0" selected disabled>المستوى الحالي</option>
                                    <option value="1" {{ old('level')==1? 'selected' : '' }}>الأول</option>
                                    <option value="2" {{ old('level')==2? 'selected' : '' }}>الثاني</option>
                                    <option value="3" {{ old('level')==3? 'selected' : '' }}>الثالث</option>
                                    <option value="4" {{ old('level')==4? 'selected' : '' }}>الرابع</option>
                                    <option value="5" {{ old('level')==5? 'selected' : '' }}>الخامس</option>
                                    <option value="6" {{ old('level')==6? 'selected' : '' }}>السادس</option>
                                </select>
                                <i></i>
                            </label>

                            {{-- <label class="select mb-10 mt-20">
                                <select class="{{ $errors->first('membershipType', 'error') }}" name="membershipType">
                                    <option value="0" selected disabled>نوع العضوية</option>
                                    @foreach (App\MembershipType::get() as $membershipType)
                                        <option value="{{ $membershipType->id }}"  {{ old('level')? 'selected' : '' }}>{{ $membershipType->title }}</option>
                                    @endforeach
                                </select>
                                <i></i>
                            </label> --}}

                            <div class="mt-30">
                                <label class="checkbox m-0">
                                    <input class="checked-agree" type="checkbox" name="confirmRegulations"><i></i>
                                    <span class="{{ $errors->first('confirmRegulations', 'text-danger') }}">أوافق على شروط الإشتراك والعضوية وكل ما يترتب عليها من أحكام.</span>
                                </label>
                                <label class="checkbox m-0">
                                    <input type="checkbox" name="confirmCorrectData"><i></i>
                                    <span class="{{ $errors->first('confirmCorrectData', 'text-danger') }}">كل البيانات أعلاه صحيحة وأتحمل كافة المسئولية القانونية عنها.</span>
                                </label>
                            </div>
                            <hr >
                            <label class="checkbox m-0">
                                <span> يرجى اختيار الآتي للتأكد من أنك لست روبوت </span>
                            </label>
                            @if(env('GOOGLE_RECAPTCHA_KEY'))
                                <div class="g-recaptcha"
                                    data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
                                </div>
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                            @endif
                    </fieldset>

                    <div class="row mb-20">
                        <div class="col-md-12">
                            <input type="hidden" name="is_graduate" value="0"></div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> التسجيل للعضوية </button>
                        </div>
                    </div>

                </form>
                <!-- /register form -->

            </div>
            <!-- /LOGIN -->

        </div>

        
    </div>
</section>

@endsection
@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        $('#university_id').on('change', function(){
            if($(this).val() == 'other'){
                $('#other_university').show();
            }
        })
    </script>
@endsection