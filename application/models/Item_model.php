<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property-read CI_DB_mysqli_driver $db
 */
class Item_model extends CI_Model {
    public function count()
    {
        return $this->db->count_all('items');
    }

    public function find_items($search = '')
    {
        $result = $this->db->like('name', $search)->get('items');

        return $result->result_array();
    }

    public function create_item($data)
    {
        $this->db->insert('items', $data);

        return $this->find_item_by_id($this->db->insert_id());
    }

    public function find_item_by_id($id)
    {
        $result = $this->db->get_where('items', array('id' => $id), 1);

        return $result->row_array();
    }

    public function update_item($id, $data)
    {
        $this->db->update('items', $data, array('id' => $id), 1);

        return $this->find_item_by_id($id);
    }

    public function delete_item($id)
    {
        $this->db->delete('items', array('id' => $id), 1);
    }

    public function find_item_by_sku($sku)
    {
        $result = $this->db->get_where('items', array('sku' => $sku), 1);

        return $result->row_array();
    }
}
