<?php
namespace app\controllers\Admin;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;
use app\Product;
use app\Kriteria;
use app\Topsis;

class ProductController extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->product = new Product;
		$this->kriteria = new Kriteria;
	}

	function index()
	{
		$products = $this->product->get();
		return $this->view->render("admin.product.index")->with('products',$products);
	}

	function create()
	{
		$error = isset($_GET['error']) ? $_GET['error'] : false;
		$kriteria = Kriteria::get();
		$data['kriteria'] = $kriteria;
		$data['error'] = $error;
		return $this->view->render('admin.product.create')->with($data);
	}

	function edit($product)
	{
		$error = isset($_GET['error']) ? $_GET['error'] : false;
		$data["error"] = $error;
		$data["product"] = $this->product->where('id',$product)->first();
		$data["kriteria"] = $this->kriteria->get();
		return $this->view->render('admin.product.edit')->with($data);
	}

	function insert(Request $request)
	{
		$product = $this->product->where('nama',$request->nama)->first();
		if(!empty($product))
		{
			$this->redirect()->url("/admin/products/create?error=exists");
			return;
		}
		$gambar = $_FILES['gambar'];
		copy($gambar['tmp_name'],"uploads/".$gambar['name']);

		$product = new product;
		$product->nama = $request->nama;
		$product->deskripsi = $request->deskripsi;
		$product->harga = $request->harga;
		$product->kategori = $request->kategori;
		$product->gambar = $gambar['name'];
		$kriteria_id = $product->save();

		$kriteria = $request->kriteria;

		foreach ($kriteria as $key => $value) {
			$topsis = new Topsis;
			$topsis->product_id = $product_id;
			$topsis->kriteria_id = $key;
			$topsis->nilai = $value;
			$topsis->save();
		}

		$this->redirect()->url('/admin/products');
		return;
	}

	function update(Request $request)
	{
		$product = Product::where("nama",$request->nama)->first();
		if(!empty($product) && $product->id != $request->id)
		{
			$this->redirect()->url("/admin/product/edit/".$request->id."?error=exists");
			return;
		}

		$product = Product::where("id",$request->id)->first();
		$product->nama = $request->nama;
		$product->deskripsi = $request->deskripsi;
		$product->kategori = $request->kategori;
		$product->harga = $request->harga;
		if($product->save())
		{
			$kriteria = $request->kriteria;

			foreach ($kriteria as $key => $value) {
				$topsis = Topsis::where('product_id',$request->id)->where('kriteria_id',$key)->first();
				if(empty($topsis))
				{
					$topsis = new Topsis;
					$topsis->product_id = $request->id;
					$topsis->kriteria_id = $key;
				}
				$topsis->nilai = $value;
				$topsis->save();
			}
			$this->redirect()->url('/admin/products');
		}
		return;
	}

	function delete($product)
	{
		Product::delete($product);
		$this->redirect()->url("/admin/products");
		return;
	}

}
