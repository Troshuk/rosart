<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

use DB;
use Config;
use Session;
use Validator;
use Auth;
use Hash;
use Redirect;
use App;
use Lang;
use Response;
use Mail;

use App\User;
use App\Blog;
use App\BlogCategory;
use App\Product;
use App\Category;
use App\Master;
use App\Order;
use App\OrderStatus;
use App\OrderProduct;
use App\Email;
use App\Setting;
use App\Contact;

function array_trim($array) {
	while (!empty($array) and strlen(reset($array)) === 0) {
		array_shift($array);
	}
	while (!empty($array) and strlen(end($array)) === 0) {
		array_pop($array);
	}
	return $array;
}
class IndexController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/

	public function getLang()
	{
		$locale = Session::get('locale');
		if (in_array($locale, Config::get('app.locales')))
			App::setLocale($locale);
		else
			App::setLocale(Config::get('app.locale'));
		return App::getLocale();
	}

	public function setLang($locale)
    {
        if (in_array($locale, Config::get('app.locales'))) {
            Session::put('locale', $locale);
        }
        return redirect()->back();
    }

    public function setCurrency($currency)
    {
    	if (in_array($currency, Config::get('app.currencys'))) {
            Session::put('currency', $currency);
        }
        return redirect()->back();
    }

	public static function getCurrency()
	{
		$currency = Session::get('currency');
		if (in_array($currency, Config::get('app.currencys')))
			return $currency;
		else
			return Config::get('app.currency');
	}

	public function postLogOut() {
		Auth::logout();
		return redirect()->route('home');
	}

	public function logout() {
        Auth::logout();
        return redirect(url('/'));
    }

	public function postUserLogin(Request $request) {
		$credentials = ($request->only('email', 'password'));
		$rules = [
		'email' => 'required|email|max:255',
		'password' => 'required|min:6',
		];
		$validation = Validator::make($credentials, $rules);
		$errors = $validation->errors();

		$errors = json_decode($errors);
		if ($validation->passes()) {
			if (Auth::attempt(['email' => trim($request->email),
				'password' => $request->password,
				], $request->has('remember'))) {
				Auth::login(Auth::user($request->email));
			return response()->json(['redirect' => true, 'success' => true], 200);
			} else {
				$message = Lang::Get('index.login_error');
				return response()->json(['password' => $message], 422);
			}
		} else {
			return response()->json($errors, 422);
		}
	}

	public function postUserRegister(Request $request) {
		$credentials = ($request->only('name','email', 'password','password_confirmation'));
		//$credentials['password'] = Hash::make($credentials['password']);
		//$credentials['password_confirmation'] = Hash::make($credentials['password_confirmation']);
		$rules = [
			'name' => 'required|max:255|unique:users',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6|confirmed',
			'password_confirmation' => 'required|min:6|same:password',
		];

		$validation = Validator::make($credentials, $rules);
		$errors = $validation->errors();
		$errors = json_decode($errors);

		if ($validation->passes()) {
			$credentials['password'] = Hash::make($credentials['password']);
			$credentials['password_confirmation'] = Hash::make($credentials['password_confirmation']);
			$user = User::create($credentials);
			return response()->json(['redirect' => true, 'success' => true], 200);
		} else {
			return response()->json($errors,422);
		}
	}


	public function home()
	{
		if(view()->exists('pages.index')) {
			$lang = $this->getLang();
			$contacts = DB::table('contacts')
				->select('id','phone','email',
					'adress_'.$lang.' as adress' ,
					'text_'.$lang.' as text')
				->first();

			$about = DB::table('about')
				->select('id','img1','img2','img3','img4', 'imgs',
					'text1_'.$lang.' as text1')
				->first();

			$seo = Setting::where('id', 1)
				->select('metatitle_'.$lang.' as metatitle', 'keywords_'.$lang.' as keywords','description_'.$lang.' as description')
				->first();

			return view('pages.index')
				->with('about',$about)
				->with('contacts',$contacts)
				->with('seo',$seo);
		}
		abort(404);
	}

	public function about()
	{
		if(view()->exists('pages.about')) {
			$lang = $this->getLang();
			$about= DB::table('about')
				->select('id','img1','img2','img3','img4',
					'text1_'.$lang.' as text1' ,
					'text2_'.$lang.' as text2',
					'text3_'.$lang.' as text3'
				)->first();

			$seo = Setting::where('id', 2)
				->select('metatitle_'.$lang.' as metatitle', 'keywords_'.$lang.' as keywords','description_'.$lang.' as description')
				->first();

			return view('pages.about')
				->with('about',$about)
				->with('seo',$seo);
		}
		abort(404);
	}

	public function search(Request $request)
	{
		if(view()->exists('pages.search')) {

			$search = $request->input('search');

			if($search) {
				$lang = $this->getLang();

				$products = Product::select('id','img','name_'.$lang.' as name', 'href', 'name_en')
					->where('name_'.$lang, 'like', '%'.$search.'%')
					->get();

				$blogs = Blog::select('id','img','name_'.$lang.' as name','text_'.$lang.' as text', 'href', 'name_en')
					->where('name_'.$lang, 'like', '%'.$search.'%')
					->orWhere('text_'.$lang, 'like', '%'.$search.'%')
					->get();

				return view('pages.search')
					->with('products',$products)
					->with('blogs', $blogs)
					->with('search',$search);
			} else {
				return redirect()->back();
			}
		}
		abort(404);
	}

	public function blog($href = false)
	{
		if(view()->exists('pages.blog')) {
			$lang = $this->getLang();//Config::get('app.locale');
			$category = false;
			if($href) {
				$category = BlogCategory::where('href', $href)->select('id', 'name_'.$lang.' as name',
					'metatitle_'.$lang.' as metatitle',
					'keywords_'.$lang.' as keywords',
					'description_'.$lang.' as description')
					->first();

				$blog = Blog::select('id','img', 'name_en', 'href', 'name_'.$lang.' as name', 'text_'.$lang.' as text')
					->where('blog_category_id', $category->id)
					->orderBy('id', 'desc')
					->simplePaginate(10);
			} else {
				$blog = Blog::select('id','img', 'name_en', 'href', 'name_'.$lang.' as name', 'text_'.$lang.' as text')
					->orderBy('id', 'desc')
					->simplePaginate(10);
			}
			$blog_categories = BlogCategory::select('id','img','name_'.$lang.' as name', 'name_en', 'href',
					'metatitle_'.$lang.' as metatitle',
					'keywords_'.$lang.' as keywords',
					'description_'.$lang.' as description')
				->orderBy('ord')
				->get();

	        $seo = Setting::where('id', 5)
				->select('metatitle_'.$lang.' as metatitle', 'keywords_'.$lang.' as keywords','description_'.$lang.' as description')
				->first();

			if(count($blog))
				return view('pages.blog')
					->with('blog',$blog)
					->with('blog_categories', $blog_categories)
					->with('category', $category)
					->with('seo', $seo);
			else 
				abort(404);
		}
		abort(404);
	}

	public function blog_popular()
	{
		if(view()->exists('pages.blog_popular')) {
			$lang = $this->getLang();
			$blog = Blog::select('id','img','view', 'href', 'name_en',
					'name_'.$lang.' as name' ,
					'text_'.$lang.' as text'
					)
				->orderBy('view','desc')->simplePaginate(10);
			$blog_categories = BlogCategory::select('id','img','name_'.$lang.' as name', 'href', 'name_en',
					'metatitle_'.$lang.' as metatitle',
					'keywords_'.$lang.' as keywords',
					'description_'.$lang.' as description'
					)
				->orderBy('ord')
				->get();

	        $seo = Setting::where('id', 8)
				->select('metatitle_'.$lang.' as metatitle', 'keywords_'.$lang.' as keywords','description_'.$lang.' as description')
				->first();

			return view('pages.blog_popular')
				->with('blog',$blog)
				->with('blog_categories',$blog_categories)
				->with('seo',$seo);
		}
		abort(404);
	}

	public function product($href = false)
	{
		if(view()->exists('pages.product'))
		{
			if($href)
			{
				$lang = $this->getLang();
				$currency = $this->getCurrency();

				$products = Product::where('products.href',$href)
					->join('masters', 'masters.id', '=', 'products.master_id')
					->join('category_product', 'category_product.product_id', '=','products.id')
					->join('product_technique','product_technique.product_id','=','products.id')
					->join('categories', 'categories.id', '=', 'category_product.category_id')
					->join('techniques', 'techniques.id', '=', 'product_technique.technique_id')
					->select('products.id','products.img','products.imgs','products.price_'.$currency.' as price','products.size','products.year',
						'products.name_'.$lang.' as name' ,
						'masters.name_'.$lang.' as masters' ,
						'categories.name_'.$lang.' as category' ,
						'products.metatitle_'.$lang.' as metatitle',
						'products.keywords_'.$lang.' as keywords',
						'products.description_'.$lang.' as description',
						'techniques.name_'.$lang.' as technique')
					->first();

				$views = array();
		        if(Session::get('views'))
		            $views = unserialize(Session::get('views'));
		        array_unshift($views, $products->id);
		        $views = array_unique($views);
		        Session::put('views', serialize($views));

		        $viewed = array();

		        $i = 1;

		        foreach ($views as $view) {
		            if($view != $products->id) {
		                $viewed[] = Product::where('products.id',$view)
			                ->select('products.id','products.img','products.price_'.$currency.' as price', 'products.name_'.$lang.' as name', 'href', 'name_en')
							->first();
		                if ($i++ == 4) break;
		            }
		        }

		        $desc_soc = strip_tags($products->text);
			    if (strlen($desc_soc) > 200)
			        $desc_soc = substr($desc_soc, 0, strpos($desc_soc, ' ', 200));
			    $desc_soc = str_replace("\n","",$desc_soc);
			    $desc_soc = str_replace("\r","",$desc_soc);

				return view('pages.product')
					->with('products',$products)
					->with('viewed',$viewed)
					->with('desc_soc',$desc_soc);

			} else {
				abort(404);
			}
		}
		abort(404);
	}

