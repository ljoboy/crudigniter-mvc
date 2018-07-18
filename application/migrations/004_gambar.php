<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_gambar extends CI_migration
{
	public function up()
	{
		if(!$this->db->table_exists('gambar'))
		{
			$this->dbforge->add_field(
				array(
					'id' => array(
						'type' => 'INT',
						'constraint' => 4,
						'null' => false,
						'auto_increment' => true),
					'nama' => array(
						'type' => 'VARCHAR',
						'constraint' => 40,
						'null' => false),
					'source' => array(
						'type' => 'VARCHAR',
						'constraint' => 50,
						'null' => false),
					'ukuran' => array(
						'type' => 'INT',
						'constraint' => 11,
						'null' => false),
					'tipe' => array(
						'type' => 'VARCHAR',
						'constraint' => 20,
						'null' => false)
				)
			);
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->create_table('gambar');
		}
	}

	public function down()
	{
		$this->dbforge->drop_table('gambar');
	}
}
?>