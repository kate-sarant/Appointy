     
<x-app-layout>
    <x-slot name="header">
        <div class ='flex justify-between'>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book a new appoitment') }}
        </h2>
        
    </div>
    </x-slot>
        <div class='mt-8 text-center'>
            @if(Session::has('message'))
     <p class="p-2 text-red-600 uppercase bg-white font-bold"> 
        {{Session::get('message')}}
    </p>  
        @endif
 
            <div class="flex justify-center">  

          
                <form class='
                shadow shadow-gray-500/40 hover:shadow-gray-500/40
                border p-10 border-gray-200 border-solid w-fit rounded-lg
                ' action="{{ route('appointments.store') }}" method="POST">
                @csrf
                <div>
                    <x-input-label class="" value="email"></x-input-label>
                    <x-text-input value="{{Auth::user()->email}}" readonly></x-text-input>
                </div>
                <div>
                    <x-input-label value="date"></x-input-label>
                    <x-text-input 
                    name="date" 
                    :value="@old('date')"
                    type="date" 
                    required>
                   

                </x-text-input>
                    <x-text-input 
                    name="time" 
                    :value="@old('time')"
                    type="number" 
                    step="1"
                    min="7"
                    max='22' required>
                </x-text-input>
                </div>
                <br>
                <x-primary-button> Submit</x-primary-button>
            </form>

        </div>

            </div>



            <div class='flex justify-center'>

                <div class=" mx-5" id='calendar'></div>
            </div>

        </div>

    

<script>
    $(document).ready(function() {

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        var booking = @json($events);
     
        $('#calendar').fullCalendar({
            defaultView: 'agenda',
            duration: { days: 7 },
            header:{
                left:"prev next today",
                center:"title",
                right:" agendaMonth",            
            },
           selectable:true,
            events: booking,
            nowIndicator: true,
           
            
         })
       
    })

        </script>
      


</x-app-layout>
        