public function catalogPost(Request $request){
	if($request->ajax()) {
		$lang = $this->getLang();//Config::get('app.locale');
		$currency = $this->getcurrency();
		$data = $request->masters;
		$pieces = array ();
		$var_masters = array ();	
		$var_technique = array ();
		$var_categories = array ();
		$var_amount_from = array ();
		$var_amount_to = array ();
		$var_filter_sort_by = array (1);
		$field = 'id';
		$method = 'desc';
		if(count($data)){
			foreach($data as $key => $value){
				$pieces = explode("_", $key);
				if ($pieces[0]=='masters'){						
					$var_masters[] = $pieces[1];
				}
				elseif ($pieces[0]=='technique'){						
					$var_technique[] =$pieces[1];
				}
				elseif ($pieces[0]=='categories'){						
					$var_categories[] = $pieces[1];
				}
				elseif ($key=='amount_from'){						
					$var_amount_from = preg_replace('/[^0-9]/','',$value); 
				}
				elseif ($key=='amount_to'){						
					$var_amount_to = preg_replace('/[^0-9]/','',$value); 
				}
				elseif ($key=='filter_sort_by'){	
						//$var_filter_sort_by = $value; 

					switch ($value) {
						case 0:
						$field='id';
						$method='desc';			
						break;
						case 1:
						$field='id';
						$method='desc';
						break;
						case 2:
						$field='price';
						$method='asc';
						break;
						case 3:
						$field='price';
						$method='desc';
						break;
						case 4:
						$field='name_'.$lang;
						$method='asc';
						break;
						case 5:
						$field='name_'.$lang;
						$method='desc';
						break;
					}
				}
			}
		}

		$products = Product::select(
			'products.id','img'
			,'products.price_'.$currency.' as price'
			,'products.master_id'
			,'products.amount'
			,'products.name_'.$lang.' as name', 'products.href', 'products.name_en')

		->join('category_product', 'category_product.product_id', '=','products.id')
		->join('product_technique','product_technique.product_id','=','products.id')

		->where(function($query) use ($var_masters,$var_categories,$var_technique,$var_amount_from,$var_amount_to,$var_filter_sort_by,$field, $method,$currency)
		{
			if (count($var_masters)) {
				$query->wherein('products.master_id', $var_masters);
			}
			else {
				$query->where('products.master_id', '>', 0);
			}
			if (count($var_categories)) {
				$query->wherein('category_product.category_id', $var_categories);
			}
			else {
				$query->where('category_product.category_id', '>', 0);
			}
			if (count($var_technique)) {
				$query->wherein('product_technique.technique_id', $var_technique);
			}
			else {
				$query->where('product_technique.technique_id', '>', 0);
			}
				//if (count($var_amount_from) and count($var_amount_to)) {
			$query->where('products.amount', '>', 0);
			$query->where('products.active', '>', 0);
			$query->whereBetween('products.price_'.$currency, [$var_amount_from, $var_amount_to]);
				//}				
		})
		->groupBy('products.id')
		->orderBy($field, $method)
		->paginate(5);

		return view('pages.filter_category')
			->with('products',$products);
	}
}


