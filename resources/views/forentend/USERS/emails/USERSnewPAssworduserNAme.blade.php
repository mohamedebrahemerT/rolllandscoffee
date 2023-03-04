
@component('mail::message')
# Introduction

The body of your message.

thanks our customers {{$data['user']->name }}

         your  new mail is  mail: {{$data['email_generat']  }}
         your  new password   is: {{ $data['password'] }}

@component('mail::button', ['url' =>'http://localhost/dashboard/L/1-3-2019/P-L-V-E-P/public/M_V_get_Login' ])
 click here to login
@endcomponent

 
 
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent
