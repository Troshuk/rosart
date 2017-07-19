<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use App\Product;
use App\Technic;
use App\Master;

class CatalogController extends Controller
{
    
	public function index(Request $request, Product $productModel, Category $categoryModel, Master $masterModel, Technic $technicModel, $id) 
	{
		$sort = $request->session()->get('sort');

		switch ($sort) {
			case 'new-styler':
				$products = $productModel->where('id_category', $id)->orderBy('id', 'desc')->paginate(5);
				break;
			case 'priceUp-styler':
				$products = $productModel->where('id_category', $id)->orderBy('price', 'asc')->paginate(5);
				break;
			case 'priceDown-styler':
				$products = $productModel->where('id_category', $id)->orderBy('price', 'desc')->paginate(5);
				break;
			case 'a-z-styler':
				$products = $productModel->where('id_category', $id)->orderBy('name', 'asc')->paginate(5);
				break;
			case 'z-a-styler':
				$products =$productModel->where('id_category', $id)->orderBy('name', 'desc')->paginate(5);
				break;
			
			default:
				$products = $productModel->where('id_category', $id)->paginate(5);
				break;
		}

		$categories = $categoryModel->All();
		$category = $categoryModel->find($id);
		// $images = $imageModel->All();
		$masters = $masterModel->All();
		$technics = $technicModel->All();

		return view('pages.category', array(

									'id'=> $id,
									'request'=> $request,
									'categories'=> $categories,
									'category'=> $category,
									'products'=> $products,
									'masters'=> $masters,
									'technics'=> $technics
									// 'images'=> $images

									));
	}

}
