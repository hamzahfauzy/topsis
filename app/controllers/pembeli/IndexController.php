<?php
namespace app\controllers\pembeli;
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
		$data['transaksi'] = Transaksi::where('pembeli_id',Session::get('id'))->get();
		return $this->view->render('pembeli.index')->with($data);
	}

	function upload(Request $request)
	{
		$jumlah_transfer = str_replace(".", "", $request->jumlah_transfer);
		$jumlah_transfer = str_replace(",", "", $jumlah_transfer);
		$bukti = $_FILES['bukti'];
		copy($bukti['tmp_name'],'uploads/'.$bukti['name']);
		$transaksi = Transaksi::where('id',$request->id)->first();
		$transaksi->bukti = $bukti['name'];
		$transaksi->jumlah_transfer = $jumlah_transfer;
		$transaksi->status = 2;
		$transaksi->save();
		$this->redirect()->url('/pembeli');
		return;
	}

	function invoice(Transaksi $id)
	{
		return $this->view->render('cetak')->with('transaksi',$id);
	}

}
