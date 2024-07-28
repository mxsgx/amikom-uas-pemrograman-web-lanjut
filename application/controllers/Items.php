<?php
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator;

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property-read Item_model $item_model
 * @property-read Transaction_model $transaction_model
 */
class Items extends APP_Controller {
    public function __construct()
    {
        parent::__construct();

        if ( ! $this->_shared_data['auth']['logged_in'])
        {
            redirect('auth/login');
        }

        $this->load->model(array('item_model', 'transaction_model'));

        $this->_shared_data['active_page'] = 'items';
    }

    public function index()
    {
        $search = $this->input->get('search');
        $data   = $this->item_model->find_items( ! is_null($search) ? $search : '');

        $this->load->view('items/index', array(
            'page' => array(
                'title' => 'Items - Inventory Management System',
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

        $item = $this->item_model->find_item_by_id($id);

        if (is_null($item))
        {
            return show_404();
        }

        $this->load->view('items/view', array(
            'page' => array(
                'title' => $item['name'].' - Items - Inventory Management System',
            ),
            'data' => array(
                'item'         => $item,
                'transactions' => $this->transaction_model->find_transactions_by_item_id($item['id']),
            ),
        ) + $this->_shared_data);
    }

    private function _create_item()
    {
        $this->session->set_flashdata('old', $_POST);

        try
        {
            Validator::key('name', Validator::notEmpty()->length(1, 50))
                ->key('sku', Validator::notEmpty())
                ->key('stock', Validator::notOptional()->intVal()->min(0))
                ->key('unit', Validator::notEmpty()->length(1, 30))
                ->key('buy_price', Validator::notOptional()->decimal(2)->min(0))
                ->key('sell_price', Validator::notOptional()->decimal(2)->min(0))
                ->assert($_POST);

            $sku               = $this->input->post('sku');
            $exist_item_by_sku = $this->item_model->find_item_by_sku($sku);

            if ( ! is_null($exist_item_by_sku))
            {
                $this->session->set_flashdata('errors', array(
                    'sku' => "item with sku \"{$sku}\" already used",
                ));

                return redirect('items/add');
            }

            $item = $this->item_model->create_item(array(
                'sku'         => $sku,
                'name'        => $this->input->post('name'),
                'stock'       => $this->input->post('stock'),
                'unit'        => $this->input->post('unit'),
                'buy_price'   => $this->input->post('buy_price'),
                'sell_price'  => $this->input->post('sell_price'),
                'description' => $this->input->post('description'),
            ));

            $this->session->set_flashdata('notifications', array(
                array(
                    'type'    => 'success',
                    'message' => "Item \"{$item['name']}\" added successfully!",
                ),
            ));

            if (isset($_POST['new']))
            {
                $this->session->set_flashdata('old', array());

                return redirect('items/add');
            }

            redirect('items/edit/'.$item['id']);
        }
        catch (NestedValidationException $exception)
        {
            $this->session->set_flashdata('errors', $exception->getMessages());

            redirect('items/add');
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
            return $this->_create_item();
        }

        $this->load->view('items/add', array(
            'page' => array(
                'title' => 'Add Item - Inventory Management System',
            ),
        ) + $this->_shared_data);
    }

    public function _update_item($item)
    {
        try
        {
            Validator::key('name', Validator::notEmpty()->length(1, 50))
                ->key('sku', Validator::notEmpty())
                ->key('stock', Validator::notOptional()->intVal()->min(0))
                ->key('unit', Validator::notEmpty()->length(1, 30))
                ->key('buy_price', Validator::notOptional()->decimal(2)->min(0))
                ->key('sell_price', Validator::notOptional()->decimal(2)->min(0))
                ->assert($_POST);

            $sku               = $this->input->post('sku');
            $exist_item_by_sku = $this->item_model->find_item_by_sku($sku);

            if ( ! is_null($exist_item_by_sku) && $exist_item_by_sku['id'] !== $item['id'])
            {
                $this->session->set_flashdata('errors', array(
                    'sku' => "item with sku \"{$sku}\" already used",
                ));

                return redirect('items/edit/'.$item['id']);
            }

            $item = $this->item_model->update_item($item['id'], array(
                'sku'         => $sku,
                'name'        => $this->input->post('name'),
                'stock'       => $this->input->post('stock'),
                'unit'        => $this->input->post('unit'),
                'buy_price'   => $this->input->post('buy_price'),
                'sell_price'  => $this->input->post('sell_price'),
                'description' => $this->input->post('description'),
            ));

            $this->session->set_flashdata('notifications', array(
                array(
                    'type'    => 'success',
                    'message' => "Item \"{$item['name']}\" updated successfully!",
                ),
            ));
        }
        catch (NestedValidationException $exception)
        {
            $this->session->set_flashdata('errors', $exception->getMessages());
        }

        redirect('items/edit/'.$item['id']);
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

        $item = $this->item_model->find_item_by_id($id);

        if ( ! $item)
        {
            return show_404();
        }

        if ($this->input->method() === 'post')
        {
            return $this->_update_item($item);
        }

        $this->load->view('items/edit', array(
            'page' => array(
                'title' => "Edit \"{$item['name']}\" Item - Inventory Management System",
            ),
            'data' => $item,
        ) + $this->_shared_data);
    }

    public function delete($id)
    {
        $this->authorize_user(array('ADMIN'));

        $item = $this->item_model->find_item_by_id($id);

        if ( ! $item)
        {
            return show_404();
        }

        $this->item_model->delete_item($id);

        $this->session->set_flashdata('notifications', array(
            array(
                'type'    => 'success',
                'message' => "Item \"{$item['name']}\" deleted successfully!",
            ),
        ));

        redirect('items');
    }
}
