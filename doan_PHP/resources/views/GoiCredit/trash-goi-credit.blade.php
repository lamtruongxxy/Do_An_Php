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
                    i.NotificationApp.send("THÀNH CÔNG", "KHÔI HỒI DỮ LIỆU THÀNH CÔNG", "top-right", "#5ba035", "success")
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
        <!-- Sweet Alert-->
        <link href="{{ asset ('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')

<div class="row">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">DANH SÁCH GÓI CREDIT ĐÃ XÓA</h4>
                                <p class="text-muted font-13 mb-4"></p>
                                <table id="datatable" class="table dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>TÊN GÓI</th>
                                            <th>CREDIT</th>
                                            <th>SỐ TIỀN</th>
                                            <th>THỜI GIAN XÓA</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                    	@foreach($trashGoiCredit as $goi)
                                        <tr>
                                            <td>{{ $goi->id }} </td>
                                            <td>{{ $goi->ten_goi}}</td>
                                            <td>{{ $goi->credit }}</td>
                                            <td>{{ $goi->so_tien }}</td>
                                            <td>{{ $goi->deleted_at}}</td>
                                            <td> 
                                                <a href="{{ route('goi-credit.restore', ['id'=>$goi->id ]) }}" class="btn btn-info waves-effect waves-light" id="luu-thanh-cong" ><i class="fe-chevrons-up"> Khôi phục</i></a>
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