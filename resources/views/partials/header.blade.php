<header class="fixed z-50 w-full">
      <nav class="border-gray-200 bg-[#FFFFFF] py-2.5">
        <div
          class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between lg:px-24"
        >
          <a href="#" class="flex items-center">
            <img
              src="{{Vite::asset('resources/images/untan.png')}}"
              class="mr-3 h-6 sm:h-9 md:-ml-20"
              alt="Untan Logo"
            />
            <span
              class="self-center whitespace-nowrap text-2xl font-semibold text-[#1BC0DE]"
              >Digital Perpustakaan</span
            >
          </a>
          <div class="flex items-center lg:order-3">
            @if (Auth::check())
                <div class="hidden sm:flex sm:items-center ">
                  <a href="{{route('profile.edit')}}"> <img class="h-10 w-10 rounded-full mr-4" src="{{Vite::asset('resources/images/pp-arief.jpg')}}" alt="Profile Image"></a>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @else
            <a
              href="{{ route('register') }}"
              class="rounded-lg bg-[#1BC0DE] px-4 py-2 text-sm font-semibold text-white hover:bg-[#0B89A0] hover:text-white focus:ring-4 focus:ring-[#1BC0DE] sm:mr-2 lg:mr-0 lg:px-5 lg:py-2.5"
              >Daftar</a
            >
            @endif
           
            <button
              data-collapse-toggle="mobile-menu-2"
              type="button"
              id="hamburger"
              class="ml-1 inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 lg:hidden"
              aria-controls="mobile-menu-2"
              aria-expanded="false"
            >
              <span class="sr-only">Open main menu</span>
              <svg
                class="h-6 w-6"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                  clip-rule="evenodd"
                ></path>
              </svg>
              <svg
                class="hidden h-6 w-6"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
          </div>
          <div
            class="hidden w-full items-center justify-between lg:order-1 lg:flex lg:w-auto"
            id="mobile-menu-2"
          >
            <ul
              class="mt-4 flex flex-col font-semibold  lg:mt-0 lg:flex-row lg:space-x-8"
              id="menu"
            >
              <li>
                <a
                  href="#"
                  class="block rounded bg-white py-2 pl-3 pr-4 text-[#1BC0DE] lg:bg-transparent lg:p-0 lg:text-[#1BC0DE]"
                  aria-current="page"
                  >Home</a
                >
              </li>
              <li>
                <a
                  href="{{ route('book.index') }}"
                  class="lg:dark:hover:[#1BC0DE] block border-b border-gray-100 py-2 pl-3 pr-4 text-gray-700 hover:bg-[#1BC0DE] lg:border-0 lg:p-0 lg:hover:bg-transparent lg:hover:text-white lg:dark:hover:bg-[#1BC0DE]"
                  >All Books</a
                >
              </li>
              <li>
                <a
                  href="{{ route('category.index') }}"
                  class="lg:dark:hover:[#1BC0DE] block border-b border-gray-100 py-2 pl-3 pr-4 text-gray-700 hover:bg-[#1BC0DE] lg:border-0 lg:p-0 lg:hover:bg-transparent lg:hover:text-white lg:dark:hover:bg-[#1BC0DE]"
                  >Category</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="lg:dark:hover:[#1BC0DE] block border-b border-gray-100 py-2 pl-3 pr-4 text-gray-700 hover:bg-[#1BC0DE] lg:border-0 lg:p-0 lg:hover:bg-transparent lg:hover:text-white lg:dark:hover:bg-[#1BC0DE]"
                  >Publisher</a
                >
              </li>
              <li>
                <a
                  href="#contact"
                  class="lg:dark:hover:[#1BC0DE] block border-b border-gray-100 py-2 pl-3 pr-4 text-gray-700 hover:bg-[#1BC0DE] lg:border-0 lg:p-0 lg:hover:bg-transparent lg:hover:text-white lg:dark:hover:bg-[#1BC0DE]"
                  >Contact</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

