@extends('layout')

@section('content')
<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h3>Probetest</h3>
            <hr/>

            <h5>Gruppe 1</h5>
            <table class="ui celled table segment">
                <thead>
                <tr>
                    <th>Deutsch</th>
                    <th>English</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Haus</td>
                    <td><div class="ui large input"><input type="text"></div></td>
                </tr>
                <tr>
                    <td>Maus</td>
                    <td><div class="ui large input"><input type="text"></div></td>
                </tr>
                <tr>
                    <td>Laus</td>
                    <td><div class="ui large input"><input type="text"></div></td>
                </tr>
                <tr>
                    <td>Strauß</td>
                    <td><div class="ui large input"><input type="text"></div></td>
                </tr>
                </tbody>
            </table>
            <hr/>
            <h5>Gruppe 2</h5>
            <table class="ui celled table segment">
                <thead>
                <tr>
                    <th>Deutsch</th>
                    <th>English</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Haus</td>
                    <td><div class="ui large input"><input type="text"></div></td>
                </tr>
                <tr>
                    <td>Maus</td>
                    <td><div class="ui large input"><input type="text"></div></td>
                </tr>
                <tr>
                    <td>Laus</td>
                    <td><div class="ui large input"><input type="text"></div></td>
                </tr>
                <tr>
                    <td>Strauß</td>
                    <td><div class="ui large input"><input type="text"></div></td>
                </tr>
                </tbody>
            </table>

            <a href="{{ URL::to('learn') }}" class="ui purple submit button">Auswerten</a>

        </div>
    </div>
</div>
@stop