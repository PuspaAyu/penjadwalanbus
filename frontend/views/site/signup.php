<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';

?>
<div class="site-signup">
    <br>
    <br>
    
    <div class="container">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">SIGN UP</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'email') ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <?= $form->field($model, 'userLevel')->dropDownList(['1'=> 'Kabag', '2'=> 'Keuangan', '3'=> 'Ketiga']) ?>                

                        <div class="form-group">
                            <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
