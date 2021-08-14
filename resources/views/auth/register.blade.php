@extends('site.layouts.master')

@section('content')


<section class="page-header dark page-header-xs">
	<div class="container">

		<h1>@lang('site.register')</h1>

		<!-- breadcrumbs -->
		<ol class="breadcrumb">
			<li class="home"><i class="fa fa-home"></i> <a href="{{ request()->root() }}/">@lang('site.home')</a></li>
			<li><a href="{{ request()->root() }}/news">@lang('site.aboutUs')</a></li>
			<li>@lang('site.register')</li>
		</ol><!-- /breadcrumbs -->

	</div>
</section>

<section>
    <div class="container">
        
        <div class="row">

            <!-- LOGIN -->
            <div class="col-md-6 col-sm-6">

                <!-- ALERT -->
                <!--
                <div class="alert alert-mini alert-danger mb-30">
                    <strong>Oh snap!</strong> Login Incorrect!
                </div>
                -->
                <!-- /ALERT -->

                <!-- register form -->
                <form class="m-0 sky-form boxed" action="#" method="post">
                    <header>
                        <i class="fa fa-users"></i> Register
                        </header>

                    <fieldset class="m-0">					
                        <label class="input mb-10">
                            <i class="ico-append fa fa-envelope"></i>
                            <input type="text" placeholder="Email address">
                            <b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </label>
                    
                        <label class="input mb-10">
                            <i class="ico-append fa fa-lock"></i>
                            <input type="password" placeholder="Password">
                            <b class="tooltip tooltip-bottom-right">Only latin characters and numbers</b>
                        </label>
                    
                        <label class="input mb-10">
                            <i class="ico-append fa fa-lock"></i>
                            <input type="password" placeholder="Confirm password">
                            <b class="tooltip tooltip-bottom-right">Only latin characters and numbers</b>
                        </label>

                        <div class="row mb-10">
                            <div class="col-md-6">
                                <label class="input">
                                    <input type="text" placeholder="First name">
                                </label>
                            </div>
                            <div class="col col-md-6">
                                <label class="input">
                                    <input type="text" placeholder="Last name">
                                </label>
                            </div>
                        </div>

                        <label class="select mb-10 mt-20">
                            <select>
                                <option value="0" selected disabled>Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Other</option>
                            </select>
                            <i></i>
                        </label>
                        
                        <div class="mt-30">
                            <label class="checkbox m-0"><input class="checked-agree" type="checkbox" name="checkbox"><i></i>I agree to the <a href="#" data-toggle="modal" data-target="#termsModal">Terms of Service</a></label>
                            <label class="checkbox m-0"><input type="checkbox" name="checkbox"><i></i>I want to receive news and  special offers</label>
                        </div>
                    </fieldset>

                    <div class="row mb-20">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> REGISTER</button>
                        </div>
                    </div>

                </form>
                <!-- /register form -->

            </div>
            <!-- /LOGIN -->

            <!-- SOCIAL LOGIN -->
            <div class="col-md-6 col-sm-6">
                <form action="#" method="post" class="sky-form boxed">

                    <header class="fs-18 mb-20">
                        Register using your favourite social network
                    </header>
                    
                    <fieldset class="m-0">

                        <div class="row">
                        
                            <div class="col-md-8 offset-md-2">

                                <a class="btn btn-block btn-social btn-facebook mb-10">
                                    <i class="fa fa-facebook"></i> Sign up with Facebook
                                </a>

                                <a class="btn btn-block btn-social btn-twitter mb-10">
                                    <i class="fa fa-twitter"></i> Sign up with Twitter
                                </a>

                                <a class="btn btn-block btn-social btn-google mb-10">
                                    <i class="fa fa-google-plus"></i> Sign up with Google
                                </a>
                        
                            </div>
                        </div>

                    </fieldset>

                    <footer>
                        Already have an account? <a href="page-login-1.html"><strong>Back to login!</strong></a>
                    </footer>

                </form>

            </div>
            <!-- /SOCIAL LOGIN -->

        </div>

        
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
