@extends('layout')

@section('content')

@if(Session::has('message'))
<div class="ui error message">
  <i class="close icon"></i>
  <div class="header">
    Password change failed!
  </div>
</div>
@endif

<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h3>Passwort ändern</h3>
            {{ Form::open(array('url' => 'changePw', 'method' => 'post', 'class' => 'ui form segment')) }}
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