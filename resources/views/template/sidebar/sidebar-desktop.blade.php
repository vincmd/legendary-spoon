     <!-- Desktop sidebar -->
     <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
         <div class="py-4 text-gray-500 dark:text-gray-400">
             <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                 Windmill
             </a>
             <ul class="mt-6">

                 @foreach ($sidebar_buttons as $side_button)
                     @if ($side_button['status'])
                         <ul class="">
                             <li class="relative px-6 py-3">
                                 <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                                     aria-hidden="true"></span>
                                 <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                                     href="{{ $side_button['href'] }}">
                                     <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                         {!! $side_button['icon'] !!}
                                     </svg>
                                     <span class="ml-4">{{ $side_button['name'] }}</span>
                                 </a>
                             </li>
                         </ul>
                     @else
                         <li class="relative px-6 py-3">
                             <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                 href="{{ $side_button['href'] }}">
                                 <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                     stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                     {!! $side_button['icon'] !!}
                                 </svg>
                                 <span class="ml-4">{{ $side_button['name'] }}</span>
                             </a>
                         </li>
                     @endif
                 @endforeach


             </ul>
             {{-- @include('template.button') --}}

         </div>
     </aside>
