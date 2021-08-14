@extends('mtCPanel.layouts.master')

@section('breadcrumb')
		<li>
			<i class="fa fa-home"></i>
			<a href="{{  request()->root() }}/mtCPanel">@lang('admin.cpanel')</a>
		</li>
		<li class="active">إشعارات الهاتف</li>
@endsection

@section('header-title')
	إشعارات الهاتف
@endsection

@section('content')
	<div class="row">
		<div id="panel-1" class="panel panel-default">
			<div class="panel-heading">
				<span class="title elipsis">
					<strong>إشعارات الهاتف</strong> <!-- panel title -->
				</span>
			</div>

			<!-- panel content -->
			<div class="panel-body">
				<form action="{{ route('send_firebase_notifications') }}" method="post" enctype="multipart/form-data" data-success="Sent! Thank you!" data-toastr-position="top-right">
					{{ csrf_field() }}

                    <fieldset>
                        <div class="row">
							<div class="col-md-8">
								{!! mtTextField(__('admin.title'),'title',old('title'),$errors,['isFirst'=>true]) !!}
								{!! mtTextAreaField(__('admin.details'),'txt',old('body'),$errors) !!}
                            </div>
							<div class="col-md-4">
								
							</div>
						</div>
					</fieldset>
					
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-3d btn-teal btn-xlg btn-block margin-top-30">
								@lang('admin.send')
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
    </div>
@stop
@section('scripts')
@stop