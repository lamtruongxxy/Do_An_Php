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
            {$("#datatable").DataTable({
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
                                <h4 class="header-title">DANH SÁCH GÓI CREDITS</h4>
                                <table id="datatable" class="table dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên gói</th>
                                            <th>Credit</th>           
                                            <th>Số Tiền</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        @foreach($goiCredits as $goi)
                                        <tr>
                                            <td>{{ $goi->id }}</td>
                                            <td>{{ $goi->ten_goi}}</td>
                                            <td>{{ $goi->credit}}</td>
                                            <td>{{ $goi->so_tien}}</td>
                                            <td>
                                                <form action="{{ route('goi-credit.xoa',['id'=>$goi->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('goi-credit.cap-nhat', ['id'=>$goi->id ]) }}" class="btn btn-info waves-effect waves-light"><i class="mdi mdi-pen-minus">Sửa</i></a>

                                                <button type="submit" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline">Xóa</i></a>
                                                </button>
                                            </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> 
                        </div> 
                    </div>
                     <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="mb-3 header-title"> THÊM MỚI GÓI CREDIT </h3>
                                <form action="{{ route('goi-credit.post-them-moi') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="ten_goi">TÊN GÓI</label>
                                        <input type="text" class="form-control" id="ten_goi" name="ten_goi" placeholder="Tên gói" required="" >
                                    </div>
                                    <div class="form-group">
                                        <label for="credit">CREDIT</label>
                                        <input type="number" class="form-control" id="credit" name="credit" placeholder="Credit" required=""  > 
                                    </div>
                                    <div class="form-group">
                                        <label for="so_tien">SỐ TIỀN</label>
                                        <input type="number" class="form-control" id="so_tien" name="so_tien" placeholder="Số tiền" required=""  >  
                                    </div>
                                    <button type="submit" class="btn btn-success waves-effect waves-light">
                                            <span class="btn-label"><i class="fe-plus"></i></span>Thêm
                                        </button>
                                </form>
                            </div>    
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
@endsection
