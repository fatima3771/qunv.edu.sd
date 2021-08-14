@if($vols->count() != 0)
{{Form::open(['url' => request()->root().'/admin/activities/'.$activity->id.'/volunteers/add','id' => 'listForm'])}}
<table class="table table-striped table-condensed table-hover">
    <thead>
        <tr>
            <th></th>
            <th>م</th>
            <th>اسم المتطوع</th>
            <th>رقم الهاتف</th>
            <th>البريد الإلكتروني</th>
            <th>العنوان</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vols as $vol) 
            <tr>
                <td><input name="volItem[]" class="volCheckBox" type="checkbox" value="{{$vol->user->id}}" checked="checked" /></td>
                <td>{{$vol->id}}</td>
                <td>{{$vol->user->name}}</td>
                <td>{{$vol->user->mobile}}</td>
                <td>{{$vol->user->email}}</td>
                <td>{{$vol->user->address}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
{{Form::submit('Submit',['class' => 'btn btn-sm btn-primary'])}}
{{Form::close()}}
@else
<div class="alert alert-warning">
عفوا، لا يوجد متطوعين حسب اختيارات البحث الخاصة بك، يرجى تعديل بيانات البحث والمحاولة مرة أخرى.
</div>
@endif