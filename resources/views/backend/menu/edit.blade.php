@extends('backend.layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Menu
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('menu.index') }}">Menu</a></li>
      <li class="active">Chỉnh sửa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default" href="{{ route('menu.index') }}" style="margin-bottom:5px">Quay lại</a>
    <form role="form" method="POST" action="{{ route('menu.update') }}">
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
                                           
                
                <div class="form-group" >
                  
                  <label>Tên menu<span class="red-star">*</span></label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ $detail->name }}">
                </div>
                <div class="form-group" >                  
                  <label>Giá<span class="red-star">*</span></label>
                  <input type="text" class="form-control" name="price" id="price" value="{{ old('price', $detail->price) }}">
                </div>     
                <?php $i = 0; ?>
                @foreach($detail->foodMenu as $food)
                <?php $i++; ?>
                <div class="form-group" >                  
                  <label>Món {{ $i }}<span class="red-star">*</span></label>
                  <input type="text" class="form-control" name="food_menu[]" value="{{ $food->name }}">
                </div>  
                @endforeach         
                @for($j = $i; $j<8; $j++)
                <div class="form-group" >                  
                  <label>Món {{ $j+1 }}<span class="red-star">*</span></label>
                  <input type="text" class="form-control" name="food_menu[]" value="">
                </div> 
                @endfor                  
            </div>                      
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Lưu</button>
              <a class="btn btn-default" class="btn btn-primary" href="{{ route('menu.index')}}">Hủy</a>
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