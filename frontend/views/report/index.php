<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var int|null $year */
/** @var array $topAuthors */
$this->title = 'ТОП-10 авторов по книгам';
?>

<div class="report-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <!-- Форма выбора года -->
    <?php $form = ActiveForm::begin([
        'method' => 'get',
        'action' => ['report/index'],
    ]); ?>
        <div class="row">
            <div class="col-sm-3">
                <?= Html::textInput('year', $year, [
                    'class' => 'form-control',
                    'placeholder' => 'Введите год, например 2025',
                    'type' => 'number',
                    'min' => 1000,
                    'max' => date('Y'),
                ]) ?>
            </div>
            <div class="col-sm-3">
                <?= Html::submitButton('Показать', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

    <hr>

    <?php if ($year === null): ?>
        <div class="alert alert-info">Укажите год, чтобы увидеть список авторов.</div>
    <?php elseif (empty($topAuthors)): ?>
        <div class="alert alert-warning">За указанный год нет данных по авторам.</div>
    <?php else: ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ФИО автора</th>
                    <th>Количество книг</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($topAuthors as $index => $author): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= Html::encode($author['full_name']) ?></td>
                        <td><?= $author['book_count'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>