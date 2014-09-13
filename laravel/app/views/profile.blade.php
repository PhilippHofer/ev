@extends('layout')

@section('content')
<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h3>Eingeloggt als Lukas Bindreiter</h3>
            <hr/>
            <h5>Vokabelgruppen</h5>
            {{ Form::open(array('url' => 'profile', 'method' => 'post', 'class' => 'ui form segment')) }}
                <div class="inline field">
                    <div class="ui checkbox">
                        <input tabindex="1" name="group[]" id="group1" type="checkbox" />
                        <label for="group1">Des san de Gruppn!</label>
                    </div>
                </div>
                <div class="inline field">
                    <div class="ui checkbox">
                        <input tabindex="2" name="group[]" id="group2" type="checkbox" />
                        <label for="group2">Sog ma bitte</label>
                    </div>
                </div>
                <div class="inline field">
                    <div class="ui slider checkbox">
                        <input tabindex="3" name="group[]" id="group3" type="checkbox" />
                        <label for="group3">woiche Checkbox am besten ausschaut! :D</label>
                    </div>
                </div>
                <div class="inline field">
                    <div class="ui slider checkbox">
                        <input tabindex="4" name="group[]" id="group4" type="checkbox" />
                        <label for="group4">Gruppe 1</label>
                    </div>
                </div>
                <div class="inline field">
                    <div class="ui toggle checkbox">
                        <input tabindex="5" name="group[]" id="group5" type="checkbox" />
                        <label for="group5">Gruppe 2</label>
                    </div>
                </div>
                <div class="inline field">
                    <div class="ui toggle checkbox">
                        <input tabindex="6" name="group[]" id="group6" type="checkbox" />
                        <label for="group6">Gruppe 3</label>
                    </div>
                </div>

                <hr/>

                <input type="submit" class="ui blue submit button" value="Speichern" />

            {{ Form::close() }}
        </div>
    </div>
</div>
@stop