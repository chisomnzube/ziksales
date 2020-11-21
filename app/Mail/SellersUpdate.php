<?php

namespace App\Mail;

use App\Seller;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SellersUpdate extends Mailable
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
        $sellers = Seller::where('featured', 1)->get();
        $newsellers = array();
        foreach ($sellers as $seller) 
            {
                $newsellers[] = array($seller->email);
            }
        $singleSellers = call_user_func_array('array_merge', $newsellers);
        //dd($singleSellers);
        return $this->bcc($singleSellers)
                    ->bcc('no-reply@ziksales.com')
                    ->subject('Ziksales - Update Your Product')
                    ->view('emails.products.sellers-update');
    }
}
