<?php

namespace App\Mail;

use App\Models\Book;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReceived extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $subject = 'Book available';

    public $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Book $book)
    {
        $this->msg=$book;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.message-received');
    }
}
