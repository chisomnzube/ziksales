<?php

namespace App\Console\Commands;

use App\Mail\RatingMail;
use App\Order;
use App\Product;
use App\Rating;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class RatingCmd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:rating';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will send emails to customers to rate their order';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // we will loop all through the rating model to send emails to customers that have received their order
        $ratings = Rating::where('sent', 0)->get();
        foreach ($ratings as $rating) 
            {
                //get the product
                $order = Order::find($rating->order_id);
                if ($order->shipped == 1) 
                    {
                        //get the user
                        $user = User::find($rating->user_id);
                        //send a mail to the customer
                        Mail::send(new RatingMail($user->name, $user->email, $rating->product_id, $rating->token));

                        //mark that rating sent
                        Rating::where('id', $rating->id)->update([ 
                            'sent' => 1,
                        ]);
                    }
            }

        echo "Rating email sent successfully";
    }
}
