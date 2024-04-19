

<?php $__env->startSection('content'); ?>
<form action="<?php echo e(url('/vendor/delete')); ?>" method="POST" style="display: flex; align-items: center; margin-bottom: 20px;">
    <?php echo csrf_field(); ?>
    <input type="number" name="vendor_id" min="1" step="1" required placeholder="Enter Vendor ID" style="flex: 1;">
    <button type="submit" style="margin-left: 10px;">Delete</button>
</form>

<?php if(session('error')): ?>
    <div style="color: red;">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Account Number</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($vendor->id); ?></td>
                <td><?php echo e($vendor->email); ?></td>
                <td><?php echo e($vendor->name); ?></td>
                <td>
                    <form action="<?php echo e(url('/vendor/update/'.$vendor->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <input type="text" name="phone_number" value="<?php echo e($vendor->phone_number); ?>" onchange="this.form.submit()">
                    </form>
                </td>
                <td>
                    <form action="<?php echo e(url('/vendor/update/'.$vendor->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <input type="text" name="address" value="<?php echo e($vendor->address); ?>" onchange="this.form.submit()">
                    </form>
                </td>
                <td>
                    <form action="<?php echo e(url('/vendor/update/'.$vendor->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <input type="text" name="accountNumber" value="<?php echo e($vendor->accountNumber); ?>" onchange="this.form.submit()">
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    th {
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: #4CAF50;
        color: white;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        text-align: center;
    }

    /* Style the input field */
    input[type=number], input[type=text] {
        width: 100%;
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 16px;
    }

    /* Style the submit button */
    button[type=submit] {
        background-color: #7dd197;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    /* Change the submit button color on hover */
    button[type=submit]:hover {
        background-color: #45a049;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\nur29\OneDrive\Escritorio\Laravel\G4-05-Cowy_Carnivory\DSS-Second-Delivery\Work-Project\resources\views/vendors/index.blade.php ENDPATH**/ ?>