<?php
namespace app;
use vendor\zframework\Model;

class Kriteria extends Model
{
	static $table = "kriteria";
	static $fields = ["id","nama","bobot"];

	function penilaian()
	{
		return $this->hasMany(Penilaian::class,['kriteria_id'=>'id']);
	}

	function topsis()
	{
		return $this->hasMany(Topsis::class,['kriteria_id'=>'id']);
	}

	function lists()
	{
		return $this->hasMany(KriteriaList::class, ['kriteria_id' => 'id']);
	}

	function nilaiTopsis($id)
	{
		$model = Topsis::where('product_id',$id)->where('kriteria_id',$this->id)->first();
		return $model;
	}
}
