<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

  public function __construct(){
		parent::__construct();
		$this->load->model('Blog_model');
	}
  public function Index() {

		// Template Information
		$data['layout'] = 'basic';
		$data['page'] = 'blog/blog';

    // Load Data
    $data['categories_list'] = $this->Blog_model->getBlogCategories();
    $data['posts_list'] = $this->Blog_model->getAllPosts();

		// Page Information
		$data['title'] = 'Match and Trade | Blog';
		$data['description'] = 'Consegui contactos comerciales de calidad hoy';
		$data['keywords'] = 'contactos; ventas, vendedores, bla';
		$data['author'] = 'Match Trade SRL';

		$this->load->view('layout/' . $data['layout'], $data);
	}

  public function Post($blog_post_slug)
  {
    // Get Post Information
    $data['post_info'] = $this->Blog_model->getPostBySlug($blog_post_slug);

    if ($data['post_info']->num_rows() > 0)
		{
  		// Template Information
  		$data['layout'] = 'basic';
  		$data['page'] = 'blog/post';

      // Load Data
      $blog_post_id = getPostNfoBySlug($blog_post_slug)->blog_post_id;
      $blog_post_category_id = getPostNfoBySlug($blog_post_slug)->blog_post_category_id;

      $data['post_comments'] = $this->Blog_model->getCommentAssocByPostID($blog_post_id);
      $data['comments_number'] = $this->Blog_model->countNumberOfCommentsByPost($blog_post_id);

      // Prepare Related Posts
      $posts_by_category = $this->Blog_model->getPostByCategoryExceptThis($blog_post_id, $blog_post_category_id);
      $any_post = $this->Blog_model->getAnyPostExceptThis($blog_post_id);

      if ($posts_by_category->num_rows() > 0){
        $data['related_posts'] = $posts_by_category;
      }else{
        $data['related_posts'] = $any_post;
      }

  		// Page Information
  		$data['title'] = 'Match and Trade | Blog';
  		$data['description'] = 'Consegui contactos comerciales de calidad hoy';
  		$data['keywords'] = 'contactos; ventas, vendedores, bla';
  		$data['author'] = 'Match Trade SRL';

  		$this->load->view('layout/' . $data['layout'], $data);
    }else{
      redirect('blog', 'refresh');
    }
	}

  public function Category($blog_category_slug)
  {
    // Get Category Information
    $data['category_info'] = $this->Blog_model->getCategoryBySlug($blog_category_slug);

    if ($data['category_info']->num_rows() > 0)
		{
  		// Template Information
  		$data['layout'] = 'basic';
  		$data['page'] = 'blog/filter';

      // Load Data
      $data['categories_list'] = $this->Blog_model->getBlogCategories();
      $data['titleSec'] = $data['category_info']->result()[0]->blog_category_title;
      $data['descSec'] = $data['category_info']->result()[0]->blog_category_desc;
      $blog_post_category_id = $data['category_info']->result()[0]->blog_category_id;
      $data['filtered_posts'] = $this->Blog_model->getPostByCategory($blog_post_category_id);
      $data['resultText'] = 'Aun no hay publicaciones aqui...';

  		// Page Information
  		$data['title'] = 'Match and Trade | Blog';
  		$data['description'] = 'Consegui contactos comerciales de calidad hoy';
  		$data['keywords'] = 'contactos; ventas, vendedores, bla';
  		$data['author'] = 'Match Trade SRL';

  		$this->load->view('layout/' . $data['layout'], $data);
    }else{
      redirect('blog', 'refresh');
    }
	}

  public function Search()
  {
    // Get Category Information
    $query = $_POST['query'];

		// Template Information
		$data['layout'] = 'basic';
		$data['page'] = 'blog/filter';

    // Load Data
    $data['categories_list'] = $this->Blog_model->getBlogCategories();
    $data['titleSec'] = $query;
    $data['descSec'] = 'Resultado de busqueda para "' . $query . '"';
    $data['filtered_posts'] = $this->Blog_model->getPostBySearch($query);
    $data['resultText'] = 'No hay resultados para "' . $query . '"';

		// Page Information
		$data['title'] = 'Match and Trade | Blog';
		$data['description'] = 'Consegui contactos comerciales de calidad hoy';
		$data['keywords'] = 'contactos; ventas, vendedores, bla';
		$data['author'] = 'Match Trade SRL';

		$this->load->view('layout/' . $data['layout'], $data);

	}

  public function save_comment() {
    if ($this->ion_auth->logged_in()) {

      $blog_post_comment_user_id = getMyID();
      $blog_post_comment_text = $_POST['message'];

      $blog_post_id = $_POST['post_id'];
      $blog_post_slug = $this->Blog_model->getPostByID($blog_post_id)->blog_post_slug;

      // Prepare Comment Collection
      $dataBasic = array(
         'blog_post_comment_text' => $blog_post_comment_text,
         'blog_post_comment_user_id' => $blog_post_comment_user_id
      );
      $this->db->insert('blog_post_comment', $dataBasic);

      $data['post_comments'] = $this->Blog_model->getLastCommentByUserID($blog_post_comment_user_id);

      // Prepare Assoc Collection
      $dataBasic = array(
         'blog_post_id' => $blog_post_id,
         'blog_comment_id' => $data['post_comments']->result()[0]->blog_post_comment_id
      );
      $this->db->insert('blog_post_comment_asoc', $dataBasic);

      redirect('blog/article/' . $blog_post_slug,'refresh');
    }else{
    	redirect('Home','refresh');
    }
  }

}
