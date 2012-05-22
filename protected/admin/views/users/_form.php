<?php
//Necesitamos textarea y datapicker (ui jquery)
$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery');
$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/ui-lightness/jquery-ui-1.7.2.custom.css', '');
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-ui-1.7.2.custom.min.js', CClientScript::POS_HEAD);

$user=User::model()->find('idUser=?', array(Yii::app()->user->getId()));


?>
<div id="infoContentWrapper" class="form clearfix">

<?php echo CHtml::beginForm(); ?>

    <div id="side-infoContent">
        <div class="portlet">
            <div class="top verde">Acciones</div>
            <div class="flecha_verde"></div>
            <div class="content">
		<div class="row">
		<?php if ($user->checkRole(User::ADMIN)): ?>
			<input type="checkbox" <?php if($model->checkRole(User::GESTOR)) echo "checked"; ?> id="gestor" name="rol[]" value="2" /> <label style="display:inline;" for="gestor">Usuario Gestor del portal</label>	
			<br>
		<?php endif; ?>
			<input type="checkbox" <?php if($model->checkRole(User::USUARIO_WEB)) echo "checked"; ?> id="registrado" name="rol[]" value="4" /> <label style="display:inline;" for="registrado">Usuario registrado</label>	
			<br>
			<input type="checkbox" <?php if($model->checkRole(User::USUARIO_NEWS)) echo "checked"; ?> id="newsletter" name="rol[]" value="8"/> <label style="display:inline;" for="newsletter">Acepta Newsletter</label>	
		</div>

      		<div class="row buttons">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'button')); ?>
                        <?php echo CHtml::linkButton('Delete',array('submit'=>array('delete','id'=>$model->idUser),'confirm'=>'¿Estás seguro de eliminar el usuario?','class'=>'buttonDelete')); ?>
                </div>

                <p class="note">Fields with <span class="required">*</span> are required.</p>

            </div><!-- End content -->
        </div><!-- End portlet -->
        
        
<?php if ($user->checkRole(User::ADMIN)): ?>
 <script>
$("#gestor").click(
	function(){
		if($("#gestor").is(':checked'))
			$('#bloque_permisos').show();
		else
			$('#bloque_permisos').hide();
		
	}
);
</script> 
       
	<div class="portlet" id="bloque_permisos" style="display:<?php if($model->checkRole(User::GESTOR)): echo "block"; else: echo "none"; endif; ?>">
			<div class="top verde">Permisos de edici&oacute;n</div>
			<div class="flecha_verde"></div>
			<div class="content clearfix">
			
			<span class="fixed_width_item">
				<input name="permisos[]" value="1" id="noticias" type="checkbox" <?php if($model->checkPerms(User::PERM_NOTICIAS)): echo "checked"; endif; ?> > <label style="display:inline" for="noticias">Noticias</label>
			</span>
			<span class="fixed_width_item">
				<input name="permisos[]" value="2" id="categorias" type="checkbox" <?php if($model->checkPerms(User::PERM_CATEGORIAS)): echo "checked"; endif; ?> > <label style="display:inline" for="categorias">Categorias</label>
			</span>
			<span class="fixed_width_item">
				<input name="permisos[]" value="4" id="paginas" type="checkbox" <?php if($model->checkPerms(User::PERM_PAGINAS)): echo "checked"; endif; ?>> <label style="display:inline" for="paginas">P&aacute;ginas</label>
			</span>
			<span class="fixed_width_item">
				<input name="permisos[]" value="8" id="menu" type="checkbox" <?php if($model->checkPerms(User::PERM_MENU)): echo "checked"; endif; ?>> <label style="display:inline" for="menu">Men&uacute;</label>
			</span>
			<span class="fixed_width_item">
				<input name="permisos[]" value="16" id="agenda" type="checkbox" <?php if($model->checkPerms(User::PERM_AGENDA)): echo "checked"; endif; ?> > <label style="display:inline" for="agenda">Agenda</label>
			</span>
			<span class="fixed_width_item">
				<input name="permisos[]" value="2048" id="banners" type="checkbox" <?php if($model->checkPerms(User::PERM_BANNERS)): echo "checked"; endif; ?> > <label style="display:inline" for="banners">Banners</label>
			</span>
			<span class="fixed_width_item">
				<input name="permisos[]" value="32" id="imagenes" type="checkbox" <?php if($model->checkPerms(User::PERM_IMAGENES)): echo "checked"; endif; ?> > <label style="display:inline" for="imagenes">Im&aacute;genes</label>
			</span>
			<span class="fixed_width_item">
				<input name="permisos[]" value="64" id="documentos" type="checkbox" <?php if($model->checkPerms(User::PERM_DOCUMENTOS)): echo "checked"; endif; ?> > <label style="display:inline" for="documentos">Documentos</label>
			</span>
			<span class="fixed_width_item">
				<input name="permisos[]" value="128" id="usuarios" type="checkbox" <?php if($model->checkPerms(User::PERM_USUARIOS)): echo "checked"; endif; ?> > <label style="display:inline" for="usuarios">Usuarios</label>
			</span>
			<span class="fixed_width_item">
				<input name="permisos[]" value="256" id="preferencias" type="checkbox" <?php if($model->checkPerms(User::PERM_PREFERENCIAS)): echo "checked"; endif; ?> > <label style="display:inline" for="preferencias">Preferencias</label>
			</span>
		       	<span class="fixed_width_item">
				<input name="permisos[]" value="512" id="newsletter" type="checkbox" <?php if($model->checkPerms(User::PERM_NEWSLETTER)): echo "checked"; endif; ?> > <label style="display:inline" for="newsletter">Newsletter</label>
			</span>
			<span class="fixed_width_item">
				<input name="permisos[]" value="1024" id="plugins" type="checkbox" <?php if($model->checkPerms(User::PERM_PLUGINS)): echo "checked"; endif; ?> > <label style="display:inline" for="plugins">Pugins</label>
			</span>
           
                   </div><!-- end content portlet -->
              
        </div><!-- end portlet -->

 
<?php endif; ?>

    </div>


   <div id="infoContent">
		   <?php echo CHtml::errorSummary($model); ?>
		<div class="portlet">
			<div class="top verde">Datos de conexi&oacute;n</div>
			<div class="flecha_verde"></div>
			<div class="content">
		<?php
		echo CHtml::activeHiddenField($model,"idUser");
                echo CHtml::activeLabelEx($model,"user");
                echo CHtml::activeTextField($model,"user",array('class'=>'titular','maxlength'=>255));
		echo "<br><br>";
                echo CHtml::activeLabelEx($model,"password");
                echo CHtml::activePasswordField($model,"password",array('class'=>'titular'));
		
		?>                    
                   </div>
              
           </div>
		
	<div class="portlet">
			<div class="top verde">Datos personales</div>
			<div class="flecha_verde"></div>
			<div class="content">
		<?php
                echo CHtml::activeLabelEx($model,"name");
                echo CHtml::activeTextField($model,"name",array('class'=>'basic','maxlength'=>255));
		echo "<br><br>";
                echo CHtml::activeLabelEx($model,"surnames");
                echo CHtml::activeTextField($model,"surnames",array('class'=>'basic'));
		echo "<br><br>";
                echo CHtml::activeLabelEx($model,"email");
                echo CHtml::activeTextField($model,"email",array('class'=>'basic'));
		
		?>                    
                   </div><!-- end content portlet -->
              
        </div><!-- end portlet -->

	
     
    </div>
    
<?php echo CHtml::endForm(); ?>
</div><!-- form -->
