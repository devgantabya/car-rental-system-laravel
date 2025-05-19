@component('mail::message')
# Rental Confirmation

Thank you for renting with us! Here are the details of your rental:

**Car:** {{ $rental->car->name }} ({{ $rental->car->brand }} {{ $rental->car->model }})  
**Rental Dates:** {{ $rental->start_date->format('M d, Y') }} to {{ $rental->end_date->format('M d, Y') }}  
**Total Cost:** ${{ number_format($rental->total_cost, 2) }}  
**Status:** {{ ucfirst($rental->status) }}

You can view your rental details anytime by logging into your account.

@component('mail::button', ['url' => route('frontend.rentals.index')])
View My Rentals
@endcomponent

Thanks,  
{{ config('app.name') }}
@endcomponent