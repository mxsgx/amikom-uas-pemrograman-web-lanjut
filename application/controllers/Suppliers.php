<?php
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator;

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property-read Supplier_model $supplier_model
 * @property-read Transaction_model $transaction_model
 */
class Suppliers extends APP_Controller {
    public function __construct()
    {
        parent::__construct();

        if ( ! $this->_shared_data['auth']['logged_in'])
        {
            redirect('auth/login');
        }

        $this->load->model(array('supplier_model', 'transaction_model'));

        $this->_shared_data['active_page'] = 'suppliers';
    }

    public function index()
    {
        $search = $this->input->get('search');
        $data   = $this->supplier_model->find_suppliers( ! is_null($search) ? $search : '');

        $this->load->view('suppliers/index', array(
            'page' => array(
                'title' => 'Suppliers - Inventory Management System',
            ),
            'data' => $data,
        ) + $this->_shared_data);
    }

    public function view($id = NULL)
    {
        if (is_null($id))
        {
            return show_404();
        }

        $supplier = $this->supplier_model->find_supplier_by_id($id);

        if (is_null($supplier))
        {
            return show_404();
        }

        $this->load->view('suppliers/view', array(
            'page' => array(
                'title' => $supplier['name'].' - Suppliers - Inventory Management System',
            ),
            'data' => array(
                'supplier'     => $supplier,
                'transactions' => $this->transaction_model->find_transactions_by_supplier_id($supplier['id']),
            ),
        ) + $this->_shared_data);
    }

    private function _create_supplier()
    {
        $this->session->set_flashdata('old', $_POST);

        try
        {
            Validator::key('name', Validator::notEmpty()->length(1, 50))
                ->key('contact', Validator::notEmpty()->phone())
                ->key('address', Validator::notEmpty()->length(1, 255))
                ->assert($_POST);

            $supplier = $this->supplier_model->create_supplier(array(
                'name'    => $this->input->post('name'),
                'contact' => $this->input->post('contact'),
                'address' => $this->input->post('address'),
            ));

            $this->session->set_flashdata('notifications', array(
                array(
                    'type'    => 'success',
                    'message' => "Supplier \"{$supplier['name']}\" added successfully!",
                ),
            ));

            if (isset($_POST['new']))
            {
                $this->session->set_flashdata('old', array());

                return redirect('suppliers/add');
            }

            redirect('suppliers/edit/'.$supplier['id']);
        }
        catch (NestedValidationException $exception)
        {
            $this->session->set_flashdata('errors', $exception->getMessages());

            redirect('suppliers/add');
        }
    }

    public function add()
    {
        $this->authorize_user(array('ADMIN'));

        if ( ! in_array($this->input->method(), array('get', 'post')))
        {
            return show_404();
        }

        if ($this->input->method() === 'post')
        {
            return $this->_create_supplier();
        }

        $this->load->view('suppliers/add', array(
            'page' => array(
                'title' => 'Add Supplier - Inventory Management System',
            ),
        ) + $this->_shared_data);
    }

    public function _update_supplier($supplier)
    {
        try
        {
            Validator::key('name', Validator::notEmpty()->length(1, 50))
                ->key('contact', Validator::notEmpty()->phone())
                ->key('address', Validator::notEmpty()->length(1, 255))
                ->assert($_POST);

            $supplier = $this->supplier_model->update_supplier($supplier['id'], array(
                'name'    => $this->input->post('name'),
                'contact' => $this->input->post('contact'),
                'address' => $this->input->post('address'),
            ));

            $this->session->set_flashdata('notifications', array(
                array(
                    'type'    => 'success',
                    'message' => "Supplier \"{$supplier['name']}\" updated successfully!",
                ),
            ));
        }
        catch (NestedValidationException $exception)
        {
            $this->session->set_flashdata('errors', $exception->getMessages());
        }

        redirect('suppliers/edit/'.$supplier['id']);
    }

    public function edit($id = NULL)
    {
        $this->authorize_user(array('ADMIN'));

        if (is_null($id))
        {
            return show_404();
        }

        if ( ! in_array($this->input->method(), array('get', 'post')))
        {
            return show_404();
        }

        $supplier = $this->supplier_model->find_supplier_by_id($id);

        if ( ! $supplier)
        {
            return show_404();
        }

        if ($this->input->method() === 'post')
        {
            return $this->_update_supplier($supplier);
        }

        $this->load->view('suppliers/edit', array(
            'page' => array(
                'title' => "Edit \"{$supplier['name']}\" Supplier - Inventory Management System",
            ),
            'data' => $supplier,
        ) + $this->_shared_data);
    }

    public function delete($id)
    {
        $this->authorize_user(array('ADMIN'));

        $supplier = $this->supplier_model->find_supplier_by_id($id);

        if ( ! $supplier)
        {
            return show_404();
        }

        $this->supplier_model->delete_supplier($id);

        $this->session->set_flashdata('notifications', array(
            array(
                'type'    => 'success',
                'message' => "Supplier \"{$supplier['name']}\" deleted successfully!",
            ),
        ));

        redirect('suppliers');
    }
}
