<?php

namespace frontend\controllers;

use common\models\Author;
use yii\filters\AccessControl;
use yii\web\Controller;

class ReportController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['?', '@'], // доступен всем
                    ],
                ],
            ],
        ];
    }

    /**
     * ТОП-10 авторов по количеству книг за указанный год.
     *
     * @param int|null $year
     * @return string
     */
    public function actionIndex($year = null)
    {
        $topAuthors = [];
        $year = $year ? (int)$year : null;

        if ($year) {
            $topAuthors = Author::find()
                ->alias('a')
                ->select([
                    'a.full_name',
                    'COUNT(b.id) AS book_count',
                ])
                ->innerJoin('book_author ba', 'ba.author_id = a.id')
                ->innerJoin('book b', 'b.id = ba.book_id')
                ->where(['b.year' => $year])
                ->groupBy('a.id')
                ->orderBy(['book_count' => SORT_DESC])
                ->limit(10)
                ->asArray()
                ->all();
        }

        return $this->render('index', [
            'year' => $year,
            'topAuthors' => $topAuthors,
        ]);
    }
}
