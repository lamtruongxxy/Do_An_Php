@extends('layout')

@section('js')
<!-- third party js -->
        <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.select.min.js') }}"></script>
        <script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>
        <!-- third party js ends -->
        <script type="text/javascript">
        $(document).ready(function()
        {$("#Linh-vuc-datatable").DataTable({
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
       
@endsection

@section('css')
   <!-- third party css -->
        <link href="{{ asset ('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset ('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset ('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset ('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')
<div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">DANH SÁCH LĨNH VỰC</h4>
                                <p class="text-muted font-13 mb-4"></p>

                                <table id="Linh-vuc-datatable" class="table dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên lĩnh vực</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                    	@foreach($linhVucs as $linhvuc)
                                        <tr>
                                            <td>{{ $linhvuc->id }}</td>
                                            <td>{{ $linhvuc->ten_linh_vuc}}</td>
                                            <td>
                                            	<a href="{{ route('linh-vuc.xoa',['id'=>$linhvuc->id]) }}" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></a>
                                            	<a href="{{ route('linh-vuc.cap-nhat', ['id'=>$linhvuc->id ]) }}" class="btn btn-info waves-effect waves-light"><i class="mdi mdi-pen-minus"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                
                <!-- end row-->
                
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="mb-3 header-title"> THÊM MỚI LĨNH VỰC </h3>

                                <form action="{{ route('linh-vuc.post-them-moi') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="ten_linh_vuc">TÊN LĨNH VỰC</label>
                                        <input type="text" class="form-control" id="ten_linh_vuc" name="ten_linh_vuc" placeholder="Tên Lĩnh vực"> 
                                    </div>                               
                                     <button type="sumit" class="btn btn-success waves-effect waves-light">
                                            <span class="btn-label"><i class="fe-plus"></i></span>Thêm
                                        </button>     
                                </form>
                            </div>    
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->

@endsection