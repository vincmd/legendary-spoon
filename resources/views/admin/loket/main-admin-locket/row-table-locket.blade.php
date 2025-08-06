<tr class="text-gray-700 dark:text-gray-400">
    <td class="px-4 py-3">
        <div class="flex items-center text-sm">
            <p class="font-semibold">
                {{ $locket_table['index'] }}</p>
        </div>
    </td>
    <td class="px-4 py-3 text-sm">
        {{ $locket_table['email'] }}
    </td>
    <td class="px-4 py-3 text-xs">
        <span class="px-2 py-1 font-semibold leading-tight bg-green-100 rounded-full  dark:text-green-100">
            {{ $locket_table['alias'] }}
        </span>
    </td>
    <td class="px-4 py-3 text-sm">
        <form action="{{ route('acc.destroy', $locket_table['id']) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">delete</button>
        </form>
    </td>
</tr>
