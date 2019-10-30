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
        {$("#Cau-hoi-datatable").DataTable({
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
                                <h4 class="header-title">DANH SÁCH CÂU HỎI</h4>
                                <p class="text-muted font-13 mb-4">
                                    <table id="Cau-hoi-datatable" class="table dt-responsive nowrap">
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
                                        </thead>
                                    
                                        <tbody>
                                            @foreach($dsCauHoi as $cauHoi)
                                            <tr>
                                                <td>{{ $cauHoi->id }}</td>
                                                <td>{{ $cauHoi->noi_dung }}</td>
                                                <td>{{ $cauHoi->linhVuc->ten_linh_vuc }}</td>
                                                <td>{{ $cauHoi->phuong_an_a }}</td>
                                                <td>{{ $cauHoi->phuong_an_b }}</td>
                                                <td>{{ $cauHoi->phuong_an_c }}</td>
                                                <td>{{ $cauHoi->phuong_an_d }}</td>
                                                <td>{{ $cauHoi->dap_an }}</td>
                                                <td>
                                                    <a  href="" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></a>

                                                    <a href="{{ route('cau-hoi.cap-nhat', ['id'=>$cauHoi->id ]) }}" type="button" class="btn btn-info waves-effect waves-light">
                                                        <i class="mdi mdi-pen-minus"></i></a>
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
                                <h4 class="mb-3 header-title">THÊM MỚI CÂU HỎI</h4>
                                <form action="{{ route('cau-hoi.post-them-moi') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="noi_dung">Nội dung</label>
                                        <input type="text" class="form-control" id="noi_dung" name="noi_dung" placeholder="Nội dung">
                                    </div>

                                     <div class="form-group">
                                        <label for="linh_vuc">Lĩnh vực</label>
                                        <select id="linh_vuc" name="linh_vuc"class="form-control">
                                                <option>Chọn lĩnh vực</option>
                                                @foreach( $dsLinhVuc as $linhVuc)
                                                <option value="{{ $linhVuc->id}}">{{ $linhVuc->ten_linh_vuc }} </option>
                                                @endforeach
                                            </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="phuong_an_a">Phương án A</label>
                                        <input type="text" class="form-control" id="phuong_an_a" name="phuong_an_a" placeholder="Phương án a">
                                    </div>

                                    <div class="form-group">
                                        <label for="phuong_an_b">Phương án B</label>
                                        <input type="text" class="form-control" id="phuong_an_b" name="phuong_an_b" placeholder="Phương án b">
                                    </div>                       
                                    <div class="form-group">
                                        <label for="phuong_an_c">Phương án C</label>
                                        <input type="text" class="form-control" id="phuong_an_c" name="phuong_an_c" placeholder="Phương án c">
                                    </div>

                                    <div class="form-group">
                                        <label for="phuong_an_d">Phương án D</label>
                                        <input type="text" class="form-control" id="phuong_an_d" name="phuong_an_d" placeholder="Phương án d">
                                    </div>

                                    <div class="form-group">
                                        <label for="dap_an">Đáp án</label>
                                        <select id="dap_an" name="dap_an"class="form-control">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                    </div>
                                    <button type="sumit" class="btn btn-success waves-effect waves-light">
                                            <span class="btn-label"><i class="fe-plus"></i></span>Thêm
                                        </button>     
                                </form>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div>
                </div><!-- end row-->

@endsection