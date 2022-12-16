<html>
    <head>
        <title>PHPLEAGUE - <?php echo $__env->yieldContent('title'); ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <?php $__env->startSection('sidebar'); ?>
                    <p>Primer texto del sidebar</p>
                <?php echo $__env->yieldSection(); ?>
            </div>

            <div class="col-9">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
    </body>
</html>
