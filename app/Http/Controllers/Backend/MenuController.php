<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\FoodMenu;
use Helper, File, Session, Auth;

class MenuController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(Request $request)
    {

        $query = Menu::whereRaw('1');

        $items = $query->orderBy('display_order')->paginate(100);
        
      
        return view('backend.menu.index', compact( 'items' ));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create(Request $request)
    {          

        return view('backend.menu.create');
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
            'title.required' => 'Bạn chưa nhập tên màu'
        ]);       
        
        
        $rs = Menu::create($dataArr);
        
        if(!empty($dataArr['food_menu'])){
            $i = 0;
            foreach($dataArr['food_menu'] as $food){
                if($food!= ''){
                    $i++;

                    FoodMenu::create([
                            'menu_id' => $rs->id,
                            'name' => $food,
                            'display_order' => $i,
                            'slug' => str_slug($food),
                            'created_user' => Auth::user()->id,
                            'updated_user' => Auth::user()->id
                        ]);
                }
            }
        }

        Session::flash('message', 'Tạo mới màu thành công');

        return redirect()->route('menu.index');
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

        $detail = Menu::find($id);

        return view('backend.menu.edit', compact('detail'));
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
        
        $model = Menu::find($dataArr['id']);

        $model->update($dataArr);
        FoodMenu::where('menu_id', $dataArr['id'])->delete();
        if(!empty($dataArr['food_menu'])){
            $i = 0;
            foreach($dataArr['food_menu'] as $food){
                if($food!= ''){
                $i++;
                FoodMenu::create([
                        'menu_id' => $dataArr['id'],
                        'name' => $food,
                        'display_order' => $i,
                        'slug' => str_slug($food),
                        'created_user' => Auth::user()->id,
                        'updated_user' => Auth::user()->id
                    ]);
                }
            }
        }
       
        Session::flash('message', 'Cập nhật màu thành công');        

        return redirect()->route('menu.edit', $dataArr['id']);
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
        $model = Menu::find($id);
        $model->delete();

        // redirect
        Session::flash('message', 'Xóa màu thành công');
        return redirect()->route('menu.index');
    }
}