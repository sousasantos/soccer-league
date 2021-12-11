<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Soccer API</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles
  </head>
  <body class="bg-light">
    @include('layout.navbar')

    <div class="container">
        @yield('content')
    </div>
  
    <script src="{{ mix('js/app.js') }}"></script>
    @livewireScripts

    <script type="text/javascript">
      var myModal = new bootstrap.Modal(document.getElementById('team-modal'))
      window.livewire.on('findTeam', () => {
        myModal.show()
      });
  </script>
  </body>
</html>
