<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailInvoicing extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    private $name;
    private $name_package = [];
    private $gross_amount;
    private $date;
    private $order_id;
    private $discount;
    private $sub_total;
    public function __construct($name, $name_package, $gross_amount, $date, $order_id, $discount, $sub_total)
    {
        $this->name = $name;
        $this->name_package = $name_package;
        $this->gross_amount = $gross_amount;
        $this->date = $date;
        $this->order_id = $order_id;
        $this->discount = $discount;
        $this->sub_total = $sub_total;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Mail Invoicing',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.invoicing',
            with: [
                'name'=> $this->name,
                'name_package'=> $this->name_package,
                'gross_amount'=> $this->gross_amount,
                'date'=> $this->date,
                'order_id'=> $this->order_id,
                'discount'=> $this->discount,
                'sub_total'=> $this->sub_total,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
