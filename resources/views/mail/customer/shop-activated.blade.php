@component('mail::message')
# Congratulations

Your Shop is now active

@component('mail::button', ['url' => route('shop.show', $shop->id)])
Visit Your Shop
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
