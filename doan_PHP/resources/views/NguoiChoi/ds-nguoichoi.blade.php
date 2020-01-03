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
        <!-- Tost-->
        <script src="{{ asset('assets/libs/jquery-toast/jquery.toast.min.js') }}"></script>
        <!-- Sweet Alerts js -->
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

        <script type="text/javascript">
            //HIỆN THI DANH SÁCH DỮ LIỆU
            $(document).ready(function()
            {
                $("#datatable").DataTable({
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

        //THÔNG BÁO KHI XÓA DỮ LIỆU
            $(document).on('click', '.thong-bao-xoa', function(e) {
			e.preventDefault();
			var th = $(this);
			Swal.fire({
				title: "Bạn có chắc xóa?",
                text: "Dữ liệu bị xóa có thể khôi phục lại!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Delete It"
			}).then(function(t) {
                if(t.value){
                    Swal.fire("Deleted!", "Dữ liệu đã xóa thành công.", "success")
                    th.parent().submit()
                }
            })
        });    
    </script>


       
@endsection

@section('css')
        <!-- third party css -->
        <link href="{{ asset ('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset ('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset ('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset ('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <!-- Jquery Toast css -->
        <link href="{{ asset ('assets/libs/jquery-toast/jquery.toast.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Sweet Alert-->
        <link href="{{ asset ('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')
<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">DANH SÁCH NGƯỜI CHƠI</h4>
                                @include('request/complete')
                                <p class="text-muted font-13 mb-4">
                                    <table id="datatable" class="table dt-responsive nowrap">
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
                                                <form action="{{ route('nguoi-choi.xoa',['id'=>$nguoichoi->id]) }}" method="DELETE">
                                                @csrf             
                                                <button type="sumit" class=" btn btn-danger waves-effect waves-light thong-bao-xoa" ><i class="mdi mdi-trash-can-outline">Xóa </i></button>
                                                </form>                                  
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
@endsection