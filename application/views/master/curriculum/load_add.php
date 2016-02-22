 

<div class="panel-form">
<div class="box">
   <div class="box-header">
      
      <div class="pull-left">
        <h2 class="u-top-0">Nuevo Curriculum</h2>
      </div>
      <div class="pull-right">
          <a href="<?php echo base_url($controller.'/show') ?>" class="btn btn-info">
            <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
          </a>
      </div>
   </div>

 </div>
<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Datos Personales</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" action="<?php echo base_url($controller.'/store') ?>" method="POST">
      <div class="box-body">
        <div class="form-group">
          <label for="nombre" class="col-sm-2 control-label">Nombre</label>
          <div class="col-sm-4">
          
            <input value="<?php echo set_value('nombre'); ?>" type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
            <div class="u-error"><?php echo form_error('nombre'); ?></div>
          </div>
        </div>

        <div class="form-group">
          <label for="apellidos" class="col-sm-2 control-label">Apellidos</label>
          <div class="col-sm-4">
          
            <input value="<?php echo set_value('apellidos'); ?>" type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos">
            <div class="u-error"><?php echo form_error('apellidos'); ?></div>
          </div>
        </div>

        <div class="form-group">
          <label for="dni" class="col-sm-2 control-label">DNI</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="dni" name="dni" placeholder="DNI">
            <div class="u-error"><?php echo form_error('dni'); ?></div>
          </div>
        </div>

        <div class="form-group">
          <label for="dni" class="col-sm-2 control-label">Fecha de Nacimiento</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="fec_nac" name="fec_nac" placeholder="fec_nac">
            <div class="u-error"><?php echo form_error('fec_nac'); ?></div>
          </div>
        </div>

        <div class="form-group">
          <label for="dni" class="col-sm-2 control-label">Distrito</label>
          <div class="col-sm-4">
            <select name="dist" id="dist" class="form-control" required="required">
              <option value="Santa Anita"></option>
              <option value="SJL"></option>
              <option value="Puente Piedra"></option>
            </select>
            <div class="u-error"><?php echo form_error('dist'); ?></div>
          </div>
        </div>
        
        <div class="form-group">
          <label for="dni" class="col-sm-2 control-label">Direccion</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="dire" name="dire" placeholder="dire">
            <div class="u-error"><?php echo form_error('dire'); ?></div>
          </div>
        </div>
     
       
      </div><!-- /.box-body -->
      <div class="box-footer">
        <a href="<?php echo base_url($controller.'/show') ?>" class="btn btn-danger"><span class="glyphicon glyphicon-left" aria-hidden="true"></span> Cancelar</a>
        <button type="submit" class="btn btn-info pull-right"> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registrar</button>
      </div><!-- /.box-footer -->
    </form>
  </div>


</div>