<header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
    <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">

        <!-------------------------->
        <!-- Mobile hamburger     -->
        <!-------------------------->
        @include('template.header.mobile-hamburger')

        
        <!-------------------------->
        <!-- Search input         -->
        <!-------------------------->
        @php
            $hide_header_searchbar = true;
        @endphp
        @include('template.header.search-input',['hide_header_searchbar' => $hide_header_searchbar])


        <ul class="flex items-center flex-shrink-0 space-x-6">

            <!-------------------------->
            <!-- Theme toggler        -->
            <!-------------------------->
            @include('template.header.theme-toggler')

            <!-------------------------->
            <!--| Notifications menu |-->
            <!-------------------------->
            {{-- @include('template.header.notif.notification') --}}

            <!-------------------------->
            <!-- Profile menu         -->
            <!-------------------------->
            @include('template.header.profile')

        </ul>
    </div>
</header>
