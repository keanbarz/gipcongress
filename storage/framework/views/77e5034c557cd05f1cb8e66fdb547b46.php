<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php if(Auth::user()->role === 'admin'): ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex">
            <div class="flex">
                <div class="flex">
                    <div class="">
                        <h5 style="color:black">Register Participant<h5>
                        <form method="post" action="/addparticipant">
                            <?php echo e(csrf_field()); ?>

                            <input class="in" type="text" name="name" placeholder="Name" value="" required/>
                            <select class="in" name="office" required>
                                <option value="" disabled selected>Office</option>
                                <option value="DNFO">DNFO/DIEO</option>
                                <option value="DSFO">DSFO</option>
                                <option value="DOCFO">DOCFO</option>
                                <option value="DORFO">DORFO</option>
                                <option value="DOFO">DOFO</option>
                                <option value="DCFO">DCFO</option>
                            </select>
                            <select class="in" name="gender" required>
                                <option value="" disabled selected>Gender</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                            <select class="in" name="contest" required>
                                <option value="" disabled selected>Contest</option>
                                <option value="mmg">Mr. and Ms. GIP 2023</option>
                                <option value="gmdc">GIP Modern Dance Contest</option>
                                <option value="gcqb">GIP Congress Quiz Bee</option>
                                <option value="mge">My GIP Experience</option>
                            </select>
                            <button type="submit" class="btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
     <?php $__env->endSlot(); ?>
    <?php endif; ?>

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
        .up {
            background-color: green;
            color: white;
            min-width: 80px;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 10px;
            
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
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 container">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg box">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green">
                   <table>
                        <thead>
                            <tr>
                                <th colspan="4" style="padding: 10px; min-width: unset;">MR. AND MS. GIP 2023</th>
                            </tr>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">ACTION</th>
                                <th style="padding: 10px; min-width: unset;">Name</th>
                                <th style="padding: 10px; min-width: unset;">Gender</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $mmg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mmg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><form method="post" action="/contestants/<?php echo e($mmg->id); ?>"><?php echo csrf_field(); ?><input name="contest" type="hidden" value="mmg"><button type="submit" class="up">Update</button></form></td>           
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($mmg->name); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($mmg->gender); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($mmg->office); ?></td></form>
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
                                <th colspan="4" style="padding: 10px; min-width: unset;">GIP MODERN DANCE CONTEST</th>
                            </tr>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">ACTION</th>
                                <th style="padding: 10px; min-width: unset;">Name</th>
                                <th style="padding: 10px; min-width: unset;">Gender</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $gmdc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gmdc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"></td>           
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($gmdc->name); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($gmdc->gender); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($gmdc->office); ?></td>
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
                                <th colspan="4" style="padding: 10px; min-width: unset;">GIP CONGRESS QUIZ BEE</th>
                            </tr>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">ACTION</th>
                                <th style="padding: 10px; min-width: unset;">Name</th>
                                <th style="padding: 10px; min-width: unset;">Gender</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $gcqb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gcqb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"></td>           
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($gcqb->name); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($gcqb->gender); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($gcqb->office); ?></td>
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
                                <th colspan="4" style="padding: 10px; min-width: unset;">MY GIP EXPERIENCE</th>
                            </tr>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">ACTION</th>
                                <th style="padding: 10px; min-width: unset;">Name</th>
                                <th style="padding: 10px; min-width: unset;">Gender</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $mge; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"></td>           
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($mge->name); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($mge->gender); ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($mge->office); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\Users\IMSD-CASHIER\Desktop\Tabulation\TABULATE\resources\views/contestants.blade.php ENDPATH**/ ?>