<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property-read CI_Input $input
 * @property-read CI_Session $session
 * @property-read User_model $user_model
 */
class APP_Controller extends CI_Controller {
    public $_shared_data = array();

    public function __construct()
    {
        parent::__construct();

        $auth          = $this->session->userdata('auth');
        $errors        = $this->session->flashdata('errors');
        $notifications = $this->session->flashdata('notifications');
        $old           = $this->session->flashdata('old');

        $this->_shared_data['old']           = ! is_null($old) ? $old : array();
        $this->_shared_data['errors']        = ! is_null($errors) ? $errors : array();
        $this->_shared_data['notifications'] = ! is_null($notifications) ? $notifications : array();
        $this->_shared_data['auth']          = array(
            'logged_in' => ! is_null($auth) && ! is_null($auth['user_id']),
            'user'      => ! is_null($auth) && ! is_null($auth['user_id']) ? $this->user_model->find_user_by_id($auth['user_id']) : NULL,
        );
    }

    public function authorize_user($only = array('ADMIN', 'USER'))
    {
        if ( ! $this->_shared_data['auth']['logged_in'])
        {
            return show_error('Unauthenticated', 401);
        }

        if ( ! in_array($this->_shared_data['auth']['user']['role'], $only))
        {
            return show_error('Forbidden', 403);
        }
    }
}
