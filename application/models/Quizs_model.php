<?php
class Quizs_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
	
	public function get_quiz($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->get('quiz');
			return $query->result_array();
		}
		$query = $this->db->get_where('quiz', array('pregunta' => $slug));
		return $query->row_array();
	}

	public function set_quiz()
	{
	    $this->load->helper('url');

	    $slug = url_title($this->input->post('titulo'), 'dash', TRUE);

	    $data = array(
		'titulo' => $this->input->post('titulo'),
		'pregunta' => $slug,
		'respuesta' => $this->input->post('respuesta')
	    );

	    return $this->db->insert('quiz', $data);
	}
	public function delete_quiz()
	{
		$this->load->helper('url');

		$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
			
		$this->db->where("pregunta", $slug);
		$this->db->delete('quiz');
		return $this->db->affected_rows();
	}

	public function update_quiz()
	{
		$this->load->helper('url');

		$slug = url_title($this->input->post('titulo'), 'dash', TRUE);

	    $data = array('pregunta' => $slug,
		'respuesta' => $this->input->post('respuesta')
	    );

		$this->db->where("pregunta", $slug);
		$this->db->update('quiz', $data);
		return $this->db->affected_rows();
	}

}
