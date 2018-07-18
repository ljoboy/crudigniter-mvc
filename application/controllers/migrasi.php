<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class migrasi extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('migration');
	}

	public function index()
	{
		for($v = 1; $v < 8; $v++)
		{
			if(!$this->migration->version($v))
			{
				echo 'Migration version '.$v.' ERROR!';
				show_error($this->migration->error_string());
			}
			else
			{
				echo 'Migration version '.$v.' OK!';
				echo '<br>';
			}
		}
	}
}
?>