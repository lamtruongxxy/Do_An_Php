 
@extends('layout')

@section('main-content')
                <div class="row">
                    <div class="col-lg-6">
                    @include('request/errors') 
                        <div class="card">
                            <div class="card-body">
                                <h3 class="mb-3 header-title"> CẬP NHẬT GÓI CREDIT </h3>

                                <form action="{{ route('goi-credit.xl-cap-nhat',['id'=>$goiCredit->id]) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="ten_goi">TÊN GÓI</label>
                                        <input type="text" class="form-control" id="ten_goi" name="ten_goi" placeholder="Tên gói" value="{{ $goiCredit->ten_goi }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="credit">CREDIT</label>
                                        <input type="number" class="form-control" id="credit" name="credit" placeholder="Credit"
                                        value="{{ $goiCredit->credit }}"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="so_tien">SỐ TIỀN</label>
                                        <input type="number" class="form-control" id="so_tien" name="so_tien" placeholder="Số tiền" value="{{ $goiCredit->so_tien }}">  
                                    </div>
                                    <button type="sumit" class="btn btn-success waves-effect waves-light">
                                            <span class="btn-label"><i class="mdi mdi-pen-minus"></i></span>Cập nhật
                                        </button>
                                </form>
                            </div>    
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
@endsection