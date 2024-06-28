<x-mail::message>
# Hi:{{$user->name}}

<h2>Hello </h2>

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
