<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"
      name="viewport"
    />
    <title>OpenPantau &mdash; SID</title>

    @include('layouts.app.stylesheet')

    @include('layouts.app.js')
    
    <!-- Start GA -->
    <script
      async
      src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"
    ></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());

      gtag("config", "UA-94034622-3");
    </script>
   
   
  </head>

  <body>
    <div id="app">
      <div class="main-wrapper main-wrapper-1">
       
       @include('layouts.app.navbar')

       @include('layouts.app.sidebar')    

       @include('layouts.app.content')    
               
       @include('layouts.app.footer')

      </div>
    </div>
  </body>

</html>
