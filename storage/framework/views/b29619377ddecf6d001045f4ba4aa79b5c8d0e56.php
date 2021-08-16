<?php $__env->startSection('php'); ?>
    <?php         
        $page_title = "conferences_pictures";
        $parentPage_title = "conferences";
        $childPage = "pictures";
        $parentPage = "conferences";
        $page = $parentPage.".".$childPage;
        $parent = $data->conference;
     ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
        <li>
            <i class="fa fa-home"></i>
            <a href="<?php echo e(request()->root()); ?>/mtCPanel"><?php echo app('translator')->getFromJson('admin.cpanel'); ?></a>
        </li>
        <li> <a href="<?php echo e(mtGetRoute('index','mtCPanel.'.$parentPage)); ?>"><?php echo app('translator')->getFromJson('admin.'.$parentPage_title); ?></a> </li>
        <li> <a href="<?php echo e(mtGetRoute('show','mtCPanel.'.$parentPage,$parent->id)); ?>"><?php echo e($parent->title); ?></a> </li>
        <li> <a href="<?php echo e(mtGetRoute('index','mtCPanel.'.$page,$parent->id)); ?>"><?php echo app('translator')->getFromJson('admin.'.$page_title); ?></a> </li>
        <li class="active"><?php echo e($data->title); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-title'); ?>
	<?php echo app('translator')->getFromJson('admin.'.$page_title); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
	<div class="row">
		<div id="panel-1" class="panel panel-default">
			<div class="panel-heading">
				<span class="title elipsis">
					<strong><?php echo app('translator')->getFromJson('admin.'.$page_title); ?> - <?php echo app('translator')->getFromJson('admin.display'); ?></strong> - <?php echo e($parent->title); ?>

				</span>

				<!-- right options -->
				<ul class="options pull-left list-inline">
					<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
					<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
					<li><a href="<?php echo e(mtGetRoute('edit','mtCPanel.'.$page, $parent->id, $data->id)); ?>" class="btn btn-warning btn-xs btn-3d btn-reveal" style="margin-right:10px; margin-left:10px; padding:0px 20px;"><i class="fa fa-edit white"></i> <span>تعديل</span> </a></li>
                    <li><a data-route="<?php echo e(mtGetRoute('destroy','mtCPanel.'.$page, $parent->id, $data->id)); ?>" data-afterdeleteurl="<?php echo e(request()->root()); ?>/mtCPanel/<?php echo e($parentPage); ?>/<?php echo e($parent->id); ?>/<?php echo e($childPage); ?>" class="deleteBtn btn btn-danger btn-xs btn-3d btn-reveal" style="margin-right:10px; margin-left:10px; padding:0px 20px;"><i class="fa fa-times white"></i> <span>حذف</span> </a></li>
					
				</ul>
				<!-- /right options -->

			</div>

			<!-- panel content -->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped nomargin">
						<tbody>
                            <tr>
                                <th width="20%">#</th>
                                <td><?php echo e($data->id); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('admin.picture'); ?></th>
                                <td><img src='<?php echo e($data->getPicture()); ?>' class="thumbnail img-responsive" /></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('admin.caption'); ?></th>
                                <td><?php echo e($data->caption); ?></td>
                            </tr>
                            
                            
						</tbody>
						<tfoot>
							<tr>
                                <th><?php echo app('translator')->getFromJson('admin.control'); ?></th>
                                <td>
                                    <a href="<?php echo e(mtGetRoute('edit','mtCPanel.'.$page, $parent->id, $data->id)); ?>" class="btn btn-yellow btn-xs btn-3d btn-reveal"><i class="fa fa-edit white"></i> <span>تحرير</span> </a>
                                    <a 	data-route="<?php echo e(route('mtCPanel.'.$page.'.destroy', ['parent_id' => $parent->id, 'id' => $data->id])); ?>" 
                                        data-afterdeleteurl="<?php echo e(request()->root()); ?>/mtCPanel/<?php echo e($parentPage); ?>/<?php echo e($parent->id); ?>/<?php echo e($childPage); ?>" 
                                        class="deleteBtn btn btn-danger btn-xs btn-3d btn-reveal">
                                        <i class="fa fa-times white"></i> <span>حذف</span>
                                    </a>
                                </td>
                            </tr>

						</tfoot>
					</table>
				</div>
			</div>
		</div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $('.deleteBtn').on('click', function (){
            var route = $(this).data('route');
            var afterdeleteurl = $(this).data('afterdeleteurl');
            Swal.fire({
                title: 'هل أنت متأكد?',
                text: "سوف يتم مسح البيانات!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم، قم بعملية المسح!'
            }).then((result) => {
                if(result.value){
                    $.ajax({
                        url: route,
                        type: 'DELETE',
                        dataType: "JSON",
                        data: {
                            "_token": "<?php echo e(csrf_token()); ?>"
                        },
                        success: function(result) {
                            window.open(afterdeleteurl,'_self');
                        }
                    });
                }
            });
        });
    </script>
	<?php echo $__env->make('mtCPanel.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mtCPanel.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>