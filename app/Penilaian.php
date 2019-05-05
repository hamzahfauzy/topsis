<?php
namespace app;
use vendor\zframework\Model;

class Penilaian extends Model
{
	static $table = "penilaian";
	static $fields = ["id","kriteria_id","nama","nilai"];

	function kriteria()
	{
		return $this->hasOne(Kriteria::class,['id'=>'kriteria_id']);
	}
}
