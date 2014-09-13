@extends('layout')

@section('content')

<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            @if(Session::has('message'))
            <div class="ui {{ Session::get('status') }} message">
                <i class="close icon"></i>
                <div class="header">
                    {{ Session::get('message') }}
                </div>
            </div>
            @endif


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

            <hr/>
            <h5>Passwort ändern</h5>
            {{ Form::open(array('url' => 'changePw', 'method' => 'post', 'class' => 'ui form segment')) }}
            <div class="field">
                <label for="oldPW">aktuelles Passwort</label>
                <div class="ui left icon input">
                    <input type="password" placeholder="" name="oldPW" id="oldPW">
                    <i class="lock icon"></i>
                </div>
            </div>
            <div class="field">
                <label for="newPW1">neues Passwort</label>
                <div class="ui left icon input">
                    <input type="password" placeholder="" name="newPW1" id="newPW1">
                    <i class="lock icon"></i>
                </div>
            </div>
            <div class="field">
                <label for="newPW2">neues Passwort wiederholen</label>
                <div class="ui left icon input">
                    <input type="password" placeholder="" name="newPW2" id="newPW2">
                    <i class="lock icon"></i>
                </div>
            </div>
            <br><br>

            <input type="submit" class="ui blue submit button" value="Ändern"/>
            {{ Form::close() }}
            
        </div>
    </div>
</div>
@stop