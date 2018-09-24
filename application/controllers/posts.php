<?php  

class Posts extends CI_Controller{

  public function index($offset = 0){

    // setting the config settings for pagination
    $config['base_url'] = base_url().'posts/index/';
    $config['total_rows'] = $this->db->count_all('posts');
    $config['per_page'] = 3;
    $config['uri_segment'] = 3;
    // Produces: class="myclass"
    $config['attributes'] = array('class' => 'pagination-link'); 
    
    // initializing the config
    $this->pagination->initialize($config);

    // $this->load->model('Post_model');
    // store page name in title with first caps first letter
    $data['title'] = 'Latest Posts';

    $data['posts'] = $this->Post_model->get_posts(FALSE, $config['per_page'], $offset);

    // load index view
    $this->load->view('templates/header');
    $this->load->view('posts/index', $data);
    $this->load->view('templates/footer');

  }

  public function view($slug = NULL){
    // get the slog from the database
    $data['post'] = $this->Post_model->get_posts($slug);

    // get the post id from the database
    $post_id = $data['post']['id'];
    $data['comments'] = $this->comment_model->get_comments($post_id);

    // check if the is no post
    if(empty($data['post'])){
      show_404();
    }

    $data['title'] = $data['post']['title'];

    // load view
    $this->load->view('templates/header');
    $this->load->view('posts/view', $data);
    $this->load->view('templates/footer');

  }

  public function create(){
    // check login before giving create post access
    if(!$this->session->userdata('logged_in')){
      redirect('users/login');
    }  

    $data['title'] = 'Create Post';

    $data['categories'] = $this->Post_model->get_categories();

    //  set the rules for each  field ih the form
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('body', 'Body', 'required');

    // check if the form passed validation
    if($this->form_validation->run() === FALSE){

      // load post view if the form doesnt submit
      $this->load->view('templates/header');
      $this->load->view('posts/create', $data);
      $this->load->view('templates/footer');
    }else {

      // upload image
        // set image path and attributes using conifg
      $config['upload_path'] = './assets/images/posts';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '2048';
      $config['max_width'] = '2000';
      $config['max_height'] = '2000';
    
      // load the upload library
      $this->load->library('upload', $config);

      // check if it is uploaded
      if(!$this->upload->do_upload()){
        $errors = array('error' => $this->upload->display_errors());
        $post_image = 'noimage.jpg';
      }else{
        $data = array('upload_data' => $this->upload->data());
        $post_image = $_FILES['userfile']['name'];
      }

      $this->Post_model->create_posts($post_image);

      // send message using session library
      $this->session->set_flashdata('post_created', 'Your post has been created');

      // load index view
      redirect('posts');
    }

    
  }

  // delete each posts
  public function delete($id){
    // check login before giving delete post access
    if(!$this->session->userdata('logged_in')){
      redirect('users/login');
    }

    // calls the model delete function
    $this->Post_model->delete_post($id);

     // send message using session library
     $this->session->set_flashdata('post_deleted', 'Your post has been deleted');

    // load index view
    redirect('posts');
  }

  public function edit($slug){
    // check login before giving edit post access
    if(!$this->session->userdata('logged_in')){
      redirect('users/login');
    }

    // get the slog from the database
    $data['post'] = $this->Post_model->get_posts($slug);

    // Check User
    if($this->session->userdata('logged_in') != $this->Post_model->get_posts($slug)['user_id']){
      redirect('posts');
    }

    $data['categories'] = $this->Post_model->get_categories();

    // check if the is no post
    if(empty($data['post'])){
      show_404();
    }

    $data['title'] = 'Edit Post';

    // load edit post view
    $this->load->view('templates/header');
    $this->load->view('posts/edit', $data);
    $this->load->view('templates/footer');
  }

  public function update(){
    // check login before giving update post access
    if(!$this->session->userdata('logged_in')){
      redirect('users/login');
    }

    // passing the id parameter to the models update post function
    $this->Post_model->update_post($id);

    // send message using session library
    $this->session->set_flashdata('post_updated', 'Your post has been updated');

    redirect('posts');
  }
}

?>
