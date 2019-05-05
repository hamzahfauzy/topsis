<?php
namespace app\controllers;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;
use app\User;
use app\Product;
use app\Kriteria;

class IndexController extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function doTopsis()
	{
		// TOPSIS SECTION
		// FIND ALL VALUE GROUPED BY KRITERIA
		$products = Product::get();
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
			foreach($value as $val)
			{
				$dplus_sqrt += (($val - $max[$key]) * ($val - $max[$key]));
				$dminus_sqrt += (($val - $min[$key]) * ($val - $min[$key]));
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
		$products = Product::get();
		$data["vi"] = $this->doTopsis();
		$data["products"] = $products;
		return $this->view->render('landing.index')->with($data);
	}

	function detail(Product $id)
	{
		$data["vi"] = $this->doTopsis();
		$data["product"] = $id;
		return $this->view->render('landing.detail')->with($data);
	}

	function login()
	{
		$data['error'] = isset($_GET['error']) ? $_GET['error'] : false;
		return $this->view->render('login')->with($data);
	}

	function doLogin(Request $request)
	{
		$user = User::where('username',$request->username)->where('password',$request->password)->first();
		if(!empty($user))
		{
			Session::set('id',$user->id);
			$this->redirect()->url("/admin");
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
