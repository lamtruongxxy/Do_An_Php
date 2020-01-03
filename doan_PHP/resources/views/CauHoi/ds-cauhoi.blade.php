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
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">DANH SÁCH CÂU HỎI</h4>
                                @include('request/complete')
                                <p class="text-muted font-13 mb-4">
                                    <table id="datatable" class="table dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                            <th>ID</th>
                                            <th>NỘI DUNG</th>
                                            <th>LĨNH VỰC</th>
                                            <th>PHƯƠNG_ÁN_A</th>
                                            <th>PHƯƠNG_ÁN_B</th>
                                            <th>PHƯƠNG_ÁN_C</th>
                                            <th>PHƯƠNG_ÁN_D</th>
                                            <th>ĐÁP ÁN</th>      
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dsCauHoi as $cauHoi)
                                        <tr>
                                            <th>{{ $cauHoi->id }}</th>
                                            <th>{{ $cauHoi->noi_dung }}</th>
                                            <th>{{ $cauHoi->linhVuc->ten_linh_vuc }}</th>
                                            <th>{{ $cauHoi->phuong_an_a }}</th>
                                            <th>{{ $cauHoi->phuong_an_b }}</th>
                                            <th>{{ $cauHoi->phuong_an_c }}</th>
                                            <th>{{ $cauHoi->phuong_an_d }}</th>
                                            <th>{{ $cauHoi->dap_an }}</th>      
                                            <td>    
                                                <form action="{{ route('cau-hoi.xoa',['id'=>$cauHoi->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <a href="{{ route('cau-hoi.cap-nhat', ['id'=>$cauHoi->id ]) }}" class="btn btn-info waves-effect waves-light"><i class="mdi mdi-pen-minus">Sửa </i></a>
                                                
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
                    <div class="col-lg-4">
                    @include('request/errors')    
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3 header-title">THÊM MỚI CÂU HỎI</h4>
                                <form action="{{ route('cau-hoi.post-them-moi') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="noi_dung">NỘI DUNG</label>
                                        <input type="text" class="form-control" id="noi_dung" name="noi_dung" placeholder="Nội dung" >
                                    </div>

                                     <div class="form-group">
                                        <label for="linh_vuc">LĨNH VỰC</label>
                                        <select id="linh_vuc" name="linh_vuc"class="form-control">
                                                <option>Chọn lĩnh vực</option>
                                                @foreach( $dsLinhVuc as $linhVuc)
                                                <option value="{{ $linhVuc->id}}">{{ $linhVuc->ten_linh_vuc }} </option>
                                                @endforeach
                                            </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="phuong_an_a">PHƯƠNG ÁN A</label>
                                        <input type="text" class="form-control" id="phuong_an_a" name="phuong_an_a" placeholder="Phương án a">
                                    </div>

                                    <div class="form-group">
                                        <label for="phuong_an_b">PHƯƠNG ÁN B</label>
                                        <input type="text" class="form-control" id="phuong_an_b" name="phuong_an_b" placeholder="Phương án b">
                                    </div>                       
                                    <div class="form-group">
                                        <label for="phuong_an_c">PHƯƠNG ÁN C</label>
                                        <input type="text" class="form-control" id="phuong_an_c" name="phuong_an_c" placeholder="Phương án c">
                                    </div>

                                    <div class="form-group">
                                        <label for="phuong_an_d">PHƯƠNG ÁN D</label>
                                        <input type="text" class="form-control" id="phuong_an_d" name="phuong_an_d" placeholder="Phương án d">
                                    </div>

                                    <div class="form-group">
                                        <label for="dap_an">ĐÁP ÁN</label>
                                        <select id="dap_an" name="dap_an"class="form-control">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                    </div>
                                    <button type="sumit" class="btn btn-success waves-effect waves-light" id='luu-thanh-cong'>
                                            <span class="btn-label"><i class="fe-plus"></i></span>Thêm
                                        </button>     
                                </form>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div>
                </div><!-- end row-->

@endsection