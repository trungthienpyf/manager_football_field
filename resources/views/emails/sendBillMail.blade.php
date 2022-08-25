@component('mail::message')
 # Đặt sân thành công
    Cảm ơn {{ $details['name'] }} đã đặt sân !
    Khi có thông tin lần đặt đầu tiên chúng tôi đã tạo cho bạn tài khoản tương ứng với
    tk: {{ $details['phone'] }}
    password: {{ $details['password'] }}
    @component('mail::button', ['url' => ''])
        View Order
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
