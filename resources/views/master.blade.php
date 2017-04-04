
<!DOCTYPE html>

<html>

<head>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width ,initial-scale=1.0">
    <title>Fitness tracker</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/allCustomCSS.css')}}">

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/allCustom.js')}}"></script>
    <script src="{{asset('js/third-party-modules.js')}}"></script>


</head>

<body>


    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-sm-12 header">

              @include('components.misc.header')



            </div>

        </div>

        <div class="row">


          <div class="col-lg-3 col-sm-12 panel">





            @yield('left_panel')


          </div>


            <div class="content col-lg-9 col-sm-12">

                  @yield('content')

            </div>

        </div>




    </div>

@yield('test')


</body>

</html>
