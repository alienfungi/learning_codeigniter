<?php
class News extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('news_model');
  }

  public function create() {
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->library('session');

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('text', 'Text', 'required');

    if($this->form_validation->run() === FALSE) {
      $data['title'] = 'Create a news item';
      $this->load->view('templates/header', $data);
      $this->load->view('news/create');
      $this->load->view('templates/footer');
    } else {
      $this->news_model->set_news();
      $this->session->set_flashdata('success', 'News item created');
      redirect('news');
    }
  }

  public function index() {
    $data['news'] = $this->news_model->get_news();
    $data['title'] = 'News archive';

    $this->load->helper('url');
    $this->load->library('session');
    $this->load->view('templates/header', $data);
    $this->load->view('news/index', $data);
    $this->load->view('templates/footer');
  }

  public function view($slug) {
    $data['news_item'] = $this->news_model->get_news($slug);

    if(empty($data['news_item'])) {
      show_404();
    }

    $data['title'] = $data['news_item']['title'];

    $this->load->view('templates/header', $data);
    $this->load->view('news/view', $data);
    $this->load->view('templates/footer');
  }
}
