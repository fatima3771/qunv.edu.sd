@extends('userAccount.layouts.beyond')

@section('content')
<h3 class="page-header">الخطوة الثانية</h3>
    {!! Form::open(['url' => route('userAccount.step2'), 'method' => 'post']) !!}
        <h3 class="page-header"><i class="fa fa-fw fa-user"></i> بيانات إضافية</h3>
        @if(auth()->guard('user')->user()->academicInfo->med_id == 2 && auth()->guard('user')->user()->academicInfo->grad_id == 1)
            @include('userAccount.form.nonMedStudent')
        @endif
        @if(auth()->guard('user')->user()->academicInfo->med_id == 1 && auth()->guard('user')->user()->academicInfo->grad_id == 1)
            @include('userAccount.form.medStudent')
        @endif
        @if(auth()->guard('user')->user()->academicInfo->med_id == 2 && auth()->guard('user')->user()->academicInfo->grad_id == 2)
            @include('userAccount.form.nonMedGraduate')
        @endif
        @if(auth()->guard('user')->user()->academicInfo->med_id == 1 && auth()->guard('user')->user()->academicInfo->grad_id == 2)
            @include('userAccount.form.medGraduate')
        @endif
        <hr />
        <button type="submit" class="btn btn-primary">Submit</button>
    {!! Form::close() !!}
@endsection
