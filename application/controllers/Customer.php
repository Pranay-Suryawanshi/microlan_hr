<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Customer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->Model('model');
        $sessionUser = $this->session->userdata();
        if (!$sessionUser['op_user_id']) {
            redirect('/');
        }
    }


    function customer_list()
    {

        $data['customer_list'] = $this->model->getData('customer');
        foreach ($data['customer_list'] as $key => $value) {
            $state = $this->model->getSqlData("select state_name from states where state_id='" . $value['state'] . "'");

            if (!empty($state)) {

                $data['customer_list'][$key]['state'] = $state[0]['state_name'];
            } else {
                $data['customer_list'][$key]['state'] = '';
            }

            $city = $this->model->getSqlData("select city_name from cities where   city_id='" . $value['city'] . "'");

            if (!empty($city)) {

                $data['customer_list'][$key]['city'] = $city[0]['city_name'];
            } else {
                $data['customer_list'][$key]['city'] = '';
            }

        }
        $pagename = 'Customer List';
        $data['pagename'] = $pagename;
        $this->model->partialView('admin/customer/customer-list', $data, $pagename);
    }


    function statuscustomer($id, $status)
    {
        $this->model->updateData('customer', array('status' => $status), array('cust_id' => $id));

        $this->session->set_flashdata('success', '<strong>Well done!</strong> customer status updated successfully.');
        $this->session->set_flashdata('class', 'success');

        redirect('customer-list');
    }



    function editcustomer($id)
    {
        $id = base64_decode($id);
        $data['res'] = $this->model->getData('customer', array('cust_id' => $id))[0]; //group by state_name 
        $data['cust_states'] = $this->model->getSqlData("select DISTINCT state_id, state_name, state_code from states order by state_name asc");
        $data['bill_states'] = $this->model->getSqlData("select DISTINCT state_id, state_name, state_code from states order by state_name asc");
        $data['ship_states'] = $this->model->getSqlData("select DISTINCT state_id, state_name, state_code from states order by state_name asc");
        $pagename = 'Edit Customer';
        $data['pagename'] = $pagename;
        $this->model->partialView('admin/customer/edit_customer', $data, $pagename);
    }



    function add_customer()
    {
        $data['states'] = $this->model->getSqlData("select * from states group by state_name order by state_name asc");
        $pagename = 'Add Customer';
        $data['pagename'] = $pagename;
        $this->model->partialView('admin/customer/add_customer', $data, $pagename);
    }













    function save_new_customer()
    {
        $postData = $_POST;

        $uploaddir = './uploads/customer/audit_reports/';
        $uploaddir_a = './uploads/customer/agreement/';

        $postData['password'] = substr($postData['company'], 0, 2) . '@' . $this->get_random_number(7);
        $postData['state_code'] = substr($postData['vat_number'], 0, 2);

        if ($this->model->insertData('customer', $postData)) {
            $this->session->set_flashdata('success', '<strong>Well done!</strong> customer details saved successfully.');
            $this->session->set_flashdata('class', 'success');

            redirect('customer-list');
        } else {
            $this->session->set_flashdata('msg', 'Customer add failed try again.');
            $this->session->set_flashdata('class', 'danger');
            redirect('add-customer');
        }
    }
    function get_random_number($digits_needed)
    {
        $count = 0;
        $random_number = '';
        while ($count < $digits_needed) {
            $random_digit = mt_rand(0, 9);
            $random_number .= $random_digit;
            $count++;
        }
        return $random_number;
    }
    function updatecustomer($id)
    {
        $postData = $_POST;
        $postData['state_code'] = substr($postData['vat_number'], 0, 2);
        $this->model->updateData('customer', $postData, array('cust_id' => $id));
        $this->session->set_flashdata('msg', 'Customer Details Update Successfully.');
        $this->session->set_flashdata('class', 'success');
        redirect('customer-list');
    }


    function get_city()
    {
        // $res = $this->model->getData('cities', array('state_code' => $_POST['state_id']));
        // if (!empty($res)) {
        //     foreach ($res as $key => $value) {
        //         echo "<option value=" . $value['city_id'] . "  >" . $value['city_name'] . "</option>";
        //     }


        // }

        header('Content-Type: application/json'); // Tell the browser it's JSON
        $state_id = $this->input->post('state_id');

        $cities = $this->model->getData('cities', array('state_code' => $_POST['state_id']));

        // Format output properly
        $response = [];
        foreach ($cities as $city) {
            $response[] = [
                'city_id' => $city['city_id'],
                'city_name' => $city['city_name']
            ];
        }

        echo json_encode($response);
    }


}