<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_other extends CI_migration
{
	public function up()
	{
		if(!$this->db->table_exists('other'))
		{
			$this->dbforge->add_field(
				array(
					'id' => array(
						'type' => 'VARCHAR',
						'constraint' => 4,
						'unsigned' => true,
						'null' => false,
						'auto_increment' => true),
					'email' => array(
						'type' => 'VARCHAR',
						'constraint' => 40,
						'null' => false),
					'no_telp' => array(
						'type' => 'VARCHAR',
						'constraint' => 12,
						'null' => false)
				)
			);
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->create_table('other');
		}
	}

	public function down()
	{
		$this->dbforge->drop_table('other');
	}
}
?>