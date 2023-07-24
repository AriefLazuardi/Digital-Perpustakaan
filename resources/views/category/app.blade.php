<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F6F6F6]">

  @include('partials.header')
    <section id="home">
      <div class=" lg:flex pt-16 lg:pt-0">
        <div
          class="pt-10 text-center text-xl font-bold text-black lg:text-left lg:text-4xl"
          data-aos="zoom-inf-left"
        >
          <h2 class="px-5 lg:pt-48 lg:pl-36 lg:pr-50 font-extrabold">
          Books are the plane, and the train, and the road. They are the destination, and the journey. They are home.
          </h2>
          <p class="lg:mt-3 font-thin lg:text-xl lg:pl-36">
          -Anna Quindlen
          </p>
        </div>
        <div
          class="mx-auto w-2/3 lg:h-full lg:w-full  items-center justify-center flex lg:pt-16"
          data-aos="zoom-in"
          data-aos-duration="500"
        >
          <img
            class="lg:flex-1 lg:flex-wrap lg:h-3/6 lg:w-3/6"
            src="{{Vite::asset('resources/images/homebook.png')}}"
            alt=""
          />
        </div>
      </div>
    </section>

    <section id="category" class="">
        <div class="w-56 bg-white mx-auto h-10 flex items center justify-center lg:text-2xl font-extrabold relative">
            <h2>Books Category</h2>
        </div>
        <div class="min-h-screen lg:-mt-5 -mt- -mb-60">
            <div class="h-full space-y-4 bg-[#1BC0DE] py-4 lg:flex lg:space-y-0 pt-20 lg:pb-20">
                @foreach ($category as $ct)
                <div class="mx-auto flex h-56 w-40 flex-col rounded-xl bg-white py-2 shadow">
                  <a href="{{route('category.filter',['id'=>$ct->id])}}">
                      <div class="flex object-contain h-44 w-40 mx-auto">
                        <img src="{{asset('cover/'.$ct->file_cover)}}" class="pt-5 mx-auto" alt=""  />
                      </div>
                      <div class="mt-3 h-36">
                        <p class="text-center text-xl font-semibold">{{$ct->category_name}}</p>
                      </div>
                  </a>
                    
                </div>
                @endforeach
             </div>
        </div>
    </section>
    @include('partials.footer')
    @vite('resources/js/script.js')
</body>
</html>