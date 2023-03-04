
@component('mail::message')
# Introduction

The body of your message.

thanks our customers {{$data['user']->name }}

 
your register was regicted bay admin for this reson : {{ $data['reason']  }}
@component('mail::button', ['url' =>'http://localhost:8080/dashboard/new/L/1-3-2019/P-L-V-E-P/public/M_V_get_Login' ])
 click here to  login with new data 
@endcomponent

 
 
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent
