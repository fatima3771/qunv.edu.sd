@extends('userAccount.layouts.beyond')

@section('breadcrumb')
		<li>
			<i class="fa fa-home"></i>
			<a href="#">@lang('site.home')</a>
		</li>
		<li class="active">حسابي</li>
@endsection

@section('header-title')
	حسابي
@endsection

@section('content')


<!-- BOXES -->
<div class="row">
	@if(auth()->guard('user')->user()->isActiveMembership())
		<div class="col-md-12 col-sm-12">
			<div class="alert alert-success mb-30">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				
				<h4> <i class="fa fa-fw fa-check-square-o" aria-hidden="true"></i> <strong>العضوية نشطة !</strong></h4>
			
				<p>
					<strong> تهانينا، </strong> عضويتك نشطة، يمكنك التمتع بكافة خدمات الأعضاء، مرحبا بك دائماً وأبداً في الشبكة السودانية للعلاج الطبيعي. 
				</p>
			
			</div>
		</div>
	@endif

	@if(auth()->guard('user')->user()->isExpiredMembership())
		<div class="col-md-12 col-sm-12">
			<div class="alert alert-danger mb-30">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				
				<h4><i class="fa fa-fw fa-calendar-times-o" aria-hidden="true"></i> <strong>انتهت العضوية !</strong></h4>
			
				<p>
					<strong> عفواً، </strong> لقد انتهى اشتراكك بتاريخ {{ auth()->guard('user')->user()->getMembershipEndDate() }}، يرجى تجديد اشتراكك لمواصلة التمتع بخدمات الأعضاء.
				</p>	
			
				<a href="{{ request()->root() }}/userAccount/payment" class="btn btn-sm btn-danger margin-top-10">طلب أو تجديد العضوية</a>
			</div>
		</div>
	@endif

	@if(auth()->guard('user')->user()->isMember() && auth()->guard('user')->user()->memberships->count() == 0 && auth()->guard('user')->user()->confirmed != 1)
		<div class="col-md-12 col-sm-12">
			<div class="alert alert-success mb-30">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				
				<h4> <i class="fa fa-fw fa-thumbs-o-up" aria-hidden="true"></i> <strong>شكرا لك !</strong></h4>
			
				<p>
					<strong> نشكرك، </strong> لطلبك عضوية الشبكة السودانية للعلاج الطبيعي، سوف يتم التواصل معك من إدارة الشبكة خلال 72 ساعة، لتأكيد طلب العضوية.
				</p>
			
			</div>
		</div>
	@endif

	@if(auth()->guard('user')->user()->isMember() && auth()->guard('user')->user()->memberships->count() == 0 && auth()->guard('user')->user()->confirmed == 1)
		<div class="col-md-12 col-sm-12">
			<div class="alert alert-warning mb-30">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				
				<h4><strong> <i class="fa fa-fw fa-check-circle-o" aria-hidden="true"></i> تم التأكيد على صحة البيانات !</strong></h4>
			
				<p>
					<strong> مرحبا بك، </strong> لقد تم التأكيد على بياناتك، يمكنك الآن اختيار نوع العضوية والدفع إلكترونياً وسوف يتم تفعيل العضوية إلكترونياً في الحال. 
				</p>
			
				<a href="{{ request()->root() }}/userAccount/payment" class="btn btn-sm btn-danger margin-top-10">طلب أو تجديد العضوية</a>
			</div>
		</div>
	@endif
		

	<div class="col-md-3 col-sm-3 col-lg-3">
		<section class="panel">
			<div class="panel-body noradius padding-10">

				<figure class="margin-bottom-10"><!-- image -->
					@if(isset(auth()->guard('user')->user()->picture))
						<img class="img-responsive" src="{{ auth()->guard('user')->user()->getPicture() }}" alt="" />
					@else
						<img class="img-responsive" alt="" src="{{ request()->root() }}/public/assets/images/user.png" /> 
					@endif
				</figure><!-- /image -->

				<!-- progress bar -->
				<h4>{{ auth()->guard('user')->user()->name }} </h4>
				
					<table class="table">
						<tr>
							<th>حالة العضوية</th>
							<td>
								@if(auth()->guard('user')->user()->isActiveMembership()) <span class="label label-success badge-square"> <i class="fa fa-check" aria-hidden="true"></i> نشطة </span> @endif
								@if(auth()->guard('user')->user()->isExpiredMembership()) <span class="label label-danger"> <i class="fa fa-ban" aria-hidden="true"></i> منتهية </span> @endif
							</td>
						</tr>
						<tr>
							<th>تاريخ انتهاء العضوية</th>
							<td>{{ auth()->guard('user')->user()->getMembershipEndDate() }}</td>
						</tr>
					</table>

				<hr class="half-margins" />

			</div>
		</section>
	</div>

	<div class="col-md-9 col-sm-9 col-lg-9">
		@if(auth()->guard('user')->user()->isActiveMembership())
			<div class="col-md-6 col-sm-6 col-lg-6">
				<div class="box success"><!-- default, danger, warning, info, success -->
					<div class="box-title"><!-- add .noborder class if box-body is removed -->
						<h4>العضوية نشطة</h4>
						<span class="block">تنتهي في: {{ auth()->guard('user')->user()->getMembershipEndDate() }}</span>
						<i class="fa fa-check-square-o" aria-hidden="true"></i>
					</div>
				</div>
			</div>
		@endif
		@if(auth()->guard('user')->user()->isExpiredMembership())
			<div class="col-md-6 col-sm-6 col-lg-6">
				<div class="box danger"><!-- default, danger, warning, info, success -->
					<div class="box-title"><!-- add .noborder class if box-body is removed -->
						<h4>انتهت فترة الاشتراك بالعضوية</h4>
						<span class="block">انتهت في: {{ auth()->guard('user')->user()->getMembershipEndDate() }}</span>
						<i class="fa fa-calendar-times-o" aria-hidden="true"></i>
					</div>
				</div>
			</div>
		@endif

		<div class="col-md-6 col-sm-6 col-lg-6">
			<div class="box info"><!-- default, danger, warning, info, success -->
				<div class="box-title"><!-- add .noborder class if box-body is removed -->
					<h4><a href="#">{{ auth()->guard('user')->user()->name }}</a></h4>
					@if(auth()->guard('user')->user()->isMember())
						<span class="block">رقم العضوية: {{ auth()->guard('user')->user()->membership_id }}</span>
					@else
						<span>نوع الاشتراك: اشتراك للفعاليات</span>
					@endif
					<i class="fa fa-user" aria-hidden="true"></i>
				</div>
			</div>
		</div>
	</div>

	

</div>
<!-- /BOXES -->

@stop