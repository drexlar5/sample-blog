<?php
  class Post_model extends CI_Model
  {
    public function __construct()
    {
      // load database if it is not loaded in auto load
      // $this->load->database();
    }

   function get_posts($slug = FALSE, $limit = FALSE, $offset = FALSE)
    {
      // check for limit per page
      if ($limit) {
        $this->db->limit($limit, $offset);
      }       

      if ($slug === FALSE)
      {
        // order the post in descending order by post id
        $this->db->order_by('posts.id','DESC');

        // join/link the category table id to the post table category name
        $this->db->join('categories', 'categories.id = posts.category_id');

        // get the posts from the database
        $query = $this->db->get('posts');

        // return the result in array format
        return $query->result_array(); 
      }    
      
      $query = $this->db->get_where('posts', array('slug' => $slug));
      return $query->row_array(); 
    }

    function create_posts($post_image)
    {
      // wrap the title in url_title to concert it to slug
      $slug = url_title($this->input->post('title'));

      // create array $data and pass in the parameters
      $data = array(
          'title' => $this->input->post('title'),
          'slug' => $slug,
          'body' => $this->input->post('body'),
          'category_id' => $this->input->post('category_id'),
          'user_id' => $this->session->userdata('user_id'),
          'post_image' => $post_image
       );

      //  insert the data to the table in the database
       return $this->db->insert('posts', $data);
    }

    function delete_post($id){
      // match the id recieved to the on in the database
      $this->db->where('id', $id);

      // delete the post with respective id if found
      $this->db->delete('posts');
      return true;
    }

    function update_post(){
      // wrap the title in url_title to concert it to slug
      $slug = url_title($this->input->post('title'));

      // create array $data and pass in the parameters
      $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'body' => $this->input->post('body'),
        'category_id' => $this->input->post('category_id'),
      );

      // match the id recieved to the on in the database
      $this->db->where('id', $this->input->post('id'));

      // update the post with respective id if found
      $this->db->update('posts', $data);
      return true;
    }

    function get_categories(){
      // order the categories table by name in descending order
      $this->db->order_by('name');

      // get the data from the table and store in query
      $query = $this->db->get('categories');

      // return the data as an array
      return $query->result_array();
    }

    function get_posts_by_category_id($id){
      // order the categories table by pst id in descending order
      $this->db->order_by('posts.id', 'DESC');

      // join/link the category table id to the post table category name
      $this->db->join('categories', 'categories.id = posts.category_id');

      // get the data from the table and store in query
      $query = $this->db->get_where('posts', array('category_id' => $id));

      // return the data as an array
      return $query->result_array();
    }
  }

?>