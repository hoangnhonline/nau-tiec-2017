<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\LoaiSp;
use App\Models\Cate;
use App\Models\Product;
use App\Models\SpThuocTinh;
use App\Models\ProductImg;
use App\Models\ThuocTinh;
use App\Models\LoaiThuocTinh;
use App\Models\Banner;
use App\Models\HoverInfo;
use App\Models\Location;
use App\Models\TinhThanh;
use App\Models\Articles;
use App\Models\ArticlesCate;
use App\Models\Customer;
use App\Models\Newsletter;
use App\Models\PriceRange;
use App\Models\Settings;
use App\Models\LinkSite;
use App\Models\LinkImage;
use App\Models\CustomerNotification;
use Helper, File, Session, Auth, Hash;

class HomeController extends Controller
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
        $productArr = $manhinhArr = [];
        $loaiSp = LoaiSp::where('status', 1)->get();
        $bannerArr = [];
        $hoverInfo = [];
        foreach( $loaiSp as $loai){            
            $query = Product::where( [ 'status' => 1, 'loai_id' => $loai->id ])
                            ->where('so_luong_ton', '>', 0)
                            ->where('price', '>', 0)            
                            ->leftJoin('product_img', 'product_img.id', '=','product.thumbnail_id')            
                            ->select('product_img.image_url', 'product.*')                        
                            ->orderBy('product.id', 'desc')            
                            ->limit(15);
           
            $productArr[$loai->id] = $query->get();

            if( $loai->home_style > 0 ){
                $bannerArr[$loai->id] = Banner::where(['object_id' => $loai->id, 'object_type' => 1])->orderBy('display_order', 'asc')->orderBy('id', 'asc')->get();
            }       

           
            if(count($productArr) > 0){
                $hoverInfoTmp = HoverInfo::orderBy('display_order', 'asc')->orderBy('id', 'asc')->get();
                
                foreach($hoverInfoTmp as $value){
                    if($value->loai_id == $loai->id){
                        $hoverInfo[$value->loai_id][] = $value;
                    }
                }
            }
            //dd($hoverInfo);
            /*
            $tmp = SpThuocTinh::where('product_id', $detail->id)->select('thuoc_tinh')->first();
            
            if( $tmp ){
                $spThuocTinhArr = json_decode( $tmp->thuoc_tinh, true);
            }
            if ( $spThuocTinhArr ){
                $loaiThuocTinhArr = LoaiThuocTinh::where('loai_id', $loai->id)->orderBy('display_order')->get();            
               
                if( $loaiThuocTinhArr->count() > 0){
                    foreach ($loaiThuocTinhArr as $value) {

                        $thuocTinhArr[$value->id]['id'] = $value->id;
                        $thuocTinhArr[$value->id]['name'] = $value->name;

                        $thuocTinhArr[$value->id]['child'] = ThuocTinh::where('loai_thuoc_tinh_id', $value->id)->select('id', 'name')->orderBy('display_order')->get()->toArray();
                    }
                    
                }        
            } */ 
        
        }// foreach
      //  dd($hoverInfo);
        $settingArr = Settings::whereRaw('1')->lists('value', 'name');
        $seo = $settingArr;
        $seo['title'] = $settingArr['site_title'];
        $seo['description'] = $settingArr['site_description'];
        $seo['keywords'] = $settingArr['site_keywords'];
        $socialImage = $settingArr['banner'];



        $articlesArr = Articles::where(['cate_id' => 1, 'is_hot' => 1])->orderBy('id', 'desc')->get();
                
        return view('frontend.home.index', compact(
                                'productArr', 
                                'bannerArr', 
                                'articlesArr', 
                                'socialImage', 
                                'seo', 
                                'thuocTinhArr', 
                                'loaiThuocTinhArr', 
                                'spThuocTinhArr',
                                'hoverInfo'));
    }

    public function getNoti(){
        $countMess = 0;
        if(Session::get('userId') > 0){
            $countMess = CustomerNotification::where(['customer_id' => Session::get('userId'), 'status' => 1])->count();    
        }
        return $countMess;
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function search(Request $request)
    {
        $tu_khoa = $request->keyword;       
        $loaiDetail = (object) [];
        $productList = Product::where('product.alias', 'LIKE', '%'.$tu_khoa.'%')->where('so_luong_ton', '>', 0)->where('price', '>', 0)->where('loai_sp.status', 1)                        
                        ->leftJoin('product_img', 'product_img.id', '=','product.thumbnail_id')
                        ->leftJoin('sp_thuoctinh', 'sp_thuoctinh.product_id', '=','product.id')
                        ->join('loai_sp', 'loai_sp.id', '=', 'product.loai_id')
                        ->select('product_img.image_url', 'product.*', 'thuoc_tinh')
                        ->orderBy('id', 'desc')->paginate(20);
        $loaiDetail->name = $seo['title'] = $seo['description'] =$seo['keywords'] = "Tìm kiếm sản phẩm theo từ khóa '".$tu_khoa."'";
        $hoverInfo = [];
        if($productList->count() > 0){
            $hoverInfoTmp = HoverInfo::orderBy('display_order', 'asc')->orderBy('id', 'asc')->get();
            foreach($hoverInfoTmp as $value){
                $hoverInfo[$value->loai_id][] = $value;
            }
        }
        //var_dump("<pre>", $hoverInfo);die;
        return view('frontend.search.index', compact('productList', 'tu_khoa', 'seo', 'hoverInfo', 'loaiDetail'));
    }
    public function ajaxTab(Request $request){
        $table = $request->type ? $request->type : 'category';
        $id = $request->id;

        $arr = Film::getFilmHomeTab( $table, $id);

        return view('frontend.index.ajax-tab', compact('arr'));
    }
    public function contact(Request $request){        

        $seo['title'] = 'Liên hệ';
        $seo['description'] = 'Liên hệ';
        $seo['keywords'] = 'Liên hệ';
        $socialImage = '';
        return view('frontend.contact.index', compact('seo', 'socialImage'));
    }

    public function newsList(Request $request)
    {
        $slug = $request->slug;
        $cateArr = $cateActiveArr = $moviesActiveArr = [];
       
        $cateDetail = ArticlesCate::where('slug' , $slug)->first();

        $title = trim($cateDetail->meta_title) ? $cateDetail->meta_title : $cateDetail->name;

        $articlesArr = Articles::where('cate_id', $cateDetail->id)->orderBy('id', 'desc')->paginate(10);

        $hotArr = Articles::where( ['cate_id' => $cateDetail->id, 'is_hot' => 1] )->orderBy('id', 'desc')->limit(5)->get();
        $seo['title'] = $cateDetail->meta_title ? $cateDetail->meta_title : $cateDetail->title;
        $seo['description'] = $cateDetail->meta_description ? $cateDetail->meta_description : $cateDetail->title;
        $seo['keywords'] = $cateDetail->meta_keywords ? $cateDetail->meta_keywords : $cateDetail->title;
        $socialImage = $cateDetail->image_url;       
        return view('frontend.news.index', compact('title', 'hotArr', 'articlesArr', 'cateDetail', 'seo', 'socialImage'));
    }      

     public function newsDetail(Request $request)
    {     
        $id = $request->id;

        $detail = Articles::where( 'id', $id )
                ->select('id', 'title', 'slug', 'description', 'image_url', 'content', 'meta_title', 'meta_description', 'meta_keywords', 'custom_text', 'created_at', 'cate_id')
                ->first();
        $is_km = $is_news = $is_kn = 0;
        if( $detail ){           

            $title = trim($detail->meta_title) ? $detail->meta_title : $detail->title;

            $hotArr = Articles::where( ['cate_id' => 1, 'is_hot' => 1] )->where('id', '<>', $id)->orderBy('id', 'desc')->limit(5)->get();
            $otherArr = Articles::where( ['cate_id' => 1] )->where('id', '<>', $id)->orderBy('id', 'desc')->limit(5)->get();
            $seo['title'] = $detail->meta_title ? $detail->meta_title : $detail->title;
            $seo['description'] = $detail->meta_description ? $detail->meta_description : $detail->title;
            $seo['keywords'] = $detail->meta_keywords ? $detail->meta_keywords : $detail->title;
            $socialImage = $detail->image_url; 
            $is_km = $detail->cate_id == 2 ? 1 : 0;
            $is_news = $detail->cate_id == 1 ? 1 : 0;
            $is_kn = $detail->cate_id == 4 ? 1 : 0;
            return view('frontend.news.news-detail', compact('title',  'hotArr', 'detail', 'otherArr', 'seo', 'socialImage', 'is_km', 'is_news', 'is_kn'));
        }else{
            return view('erros.404');
        }
    }

    public function registerNews(Request $request)
    {

        $register = 0; 
        $email = $request->email;
        $newsletter = Newsletter::where('email', $email)->first();
        if(is_null($newsletter)) {
           $newsletter = new Newsletter;
           $newsletter->email = $email;
           $newsletter->is_member = Customer::where('email', $email)->first() ? 1 : 0;
           $newsletter->save();
           $register = 1;
        }

        return $register;
    }

}
