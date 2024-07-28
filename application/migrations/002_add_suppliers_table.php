<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property-read CI_DB_mysqli_forge $dbforge
 */
class Migration_Add_suppliers_table extends CI_Migration {
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
            ),
            'address' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ),
            'contact' => array(
                'type'       => 'VARCHAR',
                'constraint' => '16',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('suppliers', TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('suppliers', TRUE);
    }
}
