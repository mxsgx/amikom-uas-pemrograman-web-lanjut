<?php
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator;

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends APP_Controller {
    private function _handle_login()
    {
        try
        {
            Validator::key('username', Validator::notEmpty()->alnum()->length(1, 32))->key('password', Validator::notEmpty())->assert($_POST);

            $username = $this->input->post('username');
            $user     = $this->user_model->find_user_by_username($username);

            if (is_null($user))
            {
                $this->session->set_flashdata('errors', array(
                    'username' => "user with username \"$username\" doesn't exist.",
                ));

                return redirect('auth/login');
            }

            if ( ! password_verify($this->input->post('password'), $user['password']))
            {
                $this->session->set_flashdata('errors', array(
                    'username' => "username or password doesn't match",
                ));

                return redirect('auth/login');
            }

            $this->session->set_userdata('auth', array(
                'user_id' => $user['id'],
            ));

            $this->session->set_flashdata('notifications', array(
                array(
                    'type'    => 'info',
                    'message' => "Welcome back, {$user['name']}!",
                ),
            ));

            redirect();
        }
        catch (NestedValidationException $exception)
        {
            $this->session->set_flashdata('errors', $exception->getMessages());

            redirect('auth/login');
        }
    }

    public function index()
    {
        if (is_null($this->session->userdata('auth')))
        {
            return redirect('auth/login');
        }

        redirect();
    }

    public function login()
    {
        if ( ! in_array($this->input->method(), array('get', 'post')))
        {
            return show_404();
        }

        if ($this->input->method() === 'post')
        {
            return $this->_handle_login();
        }

        $this->load->view('auth/login', array(
            'page' => array(
                'title' => 'Login - Inventory Management System',
            ),
        ) + $this->_shared_data);
    }

    public function logout()
    {
        $this->session->unset_userdata('auth');

        redirect('auth/login');
    }
}
