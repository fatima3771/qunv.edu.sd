<?php $__env->startSection('php'); ?>
    <?php 
        $page = "pages";
     ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
		<li>
			<i class="fa fa-home"></i>
			<a href="<?php echo e(request()->root()); ?>/mtCPanel"><?php echo app('translator')->getFromJson('admin.cpanel'); ?></a>
		</li>
		<li class="active"><?php echo app('translator')->getFromJson('admin.'.$page); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-title'); ?>
	<?php echo app('translator')->getFromJson('admin.'.$page); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
	<div class="row">
		<div id="panel-1" class="panel panel-default">
			<div class="panel-heading">
				<span class="title elipsis">
					<strong><?php echo app('translator')->getFromJson('admin.'.$page); ?></strong> <!-- panel title -->
				</span>

				<!-- right options -->
				<ul class="options pull-left list-inline">
					<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
					<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
					<li><a href="<?php echo e(mtGetRoute('create','mtCPanel.'.$page)); ?>" class="btn btn-xs btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->getFromJson('admin.addNewItem'); ?> </a></li>
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
								<th><?php echo app('translator')->getFromJson('admin.parentPage'); ?></th>
								<th><?php echo app('translator')->getFromJson('admin.link'); ?></th>
								<th><?php echo app('translator')->getFromJson('admin.status'); ?></th>
								<th><?php echo app('translator')->getFromJson('admin.order'); ?></th>
								<th><?php echo app('translator')->getFromJson('admin.control'); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($d->id); ?></td>
									<td><?php echo e($d->title); ?></td>
									<td><?php if(isset($d->parent)): ?> <?php echo e($d->parent->title); ?> <?php endif; ?></td>
									<td><?php echo e($d->link); ?></td>
									<td>
										<?php if($d->publish == 1): ?> 
											<span class="label label-success"> <i class="fa fa-eye" aria-hidden="true"></i> ?????????? </span> 
										<?php else: ?> 
											<span class="label label-warning"> <i class="fa fa-eye-slash" aria-hidden="true"></i> ?????? ?????????? </span> 
										<?php endif; ?>
									</td>
									<td><?php echo e($d->order); ?></td>
									<td width="22%">
										<a href="<?php echo e(mtGetRoute('show','mtCPanel.'.$page, $d->id)); ?>" class="btn btn-aqua btn-xs btn-3d btn-reveal"><i class="fa fa-eye white"></i> <span>??????</span> </a>
										<a href="<?php echo e(mtGetRoute('edit','mtCPanel.'.$page, $d->id)); ?>" class="btn btn-yellow btn-xs btn-3d btn-reveal"><i class="fa fa-edit white"></i> <span>??????????</span> </a>
										<?php if(!$d->hasChild()): ?>
											<a data-route="<?php echo e(mtGetRoute('destroy','mtCPanel.'.$page, $d->id)); ?>" class="deleteBtn btn btn-red btn-xs btn-3d btn-reveal"><i class="fa fa-times white"></i> <span>??????</span> </a>
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
				title: '???? ?????? ???????????',
				text: "?????? ?????? ?????? ????????????????!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: '???????? ???? ???????????? ??????????!'
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
							window.open('<?php echo e(request()->root()); ?>/mtCPanel/<?php echo e($page); ?>','_self');
						}
					});
				}
			})
		});
	</script>
	<?php echo $__env->make('mtCPanel.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mtCPanel.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>