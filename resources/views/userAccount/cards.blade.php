@extends('userAccount.layouts.beyond')

@section('breadcrumb')
		<li>
			<i class="fa fa-home"></i>
			<a href="#">@lang('site.home')</a>
		</li>
		<li class="active">بطاقة العضوية</li>
@endsection

@section('header-title')
	بطاقة العضوية
@endsection

@section('content')


<!-- BOXES -->
<div class="row">
	
	<div class="col-md-12 col-sm-12">
        <div class="alert alert-success mb-30">            
            <h4> <i class="fa fa-fw fa-spin fa-spinner" aria-hidden="true"></i> <strong>ترقبوا قريبا !</strong></h4>
            <p>
                <strong> يمكنكم </strong> طلب بطاقة العضوية إلكترونياً، كما يمكنكم استخدام بطاقة الإشتراك الإلكترونية من هاتفك المحمول.
            </p>
        </div>
    </div>

</div>
<!-- /BOXES -->

@stop