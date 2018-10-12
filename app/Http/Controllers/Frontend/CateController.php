<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ArticlesCate;
use App\Models\Articles;
use App\Models\Banner;
use App\Models\Location;
use App\Models\Pages;
use App\Models\FoodType;
use App\Models\FoodMenu;
use App\Models\Menu;
use App\Models\Food;

use App\Models\MetaData;
use Helper, File, Session, Auth, DB;

class CateController extends Controller
{
    
    public static $loaiSp = []; 
    public static $loaiSpArrKey = [];    

    public function __construct(){
        
       

    }
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(Request $request)
    {   
        $productArr = [];
        $slug = $request->slug;
        $cateDetail = ArticlesCate::where('slug', $slug)->first();
        
        if($cateDetail){//danh muc cha
            $cate_id = $cateDetail->id;
            
            $articlesList = Articles::where('cate_id', $cate_id)                   
                ->orderBy('display_order')->get();
                      
            $socialImage = $cateDetail->banner_menu;

            if( $cateDetail->meta_id > 0){
               $seo = MetaData::find( $cateDetail->meta_id )->toArray();
            }else{
                $seo['title'] = $seo['description'] = $seo['keywords'] = $cateDetail->name;
            }                                     
            return view('frontend.cate.parent', compact('articlesList', 'cateDetail', 'hoverInfo', 'socialImage', 'seo'));
        }else{
            // [ page ]
            $detailPage = Pages::where('slug', $slug)->first();
            if(!$detailPage){
                return redirect()->route('home');
            }
            $seo['title'] = $detailPage->meta_title ? $detailPage->meta_title : $detailPage->title;
            $seo['description'] = $detailPage->meta_description ? $detailPage->meta_description : $detailPage->title;
            $seo['keywords'] = $detailPage->meta_keywords ? $detailPage->meta_keywords : $detailPage->title;           
            return view('frontend.pages.index', compact('detailPage', 'seo'));    
        }
    }
    public function getSeoInfo($meta_id){

    }
   
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function search(Request $request)
    {

        $settingArr = Settings::whereRaw('1')->lists('value', 'name');
        
        $layout_name = "main-category";
        
        $page_name = "page-category";

        $cateArr = $cateActiveArr = $moviesActiveArr = [];

        $tu_khoa = $request->k;
        
        $is_search = 1;

        $moviesArr = Film::where('alias', 'LIKE', '%'.$tu_khoa.'%')->orderBy('id', 'desc')->paginate(20);

        return view('frontend.cate', compact('settingArr', 'moviesArr', 'tu_khoa',  'is_search', 'layout_name', 'page_name' ));
    }

    public function cate(Request $request)
    {
        $id = $request->id;
        if(!$id){
            return redirect()->route('home');
        }
        $detail = Articles::find($id);
        $socialImage = $detail->image_url;
        if( $detail->meta_id > 0){            
           $seo = MetaData::find( $detail->meta_id )->toArray();           
        }else{
            $seo['title'] = $seo['description'] = $seo['keywords'] = $cateDetail->name;
        }
        $otherList = Articles::where('cate_id', $detail->cate_id)->where('id', '<>', $id)->get();
        return view('frontend.cate.child', compact('detail', 'socialImage', 'seo', 'otherList'));
    }    
    
    public function menuCustom(Request $request)
    {
        $foodTypeList = FoodType::orderBy('display_order')->get();
        $seo['title'] = $seo['description'] = $seo['keywords'] = 'MENU TỰ CHỌN';
        

        return view('frontend.cate.menu-custom', compact('foodTypeList', 'socialImage', 'seo'));
    } 

    public function suaMenu(Request $request)
    {
        $foodTypeList = FoodType::orderBy('display_order')->get();
        $seo['title'] = $seo['description'] = $seo['keywords'] = 'Sửa menu';
        
        $id = $request->id;
        $menuDetail = Menu::find($id);
        if(!$menuDetail){
            return redirect()->route('home');
        }
        $foodList = $menuDetail->foodMenu;
        $foodIdArr = [];
        $totalPrice = 0;
        foreach($foodList as $food){
            $foodIdArr[] = $food->food_id;
            $totalPrice+= Food::find($food->food_id)->price;
        }
        return view('frontend.edit-menu', compact('foodTypeList', 'socialImage', 'seo', 'menuDetail', 'foodIdArr', 'totalPrice'));
    } 

    public function newsList(Request $request)
    {
        $settingArr = Settings::whereRaw('1')->lists('value', 'name');
        $layout_name = "main-news";
        
        $page_name = "page-news";

        $cateArr = $cateActiveArr = $moviesActiveArr = [];
       
        $cateDetail = ArticlesCate::where('slug' , 'tin-tuc')->first();
        $title = trim($cateDetail->meta_title) ? $cateDetail->meta_title : $cateDetail->name;

        $articlesArr = Articles::where('cate_id', 1)->orderBy('id', 'desc')->paginate(10);
        $hotArr = Articles::where( ['cate_id' => 1, 'is_hot' => 1] )->orderBy('id', 'desc')->limit(5)->get();
        return view('frontend.news-list', compact('title','settingArr', 'hotArr', 'layout_name', 'page_name', 'articlesArr'));
    }

    public function newsDetail(Request $request)
    {
        $settingArr = Settings::whereRaw('1')->lists('value', 'name');
        $layout_name = "main-news";
        
        $page_name = "page-news";

        $id = $request->id;

        $detail = Articles::where( 'id', $id )
                ->select('id', 'title', 'slug', 'description', 'image_url', 'content', 'meta_title', 'meta_description', 'meta_keywords', 'custom_text')
                ->first();
        if(!$detail){
            return redirect()->route('home');
        }

        if( $detail ){
            $cateArr = $cateActiveArr = $moviesActiveArr = [];
        
            
            $title = trim($detail->meta_title) ? $detail->meta_title : $detail->title;

            $hotArr = Articles::where( ['cate_id' => 1, 'is_hot' => 1] )->where('id', '<>', $id)->orderBy('id', 'desc')->limit(5)->get();

            return view('frontend.news-detail', compact('title', 'settingArr', 'hotArr', 'layout_name', 'page_name', 'detail'));
        }else{
            return view('erros.404');
        }     

        
    }

}
