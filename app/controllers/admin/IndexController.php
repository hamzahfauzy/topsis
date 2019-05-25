<?php
namespace app\controllers\admin;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;
use app\User;
use app\Transaksi;

class IndexController extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		return $this->view->render('admin.index');
	}

	function transaksi()
	{
		$transaksi = Transaksi::get();
		return $this->view->render('admin.transaksi')->with('transaksi',$transaksi);
	}

	function terima(Transaksi $id)
	{
		$id->status = 3;
		$id->save();

		$this->redirect()->url('/admin/transaksi');
	}

	function tolak(Transaksi $id)
	{
		$id->status = 4;
		$id->save();

		$this->redirect()->url('/admin/transaksi');
	}

}
