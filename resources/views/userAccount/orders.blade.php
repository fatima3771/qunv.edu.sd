@extends('userAccount.layouts.beyond')

@section('breadcrumb')
<li>
    <i class="fa fa-home"></i>
    <a href="{{ request()->root() }}/userAccount">حسابي</a>
</li>
<li class="active">
    طلبات العملاء
</li>
@endsection

@section('header-title')
    <i class="fa fa-fw fa-list" aria-hidden="true"></i> طلبات العملاء
@endsection

@section('row-title')
	<h6 class="row-title before-blue"><i class="typcn typcn-cog-outline darkorange"></i> طلبات العملاء <span class="badge badge-square badge-sky"> {{ $orders->count() }} </span></h6>
@endsection

@section('content')
	<section class="visible-lg visible-md">
    @if($orders->count() != 0)
		<table class="table table-striped table-condensed table-hover">
			<thead> 
				<tr>
					<th></th>
					<th>التاريخ</th>
					<th>اسم العميل</th>
					<th>الخدمة</th>
					<th>العدد</th>
					<th>السعر</th>
					<th>الحالة</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($orders as $order)
					<tr>
						<td>#{{ $order->id }}</td>
						<td>{{ $order->aprroved_date }}</td>
                        <td>{{ $order->customer->name }}</td>
						<td>{{ $order->service->name }}</td>
                        <td>{{ $order->count }}</td>
                        <td>{{ number_format($order->total) }}</td>
                        <td>{!! $order->getStatus() !!}</td>
						<td>
                            <a href="orders/{{ $order->id }}" class="btn btn-primary btn-sm"> <i class="fa fa-fw fa-eye" aria-hidden="true"></i></a>
                        </td>
					</tr>
				@endforeach
			</tbody>
		</table>
    @else
		<div class="well" style="min-height: 400px;">
			<div class="row">
				<div class="alert alert-warning fade in">
					<i class="fa-fw fa fa-warning"></i>
					<strong>عفواً،</strong> لا يوجد طلبات واردة حالياً.
				</div>
			</div>
		</div>
    @endif
	</section>
	<section class="visible-sm visible-xs">
		{{ auth()->guard('user')->user()->receivedOrders()->paginate(10)->links() }}
		@if($orders->count() != 0)
			@foreach(auth()->guard('user')->user()->receivedOrders()->orderBy('created_at','DESC')->paginate(10) as $order)
				<div class="panel panel-primary">
					<div class="panel-heading">
						<i class="fa fa-dot-circle-o" aria-hidden="true"></i> {{ $order->service->name }} <small> [ رقم الطلب: {{ $order->id }} ] </small>
					</div>
					<div class="panel-body">
							<div class="col-xs-8 col-sm-8">
								<table class="table">
									<tbody>
										<tr>
											<td scope="row" width="20%">الرقم</td>
											<td> {{ $order->id }} </td>
										</tr>
										<tr>
											<td scope="row">الحالة</td>
											<td> {!! $order->getStatus() !!} </td>
										</tr>
										<tr>
											<td scope="row">المبلغ</td>
											<td> {{ number_format($order->total) }} SDG </td>
										</tr>
									</tbody>
								</table>								
							</div>
							<div class="col-xs-4 col-sm-4">
								<a href="orders/{{ $order->id }}" class="btn btn-primary btn-sm"> <i class="fa fa-fw fa-eye" aria-hidden="true"></i> التفاصيل </a>
							</div>							
					</div>
				</div>
			@endforeach
		@endif
		{{ auth()->guard('user')->user()->receivedOrders()->paginate(10)->links() }}
	</section>
@endsection

@section("scripts")
	<script>
		$('.accept-btn').on('click', function(e){
				e.preventDefault();
				if(confirm('هل تريد حقاً قبول  الطلب ?')){
					var orderId = $(this).data('order-id');
					var status = 2;
					$.ajax({
						type: "POST",
						url: "{{ request()->root() }}/userAccount/orderStatus/change",
						data: {
							"_token": "{{ csrf_token() }}",
							"orderId": orderId,
							"status": status
						},
						success: function( data ) {
							window.open('{{ url()->current() }}','_self');
						}
					});
				}else{
					return false;
				}
			}
		)
		$('.reject-btn').on('click', function(e){
				e.preventDefault();
				if(confirm('هل تريد حقاً إلغاء الطلب ?')){
					var orderId = $(this).data('order-id');
					var status = 6;
					$.ajax({
						type: "POST",
						url: "{{ request()->root() }}/userAccount/orderStatus/change",
						data: {
							"_token": "{{ csrf_token() }}",
							"orderId": orderId,
							"status": status
						},
						success: function( data ) {
							window.open('{{ url()->current() }}','_self');
						}
					});
				}else{
					return false;
				}
			}
		)
	</script>
@endsection