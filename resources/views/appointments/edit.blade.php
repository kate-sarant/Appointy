<x-app-layout>
    <x-slot name="header">
        <div class ='flex justify-between'>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update  Application')}}
        </h2>
        
    </div>
    </x-slot>

        <div>
        <center>
        <div class='mt-8 text-center'>
                @if(Session::has('message'))
                <p class="p-2 text-red-600 uppercase bg-white font-bold"> 
                {{Session::get('message')}}
                </p>  
                @endif

        <div class="flex justify-center">  


        <form class='shadow shadow-gray-500/40 hover:shadow-gray-500/40
                border p-10 border-gray-200 border-solid w-fit rounded-lg'
                action="{{ route('appointments.update',$appointment) }}" method="POST">
                    @method('put')
                @csrf
                @csrf
                <div class='relative bottom-6'>
                    <x-input-label class="" value='Application ID {{ $appointment->id }}'></x-input-label>
                </div>
                <div>
                    <x-input-label class="" value="email"></x-input-label>
                    <x-text-input value="{{Auth::user()->email}}" readonly></x-text-input>
                </div>
                <div>
                <x-input-label value="date"></x-input-label>

                    <x-text-input 
                    name="date" 
                    :value="@old($appointment->date)"
                    {{-- {{ $appointment->time }} --}}
                    placeholder="{{ $appointment->date }}"
                    type="date" 
                    placeholder="Date"
                    required>
                    </x-text-input>

                    <x-text-input 
                    name="time" 
                    :value="@old($appointment->time)"
                    placeholder="{{ $appointment->time}}" 
                    type="number" 
                    step="1"
                    min="7"
                    onfocus="($appointment->time)"
            
                    max='22' required>
                    </x-text-input>
                </div>
                <br>
                <x-primary-button> Submit</x-primary-button>
        </form>

</div>

</div>
            </center>

</div>

</x-app-layout>