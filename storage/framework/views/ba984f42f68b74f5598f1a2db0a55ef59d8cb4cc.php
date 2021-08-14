<?php $__env->startSection('breadcrumb'); ?>
		<li>
			<i class="fa fa-home"></i>
			<a href="#"><?php echo app('translator')->getFromJson('site.home'); ?></a>
		</li>
		<li class="active">لوحة التحكم</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-title'); ?>
	لوحة التحكم
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">

    <!-- Panel Tabs -->
    <div id="panel-ui-tan-l1" class="panel panel-default">

        <div class="panel-heading">

            <!-- tabs nav -->
            <ul class="nav nav-tabs pull-right">
                <?php $i=0 ;?>
                <?php $__currentLoopData = Config::get("mtcpanel.dashboardMenuArr"); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $DBM): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="<?php if(($i++)==0): ?> active <?php endif; ?>"><!-- TAB 1 -->
                        <a href="#tab-<?php echo e($DBM['sectionID']); ?>" data-toggle="tab"> <?php echo e($DBM['sectionTitle']); ?> </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <!-- /tabs nav -->

        </div>
        <!-- panel content -->
        <div class="panel-body">

            <!-- tabs content -->
            <div class="tab-content transparent">
                <?php $j=0 ;?>
                <?php $__currentLoopData = Config::get("mtcpanel.dashboardMenuArr"); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $DBM): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div role="tab-<?php echo e($DBM['sectionID']); ?>" class="tab-pane <?php if(($j++)==0): ?> active <?php endif; ?>" id="tab-<?php echo e($DBM['sectionID']); ?>">
                        <?php $__currentLoopData = $DBM['menuData']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $DBMItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(auth()->guard('admin')->user()->hasMainPriv($DBMItem['menuID'])): ?>
                                <div class="col-md-3 col-sm-3 col-lg-3">
                                    <div class="box default"><!-- default, danger, warning, info, success -->
                                        <div class="box-title"><!-- add .noborder class if box-body is removed -->
                                            <h4><a href="<?php echo e(Request::root()); ?>/mtCPanel/<?php echo e($DBMItem['menuID']); ?>"><?php echo e(Lang::get("admin.".$DBMItem['menuID'])); ?></a></h4>
                                            <span class="block"><?php echo e(Lang::get("admin.".$DBMItem['menuID'])); ?></span>
                                            <i class="fa fa-<?php echo e($DBMItem['menuIcon']); ?>" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- /panel content -->
        </div>
        <!-- /Panel Tabs -->
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('mtCPanel.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>