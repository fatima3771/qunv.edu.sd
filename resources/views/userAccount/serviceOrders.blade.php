@extends('userAccount.layouts.beyond')

@section('content')
	<h3 class="page-header text-danger">
		<i class="fa fa-fw fa-list" aria-hidden="true"></i> خدماتي : <span dir='ltr'>[#{{ $service->id }}]</span> {{ $service->name }}
	</h3>
    <h4 class="page-header"><i class="fa fa-fw fa-list"></i> قائمة بالطلبات الجديدة لهذه الخدمة</h4>
	<section>
    @if($orders->count() != 0)
		<table class="table table-striped table-condensed table-hover">
			<thead> 
				<tr>
					<th>رقم الطلب</th>
					<th>التاريخ</th>
					<th>اسم المستخدم</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($orders as $order)
					<tr>
						<td>#{{ $order->id }}</td>
						<td>{{ $order->created_at }}</td>
						<td>{{ $order->applicant->name }}</td>
						<td>{{ $order->created_at }}</td>
						<td><button href="" class="btn btn-primary btn-sm accept-btn" data-order-id="{{ $order->id }}"> قبول الطلب </button></td>
					</tr>
					<tr>
						<td colspan="4">
							Comments and Details
						</td>
						<td></td>
					</tr>
				@endforeach
			</tbody>
		</table>
    @else
        <div class="alert alert-warning col-md-6 col-md-offset-3">
            <div class="col-md-6 col-sm-4">
                <img src="{{ request()->root() }}/assets/crew/images/no-records1.png" class="img-responsive" />
            </div>
            <div class="col-md-6 col-sm-8" style="text-align:center;">
                <h4 style="line-height:2em;">عفوا، لا يوجد أي خدمات مطروحة من قبلك حالياً</h4>
        </div>
        </div>
    @endif
	</section>
@endsection

@section("scripts")
	<script>
		$('.accept-btn').on('click', function(e){
				e.preventDefault();
				if(confirm('Are you sure you want to Accept this order ?')){
					var orderId = $(this).data('order-id');
					var status = 2;
					$.ajax({
						type: "POST",
						url: "{{ request()->root() }}/orderStatus/change",
						data: {
							"_token": "{{ csrf_token() }}",
							"orderId": orderId,
							"status": status
						},
						success: function( data ) {
							alert(data);
						}
					});
				}else{
					return false;
				}
			}
		)
	</script>
@endsection