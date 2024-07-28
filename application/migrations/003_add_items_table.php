<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property-read CI_DB_mysqli_forge $dbforge
 */
class Migration_Add_items_table extends CI_Migration {
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type'           => 'BIGINT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE,
            ),
            'sku' => array(
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'unique'     => TRUE,
            ),
            'name' => array(
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ),
            'description' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'stock' => array(
                'type'    => 'INT',
                'default' => 0,
            ),
            'unit' => array(
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ),
            'currency' => array(
                'type'       => 'VARCHAR',
                'constraint' => '3',
                'default'    => 'IDR',
            ),
        ));
        $this->dbforge->add_field('buy_price DECIMAL(15, 2) NOT NULL DEFAULT 0');
        $this->dbforge->add_field('sell_price DECIMAL(15, 2) NOT NULL DEFAULT 0');
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('items', TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('items', TRUE);
    }
}
