<?php
namespace app\controllers\admin;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;
use app\User;
use app\Transaksi;
use app\Product;
use app\Kriteria;

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

	function invoice(Transaksi $id)
	{
		return $this->view->render('cetak')->with('transaksi',$id);
	}

	function renderTable($cols, $rows)
	{
		$ret = "";
		$column = "";
		if($cols)
		{
			$column = "<tr>";
			foreach($cols as $col)
			{
				$column .= "<th>".$col."</th>";
			}
			$column .= "</tr>";
		}		

		foreach ($rows as $row) {
			$ret .= "<tr>";
			if(is_array($row))
				foreach($row as $val)
				{
					$ret .= "<td>".$val."</td>";
				}
			else
			{
				$ret .= "<td>".$row."</td>";
			}
			$ret .= "</tr>";
		}

		$ret = "<table cellpadding='5' border='1'>".$column.$ret."</table>";
		return $ret;
	}

	function hasil()
	{
		$result = "";
		$products = Product::get();
		$kriteria = Kriteria::get();
		$_arr_kriteria = [];
		$_arr_product = [];
		$arr_product = [];
		$_col_kriteria = [];
		$_col_product = [];
		$_col_product[] = "Product";
		foreach ($kriteria as $key => $value) {
			$_arr_kriteria[] = [$value->nama,$value->bobot];
			$_col_product[] = $value->nama;
			$_col_kriteria[] = $value->nama;
		}
		foreach ($products as $key => $value) {
			$arr_product[$value->id] = $value->nama;
			$_arr_product[$key][] = $value->nama;
			foreach ($value->topsis() as $val) {
				$_arr_product[$key][] = $val->nilai;
			}
		}
		echo "<h2>Bobot Kriteria</h2>";
		echo $this->renderTable(["Kriteria","Bobot"],$_arr_kriteria);
		echo "<h2>Alternatif / Product</h2>";
		echo $this->renderTable($_col_product,$_arr_product);
		$topsis_sqrt = [];
		$matriks_kriteria = [];
		foreach ($kriteria as $key => $value) {
			$sqrt = 0;
			foreach ($value->topsis() as $val) {
				$matriks_kriteria[$val->kriteria_id][] = $val->nilai;
			}

			foreach ($matriks_kriteria[$value->id] as $val) {
				$sqrt += ($val * $val);
			}

			$sqrt = sqrt($sqrt);
			$topsis_sqrt[$value->id] = $sqrt;
		}

		$topsis_data_structure = [];
		$topsis_normalisasi_row = [];
		foreach ($kriteria as $key => $value) {
			foreach ($value->topsis() as $val) {
				$topsis_data_structure[$val->product_id][$val->kriteria_id] = ($val->nilai / $topsis_sqrt[$val->kriteria_id]) * $value->bobot;
				$topsis_normalisasi_row[$val->product_id][0] = $val->product()->nama;
				$topsis_normalisasi_row[$val->product_id][$val->kriteria_id] = ($val->nilai / $topsis_sqrt[$val->kriteria_id]) * $value->bobot;
			}
		}

		echo "<h2>Normalisasi</h2>";
		echo $this->renderTable($_col_product,$topsis_normalisasi_row);

		$max = [];
		$min = [];
		foreach ($kriteria as $key => $value) {
			$max[$value->id] = max(array_column($topsis_data_structure, $value->id));
			$min[$value->id] = min(array_column($topsis_data_structure, $value->id));
		}

		echo "<h2>Max</h2>";
		echo $this->renderTable($_col_kriteria,[$max]);

		echo "<h2>Min</h2>";
		echo $this->renderTable($_col_kriteria,[$min]);

		$dplus = [];
		$dplus_row = [];
		$dminus = [];
		$dminus_row = [];
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
			$dplus_row[$key][0] = $arr_product[$key];
			$dplus_row[$key][1] = $dplus_sqrt;
			$dminus[$key] = $dminus_sqrt;
			$dminus_row[$key][0] = $arr_product[$key];
			$dminus_row[$key][1] = $dminus_sqrt;
		}
		echo "<h2>D+</h2>";
		echo $this->renderTable(0,$dplus_row);

		echo "<h2>D-</h2>";
		echo $this->renderTable(0,$dminus_row);
		$vi = [];
		$hasil = [];
		foreach ($dminus as $key => $value) {
			$vi[$key] = $value / ($value + $dplus[$key]);
			$hasil[$key] = [$arr_product[$key],$vi[$key]];
		}

		echo "<h2>Hasil</h2>";
		echo $this->renderTable(["Product","Nilai"],$hasil);
	}
}
