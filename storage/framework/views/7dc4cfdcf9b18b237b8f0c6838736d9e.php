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
            <?php echo e(__('Employees')); ?>

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
 <?php $__env->endSlot(); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Check if the flash message exists
        if ($("#flash-message").length > 0) {
            // Automatically hide the flash message after 3 seconds (adjust the time as needed)
            setTimeout(function() {
                $("#flash-message").slideUp();
            }, 1000); // 3000 milliseconds = 3 seconds
        }
    });
    </script>
    <?php if(session('message')): ?>
    <div id="flash-message" class="alert alert-success" style="color:white">
        <?php echo e(session('message')); ?>

    </div>
<?php endif; ?>
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: white">
                   <!-- <?php echo e(__("You're logged in!")); ?> -->
                  <!-- <h2 >Saved Datas</h2>-->
                   <table>
    <thead>
        
        <tr>
            <th style="padding: 10px; min-width: unset;">ACTION</th>
            <th style="padding: 10px; min-width: unset;">ID</th>
            <th style="padding: 10px; min-width: unset;">Name</th>
            
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $records): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">
                <form method="get" action="/employee/dtr/<?php echo e($records ->Badgenumber); ?>"><button type="submit" class="dropbtn">DTR</button></form>
                <form method="post" action="/employee/dtr/delete/<?php echo e($records ->Badgenumber); ?>"><?php echo csrf_field(); ?><button type="submit" class="dropbtn">Delete</button></form></td>     
                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($records->Badgenumber); ?></td>      
                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?php echo e($records->NAME); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
document.getElementById("open-popup").addEventListener("click", function() {
    document.getElementById("popup").style.display = "block";
});

document.getElementById("close-popup").addEventListener("click", function() {
    document.getElementById("popup").style.display = "none";
});

//document.getElementById("popup-form").addEventListener("submit", function(e) {
 //   e.preventDefault();
    // Add your form submission logic here
    //alert("Form submitted!");
    document.getElementById("popup").style.display = "none";
//});
</script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\IMSD-CASHIER\learning\resources\views/employees.blade.php ENDPATH**/ ?>