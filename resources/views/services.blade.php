

{{-- <div class="site-blocks-cover inner-page" style="background-image: url('images/hero_2.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center" data-aos="fade">
    <div class="container">
      <div class="row">

      </div>
    </div>
  </div>

  <div class="custom-border-bottom py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Catalogue</strong></div>
      </div>
    </div>
</div> --}}
    <main class="my-8">
        <div class="container mx-auto px-6">
            <div class="mt-16">
                <h3 class=" flex justify-center text-gray-600 text-2xl font-medium">Produits</h3>
                <div class=" ml-20 grid gap-7 grid-cols- sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                    <!-- Produits boucle-->
                    @foreach ($services as $service)
                    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                        <div class="px-5 py-3">
                            <a href="{{route('services_show', $service->slug )}}"class="text-gray-700 uppercase">{{$service->name}}</a>
                            <span class="text-gray-500 mt-2">{{$service->price}}€</span>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Produits boucle-->
                </div>
            </div>
        </div>
    </main>

    {{-- {{route('services.show')}} --}}
