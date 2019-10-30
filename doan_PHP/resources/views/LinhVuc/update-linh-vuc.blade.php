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
<div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                             
                                <h3 class="mb-3 header-title"> CẬP NHẬT LĨNH VỰC </h3>
                                <form action="{{ route('linh-vuc.xl-cap-nhat',['id'=> $linhVuc->id]) }}"method="POST">                            
                                    @csrf
                                    <div class="form-group">
                                        <label for="ten_linh_vuc">TÊN LĨNH VỰC</label>
                                        <input type="text" class="form-control" id="ten_linh_vuc" name="ten_linh_vuc" placeholder="Tên Lĩnh vực" value="{{ $linhVuc->ten_linh_vuc }}" > 
                                    </div>
                                   
                                     <button type="sumit" class="btn btn-success waves-effect waves-light" id="luu-thanh-cong">
                                            <span class="btn-label"><i class="mdi mdi-pen-minus"></i></span>Lưu
                                        </button>     
                                </form>
                            </div>    
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
@endsection 