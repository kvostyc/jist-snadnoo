<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Notifications extends Component
{
    public $unreadNotifications;

    protected $listeners = ['update_notifications' => 'render'];

    public function mount()
    {
        $this->unreadNotifications = auth()->user()->unreadNotifications;
    }

    public function render()
    {
        $this->unreadNotifications = auth()->user()->unreadNotifications;

        return view('livewire.admin.notifications');
    }

    public function markAsRead($id, $redirect = true)
    {
        $notification = auth()->user()->unreadNotifications->where('id', '=', $id)->first();

        if ($notification) {
            $notification->markAsRead();
        }

        $this->unreadNotifications = auth()->user()->unreadNotifications;

        if ($redirect) {
            redirect(env('APP_URL') . '/admin');
        }
    }

    public function markAsReadAll()
    {
        foreach (auth()->user()->unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        redirect(env('APP_URL') . '/admin');
    }
}
