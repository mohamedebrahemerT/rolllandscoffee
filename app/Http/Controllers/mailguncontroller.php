<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
  
use Mailgun\Mailgun;


class mailguncontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function index()
{

// First, instantiate the SDK with your API credentials
//$mg = Mailgun::create('4dfb510f8772502178e0b1e348285281-87cdd773-72959f01'); // For US servers
$mg = Mailgun::create('key-11796c09e58-056a9e975c96dd334da0dd', 'itsolutionstuff.com'); // For EU servers

// Now, compose and send your message.
// $mg->messages()->send($domain, $params);
$mg->messages()->send('example.com', [
  'from'    => 'bob@example.com',
  'to'      => 'mohamedchi2013@gmail.com',
  'subject' => 'The PHP SDK is awesome!',
  'text'    => 'It is so simple to send a message.'
]);


/*
# Instantiate the client.
$mgClient = new Mailgun('4dfb510f8772502178e0b1e348285281-87cdd773-72959f01');
$domain = "https://api.mailgun.net/v3/sandboxea775070e5c9416087903256a1927cdb.mailgun.org";
# Make the call to the client.


     $result = $mgClient->sendMessage($domain, array(
    'from'  => 'me0775460@gmail.com',
    'to'    => 'mohamedchi2013@gmail.com',
    'subject' => 'Hello',
    'text'  => 'Testing some Mailgun awesomness!'
));

     */

}
    


}
