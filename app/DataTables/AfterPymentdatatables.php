<?php



namespace App\DataTables;



use App\AfterPyment;

use Yajra\DataTables\Services\DataTable;



class AfterPymentdatatables extends DataTable

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




         ->addColumn('delete', 'Admin.AfterPyment.btn.delete')

         ->addColumn('checkbox', 'Admin.AfterPyment.btn.checkbox')
 



        



        ->rawColumns([

             'delete','checkbox' 

        ]);



        



    }



    /**

     * Get query source of dataTable.

     *

     * @param \App\User $model

     * @return \Illuminate\Database\Eloquent\Builder

     */

    public function query(AfterPyment $model)

    {

        return AfterPyment::query();

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



      ['extend'=>'copy','className'=>'btn btn-primary' , 

         'text'=> '<i class="fa fa-copy"></i>  '.trans('admin.copy')],



      ['extend'=>'csv','className'=>'btn btn-warning',

         'text'=>'<i class="fa fa-edit"></i>'. trans('admin.csv')],  



      ['extend'=>'excel','className'=>'btn btn-success',

         'text'=>'<i class="fa fa-file"></i>'. trans('admin.excel')],



      ['extend'=>'pdf','className'=>'btn btn-info',

          'text'=>'<i class="fa fa-file"></i>'. trans('admin.pdf')],



    ['extend'=>'print','className'=>'btn btn-success',

          'text'=>'<i class="fa fa-print"></i>'.trans('admin.print')],



    ['extend'=>'reload','className'=>'btn btn-info',

               'text'=>'<i class="fa fa-refresh"></i>'. trans('admin.reload')],



    ['text'=>'','className'=>'btn btn-danger dellall',

          'text'=>'<i class="fa fa-trash"></i>'. trans('admin.deletall')],

         

        

                      

                

                    

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

                'name'=> 'PAYID',

                'data'=> 'PAYID',

                'title'=>trans('admin.PAYID'),



            ],



            [

                'name'=> 'email',

                'data'=> 'email',

                'title'=>trans('admin.email'),



            ],



            [

                'name'=> 'first_name',

                'data'=> 'first_name',

                'title'=>trans('admin.first_name'),



            ],
              [

                'name'=> 'last_name',

                'data'=> 'last_name',

                'title'=>trans('admin.last_name'),



            ],
               [

                'name'=> 'total',

                'data'=> 'total',

                'title'=>trans('admin.total'),



            ],

              [

                'name'=> 'city',

                'data'=> 'city',

                'title'=>trans('admin.city'),



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

