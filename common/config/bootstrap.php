<?php

declare(strict_types=1);

$root = dirname(dirname(__DIR__));
Yii::setAlias('@common', $root . '/common');
Yii::setAlias('@frontend', $root . '/frontend');
Yii::setAlias('@backend', $root . '/backend');
Yii::setAlias('@console', $root . '/console');

$dotenv = Dotenv\Dotenv::createUnsafeImmutable($root);
$dotenv->safeLoad();
