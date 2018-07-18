<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class unduh extends CI_Controller
{
	function load($src)
	{
		force_download('data/file/'.$src, NULL);
	}
}
?>