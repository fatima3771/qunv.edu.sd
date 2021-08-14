<script>
    <?php if(isset($parent)): ?>
        <?php if($data->count() == 0): ?>
            Swal.fire({
                icon: 'warning',
                title: 'عفواً، لا يوجد بيانات حالياً',
                html: '<a href="<?php echo e(mtGetRoute('create','mtCPanel.'.$page, $parent->id)); ?>" class="btn btn-md btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->getFromJson('admin.addNewItem'); ?> </a>',
                showConfirmButton: false,
            })
        <?php endif; ?>
        <?php if(old('added')): ?>
            Swal.fire({
                icon: 'success',
                title: 'تمت إضافة البيانات بنحاج',
                html: '<a href="<?php echo e(mtGetRoute('create','mtCPanel.'.$page, $parent->id)); ?>" class="btn btn-md btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->getFromJson('admin.addNewItem'); ?> </a>',
            })
        <?php endif; ?>
    <?php endif; ?>
    <?php if(!isset($parent)): ?>
        <?php if($data->count() == 0): ?>
            Swal.fire({
                icon: 'warning',
                title: 'عفواً، لا يوجد بيانات حالياً',
                html: '<a href="<?php echo e(mtGetRoute('create','mtCPanel.'.$page)); ?>" class="btn btn-md btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->getFromJson('admin.addNewItem'); ?> </a>',
                showConfirmButton: false,
            })
        <?php endif; ?>
        <?php if(old('added')): ?>
            Swal.fire({
                icon: 'success',
                title: 'تمت إضافة البيانات بنحاج',
                html: '<a href="<?php echo e(mtGetRoute('create','mtCPanel.'.$page)); ?>" class="btn btn-md btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->getFromJson('admin.addNewItem'); ?> </a>',
            })
        <?php endif; ?>
    <?php endif; ?>
    <?php if(old('updated')): ?>
        Swal.fire({
            icon: 'success',
            title: 'تم التعديل بنجاح',
            showConfirmButton: false,
            timer: 3000
        })
    <?php endif; ?>
    <?php if(old('deleted')): ?>
        Swal.fire({
            icon: 'success',
            title: 'تم الحذف بنجاح',
            showConfirmButton: false,
            timer: 3000
        })
    <?php endif; ?>
    <?php if(old('paymentCancelled')): ?>
        Swal.fire({
            icon: 'error',
            title: 'لقد قمت بإلغاء عملية الدفع، يرجى المحاولة مرة أخرى',
            showConfirmButton: false,
            timer: 3000
        })
    <?php endif; ?>
</script>