<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Notifications\Traits\HasNotificationType;

abstract class BaseNotification extends Notification
{
    use HasNotificationType;
    use Queueable;

    public mixed $data;

    public function __construct(mixed $data, string $type)
    {
        $this->data = $data;
        $this->typeOfRecord = $type;
    }

    abstract protected function getIcon(): string;

    abstract protected function getLink(): string;

    abstract protected function getMessage(): string;


    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toArray($notifiable): array
    {
        return [
            'icon' => $this->getIcon(),
            'link' => $this->getLink(),
            'message' => $this->getRecordMessage() . ' ' . $this->getMessage(),
            'background-color' => $this->getRecordColor(),
            'id' => $this->data->id,
        ];
    }

    protected function getBackgroundColor()
    {
        return $this->getRecordColor();
    }

    protected function getId()
    {
        return $this->data->id;
    }
}
