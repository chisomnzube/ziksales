<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UsersMail extends Mailable
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

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $users = User::all();
        $newUsers = array();
        foreach ($users as $user) 
            {
                $newUsers[] = array($user->email);
            }
        $singleUsers = call_user_func_array('array_merge', $newUsers);  
                //$emails = implode(', ', $singleUsers);  
                //dd($singleUsers);

        return $this->bcc($singleUsers)
                    ->bcc('no-reply@ziksales.com')
                    ->subject('Merry Christmas | ZIKSALES')
                    ->view('emails.user.general');
    }
}
