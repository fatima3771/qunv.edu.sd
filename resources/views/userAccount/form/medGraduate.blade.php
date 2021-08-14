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
        <label for="graduationYear">سنة التخرج</label>
        {{Form::text('graduationYear',null,['class'=>'form-control', 'placeholder'=>'Confirm Email'])}}
    </div>
</div>        
<div class="form-group row">
    <div class="col-md-6">
        <label for="specialization_id">نوع التخصص</label><br />
        <?php $spetializations = App\SpecializationType::orderBy('name','ASC')->pluck('name','id'); ?>
        {{ Form::select('specialization_id', $spetializations,'',['class'=>'form-control']) }}
    </div>
    <div class="col-md-6">
        <label for="clinical_id">الدرجة</label><br />
        <?php $clinical = App\ClinicalType::orderBy('id','ASC')->pluck('name','id'); ?>
        {{ Form::select('clinical_id', $clinical,'',['class'=>'form-control']) }}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6">
        <label for="academic_id">الدرجة الأكاديمية</label><br />
        <?php $academic = App\AcademicType::orderBy('id','ASC')->pluck('name','id'); ?>
        {{ Form::select('academic_id', $academic,'',['class'=>'form-control']) }}
    </div>
    <div class="col-md-6">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6">
        <label for="currentJob">الوظيفة الحالية</label>
        {{Form::text('currentJob','',['class'=>'form-control', 'placeholder'=>'Confirm Email'])}}
    </div>
    <div class="col-md-6">
        <label for="company">مكان العمل</label>
        {{Form::text('company','',['class'=>'form-control', 'placeholder'=>'Confirm Email'])}}
    </div>
</div>