<div class="form-group row">
    <div class="col-md-6">
        <label for="university_id">الجامعة</label>
            <?php $universities = [1=>'جامعة النيلين'];//App\Country::orderBy('countryNameAr','ASC')->pluck('countryNameAr','id'); ?>
            {{ Form::select('university_id', $universities,189,['class'=>'form-control', 'tabindex' => '31']) }}
    </div>
    <div class="col-md-6">
        <label for="college">الكلية</label>
        {{Form::text('college','',['class'=>'form-control', 'placeholder'=>'Confirm Email'])}}
    </div>
</div>        
<div class="form-group row">
    <div class="col-md-6">
        <label for="dept">القسم</label>
            {{Form::text('dept','',['class'=>'form-control', 'placeholder'=>'Confirm Email'])}}
    </div>
    <div class="col-md-6">
        <label for="graduationYear">سنة التخرج</label>
        {{Form::text('graduationYear','',['class'=>'form-control', 'placeholder'=>'Confirm Email'])}}
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