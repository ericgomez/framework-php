<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('sidebar'); ?>
    ##parent-placeholder-19bd1503d9bad449304cc6b4e977b74bac6cc771##
    <p>Más contenido del sidebar</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(isset($user)): ?>
        <?php echo e($user->nameAndEmail); ?>

    <?php else: ?>
        No existe el usuario
    <?php endif; ?>

    <p><?php echo e(appName()); ?></p>

    <h2 class="text-center text-muted">Listado de Posts</h2>

    <?php $__empty_1 = true; $__currentLoopData = $user->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <p>Título: <?php echo e($post->title); ?>, Body: <?php echo e($post->body); ?></p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="alert alert-danger">No hay posts para este usuario</div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>