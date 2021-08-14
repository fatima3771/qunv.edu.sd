@extends('userAccount.layouts.beyond')

@section('breadcrumb')
		<li>
			<i class="fa fa-home"></i>
			<a href="#">@lang('site.home')</a>
		</li>
		<li class="active">بطاقة واصل - Connect</li>
@endsection

@section('header-title')
	بطاقة واصل - Connect
@endsection

@section('content')


<!-- BOXES -->
<div class="row">
	
	<div class="col-md-12 col-sm-12">
        <div class="alert alert-success mb-30">            
            <h4> <i class="fa fa-fw fa-spin fa-spinner" aria-hidden="true"></i> <strong>ترقبوا قريبا !</strong></h4>
            <p>
                <strong> يمكنكم </strong> طلب بطاقة واصل التي تقدم لكم تواصل مفتوح مع جميع أعضاء الشبكة.
            </p>
        </div>
    </div>

</div>
<!-- /BOXES -->

@stop