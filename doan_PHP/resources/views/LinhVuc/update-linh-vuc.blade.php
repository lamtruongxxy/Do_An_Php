 @extends('layout')

@section('main-content')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="mb-3 header-title"> CẬP NHẬT LĨNH VỰC </h3>
                                <form action="{{ route('linh-vuc.xl-cap-nhat',['id'=> $linhVuc->id]) }}"method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="ten_linh_vuc">TÊN LĨNH VỰC</label>
                                        <input type="text" class="form-control" id="ten_linh_vuc" name="ten_linh_vuc" placeholder="Tên Lĩnh vực" value="{{ $linhVuc->ten_linh_vuc }}"> 
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