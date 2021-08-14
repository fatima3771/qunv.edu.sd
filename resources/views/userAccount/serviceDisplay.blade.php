@extends('userAccount.layouts.beyond')

@section('breadcrumb')
<li>
    <i class="fa fa-home"></i>
    <a href="#">Home</a>
</li>
<li>
    <a href="#">خدماتي</a>
</li>
<li class="active">
    <span dir='ltr'>[#{{ $service->id }}]</span> {{ $service->name }}
</li>
@endsection

@section('header-title')
<i class="fa fa-fw fa-list" aria-hidden="true"></i> خدماتي : <span dir='ltr'>[#{{ $service->id }}]</span>
{{ $service->name }}
@endsection
<a href="services/add" class="btn btn-warning pull-right"><i class="fa fa-fw fa-plus"></i> أضف خدمة جديدة </a>

@section('row-title')
<i class="typcn typcn-th-small"></i> خدماتي : <span dir='ltr'>[#{{ $service->id }}]</span> {{ $service->name }}
@endsection

@section('content')
<div class="well">
    @if($service != null)
    <div class="row">
        <div class="col-md-3 col-sm-3 col-lg-3">
            <div id="publishStatus" @if($service->published == 1) style='display:none' @endif>
                <div class="alert alert-danger fade in">
                    <i class="fa-fw fa fa-close"></i>
                    <strong>الخدمة </strong> غير نشطة
                </div>
                <p>
                    يمكنك جعل الخدمة نشطة لتظهر لطالبي الخدمة عند البحث عن الخدمات، كما يمكنك إلغاء التنشيط في أي وقت.
                </p>
                <div style="text-align:center">
                    <button class="btn btn-success" id="publishThisService"> <i class="fa fa-fw fa-check"></i> قم بتنشيط
                        الخدمة </button>
                </div>

            </div>

            <div id="unPublishStatus" @if($service->published == 0) style='display:none' @endif>
                <div class="alert alert-success fade in">
                    <i class="fa-fw fa fa-check"></i>
                    <strong>الخدمة </strong> نشطة
                </div>
                <p>
                    يمكنك جعل الخدمة نشطة لتظهر لطالبي الخدمة عند البحث عن الخدمات، كما يمكنك إلغاء التنشيط في أي وقت.
                </p>
                <div style="text-align:center">
                    <button class="btn btn-danger" id="closeThisService"> <i class="fa fa-fw fa-close"></i> إلغاء تنشيط
                        الخدمة</button>
                </div>

            </div>

            <hr />

            <ul class="list-group">
                <li class="list-group-item">
                    <span class="badge">{{ $service->orders(1)->count() }}</span>
                    <a style="text-align:right;" href="{{ $service->getUrl('forUser') }}/status/1"><i
                            class="fa fa-fw fa-file"></i> طلبات جديدة</a>
                </li>
                <li class="list-group-item">
                    <span class="badge">{{ $service->orders(2)->count() }}</span>
                    <a style="text-align:right;" href="{{ $service->getUrl('forUser') }}/status/2"><i
                            class="fa fa-fw fa-spin fa-refresh"></i> بانتظار التعليمات</a>
                </li>
                <li class="list-group-item">
                    <span class="badge">{{ $service->orders(3)->count() }}</span>
                    <a style="text-align:right;" href="{{ $service->getUrl('forUser') }}/status/3"><i
                            class="fa fa-fw fa-spin fa-cog"></i> جاري تنفيذها</a>
                </li>
                <li class="list-group-item">
                    <span class="badge">{{ $service->orders(4)->count() }}</span>
                    <a style="text-align:right;" href="{{ $service->getUrl('forUser') }}/status/4"><i
                            class="fa fa-fw fa-spin fa-spinner"></i> بانتظار الاستلام</a>
                </li>
                <li class="list-group-item">
                    <span class="badge">{{ $service->orders(5)->count() }}</span>
                    <a style="text-align:right;" href="{{ $service->getUrl('forUser') }}/status/5"><i
                            class="fa fa-fw fa-check"></i> تم تسليمها</a>
                </li>
                <li class="list-group-item">
                    <span class="badge">{{ $service->orders(6)->count() }}</span>
                    <a style="text-align:right;" href="{{ $service->getUrl('forUser') }}/status/6"><i
                            class="fa fa-fw fa-ban"></i> ملغية</a>
                </li>
            </ul>
        </div>
        <div class="col-md-9 col-sm-9 col-lg-9">
            <div class="well with-header">
                <div class="header bordered-pink">
                    بيانات الخدمة
                </div>
                <table class="table table-condensed table-hover table-striped">
                    <tr>
                        <th width="20%">الخدمة المعروضة</th>
                        <td colspan="3" class="danger"><strong>{{ $service->name }}</strong></td>
                    </tr>
                    <tr>
                        <th>مدة التنفيذ</th>
                        <td>{{ $service->period->name }}</td>
                        <th width="20%">سعر الخدمة</th>
                        <td class="success"><strong>{{ number_format($service->price) }}</strong> جنيه سوداني</td>
                    </tr>
                    <tr>
                        <th>التصنيف</th>
                        <td>{{ $service->cat->parent->name }} </td>
                        <th>التصنيف الفرعي</th>
                        <td>{{ $service->cat->name }} </td>
                    </tr>
                    <tr>
                        <th>كلمات مفتاحية</th>
                        <td colspan="3">Keywords</td>
                    </tr>
                    <tr>
                        <th>وصف الخدمة</th>
                        <td colspan="3">{!! $service->txt !!} </td>
                    </tr>
                    <tr>
                        <th>تعليمات للمشتري</th>
                        <td colspan="3">
                            <p class="form-text text-muted text-danger">
                                <small>ملحوظة: تظهر هذه المعلومات للمشتري بعد طلب الخدمة</small>
                            </p>
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
            <div class="well with-header">
                <div class="header bordered-pink">
                    صور الخدمة
                </div>
                <div>
                    <div class="row">
                        @foreach ($service->pictures as $pic)
                        {!! $pic->drawPic() !!}
                        @endforeach
                    </div>
                </div>
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
    $('#publishThisService').on('click', function () {
        $.post('{{$service->getUrl($type="forUser")}}/publish', {
            '_token': '{{ csrf_token() }}',
            'id': '{{ $service->id }}'
        }, function (data) {
            $('#publishStatus').hide();
            $('#unPublishStatus').show();
        });

    });

    $('#closeThisService').on('click', function () {
        $.post('{{$service->getUrl($type="forUser")}}/close', {
            '_token': '{{ csrf_token() }}',
            'id': '{{ $service->id }}'
        }, function (data) {
            $('#publishStatus').show();
            $('#unPublishStatus').hide();
        });
    });
</script>
@endsection