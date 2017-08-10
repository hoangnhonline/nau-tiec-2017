<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\LoaiSanPham;
use App\Models\NhomSanPham;
use Helper, File, Session, Auth;

class LoaiSanPhamController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    
    public function index(Request $request)
    {

        $tennhom = NhomSanPham::orderBy('display_order')->get();

        $id_nhom = $request->id_nhom ? $request->id_nhom : null;
        
        $query = LoaiSanPham::whereRaw('1');

        if( $id_nhom > 0){
            $query->where('id_nhom', $id_nhom);
        }

        $items = $query->orderBy('display_order')->paginate(20);
      
        return view('backend.loai-san-pham.index', compact( 'items', 'tennhom', 'id_nhom'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create(Request $request)
    {          
        $tennhom = NhomSanPham::orderBy('display_order')->get();
        
        $id_nhom = $request->id_nhom ? $request->id_nhom : null;

        return view('backend.loai-san-pham.create', compact('tennhom', 'id_nhom'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  Request  $request
    * @return Response
    */
    public function store(Request $request)
    {
        $dataArr = $request->all();
        
        $this->validate($request,[                                    
            'tenloai' => 'required',
            'id_nhom' => 'required'          
        ],
        [                                    
            'tenloai.required' => 'Bạn chưa nhập tên loại',
            'id_nhom.required' => 'Bạn chưa chọn nhóm sản phẩm'
        ]);       
        $dataArr['display_order'] = Helper::getNextOrder('loaisp', 
                                                        ['id_nhom' => $dataArr['id_nhom']]);
      

        $rs = LoaiSanPham::create($dataArr);
        
        Session::flash('message', 'Tạo mới loại sản phẩm thành công');

        return redirect()->route('loai-san-pham.index');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show($id)
    {
    //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {        
        $tennhom = NhomSanPham::orderBy('display_order')->get();

        $detail = LoaiSanPham::find($id);

        return view('backend.loai-san-pham.edit', compact('detail', 'tennhom'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  Request  $request
    * @param  int  $id
    * @return Response
    */
    public function update(Request $request)
    {
        $dataArr = $request->all();
        
         $this->validate($request,[                                    
            'tenloai' => 'required',
            'id_nhom' => 'required'          
        ],
        [                                    
            'tenloai.required' => 'Bạn chưa nhập tên loại',
            'id_nhom.required' => 'Bạn chưa chọn nhóm sản phẩm'
        ]);

        $model = LoaiSanPham::find($dataArr['id']);

        $model->update($dataArr);
       
        Session::flash('message', 'Cập nhật loại sản phẩm thành công');        

        return redirect()->route('loai-san-pham.edit', $dataArr['id']);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
        // delete
        $detail = LoaiSanPham::find($id);
        
        $id_nhom = $detail->id_nhom;

        $detail->delete();

        // redirect
        Session::flash('message', 'Xóa loại sản phảm thành công');
        return redirect()->route('loai-san-pham.index', ['id_nhom' => $id_nhom]);
    }
}