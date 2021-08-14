@extends('site.layouts.master')

@section('content')

        <!-- **Main - Starts** --> 
		<div id="main">
        	<div class="parallax full-width-bg">
            	<div class="container">
                	<div class="main-title">
                    	<h1>Blog</h1>
                        <div class="breadcrumb">
                            <a href="index.html">Home</a>
                            <span class="fa fa-angle-right"></span>
                            <a href="index.html">Blog</a>
                            <span class="fa fa-angle-right"></span>
                            <span class="current">Fullwidth</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dt-sc-margin100"></div>   
            <div class="container">
                <div class="col-md-8 col-sm-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">تسجيل دخول المتطوعين</div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('userAccount.login') }}">
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
                                    <label for="password" class="col-md-4 control-label"> كلمة المرور</label>

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
                <div class="col-md-4 col-sm-4">
                    <p>
                        أو يمكنك الدخول باستخدام حساب وسائط التواصل الاجتماعي، من هنا: 
                    </p>
                    <p>
                        <button style="letter-spacing:0px;" onClick="window.open('register/facebook','_self');" class="btn btn-lg btn-primary form-control">
                            <i class="icon-facebook"></i> فيسبوك
                        </button>
                    </p>
                </div>
            </div>



        </div>
@endsection