public function contacts()
{
	if(view()->exists('pages.contacts'))
	{
		$lang = $this->getLang();//Config::get('app.locale');
		$contacts = DB::table('contacts')
			->select('id','phone','email',
				'adress_'.$lang.' as adress' ,
				'text_'.$lang.' as text'
				)->first();

		$seo = Setting::where('id', 6)
			->select('metatitle_'.$lang.' as metatitle', 'keywords_'.$lang.' as keywords','description_'.$lang.' as description')
			->first();

		return view('pages.contacts')
			->with('contacts',$contacts)
			->with('seo',$seo);
	}
	abort(404);
}

	public function cart()
	{
		if(view()->exists('pages.cart'))
		{
			if( Auth::check () ) {
				$lang = $this->getLang();
				$currency = $this->getcurrency();
				
				$cart = false;
				$products = false;

				if(Session::get('cart'))
		            $cart = unserialize(Session::get('cart'));

		        if($cart){
			        $products = Product::whereIn('id', $cart)
			        	->select('id','img','size','year',
						'products.name_'.$lang.' as name', 'price_'.$currency.' as price', 'href')
			        	->get();
			    }

				return view('pages.cart')
					->with('cart', $products);
			} else abort(404);
		}
		abort(404);
	}

public function postCartCheckout(Request $request) {
	$order = ($request->only('action','phone','address','product_id'));
		$lang = $this->getLang();
		$currency = $this->getcurrency();

		if( Auth::check () ) {	
			// needfix
			if ($order['action']=='existcheckout'){
				if(Session::get('cart')){
		            $cart = unserialize(Session::get('cart'));

		       		$cartsold = Product::whereIn('id', $cart)
			        	->where('products.amount', '<=', 0)
			        	->select('id', 'products.name_'.$lang.' as name')
			        	->get();

					if (count($cartsold)){
						foreach ($cartsold as $product) {
							if(($key = array_search((string)$product->id, $cart)) !== false) {
							    unset($cart[$key]);
							    Session::put('cart', serialize($cart));
							}
						}

						return view('pages.cartsold')
							->with('cartsold',$cartsold);
					} else return '';
				}
			}

			elseif($order['action']=='checkout'){
				if(Session::get('cart')) {
		            $cart = unserialize(Session::get('cart'));
		            $cartsumm = Product::whereIn('id', $cart)->sum('price_'.$currency);
		            $user = Auth::user();

					return view('pages.checkout')
						->with('user',$user)
						->with('cartsumm',$cartsumm)
						->with('currency',$currency);
				}
			}elseif($order['action']=='postcheckout'){
				if(Session::get('cart'))
		            $cart = unserialize(Session::get('cart'));

		        $products = Product::whereIn('id', $cart)
		        	->select('id', 'price_rub', 'price_eur')
		        	->get();

		        $user = Auth::user();
		        $status = OrderStatus::orderBy('ord')->first();

		        $neworder = new Order;
		        $neworder->lang = $lang;
		        $neworder->price = $currency;
		        $neworder->phone = $order['phone'];
		        $neworder->address = $order['address'];
		        $neworder->user_id = $user->id;
		        $neworder->status_id = $status->id;
		        $neworder->save();

		        foreach ($products as $key => $product) {
		        	$newOrderProduct = new OrderProduct;
		        	$newOrderProduct->order_id = $neworder->id;
		        	$newOrderProduct->product_id = $product->id;
		        	$newOrderProduct->price_rub = $product->price_rub;
		        	$newOrderProduct->price_eur = $product->price_eur;
		        	$newOrderProduct->save();
		        }

		        $orderProducts = OrderProduct::where('order_id', $neworder->id)
		        	->join('products', 'products.id', '=','order_products.product_id')
		        	->select('products.id', 'products.price_rub', 'products.price_eur', 'products.img','products.name_'.$lang.' as name', 'products.name_ru', 'order_products.price_'.$currency.' as price')
					->get();

				$summ = OrderProduct::where('order_id', $neworder->id)->sum('price_'.$currency);

		        $contact = Contact::select('phone')->first();

		        if($orderProducts) {
			        if($neworder->lang == 'ru'){
			        	Mail::send('mails.order_ru',
	                    array(
	                        'order' => $neworder,
	                        'user' => $user,
	                        'contact' => $contact,
	                        'orderProducts' => $orderProducts,
	                        'currency' => $currency,
	                        'summ' => $summ
	                    ), function($message) use ($neworder, $user)
	                    {
	                        $message->to($user->email)->subject('РосАрт | Заказ №' . $neworder->id);
	                    });
			        } else {
			        	Mail::send('mails.order_en',
	                    array(
	                        'order' => $neworder,
	                        'user' => $user,
	                        'contact' => $contact,
	                        'orderProducts' => $orderProducts,
	                        'currency' => $currency,
	                        'summ' => $summ
	                    ), function($message) use ($neworder, $user)
	                    {
	                        $message->to($user->email)->subject('RosArt | Order №' . $neworder->id);
	                    });
			        }
			    }

			    $user->phone = $order['phone'];
		        $user->address = $order['address'];
		        $user->save();

		        $sum_rub = OrderProduct::where('order_id', $neworder->id)->sum('price_rub');
		        $sum_eur = OrderProduct::where('order_id', $neworder->id)->sum('price_eur');

				Mail::send('mails.admin_order',
		            array(
		                'orderProducts' => $orderProducts,
		                'order' => $neworder,
		                'user' => $user,
		                'sum_rub' => $sum_rub,
		                'sum_eur' => $sum_eur
		            ), function($message) use ($neworder)
		        {
		            $message->to(env('YOUR_EMAIL'))->subject('РосАрт | Новый заказ №' . $neworder->id);
		        });

		        Product::whereIn('id', $cart)->decrement('amount',1);
		        Session::forget('cart');

				return view('pages.checkoutsuccess');
			} 
		} else abort(404);
	}

	public function addProduct(Request $request)
	{
		$id = $request->input('product_id');
		if($id) {
			$lang = $this->getLang();
			$product = Product::where('id', $id)->where('active', 1)->where('amount', '>', 0)->select('products.name_'.$lang.' as name')->first();
			if($product) {
	            $cart = array();
		        if(Session::get('cart'))
		            $cart = unserialize(Session::get('cart'));
		        if (in_array($id, $cart)) {
		        	return view('pages.modal')
		        		->with('text', Lang::get('index.existcart'));
		        }
		        array_unshift($cart, $id);
		        $cart = array_unique($cart);
		        Session::put('cart', serialize($cart));
			}
			return view('pages.addtocart')
				->with('product',$product);
		} else {
			abort(404);
		}
	}	

	public function deleteProduct(Request $request)
	{
		$id = $request->input('product_id');
		if($id) {
			if(Session::get('cart'))
		        $cart = unserialize(Session::get('cart'));
		    if (in_array($id, $cart)) {
		    	if(($key = array_search((string)$id, $cart)) !== false) {
				    unset($cart[$key]);
				    Session::put('cart', serialize($cart));
				}
		       	return view('pages.modal')
		        	->with('text', Lang::get('index.removefromcart'));
		    }
		} else {
			abort(404);
		}
	}

	/*public function postCartDelete(Request $request) {
		$credentials = ($request->only('name','email', 'password','password_confirmation'));
		//$credentials['password'] = Hash::make($credentials['password']);
		//$credentials['password_confirmation'] = Hash::make($credentials['password_confirmation']);
		$rules = [
		'name' => 'required|max:255|unique:users',
		'email' => 'required|email|max:255|unique:users',
		'password' => 'required|min:6|confirmed',
		'password_confirmation' => 'required|min:6|same:password',
		];
		$validation = Validator::make($credentials, $rules);
		$errors = $validation->errors();
		$errors = json_decode($errors);
		if ($validation->passes()) {
			$credentials['password'] = Hash::make($credentials['password']);
			$credentials['password_confirmation'] = Hash::make($credentials['password_confirmation']);
			$user = User::create($credentials);
			Auth::login($user);
			return response()->json(['redirect' => true, 'success' => true], 200);
		} else {
			return response()->json($errors,422);
		}
	}*/

	public function article($href = false)
	{

		if(view()->exists('pages.article'))
		{
			$lang = $this->getLang();//Config::get('app.locale');
			if($href) {
				$blog = Blog::where('blogs.href',$href)
					->join('blog_categories', 'blogs.blog_category_id', '=','blog_categories.id' )
					->select('blogs.href', 'blogs.blog_category_id', 'blogs.img','blogs.view','blogs.created_at',
						'blogs.name_'.$lang.' as name' ,
						'blogs.text_'.$lang.' as text',
						'blogs.metatitle_'.$lang.' as metatitle',
						'blogs.keywords_'.$lang.' as keywords',
						'blogs.description_'.$lang.' as description',
						'blogs.user_name_'.$lang.' as user_name',
						'blog_categories.name_'.$lang.' as category'
						)
					->first();

				$category = BlogCategory::where('id', $blog->blog_category_id)->select('href')->first();
				$views = array();
	            $views = unserialize(Session::get('blogViews'));
	            
	            if($views) {
	                if(!in_array($blog->id, $views)) {
	                    $views[] = $blog->id;
	                    Session::put('blogViews', serialize($views));
	                    $blog->increment('view', 1);
	                }
	            }
	            else {
	                $views[] = $blog->id;
	                Session::put('blogViews', serialize($views));
	                $blog->increment('view', 1);
	            }

	            $desc_soc = strip_tags($blog->text);
		        if (strlen($desc_soc) > 200)
		            $desc_soc = substr($desc_soc, 0, strpos($desc_soc, ' ', 200));
		        $desc_soc = str_replace("\n","",$desc_soc);
		        $desc_soc = str_replace("\r","",$desc_soc);

				return view('pages.article')
					->with('blog',$blog)
					->with('category',$category)
					->with('desc_soc',$desc_soc);
			} else {
				abort(404);
			}
		}
		abort(404);
	}

	public function categories()
	{
		if(view()->exists('pages.catalog'))
		{
			$lang = $this->getLang();//Config::get('app.locale');
			$categories = DB::table('categories')
			->select('id','img',
				'name_'.$lang.' as name' ,
				'metatitle_'.$lang.' as metatitle',
				'keywords_'.$lang.' as keywords',
				'description_'.$lang.' as description'
				)
			->orderBy('ord')
			->simplePaginate(10);
			if (count($categories))
				return view('pages.catalog')->with('categories',$categories);
			else abort(404);
		}
		abort(404);
	}

	public function catalog($href = false)
	{
		if(view()->exists('pages.category'))
		{
			$lang = $this->getLang();
			$currency = $this->getcurrency();

			$masters = DB::table('masters')
				->select('id', 'name_'.$lang.' as name')
				->orderBy('name')
				->get();

			$technique = DB::table('techniques')
				->select('id', 'name_'.$lang.' as name' )
				->orderBy('ord')
				->get();

			$products = Product::where('products.amount', '>', 0)
				->where('products.active', '=', 1)
				->join('category_product', 'category_product.product_id', '=','products.id')
				->select(
					'products.id','img', 'category_product.category_id', 'products.href', 'products.name_ru',
					'products.price_'.$currency.' as price',
					'products.name_'.$lang.' as name')
				->groupBy('products.id')
				->orderBy('products.id', 'desc');

			$category = false;
			$id = false;

			if ($href) {
				$category = Category::where('href', $href)->select('id','name_'.$lang.' as name','metatitle_'.$lang.' as metatitle',
					'keywords_'.$lang.' as keywords','description_'.$lang.' as description')
					->first();
				$id = $category->id;
				$products = $products->where('category_product.category_id', $category->id)->paginate(5);
			} else {
				$products = $products->paginate(5);
			}

	        $max = Product::max('price_'.$currency);
	        $min = Product::min('price_'.$currency);

	        $seo = Setting::where('id', 4)
				->select('metatitle_'.$lang.' as metatitle', 'keywords_'.$lang.' as keywords','description_'.$lang.' as description')
				->first();

			return view('pages.category')
				->with('technique',$technique)			
				->with('masters',$masters)
				->with('products',$products)
				->with('cat_id', $id)
				->with('max',$max)
				->with('min',$min)
				->with('category',$category)
				->with('master', false)
				->with('mas_id', false)
				->with('seo', $seo);
		}
		abort(404);
	}

	public function masterWorks($href)
	{
		if(view()->exists('pages.category'))
		{
			$lang = $this->getLang();
			$currency = $this->getcurrency();

			$masters = DB::table('masters')
				->select('id', 'name_'.$lang.' as name')
				->orderBy('name')
				->get();

			$technique = DB::table('techniques')
				->select('id', 'name_'.$lang.' as name' )
				->orderBy('ord')
				->get();

			$master = Master::where('href', $href)->select('id','name_'.$lang.' as name','metatitle_'.$lang.' as metatitle',
				'keywords_'.$lang.' as keywords','description_'.$lang.' as description')->first();

			$products = Product::where('products.master_id', $master->id)
				->where('products.amount', '>', 0)
				->where('products.active', '=', 1)
				->select(
					'products.id','img', 'products.href', 'products.name_en', 'master_id',
					'products.price_'.$currency.' as price',
					'products.name_'.$lang.' as name')
				->groupBy('products.id')
				->orderBy('products.id', 'desc')
				->get();

	        $max = Product::max('price_'.$currency);
	        $min = Product::min('price_'.$currency);

			return view('pages.category')
				->with('technique',$technique)			
				->with('masters',$masters)
				->with('products',$products)
				->with('cat_id', false)
				->with('mas_id', $master->id)
				->with('max',$max)
				->with('min',$min)
				->with('category', false)
				->with('master',$master);
		}

		abort(404);
	}

	public function how_buy()
	{
		$lang = $this->getLang();

		$seo = Setting::where('id', 7)
			->select('metatitle_'.$lang.' as metatitle', 'keywords_'.$lang.' as keywords','description_'.$lang.' as description')
			->first();

		if(view()->exists('pages.how_buy')) {
			return view('pages.how_buy')
				->with('seo',$seo);
		}
		abort(404);
	}

	public function links()
	{
		if(view()->exists('pages.links')) {
			return view('pages.links');
		}
		abort(404);
	}

	public function master($href = false)
	{
			if($href) {
				$lang = $this->getLang();//Config::get('app.locale');
				$currency = $this->getcurrency();
				$master = DB::table('masters')
					->where('href', $href)
					->select('id','img',
						'name_'.$lang.' as name' ,
						'profession_'.$lang.' as profession' ,
						'text_'.$lang.' as text',
						'metatitle_'.$lang.' as metatitle',
						'keywords_'.$lang.' as keywords',
						'description_'.$lang.' as description'
						)
					->first();

				$products = DB::table('products')
					->where('master_id', $master->id)
					->where('amount', '>', 0)
					->where('active', '=', 1)
					->select('id','img', 'href',
						'name_'.$lang.' as name' ,
						'price_'.$currency.' as price'
						)
					->orderBy('id', 'desc')
					->get(3);

				if(count($master))
					return view('pages.master')->with('master',$master)->with('products',$products);
				else 
					abort(404);
			} 
		abort(404);
	}

	public function masters()
	{
		if(view()->exists('pages.masters')) {
			$lang = $lang = $this->getLang();//Config::get('app.locale');
			$masters = Master::select('id','img', 'name_ru', 'href',
					'name_'.$lang.' as name' ,
					'profession_'.$lang.' as profession' ,
					'text_'.$lang.' as text',
					'metatitle_'.$lang.' as metatitle',
					'keywords_'.$lang.' as keywords',
					'description_'.$lang.' as description'
					)
				->orderBy('id', 'asc')
				->simplePaginate(10);

	        $seo = Setting::where('id', 3)
				->select('metatitle_'.$lang.' as metatitle', 'keywords_'.$lang.' as keywords','description_'.$lang.' as description')
				->first();

			return view('pages.masters')->with('masters',$masters)->with('seo',$seo);
		}
		abort(404);
	}

	public function feedback(Request $request) {
		$feedback = ($request->only('name','email', 'phone','question'));

		$rules = [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255',
			'phone' => 'required',
			'question' => 'required',
		];

		$validation = Validator::make($feedback, $rules);
		$errors = $validation->errors();
		$errors = json_decode($errors);
		if ($validation->passes()) {
			DB::table('feedback')->insert([
				'name' => $feedback['name'], 
				'email' => $feedback['email'],
				'phone' => $feedback['phone'],
				'question' => $feedback['question'],
			]);

			Mail::send('mails.feedback',
	            array(
	                'name' => $feedback['name'],
	                'phone' => $feedback['phone'],
	                'email' => $feedback['email'],
	                'text' => $feedback['question'],
	            ), function($message) use ($feedback)
	        {
	            $message->to(env('YOUR_EMAIL'))->subject('РосАрт | Новое обращение! | ' . $feedback['email']);
	        });

			return view('pages.feedbacksuccess');
		} else {
			return response()->json($errors,422);
		}
	}

	public function dashboard(Request $request)
	{
		if(view()->exists('pages.dashboard'))
		{
			if(!Auth::user()){
				return redirect(url('/'));
			}

			$lang = $this->getLang();//Config::get('app.locale');
			$currency = $this->getcurrency();
			if($request->ajax()) {
				$pwd = ($request->only('action','password','name','phone','email'));
				if ($pwd['action']=='change_passwd') {
					$rules = [
					'password' => 'required|min:6',
					];
					$validation = Validator::make($pwd, $rules);
					$errors = $validation->errors();
					$errors = json_decode($errors);
					if ($validation->passes()) {
						$pwd['password'] = Hash::make($pwd['password']);

						DB::table('users')->where('users.id', '=', Auth::user()->id )
							->update([
								'users.password'=>$pwd['password']
							]);
						
						return view('pages.change_success');
					} else {
						return response()->json($errors,422);
					}
				} elseif ($pwd['action']=='change_all') {
					$rules = [
						'name' => 'required|max:255',
						'email' => 'required|email|max:255',
						'phone' => 'required'
					];
					$validation = Validator::make($pwd, $rules);
					$errors = $validation->errors();
					$errors = json_decode($errors);
					if ($validation->passes()) {
						DB::table('users')->where('users.id', '=', Auth::user()->id )
							->update([
								'users.name'=>$pwd['name'],
								'users.email'=>$pwd['email'],
								'users.phone'=>$pwd['phone'],
							]);
						return view('pages.change_success');
					} else {
						return response()->json($errors,422);
					}
				}
			} else {
				$user = DB::table('users')
					->select('users.id','users.name','users.phone','users.email','users.address', 'auth_via')
					->where('users.id', '=', Auth::user()->id )
					->first();

				$cart = OrderProduct::where('orders.user_id', '=', Auth::user()->id )
					->join('orders', 'order_products.order_id', '=', 'orders.id')
					->join('users','users.id','=','orders.user_id')
					->join('order_statuses', 'order_statuses.id', '=','orders.status_id' )
					->join('products', 'products.id', '=','order_products.product_id' )
					->select('products.href','products.img', 'products.name_'.$lang.' as name', 'order_products.price_'.$currency.' as price', 'orders.created_at', 'order_statuses.name_'.$lang.' as status_name')
					->get();	
			
				return view('pages.dashboard')
					->with('user',$user)
					->with('cart',$cart);
			}
		}
		abort(404);
	}

	public function subscribe(Request $request)
    {
        $exist = Email::where('email', $request->input('email'))->get();
        if(!isset($exist[0]))
        {
            $m = new Email;
            $m->email = $request->input('email');
            $m->hash = str_replace('/', '', Hash::make($request->input('email')));
            $m->lang = $this->getLang();
            $m->save();
            return response('1');
        }
        return response('');
    }

    public function unsubscribe($email)
    {
        $exist = Email::where('hash', $email)->first();
        if($exist) {
            $exist->delete();
            return redirect(url('/#unsubscribe'));
        }
        else {
            return redirect(url('/'));
        }
    }

	public static function getHref($str)
	{
		$translit = array(
        "А"=>"a","Б"=>"b","В"=>"v","Г"=>"g","Д"=>"d","Е"=>"e","Ё"=>"e","Ж"=>"zh","З"=>"z","И"=>"i","Й"=>"y","К"=>"k","Л"=>"l","М"=>"m","Н"=>"n","О"=>"o","П"=>"p","Р"=>"r","С"=>"s","Т"=>"t","У"=>"u","Ф"=>"f","Х"=>"h","Ц"=>"ts","Ч"=>"ch","Ш"=>"sh","Щ"=>"shch","Ъ"=>"","Ы"=>"y","Ь"=>"","Э"=>"e","Ю"=>"yu","Я"=>"ya",
        "а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d","е"=>"e","ё"=>"e","ж"=>"zh","з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l","м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r","с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h","ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"shch","ъ"=>"","ы"=>"y","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
        "A"=>"a","B"=>"b","C"=>"c","D"=>"d","E"=>"e","F"=>"f","G"=>"g","H"=>"h","I"=>"i","J"=>"j","K"=>"k","L"=>"l","M"=>"m","N"=>"n","O"=>"o","P"=>"p","Q"=>"q","R"=>"r","S"=>"s","T"=>"t","U"=>"u","V"=>"v","W"=>"w","X"=>"x","Y"=>"y","Z"=>"z"
        );
        $str = strtr($str, $translit);
	    $str = preg_replace("/[^a-zA-Z0-9_]/i","-",$str);
        $str = preg_replace("/\-+/i","-",$str);
        $str = preg_replace("/(^\-)|(\-$)/i","",$str);

        return $str;
    }

}
