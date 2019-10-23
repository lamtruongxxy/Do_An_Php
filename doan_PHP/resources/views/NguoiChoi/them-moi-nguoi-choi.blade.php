 
@extends('layout')

@section('main-content')
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="mb-3 header-title"> Thêm người chơi </h3>

                                <form action="{{ route('nguoi-choi.post-them-moi') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="ten_dang_nhap">TÊN ĐĂNG NHẬP</label>
                                        <input type="text" class="form-control" id="ten_dang_nhap" name="ten_dang_nhap" placeholder="Tên đăng nhập"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="mat_khau">MẬT KHẨU</label>
                                        <input type="text" class="form-control" id="mat_khau" name="mat_khau" placeholder="Mật khẩu"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="email">EMAIL</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="hinh_dai_dien">HÌNH ĐẠI DIỆN</label>
                                        <input type="text" class="form-control" id="hinh_dai_dien" name="hinh_dai_dien" placeholder="Hình đại diện"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="diem_cao_nhat">ĐIỂM CAO NHẤT</label>
                                        <input type="number" class="form-control" id="diem_cao_nhat" name="diem_cao_nhat" placeholder="Điểm cao nhất"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="credit">CREDIT</label>
                                        <input type="number" class="form-control" id="credit" name="credit" placeholder="Credit"> 
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