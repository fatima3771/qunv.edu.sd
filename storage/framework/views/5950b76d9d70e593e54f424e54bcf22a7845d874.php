<?php $__env->startSection('php'); ?>
    <?php 
        $page = "colleges";
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
								<th><?php echo app('translator')->getFromJson('admin.category'); ?></th>
								<th><?php echo app('translator')->getFromJson('admin.title'); ?></th>
								<th><?php echo app('translator')->getFromJson('admin.titleEn'); ?></th>
								<th><?php echo app('translator')->getFromJson('admin.slug'); ?></th>
								<th><?php echo app('translator')->getFromJson('admin.departments'); ?></th>
								<th><?php echo app('translator')->getFromJson('admin.control'); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									
									<td><?php echo e($d->id); ?></td>
									<td><?php echo e($d->type->title); ?></td>
									<td><?php echo e($d->title); ?></td>
									<td><?php echo e($d->titleEn); ?></td>
									<td><?php echo e($d->slug); ?></td>
									<td>
										<a href="<?php echo e(mtGetRoute('index','mtCPanel.'.$page.'.'.'details', $d->id)); ?>" class="btn btn-primary btn-xs btn-3d btn-reveal"><i class="fa fa-exclamation white"></i> <span> <?php echo app('translator')->getFromJson('admin.colleges_details'); ?> </span> </a>
										<a href="<?php echo e(mtGetRoute('index','mtCPanel.'.$page.'.'.'extraContents', $d->id)); ?>" class="btn btn-info btn-xs btn-3d btn-reveal"><i class="fa fa-list white"></i> <span> <?php echo app('translator')->getFromJson('admin.colleges_extraContents'); ?> </span> </a>
										<a href="<?php echo e(mtGetRoute('index','mtCPanel.'.$page.'.'.'departments', $d->id)); ?>" class="btn btn-warning btn-xs btn-3d btn-reveal"><i class="fa fa-square-o white"></i> <span> <?php echo app('translator')->getFromJson('admin.colleges_departments'); ?> </span> </a>
										<a href="<?php echo e(mtGetRoute('index','mtCPanel.'.$page.'.'.'staff', $d->id)); ?>" class="btn btn-danger btn-xs btn-3d btn-reveal"><i class="fa fa-user white"></i> <span> <?php echo app('translator')->getFromJson('admin.colleges_staff'); ?> </span> </a>
										<a href="<?php echo e(mtGetRoute('index','mtCPanel.'.$page.'.'.'news', $d->id)); ?>" class="btn btn-success btn-xs btn-3d btn-reveal"><i class="fa fa-quote-left white"></i> <span> <?php echo app('translator')->getFromJson('admin.colleges_news'); ?> </span> </a>
										<a href="<?php echo e(mtGetRoute('index','mtCPanel.'.$page.'.'.'slider', $d->id)); ?>" class="btn btn-primary btn-xs btn-3d btn-reveal"><i class="fa fa-picture-o white"></i> <span> <?php echo app('translator')->getFromJson('admin.colleges_slider'); ?> </span> </a>
									</td>
									<td width="25%">
										<a href="<?php echo e(mtGetRoute('show','mtCPanel.'.$page, $d->id)); ?>" class="btn btn-aqua btn-xs btn-3d btn-reveal"><i class="fa fa-eye white"></i> <span>عرض</span> </a>
										<a href="<?php echo e(mtGetRoute('edit','mtCPanel.'.$page, $d->id)); ?>" class="btn btn-yellow btn-xs btn-3d btn-reveal"><i class="fa fa-edit white"></i> <span>تحرير</span> </a>
										
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