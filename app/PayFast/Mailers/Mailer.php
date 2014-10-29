<?php
/**
 * @author Ron Darby <ron@darby.co.za>
 */
namespace PayFast\Mailers;

use Illuminate\Support\Facades\Config;
use Mail;

abstract class Mailer {

    public function sendTo($user, $subject, $view, $data = array())
    {
        if (Config::get('mail.from.address'))
        {
            $email = $user->email;
            Mail::send($view, $data, function ($message) use ($email, $subject)
            {
                $message->to($email)->subject($subject);
            });
        }
    }
}