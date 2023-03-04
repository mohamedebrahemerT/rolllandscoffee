<?php

namespace App\DataTables;

use App\product;
use Yajra\DataTables\Services\DataTable;

class productesDatatable extends DataTable
{
   /**
    * Build DataTable class.
    *
    * @param mixed $query Results from query() method.
    * @return \Yajra\DataTables\DataTableAbstract
    */
   public function dataTable($query)
   {
      return datatables($query)
         ->addColumn('checkbox', 'Admin.productes.btn.checkbox')
         ->addColumn('edit', 'Admin.productes.btn.edit')
         ->addColumn('department_id', 'Admin.productes.btn.department_id')
         ->addColumn('delete', 'Admin.productes.btn.delete')
         ->rawColumns([
            'edit',
            'department_id',
            
            'delete',
            'checkbox',
         ]);
   }


   /**
    * Get query source of dataTable.
    *
    * @param \App\User $model
    * @return \Illuminate\Database\Eloquent\Builder
    */
   public function query()
   {
     // return product::query();

        return product::query()->where(function ($q) {
            if (request()->has('department_id')) {
                return $q->where('department_id', request('department_id'));
            }
        });
   }

   /**
    * Optional method if you want to use html builder.
    *
    * @return \Yajra\DataTables\Html\Builder
    */
   public function html()
   {
      return $this->builder()
         ->columns($this->getColumns())
         ->minifiedAjax()
         ->parameters([
            'dom'          => 'Blfrtip',
            'lengthMenu'   => [[10, 25, 50, 100], [10, 25, 50, trans('admin.all_record')]],
            'buttons'      => [
               [
                  'text' => '<i class="fa fa-plus"></i> ' . trans('admin.add'), 'className' => 'btn btn-info', "action" => "function(){

              window.location.href = '" . \URL::current() . "/create';
            }", ],

               

            ],
            'initComplete' => " function () {
                this.api().columns([2,3]).every(function () {
                    var column = this;
                    var input = document.createElement(\"input\");
                    $(input).appendTo($(column.footer()).empty())
                    .on('keyup', function () {
                        column.search($(this).val(), false, false, true).draw();
                    });
                });
            }",

            'language'     => datatable_lang(),

         ]);
   }

   /**
    * Get columns.
    *
    * @return array
    */
   protected function getColumns()
   {
      
      return [
         [
            'name'       => 'checkbox',
            'data'       => 'checkbox',
               'title'=>'<input type="checkbox" onclick="checkall()" class="checck_all">  ',
            
            'exportable' => false,
            'printable'  => false,
            'orderable'  => false,
            'searchable' => false,
         ], [
            'name'  => 'title_name_ar',
            'data'  => 'title_name_ar',
            'title' => trans('admin.product'),
         ] , 
         [
            'name'  => 'department_id',
            'data'  => 'department_id',
            'title' => trans('admin.department_id'),
         ] , 
         [
            'name'       => 'edit',
            'data'       => 'edit',
            'title'      => trans('admin.edit'),
            'exportable' => false,
            'printable'  => false,
            'orderable'  => false,
            'searchable' => false,
         ], [
            'name'       => 'delete',
            'data'       => 'delete',
            'title'      => trans('admin.delete'),
            'exportable' => false,
            'printable'  => false,
            'orderable'  => false,
            'searchable' => false,
         ],

      ];
   }

   /**
    * Get filename for export.
    *
    * @return string
    */
   protected function filename()
   {
      return 'product_' . date('YmdHis');
   }
}
