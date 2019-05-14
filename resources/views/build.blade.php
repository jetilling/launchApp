<!doctype html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="{{ asset('css/reset.css') }}" media="screen" title="no title" charset="utf-8">
      <!-- <link rel="stylesheet" href="./css/buildBasics.css" media="screen" title="no title" charset="utf-8"> -->
      <title>Launch</title>
  </head>
  <body>
      <div id="root"></div>
      <script>
        window.csrfToken = "{{ csrf_token() }}"
      </script>
      <script src="{{ mix('js/buildBasics.js') }}"></script>
  </body>
</html>