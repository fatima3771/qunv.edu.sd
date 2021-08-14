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
	<section>
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
                        <td>{!! $order->getStatus() !!}</td><span class="label-">
						<td>
                            <a href="orders/{{ $order->id }}" class="btn btn-primary btn-sm"> <i class="fa fa-fw fa-eye" aria-hidden="true"></i></a>
						    <button href="" class="btn btn-success btn-sm accept-btn" data-order-id="{{ $order->id }}"> <i class="fa fa-fw fa-check" aria-hidden="true"></i> قبول </button>
                            <button href="" class="btn btn-danger btn-sm reject-btn" data-order-id="{{ $order->id }}"> <i class="fa fa-fw fa-times" aria-hidden="true"></i> رفض </button>
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
					<strong>عفواً،</strong> لا يوجد طلبات صادرة حالياً.
				</div>
			</div>
		</div>
    @endif
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