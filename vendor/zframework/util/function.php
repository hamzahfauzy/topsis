<?php


function base_url()
{
	if(!empty(path_name) || path_name != false)
		return "http://".$_SERVER['SERVER_NAME']."/".path_name."/".main_name;
	else
		return "http://".$_SERVER['HTTP_HOST'];
}