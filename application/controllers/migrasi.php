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
		if(!$this->migration->current())
		{
			show_error($this->migration->error_string());
		}
		else
		{
			echo 'Migration OK!';
		}
	}
}
?>