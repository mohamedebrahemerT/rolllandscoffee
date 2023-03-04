
@component('mail::message')
# Introduction

The body of your message.

thanks our customers {{$data['user']->name }}

your  mail is  {{$data['user']->email }}
@component('mail::button', ['url' =>'http://localhost/dashboard/L/1-3-2019/P-L-V-E-P/public/Email_verfiy/'.$data['token'] ])
 click here to  verfiy your Email
@endcomponent

 
 
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent
