<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\FoodGroup;
use Helper, File, Session, Auth;

class FoodGroupController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(Request $request)
    {

        $items = FoodGroup::orderBy('display_order')->paginate(20);

      
        return view('backend.food-group.index', compact( 'items' ));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create(Request $request)
    {          

        return view('backend.food-group.create');
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
            'name' => 'required'            
        ],
        [                                    
            'name.required' => 'Bạn chưa nhập tên màu'
        ]);       
        $dataArr['display_order'] = Helper::getNextOrder('food_type');
      

        $rs = FoodGroup::create($dataArr);
        
        Session::flash('message', 'Tạo mới màu thành công');

        return redirect()->route('food-group.index');
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

        $detail = FoodGroup::find($id);

        return view('backend.food-group.edit', compact('detail'));
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
            'name' => 'required'            
        ],
        [                                    
            'title.required' => 'Bạn chưa nhập tên màu'
        ]);       
        
        
        $dataArr['food-group_code'] = Helper::stripUnicode($dataArr['name']);

        $model = FoodGroup::find($dataArr['id']);

        $model->update($dataArr);
       
        Session::flash('message', 'Cập nhật màu thành công');        

        return redirect()->route('food-group.edit', $dataArr['id']);
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
        $model = FoodGroup::find($id);
        $model->delete();

        // redirect
        Session::flash('message', 'Xóa màu thành công');
        return redirect()->route('food-group.index');
    }
}