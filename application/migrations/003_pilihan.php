<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_pilihan extends CI_migration
{
	public function up()
	{
		if(!$this->db->table_exists('pilihan'))
		{
			$this->dbforge->add_field(
				array(
					'id' => array(
						'type' => 'INT',
						'constraint' => 4,
						'null' => false,
						'auto_increment' => true),
					'jenis_kelamin' => array(
						'type' => 'ENUM("perempuan","laki-laki")',
						'null' => false),
					'hobi' => array(
						'type' => 'SET("membaca","menulis","melukis","menyanyi")',
						'null' => false)
				)
			);
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->create_table('pilihan');
		}
	}

	public function down()
	{
		$this->dbforge->drop_table('pilihan');
	}
}
?>