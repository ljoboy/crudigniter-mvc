<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function batas($string, $limit)
{
	$kata = explode(" ",$string);
	return implode(" ",array_splice($kata,0,$limit));
}
?>