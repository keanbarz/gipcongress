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
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: red">
                   <!-- <?php echo e(__("You're logged in!")); ?> -->
                   <h1 >Encode Data</h1>
                   <form method="post" action="/registered">
             <?php echo e(csrf_field()); ?>

               <input type="text" name="lastname" placeholder="DV Number" value="" required /><br />
                <input type="text" name="firstname" placeholder="ORS" value="" required /><br />
                <input type="text" name="email" placeholder="Payee" value="" required /><br />
                <input type="number" step="0.01" name="password" placeholder="Amount" value="" required /><br />
             <button>Save</button>
             </form>
             <form method="get" action="/viewdata">
             
             <button>View Data</button>
             </form><br /><form method="get" action="/read-dbf-file">
             
             <button>dbf</button>
             </form><br />
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
<?php /**PATH C:\Users\IMSD-CASHIER\learning\resources\views/DASHBOARD.blade.php ENDPATH**/ ?>