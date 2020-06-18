@component('mail::message')

@component('mail::panel')
{{$sendermsg}}
@endcomponent

@component('mail::panel')
{{$sendernum}}
@endcomponent

Thanks,<br>
{{$sendername}}
@endcomponent
