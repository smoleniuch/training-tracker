
<!DOCTYPE html>

<html>

<head>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width ,initial-scale=1.0">
    <title>Fitness tracker</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom-css.css')}}">

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


            @if(session()->has('success'))

              <div class="alert alert-success fade in">

                  <a href="" class="close" data-dismiss="alert">&times;</a>

                  {{session()->get('success','')}}


              </div>

            @endif


            @yield('left_panel')


          </div>


            <div class="content col-lg-9 col-sm-12">

                  @yield('content')

            </div>

        </div>




    </div>



<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/bootstrap-filestyle.min.js')}}"></script>
</body>

</html>
