<?php

namespace console\exceptions;

class BookNotFoundException extends \RuntimeException
{
    public function __construct(int $bookId)
    {
        parent::__construct("Книга #{$bookId} не найдена.");
    }
}
