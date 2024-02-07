<!-- component -->
<!-- follow me on twitter @asad_codes -->

    <section class="relative mx-auto">
        <!-- navbar -->
      <nav class="flex justify-between bg-amber-500 text-white w-screen">
        <div class="px-5 xl:px-12 py-6 flex w-full items-center">
            <img src="cookie-svgrepo-com.svg" alt="un triangle aux trois côtés égaux" class="h-20" width="100px" />
            <a href="{{route('home.index')}}" class=" ml-10 text-3xl font-bold font-heading">Cookie Island 974</a>
          <!-- Nav Links -->
          <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
            <li><a class="mt-3 text-gray-200 hover:underline sm:mx-3 sm:mt-0" href="{{route('home.index')}}">Accueil</a></li>
            <li><a class="mt-3 text-gray-200 hover:underline sm:mx-3 sm:mt-0" href="{{route('products.index') }}">Produits</a></li>
            <li><a class="mt-3 text-gray-200 hover:underline sm:mx-3 sm:mt-0" href="#">Contact</a></li>
          </ul>
          <!-- Header Icons -->
          <div class="hidden xl:flex items-center space-x-5 items-center">
            <a class="flex items-center hover:text-gray-200" href="{{route('checkout.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
               @if (!Cart::isEmpty())
                <span class="flex absolute -mt-5 ml-4">
                    <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{$cartTotalQuantity }}</span>
                </span>
               @endif
            </a>
            <!-- Sign In / Register  -->
            <a class="flex items-center hover:text-gray-200" href="{{route('login.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </a>
          </div>
        </div>
        <!-- Responsive navbar -->
        <a class="xl:hidden flex mr-6 items-center" href="{{route("checkout.index")}}">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          @if (!Cart::isEmpty())
          <span class="flex absolute -mt-5 ml-4">
            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{$cartTotalQuantity}}</span>
          </span>
          @endif
        </a>
        <button class="navbar-burger self-center mr-12 xl:hidden" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
      </nav>
    </section>



