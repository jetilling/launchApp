<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" media="screen" title="no title" charset="utf-8">
        <title>Launch</title>
    </head>
    <body>
      <div id="root"></div>
      <script>
        window.csrfToken = "{{ csrf_token() }}"
        window.projectDetails = {!! $project !!};
      </script>
      <script src="{{ mix('js/buildConfirm.js') }}"></script>
    </body>
</html>
