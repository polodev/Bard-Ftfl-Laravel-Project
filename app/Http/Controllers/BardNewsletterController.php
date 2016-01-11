<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientsNewsletterFormRequest;
use App\Model\Client;
use App\Newsletter;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class BardNewsletterController extends Controller
{
    public function create_newsletter()
    {
        return view('bard_clients.create_newsletter');
    }

    public function all_clients_email()
    {
        $clients = Client::all();
        $emails = [];
        foreach ($clients as $client) {
            $emails[] = $client->client_email;
        }
        return $emails;

    }
    public function newsletter_save_and_send(ClientsNewsletterFormRequest $request)
    {
        $email_subject = $request->get('email_subject');
        $email_body = $request->get('email_body');
        $data = [
            'email_subject' => $email_subject,
            'email_body' => $email_body
        ];
        //functionality for saving to database
        $newsletter = new Newsletter($data);
        $newsletter->save();
        //functionality fo sending email
        $data = [
            'email_subject' => $email_subject,
            'email_body' => $email_body
        ];
        Mail::send('bard_clients/newsletter_template', $data, function($message){
            $message->from('polodev10@gmail.com', 'learning laravel 2');
            $message->bcc($this->all_clients_email())->subject(Input::get('email_subject'));
        });
        return redirect('clients/create_newsletter')->withStatus('Newsletter sent successfully');
    }
}
