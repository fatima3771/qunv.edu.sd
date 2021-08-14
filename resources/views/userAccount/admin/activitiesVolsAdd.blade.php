@extends('mco.layouts.admin')

@section('content')
    <h3 class="page-header">
		<a href="{{ route('admin.activities') }}">{{$activity->name}}</a>
		<small>إضافة متطوعين</small>
	</h3>
	<div class="col-md-7 col-sm-7">
		<section>
		</section>

		<section id="resultArea">
            <div class="alert alert-warning">
                يرجى استخدام أدوات البحث للبحث عن المتطوعين لهذا البرنامج.
            </div>
            <img src="{{request()->root()}}/assets/crew/images/volConnect.jpg" class="img-responsive" />
		</section>
	</div>
	<div class="col-md-5 col-sm-5">
		<a href="{{request()->root()}}/admin/activities" class="btn btn-sm btn-primary form-control"><i class="fa fa-fw fa-comments"></i> عودة لقائمة الأنشطة والفعاليات </a>
		<a href="volunteers" class="btn btn-sm btn-primary form-control"><i class="fa fa-fw fa-users"></i> عودة لقائمة المتطوعين </a>
		<hr/>
		{{Form::open(['route'=>'admin.doSearchFilter', 'id'=>'filterForm'])}}
			<div class="panel panel-default">
				<div class="panel-heading"> <i class="fa fa-fw fa-search"></i> العدد المطلوب من المتطوعين</div>
                    <input name="activityID" type="hidden" value="{{$activity->id}}"> 
				<div class="panel-body">
					<input name="volCount" id="volCount" class="doWhenChange form-control" type="number" max="{{$activity->vCount}}"> 
                    <small>أقصى عدد للمتطوعين هو: {{$activity->vCount}}
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading"> <i class="fa fa-fw fa-search"></i> النوع المطلوب ( طالب أم خريج )</div>
				<div class="panel-body">
					@foreach(App\GradType::get() as $gradType)
						<div class="col-md-6 col-xs-6 col-sm-6">
							<input name="grad_id[]" class="doWhenChange" type="checkbox" value="{{$gradType->id}}"> 
							{{$gradType->name}}
						</div>
					@endforeach
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading"> <i class="fa fa-fw fa-search"></i> نوع الكادر</div>
				<div class="panel-body">
					@foreach(App\MedType::get() as $medType)
						<div class="col-md-6 col-xs-6 col-sm-6">
							<input name="med_id[]" class="doWhenChange" type="checkbox" value="{{$medType->id}}"> 
							{{$medType->name}}
						</div>
					@endforeach
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading"> <i class="fa fa-fw fa-search"></i> التخصص </div>
				<div class="panel-body">
					@foreach(App\SpecializationType::get() as $specializationType)
						<div class="col-md-6 col-xs-6 col-sm-6">
							<input name="specialization_id[]" class="doWhenChange" type="checkbox" value="{{$specializationType->id}}"> 
							{{$specializationType->name}}
						</div>
					@endforeach
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading"> <i class="fa fa-fw fa-search"></i> التخصص السريري</div>
				<div class="panel-body">
					@foreach(App\ClinicalType::get() as $clinicalType)
						<div class="col-md-6 col-xs-6 col-sm-6">
							<input name="clinical_id[]" class="doWhenChange" type="checkbox" value="{{$clinicalType->id}}"> 
							{{$clinicalType->name}}
						</div>
					@endforeach
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading"> <i class="fa fa-fw fa-search"></i> التخصص الأكاديمي</div>
				<div class="panel-body">
					@foreach(App\AcademicType::get() as $academicType)
						<div class="col-md-6 col-xs-6 col-sm-6">
							<input name="academic_id[]" class="doWhenChange" type="checkbox" value="{{$academicType->id}}"> 
							{{$academicType->name}}
						</div>
					@endforeach
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading"> <i class="fa fa-fw fa-search"></i> المستوى الدراسي </div>
				<div class="panel-body">
					@foreach(App\LevelType::get() as $levelType)
						<div class="col-md-6 col-xs-6 col-sm-6">
							<input name="level_id[]" class="doWhenChange" type="checkbox" value="{{$levelType->id}}"> 
							{{$levelType->name}}
						</div>
					@endforeach
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading"> <i class="fa fa-fw fa-search"></i> نوع التطوع </div>
				<div class="panel-body">
					@foreach(App\VolType::get() as $volType)
						<div class="col-md-6 col-xs-6 col-sm-6">
							<input name="vol_id[]" class="doWhenChange" type="checkbox" value="{{$volType->id}}"> 
							{{$volType->name}}
						</div>
					@endforeach
				</div>
			</div>
		{{Form::close()}}
	</div>
@endsection

@section('scripts')
	<script>
		$(".doWhenChange").on('change', function(e){
            e.preventDefault();
            var volCount = $('#volCount');
            var volCountVal = volCount.val();
            var volCountMax = volCount.attr('max');
            
            if(parseInt(volCountVal) > 0){
                if(parseInt(volCountVal) > parseInt(volCountMax)){
                    alert('عدد المتطوعين المدخل أكبر من العدد المطلوب للبرنامج، لأقصى عدد مسموح به هو {{$activity->vCount}}');
                    volCount.val('{{$activity->vCount}}').focus();
                }else{
                    $('#resultArea').html('<div class="alert alert-info"><i class="fa fa-fw fa-spinner fa-spin"></i> يرجى الانتظار ريثما يتم البحث عن متطوعين للبرنامج </div>');
                    $.post('{{route("admin.doSearchFilter")}}', $('#filterForm').serialize(), function(data){
                        $('#resultArea').html(data);
                    });
                }
            }else{
                alert('يرجى إدخال عدد المتطوعين المطلوب');
                volCount.val('').focus();
            }
		});
	</script>
@endsection