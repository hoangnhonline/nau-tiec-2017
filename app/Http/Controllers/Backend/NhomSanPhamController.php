<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\NhomSanPham;
use Helper, File, Session, Auth;

class NhomSanPhamController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(Request $request)
    {

        $items = NhomSanPham::orderBy('display_order')->paginate(20);

      
        return view('backend.nhom-san-pham.index', compact( 'items' ));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create(Request $request)
    {          

        return view('backend.nhom-san-pham.create');
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
            'tennhom' => 'required'            
        ],
        [                                    
            'tennhom.required' => 'Bạn chưa nhập tên nhóm'
        ]);       
        $dataArr['display_order'] = Helper::getNextOrder('nhomsp');
      

        $rs = NhomSanPham::create($dataArr);
        
        Session::flash('message', 'Tạo mới nhóm sản phẩm thành công');

        return redirect()->route('nhom-san-pham.index');
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

        $detail = NhomSanPham::find($id);

        return view('backend.nhom-san-pham.edit', compact('detail'));
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
            'tennhom' => 'required'            
        ],
        [                                    
            'tennhom.required' => 'Bạn chưa nhập tên nhóm'
        ]);       
        
        
        $dataArr['nhom-san-pham_code'] = Helper::stripUnicode($dataArr['tennhom']);

        $model = NhomSanPham::find($dataArr['id']);

        $model->update($dataArr);
       
        Session::flash('message', 'Cập nhật nhóm sản phẩm thành công');        

        return redirect()->route('nhom-san-pham.edit', $dataArr['id']);
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
        $model = NhomSanPham::find($id);
        $model->delete();

        // redirect
        Session::flash('message', 'Xóa nhóm sản phẩm thành công');
        return redirect()->route('nhom-san-pham.index');
    }
}