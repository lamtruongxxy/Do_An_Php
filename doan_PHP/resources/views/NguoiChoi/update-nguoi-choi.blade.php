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
        <!-- toastr init js-->
        <script src="{{ asset('assets/js/pages/toastr.init.js') }}"></script>

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
        
@endsection

@section('main-content')
<div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                             
                                <h3 class="mb-3 header-title"> CẬP NHẬT NGƯỜI CHƠI </h3>
                                <form action="{{ route('nguoi-choi.xl-cap-nhat',['id'=> $nguoiChoi->id]) }}"method="POST">                            
                                    @csrf
                                     <div class="form-group">
                                        <label for="ten_dang_nhap">TÊN ĐĂNG NHẬP</label>
                                        <input type="text" class="form-control" id="ten_dang_nhap" name="ten_dang_nhap" placeholder="Tên đăng nhập" value="{{ $nguoiChoi->ten_dang_nhap }}" required="" > 
                                    </div>
                                    <div class="form-group">
                                        <label for="mat_khau">MẬT KHẨU</label>
                                        <input type="text" class="form-control" id="mat_khau" name="mat_khau" placeholder="Mật khẩu" value="{{ $nguoiChoi->mat_khau }}" required="" > 
                                    </div>
                                    <div class="form-group">
                                        <label for="email">EMAIL</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $nguoiChoi->email }}" required="" > 
                                    </div>
                                    <div class="form-group">
                                        <label for="hinh_dai_dien">HÌNH ĐẠI DIỆN</label>
                                        <input type="text" class="form-control" id="hinh_dai_dien" name="hinh_dai_dien" placeholder="Hình đại diện" value="{{ $nguoiChoi->hinh_dai_dien }}" required="" > 
                                    </div>
                                    <div class="form-group">
                                        <label for="diem_cao_nhat">ĐIỂM CAO NHẤT</label>
                                        <input type="number" class="form-control" id="diem_cao_nhat" name="diem_cao_nhat" placeholder="Điểm cao nhất" value="{{ $nguoiChoi->diem_cao_nhat }}" required="" > 
                                    </div>
                                    <div class="form-group">
                                        <label for="credit">CREDIT</label>
                                        <input type="number" class="form-control" id="credit" name="credit" placeholder="Credit" value="{{ $nguoiChoi->credit }}" required="" > 
                                    </div>
                                   
                                     <button type="sumit" class="btn btn-success waves-effect waves-light" id="luu-thanh-cong">
                                            <span class="btn-label"><i class="mdi mdi-pen-minus"></i></span>Lưu
                                        </button>     
                                </form>
                            </div>    
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
@endsection 