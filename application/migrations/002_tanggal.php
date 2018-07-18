<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_tanggal extends CI_migration
{
	public function up()
	{
		if(!$this->db->table_exists('tanggal'))
		{
			$this->dbforge->add_field(
				array(
					'id' => array(
						'type' => 'INT',
						'constraint' => 4,
						'null' => false,
						'auto_increment' => true),
					'tgl_lahir' => array(
						'type' => 'VARCHAR',
						'constraint' => 10,
						'null' => false),
					'umur' => array(
						'type' => 'INT',
						'constraint' => 3,
						'null' => false)
				)
			);
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->create_table('tanggal');
		}
	}

	public function down()
	{
		$this->dbforge->drop_table('tanggal');
	}
}
?>