<?php

namespace App\Notifications\Traits;

trait HasNotificationType
{
    public string $typeOfRecord;

    public array $recordMapper = [
        'created' => [
            'message' => 'Bol/a vytvorená nový/á',
            'color' => 'bg-success-500',
        ],
        'updated' => [
            'message' => 'Bol/a updatovaný/á',
            'color' => 'bg-warning-500',
        ],
        'deleted' => [
            'message' => 'Bol/a vymazaná/ý',
            'color' => 'bg-danger-500',
        ],
        'replied' => [
            'message' => 'Bolo odpovedané na',
            'color' => 'bg-warning-500',
        ],
    ];

    public function getRecordMessage()
    {
        return $this->recordMapper[$this->typeOfRecord]['message'];
    }

    public function getRecordColor()
    {
        return $this->recordMapper[$this->typeOfRecord]['color'];
    }
}
