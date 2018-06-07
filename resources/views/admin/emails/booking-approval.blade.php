
Hi, {{ $booking->user->name }},

<br/>

Your booking at {{ $booking->equipmentAvailability->institute->name ?? '' }} for equipment {{ $booking->equipment->name }} from {{ $booking->equipmentAvailability->from  }}  to {{ $booking->equipmentAvailability->to }} is approved . Please pay the fees and provide the receipt so that we can confirm the same.


<br/>
<br/>

Regards,
ICMR