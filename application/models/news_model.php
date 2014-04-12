<?php
class News_Model extends CI_Model {
  public function __construct() {
    $this->load->database();
  }

  public function get_news($slug = FALSE) {
    if($slug === FALSE) {
      $query = $this->db->get('news');
      $results = $query->result_array();
    } else {
      $query = $this->db->get_where('news', array('slug' => $slug));
      $results = $query->row_array();
    }
    return $results;
  }
}
