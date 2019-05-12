<?php
namespace app\controllers;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;
use app\User;
use app\Product;
use app\Kriteria;
use app\Transaksi;

class IndexController extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function doTopsis($type = false)
	{
		// TOPSIS SECTION
		// FIND ALL VALUE GROUPED BY KRITERIA
		if($type == false)
		{
			$products = Product::get();
		}
		else
		{
			$products = Product::where('kategori',$type)->get();
		}
		if(count($products) == 1)
		{
			return [$products[0]->id => 1];
		}
		$kriteria = Kriteria::get();
		$topsis_sqrt = [];
		foreach ($kriteria as $key => $value) {
			$sqrt = 0;
			foreach ($value->topsis() as $val) {
				$sqrt += ($val->nilai * $val->nilai);
			}

			$sqrt = sqrt($sqrt);
			$topsis_sqrt[$value->id] = $sqrt;
		}

		$topsis_data_structure = [];
		foreach ($products as $key => $value) {
			$topsis_data_structure[$value->id] = [];
			foreach ($value->topsis() as $val) {
				$topsis_data_structure[$value->id][$val->kriteria_id] = ($val->nilai / $topsis_sqrt[$val->kriteria_id]) * $val->kriteria()->bobot;
			}
		}

		$max = [];
		$min = [];
		foreach ($kriteria as $key => $value) {
			$max[$value->id] = max(array_column($topsis_data_structure, $value->id));
			$min[$value->id] = min(array_column($topsis_data_structure, $value->id));
		}

		$dplus = [];
		$dminus = [];
		foreach ($topsis_data_structure as $key => $value) {
			$dplus_sqrt = 0;
			$dminus_sqrt = 0;
			foreach($value as $k => $val)
			{
				$dplus_sqrt += (($val - $max[$k]) * ($val - $max[$k]));
				$dminus_sqrt += (($val - $min[$k]) * ($val - $min[$k]));
			}

			$dplus_sqrt = sqrt($dplus_sqrt);
			$dminus_sqrt = sqrt($dminus_sqrt);
			$dplus[$key] = $dplus_sqrt;
			$dminus[$key] = $dminus_sqrt;
		}
		$vi = [];
		foreach ($dminus as $key => $value) {
			$vi[$key] = $value / ($value + $dplus[$key]);
		}
		// END TOPSIS
 
		return $vi;
	}

	function index()
	{
		$type = isset($_GET['type']) ? $_GET['type'] : false;
		if($type)
		{
			$products = Product::where('kategori',$type)->get();	
		}
		else
		{
			$products = Product::get();
		}
		$data["vi"] = $this->doTopsis($type);
		$data["products"] = $products;
		return $this->view->render('landing.index')->with($data);
	}

	function detail(Product $id)
	{
		$data["vi"] = $this->doTopsis();
		$data["product"] = $id;
		return $this->view->render('landing.detail')->with($data);
	}

	function beli(Product $id)
	{
		if(!Session::get('id'))
		{
			$this->redirect()->url('/detail/'.$id->id);
			return;
		}
		if(Session::user()->level == 1)
		{
			$this->redirect()->url('/admin/transaksi');
			return;
		}
		$product = $id;
		$transaksi = new Transaksi;
		$transaksi->product_id = $product->id;
		$transaksi->pembeli_id = Session::get('id');
		// $transaksi->bukti = "";
		$transaksi->status = 1;
		$transaksi->created_at = date('Y-m-d H:i:s');
		$transaksi->updated_at = date('Y-m-d H:i:s');
		$transaksi->save();
		$this->redirect()->url('/pembeli/transaksi');
		return;
	}

	function tentang()
	{
		return $this->view->render('landing.tentang');
	}

	function register()
	{
		if(Session::get('id'))
		{
			$redirect = Session::user()->level == 1 ? 'admin' : 'pembeli';
			$this->redirect()->url("/".$redirect);
			return;
		}
		$data['error'] = isset($_GET['error']) ? $_GET['error'] : false;
		return $this->view->render('register')->with($data);
	}

	function doRegister(Request $request)
	{
		$user = User::where('username',$request->username)->first();
		if(!empty($user))
		{
			$this->redirect()->url("/register?error=invalid");
			return;
		}

		$param = (array) $request;
		$param['level'] = 2;
		$user = new User;
		$user->save($param);
		$this->redirect()->url("/login");
		return;
	}

	function login()
	{
		if(Session::get('id'))
		{
			$redirect = Session::user()->level == 1 ? 'admin' : 'pembeli';
			$this->redirect()->url("/".$redirect);
			return;
		}
		$data['error'] = isset($_GET['error']) ? $_GET['error'] : false;
		return $this->view->render('login')->with($data);
	}

	function doLogin(Request $request)
	{
		$user = User::where('username',$request->username)->where('password',$request->password)->first();
		if(!empty($user))
		{
			Session::set('id',$user->id);
			$redirect = $user->level == 1 ? 'admin' : 'pembeli';
			$this->redirect()->url("/".$redirect);
			return;
		}
		else
		{
			$this->redirect()->url("/login?error=invalid");
		}
	}

	function logout()
	{
		Session::destroy();
		$this->redirect()->url("/");
	}
}
