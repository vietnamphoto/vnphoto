

<h1><?php echo UserModule::t("Login"); ?></h1>

<?php if (Yii::app()->user->hasFlash('loginMessage')): ?>

    <div class="success">
        <?php echo Yii::app()->user->getFlash('loginMessage'); ?>
    </div>

<?php endif; ?>

<p><?php echo UserModule::t("Please fill out the following form with your login credentials:"); ?></p>

<div class="form">
    <?php echo CHtml::beginForm(); ?>

    <p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

    <?php echo CHtml::errorSummary($model_l); ?>

    <div class="row">
        <?php echo CHtml::activeLabelEx($model_l, 'username'); ?>
        <?php echo CHtml::activeTextField($model_l, 'username',array('class'=>'form-control')) ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabelEx($model_l, 'password'); ?>
        <?php echo CHtml::activePasswordField($model_l, 'password', array('class'=>'form-control')) ?>
    </div>

    <div class="row">
        <p class="hint">
            <?php echo CHtml::link(UserModule::t("Register"), Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"), Yii::app()->getModule('user')->recoveryUrl); ?>
        </p>
    </div>

    <div class="row rememberMe">
        <?php echo CHtml::activeCheckBox($model_l, 'rememberMe'); ?>
        <?php echo CHtml::activeLabelEx($model_l, 'rememberMe'); ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton(UserModule::t("Login")); ?>
    </div>

    <?php echo CHtml::endForm(); ?>
</div><!-- form -->


<?php
$form = new CForm(array(
    'elements' => array(
        'username' => array(
            'type' => 'text',
            'maxlength' => 32,
        ),
        'password' => array(
            'type' => 'password',
            'maxlength' => 32,
        ),
        'rememberMe' => array(
            'type' => 'checkbox',
        )
    ),
    'buttons' => array(
        'login' => array(
            'type' => 'submit',
            'label' => 'Login',
        ),
    ),
        ), $model_l);
?>