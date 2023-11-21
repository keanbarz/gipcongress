<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

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
    <style>
        .dropbtn {
            background-color: green;
            color: white;
            min-width: 80px;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 10px;
            }

        .dropdown {
            position: relative;
            display: inline-block;
            }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 80px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            }

        .dropdown-content form {
            color: black;
            padding: 12px ;
            text-decoration: none;
            border: 1px solid #ddd;
            display: block;
            }
        .dropdown-content a {
            color: black;
            padding: 12px ;
            text-decoration: none;
            border: 1px solid #ddd;
            display: block;
            }    
        .dropdown-content form:hover {
            background-color: #ddd;
            }
        .dropdown-content button:hover {
            background-color: #ddd;
            }
        .dropdown:hover .dropdown-content {
            display: block; background-color:white
            }
        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
            }

    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <?php if(Auth::user()->role === 'admin'): ?>
    <a href="/tally/gcqb/close"><button class="dropbtn">Close Tally</button></a>
    <a href="/tally/gcqb/open"><button class="dropbtn">Open Tally</button></a>
    <?php endif; ?>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green;">
                <?php if(Auth::user()->contest === 'all' || Auth::user()->contest === 'gcqb'): ?>
                    <table>
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">OFFICE</th>
                                <th style="padding: 10px; min-width: unset;">ROUND 1</th>
                                <th style="padding: 10px; min-width: unset;">ROUND 2</th>
                                <th style="padding: 10px; min-width: unset;">TOTAL</th>
                                <th style="padding: 10px; min-width: unset;">RANKING</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $gcqbscores->zip($ranks); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$gcqbscore, $rank]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($gcqbscore->office); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><?php echo e(($gcqbscore->round1)); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><?php echo e(($gcqbscore->round2)*2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><?php echo e(($gcqbscore->r1r2)); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><?php echo e($rank->ranking); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green;">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="5" style="padding: 10px; min-width: unset;">TOP 3</th>
                            </tr>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">OFFICE</th>
                                <th style="padding: 10px; min-width: unset;">ROUND 1 + ROUND 2</th>
                                <th style="padding: 10px; min-width: unset;">ROUND 3</th>
                                <th style="padding: 10px; min-width: unset;">TOTAL</th>
                                <th style="padding: 10px; min-width: unset;">RANKING</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $gcqbtop3->zip($topranks); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$gcqbtop, $rank]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($gcqbtop): ?>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($gcqbtop->office); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><?php echo e(($gcqbtop->r1r2)); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><?php echo e(($gcqbtop->round3)*3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><?php echo e($gcqbtop->total); ?></td>
                                <?php if($rank): ?>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><?php echo e($rank->ranking); ?></td>
                                <?php else: ?>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"></td>
                                <?php endif; ?>
                            </tr>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <p style="text-align: center;">ACCESS DENIED<p>
                    <?php endif; ?>
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
<?php /**PATH C:\Users\IMSD-CASHIER\Desktop\Tabulation\TABULATE\resources\views/gcqb.blade.php ENDPATH**/ ?>