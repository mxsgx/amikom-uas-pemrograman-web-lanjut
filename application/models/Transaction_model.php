<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property-read CI_DB_mysqli_driver $db
 */
class Transaction_model extends CI_Model {
    public function count()
    {
        return $this->db->count_all('transactions');
    }

    public function find_transactions()
    {
        $result = $this->db->select('transactions.*, suppliers.name AS supplier_name, items.name AS item_name, items.currency AS currency')
            ->from('transactions')
            ->join('suppliers', 'transactions.supplier_id = suppliers.id', 'LEFT')
            ->join('items', 'transactions.item_id = items.id', 'LEFT')
            ->order_by('transactions.id', 'DESC')
            ->get();

        return $result->result_array();
    }

    public function find_transactions_by_item_id($id)
    {
        $result = $this->db->select('transactions.*, suppliers.name AS supplier_name, items.name AS item_name, items.currency AS currency')
            ->from('transactions')
            ->join('suppliers', 'transactions.supplier_id = suppliers.id', 'LEFT')
            ->join('items', 'transactions.item_id = items.id', 'LEFT')
            ->where('transactions.item_id', $id)
            ->order_by('transactions.id', 'DESC')
            ->get();

        return $result->result_array();
    }

    public function find_transactions_by_supplier_id($id)
    {
        $result = $this->db->select('transactions.*, suppliers.name AS supplier_name, items.name AS item_name, items.currency AS currency')
            ->from('transactions')
            ->join('suppliers', 'transactions.supplier_id = suppliers.id', 'LEFT')
            ->join('items', 'transactions.item_id = items.id', 'LEFT')
            ->where('transactions.supplier_id', $id)
            ->order_by('transactions.id', 'DESC')
            ->get();

        return $result->result_array();
    }

    public function create_transaction($data)
    {
        $this->db->insert('transactions', $data);

        return $this->find_transaction_by_id($this->db->insert_id());
    }

    public function find_transaction_by_id($id)
    {
        $result = $this->db->get_where('transactions', array('id' => $id), 1);

        return $result->row_array();
    }

    public function update_transaction($id, $data)
    {
        $this->db->update('transactions', $data, array('id' => $id), 1);

        return $this->find_transaction_by_id($id);
    }

    public function delete_transaction($id)
    {
        $this->db->delete('transactions', array('id' => $id), 1);
    }
}
