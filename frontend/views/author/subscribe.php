<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Подписка на автора: ' . $author->full_name;
?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="subscribe-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'phone')
        ->textInput(['placeholder' => '79087964781'])
        ->label('Номер телефона')
        ->hint('В формате 7XXXXXXXXXX (10 цифр после 7)') ?>

    <?= Html::submitButton('Подписаться', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>
</div>
