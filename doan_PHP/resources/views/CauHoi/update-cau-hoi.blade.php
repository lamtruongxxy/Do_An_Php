@extends('layout')

@section('main-content')
<div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3 header-title">CẬP NHẬT CÂU HỎI</h4>

                                <form action="{{ route('cau-hoi.xl-cap-nhat',['id'=>$dsCauHoi->id]) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="noi_dung">Nội dung</label>
                                        <input type="text" class="form-control" id="noi_dung" name="noi_dung" value="{{ $dsCauHoi->noi_dung }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="linh_vuc_id">Lĩnh vực</label>
                                        <input type="text" class="form-control" id="linh_vuc_id" name="linh_vuc_id" value="{{ $dsCauHoi->linh_vuc_id }}">
                                    </div>
                                    <!--<div class="form-group">
                                        <label for="linh_vuc_id">Lĩnh vực</label>
                                       <select id="linh_vuc_id" name="linh_vuc_id"class="form-control">
                                            <option>Lĩnh vực</option>
                                            @foreach( $dsLinhVuc as $linhVuc)
                                            <option value="{{ $dsCauHoi->linh_vuc_id }}">{{ $linhVuc->ten_linh_vuc }}</option> @endforeach
                                            </select>
                                    </div>-->

                                    <div class="form-group">
                                        <label for="phuong_an_a">Phương án A</label>
                                        <input type="text" class="form-control" id="phuong_an_a" name="phuong_an_a" value="{{ $dsCauHoi->phuong_an_a }}" >
                                    </div>

                                    <div class="form-group">
                                        <label for="phuong_an_b">Phương án B</label>
                                        <input type="text" class="form-control" id="phuong_an_b" name="phuong_an_b" value="{{ $dsCauHoi->phuong_an_b }}">
                                    </div>                       
                                    <div class="form-group">
                                        <label for="phuong_an_c">Phương án C</label>
                                        <input type="text" class="form-control" id="phuong_an_c" name="phuong_an_c" value="{{ $dsCauHoi->phuong_an_c }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="phuong_an_d">Phương án D</label>
                                        <input type="text" class="form-control" id="phuong_an_d" name="phuong_an_d" value="{{ $dsCauHoi->phuong_an_d }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="dap_an">Đáp án</label>
                                        <select id="dap_an" name="dap_an"class="form-control">
                                            <option value="A" >A</option>
                                            <option value="B" >B</option>
                                            <option value="C" >C</option>
                                            <option value="D" >D</option>
                                        </select>
                                    </div>
                                    <button type="sumit" class="btn btn-success waves-effect waves-light">
                                            <span class="btn-label"><i class="mdi mdi-pen-minus"></i></span>Cập nhật
                                        </button>     
                                </form>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div>                   <!-- end col -->      
</div>
@endsection