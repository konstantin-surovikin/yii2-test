<?php

namespace console\jobs;

use common\exceptions\SmsSendException;
use common\models\Book;
use common\models\Subscription;
use common\services\SmsService;
use console\exceptions\BookNotFoundException;
use yii\base\BaseObject;
use yii\queue\JobInterface;

class NotifySubscribersJob extends BaseObject implements JobInterface
{
    public int $bookId;
    public SmsService $smsService;

    /**
     * @throws BookNotFoundException
     * @throws SmsSendException
     */
    public function execute($queue): void
    {
        $book = Book::find()->with('authors')->where(['id' => $this->bookId])->one();
        if (!$book) {
            throw new BookNotFoundException($this->bookId);
        }

        foreach ($book->authors as $author) {
            $subscriptions = Subscription::find()
                ->where(['author_id' => $author->id])
                ->all();

            foreach ($subscriptions as $subscription) {
                $text = sprintf(
                    'New book %s: "%s" (%d). ISBN: %s',
                    $author->full_name,
                    $book->title,
                    $book->year,
                    $book->isbn
                );

                $this->smsService->send($subscription->phone, $text);
            }
        }
    }
}
