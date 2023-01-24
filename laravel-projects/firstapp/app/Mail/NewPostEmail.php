<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewPostEmail extends Mailable {
	use Queueable, SerializesModels;
	public $data;
	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($data) {
		$this->data = $data;
	}

	//  /**
	//   * Get the message envelope.
	//   *
	//   * @return \Illuminate\Mail\Mailables\Envelope
	//   */
	//  public function envelope()
	//  {
	//      return new Envelope(
	//          subject: 'New Post Email',
	//      );
	//  }

	//  /**
	//   * Get the message content definition.
	//   *
	//   * @return \Illuminate\Mail\Mailables\Content
	//   */
	//  public function content()
	//  {
	//      return new Content(
	//          view: 'view.name',
	//      );
	//  }

	//  /**
	//   * Get the attachments for the message.
	//   *
	//   * @return array
	//   */
	//  public function attachments()
	//  {
	//      return [];
	//  }
	public function build() {
		return $this->subject('Congratulations!')->view('new-post-email', ['data' => $this->data]);
	}
}
