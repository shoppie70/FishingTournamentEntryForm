<ul class="md:hidden items-center flex flex-wrap list-none">
    <li class="inline-block relative">
        <a
            class="text-blueGray-500 block"
            href="#pablo"
            onclick="openDropdown(event,'user-responsive-dropdown')"
        >
            <div class="items-center flex">
                <span class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full">
                  <img
                      alt="..."
                      class="w-full rounded-full align-middle border-none shadow-lg"
                      src="{{ asset('assets/admin/img/user.png') }}"
                  />
                </span>
            </div>
        </a>
        <div
            class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
            id="user-responsive-dropdown">
            <a href="#pablo"
               class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                プロフィール変更
            </a>
            <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
            <a
                href="#pablo"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                ログアウト
            </a>
        </div>
    </li>
</ul>
