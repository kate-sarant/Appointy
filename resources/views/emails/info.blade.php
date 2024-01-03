
<x-mail::message>
Hello {{Auth::user()->name}},

<center><h2>Appointment has been booked successfully.</center><br>
Appointment info<br></h2>

<div class="block myshadow myshadow mt-3">
<x-input-label> date: {{ request()->date }}</x-input-label>
<hr>
<x-input-label>time: {{ request()->time.':00'}}</x-input-label>
<hr>
<x-input-label>Duration : 1hour</x-input-label>
</div>



<x-mail::button :url="'/'">
Visit site
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

