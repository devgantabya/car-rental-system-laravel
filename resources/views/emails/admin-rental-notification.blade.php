@component('mail::message')
# New Car Rental Notification

A new car rental has been created by {{ $rental->user->name }} ({{ $rental->user->email }}).

**Car:** {{ $rental->car->name }} ({{ $rental->car->brand }} {{ $rental->car->model }})  
**Rental Dates:** {{ $rental->start_date->format('M d, Y') }} to {{ $rental->end_date->format('M d, Y') }}  
**Total Cost:** ${{ number_format($rental->total_cost, 2) }}  
**Status:** {{ ucfirst($rental->status) }}

@component('mail::button', ['url' => route('admin.rentals.show', $rental->id)])
View Rental Details
@endcomponent

Thanks,  
{{ config('app.name') }}
@endcomponent