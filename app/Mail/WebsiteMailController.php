<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WebsiteMailController extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $body;
    public $template;
    public $employer_name;

    public function __construct($subject, $body, $template = 'admin.email.emailTemplate', $employer_name)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->template = $template;
        $this->employer_name = $employer_name;
    }

    public function build()
    {
        return $this->view($this->template)
        ->with('subject', $this->subject)
        ->with('body', $this->body)
        ->with('employer_name', $this->employer_name);
    }
}