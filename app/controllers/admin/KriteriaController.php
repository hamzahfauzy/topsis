<?php
namespace app\controllers\Admin;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;
use app\Kriteria;
use app\KriteriaList;

class KriteriaController extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->kriteria = new Kriteria;
	}

	function index()
	{
		$kriteria = $this->kriteria->get();
		return $this->view->render("admin.kriteria.index")->with('kriteria',$kriteria);
	}

	function create()
	{
		$error = isset($_GET['error']) ? $_GET['error'] : false;
		return $this->view->render('admin.kriteria.create')->with('error',$error);
	}

	function edit($kriteria)
	{
		$error = isset($_GET['error']) ? $_GET['error'] : false;
		$data["error"] = $error;
		$data["kriteria"] = $this->kriteria->where('id',$kriteria)->first();
		return $this->view->render('admin.kriteria.edit')->with($data);
	}

	function insert(Request $request)
	{
		$kriteria = $this->kriteria->where('nama',$request->nama)->first();
		if(!empty($kriteria))
		{
			$this->redirect()->url("/admin/kriteria/create?error=exists");
			return;
		}

		$kriteria = new Kriteria;
		$kriteria->nama = $request->nama;
		$kriteria->bobot = $request->bobot;
		$kriteria->save();

		$this->redirect()->url('/admin/kriteria');
		return;
	}

	function update(Request $request)
	{
		$kriteria = Kriteria::where("nama",$request->nama)->first();
		if(!empty($kriteria) && $kriteria->id != $request->id)
		{
			$this->redirect()->url("/admin/kriteria/edit/".$request->id."?error=exists");
			return;
		}

		$kriteria = Kriteria::where("id",$request->id)->first();
		$param = (array) $request;
		if($kriteria->save($param))
			$this->redirect()->url("/admin/kriteria");
		return;
	}

	function delete($kriteria)
	{
		Kriteria::delete($kriteria);
		$this->redirect()->url("/admin/kriteria");
		return;
	}

	function show($kriteria)
	{
		$kriteria = Kriteria::where('id',$kriteria)->first();
		return $this->view->render('admin.kriteria.list.index')->with([
			'kriteria' => $kriteria,
		]);
	}

	function listCreate($kriteria)
	{
		$kriteria = Kriteria::where('id',$kriteria)->first();
		$error = isset($_GET['error']) ? $_GET['error'] : false;
		return $this->view->render('admin.kriteria.list.create')->with([
			'kriteria' => $kriteria,
			'error' => $error
		]);
	}

	function listEdit($kriteria, $list)
	{
		$kriteria = Kriteria::where('id',$kriteria)->first();
		$list = KriteriaList::where('id',$list)->first();
		$error = isset($_GET['error']) ? $_GET['error'] : false;
		return $this->view->render('admin.kriteria.list.edit')->with([
			'kriteria' => $kriteria,
			'list' => $list,
			'error' => $error
		]);
	}

	function listSave(Request $request)
	{
		$list = new KriteriaList;
		$list->kriteria_id = $request->kriteria_id;
		$list->list_label = $request->list_label;
		$list->list_value = $request->list_value;
		$list->save();

		$this->redirect()->url("/admin/kriteria/list/".$request->kriteria_id);
		return;
	}

	function listUpdate(Request $request)
	{
		$list = KriteriaList::where('id',$request->id)->first();
		$kriteria_id = $list->kriteria_id;
		$list->list_label = $request->list_label;
		$list->list_value = $request->list_value;
		$list->save();

		$this->redirect()->url("/admin/kriteria/list/".$kriteria_id);
		return;
	}

	function listDelete($kriteria, $list)
	{
		KriteriaList::delete($list);
		$this->redirect()->url("/admin/kriteria/list/".$kriteria);
		return;
	}

}
