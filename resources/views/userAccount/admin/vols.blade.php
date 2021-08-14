@extends('mco.layouts.admin')
 
@section('content')
    <h3 class="page-header">
		{{--  <a href="{{ route('admin.vols') }}"></a>  --}}
		<small>قائمة المتطوعين</small>
	</h3>
	<div class="col-md-12">
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
                        <th>عدد المشاركات</th>
                        <th>عرض</th>
                        <th>حذف</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user) 
						<tr>
							<td>{{$user->id}}</td>
							<td>{{$user->name}}</td>
							<td>{{$user->mobile}}</td>
							<td>{{$user->email}}</td>
							<td>{{$user->address}}</td>
							<td>{{$user->myVolActivities->count()}}</td>
							<td><a href="{{request()->root()}}/admin/volunteers/{{$user->id}}" class="label label-primary"><i class="fa fa-fw fa-user"></i> عرض</a></td>
							<td><a href="{{request()->root()}}/admin/volunteers/{{$user->id}}/delete" class="label label-danger"><i class="fa fa-fw fa-user-times"></i> حذف</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</section>
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