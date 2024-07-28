<?php
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator;

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property-read CI_DB_mysql_driver $db
 * @property-read Item_model $item_model
 * @property-read Supplier_model $supplier_model
 * @property-read Transaction_model $transaction_model
 */
class Transactions extends APP_Controller {
    public function __construct()
    {
        parent::__construct();

        if ( ! $this->_shared_data['auth']['logged_in'])
        {
            redirect('auth/login');
        }

        $this->load->database();
        $this->load->model(array('item_model', 'supplier_model', 'transaction_model'));

        $this->_shared_data['active_page'] = 'transactions';
    }

    public function index()
    {
        $data = $this->transaction_model->find_transactions();

        $this->load->view('transactions/index', array(
            'page' => array(
                'title' => 'Transactions - Inventory Management System',
            ),
            'data' => $data,
        ) + $this->_shared_data);
    }

    public function _create_transaction()
    {
        $this->session->set_flashdata('old', $_POST);

        try
        {
            Validator::key('supplier_id', Validator::optional(Validator::intVal()))
                ->key('item_id', Validator::notOptional()->intVal())
                ->key('type', Validator::notOptional()->in(array('in', 'out', 'IN', 'OUT')))
                ->key('date', Validator::notOptional()->date())
                ->key('quantity', Validator::notOptional()->intVal()->min(1))
                ->assert($_POST);

            $quantity         = (int) $this->input->post('quantity');
            $transaction_type = strtolower($this->input->post('type'));
            $item             = $this->item_model->find_item_by_id($this->input->post('item_id'));

            if (is_null($item))
            {
                $this->session->set_flashdata('errors', array(
                    'supplier_id' => 'selected item doesn\'t exists',
                ));
            }

            if ($transaction_type === 'out' && ($item['stock'] - $quantity) < 0)
            {
                $this->session->set_flashdata('errors', array(
                    'quantity' => 'quantity must not greater than available item stock. (available stock: '.$item['stock'].')',
                ));

                return redirect('transactions/create');
            }

            $supplier = $this->supplier_model->find_supplier_by_id($this->input->post('supplier_id'));

            if ($transaction_type === 'in' && is_null($supplier))
            {
                $this->session->set_flashdata('errors', array(
                    'supplier_id' => 'supplier is required when transaction type is "IN"',
                ));

                return redirect('transactions/create');
            }

            $price = $this->input->post('price');
            $price = is_null($price) || $price === '' ? $item[$transaction_type === 'in' ? 'buy_price' : 'sell_price'] : $price;

            $this->db->trans_begin();

            $this->transaction_model->create_transaction(array(
                'supplier_id' => $transaction_type === 'in' ? $supplier['id'] : NULL,
                'item_id'     => $item['id'],
                'type'        => $transaction_type,
                'quantity'    => $quantity,
                'price'       => $price,
                'total_price' => $price * $quantity,
                'description' => $this->input->post('description'),
                'date'        => $this->input->post('date'),
            ));

            $item_new_stock = $transaction_type === 'in' ? $item['stock'] + $quantity : $item['stock'] - $quantity;

            $this->item_model->update_item($item['id'], array(
                'stock' => $item_new_stock,
            ));

            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();

                $this->session->set_flashdata('notifications', array(
                    array(
                        'type'    => 'danger',
                        'message' => 'Error occurs when creating transactions',
                    ),
                ));

                return redirect('transactions/create');
            }

            $this->db->trans_commit();

            $this->session->set_flashdata('notifications', array(
                array(
                    'type'    => 'success',
                    'message' => 'New transaction created successfully.',
                ),
            ));

            if (isset($_POST['new']))
            {
                $this->session->set_flashdata('old', array());

                return redirect('transactions/create');
            }

            redirect('transactions');
        }
        catch (NestedValidationException $exception)
        {
            $this->session->set_flashdata('errors', $exception->getMessages());

            redirect('transactions/create');
        }
    }

    public function create()
    {
        $this->authorize_user(array('ADMIN'));

        if ( ! in_array($this->input->method(), array('get', 'post')))
        {
            return show_404();
        }

        if ($this->input->method() === 'post')
        {
            return $this->_create_transaction();
        }

        $items     = $this->item_model->find_items();
        $suppliers = $this->supplier_model->find_suppliers();

        $this->load->view('transactions/create', array(
            'page' => array(
                'title' => 'Create Transactions - Inventory Management System',
            ),
            'items'     => $items,
            'suppliers' => $suppliers,
        ) + $this->_shared_data);
    }
}
