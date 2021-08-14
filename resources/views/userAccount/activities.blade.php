@extends('userAccount.layouts.beyond')

@section('content')
	<h3 class="page-header">الأنشطة والفعاليات</h3>

	<section>
    @if($activities->count() != 0)
		<table class="table table-striped table-condensed table-hover">
			<thead> 
				<tr>
					<th>م</th>
					<th>اسم الفعالية</th>
					<th>تاريخ البداية</th>
					<th>تاريخ النهاية</th>
				</tr>
			</thead>
			<tbody>
				@foreach($activities as $activity)
					<tr>
						<td>{{$activity->id}}</td>
						<td>{{$activity->info->name}}</td>
						<td>{{$activity->info->startDate}}</td>
						<td>{{$activity->info->endDate}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
    @else
        <div class="alert alert-warning col-md-6 col-md-offset-3">
            <div class="col-md-6 col-sm-4">
                <img src="{{request()->root()}}/assets/crew/images/no-records1.png" class="img-responsive" />
            </div>
            <div class="col-md-6 col-sm-8" style="text-align:center;">
                <h4 style="line-height:2em;">عفوا، لا يوجد أي أنشطة أو فعاليات حالياً</h4>
        </div>
        </div>
    @endif
	</section>
@endsection
