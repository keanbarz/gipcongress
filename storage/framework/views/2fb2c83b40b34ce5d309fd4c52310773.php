<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('Update Data')); ?>

        </h2>
        <style>
        /* Define styles for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            border: 1px solid #ddd; /* Add border to the entire table */
        }

        /* Style table headers */
        th {
            
            border: 1px solid #ddd; /* Add border to table header cells */
        }

        /* Style table data cells */
        /*td {
            border: 1px solid #ddd;  /* Add border to table data cells /
            padding: 8px;
            text-align: left;
        }*/

        /* Add some hover effect to table rows */
        tr:hover {
            background-color: blue;
        }
    </style>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: white">
                   <!-- <?php echo e(__("You're logged in!")); ?> -->
                   <!--<h2 >Saved Datas</h2>-->
                   <table>
    <thead>
        <tr>
            <th style="padding: 10px; min-width: unset;">ACTION</th>
            <th style="padding: 10px; min-width: unset;">ID</th>
            <th style="padding: 10px; min-width: unset;">DV Number</th>
            <th style="padding: 10px; min-width: unset;">ORS</th>
            <th style="padding: 10px; min-width: unset;">Payee</th>
            <th style="padding: 10px; min-width: unset;">Amount</th>
        </tr>
    </thead>
    <tbody>
            <tr>
            
                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><form method="post" action="/update/<?php echo e($data->id); ?>/save">
                    <?php echo csrf_field(); ?>
                    <button>Save</button></td>
                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($data->id); ?></td>
                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input type="text" name="updateDv" value="<?php echo e($data->dvNumber); ?>" style="color: black"></input></td>
                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input type="text" name="updateOrs" value="<?php echo e($data->ors); ?>" style="color: black"></input></td>
                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input type="text" name="updatePayee" value="<?php echo e($data->payee); ?>" style="color: black"></input></td>
                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input type="number" step="0.01" name="updateAmount" value="<?php echo e($data->amount); ?>" style="color: black"></input></td>
                </form>
            </tr>            
    </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\IMSD-CASHIER\learning\resources\views/update.blade.php ENDPATH**/ ?>