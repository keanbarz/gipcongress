<?php
  $defaultBreadcrumbs = [
    trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
    $crud->entity_name_plural => url($crud->route),
    trans('backpack::crud.list') => false,
  ];

  // if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
  $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
?>

<?php $__env->startSection('header'); ?>
    <section class="header-operation container-fluid animated fadeIn d-flex mb-2 align-items-baseline d-print-none" bp-section="page-header">
        <h1 class="text-capitalize mb-0" bp-section="page-heading"><?php echo $crud->getHeading() ?? $crud->entity_name_plural; ?></h1>
        <p class="ms-2 ml-2 mb-0" id="datatable_info_stack" bp-section="page-subheading"><?php echo $crud->getSubheading() ?? ''; ?></p>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  
  <div class="row" bp-section="crud-operation-list">

    
    <div class="<?php echo e($crud->getListContentClass()); ?>">

        <div class="row mb-2 align-items-center">
          <div class="col-sm-9">
            <?php if( $crud->buttons()->where('stack', 'top')->count() ||  $crud->exportButtons()): ?>
              <div class="d-print-none <?php echo e($crud->hasAccess('create')?'with-border':''); ?>">

                <?php echo $__env->make('crud::inc.button_stack', ['stack' => 'top'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              </div>
            <?php endif; ?>
          </div>
          <div class="col-sm-3">
            <div id="datatable_search_stack" class="mt-sm-0 mt-2 d-print-none">
              <div class="input-icon">
                <span class="input-icon-addon">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>
                </span>
                <input type="search" class="form-control" placeholder="<?php echo e(trans('backpack::crud.search')); ?>..."/>
              </div>
            </div>
          </div>
        </div>

        
        <?php if($crud->filtersEnabled()): ?>
          <?php echo $__env->make('crud::inc.filters_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <div class="<?php echo e(backpack_theme_config('classes.tableWrapper')); ?>">
            <table
              id="crudTable"
              class="<?php echo e(backpack_theme_config('classes.table') ?? 'table table-striped table-hover nowrap rounded card-table table-vcenter card d-table shadow-xs border-xs'); ?>"
              data-responsive-table="<?php echo e((int) $crud->getOperationSetting('responsiveTable')); ?>"
              data-has-details-row="<?php echo e((int) $crud->getOperationSetting('detailsRow')); ?>"
              data-has-bulk-actions="<?php echo e((int) $crud->getOperationSetting('bulkActions')); ?>"
              data-has-line-buttons-as-dropdown="<?php echo e((int) $crud->getOperationSetting('lineButtonsAsDropdown')); ?>"
              cellspacing="0">
            <thead>
              <tr>
                
                <?php $__currentLoopData = $crud->columns(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <th
                    data-orderable="<?php echo e(var_export($column['orderable'], true)); ?>"
                    data-priority="<?php echo e($column['priority']); ?>"
                    data-column-name="<?php echo e($column['name']); ?>"
                    

                    
                    <?php if(isset($column['exportOnlyField']) && $column['exportOnlyField'] === true): ?>
                      data-visible="false"
                      data-visible-in-table="false"
                      data-can-be-visible-in-table="false"
                      data-visible-in-modal="false"
                      data-visible-in-export="true"
                      data-force-export="true"
                    <?php else: ?>
                      data-visible-in-table="<?php echo e(var_export($column['visibleInTable'] ?? false)); ?>"
                      data-visible="<?php echo e(var_export($column['visibleInTable'] ?? true)); ?>"
                      data-can-be-visible-in-table="true"
                      data-visible-in-modal="<?php echo e(var_export($column['visibleInModal'] ?? true)); ?>"
                      <?php if(isset($column['visibleInExport'])): ?>
                         <?php if($column['visibleInExport'] === false): ?>
                           data-visible-in-export="false"
                           data-force-export="false"
                         <?php else: ?>
                           data-visible-in-export="true"
                           data-force-export="true"
                         <?php endif; ?>
                       <?php else: ?>
                         data-visible-in-export="true"
                         data-force-export="false"
                       <?php endif; ?>
                    <?php endif; ?>
                  >
                    
                    <?php if($loop->first && $crud->getOperationSetting('bulkActions')): ?>
                      <?php echo View::make('crud::columns.inc.bulk_actions_checkbox')->render(); ?>

                    <?php endif; ?>
                    <?php echo $column['label']; ?>

                  </th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if( $crud->buttons()->where('stack', 'line')->count() ): ?>
                  <th data-orderable="false"
                      data-priority="<?php echo e($crud->getActionsColumnPriority()); ?>"
                      data-visible-in-export="false"
                      data-action-column="true"
                      ><?php echo e(trans('backpack::crud.actions')); ?></th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
              <tr>
                
                <?php $__currentLoopData = $crud->columns(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <th>
                    
                    <?php if($loop->first && $crud->getOperationSetting('bulkActions')): ?>
                      <?php echo View::make('crud::columns.inc.bulk_actions_checkbox')->render(); ?>

                    <?php endif; ?>
                    <?php echo $column['label']; ?>

                  </th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if( $crud->buttons()->where('stack', 'line')->count() ): ?>
                  <th><?php echo e(trans('backpack::crud.actions')); ?></th>
                <?php endif; ?>
              </tr>
            </tfoot>
          </table>
        </div>

        <?php if( $crud->buttons()->where('stack', 'bottom')->count() ): ?>
            <div id="bottom_buttons" class="d-print-none text-sm-left">
                <?php echo $__env->make('crud::inc.button_stack', ['stack' => 'bottom'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div id="datatable_button_stack" class="float-right float-end text-right hidden-xs"></div>
            </div>
        <?php endif; ?>

    </div>

  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('after_styles'); ?>
  
  <?php Basset::basset('https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css'); ?>
  <?php Basset::basset('https://cdn.datatables.net/fixedheader/3.3.1/css/fixedHeader.dataTables.min.css'); ?>
  <?php Basset::basset('https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css'); ?>

  
  <?php echo $__env->yieldPushContent('crud_list_styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after_scripts'); ?>
  <?php echo $__env->make('crud::inc.datatables_logic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  
  <?php echo $__env->yieldPushContent('crud_list_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(backpack_view('blank'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\IMSD-CASHIER\learning\vendor\backpack\crud\src\resources\views\crud/list.blade.php ENDPATH**/ ?>