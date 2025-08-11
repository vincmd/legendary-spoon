@props([
    'table_data' => '',
    'un_use_col' => [],
]);
@php
  if(!$table_data ==null){
    $keysToUnset = ['created_at', 'updated_at'];
   foreach($un_use_col as $keys){
        array_push($keysToUnset,$keys);
   }

foreach ($table_data as &$change_data) {
    foreach ($keysToUnset as $key) {
        unset($change_data[$key]);
    }
}


    $firstRow = $table_data[0] ?? $table_data->first();
    $attributes = $firstRow->getAttributes(); // gets only data attributes
    $col_name = array_keys($attributes);
    unset($col_name['0']);

  }
@endphp


<!-- New Table -->
<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">No</th>
                    @foreach ($col_name as $item)
                        <th class="px-4 py-3">{{ str_replace(['-', '_'], ' ', $item) }}</th>
                    @endforeach
                    <th class="px-4 py-3">Remove</th>

                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">


                @foreach ($table_data as $items)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <p class="font-semibold">
                                    {{ $loop->iteration }}</p>
                            </div>
                        </td>
                        @php
                            $ids = $items['id'];
                            $row = $items;
                            unset($row['id']);
                        @endphp
                        @foreach ($row->toArray() as $item)
                            @if (str_contains($item, 'logo/'))
                                <td class="px-4 py-3 w-8 h-6">
                                    <div class="flex items-center text-sm">
                                        <img src="{{ asset('storage/' . $item) }}" alt=""
                                            style="max-width: 40px">
                                    </div>
                                </td>
                            @else
                                <td class="px-4 py-3 text-sm">
                                    <span class="px-2 py-1 font-semibold leading-tight ">
                                        {{ $item }}
                                    </span>
                                </td>
                            @endif
                        @endforeach

                        <td class="px-4 py-3 text-sm">
                            <form action="{{ route('services.destroy', $ids) }}" method="post"
                                class="flex flex-row justify-start items-center ">
                                @csrf
                                @method('delete')
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>


                                <button type="submit" class="ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>
    <div
        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        <span class="flex items-center col-span-3">
            {{-- Showing 21-30 of 100 --}}
        </span>
        <span class="col-span-2"></span>
        {{-- @include('template.parts.table.pagin-table') --}}
    </div>
</div>
