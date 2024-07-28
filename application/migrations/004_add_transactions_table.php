<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property-read CI_DB_mysqli_driver $db
 * @property-read CI_DB_mysqli_forge $dbforge
 */
class Migration_Add_transactions_table extends CI_Migration {
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type'           => 'BIGINT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE,
            ),
            'supplier_id' => array(
                'type'     => 'BIGINT',
                'unsigned' => TRUE,
				'null' => TRUE,
            ),
            'item_id' => array(
                'type'     => 'BIGINT',
                'unsigned' => TRUE,
            ),
            'type' => array(
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ),
            'date' => array(
                'type' => 'DATE',
            ),
            'quantity' => array(
                'type'     => 'INT',
                'unsigned' => TRUE,
            ),
            'description' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
        ));
		$this->dbforge->add_field('price DECIMAL(15, 2) NOT NULL DEFAULT 0');
		$this->dbforge->add_field('total_price DECIMAL(15, 2) NOT NULL DEFAULT 0');
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('transactions', TRUE);

        $this->db->query('ALTER TABLE `transactions` ADD CONSTRAINT `transaction_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers`(`id`) ON DELETE CASCADE');
        $this->db->query('ALTER TABLE `transactions` ADD CONSTRAINT `transaction_item` FOREIGN KEY (`item_id`) REFERENCES `items`(`id`) ON DELETE CASCADE');
    }

    public function down()
    {
        $this->dbforge->drop_table('transactions', TRUE);
    }
}
