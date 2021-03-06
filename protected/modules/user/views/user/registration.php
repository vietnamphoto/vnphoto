<h3>Registration</h3>
<?php if (Yii::app()->user->hasFlash('registration')): ?>
    <div class="success">
        <?php echo Yii::app()->user->getFlash('registration'); ?>
    </div>
<?php else: ?>

    <div class="form">
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'registration-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            //'enableAjaxValidation'=>true,
            // 'disableAjaxValidationAttributes' => array('RegistrationForm_verifyCode'),
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
        ?>

        <p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

        <?php echo $form->errorSummary(array($model, $profile)); ?>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'username'); ?>
            <?php
            echo $form->textField($model, 'username', array(
                'class' => 'form-control ',
                    )
            );
            ?>   

            <?php echo $form->error($model, 'username',array('style'=>'color:red;')); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'email'); ?>
            <?php
            echo $form->textField($model, 'email', array(
                'class' => 'form-control ',
                    )
            );
            ?> 
            <?php echo $form->error($model, 'email',array('style'=>'color:red;')); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'password'); ?>
            <?php
            echo $form->passwordField($model, 'password', array(
                'class' => 'form-control ',
                    )
            );
            ?> 
            <?php echo $form->error($model, 'password',array('style'=>'color:red;')); ?>
            <p class="hint">
                <?php // echo UserModule::t("Minimal password length 4 symbols."); ?>
            </p>
        </div>

        <div class="form-group">

            <?php echo $form->labelEx($model, 'verifyPassword'); ?>
            <?php
            echo $form->passwordField($model, 'verifyPassword', array(
                'class' => 'form-control ', 
                    )
            );
            ?> 
            <?php echo $form->error($model, 'verifyPassword',array('style'=>'color:red;')); ?>
        </div>


        <?php
        $profileFields = $profile->getFields();
        if ($profileFields) {
            foreach ($profileFields as $field) {
                ?>
                <div class="form-group">
                    <?php echo $form->labelEx($profile, $field->varname); ?>
                    <?php
                    if ($widgetEdit = $field->widgetEdit($profile)) {
                        echo $widgetEdit;
                    } elseif ($field->range) {
                        echo $form->dropDownList($profile, $field->varname, Profile::range($field->range));
                    } elseif ($field->field_type == "TEXT") {
                        echo $form->textArea($profile, $field->varname, array('rows' => 6, 'cols' => 50));
                    } else {
                        echo $form->textField($profile, $field->varname, array('class' => 'form-control'), array('size' => 20, 'maxlength' => (($field->field_size) ? $field->field_size : 255)));
                    }
                    ?>
                    <?php echo $form->error($profile, $field->varname,array('style'=>'color:red;')); ?>
                </div>	
                <?php
            }
        }
        ?>
        
        <?php /* if (UserModule::doCaptcha('registration')): ?>
          <div class="row">
          <?php echo $form->labelEx($model,'verifyCode'); ?>

          <?php $this->widget('CCaptcha'); ?>
          <?php echo $form->textField($model,'verifyCode'); ?>
          <?php echo $form->error($model,'verifyCode'); ?>

          <p class="hint"><?php echo UserModule::t("Please enter the letters as they are shown in the image above."); ?>
          <br/><?php echo UserModule::t("Letters are not case-sensitive."); ?></p>
          </div>
          <?php endif; */ ?>
         <div class="form-group">
          <p class="checkbox">
            <input type="checkbox"  id="inlineCheckbox1" value="horizontal">
             Yes, e-mail me updates and special offers from VietnamPhoto </p>
          <p class="checkbox">
            <input type="checkbox" id="inlineCheckbox2" value="vertical" required >
              I agree to Vietnamphoto's <?php echo CHtml::link('Website term',array('//site/WebsiteTerm'),array("target"=>"_blank")) ?></p>
        </div>
        
        <div class="form-group">
            <button class="btn btn-success" type="submit">Create an account</button>
        </div>

        <?php $this->endWidget(); ?>
    </div><!-- form -->
<?php endif; ?>