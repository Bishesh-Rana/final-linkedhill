@component('mail::message')
# Introduction

The body of your message.
<a href="{{route('customer.reset-password',$code)}}">reset</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
