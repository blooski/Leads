<?php
class Leads_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_view()
    {
            $this->db->where('Status <','4');
            $query = $this->db->get('prospects');
            return $query->result_array();
    }

    public function get_contact($contact)
    {

        $query = $this->db->get_where('prospects', array('Contact' => $contact));

        //print_r($query->row_array());
        return $query->row_array();
    }

    public function get_notes($contact)
    {

        $query = $this->db->get_where('notes', array('Contact' => $contact));

        //print_r($query->row_array());
        return $query->result_array();
    }

    public function update_prospect()
    {
        $id = $this->input->post('firstname').' '.$this->input->post('lastname');
        //echo 'Contact='.$id;
        $data = array(
            'Company' => $this->input->post('company'),
            'Address1' => $this->input->post('address1'),
            'Address2' => $this->input->post('address2'),
            'City' => $this->input->post('city'),
            'State' => $this->input->post('state'),
            'Zip' => $this->input->post('zip'),
            'Phone' => $this->input->post('phone'),
            'Ext' => $this->input->post('ext'),
            'Fax' => $this->input->post('fax'),
            'Cell' => $this->input->post('cell'),
            'Email' => $this->input->post('email'),
            'LastDate' => date("Y/m/d : H:i:s", time()),
            'NextDate' => date("Y/m/d : H:i:s", strtotime($this->input->post('nextdate'))),
            'Status' => $this->input->post('status')
        );
        
        $this->db->where('Contact', $id);
        return $this->db->update('prospects', $data);
    }

    public function add_prospect()
    {
        $id = $this->input->post('firstname').' '.$this->input->post('lastname');

        $data = array(
            'Contact' => $id,
            'Company' => $this->input->post('company'),
            'Address1' => $this->input->post('address1'),
            'Address2' => $this->input->post('address2'),
            'City' => $this->input->post('city'),
            'State' => $this->input->post('state'),
            'Zip' => $this->input->post('zip'),
            'Phone' => $this->input->post('phone'),
            'Ext' => $this->input->post('ext'),
            'Fax' => $this->input->post('fax'),
            'Cell' => $this->input->post('cell'),
            'Email' => $this->input->post('email'),
            'LastDate' => date("Y/m/d : H:i:s", time()),
            'NextDate' => date("Y/m/d : H:i:s", strtotime($this->input->post('nextdate'))),
            'Status' => $this->input->post('status')
        );
        
        return $this->db->insert('prospects', $data);
    }

    public function add_note($contact)
    {
        $data = array(
            'Contact' => $contact,
            'ConDate' => $this->input->post('timestamp'),
            'Note' => htmlentities($this->input->post('notes'), ENT_QUOTES)
        );
        
    //Javascript to close popup
    echo '<script type="text/javascript" language="JavaScipt">
        opener.location.reload(true);
        self.close();
        </script>';

        return $this->db->insert('notes', $data);
    }
    
}
?>