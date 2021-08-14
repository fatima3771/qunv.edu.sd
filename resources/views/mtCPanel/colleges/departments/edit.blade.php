@extends('mtCPanel.layouts.master')

@section('php')
    @php        
        $page_title = "colleges_departments";
        $parentPage_title = "colleges";
        $childPage = "departments";
        $parentPage = "colleges";
		$page = $parentPage.".".$childPage;
		$pic_dimensions =  " أبعاد الصورة (العرض:500px - الطول:500px)";
        $parent = $data->college;
		$folder = 'includes/colleges'.$parent->id.'/news';
    @endphp
@endsection

@section('breadcrumb')
        <li>
            <i class="fa fa-home"></i>
            <a href="{{  request()->root() }}/mtCPanel">@lang('admin.cpanel')</a>
        </li>
        <li> <a href="{{ mtGetRoute('index','mtCPanel.'.$parentPage) }}">@lang('admin.'.$parentPage_title)</a> </li>
        <li> <a href="{{ mtGetRoute('show','mtCPanel.'.$parentPage,$parent->id) }}">{{ $parent->title }}</a> </li>
        <li> <a href="{{ mtGetRoute('index','mtCPanel.'.$page,$parent->id) }}">@lang('admin.'.$page_title)</a> </li>
        <li class="active">{{ $data->title }}</li>
@endsection

@section('header-title')
	@lang('admin.'.$page_title)
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
					<strong>@lang('admin.'.$page_title) - @lang('admin.edit')</strong> <!-- panel title -->
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
				<form action="{{ mtGetRoute('update','mtCPanel.'.$page, $parent->id, $data->id) }}" method="post" enctype="multipart/form-data" data-success="Sent! Thank you!" data-toastr-position="top-right">
					<input name="_method" type="hidden" value="PUT">
					{{ csrf_field() }}
                    <fieldset>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12">
                                        <label>@lang('admin.title')</label>
                                        <input type="text" name="title" value="{{ $data->title }}" class="form-control required {{ $errors->has('title')? 'error' : '' }}">
                                        @if ($errors->has('title'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 padding-top-15">
                                        <label>@lang('admin.titleEn')</label>
										<input type="text" name="titleEn" value="{{ $data->titleEn }}" class="form-control required {{ $errors->has('titleEn')? 'error' : '' }}">
                                        @if ($errors->has('titleEn'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('titleEn') }}</strong>
                                            </span>
                                        @endif
                                    </div>
								</div>

                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 padding-top-15">
                                        <label>@lang('admin.email')</label>
										<input type="text" name="email" value="{{ $data->email }}" class="form-control required {{ $errors->has('email')? 'error' : '' }}">
                                        @if ($errors->has('email'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
								</div>

                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 padding-top-15">
                                        <label>@lang('admin.phone')</label>
										<input type="text" name="phone" value="{{ $data->phone }}" class="form-control required {{ $errors->has('phone')? 'error' : '' }}">
                                        @if ($errors->has('phone'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
								</div>

								<div class="form-group">
									<div class="col-md-12 col-sm-12 padding-top-15">
										<label>@lang('admin.details')</label>
										<textarea name="txt" class="summernote form-control" data-height="200" data-lang="en-US">
											{!! $data->txt !!}
										</textarea>
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-12 col-sm-12 padding-top-15">
										<label>@lang('admin.detailsEn')</label>
										<textarea name="txtEn" class="summernote form-control" data-height="200" data-lang="en-US">
											{!! $data->txtEn !!}
										</textarea>
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-12 col-sm-12 padding-top-15">
										<label>@lang('admin.objectives')</label>
										<textarea name="objectives" class="summernote form-control" data-height="200" data-lang="en-US">
											{!! $data->objectives !!}
										</textarea>
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-12 col-sm-12 padding-top-15">
										<label>@lang('admin.objectivesEn')</label>
										<textarea name="objectivesEn" class="summernote form-control" data-height="200" data-lang="en-US">
											{!! $data->objectivesEn !!}
										</textarea>
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-12 col-sm-12 padding-top-15">
										<label>@lang('admin.degrees')</label>
										<textarea name="degrees" class="summernote form-control" data-height="200" data-lang="en-US">
											{!! $data->degrees !!}
										</textarea>
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-12 col-sm-12 padding-top-15">
										<label>@lang('admin.degreesEn')</label>
										<textarea name="degreesEn" class="summernote form-control" data-height="200" data-lang="en-US">
											{!! $data->degreesEn !!}
										</textarea>
									</div>
								</div>

								

                            </div>
                        </div>
					</fieldset>
					
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-3d btn-teal btn-xlg btn-block margin-top-30">
								@lang('admin.edit')
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
            var id = parseInt("{{ $data->id }}");
            var uplaod_url = "{{ route('mtCPanel.dropzone.upload') }}";
            var get_files_url = "{{ route('mtCPanel.'.$page.'.dropzone') }}";
            var remove_url = "{{ route('mtCPanel.'.$page.'.dropzone.remove') }}";
            var folder = "{{ $folder }}";
            var prefix = "{{ date('Y-m-d_H-m-i') }}_";
			
			Dropzone.options.myDropzone = {
				url: uplaod_url, //----------------- Upload URL --------------------------------
				params: {
					"_token": token,
					"folder": folder,
					"prefix": prefix
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

					$.ajax({
						url: get_files_url, //----------------- Get Server Files URL --------------------------------
						type: 'post',
						data: {
							id: id,
							_token: token
							},
						dataType: 'json',
						success: function(response){
							mocks = response;
							$.each(mocks, function(i, mockFile){
								console.log(mockFile.name);
								myDropzone.emit('addedfile', mockFile);
								myDropzone.emit("thumbnail", mockFile, mockFile.path);
								myDropzone.emit('complete', mockFile);
								myDropzone.options.maxFiles = myDropzone.options.maxFiles - 1;
								myDropzone.files.push(mockFile);
							});
						}
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
    <script>
        @if(old('updated'))
            _toastr("تم التعديل بنجاح","top-center","success",false);
        @endif
    </script>
@stop