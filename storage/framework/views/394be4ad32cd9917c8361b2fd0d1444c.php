<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <style>/*Table Styles*/
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

        /* Style table data cells 
        td {
        border: 1px solid #ddd;   //Add border to table data cells 
        padding: 8px;
        text-align: left;
        }*/

        /* Add some hover effect to table rows */
        tr:hover {
        background-color: yellow;
        }
    </style>
    <style>/*Buttons*/
        .dropbtn {
            background-color: green;
            color: white;
            min-width: 80px;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 10px;
            }
    </style>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>/*Show Tables */
        function showInput(trId) {
            $('#update_table').show();
            $('tr').hide();
            $('#truphead').show();
            $('#truphead1').show();
            $('#trmhead').show();
            $('#trmhead1').show();
            for (var i=1; i < 8; i++){
            $('#trmhead2' + i).show();}
            $('#' + trId).show(); // Show the selected input
        }
    </script>

    <?php if(Auth::user()->contest === 'all' || Auth::user()->contest === 'gcqb'): ?>
    <div class="py-12">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-9" id="update_table" style="display:none">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green">
                    <table>
                        <thead>
                            <tr id="truphead">
                            <th colspan="2" style="padding: 10px; min-width: unset;">GIP CONGRESS QUIZ BEE</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">ROUND 1 (1pt each)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">ROUND 2 (2pts each)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">ROUND 3 (3pts each)</th>
                            </tr>
                        </thead>
                        <thead>
                            <tr id="truphead1">
                            <th style="padding: 10px; min-width: unset;">Action</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                                <th style="padding: 8px; text-align: center;">Points</th>
                                <th style="padding: 8px; text-align: center;">Multplier</th>
                                <th style="padding: 8px; text-align: center;">Total</th>
                                <th style="padding: 8px; text-align: center;">Points</th>
                                <th style="padding: 8px; text-align: center;">Multiplier</th>
                                <th style="padding: 8px; text-align: center;">Total</th>
                                <th style="padding: 8px; text-align: center;">Points</th>
                                <th style="padding: 8px; text-align: center;">Multiplier</th>
                                <th style="padding: 8px; text-align: center;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $scoresud; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scoreud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="<?php echo e($scoreud->id); ?>" style="display:none">
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">
                                        <form method="post" action="/tabulate/gcqb/save/<?php echo e($scoreud ->id); ?>"><?php echo csrf_field(); ?>
                                        <?php if(Auth::user()->status === 'open'): ?>
                                            <button type="submit" class="dropbtn">Save</button>
                                        <?php else: ?> <?php echo e(__('TALLY CLOSED')); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><?php echo e($scoreud->office); ?></td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><input size="10" type="text" name="round1" value="<?php echo e($scoreud->round1); ?>" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">1</td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><?php echo e(($scoreud->round1)*1); ?></td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><input size="10" type="text" name="round2" value="<?php echo e($scoreud->round2); ?>" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">2</td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><?php echo e(($scoreud->round2)*2); ?></td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><input size="10" type="text" name="round3" value="<?php echo e($scoreud->round3); ?>" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">3</td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><?php echo e(($scoreud->round3)*3); ?></td>
                                </form>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </br>
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-9">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green">
                    <table>
                        <thead>
                            <tr id="trmhead">
                                <th colspan="2" style="padding: 10px; min-width: unset;">GIP CONGRESS QUIZ BEE</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">ROUND 1 (1pt each)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">ROUND 2 (2pts each)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">ROUND 3 (3pts each)</th>
                            </tr>
                        </thead>
                        <thead>
                            <tr id="trmhead1">
                                <th style="padding: 10px; min-width: unset;">Action</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                                <th style="padding: 8px; text-align: center;">Points</th>
                                <th style="padding: 8px; text-align: center;">Multplier</th>
                                <th style="padding: 8px; text-align: center;">Total</th>
                                <th style="padding: 8px; text-align: center;">Points</th>
                                <th style="padding: 8px; text-align: center;">Multiplier</th>
                                <th style="padding: 8px; text-align: center;">Total</th>
                                <th style="padding: 8px; text-align: center;">Points</th>
                                <th style="padding: 8px; text-align: center;">Multiplier</th>
                                <th style="padding: 8px; text-align: center;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $scores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $score): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="trmhead2<?php echo e($score->id); ?>">
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">
                                    <?php if(Auth::user()->status === 'open'): ?>
                                        <button onclick="showInput('<?php echo e($score->id); ?>')" class="dropbtn" >Update</button>
                                    <?php else: ?> <?php echo e(__('TALLY CLOSED')); ?>

                                    <?php endif; ?>
                                </td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><?php echo e($score->office); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><?php echo e($score->round1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">1</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><b><?php echo e(($score->round1)*1); ?></b></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><?php echo e($score->round2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">2</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><b><?php echo e(($score->round2)*2); ?></b></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><?php echo e($score->round3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">3</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><b><?php echo e(($score->round3)*3); ?></b></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="py-12">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-9">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green">
                    <p style="text-align: center;">ACCESS DENIED<p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\IMSD-CASHIER\Desktop\Tabulation\TABULATE\resources\views/gcqb-tab.blade.php ENDPATH**/ ?>