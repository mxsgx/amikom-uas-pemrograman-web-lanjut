<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property-read CI_DB_mysqli_driver $db
 * @property-read CI_Migration $migration
 * @property-read User_model $user_model
 */
class Migration extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        $this->load->library('migration');
        $this->load->database();
    }

    public function migrate()
    {
        if ($this->migration->current() === FALSE)
        {
            show_error($this->migration->error_string());
        }
        else
        {
            echo 'Migration successful!';
        }
    }

    public function rollback()
    {
        if ($this->migration->version(0) === FALSE)
        {
            show_error($this->migration->error_string());
        }
        else
        {
            echo 'Rollback successful!';
        }
    }

    public function seed()
    {
        $this->load->model('user_model');

        if ($this->db->get_where('users', array('username' => 'admin'))->num_rows() === 0)
        {
            $this->user_model->create_user(array(
                'name'     => 'Admin',
                'username' => 'admin',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'role'     => 'ADMIN',
            ));
        }

        if ($this->db->get_where('users', array('username' => 'user'))->num_rows() === 0)
        {
            $this->user_model->create_user(array(
                'name'     => 'User',
                'username' => 'user',
                'password' => password_hash('user', PASSWORD_DEFAULT),
                'role'     => 'USER',
            ));
        }

        echo 'Seeding successful!';
    }
}
