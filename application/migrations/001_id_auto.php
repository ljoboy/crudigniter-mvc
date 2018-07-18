<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_id_auto extends CI_migration
{
	public function up()
	{
		if(!$this->db->table_exists('id_auto'))
		{
			$this->dbforge->add_field(
				array(
					'id' => array(
						'type' => 'VARCHAR',
						'constraint' => 7,
						'null' => false),
					'nama' => array(
						'type' => 'VARCHAR',
						'constraint' => 40,
						'null' => false)
				)
			);
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->create_table('id_auto');
		}
	}

	public function down()
	{
		$this->dbforge->drop_table('id_auto');
	}
}
?>