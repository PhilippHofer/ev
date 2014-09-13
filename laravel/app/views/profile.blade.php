@extends('layout')

@section('content')

@if(Session::has('message'))
<div class="ui error message">
  <i class="close icon"></i>
  <div class="header">
    Password change successful!
  </div>
</div>
@endif

<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h3>Eingeloggt als Lukas Bindreiter</h3>
            <hr/>
            <h5>Vokabelgruppen</h5>
            {{ Form::open(array('url' => 'profile', 'method' => 'post', 'class' => 'ui form segment')) }}
                <div class="inline field">
                    <div class="ui checkbox">
                        <input tabindex="1" name="group[]" id="group1" type="checkbox" value="1"/>
                        <label for="group1">Des san de Gruppn!</label>
                    </div>
                </div>
                <div class="inline field">
                    <div class="ui checkbox">
                        <input tabindex="2" name="group[]" id="group2" type="checkbox"  value="2"/>
                        <label for="group2">Sog ma bitte</label>
                    </div>
                </div>
                <div class="inline field">
                    <div class="ui slider checkbox">
                        <input tabindex="3" name="group[]" id="group3" type="checkbox"  value="3"/>
                        <label for="group3">woiche Checkbox am besten ausschaut! :D</label>
                    </div>
                </div>
                <div class="inline field">
                    <div class="ui slider checkbox">
                        <input tabindex="4" name="group[]" id="group4" type="checkbox"  value="4"/>
                        <label for="group4">Gruppe 1</label>
                    </div>
                </div>
                <div class="inline field">
                    <div class="ui toggle checkbox">
                        <input tabindex="5" name="group[]" id="group5" type="checkbox"  value="5"/>
                        <label for="group5">Gruppe 2</label>
                    </div>
                </div>
                <div class="inline field">
                    <div class="ui toggle checkbox">
                        <input tabindex="6" name="group[]" id="group6" type="checkbox"  value="6"/>
                        <label for="group6">Gruppe 3</label>
                    </div>
                </div>

                <hr/>

                <input type="submit" class="ui blue submit button" value="Speichern" />

            {{ Form::close() }}

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