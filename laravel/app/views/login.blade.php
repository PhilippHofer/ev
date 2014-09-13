@extends('layout')

@section('content')
<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h3>Login</h3>
            <form class="ui form segment">
                <div class="field">
                    <label for="username">Name</label>
                    <div class="ui left icon input">
                        <input type="text" placeholder="Vorname Nachname">
                        <i class="user icon"></i>
                    </div>
                </div>
                <div class="field">
                    <label for="password">Passwort</label>
                    <div class="ui left icon input">
                        <input type="password" placeholder="">
                        <i class="lock icon"></i>
                    </div>
                </div>
                <br><br>

                <input type="submit" class="ui blue submit button" value="Login"/>
            </form>
        </div>
    </div>
</div>
@stop