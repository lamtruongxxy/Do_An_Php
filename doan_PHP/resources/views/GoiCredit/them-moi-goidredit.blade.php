 
@extends('layout')

@section('main-content')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="mb-3 header-title"> Thêm gói credit </h3>

                                <form action="{{ route('goi-credit.post-them-moi') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="ten_goi">TÊN GÓI</label>
                                        <input type="text" class="form-control" id="ten_goi" name="ten_goi" placeholder="Tên gói">
                                    </div>
                                    <div class="form-group">
                                        <label for="credit">CREDIT</label>
                                        <input type="number" class="form-control" id="credit" name="credit" placeholder="Credit"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="so_tien">SỐ TIỀN</label>
                                        <input type="number" class="form-control" id="so_tien" name="so_tien" placeholder="Số tiền">  
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