@component('mail::message')
    <h1>The new company entered</h1>
    <p>email : {{ $data['email'] }}</p>
    <p>name : {{ $data['name'] }}</p>
    <p>website : {{ $data['website'] }}</p>
@endcomponent
