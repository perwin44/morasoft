<x-mail::table>
| Laravel       | Table         | Example  |
| ------------- |:-------------:| --------:|
| Col 2 is      | Centered      | $10      |
| Col 3 is      | Right-Aligned | $20      |
</x-mail::table>



<x-mail::message>
# MoraSoft

WElcome to My Website Mora Soft

<x-mail::button :url="'www.morasoft.com'">
Visit MySite
</x-mail::button>

Thanks,<br>
{{ $user }}
</x-mail::message>
