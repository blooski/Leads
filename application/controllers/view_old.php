<?php
class View extends CI_Controller {
    function index() {
        $data['title'] = "Prospects";
        $data['heading'] = "View Prospects";
        $this->load->view('view.php', $data);
    }
}
?>