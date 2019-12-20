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
                $("#Linh-vuc-datatable").DataTable({
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

        <script type="text/javascript">
            //THÔNG BÁO LƯU DỮ LIỆU THÀNH CÔNG
            ! function(p) {
                "use strict";
                var t = function() {};
                t.prototype.send = function(t, i, o, e, n, a, s, r) {
                    a || (a = 3e3), s || (s = 1);
                    var c = {
                        heading: t,
                        text: i,
                        position: o,
                        loaderBg: e,
                        icon: n,
                        hideAfter: a,
                        stack: s
                    };
                    r && (c.showHideTransition = r), console.log(c), p.toast().reset("all"), p.toast(c)
                }, p.NotificationApp = new t, p.NotificationApp.Constructor = t
            }(window.jQuery),
            function(i) {
                "use strict";
                i("#luu-thanh-cong").on("click", function(t) {
                    i.NotificationApp.send("THÀNH CÔNG", "LƯU DỮ LIỆU THÀNH CÔNG", "top-right", "#5ba035", "success")
                })
            }(window.jQuery);

            //THÔNG BÁO KHI XÓA DỮ LIỆU
            $('.thong-bao-xoa').click(function(e){
            e.preventDefault();//De ko tu dong xoa, chi xoa khi bam OK
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
                                                
                                                <form action="{{ route('linh-vuc.xoa',['id'=>$linhvuc->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <a href="{{ route('linh-vuc.cap-nhat', ['id'=>$linhvuc->id ]) }}" class="btn btn-info waves-effect waves-light"><i class="mdi mdi-pen-minus">Sửa </i></a>
                                                
                                                <button type="sumit" class="thong-bao-xoa btn btn-danger waves-effect waves-light" ><i class="mdi mdi-trash-can-outline">Xóa </i></button>
                                                </form>                                  
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
                                        <input type="text" class="form-control" id="ten_linh_vuc" name="ten_linh_vuc" placeholder="Tên Lĩnh vực" required=""> 
                                    </div>
                                    <button type="submit" class="btn btn-success waves-effect waves-light" id='luu-thanh-cong'>
                                            <span class="btn-label"><i class="fe-plus"></i></span>Thêm
                                        </button>  
                                </form>
                            </div>    
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
@endsection 