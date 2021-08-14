@extends('mco.layouts.admin')

@section('content')
	<h3 class="page-header">الأنشطة والفعاليات</h3>

	<section>
		<div class="col-md-8 col-sm-8">
			<table class="table table-striped table-condensed table-hover">
				<thead> 
					<tr>
						<th>م</th>
						<th>اسم الفعالية</th>
						<th>تاريخ البداية</th>
						<th>تاريخ النهاية</th>
						<th>العدد المطلوب</th>
						<th>العدد الحالي</th>
						<th>المتبقي</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($activities as $activity)
						<tr>
							<td>{{$activity->id}}</td>
							<td>{{$activity->name}}</td>
							<td>{{$activity->startDate}}</td>
							<td>{{$activity->endDate}}</td>
							<td><label class="label label-primary">{{$activity->vCount}}</label></td>
							<td><label class="label label-danger">{{$activity->vols->count()}}</label></td>
							<td><label class="label label-success">{{$activity->restVolCount()}}</label></td>
							<td><a class="label label-warning" href="{{route('admin.activityVol',['activtyID' => $activity->id])}}"><i class="fa fa-fw fa-users"></i> المتطوعين</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-4 col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-fw fa-calendar-plus-o"></i> إضافة نشاط أو فعالية
				</div>
				<div class="panel-body">
				</div>
			</div>
		</div>
	</section>
@endsection
