<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property-read CI_DB_mysqli_driver $db
 */
class User_model extends CI_Model {
    public function count()
    {
        return $this->db->count_all('users');
    }

    /**
     * Find users.
     *
     * @param string $search
     *
     * @return array
     */
    public function find_users($search = '')
    {
        $result = $this->db->like('name', $search)->get('users');

        return $result->result_array();
    }

    /**
     * Create user.
     *
     * @param array $data
     *
     * @return array|null
     */
    public function create_user($data)
    {
        $this->db->insert('users', $data);

        return $this->find_user_by_id($this->db->insert_id());
    }

    /**
     * Find user by username.
     *
     * @param string $username
     *
     * @return array|null
     */
    public function find_user_by_username($username)
    {
        $result = $this->db->get_where('users', array('username' => $username), 1);

        return $result->row_array();
    }

    /**
     * Find user by ID.
     *
     * @param int|string $id
     *
     * @return array|null
     */
    public function find_user_by_id($id)
    {
        $result = $this->db->get_where('users', array('id' => $id), 1);

        return $result->row_array();
    }

    /**
     * Update user.
     *
     * @param int|string $id
     * @param array $data
     *
     * @return array|null
     */
    public function update_user($id, $data)
    {
        $this->db->update('users', $data, array('id' => $id), 1);

        return $this->find_user_by_id($id);
    }

    /**
     * Delete user.
     *
     * @param int|string $id
     */
    public function delete_user($id)
    {
        $this->db->delete('users', array('id' => $id), 1);
    }
}
