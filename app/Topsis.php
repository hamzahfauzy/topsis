<?php
namespace app;
use vendor\zframework\Model;

class Topsis extends Model
{
	static $table = "product_topsis";
	static $fields = ["id","product_id","kriteria_id","nilai"];

	function product()
	{
		return $this->hasOne(Product::class,['id'=>'product_id']);
	}

	function kriteria()
	{
		return $this->hasOne(Kriteria::class,['id'=>'kriteria_id']);
	}
}
