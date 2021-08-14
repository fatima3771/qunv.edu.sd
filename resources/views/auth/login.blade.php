@extends('site.layouts.master')

@section('content')

<section class="page-header dark page-header-xs">
	<div class="container">

		<h1>@lang('site.login')</h1>

		<!-- breadcrumbs -->
		<ol class="breadcrumb">
			<li class="home"><i class="fa fa-home"></i> <a href="{{ request()->root() }}/">@lang('site.home')</a></li>
			<li>@lang('site.login')</li>
		</ol><!-- /breadcrumbs -->

	</div>
</section>

<section>
    <div class="container">
        <div class="row">
            <!-- LOGIN -->
            <div class="col-md-6 col-sm-6 offset-md-3">
                <!-- ALERT -->
                @if(session::get('errorLogin'))
                    <div class="alert alert-mini alert-danger mb-30">
                        <strong>خطأ!</strong> بيانات الدخول غير صحيحة، يرجى إدخال البيانات الصحيحة!
                    </div>
                @endif
                <!-- /ALERT -->

                <!-- register form -->
                <form class="m-0 sky-form boxed" action="{{ route('login') }}" method="post" data-success="Sent! Thank you!" data-toastr-position="top-right">
                    {{ csrf_field() }}
                    
                    <fieldset class="m-0">					
                        <header>
                            <i class="fa fa-users"></i> البيانات الشخصية
                            {{-- {!! $errors->first('name', '<label class="label label-danger">:message</label><br>') !!} --}}
                        </header>
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
                                <i class="ico-append fa fa-lock"></i>
                                <input class="{{ $errors->first('password', 'error') }}" type="password" name="password" placeholder="@lang('site.password')">
                                <b class="tooltip tooltip-bottom-right">يرجى إدخال كلمة مرور باللغة الإنجليزية</b>
                                @if ($errors->has('password'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </label>

                            <div class="mt-30">
                                <label class="checkbox m-0">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><i></i>
                                    <span class="{{ $errors->first('confirmRegulations', 'text-danger') }}">تذكرني.</span>
                                </label>
                            </div>
                    </fieldset>

                    <div class="row mb-20">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> التسجيل للعضوية </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                نسيت كلمة المرور؟
                            </a>

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
