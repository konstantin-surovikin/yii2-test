<?php

namespace frontend\models;

use common\models\Subscription;
use yii\base\Model;

class SubscribeForm extends Model
{
    public $phone;
    public $author_id;

    public function rules()
    {
        return [
            [['phone', 'author_id'], 'required'],
            ['author_id', 'integer'],
            ['phone', 'match', 'pattern' => '/^7\d{10}$/', 'message' => 'Введите номер в формате 7XXXXXXXXXX'],
            ['phone', 'validateUniqueSubscription'],
        ];
    }

    public function validateUniqueSubscription($attribute)
    {
        $exists = Subscription::find()
            ->where(['phone' => $this->phone, 'author_id' => $this->author_id])
            ->exists();
        if ($exists) {
            $this->addError($attribute, 'Вы уже подписаны на этого автора.');
        }
    }

    public function subscribe(): bool
    {
        if (!$this->validate()) {
            return false;
        }

        $subscription = new Subscription();
        $subscription->phone = $this->phone;
        $subscription->author_id = $this->author_id;
        return $subscription->save();
    }
}
