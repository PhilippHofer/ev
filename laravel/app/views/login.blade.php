@extends('layout')

@section('content')

@if(Session::has('message'))
<div class="ui error message">
  <i class="close icon"></i>
  <div class="header">
    Login failed!
  </div>
  <ul class="list">
    <li>wrong username or</li>
    <li>wrong password</li>
  </ul>
</div>
@endif

<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h3>Login</h3>
            {{ Form::open(array('url' => 'login', 'method' => 'post', 'class' => 'ui form segment')) }}
                <div class="field">
                    <label for="username">Name</label>
                    <div class="ui left icon input">
                        <input type="text" placeholder="Vorname Nachname" name="name" id="name">
                        <i class="user icon"></i>
                    </div>
                </div>
                <div class="field">
                    <label for="password">Passwort</label>
                    <div class="ui left icon input">
                        <input type="password" placeholder="" name="pw" id="pw">
                        <i class="lock icon"></i>
                    </div>
                </div>
                <br><br>

                <input type="submit" class="ui blue submit button" value="Login"/>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop