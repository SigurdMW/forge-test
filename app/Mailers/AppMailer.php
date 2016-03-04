<?php

namespace App\Mailers;

use App\User;
use Illuminate\Contracts\Mail\Mailer;

class AppMailer {

	// Default from mail
	protected $from = "hallo@ptportal.no";

	// To email
	protected $to;

	// Default email view
	protected $view;

	// Data in email
	protected $data = [];

	// Importing the mailer variable
	protected $mailer;

	// Use Laravels default mailer settings
	function __construct(Mailer $mailer) {
		$this->mailer = $mailer;
	}

	public function sendEmailConfirmationToUser(User $user){
		$this->to = $user->email;
		$this->view = 'emails.confirm';
		$this->data = compact('user');

		$this->deliver();
	}

	public function deliver()
	{
		$this->mailer->send($this->view, $this->data, function($message){
			$message->from($this->from, 'Administrator')
					->to($this->to); // last parameter in from is name
		});
	}
}