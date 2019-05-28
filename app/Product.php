<?php
namespace app;
use vendor\zframework\Model;

class Product extends Model
{
	static $table = "products";
	static $fields = ["id","nama","kategori","deskripsi","harga","gambar","penjual_id"];

	function topsis()
	{
		return $this->hasMany(Topsis::class,['product_id'=>'id']);
	}
}
