<ul class="flex-col md:flex-row list-none items-center hidden md:flex">
    <a
        class="text-blueGray-500 block"
        href="#pablo"
        onclick="openDropdown(event,'user-dropdown')"
    >
        <div class="items-center flex">
          <span
              class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"><img
                  alt="..."
                  class="w-full rounded-full align-middle border-none shadow-lg"
                  src="{{ asset('assets/admin/img/user.png') }}"
              />
          </span>
        </div>
    </a>
    <li
        class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
        id="user-dropdown">
        <a
            href="{{ route('admin.accounts.edit', ['admin' => Auth::user()]) }}"
            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
        >
            プロフィール変更
        </a>

        <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
        <a
            href="{{ route('admin.logout') }}"
            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
            ログアウト
        </a>
    </li>
</ul>
