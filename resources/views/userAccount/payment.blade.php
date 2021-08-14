@extends('userAccount.layouts.beyond')

@section('breadcrumb')
		<li>
			<i class="fa fa-home"></i>
			<a href="#">@lang('site.home')</a>
		</li>
		<li class="active">دفع الرسوم</li>
@endsection

@section('header-title')
	دفع الرسوم
@endsection

@section('content')


<!-- BOXES -->
<div class="row">
	
	<div class="col-md-12 col-sm-12">
            <h4> <i class="fa fa-fw fa-credit-card" aria-hidden="true"></i> <strong>تفعيل العضوية !</strong></h4>
            <p>
                <strong> يمكنكم </strong> تفعيل العضوية لأول مرة أو تجديد العضوية المنتهية من هذه المساحة فقط قم باختيار نوع العضوية المطلوب ومن ثم أتمم عملية الدفع أونلاين من خلال بطاقتك المصرفية.
            </p>
        <form action="{{ route('userAccount.payment') }}" method="post" enctype="multipart/form-data" data-success="Sent! Thank you!" data-toastr-position="top-right">
            {{ csrf_field() }}
            <fieldset>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12">
                                <label>نوع العضوية</label>
                                <select name="membership_type_id" class="form-control pointer required">
                                    <option value="0" {{ (old('membership_type_id') == 0)? 'selected' : '' }}> اختر نوع العضوية </option>
                                    @if(auth()->guard('user')->user()->is_graduate == 1)
                                        @php $membershipTypes = App\MembershipType::whereIn('id',[1,2])->get(); @endphp
                                    @else
                                        @php $membershipTypes = App\MembershipType::whereIn('id',[3,4])->get(); @endphp
                                    @endif

                                    @foreach ($membershipTypes as $mType)
                                        <option value="{{ $mType->id }}" {{ (old('membership_type_id') == $mType->id)? 'selected' : '' }}> {{ $mType->title }} [ {{ number_format($mType->price,0) }} جنيه سوداني ] </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-3d btn-teal btn-xlg btn-block margin-top-30">
                        @lang('admin.add')
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>
<!-- /BOXES -->

@stop

@section('scripts')
    @if(old('paymentCancelled'))
        Swal.fire({
            icon: 'error',
            title: 'لقد قمت بإلغاء عملية الدفع، يرجى المحاولة مرة أخرى',
            showConfirmButton: false,
            timer: 3000
        })
    @endif
@endsection