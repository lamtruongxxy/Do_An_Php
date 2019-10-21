 
@extends('layout')

@section('main-content')
<div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3 header-title">Thêm mới câu hỏi</h4>
                                <form action="{{ route('cau-hoi.post-them-moi') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="noi_dung">Nội dung</label>
                                        <input type="text" class="form-control" id="noi_dung" name="noi_dung" placeholder="Nội dung">
                                    </div>

                                     <div class="form-group">
                                        <label for="noi_dung">Lĩnh vực</label>
                                        <select id="linh_vuc_id" name="linh_vuc_id"class="form-control">
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
                                        <input type="text" class="form-control" id="dap_an" name="dap_an" placeholder="Đáp án">
                                    </div>
                                    <button type="sumit" class="btn btn-success waves-effect waves-light">
                                            <span class="btn-label"><i class="fe-plus"></i></span>Thêm
                                        </button>     
                                </form>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div>                   <!-- end col -->      
</div>
@endsection