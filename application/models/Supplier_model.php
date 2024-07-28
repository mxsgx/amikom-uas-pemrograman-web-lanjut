<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property-read CI_DB_mysqli_driver $db
 */
class Supplier_model extends CI_Model {
    public function count()
    {
        return $this->db->count_all('suppliers');
    }

    public function find_suppliers($search = '')
    {
        $result = $this->db->like('name', $search)->get('suppliers');

        return $result->result_array();
    }

    public function create_supplier($data)
    {
        $this->db->insert('suppliers', $data);

        return $this->find_supplier_by_id($this->db->insert_id());
    }

    public function find_supplier_by_id($id)
    {
        $result = $this->db->get_where('suppliers', array('id' => $id), 1);

        return $result->row_array();
    }

    public function update_supplier($id, $data)
    {
        $this->db->update('suppliers', $data, array('id' => $id), 1);

        return $this->find_supplier_by_id($id);
    }

    public function delete_supplier($id)
    {
        $this->db->delete('suppliers', array('id' => $id), 1);
    }
}
