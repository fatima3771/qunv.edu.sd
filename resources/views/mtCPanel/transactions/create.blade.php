@extends('mtCPanel.layouts.master')

@section('php')
    @php
        $page = 'transactions';
        $folder = 'public/includes/transactions';
        $pic_dimensions =  " أبعاد الصورة (العرض:500px - الطول:500px)";
    @endphp
@endsection

@section('breadcrumb')
		<li>
			<i class="fa fa-home"></i>
			<a href="{{  request()->root() }}/mtCPanel">@lang('admin.cpanel')</a>
		</li>
		<li><a href="{{ mtGetRoute('index','mtCPanel.'.$page) }}">@lang('admin.'.$page)</a></li>
		<li class="active">@lang('admin.add')</li>
@endsection

@section('header-title')
	@lang('admin.'.$page)
@endsection

@section('content')
<style>
.dz-message{
	text-align: center;
	font-size: 28px;
  }
  
.dropzone .dz-preview .dz-details img, .dropzone-previews .dz-preview .dz-details img {
	width: 100% !important;
	height: 100% !important;
	object-fit: cover;
  }
  </style>
	<div class="row">
		<div id="panel-1" class="panel panel-default">
			<div class="panel-heading">
				<span class="title elipsis">
					<strong>@lang('admin.'.$page) - @lang('admin.add')</strong> <!-- panel title -->
				</span>

				<!-- right options -->
				<ul class="options pull-left list-inline">
					<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
					<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
				</ul>
				<!-- /right options -->

			</div>

			<!-- panel content -->
			<div class="panel-body">
				<form action="{{ mtGetRoute('store','mtCPanel.'.$page) }}" method="post" enctype="multipart/form-data" data-success="Sent! Thank you!" data-toastr-position="top-right">
					{{ csrf_field() }}

                    <fieldset>
                        <div class="row">
							<div class="col-md-12">
								<div class="form-group">
                                    <div class="col-md-12 col-sm-12">
                                        <label>@lang('admin.name')</label>
                                        <select name="user_id" class="form-control pointer required">
                                            <option value="0" {{ (old('user_id') == 0)? 'selected' : '' }}> اختر العضو </option>
                                            @foreach (App\User::where('confirmed',1)->orderBy('name','asc')->get() as $member)
                                                <option value="{{ $member->id }}" {{ (old('user_id') == $member->id)? 'selected' : '' }}> {{ $member->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 padding-top-15">
                                        <label>@lang('admin.amount')</label>
                                        <input type="text" name="amount" value="{{ old('amount') }}" class="form-control required {{ $errors->has('amount')? 'error' : '' }}">
                                        @if ($errors->has('amount'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('amount') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 padding-top-15">
                                        <label>@lang('admin.comments')</label>
                                        <input type="text" name="desc" value="{{ old('desc') }}" class="form-control required {{ $errors->has('desc')? 'error' : '' }}">
                                        @if ($errors->has('desc'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('desc') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

							</div>
						</div>
					</fieldset>
					
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-3d btn-teal btn-xlg btn-block margin-top-30">
								@lang('admin.add')
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
    </div>
@stop
@section('scripts')
	<script type="text/javascript">
		loadScript(plugin_path + 'dropzone/dropzone.js', function() {

			// Dropzone.autoDiscover = false;

			var token = "{!! csrf_token() !!}";
			var uplaod_url = "{{ route('mtCPanel.dropzone.upload') }}";
			var get_files_url = "{{ route('mtCPanel.'.$page.'.dropzone') }}";
			var remove_url = "{{ route('mtCPanel.'.$page.'.dropzone.remove') }}";
			var folder = "{{ $folder }}";

			
			Dropzone.options.myDropzone = {
				url: uplaod_url, //----------------- Upload URL --------------------------------
				params: {
					"_token": token,
					"folder": folder
				},
				paramName: "file", // The name that will be used to transfer the file
				maxFilesize: 10, // MB
				maxFiles: 1,
				dictCancelUploadConfirmation: "Are you sure to cancel upload?",
				dictRemoveFile: "حذف",
				addRemoveLinks: true,
				removedfile: function(file) {
					var name = file.name; 
					
					$.ajax({
						type: 'post',
						url: remove_url, //----------------- Remove URL --------------------------------
						data: {
							_token: token,
							name: name,
							id: 255
						},
						sucess: function(data){
							console.log('success: ' + data);
							myDropzone.options.maxFiles = myDropzone.options.maxFiles + 1;
						}
					});
					var _ref;
						return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
				},
				accept: function(file, done) {
					var re = /(?:\.([^.]+))?$/;
					var ext = re.exec(file.name)[1];
					ext = ext.toUpperCase();
					if ( ext == "JPG" || ext == "JPEG" || ext == "PNG" ||  ext == "GIF" ||  ext == "BMP") 
					{
						done();
					}else { 
						done("Please select only supported picture files."); 
					}
				},
				init: function() {
					myDropzone = this;
					this.on('maxfilesexceeded', function (file) {
						// this.removeAllFiles();
						// this.addFile(file);
					});

					this.on("addedfile", function(file) { fileupload_flag = 1; });
					this.on("complete", function(file) { fileupload_flag = 0; });
					this.on("success", 
						function( file, response ){
							obj = JSON.parse(response);
							$("#picture").val(obj.filename);
						}
					);
				},
			};

		});
	</script>
@stop