<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';

?>
<div class="site-login">
    <br>
    <br>
    <br>

<div class="container">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">LOGIN</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <?= $form->field($model, 'rememberMe')->checkbox() ?>

                        <div style="color:#999;margin:1em 0">
                            If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                        </div>

                        <div class="form-group">
                            <?= Html::submitButton('Masuk', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                                
                            </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
