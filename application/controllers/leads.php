<?php
class leads extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('leads_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['leads_items'] = $this->leads_model->get_view();
        $data['title'] = 'View Prospects';

        if (empty($data['leads_items']))
        {
            show_404();
        }
    
        $this->load->view('templates/header', $data);
        $this->load->view('view', $data);
        $this->load->view('templates/footer');
        
    }

    public function update($form_contact = FALSE)
    {
        if (isset($_POST["find"]))
        {
            $form_contact = $this->input->post('firstname').' '.$this->input->post('lastname');
         }
        
        if (isset($_POST["update"]))
        {
             $this->leads_model->update_prospect();
        }
        
        $data['contact'] = $this->leads_model->get_contact(urldecode($form_contact));
        $data['notes'] = $this->leads_model->get_notes(urldecode($form_contact));
        $data['title'] = 'Update / Add Notes';
    
        $this->load->view('templates/header_update', $data);
        $this->load->view('update', $data);
    }
    
    public function newprospect()
    {
        if (isset($_POST["submit"]))
        {
            $this->leads_model->add_prospect();
        }

        $data['title'] = 'New Prospect';
    
        $this->load->view('templates/header_update', $data);
        $this->load->view('newprospect', $data);
    }
    
    public function addnote($form_contact = FALSE)
    {
        if (isset($_POST["btnSubmit"]))
        {
            $this->leads_model->add_note($form_contact);
        }

        $data['contact'] = urldecode($form_contact);
        $data['timestamp'] = date("Y-m-d h:i:s",time());
        $data['notes'] = "Notes on ".urldecode($form_contact)." -- ".date("m/d/Y h:i:s",time());
        $data['title'] = 'Add Note';
    
        $this->load->view('templates/header_addnote', $data);
        $this->load->view('addnote', $data);
    }
    
}

?>