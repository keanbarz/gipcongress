<?php
  $error_number = 500;
?>

<?php $__env->startSection('title'); ?>
  <?php echo e(trans('backpack::base.error.500')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('description'); ?>
  <?php echo $exception?->getMessage() ? e($exception->getMessage()) : trans('backpack::base.error.message_500'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(backpack_view('errors.layout'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\IMSD-CASHIER\learning\vendor/backpack/crud/src/resources/views/ui/errors/500.blade.php ENDPATH**/ ?>