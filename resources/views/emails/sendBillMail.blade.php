@component('mail::message')
 # Đặt sân thành công

    @component('mail::button', ['url' => ''])
        View Order
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
