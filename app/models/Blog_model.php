<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model
{

	// Blog Basic Modules

	public function getBlogCategories()
	{
		$result = $this->db->get('blog_category');
		return $result;
	}

	public function getAllPosts()
	{
		$this->db->join('blog_category', 'blog_category.blog_category_id = blog_post.blog_post_category_id');
		$result = $this->db->get('blog_post');
		return $result;
	}

	public function getPostBySlug($blog_post_slug)
	{
		$this->db->where('blog_post_slug', $blog_post_slug);
		$this->db->join('blog_category', 'blog_category.blog_category_id = blog_post.blog_post_category_id');
		$result = $this->db->get('blog_post');
		return $result;
	}

	public function getCommentAssocByPostID($blog_post_id)
	{
		$this->db->where('blog_post_id', $blog_post_id);
		$this->db->join('blog_post_comment', 'blog_post_comment.blog_post_comment_id = blog_post_comment_asoc.blog_comment_id');
		$this->db->join('users', 'users.id = blog_post_comment.blog_post_comment_user_id');
		$this->db->order_by('blog_post_comment.blog_post_comment_date', 'ASC');
		$result = $this->db->get('blog_post_comment_asoc');
		return $result;
	}

	public function getLastCommentByUserID($UserID)
	{
		$this->db->where('blog_post_comment_user_id', $UserID);
		$this->db->order_by('blog_post_comment_date', 'DESC');
		$this->db->limit(1);
		$result = $this->db->get('blog_post_comment');
		return $result;
	}

	public function countNumberOfCommentsByPost($blog_post_id)
	{
		$this->db->where('blog_post_id', $blog_post_id);
		$result = $this->db->get('blog_post_comment_asoc');
		return count($result->result());
	}

	public function getPostByCategoryExceptThis($blog_post_id, $blog_post_category_id)
	{
		$this->db->where('blog_post_id != ', $blog_post_id);
		$this->db->where('blog_post_category_id', $blog_post_category_id);
		$result = $this->db->get('blog_post');
		return $result;
	}

	public function getAnyPostExceptThis($blog_post_id)
	{
		$this->db->where('blog_post_id != ', $blog_post_id);
		$this->db->order_by('blog_post_id', 'random');
		$result = $this->db->get('blog_post');
		return $result;
	}

	public function getCategoryBySlug($blog_category_slug)
	{
		$this->db->where('blog_category_slug', $blog_category_slug);
		$result = $this->db->get('blog_category');
		return $result;
	}

	public function getPostByID($blog_post_id)
	{
		$this->db->where('blog_post_id', $blog_post_id);
		$result = $this->db->get('blog_post');
		return $result->result()[0];
	}

	public function getPostByCategory($blog_post_category_id)
	{
		$this->db->where('blog_post_category_id', $blog_post_category_id);
		$result = $this->db->get('blog_post');
		return $result;
	}

	public function getPostBySearch($query)
	{
		$this->db->like('blog_post_title', $query);
		$this->db->or_like('blog_post_excerpt', $query);
		$this->db->or_like('blog_post_body', $query);
		$result = $this->db->get('blog_post');
		return $result;
	}

}
