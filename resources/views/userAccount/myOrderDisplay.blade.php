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
            
            @if($order->is_paid == 0)

                <div class="well bordered-left bordered-themeprimary">
                    <p><i class="fa fa-fw fa-square-o"></i> يرجى الدفع الآن باستخدام زر الدفع، لحجز المبلغ الخاص بالخدمة.</p>
                    <p><i class="fa fa-fw fa-square-o"></i> سوف يتم تعليق المبلغ ولن يتم تسليمه للعميل المستقل إلا بعد استلام الخدمة المطلوبة من قبل الزبون.</p>
                    <p><i class="fa fa-fw fa-square-o"></i> سوف يعاد المبلغ المحجوز إلى حسابك في حالة عدم تسلم الخدمة حسب بنود وشروط العقد بين العميل المستقل والزبون.</p>
                </div>

                @if(auth()->guard('user')->user()->wallet->balance < $order->total)
                    <div class="alert alert-danger fade in">
                        <i class="fa-fw fa fa-close"></i>
                        <strong>قم بتغذية </strong> محفظتك
                    </div>
                    <p style="text-align:justify">
                        عفواً، رصيدك الحالي في المحفظة هو {{ auth()->guard('user')->user()->wallet->balance }}، وقيمة الخدمة المطلوبة هو {{ $order->total }}، يجب عليك تغذية المحفظة حتى تستمر في طلب الخدمة.
                    </p>
                    <div style="text-align:center">
                        <button class="btn btn-success" id="addBalance"> <i class="fa fa-fw fa-money"></i> اضغط هنا لتغذية المحفظة </button>
                    </div>
                @else
                    <div style="text-align:center">
                        <button class="btn btn-danger" id="pay"> إدفع الآن </button>
                    </div>
                @endif
            
            @endif

            @if( $order->order_status_id == 2 )
                <div class="well bordered-left bordered-themeprimary">
                    <p><i class="fa fa-fw fa-square-o"></i> لقد تم قبول طلبك يمكنك الآن الذهاب إلى غرفة العمل والتواصل مع العميل المستقل</p>
                </div>
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
                            <th>الخدمة</th>
                            <th>السعر (SDG)</th>
                            <th>العدد</th>
                            <th>المجموع (SDG)</th>
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
                <table class="table table-condensed table-hover table-striped">
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
                            <br>{!! $service->comments !!}
                        </td>
                    </tr>
                </table>
            </div>
            @if($service->extras->count() > 0)
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
            @endif
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
    $('#pay').on('click', function () {
        $(this).addClass('disabled').html(' جاري الدفع ... ');
        $.post('{{ request()->root() }}/userAccount/pay', {
            '_token': '{{ csrf_token() }}',
            'id': '{{ $order->id }}'
        }, function (data) {
            window.open('{{ url()->current() }}', '_self' );
        });
    });
</script>
@endsection