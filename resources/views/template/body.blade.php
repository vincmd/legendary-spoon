
@include('template.html-head')

<body>
    @include('template.header')
    <div
    class="flex h-screen bg-gray-50 dark:bg-gray-900"
    :class="{ 'overflow-hidden': isSideMenuOpen }"
    >
    @include('template.sidebar-name')

      <div class="flex flex-col flex-1 w-full">

@yield('main')


@include('template.close')
