<?php

namespace App\Notifications\Traits;

trait HasNotificationType
{
    public string $typeOfRecord;

    public array $recordMapper = [
        'created' => [
            'message' => 'Bol/a vytvorená nový/á',
            'color' => '#10b981',
        ],
        'updated' => [
            'message' => 'Bol/a updatovaný/á',
            'color' => '#f59e0b',
        ],
        'deleted' => [
            'message' => 'Bol/a vymazaná/ý',
            'color' => '#ef4444',
        ],
        'replied' => [
            'message' => 'Bolo odpovedané na',
            'color' => '#f59e0b',
        ],
    ];

    public function getRecordMessage(): string
    {
        return $this->recordMapper[$this->typeOfRecord]['message'];
    }

    public function getRecordColor(): string
    {
        return $this->recordMapper[$this->typeOfRecord]['color'];
    }
}
