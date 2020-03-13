@component('mail::message')
# Shop Activation Request

Please activate shop. Shop Details

Shop Name: {{ $shop->name }}
Shop Owner: {{ $shop->owner->name }}
@component('mail::button', ['url' => url('/admin/shops')])
Manage Shops
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
