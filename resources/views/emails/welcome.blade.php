@component('mail::message')

<h2>Activate your account</h2>
<p>We're happy to have you here,<br><br> 
To activate your account, verify that this is your email. </p>


<p><a style="display: inline-block; padding:10px; background-color:blue; color:#ffffff; text-decoration: none" href="https://escortsear.ch/verifyaccount/{{$data['emailaddress']}}">Activate Account</a></p>
 
<p><br><br>
Thanks,<br>
{{ config('app.name') }} Team.</p>
@endcomponent