
@component('mail::table')
| Laravel       | Table         | Example  |
| ------------- |:-------------:| --------:|
| Col 2 is      | Centered      | $10      |
| Col 3 is      | Right-Aligned | $20      |
@endcomponent


@component('mail::message')

<h2>Welcome to my websit this message from :  {{$name}}</h2> 

@component('mail::button',['url'=>''])
Button Text


@endcomponent

Thanks <br>

{{config('app.name')}}

@endcomponent

