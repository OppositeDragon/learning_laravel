<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class RecapMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

   //  /**
   //   * Get the message envelope.
   //   *
   //   * @return \Illuminate\Mail\Mailables\Envelope
   //   */
   //  public function envelope()
   //  {
   //      return new Envelope(
   //          subject: 'Recap Mail',
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

	public function build(){
		$post=Post::count();
		$user=User::count();
		return $this->subject('Site RECAP')->view('recapmail',['postCount'=>$post,'userCount'=>$user]);
	}
}
