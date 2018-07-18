<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_artikel extends CI_migration
{
	public function up()
	{
		if(!$this->db->table_exists('artikel'))
		{
			$this->dbforge->add_field(
				array(
					'id' => array(
						'type' => 'INT',
						'constraint' => 4,
						'null' => false,
						'auto_increment' => true),
					'judul' => array(
						'type' => 'VARCHAR',
						'constraint' => 200,
						'null' => false),
					'tgl_post' => array(
						'type' => 'VARCHAR',
						'constraint' => 20,
						'null' => false),
					'gambar' => array(
						'type' => 'VARCHAR',
						'constraint' => 50,
						'null' => false),
					'isi' => array(
						'type' => 'TEXT',
						'null' => false),
					'tag' => array(
						'type' => 'VARCHAR',
						'constraint' => 200,
						'null' => false)
				)
			);
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->create_table('artikel');
		}
	}

	public function down()
	{
		$this->dbforge->drop_table('artikel');
	}
}
?>