<?php
$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>


<div> 

<style>
  #imgensss {
    float:right;
    border-radius: 5%;
    margin: 4%; 
   
  }
</style>
<a title="Seminario" href="https://www.sintectoacademia.com/post/5-razones-en-las-que-aportas-desde-rrhh-para-disminuir-fraudes"> <img id="imgensss" src="https://sintecto.com/wp-content/uploads/2023/08/5-razonas-para-desminuir-fraudes.png" width=35% height=35% style="border:solid" alt="Seminario" /></a>

</div>


<h1>Ingreso al Sistema</h1>

<p>Por favor ingrese su usuario y palabra clave asignada:</p>

<div class="form wide" id="loginForm">
  <?php
  $form = $this->beginWidget('CActiveForm', array(
      'id' => 'login-form',
      'enableClientValidation' => false,
      'clientOptions' => array(
          'validateOnSubmit' => true,
      ),
  ));
  ?>
  <?php echo $form->errorSummary($model); ?>

  <p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

  <div class="row">
    <label for="LoginForm_username" class="required">Usuario (email) <span class="required">*</span></label>
    <input name="LoginForm[username]" id="LoginForm_username" type="text" size="40" autocomplete="off" /></div>

  <div class="row">
    <label for="LoginForm_password" class="required">Palabra Clave <span class="required">*</span></label>
    <input name="LoginForm[password]" id="LoginForm_password" type="password" size="40" autocomplete="off"/>
    <p class="hint">
      *Si tiene inconvenientes en ingresar al sistema, por favor comuniquese con soporte técnico.
    </p>
  </div>

  <?php if(CCaptcha::checkRequirements()): ?>
    <div class="row">
        <?php echo $form->labelEx($model,'verifyCode'); ?>
        <div>
          <?php $this->widget("CCaptcha",
                       array('buttonType'=> 'button',
                       'buttonOptions' => array(
                           'type'=>'image',
                           'width'=>'20px',
                           'height'=>'20px',
                           'src'=>'../../mantenimiento/images/refresh.png'
                       ))); ?>
          <?php echo $form->textField($model,'verifyCode'); ?>
        </div>
        <div class="hint">
          Por favor, introduzca el texto que ve en la imagen.
        </div>
        <?php echo $form->error($model,'verifyCode'); ?>
    </div>
	<?php endif; ?>
<?php
 // <div class="row">
  //  <label for="LoginForm_otp" class="required">Llave<span class="required">*</span></label>
  //  <input name="LoginForm[otp]" id="LoginForm_password" type="otp" size="40"/>
  //</div>
?>

  <div class="row buttons">
    <?php echo CHtml::submitButton('Ingresar al Sistema'); ?>
  </div>

  <?php $this->endWidget(); ?>
</div><!-- form -->


