<?php $__env->startSection('php'); ?>
    <?php 
		$page = 'conferences';
        $folder = 'public/includes/conferences';
        $pic_dimensions =  " أبعاد الصورة (العرض:1000px - الطول:300px)";
     ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
		<li>
			<i class="fa fa-home"></i>
			<a href="<?php echo e(request()->root()); ?>/mtCPanel"><?php echo app('translator')->getFromJson('admin.cpanel'); ?></a>
		</li>
		<li><a href="<?php echo e(mtGetRoute('index','mtCPanel.'.$page)); ?>"><?php echo app('translator')->getFromJson('admin.'.$page); ?></a></li>
		<li class="active"><?php echo app('translator')->getFromJson('admin.edit'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-title'); ?>
	<?php echo app('translator')->getFromJson('admin.'.$page); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
					<strong><?php echo app('translator')->getFromJson('admin.'.$page); ?> - <?php echo app('translator')->getFromJson('admin.edit'); ?></strong> <!-- panel title -->
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
				<form action="<?php echo e(mtGetRoute('update','mtCPanel.'.$page, $data->id)); ?>" method="post" enctype="multipart/form-data" data-success="Sent! Thank you!" data-toastr-position="top-right">
					<input name="_method" type="hidden" value="PUT">
					<?php echo e(csrf_field()); ?>

                    <fieldset>
                        <div class="row">
                            <div class="col-md-8">
								<?php echo mtTextField(__('admin.title'),'title',$data->title,$errors,['isFirst'=>true]); ?>

								<?php echo mtTextField(__('admin.titleEn'),'titleEn',$data->titleEn,$errors); ?>

								<?php echo mtTextAreaField(__('admin.details'),'txt',$data->txt,$errors); ?>

								<?php echo mtTextAreaField(__('admin.detailsEn'),'txtEn',$data->txtEn,$errors); ?>

								<?php echo mtTextField(__('admin.country'),'country',$data->country,$errors); ?>

								<?php echo mtTextField(__('admin.countryEn'),'countryEn',$data->countryEn,$errors); ?>

								<?php echo mtTextField(__('admin.city'),'city',$data->city,$errors); ?>

								<?php echo mtTextField(__('admin.cityEn'),'cityEn',$data->cityEn,$errors); ?>

								<?php echo mtTextField(__('admin.address'),'address',$data->address,$errors); ?>

								<?php echo mtTextField(__('admin.addressEn'),'addressEn',$data->addressEn,$errors); ?>

								<?php echo mtTextField(__('admin.start_at'),'start_at',$data->start_at,$errors,['type'=>'date']); ?>

								<?php echo mtTextField(__('admin.end_at'),'end_at',$data->end_at,$errors,['type'=>'date']); ?>

								<?php echo mtTextField(__('admin.dataEntry'),'dataEntry',$data->dataEntry,$errors); ?>


                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12">
                                        <label><?php echo app('translator')->getFromJson('admin.picture'); ?></label>
                                        <div action="" method="post" class="dropzone" id="my-dropzone">
                                            <input type="hidden" id="picture" name="picture" value="<?php echo e($data->picture); ?>">
                                            <h4>أفلت الملفات هنا، أو إضغط هنا <?php if(isset($pic_dimensions)): ?><br> <small><?php echo e($pic_dimensions); ?></small><?php endif; ?></h4>
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
								<?php echo app('translator')->getFromJson('admin.edit'); ?>
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript">
		loadScript(plugin_path + 'dropzone/dropzone.js', function() {

			// Dropzone.autoDiscover = false;

			var token = "<?php echo csrf_token(); ?>";
            var id = parseInt("<?php echo e($data->id); ?>");
            var uplaod_url = "<?php echo e(route('mtCPanel.dropzone.upload')); ?>";
            var get_files_url = "<?php echo e(route('mtCPanel.'.$page.'.dropzone')); ?>";
            var remove_url = "<?php echo e(route('mtCPanel.'.$page.'.dropzone.remove')); ?>";
            var folder = "<?php echo e($folder); ?>";
			
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
						success: function(data){
							$("#picture").val('');
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
        <?php if(old('updated')): ?>
            _toastr("تم التعديل بنجاح","top-center","success",false);
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mtCPanel.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>