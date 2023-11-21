<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <style>/*Tables+Input Box+Button*/
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
        .in {
            border-radius: 10px; 
            width: 500px;                     
            } 
        .btn {
            background-color: green;
            color: white;
            min-width: 80px;
            height: 40px;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 10px;
            position: absolute;
            }   
    </style>
    <style>/*Containers*/
        .container {
                display: flex; /* Use flexbox for layout */
            }

            .box {
                width: 50%; /* Each div takes up 50% of the container's width */
                padding: 20px;
                margin-right: 50px;}

            /* Add a small margin to the right of the first div */    
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <div class="py-12">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-9">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: white">
                    <p style="text-align: center; color:green"><b>SCORES IN NO PARTICULAR ORDER</b></p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 container">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg box">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green">
                   <table>
                        <thead>
                            <tr>
                                <th colspan="4" style="padding: 10px; min-width: unset;">MR. AND MS. GIP 2023 (MALE)</th>
                            </tr>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">CONTENDER</th>
                                <th style="padding: 10px; min-width: unset;">SCORE</th>
                                <th style="padding: 10px; min-width: unset;">RANKING</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $mmmg->zip($mranks); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$mmmg, $mranks]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($mmmg->npo); ?></td>           
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e(number_format(($mmmg->overall),2)); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($mranks->ranking); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg box">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green">
                   <table>
                        <thead>
                            <tr>
                                <th colspan="4" style="padding: 10px; min-width: unset;">MR. AND MS. GIP 2023 (FEMALE)</th>
                            </tr>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">CONTENDER</th>
                                <th style="padding: 10px; min-width: unset;">SCORE</th>
                                <th style="padding: 10px; min-width: unset;">RANKING</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $fmmg->zip($franks); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$fmmg, $franks]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($fmmg->npo ?? ""); ?></td>           
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e(number_format(($fmmg->overall ?? "0"),2)); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($franks->ranking ?? ""); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="py-8">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 container">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg box">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green">
                   <table>
                        <thead>
                            <tr>
                                <th colspan="4" style="padding: 10px; min-width: unset;">GIP MODERN DANCE CONTEST</th>
                            </tr>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">CONTENDER</th>
                                <th style="padding: 10px; min-width: unset;">SCORE</th>
                                <th style="padding: 10px; min-width: unset;">RANKING</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $gmdc->zip($ranks); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$gmdc, $rank]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($gmdc->npo); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><?php echo e(number_format(($gmdc->total),2)); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><?php echo e($rank->ranking); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg box">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green">
                   <table>
                        <thead>
                            <tr>
                                <th colspan="4" style="padding: 10px; min-width: unset;">GIP CONGRESS QUIZ BEE</th>
                            </tr>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">CONTENDER</th>
                                <th style="padding: 10px; min-width: unset;">SCORE</th>
                                <th style="padding: 10px; min-width: unset;">RANKING</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $gcqb->zip($gcqbrank); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$gcqb, $gcqbrank]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($gcqb->npo); ?></td>           
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><?php echo e($gcqb->total); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><?php echo e($gcqbrank->ranking); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </br>
    </br>
    <div class="py-8">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 container">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg box">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="4" style="padding: 10px; min-width: unset;">MY GIP EXPERIENCE</th>
                            </tr>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">CONTENDER</th>
                                <th style="padding: 10px; min-width: unset;">SCORE</th>
                                <th style="padding: 10px; min-width: unset;">RANKING</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $mge->zip($mgerank); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$mge, $mgerank]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($mge->npo); ?></td>           
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><?php echo e(number_format ($mge->total, 2)); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><?php echo e($mgerank->ranking); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg box">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green">
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
<?php /**PATH C:\Users\IMSD-CASHIER\Desktop\Tabulation\TABULATE\resources\views/dashboard.blade.php ENDPATH**/ ?>