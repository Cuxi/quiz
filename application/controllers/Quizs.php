<?php
class Quizs extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
        $this->load->model('quizs_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
		$data['quiz'] = $this->quizs_model->get_quiz();
		$data['title'] = 'quiz archive';

		$this->load->view('templates/header', $data);
		$this->load->view('quiz/index', $data);
		$this->load->view('templates/footer');
    }

    public function view($slug = NULL)
    {
        $data['quiz_item'] = $this->quizs_model->get_quiz($slug);

		if (empty($data['quiz_item']))
		{
		        show_404();
		}

		$data['title'] = $data['quiz_item']['titulo'];

		$this->load->view('templates/header', $data);
		$this->load->view('quiz/view', $data);
		$this->load->view('templates/footer');
    }

	public function create()
	{
	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    $data['title'] = 'Create a quiz item';

	    $this->form_validation->set_rules('titulo', 'Titulo', 'required');
	    $this->form_validation->set_rules('respuesta', 'Respuesta', 'required');

	    if ($this->form_validation->run() === FALSE)
	    {
		$this->load->view('templates/header', $data);
		$this->load->view('quiz/create');
		$this->load->view('templates/footer');

	    }
	    else
	    {
		$this->quizs_model->set_quiz();
		$this->load->view('quiz/success');
	    }
	}
	public function delete()
		{
		    $this->load->helper('form');
		    $this->load->library('form_validation');

		    $data['title'] = 'Borra un item';

		    $this->form_validation->set_rules('titulo', 'Titulo', 'required');

		    if ($this->form_validation->run() === FALSE)
		    {
				$this->load->view('templates/header', $data);
				$this->load->view('news/delete');
				$this->load->view('templates/footer');
		    }
		    else
		    {
		    	if ($this->news_model->delete_news()!==0)
		    	{
		    	$this->load->view('templates/header', $data);
				$this->load->view('news/deleteok');
				$this->load->view('templates/footer');
		    	}
		    	else
		    	{
					$this->load->view('templates/header', $data);
					$this->load->view('news/delete');
					$this->load->view('templates/footer');
		    	}
		    }
		}

		public function update()
		{
		    $this->load->helper('form');
		    $this->load->library('form_validation');

		    $data['title'] = 'Actualiza un item';

		    $this->form_validation->set_rules('titulo', 'Titulo', 'required');
		    $this->form_validation->set_rules('respuesta', 'Respuesta', 'required');

		    if ($this->form_validation->run() === FALSE)
		    {
				$this->load->view('templates/header', $data);
				$this->load->view('news/update', $data);
				$this->load->view('templates/footer');
		    }
		    else
		    {
		    	if ($this->news_model->update_news()!==0)
		    	{
			    	$this->load->view('templates/header', $data);
					$this->load->view('news/updateok');
					$this->load->view('templates/footer');
		    	}
		    	else
		    	{
					$this->load->view('templates/header', $data);
					$this->load->view('news/update', $data);
					$this->load->view('templates/footer');
		    	}
		    }
		}
}
