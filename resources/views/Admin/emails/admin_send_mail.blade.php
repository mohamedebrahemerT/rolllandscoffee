@component('mail::message')
# Introduction

The body of your message.

thanks our customers {{$data['admin']->name }}

your  mail is  {{$data['admin']->email }}
@component('mail::button', ['url' =>'http://localhost:8080/dashboard/new/L/1-3-2019/P-L-V-E-P/public/admin_reset_pass_add_new/'.$data['token'] ])
 click here to verfiy
@endcomponent

or copy this link 
 
   <a href="'http://localhost:8080/dashboard/new/L/1-3-2019/P-L-V-E-P/public/admin_reset_pass_add_new/'.$data['token']">'http://localhost:8080/dashboard/new/L/1-3-2019/P-L-V-E-P/public/admin_reset_pass_add_new/'.{{$data['token']}}</a>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
