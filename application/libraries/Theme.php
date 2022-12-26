<?php 


class Theme {
    public function __construct()
    {
        $this->ci =& get_instance();
    }

    public function load($view = '', $data = ''){
        $this->ci->load->view('themes/head', $data);
        $this->ci->load->view($view, $data);
        $this->ci->load->view('themes/closehtml', $data);
    }
}