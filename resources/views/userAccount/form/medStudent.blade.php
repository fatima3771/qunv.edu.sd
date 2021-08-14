<div class="form-group row">
    <div class="col-md-6">
        <label for="university_id">الجامعة</label>
            <?php $universities = [1=>'جامعة النيلين'];//App\Country::orderBy('countryNameAr','ASC')->pluck('countryNameAr','id'); ?>
            {{ Form::select('university_id', $universities,189,['class'=>'form-control']) }}
    </div>
    <div class="col-md-6">
        <label for="college_id">الكلية</label>
        <?php $colleges = App\CollegeType::orderBy('name','ASC')->pluck('name','id'); ?>
        {{ Form::select('college_id', $colleges,'',['class'=>'form-control']) }}
    </div>
</div>        
<div class="form-group row">
    <div class="col-md-6">
        <label for="dept">القسم</label>
            {{Form::text('dept','',['class'=>'form-control', 'placeholder'=>'Confirm Email'])}}
    </div>
    <div class="col-md-6">
        <label for="level">المستوى</label>
        <?php $levels = App\LevelType::orderBy('name','ASC')->pluck('name','id'); ?>
        {{ Form::select('college', $levels,'',['class'=>'form-control']) }}
    </div>
</div>        
<div class="form-group row">
    <div class="col-md-6">
        <label for="study_id">مجال الدراسة</label><br />
        <?php $study = App\StudyType::orderBy('name','ASC')->pluck('name','id'); ?>
        {{ Form::select('study_id', $study,'',['class'=>'form-control']) }}
    </div>
</div>