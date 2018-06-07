
Hi, {{ $booking->user->name }},

<br/>

Your booking at {{ $booking->equipmentAvailability->institute->name ?? '' }} for equipment {{ $booking->equipment->name }} from {{ $booking->equipmentAvailability->from  }}  to {{ $booking->equipmentAvailability->to }} is confirmed . Please come and collect the same.


<br/>
<br/>

Regards,
ICMR