@extends('userAccount.layouts.beyond')

@section('breadcrumb')
		<li>
			<i class="fa fa-home"></i>
			<a href="#">@lang('site.home')</a>
		</li>
		<li class="active">طلب استخراج شهادات البرامج والمناشط</li>
@endsection

@section('header-title')
    طلب استخراج شهادات البرامج والمناشط
@endsection

@section('content')


<!-- BOXES -->
<div class="row">
	
	<div class="col-md-12 col-sm-12">
        <div class="alert alert-success mb-30">            
            <h4> <i class="fa fa-fw fa-spin fa-spinner" aria-hidden="true"></i> <strong>ترقبوا قريبا !</strong></h4>
            <p>
                <strong> يمكنك </strong> يمكنك طلب استخراج شهادة منشط أو برنامج أونلاين.
            </p>
        </div>
    </div>

</div>
<!-- /BOXES -->

@stop