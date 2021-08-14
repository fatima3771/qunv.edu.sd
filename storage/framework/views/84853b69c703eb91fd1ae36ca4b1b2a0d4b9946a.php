<nav id="sideNav"><!-- MAIN MENU -->
    <ul class="nav nav-list">
        <li>
            <a  class="dashboard1" href="<?php echo e(request()->root()); ?>">
                <i class="main-icon fa fa-home" aria-hidden="true"></i>
                <span> <?php echo app('translator')->getFromJson('site.home'); ?> </span>
            </a>
        </li>
        <li>
            <a href="<?php echo e(request()->root()); ?>/mtCPanel">
                <i class="main-icon fa fa-desktop" aria-hidden="true"></i>
                <span> حسابي </span>
            </a>
        </li>
        <?php $__currentLoopData = Config::get("mtcpanel.dashboardMenuArr"); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $DBM): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="active1">
                <a href="#">
                    <i class="fa fa-menu-arrow pull-left"></i>
                    <i class="main-icon fa fa-spin fa-cog"></i>
                    <span><?php echo e($DBM['sectionTitle']); ?></span>
                </a>
                <ul>
                    <?php $__currentLoopData = $DBM['menuData']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $DBMItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(auth()->guard('admin')->user()->hasMainPriv($DBMItem['menuID'])): ?>
                            <li class="<?php if(request()->segment(2) == $DBMItem['menuID']): ?> active <?php endif; ?>">
                                <a href="<?php echo e(request()->root()); ?>/mtCPanel/<?php echo e($DBMItem['menuID']); ?>">
                                    <i class="fa fa-<?php echo e($DBMItem['menuIcon']); ?>" aria-hidden="true"></i>
                                    <?php echo e(Lang::get('admin.'.$DBMItem['menuID'])); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</nav>
