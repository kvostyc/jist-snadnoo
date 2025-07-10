<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Notifications\Traits\HasNotificationType;

class BaseNotification extends Notification
{
    use HasNotificationType;
    use Queueable;

    public $data;

    public function __construct(mixed $data, string $type)
    {
        $this->data = $data;
        $this->typeOfRecord = $type;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'icon' => $this->getIcon(),
            'link' => $this->getLink(),
            'message' => $this->getRecordMessage() . ' ' . $this->getMessage(),
            'background-color' => $this->getRecordColor(),
            'id' => $this->data->id,
        ];
    }

    protected function getIcon()
    {
        return '';
    }

    protected function getLink()
    {
        return '';
    }

    protected function getMessage()
    {
        return '';
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
