<?php
namespace app;
use vendor\zframework\Model;

class Transaksi extends Model
{
	static $table = "transaksi";
	static $fields = ["id","product_id","pembeli_id","bukti","status","created_at","updated_at"];

	function product()
	{
		return $this->hasOne(Product::class,['id'=>'product_id']);
	}

	function pembeli()
	{
		return $this->hasOne(User::class,['id'=>'pembeli_id']);
	}
}
