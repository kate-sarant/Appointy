     
        <x-app-layout>
            <x-slot name="header">
                <div class ='flex justify-between'>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Appointments table') }}
                </h2>
                
            </div>
            </x-slot>
        
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              
                      <div class="p-6 text-gray-900 w-full">
                          <div class='flex justify-between'> 
                            <a href='appointments/create' class='flex'>     

                              <p   title="create a new appoitment">
                                 <x-svg.cross class="cross"></x-svg.cross>  </p>
                                 <p class="mt-[8px] ml-4">Add a New appointment</p>
                            </a>
                            {{-- success message --}}
                                               
                            @if(Session::has('success'))
                            <p class="p-2 text-red-600 uppercase bg-white font-bold "> 
                               {{Session::get('success')}}
                           </p>  
                               @endif
                          
                                 {{-- success message --}}   
                        </div>
                     <table class="myshadow w-full border-collapse border border-slate-500 border-spacing-2">
                                <thead class='my-4'>
                                  <tr>
                                    <th class=" border border-slate-600 py-8">Application ID</th>
                                    <th class="border border-slate-600py-8">User Email</th>
                                    <th class="border border-slate-600 py-8">Date</th>
                                    <th class="border border-slate-600 py-8">Options</th>
                             
                                  </tr>
                                </thead>
                                <tbody>
                                    <br>    
                                    @forelse ($appointments as $appointment)
                                    <tr>
                                     
                                      <td class="border border-slate-700 text-center min-h-20">{{ $appointment->id }}</td>
                                      <td class="border border-slate-700 text-center ">{{Auth::user()->email}}</td>
                                      <td class="border border-slate-700 text-center ">{{ $appointment->date}}<br>{{ $appointment->time}}</td>
                                      <td class="border border-slate-700 text-center p-4">
                                        
                                        <x-secondary-button> 
                                          <a href="{{ route('appointments.edit',$appointment) }}">Edit</a>
                                        </x-secondary-button> 
                               
                                       <form  class="p-2 "action="{{ route('appointments.destroy',$appointment) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                          <x-danger-button type="submit">Delete</x-danger-button>                                         
                                        </form>
                                        @empty
                             
                                        {{ __("You have no appoitment booked yet!") }}
                                   
                                    @endforelse
                                      </td>
                                    </tr>
                                   
                                </tbody>
                                <p> {{ $appointments->links()}}</p>
                              </table>  
                        
                        </div>
                    </div>
                </div>

                 
            </div>
        </x-app-layout>
        