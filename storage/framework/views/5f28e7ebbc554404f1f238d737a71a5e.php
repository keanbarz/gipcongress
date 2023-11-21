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
        background-color: blue;
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
    <script>/*Show Tables */
        function showTable(tableId) {
            $('table').hide(); // Hide all tables
            $('#' + tableId).show(); // Show the selected table
        }
    </script>

    <div class="py-12">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-9">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: white">
                    <?php if(Auth::user()->contest === 'all' || Auth::user()->contest === 'mmg'): ?>
                    <table>
                        <thead>
                            <tr>
                            <th style="padding: 10px; min-width: unset;">ACTION</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                                <th style="padding: 10px; min-width: unset;">Candidate Name</th>
                                <?php if(Auth::user()->role === 'admin'): ?>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Delivery/Confidence (40%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Content of Answer (50%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Audience Impact (10%)</th>
                                <?php else: ?>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Delivery/Confidence (40%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Content of Answer (50%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Audience Impact (10%)</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;"><?php echo e(strtoupper($scoreA->segment)); ?></th>
                                <th style="padding: 10px; min-width: unset;"></th>
                                <th style="padding: 10px; min-width: unset;"></th>
                                <?php if(Auth::user()->role === 'admin'): ?>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <?php elseif(Auth::user()->role === 'judge1'): ?>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <?php elseif(Auth::user()->role === 'judge2'): ?>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <?php elseif(Auth::user()->role === 'judge3'): ?>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">
                                <form method="post" action="/tabulate/mmg/qna/save/<?php echo e($scoreA->id); ?>"><?php echo csrf_field(); ?><button class="dropbtn">Save</button></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($contestant->office); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($contestant->name); ?></td>
                                <?php if(Auth::user()->role === 'admin'): ?>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="dcj1" value="<?php echo e($scoreA->judge1); ?>" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="dcj2" value="<?php echo e($scoreA->judge2); ?>" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="dcj3" value="<?php echo e($scoreA->judge3); ?>" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="caj1" value="<?php echo e($scoreB->judge1); ?>" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="caj2" value="<?php echo e($scoreB->judge2); ?>" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="caj3" value="<?php echo e($scoreB->judge3); ?>" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="aij1" value="<?php echo e($scoreC->judge1); ?>" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="aij2" value="<?php echo e($scoreC->judge2); ?>" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="aij3" value="<?php echo e($scoreC->judge3); ?>" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <?php elseif(Auth::user()->role === 'judge1'): ?>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="dcj1" value="<?php echo e($scoreA->judge1); ?>" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="caj1" value="<?php echo e($scoreB->judge1); ?>" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="aij1" value="<?php echo e($scoreC->judge1); ?>" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <?php elseif(Auth::user()->role === 'judge2'): ?>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="dcj2" value="<?php echo e($scoreA->judge2); ?>" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="caj2" value="<?php echo e($scoreB->judge2); ?>" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="aij2" value="<?php echo e($scoreC->judge2); ?>" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <?php elseif(Auth::user()->role === 'judge3'): ?>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="dcj3" value="<?php echo e($scoreA->judge3); ?>" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="caj3" value="<?php echo e($scoreB->judge3); ?>" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="aij3" value="<?php echo e($scoreC->judge3); ?>" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <?php endif; ?>
                                </form>
                            </tr>
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
<?php /**PATH C:\Users\IMSD-CASHIER\Desktop\Tabulation\TABULATE\resources\views/mmg-tab-qna.blade.php ENDPATH**/ ?>