<?php

namespace common\services;

use common\exceptions\SmsSendException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Log\LoggerInterface;

class SmsService
{
    private Client $httpClient;
    private string $apiKey;
    private string $baseUrl = 'https://smspilot.ru/api.php';

    public function __construct(
        string $apiKey,
        private LoggerInterface $logger
    ) {
        $this->apiKey = $apiKey;
        $this->httpClient = new Client([
            'base_uri' => $this->baseUrl,
            'timeout'  => 5.0,
        ]);
    }

    /**
     * @param string $phone
     * @param string $text
     * @param string|null $from
     * @return array
     * @throws SmsSendException
     */
    public function send(string $phone, string $text, ?string $from = null): array
    {
        $query = [
            'send'   => $text,
            'to'     => $phone,
            'apikey' => $this->apiKey,
            'format' => 'json',
        ];
        // Добавляем from только если передан
        $query = array_merge($query, array_filter(['from' => $from ?? null]));

        try {
            $response = $this->httpClient->request('GET', '', ['query' => $query]);
            $body = json_decode($response->getBody()->getContents(), true);

            if (isset($body['error'])) {
                throw new SmsSendException(
                    $phone,
                    $body['error']['description_ru'] ?? $body['error']['description']
                );
            }

            return $body['send'][0] ?? [];
        } catch (GuzzleException $e) {
            throw new SmsSendException($phone, 'HTTP ошибка: ' . $e->getMessage());
        }
    }
}
