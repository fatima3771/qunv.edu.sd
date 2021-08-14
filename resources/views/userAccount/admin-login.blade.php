@extends('userAccount.layouts.master')

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
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">تسجيل دخول الإدارة</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">البريد الإلكتروني</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">كلمة المرور</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> تذكرني
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    تسجيل الدخول
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    نسيت كلمة المرور?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection