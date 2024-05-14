<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('User Page') }}
      </h2>    
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
            <section class="text-gray-400 bg-gray-900 body-font">
              <div class="container px-5 py-24 mx-auto">
          
                <a style="display: inline-block" href={{route("feedback.create")}} class="mb-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-auto">Add Feedback</a>
                <div class="flex flex-wrap -m-4">
                  @foreach ($feedback as $feed)
                    <div class="p-4 md:w-1/2 w-full">
                      <div class="h-full bg-gray-800 bg-opacity-40 p-8 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-500 mb-4" viewBox="0 0 975.036 975.036">
                          <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                        </svg>
                        <p class="leading-relaxed mb-6">{{$feed->body}}</p>
                        
                        <a class="inline-flex items-center">
                          <img alt="feed" src="https://dummyimage.com/106x106" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                          <span class="flex-grow flex flex-col pl-4">
                            <span class="title-font font-medium text-white">Created At : {{$feed->created_at}}</span>
                            
                            <span class="text-gray-500 text-sm" style="display: inline-block">
                              @foreach ($users as $user)
                                  @if ($feed->user_id == $user->id)
                                      Created By: 
                                        @if ($user->name == Auth()->user()->name)
                                            {{$user->name}} (YOU)
                                        @else
                                            {{$user->name}}
                                        @endif
                                      
                                  @endif
                              @endforeach
                            </span>
                            {{-- @if ($current_user_id == $feed->user_id)
                              <a href={{"/"}} class="text-red-500" style="cursor: pointer">Remove</a>
                            @endif --}}
                          </span>
                          
                        </a>
                        
                      </div>
                    </div>
                    
                  @endforeach
                </div>
              </div>
            </section>
              
          </div>
      </div>
  </div>
  
</x-app-layout>


 