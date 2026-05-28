<?php

namespace common\exceptions;

class SmsSendException extends \RuntimeException
{
    public function __construct(string $phone, string $reason)
    {
        parent::__construct("Ошибка отправки SMS на номер {$phone}: {$reason}");
    }
}
