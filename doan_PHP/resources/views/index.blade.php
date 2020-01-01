@extends('layout')

@section('js')
        <script type="text/javascript">
        $(document).ready(function()
        {$("").DataTable({
            language:{
                paginate:{
                    previous:"<i class='mdi mdi-chevron-left'>",
                    next:"<i class='mdi mdi-chevron-right'>"
            }   
        },
        drawCallback:function(){
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        }
    });
    });
        </script>
       <style> 
        h6 {
          -webkit-animation-name: wellcom; /* Safari 4.0 - 8.0 */
          -webkit-animation-duration: 3s; /* Safari 4.0 - 8.0 */
          animation-name: wellcom;
          animation-duration: 3s;
        }

        /* Safari 4.0 - 8.0 */


        /* Standard syntax */
        @keyframes wellcom {
         from {margin-top: 100px;}
          to {margin-top: 0px;}
        }
        </style>
@endsection

@section('css')
   <!-- third party css -->
        <link href="{{ asset ('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset ('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset ('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset ('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')
<div class="row" >
                    <div class="col-12">
                        <div class="card" style="background: #f2f3f6">
                            <div class="card-body" style="margin-top: 80px";>
                                <h6 class="header-title" style="font-size: 130px;text-align: center;color: darkgrey;text-shadow: 3px 10px 20px darkgrey;">WELLCOM!
                                </h6> 
                        </div> 
                    </div>
                </div>
@endsection