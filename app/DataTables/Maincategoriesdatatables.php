<?php



namespace App\DataTables;



use App\Maincategories;

use Yajra\DataTables\Services\DataTable;



class Maincategoriesdatatables extends DataTable

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



        ->addColumn('edit', 'Admin.Maincategories.btn.edit')

         ->addColumn('delete', 'Admin.Maincategories.btn.delete')
         ->addColumn('photo', 'Admin.Maincategories.btn.photo')

         ->addColumn('checkbox', 'Admin.Maincategories.btn.checkbox')

        ->addColumn('Maincategories_name_'.session('lang'), 'Admin.Maincategories.btn.Maincategories')

 

        ->rawColumns([

            'edit','delete','checkbox','photo',

        ]);



        



    }



    /**

     * Get query source of dataTable.

     *

     * @param \App\User $model

     * @return \Illuminate\Database\Eloquent\Builder

     */

    public function query(Maincategories $model)

    {

        return Maincategories::query();

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

                 // ->addAction(['width' => '80px'])

                    ->parameters( [



                         'dom'=>'Bfrtip',

        'lengthMenu'=>[[10,25,50,100],[5,20,30,40,'all']],

        'buttons'=> [



        ['text'=>'<i class="fa fa-plus"></i>'.trans('admin.add'),'className'=>'btn btn-success' ,'action'=>"function(){



            window.location.href='".\URL::current()."/create'

        }"],



     
                

                    

    ],  

 

                        'initComplete' => "function () {

            this.api().columns([2,3,4]).every(function () {

                var column = this;

                var input = document.createElement(\"input\");

                $(input).appendTo($(column.footer()).empty())

                .on('keyup', function () {

                    column.search($(this).val(), false, false, true).draw();

                });

            });

        }",

          'language' => [  

            "sProcessing"     =>trans('admin.Processing')    ,

            "sZeroRecords" =>trans('admin.sZeroRecords')    ,

            "sEmptyTable"    =>trans('admin.sEmptyTable')    ,

            "sInfo"          =>trans('admin.sInfo')    ,

            "sLengthMenu"     =>trans('admin.sLengthMenu')    ,

            "sZeroRecords"    =>trans('admin.sZeroRecords')   ,

            "sEmptyTable"     =>trans('admin.sEmptyTable')    ,

            "sInfo"           =>trans('admin.sEmptyTable')    ,

            "sInfoEmpty"      =>trans('admin.sInfo')          ,

            "sInfoFiltered"   =>trans('admin.sInfoFiltered')     ,           

            "sSearch"         =>trans('admin.sInfoPostFix')   ,

            "sUrl"            =>trans('admin.sSearch')        ,

            "sInfoThousands"  =>trans('admin.sInfoThousands') ,

            "sLoadingRecords" =>trans('admin.sLoadingRecords'),

              "oPaginate"=> [

        "sFirst" =>trans('admin.sFirst') ,

        "sPrevious" =>trans('admin.sPrevious') ,

        "sNext" =>trans('admin.sNext') ,

        "sLast" =>trans('admin.sLast') ,

    ],

            

            "oAria"           =>[

            "sSortAscending"  =>trans('admin.sSortAscending') ,

            "sSortDescending" =>trans('admin.sSortDescending'), 

           ]

             



           ]



                    ]



                  





          

                    );

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

                'name'=> 'checkbox',

                'data'=> 'checkbox',

               'title'=>'<input type="checkbox" onclick="checkall()" class="checck_all">  ',

                 'exportable'=>false,

                 'printable'=>false,

                 'orderable'=>false,

                 'searshable'=>false,





            ],

            [

                'name'=> 'id',

                'data'=> 'id',

                'title'=>trans('admin.id'),



            ],

             
 
             

            

               
[

                'name'=> 'photo',

                'data'=> 'photo',

                'title'=>trans('admin.photo'),

                 'exportable'=>false,

                 'printable'=>false,

                 'orderable'=>false,

                 'searshable'=>false,





            ],
              

            

            [

                'name'=> 'edit',

                'data'=> 'edit',

                'title'=>trans('admin.edit'),

                 'exportable'=>false,

                 'printable'=>false,

                 'orderable'=>false,

                 'searshable'=>false,





            ],

              [

                'name'=> 'delete',

                'data'=> 'delete',

               'title'=>trans('admin.delete'),

                 'exportable'=>false,

                 'printable'=>false,

                 'orderable'=>false,

                 'searshable'=>false,





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

        return 'Users_' . date('YmdHis');

    }

}

