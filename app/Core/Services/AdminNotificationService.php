<?php

namespace App\Core\Services;

use App\Models\User;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification as NotificationFacade;

/**
 * Service for sending notifications to all admin users.
 *
 * This service centralizes the logic for finding admin recipients and dispatching notifications,
 */
class AdminNotificationService
{
    /**
     * Send a notification to all admin users
     */
    public function notify(Notification $notification): int
    {
        $admins = User::where("is_admin", "=", true)->get();
        NotificationFacade::send($admins, $notification);

        return $admins->count();
    }
}
