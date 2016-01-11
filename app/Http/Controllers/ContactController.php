<?php
namespace App\Http\Controllers;

use App\Http\Requests\ContactMeRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\Contact;

class ContactController extends Controller
{
  /**
   * Show the form
   *
   * @return View
   */
  public function showForm()
  {
    return view('contact.contact');
  }

  public function store(ContactMeRequest $request){
      $data = [
          'name' => $request->get('name'),
          'email' => $request->get('email'),
          'phone' => $request->get('phone'),
          'message' => $request->get('message'),
      ];
    $contacts = new Contact($data);
    $contacts->save();
      $data = [
          'name' => $request->get('name'),
          'email' => $request->get('email'),
          'phone' => $request->get('phone'),
          'msg' => $request->get('message'),
      ];

      Mail::send('contact/email_template', $data, function($message){
          $message->from(Input::get('email'), 'Mail from contact page');
          $message->to('polodev10@gmail.com')->subject("message from " . Input::get('name'));
          $message->replyTo(Input::get('email'), Input::get('name'));
      });
      return redirect('contact')->withStatus('We will get back to you soon');

  }

  
    
}