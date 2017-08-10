@extends('backend.layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Màu   
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('loai-san-pham.index') }}">Màu</a></li>
      <li class="active">Chỉnh sửa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default" href="{{ route('loai-san-pham.index') }}" style="margin-bottom:5px">Quay lại</a>
    <form role="form" method="POST" action="{{ route('loai-san-pham.update') }}">
    <div class="row">
      <!-- left column -->
      <input name="id" value="{{ $detail->id }}" type="hidden">
      <div class="col-md-7">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Chỉnh sửa</h3>
          </div>
          <!-- /.box-header -->               
            {!! csrf_field() !!}

            <div class="box-body">
              @if(Session::has('message'))
              <p class="alert alert-info" >{{ Session::get('message') }}</p>
              @endif
              @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif                
                                           
                
                <div class="form-group">
                    <label>Nhóm sản phẩm <span class="red-star">*</span></label>
                    <select name="id_nhom" id="id_nhom" class="form-control">
                        <option value="">--chọn--</option>
                        @if( $tennhom->count() > 0)
                          @foreach( $tennhom as $value )
                              <option value="{{ $value->id }}" {{ old('id_nhom', $detail->id_nhom) == $value->id ? "selected" : "" }}>{{ $value->tennhom }}</option>
                          @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group" >
                  
                  <label>Tên loại<span class="red-star">*</span></label>
                  <input type="text" class="form-control" name="tenloai" id="tenloai" value="{{ old('tenloai', $detail->tenloai ) }}">
                </div>                       
                  
            </div>                      
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Lưu</button>
              <a class="btn btn-default" class="btn btn-primary" href="{{ route('loai-san-pham.index')}}">Hủy</a>
            </div>
            
        </div>
        <!-- /.box -->     

      </div>         
    </div>
    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
@stop