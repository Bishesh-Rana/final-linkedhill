@component('mail::message')
 Now, You are verified. You can login and add, update properties as Agent.
 <a href="{{route('agent.getLogin')}}">Login</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
