<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Select Chords</title>
    </head>
    <body>
        <label for="first-chord">Choose a first-chord:</label>
        <select name="pets" id="first-chord">
            <option value="">--Please choose an option--</option>
            <?php $__currentLoopData = $chords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($chord->name); ?>"><?php echo e($chord->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/dortmund/resources/views/welcome.blade.php ENDPATH**/ ?>