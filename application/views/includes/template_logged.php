<?php

$this->load->view('includes/header',$page_title);

// Loading the user sidebar
$user_sidebar = $this->load->view('includes/_sidebar-info','',true);
$data['user_sidebar'] = $user_sidebar;

// Loading the badges sidebar
// $badges_sidebar = $this->load->view('includes/_sidebar-badges','',true);
// $data['badges_sidebar'] = $badges_sidebar;

$this->load->view($main_content, $data);

// $this->load->view('includes/footer');