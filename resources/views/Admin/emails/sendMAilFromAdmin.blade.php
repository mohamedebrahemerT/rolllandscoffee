
@component('mail::message')
# Introduction

The body of your message.

 

 
this male from admin www.surf.com with subject: {{ $data['subject']  }}
@component('mail::button', ['url' =>'http://localhost:8080/dashboard/new/L/1-3-2019/P-L-V-E-P/public/M_V_get_Login' ])
 click here to  login to website 
@endcomponent

 
 
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent
