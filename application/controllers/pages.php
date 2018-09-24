<?php  

class Pages extends CI_Controller{
  public function view($page = 'home'){
    // check if path exists
    if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
      show_404();
    }

    // store page name in title with first caps first letter
    $data['title'] = ucfirst($page);

    // load view
    $this->load->view('templates/header');
    $this->load->view('pages/'.$page, $data);
    $this->load->view('templates/footer');

  }
}

?>
