@extends('backend.layout')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Loại Sản Phẩm
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ route( 'loai-san-pham.index' ) }}">Loại Sản Phẩm</a></li>
    <li class="active">Danh sách</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      @if(Session::has('message'))
      <p class="alert alert-info" >{{ Session::get('message') }}</p>
      @endif
      <a href="{{ route('loai-san-pham.create', ['id_nhom' => $id_nhom]) }}" class="btn btn-info" style="margin-bottom:5px">Tạo mới</a>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Bộ lọc</h3>
        </div>
        <div class="panel-body">
          <form class="form-inline" role="form" method="GET" action="{{ route('loai-san-pham.index') }}">            
            <div class="form-group">
              <label for="email">Nhóm sản phẩm </label>
              <select class="form-control" name="id_nhom" id="id_nhom">
                <option value="">--Tất cả--</option>
                @if( $tennhom->count() > 0)
                  @foreach( $tennhom as $value )
                  <option value="{{ $value->id }}" {{ $value->id == $id_nhom ? "selected" : "" }}>{{ $value->tennhom }}</option>
                  @endforeach
                @endif
              </select>
            </div>                        
            <button type="submit" class="btn btn-default btn-sm">Lọc</button>
          </form>         
        </div>
      </div>
      <div class="box">

        <div class="box-header with-border">
          <h3 class="box-title">Danh sách ( <span class="value">{{ $items->total() }} loại sản phẩm )</span></h3>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
          <div style="text-align:center">
           {{ $items->links() }}
          </div>   
          <table class="table table-bordered" id="table-list-data">
            <tr>
              <th style="width: 1%">#</th>                            
              <th>Tên loại</th>
              <th width="1%;white-space:nowrap">Thao tác</th>
            </tr>
            <tbody>
            @if( $items->count() > 0 )
              <?php $i = 0; ?>
              @foreach( $items as $item )
                <?php $i ++; ?>
              <tr id="row-{{ $item->id }}">
                <td><span class="order">{{ $i }}</span></td>      
                     
                <td>                  
                  <a href="{{ route( 'loai-san-pham.edit', [ 'id' => $item->id ]) }}">{{ $item->tenloai }}</a>
                </td>
                <td style="white-space:nowrap">                  
                  <a href="{{ route( 'loai-san-pham.edit', [ 'id' => $item->id ]) }}" class="btn btn-warning">Chỉnh sửa</a>                 
                  
                  <a onclick="return callDelete('{{ $item->title }}','{{ route( 'loai-san-pham.destroy', [ 'id' => $item->id ]) }}');" class="btn btn-danger">Xóa</a>                
                  
                </td>
              </tr> 
              @endforeach
            @else
            <tr>
              <td colspan="3">Không có dữ liệu.</td>
            </tr>
            @endif

          </tbody>
          </table>
           
        </div>        
      </div>
      <!-- /.box -->     
    </div>
    <!-- /.col -->  
  </div> 
</section>
<!-- /.content -->
</div>
@stop
@section('javascript_page')
<script type="text/javascript">
function callDelete(name, url){  
  swal({
    title: 'Bạn muốn xóa "' + name +'"?',
    text: "Dữ liệu sẽ không thể phục hồi.",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes'
  }).then(function() {
    location.href= url;
  })
  return flag;
}
</script>
@stop