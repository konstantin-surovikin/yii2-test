<?php

declare(strict_types=1);

/** @var yii\web\View $this */

use yii\helpers\Html;

?>
<div class="site-index">

    <!-- Hero banner with Yii gradient -->
    <div class="hero-banner text-white rounded-4 p-5 mb-4 position-relative overflow-hidden">
        <?= Html::img(Yii::getAlias('@web/images/yii3_full_white_for_dark.svg'), [
            'alt' => '',
            'class' => 'd-none d-lg-block position-absolute hero-logo',
        ]) ?>
        <div class="position-relative">
            <h1 class="display-5 fw-bold mb-3">Build with Yii Framework</h1>
            <p class="lead opacity-75 mb-4 hero-lead">
                A high-performance PHP framework best for developing web applications.
                Fast, secure, and professional.
            </p>
            <div class="d-flex gap-2 flex-wrap">
                <?= Html::a(
                    'Get Started',
                    'https://www.yiiframework.com/doc/guide/2.0/en/start-installation',
                    [
                        'class' => 'btn btn-light btn-lg fw-semibold px-4',
                        'rel' => 'noopener',
                        'target' => '_blank',
                    ],
                ) ?>
                <?= Html::a(
                    'API Reference',
                    'https://www.yiiframework.com/doc/api/2.0',
                    [
                        'class' => 'btn btn-outline-light btn-lg px-4',
                        'rel' => 'noopener',
                        'target' => '_blank',
                    ],
                ) ?>
            </div>
        </div>
    </div>

    <!-- Extensions grid -->
    <div class="row g-3">
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm rounded-3 extension-card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <span class="extension-icon">&#128104;&#127999;</span>
                        <h3 class="h6 fw-bold mb-0 ms-2">Author</h3>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0">
                    <?= Html::a(
                        'Learn more &raquo;',
                        'author/index',
                        [
                            'class' => 'btn btn-sm btn-outline-secondary',
                            'rel' => 'noopener',
                            'target' => '_blank',
                        ],
                    ) ?>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm rounded-3 extension-card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <span class="extension-icon">&#128218;</span>
                        <h3 class="h6 fw-bold mb-0 ms-2">Book</h3>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0">
                    <?= Html::a(
                        'Learn more &raquo;',
                        'book/index',
                        [
                            'class' => 'btn btn-sm btn-outline-secondary',
                            'rel' => 'noopener',
                            'target' => '_blank',
                        ],
                    ) ?>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm rounded-3 extension-card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <span class="extension-icon">&#128203;</span>
                        <h3 class="h6 fw-bold mb-0 ms-2">Report</h3>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0">
                    <?= Html::a(
                        'Learn more &raquo;',
                        'report/index',
                        [
                            'class' => 'btn btn-sm btn-outline-secondary',
                            'rel' => 'noopener',
                            'target' => '_blank',
                        ]
                    ) ?>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm rounded-3 extension-card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <span class="extension-icon">&#128394;</span>
                        <h3 class="h6 fw-bold mb-0 ms-2">Subscription</h3>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0">
                    <?= Html::a(
                        'Learn more &raquo;',
                        'subscription/index',
                        [
                            'class' => 'btn btn-sm btn-outline-secondary',
                            'rel' => 'noopener',
                            'target' => '_blank',
                        ]
                    ) ?>
                </div>
            </div>
        </div>

</div>
