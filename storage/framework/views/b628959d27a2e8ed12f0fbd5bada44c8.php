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
    <?php if(Auth::user()->contest === 'all' || Auth::user()->contest === 'mmg'): ?>
     <?php $__env->slot('header', null, []); ?> <!-- Table Switcher -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex">
            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                <button onclick="showTable('pna');" active="true" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                    <?php echo e(__('Production Number and Attire')); ?>

                </button>
                <button onclick="showTable('bca')" active="true" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                    <?php echo e(__('Business Casual Attire')); ?>

                </button>
                <button onclick="showTable('lgfa')" active="request()->routeIs('/tally/mmg')" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                    <?php echo e(__('Long Gown and Formal Attire')); ?>

                </button>
                <button onclick="showTable('qna')" active="request()->routeIs('/tally/mmg')" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                    <?php echo e(__('Question and Answer')); ?>

                </button>
            </div>
        </div>
    </div>
     <?php $__env->endSlot(); ?>
    <?php endif; ?>

    <div class="py-12">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-9">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: white">
                    <!-- Prod Num -->
                    <?php if(Auth::user()->contest === 'all' || Auth::user()->contest === 'mmg'): ?>
                    <table id="pna">
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">ACTION</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                                <th style="padding: 10px; min-width: unset;">Candidate Name</th>
                                <?php if(Auth::User()->role === 'admin'): ?>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Beauty and Poise (30%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Stage Presence (30%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Overall Appearance (30%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Audience Impact (10%)</th>
                                <th style="padding: 10px; min-width: unset;">TOTAL (100%)</th>
                                <?php else: ?>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Beauty and Poise (30%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Stage Presence (30%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Overall Appearance (30%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Audience Impact (10%)</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">PNA</th>
                                <th style="padding: 10px; min-width: unset;"></th>
                                <th style="padding: 10px; min-width: unset;"></th>
                                <?php if(Auth::User()->role === 'admin'): ?>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">(sum of average per criteria)</th>
                                <?php elseif(Auth::User()->role === 'judge1'): ?>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <?php elseif(Auth::User()->role === 'judge2'): ?>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <?php elseif(Auth::User()->role === 'judge3'): ?>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $contestant->zip($scoreA,$scoreB,$scoreC,$scoreD); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$contestant, $scoreA, $scoreB,$scoreC,$scoreD]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <tr>            
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">
                                <form method="post" action="/tabulate/mmg/pna/<?php echo e($scoreA->id); ?>"><?php echo csrf_field(); ?>
                                <?php if(Auth::user()->status === 'open'): ?>
                                <button class="dropbtn">Update</button>
                                <?php else: ?> <?php echo e(__('TALLY CLOSED')); ?>

                                <?php endif; ?></form></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($contestant->office); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($contestant->name); ?></td>
                                <?php if(Auth::User()->role === 'admin'): ?>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreA->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreA->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreA->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreB->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreB->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreB->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreC->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreC->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreC->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreD->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreD->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreD->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e(number_format((($contestant->totalpna)/.2),2)); ?></td>
                                <?php elseif(Auth::User()->role === 'judge1'): ?>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreA->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreB->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreC->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreD->judge1); ?></td>
                                <?php elseif(Auth::User()->role === 'judge2'): ?>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreA->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreB->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreC->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreD->judge2); ?></td>
                                <?php elseif(Auth::User()->role === 'judge3'): ?>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreA->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreB->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreC->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreD->judge3); ?></td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <!-- Bus Cas -->
                    <table id="bca" style="display: none">
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">ACTION</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                                <th style="padding: 10px; min-width: unset;">Candidate Name</th>
                                <?php if(Auth::User()->role === 'admin'): ?>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Beauty and Poise (30%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Stage Presence (30%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Overall Appearance (30%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Audience Impact (10%)</th>
                                <th style="padding: 10px; min-width: unset;">TOTAL (100%)</th>
                                <?php else: ?>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Beauty and Poise (30%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Stage Presence (30%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Overall Appearance (30%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Audience Impact (10%)</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">BCA</th>
                                <th style="padding: 10px; min-width: unset;"></th>
                                <th style="padding: 10px; min-width: unset;"></th>
                                <?php if(Auth::User()->role === 'admin'): ?>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">(sum of average per criteria)</th>
                                <?php elseif(Auth::User()->role === 'judge1'): ?>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <?php elseif(Auth::User()->role === 'judge2'): ?>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <?php elseif(Auth::User()->role === 'judge3'): ?>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $contestantB->zip($scoreE,$scoreF,$scoreG,$scoreH); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$contestantB, $scoreE, $scoreF,$scoreG,$scoreH]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">
                                <form method="post" action="/tabulate/mmg/bca/<?php echo e($scoreE->id); ?>"><?php echo csrf_field(); ?>
                                <?php if(Auth::user()->status === 'open'): ?>
                                <button class="dropbtn">Update</button>
                                <?php else: ?> <?php echo e(__('TALLY CLOSED')); ?>

                                <?php endif; ?></form></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($contestantB->office); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($contestantB->name); ?></td>
                                <?php if(Auth::User()->role === 'admin'): ?>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreE->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreE->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreE->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreF->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreF->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreF->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreG->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreG->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreG->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreH->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreH->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreH->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e(number_format((($contestantB->totalbca)/.2),2)); ?></td>
                                <?php elseif(Auth::User()->role === 'judge1'): ?>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreE->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreF->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreG->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreH->judge1); ?></td>
                                <?php elseif(Auth::User()->role === 'judge2'): ?>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreE->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreF->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreG->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreH->judge2); ?></td>
                                <?php elseif(Auth::User()->role === 'judge3'): ?>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreE->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreF->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreG->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreH->judge3); ?></td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <!-- Long Gown and Formal -->
                    <table id="lgfa" style="display: none">
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">ACTION</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                                <th style="padding: 10px; min-width: unset;">Candidate Name</th>
                                <?php if(Auth::User()->role === 'admin'): ?>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Beauty and Poise (30%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Stage Presence (30%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Overall Appearance (30%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Audience Impact (10%)</th>
                                <th style="padding: 10px; min-width: unset;">TOTAL (100%)</th>
                                <?php else: ?>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Beauty and Poise (30%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Stage Presence (30%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Overall Appearance (30%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Audience Impact (10%)</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">LGFA</th>
                                <th style="padding: 10px; min-width: unset;"></th>
                                <th style="padding: 10px; min-width: unset;"></th>
                                <?php if(Auth::User()->role === 'admin'): ?>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">(sum of average per criteria)</th>
                                <?php elseif(Auth::User()->role === 'judge1'): ?>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <?php elseif(Auth::User()->role === 'judge2'): ?>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <?php elseif(Auth::User()->role === 'judge3'): ?>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $contestantC->zip($scoreI,$scoreJ,$scoreK,$scoreL); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$contestantC, $scoreI, $scoreJ,$scoreK,$scoreL]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">
                                <form method="post" action="/tabulate/mmg/lgfa/<?php echo e($scoreI->id); ?>"><?php echo csrf_field(); ?>
                                <?php if(Auth::user()->status === 'open'): ?>
                                <button class="dropbtn">Update</button>
                                <?php else: ?> <?php echo e(__('TALLY CLOSED')); ?>

                                <?php endif; ?></form></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($contestantC->office); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($contestantC->name); ?></td>
                                <?php if(Auth::User()->role === 'admin'): ?>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreI->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreI->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreI->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreJ->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreJ->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreJ->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreK->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreK->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreK->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreL->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreL->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreL->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e(number_format((($contestantC->totallgfa)/.2),2)); ?></td>
                                <?php elseif(Auth::User()->role === 'judge1'): ?>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreI->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreJ->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreK->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreL->judge1); ?></td>
                                <?php elseif(Auth::User()->role === 'judge2'): ?>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreI->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreJ->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreK->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreL->judge2); ?></td>
                                <?php elseif(Auth::User()->role === 'judge3'): ?>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreI->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreJ->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreK->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreL->judge3); ?></td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <!-- Question and Answer -->
                    <table id="qna" style="display: none">
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">ACTION</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                                <th style="padding: 10px; min-width: unset;">Candidate Name</th>
                                <?php if(Auth::User()->role === 'admin'): ?>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Delivery/Confidence (40%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Content of Answer (50%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Audience Impact (10%)</th>
                                <th style="padding: 10px; min-width: unset;">TOTAL (100%)</th>
                                <?php else: ?>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Delivery/Confidence (40%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Content of Answer (50%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Audience Impact (10%)</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">QNA</th>
                                <th style="padding: 10px; min-width: unset;"></th>
                                <th style="padding: 10px; min-width: unset;"></th>
                                <?php if(Auth::User()->role === 'admin'): ?>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">(sum of average per criteria)</th>
                                <?php elseif(Auth::User()->role === 'judge1'): ?>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <?php elseif(Auth::User()->role === 'judge2'): ?>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <?php elseif(Auth::User()->role === 'judge3'): ?>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $contestantD->zip($scoreM,$scoreN,$scoreO); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$contestantD, $scoreM, $scoreN,$scoreO]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">
                                <form method="post" action="/tabulate/mmg/qna/<?php echo e($scoreM->id); ?>"><?php echo csrf_field(); ?>
                                <?php if(Auth::user()->status === 'open'): ?>
                                <button class="dropbtn">Update</button>
                                <?php else: ?> <?php echo e(__('TALLY CLOSED')); ?>

                                <?php endif; ?></form></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($contestantD->office); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($contestantD->name); ?></td>
                                <?php if(Auth::User()->role === 'admin'): ?>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreM->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreM->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreM->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreN->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreN->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreN->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreO->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreO->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreO->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e(number_format((($contestantD->totalqna)/.3),2)); ?></td>
                                <?php elseif(Auth::User()->role === 'judge1'): ?>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreM->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreN->judge1); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreO->judge1); ?></td>
                                <?php elseif(Auth::User()->role === 'judge2'): ?>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreM->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreN->judge2); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreO->judge2); ?></td>
                                <?php elseif(Auth::User()->role === 'judge3'): ?>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreM->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreN->judge3); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($scoreO->judge3); ?></td>
                                <?php endif; ?>
                            </tr>
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
<?php /**PATH C:\Users\IMSD-CASHIER\Desktop\Tabulation\TABULATE\resources\views/mmg-tab.blade.php ENDPATH**/ ?>