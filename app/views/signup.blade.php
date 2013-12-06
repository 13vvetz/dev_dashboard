<!-- app/views/signup.blade.php -->

{{ Form::open(array('url' => 'thankyou', 'method' => 'post')) }}
   {{ Form::label('first_name', 'First Name') }}
   {{ Form::text('first_name') }}
<br />
   {{ Form::label('last_name', 'Last Name') }}
   {{ Form::text('last_name') }}
<br />
   {{ Form::label('email', 'Email') }}
   {{ Form::text('email') }}
<br />
   {{ Form::label('password', 'Password') }}
   {{ Form::text('password') }}
<br />
   {{ Form::submit('Sign Me Up!'); }}
{{ Form::close() }}

