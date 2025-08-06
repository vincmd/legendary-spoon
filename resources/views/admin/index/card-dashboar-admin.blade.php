     <!-- Cards parrent -->
     <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">

         <!-- Card -->
         @foreach ($card_datas as $card_data)
             <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                 <div class="p-3 mr-4  bg-orange-100 rounded-full dark:text-orange-100" id='card-icon-bg{{ $loop->iteration}}'>
                     <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">

                         {!! $card_data['icon'] !!}>


                     </svg>
                 </div>
                 <div>
                     <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                         {{ $card_data['name'] }}
                     </p>
                     <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                         {{ $card_data['data'] }}
                     </p>
                 </div>
             </div>


             <script>
                 document.getElementById('card-icon-bg'+{{ $loop->iteration }}).classList.add({{ $card_data['icon_color'] }});
             </script>

         @endforeach
         <!-- Card -->



     </div>
     </div>
