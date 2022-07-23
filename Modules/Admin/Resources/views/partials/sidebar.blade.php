{{--<div class="hamburger-menu">--}}
{{--    <div class="hamburger-menu-btn__wrapper">--}}
{{--        <div class="hamburger-menu__btn_before"></div>--}}
{{--        <div class="hamburger-menu__btn"></div>--}}
{{--        <div class="hamburger-menu__btn_after"></div>--}}
{{--    </div>--}}
{{--</div>--}}
<nav id="sidebar"
     class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div
        class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        {{--        <button--}}
        {{--            class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"--}}
        {{--            type="button" onclick="toggleNavbar('example-collapse-sidebar')">--}}
        {{--            <i class="fas fa-bars"></i>--}}
        {{--        </button>--}}
        <a class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
           href="{{ route('admin.index') }}">
            {{ config('app.name') }}
        </a>
        {{--        @include('admin::components.widgets.account_menu_sp')--}}
        <div
            class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
            id="example-collapse-sidebar">
            <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a
                            class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                            href="{{ route('admin.index') }}">
                            {{ config('app.name') }}
                        </a>
                    </div>
                    <div class="w-6/12 flex justify-end">
                        <button type="button"
                                class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                                onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Divider -->
            <hr class="my-4 md:min-w-full"/>
            <!-- Heading -->
            <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                ダッシュボード
            </h6>
            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a href="/admin"
                       class="text-xs uppercase py-3 font-bold block　text-pink-500 hover:text-pink-600">
                        <i class="fas fa-tv mr-2 text-sm opacity-75 text-blueGray-300"></i>
                        応募者一覧
                    </a>
                </li>
            </ul>

            <hr class="my-4 md:min-w-full"/>
            {{--            @php($current_path = '/' . request()->path())--}}
            {{--            @foreach(config('admin.sidebar')[Auth::user()->role]['sidebar'] as $sidebar)--}}
            {{--                <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">--}}
            {{--                    {{ $sidebar['name'] }}--}}
            {{--                </h6>--}}
            {{--                <!-- Navigation -->--}}
            {{--                <ul class="md:flex-col md:min-w-full flex flex-col list-none">--}}
            {{--                    @foreach($sidebar['menus'] as $sidebar_menu)--}}
            {{--                        <li class="items-center">--}}
            {{--                            <a href="{{ $sidebar_menu['uri'] }}"--}}
            {{--                               class="text-xs uppercase py-3 font-bold block--}}
            {{--                                    {{ $current_path === $sidebar_menu['uri'] ? 'text-pink-500 hover:text-pink-600' : 'text-blueGray-700 hover:text-blueGray-500' }}">--}}
            {{--                                <i class="fas fa-tv mr-2 text-sm opacity-75 {{ $current_path === $sidebar_menu['uri'] ? 'opacity-75' : 'text-blueGray-300' }}"></i>--}}
            {{--                                {{ $sidebar_menu['title'] }}--}}
            {{--                            </a>--}}
            {{--                        </li>--}}
            {{--                    @endforeach--}}
            {{--                </ul>--}}
            {{--                <hr class="my-4 md:min-w-full"/>--}}
            {{--            @endforeach--}}
        </div>
    </div>
</nav>
