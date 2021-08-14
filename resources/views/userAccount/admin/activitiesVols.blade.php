@extends('mco.layouts.admin')

@section('content')
    <h3 class="page-header">
		<a href="{{ route('admin.activities') }}">{{$activity->name}}</a>
		<small>قائمة المتطوعين</small>
	</h3>
	<div class="col-md-9">
		<section>
		</section>

		<section>
			<table class="table table-striped table-condensed table-hover">
				<thead>
					<tr>
						<th>م</th>
						<th>اسم المتطوع</th>
						<th>رقم الهاتف</th>
						<th>البريد الإلكتروني</th>
						<th>العنوان</th>
					</tr>
				</thead>
				<tbody>
					@foreach($activity->vols as $vol) 
						<tr>
							<td>{{$vol->id}}</td>
							<td>{{$vol->user->name}}</td>
							<td>{{$vol->user->mobile}}</td>
							<td>{{$vol->user->email}}</td>
							<td>{{$vol->user->address}}</td>
							<td><a href="{{request()->root()}}/admin/activities/{{$activity->id}}/volunteers/delete/{{$vol->id}}" class="label label-danger"><i class="fa fa-fw fa-user-times"></i> حذف</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</section>
	</div>
	<div class="col-md-3">
		<a href="{{request()->root()}}/admin/activities" class="btn btn-sm btn-primary form-control"><i class="fa fa-fw fa-comments"></i> عودة لقائمة الأنشطة والفعاليات </a>
		<a href="volunteers/add" class="btn btn-sm btn-warning form-control"><i class="fa fa-fw fa-users"></i> إضافة مجموعة متطوعين</a>
		<hr/>
	</div>
@endsection

@section('scripts')
	<script>
		$(".doWhenChange").on('change', function(){
			$.post('{{route("admin.doSearchFilter")}}', $('#filterForm').serialize(), function(data){
				return data;
			});
		});
	</script>
@endsection