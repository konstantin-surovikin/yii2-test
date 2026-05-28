<?php

namespace common\behaviors;

use common\models\Book;
use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\queue\Queue;

class NotifySubscribersBehavior extends Behavior
{
    /** @var callable */
    private $jobFactory;

    public function __construct(callable $jobFactory, $config = [])
    {
        $this->jobFactory = $jobFactory;
        parent::__construct($config);
    }

    public function events(): array
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'afterInsert',
        ];
    }

    public function afterInsert($event): void
    {
        /** @var Book $book */
        $book = $this->owner;
        if (empty($book->authors)) {
            return;
        }

        /** @var Queue|null $queue */
        $queue = Yii::$app->get('queue', false);
        if (($queue ?? null) === null) {
            return;
        }

        $queue->push(call_user_func($this->jobFactory, $book->id));
    }
}
