<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Page') }}
        </h2>    
    </x-slot>
   
    <section class="text-gray-400 bg-gray-900 body-font px-8">
        <div class="container px-5 py-24 mx-auto flex flex-wrap">
          <div class="flex flex-col text-center w-full mb-20">
            <h2 class="text-xs text-blue-400 tracking-widest font-medium title-font mb-1">SWA AVAILABLE SERVICES</h2>
            <h1 class="sm:text-3xl text-2xl font-medium title-font text-white">valuable Problem Solution</h1>
          </div>            
            @if ($count > 0)
              @foreach ($services as $service)
                  <div class="p-4 md:w-1/3">
                        <div class="flex rounded-lg h-full bg-gray-800 bg-opacity-60 p-8 flex-col">
                          <div class="flex items-center mb-3">
                            <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-blue-500 text-white flex-shrink-0">
                              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                              </svg>
                            </div>
                            <h2 class="text-white text-lg title-font font-medium">{{$service->title}}</h2>
                            <span style="color: #5059FF" class="text-sm ml-3 title-font font-medium">
                                @foreach ($categories as $category)
                                    @if ($category->id == $service->category_id)
                                        {{$category->name}}
                                    @endif
                                @endforeach
                            </span>
                            <span class="text-red-400 text-sm ml-3 title-font font-medium">
                              {{$service->price}}$
                          </span>
                          </div>
                          <div class="flex-grow">
                            <p class="leading-relaxed text-base">{{$service->description}}</p>
                            <a href={{route("jobs.create",$service->id)}} class="mt-3 text-blue-400 inline-flex items-center cursor-pointer">Request Job
                              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                              </svg>
                            </a>
                          </div>
                        </div>
                  </div>
              @endforeach
            @else
              <span style="width:100%;display:flex;justify-content:center" class="font-medium title-font">NO SERVICES AVAILABLE</span>
            @endif

          </div>
        </div>
    </section>
       
            
    
  </x-app-layout>