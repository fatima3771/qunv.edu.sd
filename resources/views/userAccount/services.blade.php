@extends('userAccount.layouts.beyond')

@section('breadcrumb')
	<li>
		<i class="fa fa-home"></i>
		<a href="{{ request()->root() }}">@lang('site.home')</a>
	</li>
	<li>
		<a href="{{ request()->root() }}/userAccount">@lang('site.myAccount')</a>
	</li>
	<li class="active">@lang('site.myServices')</li>
@endsection

@section('header-title')
	خدماتي
	<small>
		<i class="fa fa-fw fa-angle-left"></i>
		قائمة الخدمات 
	</small>
@endsection

@section('row-title')
  <h3>
    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> @lang('site.myServices')
  </h3>
@endsection

@section('content')
<div class="panel panel-default">
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<div class="">
					<div class="header bordered-pink">
						<a href="services/add" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> أضف خدمة</a>
					</div>				
					@if($services->count() != 0)
						{{ auth()->guard()->user()->myServices()->orderBy('id','DESC')->paginate(10)->links() }}
						<table class="table table-bordered table-striped table-condensed flip-content">
							<thead class="flip-content bordered-palegreen">
								<tr>
									<th>م</th>
									<th>اسم الخدمة</th>
									<th>السعر</th>
									<th>فترة الانجاز</th>
								</tr>
							</thead>
							<tbody>
								@foreach(auth()->guard()->user()->myServices()->orderBy('id','DESC')->paginate(10) as $service)
									<tr>
										<td>{{ $service->id }}</td>
										<td><a href="{{ $service->getUrl('forUser') }}">{{ $service->name }}</a></td>
										<td>{{ $service->price }}</td>
										<td>{{ $service->period->name }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						{{ auth()->guard()->user()->myServices()->orderBy('id','DESC')->paginate(10)->links() }}
						<div class="footer">
							<i class="fa fa-smile-o" aria-hidden="true"></i> نتمنى لك حظاً موفقاً في إنجاز طلبات العملاء
						</div>
					@else
					<div class="well" style="min-height: 400px;">
						<div class="row">
							<div class="alert alert-warning fade in">
								<i class="fa-fw fa fa-warning"></i>
								<strong>عفواً،</strong> لا يوجد لديك خدمات معروضة حالياً.
							</div>
							<a href="{{ request()->root() }}/userAccount/services/add" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> إضافة خدمة جديدة</a>
						</div>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
