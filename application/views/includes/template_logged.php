<?php
// Setting page title
$this->load->view('includes/header',$page_title);

/* ------------------------------------------------------------------------------------------------------------------------
 * Loading the partials
 */
// Loading the user sidebar
$user_sidebar = $this->load->view('includes/_sidebar-info','',true);
$data['user_sidebar'] = $user_sidebar;

// Loading the badges sidebar
$badges_sidebar = $this->load->view('includes/_sidebar-badges','',true);
$data['badges_sidebar'] = $badges_sidebar;

// Loading the progress bar
$progress_bar = $this->load->view('includes/_progress-bar','',true);
$data['user_progress'] = $progress_bar;

/* ------------------------------------------------------------------------------------------------------------------------
 * Loading the complete view with all partials
 */
$this->load->view($main_content, $data);

// $this->load->view('includes/footer');