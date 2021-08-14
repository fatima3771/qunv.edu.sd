@extends('mtCPanel.layouts.master')

@section('php')
    @php
		$page = 'members';
        $folder = 'public/includes/members';
        $pic_dimensions =  " أبعاد الصورة (العرض:500px - الطول:500px)";
    @endphp
@endsection

@section('breadcrumb')
		<li>
			<i class="fa fa-home"></i>
			<a href="{{  request()->root() }}/mtCPanel">@lang('admin.cpanel')</a>
		</li>
		<li><a href="{{ mtGetRoute('index','mtCPanel.'.$page) }}">@lang('admin.'.$page)</a></li>
		<li class="active">@lang('admin.edit')</li>
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
					<strong>@lang('admin.'.$page) - @lang('admin.edit')</strong> <!-- panel title -->
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
				<form action="{{ mtGetRoute('update','mtCPanel.'.$page, $data->id) }}" method="post" enctype="multipart/form-data" data-success="Sent! Thank you!" data-toastr-position="top-right">
					<input name="_method" type="hidden" value="PUT">
					{{ csrf_field() }}
                    <fieldset>
                        <div class="row">
                            <div class="col-md-8">
								<div class="row">
									<!-- tabs nav -->
									<ul class="nav nav-tabs nav-justified">
										<li class="active"><!-- TAB 1 -->
											<a href="#memebrData" data-toggle="tab">بيانات العضوية</a>
										</li>
										<li class=""><!-- TAB 2 -->
											<a href="#memberAcademic" data-toggle="tab"> البيانات الأكاديمية </a>
										</li>
										@if($data->is_graduate == 1)
											<li class=""><!-- TAB 3 -->
												<a href="#memberJob" data-toggle="tab"> بيانات العمل </a>
											</li>
											<li class=""><!-- TAB 4 -->
												<a href="#memberRegistrationRecord" data-toggle="tab"> بيانات السجل الطبي </a>
											</li>
										@endif
									</ul>
									<!-- /tabs nav -->
								</div>

								<!-- tabs content -->
								<div class="tab-content transparent">

									<div id="memebrData" class="tab-pane active"><!-- TAB 1 CONTENT -->
										<h3> البيانات العامة </h3>
										<div class="form-group">
											<div class="col-md-12 col-sm-12">
												<label>@lang('admin.name')</label>
												<input type="text" name="name" value="{{ $data->name }}" class="form-control required {{ $errors->has('name')? 'error' : '' }}">
												@if ($errors->has('name'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('name') }}</strong>
													</span>
												@endif
											</div>
										</div>
		
										<div class="form-group">
											<div class="col-md-12 col-sm-12 padding-top-15">
												<label>@lang('admin.nameEn')</label>
												<input type="text" name="nameEn" value="{{ $data->nameEn }}" class="form-control required {{ $errors->has('nameEn')? 'error' : '' }}">
												@if ($errors->has('nameEn'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('nameEn') }}</strong>
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
												<input type="text" name="phone_no" value="{{ $data->phone_no }}" class="form-control required {{ $errors->has('phone_no')? 'error' : '' }}">
												@if ($errors->has('phone_no'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('phone_no') }}</strong>
													</span>
												@endif
											</div>
										</div>
		
										<div class="form-group">
											<div class="col-md-12 col-sm-12 padding-top-15">
												<label>@lang('admin.whatsapp')</label>
												<input type="text" name="whatsapp_no" value="{{ $data->whatsapp_no }}" class="form-control required {{ $errors->has('whatsapp_no')? 'error' : '' }}">
												@if ($errors->has('whatsapp_no'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('whatsapp_no') }}</strong>
													</span>
												@endif
											</div>
										</div>
		
										<div class="form-group">
											<div class="col-md-12 col-sm-12 padding-top-15">
												<label>@lang('admin.DOB')</label>
												<input type="text" name="DOB" value="{{ $data->DOB }}" class="form-control required {{ $errors->has('DOB')? 'error' : '' }}">
												@if ($errors->has('DOB'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('DOB') }}</strong>
													</span>
												@endif
											</div>
										</div>
		
										<div class="form-group">
											<div class="col-md-12 col-sm-12 padding-top-15">
												<label>@lang('admin.national_no')</label>
												<input type="text" name="national_no" value="{{ $data->national_no }}" class="form-control required {{ $errors->has('national_no')? 'error' : '' }}">
												@if ($errors->has('national_no'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('national_no') }}</strong>
													</span>
												@endif
											</div>
										</div>
		
										<div class="form-group">
											<div class="col-md-12 col-sm-12 padding-top-15">
												<label>@lang('admin.address')</label>
												<input type="text" name="address" value="{{ $data->address }}" class="form-control required {{ $errors->has('address')? 'error' : '' }}">
												@if ($errors->has('address'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('address') }}</strong>
													</span>
												@endif
											</div>
										</div>
										
										<div class="form-group">
											<div class="col-md-12 col-sm-12 padding-top-15">
												<label>@lang('admin.graduation_year')</label>
												<input type="text" name="graduation_year" value="{{ $data->academics->graduation_year }}" class="form-control required {{ $errors->has('graduation_year')? 'error' : '' }}">
												@if ($errors->has('graduation_year'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('graduation_year') }}</strong>
													</span>
												@endif
											</div>
										</div>
		
										<div class="form-group">
											<div class="col-md-12 col-sm-12 padding-top-15">
												<label>هل تأكدت من صحة بيانات العضو، وتود السماح له بدفع الرسوم؟</label>
												<input type="radio" name="confirmed" value="1" {{ ($data->confirmed == 1)? 'checked=""' : '' }}>
												<span>نعم</span>
												<input type="radio" name="confirmed" value="0" {{ ($data->confirmed != 1)? 'checked=""' : '' }}>
												<span>لا</span>
												@if ($errors->has('confirmed'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('confirmed') }}</strong>
													</span>
												@endif
											</div>
										</div>		
									</div><!-- /TAB 1 CONTENT -->

									<div id="memberAcademic" class="tab-pane"><!-- TAB 2 CONTENT -->
										<h3>البيانات الأكاديمية</h3>

										<div class="form-group">
											<div class="col-md-12 col-sm-12">
												<label>@lang('admin.university_id')</label>
												<select name="university_id" class="form-control pointer required">
													<option value="0" {{ ($data->academics->university_id == 0)? 'selected' : '' }} disabled="disabled"> اختر الجامعة </option>
													@foreach (App\University::get() as $u)
														<option value="{{ $u->id }}" {{ ($data->academics->university_id == $u->id)? 'selected' : '' }}> {{ $u->title }} </option>
													@endforeach
												</select>
											</div>
										</div>

										@if($data->is_graduate == 1)
											<div class="form-group">
												<div class="col-md-12 col-sm-12 padding-top-15">
													<label>@lang('admin.academic_degree_id')</label>
													<select name="academic_degree_id" class="form-control pointer required">
														<option value="0" {{ ($data->academics->academic_degree_id == 0)? 'selected' : '' }} disabled="disabled"> اختر الدرجة العلمية </option>
														@foreach (App\AcademicDegree::get() as $ad)
															<option value="{{ $ad->id }}" {{ ($data->academics->academic_degree_id == $ad->id)? 'selected' : '' }}> {{ $ad->title }} </option>
														@endforeach
													</select>
												</div>
											</div>

											<div class="form-group">
												<div class="col-md-12 col-sm-12 padding-top-15">
													<label>@lang('admin.graduation_year')</label>
													<input type="text" name="graduation_year" value="{{ $data->academics->graduation_year }}" class="form-control required {{ $errors->has('graduation_year')? 'error' : '' }}">
													@if ($errors->has('graduation_year'))
														<span class="help-block text-danger">
															<strong>{{ $errors->first('graduation_year') }}</strong>
														</span>
													@endif
												</div>
											</div>
										@else
											<div class="form-group">
												<div class="col-md-12 col-sm-12 padding-top-15">
													<label>@lang('admin.level')</label>
													<select name="level" class="form-control pointer">
														<option value="" {{ ($data->academics->level == '')? 'selected' : '' }} disabled="disabled"> اختر المستوى </option>
														<option value="1" {{ ($data->academics->level == 1)? 'selected' : '' }}>المستوى الأول</option>
														<option value="2" {{ ($data->academics->level == 2)? 'selected' : '' }}>المستوى الثاني</option>
														<option value="3" {{ ($data->academics->level == 3)? 'selected' : '' }}>المستوى الثالث</option>
														<option value="4" {{ ($data->academics->level == 4)? 'selected' : '' }}>المستوى الرابع</option>
														<option value="5" {{ ($data->academics->level == 5)? 'selected' : '' }}>المستوى الخامس</option>
														<option value="6" {{ ($data->academics->level == 6)? 'selected' : '' }}>المستوى السادس</option>
													</select>
												</div>
											</div>	
										@endif	
				
									</div><!-- /TAB 2 CONTENT -->
									@if($data->is_graduate == 1)
										<div id="memberJob" class="tab-pane"><!-- TAB 3 CONTENT -->
											<h3>بيانات العمل</h3>
											<div class="form-group">
												<div class="col-md-12 col-sm-12">
													<label>@lang('admin.job')</label>
													<input type="text" name="job" value="{{ (isset($data->jobs))? $data->jobs->job : '' }}" class="form-control required {{ $errors->has('job')? 'error' : '' }}">
													@if ($errors->has('job'))
														<span class="help-block text-danger">
															<strong>{{ $errors->first('job') }}</strong>
														</span>
													@endif
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-12 col-sm-12 padding-top-15">
													<label>@lang('admin.company')</label>
													<input type="text" name="company" value="{{ (isset($data->jobs))? $data->jobs->company : '' }}" class="form-control required {{ $errors->has('company')? 'error' : '' }}">
													@if ($errors->has('company'))
														<span class="help-block text-danger">
															<strong>{{ $errors->first('company') }}</strong>
														</span>
													@endif
												</div>
											</div>
										</div><!-- /TAB 3 CONTENT -->

										<div id="memberRegistrationRecord" class="tab-pane"><!-- TAB 4 CONTENT -->
											<h3>بيانات السجل الطبي</h3>
											<div class="form-group">
												<div class="col-md-12 col-sm-12">
													<label>@lang('admin.registration_record_type_id')</label>
													<select name="registration_record_type_id" class="form-control pointer required">
														<option value="0" @if(isset($data->registrationRecords)) {{ ($data->registrationRecords->registration_record_type_id == 0)? 'selected' : '' }} @endif disabled="disabled"> اختر نوع التسجيل </option>
														@foreach (App\RegistrationRecordType::get() as $rrt)
															<option value="{{ $rrt->id }}" @if(isset($data->registrationRecords)) {{ ($data->registrationRecords->registration_record_type_id == $rrt->id)? 'selected' : '' }} @endif > {{ $rrt->title }} </option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-12 col-sm-12">
													<label>@lang('admin.record_no')</label>
													<input type="text" name="record_no" value="{{ (isset($data->registrationRecords))? $data->registrationRecords->record_no : '' }}" class="form-control required {{ $errors->has('record_no')? 'error' : '' }}">
													@if ($errors->has('record_no'))
														<span class="help-block text-danger">
															<strong>{{ $errors->first('record_no') }}</strong>
														</span>
													@endif
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-12 col-sm-12 padding-top-15">
													<label>@lang('admin.record_date')</label>
													<input type="date" name="record_date" value="{{ (isset($data->registrationRecords))? $data->registrationRecords->record_date : '' }}" class="form-control required {{ $errors->has('record_date')? 'error' : '' }}">
													@if ($errors->has('record_date'))
														<span class="help-block text-danger">
															<strong>{{ $errors->first('record_date') }}</strong>
														</span>
													@endif
												</div>
											</div>
										</div><!-- /TAB 4 CONTENT -->
									@endif

								</div>
								<!-- /tabs content -->

                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12">
                                        <label>@lang('admin.picture')</label>
                                        <div action="" method="post" class="dropzone" id="my-dropzone">
                                            <input type="hidden" id="picture" name="picture" value="{{ $data->picture }}">
                                            <h4>أفلت الملفات هنا، أو إضغط هنا @if(isset($pic_dimensions))<br> <small>{{ $pic_dimensions }}</small>@endif</h4>
                                            <div class="dz-message" data-dz-message></div>
                                        </div>
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