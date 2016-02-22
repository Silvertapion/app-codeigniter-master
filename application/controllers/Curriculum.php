<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	private $controller;


	public function __construct()
    {

        parent::__construct();

        $this->controller = strtolower(get_class()) ;

        $this->load->model("Clientes_model");

        $this->load->library('form_validation');

        $this->lang->load('form_validation_lang');

        $this->load->library('pagination');
        
	}    

 
	//Guardar informacion en la base de datos
	public function store()
	{
		

		$this->validar_post();


 		if ($this->form_validation->run('cliente') == FALSE)
        {
        	$data["controller"] = $this->controller;

        	$data["view"] = 'master/'.$this->controller.'/load_add';

			$this->load->view('dashboard/layout_index',$data);

              
        }
        else
        {
            $_post = $this->input->post();

			$_result =  $this->Clientes_model->add($_post );

			if ($_result) 

				redirect($this->controller.'/show');

			else

				exit(json_encode(array('status'=>FALSE,'message'=>'Error al registrar los datos')));	  
        }

	}

	
	public function show()
	{

		 

 
		$data["controller"] = $this->controller;

		$data['items'] = $this->Clientes_model->get();

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


		if (!$this->Clientes_model->get_by_id($id))
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


 		if ($this->form_validation->run('cliente') == FALSE)
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

			$_result =  $this->Clientes_model->update($data,$id);

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
		
		if (!$this->Clientes_model->get_by_id($id))
	 		exit(json_encode(array('status'=>FALSE,'message'=>'id no registrado')));

	 
    	$data['estado'] = 99;

		$_result =  $this->Clientes_model->delete($data,$id);
		 
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

 		if ($id){
 			if (!is_numeric($id)) 
 				 exit(json_encode(array('status'=>FALSE,'message'=>'id no valido')));
 			
 			if (!$this->Clientes_model->get_by_id($id))
			 exit(json_encode(array('status'=>FALSE,'message'=>'id no registrado')));
 		} 
 		 	
 		
 		


	}




}
