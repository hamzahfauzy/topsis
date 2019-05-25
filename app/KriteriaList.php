<?php
namespace app;
use vendor\zframework\Model;

class KriteriaList extends Model
{
	static $table = "kriteria_lists";
	static $fields = ["id","kriteria_id","list_label","list_value"];

}
