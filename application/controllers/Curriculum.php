<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curriculum extends CI_Controller {

	private $controller;


	public function __construct()
    {

        parent::__construct();

        $this->controller = strtolower(get_class()) ;

        $this->load->model("Curriculum_model");

        $this->load->library('form_validation');

        $this->lang->load('form_validation_lang');

        $this->load->library('pagination');
        
	}    

 
	//Guardar informacion en la base de datos
	public function store()
	{
		

		$this->validar_post();


 		if ($this->form_validation->run('curriculum') == FALSE)
        {
        	$data["controller"] = $this->controller;

        	$data["view"] = 'master/'.$this->controller.'/load_add';

			$this->load->view('dashboard/layout_index',$data);

              
        }
        else
        {
            $_post = $this->input->post();

			$_result =  $this->Curriculum_model->add($_post );

			if ($_result) 

				redirect($this->controller.'/show');

			else

				exit(json_encode(array('status'=>FALSE,'message'=>'Error al registrar los datos')));	  
        }

	}

	
	public function show()
	{

		 

 
		$data["controller"] = $this->controller;

		$data['items'] = $this->Curriculum_model->get();

		$data["view"] = 'master/'.$this->controller.'/load_list';

		$this->load->view('dashboard/layout_index',$data);
		
	}
	//Crear
	public function create()
	{
		$data["controller"] = $this->controller;

		$data["view"] = 'master/'.$this->controller.'/load_add';

		$this->load->view('dashboard/layout_index',$data);

	
	}
	//Cargar el formulario de editar
	public function edit($id)
	{
		if (!is_numeric($id)) 
			 redirect($this->controller.'/show');


		if (!$this->Curriculum_model->get_by_id($id))
			 exit(json_encode(array('status'=>FALSE,'message'=>'id no registrado')));

		$data["controller"] = $this->controller;

		$data["id"] = $id;

		$data["view"] = 'master/'.$this->controller.'/load_edit';
		
		$this->load->view('dashboard/layout_index',$data);
		
	}
	//Actualizar la informacion
	public function update()
	{

 


		$id = $this->input->post('id',TRUE);
		
		$this->validar_post($id);


 		if ($this->form_validation->run('curriculum') == FALSE)
        {

        	$data["controller"] = $this->controller;

        	$data["view"] = $this->load->view('master/'.$this->controller.'/load_edit'); 

			$this->load->view('dashboard/layout_index',$data);
              
        }
        else
        {
        	
        	 

        	$data['nombre']=$this->input->post('nombre',TRUE);
        	$data['apellidos']=$this->input->post('apellidos',TRUE);
        	$data['dni']=$this->input->post('dni',TRUE);
        	$data['fecha_nac']=$this->input->post('fecha_nac',TRUE);
        	$data['distrito']=$this->input->post('distrito',TRUE);
        	$data['direccion']=$this->input->post('direccion',TRUE);

			$_result =  $this->Curriculum_model->update($data,$id);

			if ($_result) 

				redirect($this->controller.'/show');

			else

				exit(json_encode(array('status'=>FALSE,'message'=>'Error al ACTUALIZAR los datos')));	  





        }



			



	}
	//Eliminar un determinado registro
	public function destroy($id)
	{
	 
		if (!is_numeric($id)) 
			 exit(json_encode(array('status'=>FALSE,'message'=>'id no valido')));
		
		if (!$this->Curriculum_model->get_by_id($id))
	 		exit(json_encode(array('status'=>FALSE,'message'=>'id no registrado')));

	 
    	$data['estado'] = 99;

		$_result =  $this->Curriculum_model->delete($data,$id);
		 
		if ($_result) 
			redirect($this->controller.'/show');
		else
			exit(json_encode(array('status'=>FALSE,'message'=>'Error al eliminar los datos')));	  



 		 
	}
	public function registro()
	{


	}

	private function validar_post($id = FALSE)
	{
		$this->load->helper(array('form'));

 		$this->form_validation->set_rules('nombre', 'lang:nombre', 'required|max_length[150]');

 		$this->form_validation->set_rules('apellidos', 'lang:apellidos', 'required|max_length[150]');

 		$this->form_validation->set_rules('dni', 'lang:dni', 'required|min_length[8]|max_length[8]|integer');
		$this->form_validation->set_rules('fecha_nac', 'lang:fecha_nac', 'required|max_length[25]');
		$this->form_validation->set_rules('distrito', 'lang:distrito', 'required|max_length[150]');
		$this->form_validation->set_rules('direccion', 'lang:direccion', 'required|max_length[150]'); 		



 		if ($id){
 			if (!is_numeric($id)) 
 				 exit(json_encode(array('status'=>FALSE,'message'=>'id no valido')));
 			
 			if (!$this->Curriculum_model->get_by_id($id))
			 exit(json_encode(array('status'=>FALSE,'message'=>'id no registrado')));
 		} 
 		 	
 		
 		


	}




}
