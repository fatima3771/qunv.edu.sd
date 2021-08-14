@extends('userAccount.layouts.beyond')

@section('content')
<h3 class="page-header">الخطوة الثالثة</h3>
    {!! Form::open(['url' => route('userAccount.step3'), 'method' => 'post']) !!}
        <h3 class="page-header"><i class="fa fa-fw fa-user"></i> بيانات التطوع</h3>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="vol_id">نوع التطوع</label><br />
                <?php $vols = App\VolType::orderBy('name','ASC')->pluck('name','id'); ?>
                {{ Form::select('vol_id', $vols,'',['class'=>'form-control']) }}
                <small id="emailHelp" class="form-text text-muted">
                    <strong>تطوع في مكاتب المنظمة :</strong> و هو تطوع لفترة زمنية طويلة ضمن أحد المكاتب التنفيذية او الفرعية للمنظمة <br/>
                    <strong>تطوع للمشاركة في المشاريع و البرامج :</strong> و هو تطوع لبرنامج واحد أو أكثر من أنشطة المنظمة وفقا لاهتمامات المتطوع.
                </small>
            </div>
            <div class="col-md-6">
                <label for="activity_id">نوعية النشاط الذي ترغب في التطوع فيه؟</label><br />
                <?php $activities = App\ActivityType::orderBy('name','ASC')->get(); ?>
                @foreach($activities as $activity)
                    <div class="col-md-6">
                        {{ Form::checkbox('activity_id[]', $activity->id,'') }} {{$activity->name}} <br />
                    </div>
                @endforeach
            </div> 
        </div>
        <hr />
        <button type="submit" class="btn btn-primary">Submit</button>
    {!! Form::close() !!}
@endsection
