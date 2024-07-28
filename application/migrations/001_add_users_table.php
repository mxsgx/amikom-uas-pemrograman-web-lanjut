<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property-read CI_DB_mysqli_forge $dbforge
 */
class Migration_Add_users_table extends CI_Migration {
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type'           => 'BIGINT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE,
            ),
            'name' => array(
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE,
            ),
            'username' => array(
                'type'       => 'VARCHAR',
                'constraint' => '32',
                'unique'     => TRUE,
            ),
            'password' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ),
            'role' => array(
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'default'    => 'USER',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users', TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('users', TRUE);
    }
}
