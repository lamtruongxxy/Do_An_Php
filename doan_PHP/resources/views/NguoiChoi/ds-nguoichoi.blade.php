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
                                <p class="text-muted font-13 mb-4">
                                    DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction
                                    function:
                                    <code>$().DataTable();</code>.
                                </p>

                                <table id="Linh-vuc-datatable" class="table dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>TÊN ĐĂNG NHẬP</th>
                                            <th>MẬT KHẨU</th>
                                            <th>EMAIL</th>
                                            <th>HÌNH ĐẠI DIỆN</th>
                                            <th>ĐIỂM CAO NHẤT</th>
                                            <th>CREDIT</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                    	@foreach( $dsNguoiChois as $nguoichoi)
                                        <tr>
                                            <td>{{ $nguoichoi->id }}</td>
                                            <td>{{ $nguoichoi->ten_dang_nhap }}</td>
                                            <td>{{ $nguoichoi->mat_khau }}</td>
                                            <td>{{ $nguoichoi->email }}</td>
                                            <td>{{ $nguoichoi->hinh_dai_dien }}</td>
                                            <td>{{ $nguoichoi->diem_cao_nhat }}</td>
                                            <td>{{ $nguoichoi->credit }}</td>
                                            <td>
                                            	<a href="" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></a>
                                            	<a class="btn btn-info waves-effect waves-light"><i class="mdi mdi-pen-minus"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="mb-3 header-title"> Thêm người chơi </h3>

                                <form action="{{ route('nguoi-choi.post-them-moi') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="ten_dang_nhap">TÊN ĐĂNG NHẬP</label>
                                        <input type="text" class="form-control" id="ten_dang_nhap" name="ten_dang_nhap" placeholder="Tên đăng nhập"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="mat_khau">MẬT KHẨU</label>
                                        <input type="text" class="form-control" id="mat_khau" name="mat_khau" placeholder="Mật khẩu"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="email">EMAIL</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="hinh_dai_dien">HÌNH ĐẠI DIỆN</label>
                                        <input type="text" class="form-control" id="hinh_dai_dien" name="hinh_dai_dien" placeholder="Hình đại diện"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="diem_cao_nhat">ĐIỂM CAO NHẤT</label>
                                        <input type="number" class="form-control" id="diem_cao_nhat" name="diem_cao_nhat" placeholder="Điểm cao nhất"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="credit">CREDIT</label>
                                        <input type="number" class="form-control" id="credit" name="credit" placeholder="Credit"> 
                                    </div>
                                   
                                     <button type="sumit" class="btn btn-success waves-effect waves-light">
                                            <span class="btn-label"><i class="fe-plus"></i></span>Thêm
                                        </button>     
                                </form>
                            </div>    
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
                <!-- end row-->

@endsection