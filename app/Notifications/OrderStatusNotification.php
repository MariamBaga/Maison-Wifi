<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderStatusNotification extends Notification
{
    use Queueable;

    public $order;
    public $action; // 'created', 'cancelled', 'status_updated'
    public $oldStatus;
    public $newStatus;

    public function __construct($order, string $action, $oldStatus = null, $newStatus = null)
    {
        $this->order = $order;
        $this->action = $action;
        $this->oldStatus = $oldStatus;
        $this->newStatus = $newStatus ?? $order->status;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        $subject = "Commande #{$this->order->id} - ";

        $line = "";
        switch ($this->action) {
            case 'created':
                $subject .= "Nouvelle commande";
                $line = "Une nouvelle commande a été créée.";
                break;
            case 'cancelled':
                $subject .= "Commande annulée";
                $line = "La commande a été annulée.";
                break;
            case 'status_updated':
                $subject .= "Statut modifié";
                $line = "Le statut de la commande a été modifié : {$this->oldStatus} → {$this->newStatus}";
                break;
        }

        return (new MailMessage)
            ->subject($subject)
            ->greeting("Bonjour {$notifiable->name},")
            ->line($line)
            ->line("Total : {$this->order->total} FCFA")
            ->action('Voir la commande', route('orders.show', $this->order->id));
    }

    public function toArray($notifiable)
    {
        return [
            'order_id' => $this->order->id,
            'action' => $this->action,
            'old_status' => $this->oldStatus,
            'new_status' => $this->newStatus,
            'total' => $this->order->total,
        ];
    }
}
