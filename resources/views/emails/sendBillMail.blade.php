@component('mail::message')
 # Yều cầu đặt sân thành công
    Cảm ơn bạn đã đặt sân {{ $details['name'] }}
    vào thời gian {{ $details['timeSlot'] }} với giá tiền {{  number_format($details['price'], 0, '', ',') }}đ/h
    Nhân viên chúng tôi sẽ sớm liên lạc với bạn!
    Thanks,
    {{ config('app.name') }}
@endcomponent
