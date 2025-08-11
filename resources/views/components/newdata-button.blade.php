@props([
    'title'=>'new',
])

@php
    $current_url = url()->current();
@endphp

 <!-- CTA -->
 <a class="flex  items-center  justify-between  text-sm font-semibold"
 href="{{ $current_url }}/new">
 <div class="flex items-center">

 </div>
 <span class="p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">{{ $title }} &#43;</span>
</a>

