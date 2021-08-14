@extends('userAccount.layouts.beyond')

@section('breadcrumb')
<li>
    <i class="fa fa-home"></i>
    <a href="{{ request()->root() }}/userAccount">حسابي</a>
</li>
<li>
    <a href="{{ request()->root() }}/userAccount/myOrders">طلباتي</a>
</li>
<li class="active">
    <span dir='ltr'>[#{{ $order->id }}]</span> {{ $service->name }}
</li>
@endsection

@section('header-title')
<i class="fa fa-fw fa-list" aria-hidden="true"></i> طلباتي : <span dir='ltr'>[#{{ $order->id }}]</span>
{{ $service->name }}
@endsection
<a href="services/add" class="btn btn-warning pull-right"><i class="fa fa-fw fa-plus"></i> أضف خدمة جديدة </a>

@section('row-title')
<h6 class="row-title before-blue"><i class="typcn typcn-th-small darkorange"></i> طلب رقم <span dir='ltr'>[#{{ $order->id }}]</span> {{ $service->name }} <span class="badge badge-square badge-sky"> {{ $service->user->name }} </span></h6>
@endsection

@section('content')

<div class="well">
    @if($service != null)
    <div class="row">
        <div class="col-md-3 col-sm-3 col-lg-3">
            
            <h4 class="alert alert-danger fade in">
                <i class="fa fa-fw fa-check-square"></i> <strong> {{ number_format($order->total) }} SDG</strong>
            </h4>
            
            @if( $order->order_status_id == 1 )
                <div style="text-align:center">
                    <button class="btn btn-success" id="accept-btn" data-order-id="{{ $order->id }}"><i class="fa fa-check" aria-hidden="true"></i> قبول الطلب </button>
                    <button class="btn btn-danger" id="reject-btn" data-order-id="{{ $order->id }}"><i class="fa fa-times" aria-hidden="true"></i> رفض الطلب </button>
                </div>
            @endif
    
            @if( $order->order_status_id == 2 )
                <div style="text-align:center">
                    <a href="{{ request()->root() }}/userAccount/workRoom/{{ $order->id }}" class="btn btn-success" data-order-id="{{ $order->id }}"><i class="fa fa-cogs" aria-hidden="true"></i> إذهب إلى غرفة العمل </a>
                </div>
            @endif
    
            <hr />

        </div>
        <div class="col-md-9 col-sm-9 col-lg-9">

            <div class="well with-header">
                <div class="header bordered-pink">
                    بيانات طلب العميل
                    <span>{!! $order->getStatus() !!}</span>
                </div>

                <table class="table table-bordered dashboard-tables saved-cars-table">
                    <thead>
                        <tr>
                            <td>الخدمة</td>
                            <td>السعر (SDG)</td>
                            <td>العدد</td>
                            <td>المجموع (SDG)</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="search-find-results">
                                    <h5><a href="{{ $service->getUrl() }}">{{ $service->name }}</a></h5>
                                </div>
                            </td>
                            <td><span class="price">{{ number_format( $service->price ) }}</span></td>
                            <td><span class="price">{{ number_format( $order->count ) }}</span></td>
                            <td><span class="text-success"><strong> {{ number_format( $order->service_total ) }} </strong></span></td>
                        </tr>
                        @if($order->details->count() > 0)
                            <tr class="info">
                                <td colspan="4"><small>  الإضافات المختارة لهذه الخدمة</small></td>
                            </tr>
                            @foreach ($order->details as $extra)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                        <label class="form-check-label">
                                            {{ $extra->extra->name }}
                                        </label>
                                        </div>
                                    </td>
                                    <td><span class="price">{{ number_format( $extra->price ) }} </span></td>
                                    <td><span class="price">{{ number_format( $extra->count ) }} </span></td>
                                    <td><span class="text-success"><strong> {{ number_format( $extra->total ) }} </strong></span></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"> المجموع </td>
                            <td><span class="text-danger"><strong> {{ number_format($order->total) }} </strong></span></td>
                        </tr>
                    </tfoot>
                </table>


            </div>

            <div class="well with-header">
                <div class="header bordered-pink">
                    بيانات الخدمة المطلوبة
                </div>
                <table class="table table-condensed table-hover table-striped visible-lg visible-md">
                    <tr>
                        <th width="20%">الخدمة المطلوبة</th>
                        <td colspan="3" class="danger"><strong>{{ $service->name }}</strong></td>
                    </tr>
                    <tr>
                        <th>التصنيف</th>
                        <td>{{ $service->cat->parent->name }} </td>
                        <th>التصنيف الفرعي</th>
                        <td>{{ $service->cat->name }} </td>
                    </tr>
                    <tr>
                        <th>مدة التنفيذ</th>
                        <td>{{ $service->period->name }}</td>
                        <th width="20%">سعر الخدمة</th>
                        <td class="success"><strong>{{ number_format($service->price) }}</strong> جنيه سوداني</td>
                    </tr>
                    <tr>
                        <th>وصف الخدمة</th>
                        <td colspan="3">{!! $service->txt !!} </td>
                    </tr>
                    <tr>
                        <th>تعليمات للمشتري</th>
                        <td colspan="3">
                            <span class="badge badge-warning badge-square">يرجى من المشتري الإطلاع على هذه التعليمات قبل البدء في التواصل مع العميل المستقل.</span>
                            {!! $service->comments !!}
                        </td>
                    </tr>
                </table>
                <table class="table table-condensed table-hover table-striped visible-sm visible-xs">
                    <tr>
                        <th width="20%">الخدمة المطلوبة</th>
                        <td class="danger"><strong>{{ $service->name }}</strong></td>
                    </tr>
                    <tr>
                        <th>التصنيف</th>
                        <td>{{ $service->cat->parent->name }} </td>
                    </tr>
                    <tr>
                        <th>التصنيف الفرعي</th>
                        <td>{{ $service->cat->name }} </td>
                    </tr>
                    <tr>
                        <th>مدة التنفيذ</th>
                        <td>{{ $service->period->name }}</td>
                    </tr>
                    <tr>
                        <th width="20%">سعر الخدمة</th>
                        <td class="success"><strong>{{ number_format($service->price) }}</strong> جنيه سوداني</td>
                    </tr>
                    <tr>
                        <th>وصف الخدمة</th>
                        <td>{!! $service->txt !!} </td>
                    </tr>
                    <tr>
                        <th rowspan="2">تعليمات للمشتري</th>
                        <td class="warning">
                            يرجى من المشتري الإطلاع على هذه التعليمات قبل البدء في التواصل مع العميل المستقل.
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {!! $service->comments !!}
                        </td>
                    </tr>
                </table>
            </div>
            <div class="well with-header">
                <div class="header bordered-pink">
                    إضافات للخدمة
                </div>
                <table class="table table-condensed table-hover table-striped">
                    <tr>
                        <th>الإضافة</th>
                        <th>السعر</th>
                        <th>فترة التنفيذ</th>
                    </tr>
                    @foreach ($service->extras as $extra)
                    <tr>
                        <th width="50%">{{ $extra->name }}</th>
                        <td>{{ $extra->price }} ج.س.</td>
                        <td>{{ $extra->period->name }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
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
</div>
@endsection
@section('scripts')
<script>
   $('#accept-btn').on('click', function(e){
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
		$('#reject-btn').on('click', function(e){
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