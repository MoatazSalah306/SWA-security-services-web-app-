<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Page') }}
        </h2>    
    </x-slot>
   
    <section class="text-gray-400 bg-gray-900 body-font">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-col text-center w-full mb-20">
            <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-white">You Can Track Your Jobs With <span style="color: #3B82F6">SWA</span> </h1>
          </div>
                @if ($count >0)
                <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                  <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                      <tr>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800 rounded-tl rounded-bl">Service</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">Description</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">Status</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800 text-center">Created At</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($jobs as $job)
                          <tr>
                              <td class="px-4 py-3">
                                  @foreach ($services as $service)
                                      @if ($service->id == $job->service_id)
                                          {{$service->title}}
                                      @endif
                                  @endforeach
                              </td>
                              <td class="px-4 py-3">{{$job->description}}</td>
                              <td class="px-4 py-3">
                                @if ($job->status == "Pending")
                                  <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">{{$job->status}}</span>
                                @elseif($job->status == "Done")
                                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">{{$job->status}}</span>
                                @endif
                              </td>
                              <td class="px-4 py-3 text-center">{{$job->created_at}}</td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                  <a class="text-indigo-400 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                      <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                  </a>
                  <a href={{route("services.index")}} class="flex ml-auto text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded">Back</a>
                </div>
                @else   
                  <span style="width:100%;display:flex;justify-content:center" class="font-medium title-font">YOU DON'T HAVE ANY REQUESTED JOB</span> 
                @endif
   
        </div>
      </section>
       
            
    
  </x-app-layout>