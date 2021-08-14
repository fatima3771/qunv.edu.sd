<?php $__env->startSection('php'); ?>
	<?php 
        $page_title = "issues_topics";
        $parentPage_title = "issues";
        $gParentPage_title = "magazines";
        $childPage = "topics";
        $parentPage = "issues";
        $gParentPage = "magazines";
        $page = $gParentPage.'.'.$parentPage.'.'.$childPage;
     ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
		<li>
			<i class="fa fa-home"></i>
			<a href="<?php echo e(request()->root()); ?>/mtCPanel"><?php echo app('translator')->getFromJson('admin.cpanel'); ?></a>
		</li>
		<li> <a href="<?php echo e(mtGetRoute('index','mtCPanel.'.$gParentPage)); ?>"><?php echo app('translator')->getFromJson('admin.'.$gParentPage_title); ?></a> </li>
		<li> <a href="<?php echo e(mtGetRoute('show','mtCPanel.'.$gParentPage,$gParent->id)); ?>"><?php echo e($gParent->title); ?></a></li>
		<li> <a href="<?php echo e(mtGetRoute('index','mtCPanel.'.$gParentPage.'.'.$parentPage,$gParent->id)); ?>"><?php echo app('translator')->getFromJson('admin.'.$parentPage_title); ?></a> </li>
		<li> <a href="<?php echo e(mtGetRoute('show','mtCPanel.'.$gParentPage.'.'.$parentPage,$gParent->id,$parent->id)); ?>"><?php echo e($parent->title); ?></a> </li>
		<li class="active"><?php echo app('translator')->getFromJson('admin.'.$page_title); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-title'); ?>
	<?php echo app('translator')->getFromJson('admin.'.$page_title); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row">
		<div id="panel-1" class="panel panel-default">
			<div class="panel-heading">
				<span class="title elipsis">
					<strong><?php echo app('translator')->getFromJson('admin.'.$page_title); ?></strong> <a href="<?php echo e(mtGetRoute('show','mtCPanel.'.$gParentPage.'.'.$parentPage,$gParent->id,$parent->id)); ?>">- <?php echo e($parent->title); ?></a>
				</span>

				<!-- right options -->
				<ul class="options pull-left list-inline">
					<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
					<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
					<li><a href="<?php echo e(mtGetRoute('create','mtCPanel.'.$page, $gParent->id, $parent->id)); ?>" class="btn btn-xs btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->getFromJson('admin.addNewItem'); ?> </a></li>
				</ul>
				<!-- /right options -->

			</div>

			<div class="panel-body">
				<div class="table-responsive">
					<?php echo e($data->links()); ?>

					<table class="table table-striped table-bordered table-hover nomargin">
						<thead>
							<tr>
								<th>#</th>
								<th><?php echo app('translator')->getFromJson('admin.title'); ?></th>
								<th><?php echo app('translator')->getFromJson('admin.control'); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($d->id); ?></td>
									<td><?php echo e($d->title); ?></td>
									<td width="22%">
										<a href="<?php echo e(mtGetRoute('show','mtCPanel.'.$page, $gParent->id, $parent->id, $d->id)); ?>" class="btn btn-aqua btn-xs btn-3d btn-reveal"><i class="fa fa-eye white"></i> <span>عرض</span> </a>
										<a href="<?php echo e(mtGetRoute('edit','mtCPanel.'.$page, $gParent->id, $parent->id, $d->id)); ?>" class="btn btn-yellow btn-xs btn-3d btn-reveal"><i class="fa fa-edit white"></i> <span>تحرير</span> </a>
										<?php if(auth()->guard('admin')->user()->hasActionPriv('magazines','delete')): ?>
											<a data-route="<?php echo e(mtGetRoute('destroy','mtCPanel.'.$page, $gParent->id, $parent->id, $d->id)); ?>" class="deleteBtn btn btn-red btn-xs btn-3d btn-reveal"><i class="fa fa-times white"></i> <span>حذف</span> </a>
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
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
		Swal.fire({
			title: 'هل أنت متأكد?',
			text: "سوف يتم مسح البيانات!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'نعم، قم بعملية المسح!'
			}).then((result) => {
			if (result.value) {
				$.ajax({
					url: route,
					type: 'DELETE',
					dataType: "JSON",
					data: {
						"_token": "<?php echo e(csrf_token()); ?>"
					},
					success: function(result) {
						window.open('<?php echo e(mtGetRoute("index","mtCPanel.".$page,$gParent->id, $parent->id)); ?>','_self');
					}
				});
			}
		})
	});
</script>
<?php echo $__env->make('mtCPanel.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mtCPanel.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>