<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property-read Item_model $item_model
 * @property-read Supplier_model $supplier_model
 * @property-read Transaction_model $transaction_model
 */
class Welcome extends APP_Controller {
    public function __construct()
    {
        parent::__construct();

		$this->load->model(array('item_model', 'supplier_model', 'transaction_model'));

        $this->_shared_data['active_page'] = 'dashboard';
    }

    public function index()
    {
        if (is_null($this->session->userdata('auth')))
        {
            return redirect('auth/login');
        }

        $this->load->view('welcome_message', array(
            'page' => array(
                'title' => 'Welcome - Inventory Management System',
            ),
			'data' => array(
				'users_count' => $this->user_model->count(),
				'items_count' => $this->item_model->count(),
				'suppliers_count' => $this->supplier_model->count(),
				'transactions_count' => $this->transaction_model->count(),
			),
        ) + $this->_shared_data);
    }
}
