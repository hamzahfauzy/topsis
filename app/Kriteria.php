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
}
