@extends('mtCPanel.layouts.master')

@section('php')
    @php
        $page_title = "conferences_details";
        $parentPage_title = "conferences";
        $childPage = "details";
        $parentPage = "conferences";
        $page = $parentPage.".".$childPage;
        $folder = 'includes/conferences/'.$parent->id.'/details';
        $pic_dimensions =  " أبعاد الصورة (العرض:500px - الطول:500px)";
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
		<li class="active">@lang('admin.add')</li>
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
					<strong>@lang('admin.'.$page_title) - @lang('admin.add')</strong> [ {{ $parent->title }} ]
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
				<form action="{{ mtGetRoute('store','mtCPanel.'.$page, $parent->id) }}" method="post" enctype="multipart/form-data" data-success="Sent! Thank you!" data-toastr-position="top-right">
					{{ csrf_field() }}

                    <fieldset>
                        <div class="row">
							<div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 padding-top-15">
                                        <label>@lang('admin.txt')</label>
                                        <textarea name="txt" class="summernote form-control" data-height="200" data-lang="en-US">
                                            {!! old('txt') !!}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 padding-top-15">
                                        <label>@lang('admin.txt') (En)</label>
                                        <textarea name="txtEn" class="summernote form-control" data-height="200" data-lang="en-US">
                                            {!! old('txtEn') !!}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 padding-top-15">
                                        <label>@lang('admin.goals')</label>
                                        <textarea name="goals" class="summernote form-control" data-height="200" data-lang="en-US">
                                            {!! old('goals') !!}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 padding-top-15">
                                        <label>@lang('admin.goals') (En)</label>
                                        <textarea name="goalsEn" class="summernote form-control" data-height="200" data-lang="en-US">
                                            {!! old('goalsEn') !!}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 padding-top-15">
                                        <label>@lang('admin.conditions')</label>
                                        <textarea name="conditions" class="summernote form-control" data-height="200" data-lang="en-US">
                                            {!! old('conditions') !!}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 padding-top-15">
                                        <label>@lang('admin.conditions') (En)</label>
                                        <textarea name="conditionsEn" class="summernote form-control" data-height="200" data-lang="en-US">
                                            {!! old('conditionsEn') !!}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 padding-top-15">
                                        <label>@lang('admin.topics')</label>
                                        <textarea name="topics" class="summernote form-control" data-height="200" data-lang="en-US">
                                            {!! old('topics') !!}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 padding-top-15">
                                        <label>@lang('admin.topics') (En)</label>
                                        <textarea name="topicsEn" class="summernote form-control" data-height="200" data-lang="en-US">
                                            {!! old('topicsEn') !!}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 padding-top-15">
                                        <label>@lang('site.committee')</label>
                                        <textarea name="committee" class="summernote form-control" data-height="200" data-lang="en-US">
                                            {!! old('committee') !!}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 padding-top-15">
                                        <label>@lang('site.committee') (En)</label>
                                        <textarea name="committeeEn" class="summernote form-control" data-height="200" data-lang="en-US">
                                            {!! old('committeeEn') !!}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 padding-top-15">
                                        <label>@lang('admin.speakers')</label>
                                        <textarea name="speakers" class="summernote form-control" data-height="200" data-lang="en-US">
                                            {!! old('speakers') !!}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 padding-top-15">
                                        <label>@lang('admin.speakers') (En)</label>
                                        <textarea name="speakersEn" class="summernote form-control" data-height="200" data-lang="en-US">
                                            {!! old('speakersEn') !!}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 padding-top-15">
                                        <label>@lang('admin.comments')</label>
                                        <textarea name="comments" class="summernote form-control" data-height="200" data-lang="en-US">
                                            {!! old('comments') !!}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 padding-top-15">
                                        <label>@lang('admin.comments') (En)</label>
                                        <textarea name="commentsEn" class="summernote form-control" data-height="200" data-lang="en-US">
                                            {!! old('commentsEn') !!}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 padding-top-15">
                                        <label>@lang('admin.contact')</label>
                                        <textarea name="contact" class="summernote form-control" data-height="200" data-lang="en-US">
                                            {!! old('contact') !!}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 padding-top-15">
                                        <label>@lang('admin.contact') (En)</label>
                                        <textarea name="contactEn" class="summernote form-control" data-height="200" data-lang="en-US">
                                            {!! old('contactEn') !!}
                                        </textarea>
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