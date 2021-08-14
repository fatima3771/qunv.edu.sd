@extends('userAccount.layouts.beyond')

@section('content')
<h3 class="page-header">الخطوة الأولى</h3>
    {!! Form::open(['url' => route('userAccount.step1'), 'method' => 'post']) !!}
        <h3 class="page-header"><i class="fa fa-fw fa-user"></i> بيانات الحساب</h3>
        <div class="row">
            <div class="form-group col-md-9 {{$errors->has('name')?'has-error': false}}">
                <label for="exampleInputEmail1">الاسم (رباعي)</label>
                {{Form::text('name', auth()->guard('user')->user()->name,['class'=>'form-control', 'placeholder'=>'الاسم رباعي', 'required'=>'required'])}}
                {!! $errors->first('name','<span class="help-block">:message</span>') !!}
            </div>
            <div class="form-group col-md-3">
                <label for="gender">النوع</label> <br />
                <?php $gender = ['Male'=>'male','Female'=>'female']; ?>
                <div class="radio">
                    <label>
                        {{ Form::radio('gender','male',true) }}
                        <span class="text"> ذكر </span>
                    </label>
                </div>
                <div class="radio">
                    <label>
                        {{ Form::radio('gender','female') }}
                        <span class="text"> أنثى </span>
                    </label>
                </div>
            </div>
        </div>
                    <div class="form-group has-feedback row">
                        <div class="col-md-4">
                            <label for="DOB">تاريخ الميلاد</label>
                            {{Form::date('DOB','',['class'=>'form-control', 'required'=>'required'])}}
                        </div>
                        <div class="col-md-4">
                            <label for="nationality_id">الجنسية</label>
                            <?php $countries = App\Country::orderBy('countryNameAr','ASC')->pluck('countryNameAr','id'); ?>
                            {{ Form::select('nationality_id', $countries,189,['class'=>'form-control']) }}
                        </div>
                        <div class="col-md-4">
                            <label for="nationalID">الرقم الوطني</label>
                            {{Form::number('nationalID','',['class'=>'form-control', 'placeholder'=>'الرقم الوطني'])}}
                        </div>
                    </div>                    
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="mobile">رقم الموبايل</label>
                            {{Form::text('mobile','',['class'=>'form-control', 'placeholder'=>'رقم الموبايل'])}}
                        </div>
                        <div class="col-md-6">
                            <label for="phone">رقم الهاتف</label>
                            {{Form::text('phone','',['class'=>'form-control', 'placeholder'=>'رقم الهاتف'])}}
                        </div>
                    </div>        
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="city">المدينة</label>
                            {{Form::text('city','',['class'=>'form-control', 'placeholder'=>'المدينة'])}}
                        </div>
                        <div class="col-md-3">
                            <label for="dist">الحي</label>
                            {{Form::text('dist','',['class'=>'form-control', 'placeholder'=>'الحي'])}}
                        </div>
                        <div class="col-md-6">
                            <label for="address">العنوان</label>
                            {{Form::textarea('address','',['class'=>'form-control', 'rows' => 3, 'placeholder'=>'العنوان'])}}
                        </div>
                    </div>        
                    
                    
        <hr />
        <button type="submit" class="btn btn-primary">اضافة</button>
    {!! Form::close() !!}
@endsection 
