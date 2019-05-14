<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/reset.css') }}" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/enterCode.css') }}" media="screen" title="no title" charset="utf-8">
        <title>Launch</title>
    </head>
    <body>
        <div class="main">

          <div class="login-card">
            <div class="inner-card">
              <div class="innermost-card">
        
                <h1 class="title">Before we begin...</h1>

                <form class="enter-code-form" method="POST" action="/enter-code">

                  @csrf
                  <div>
                    <!-- <label for="email">Email</label> -->
                    <input class="form-item-input" placeholder="Email" name="email" value="" />
                  </div>

                  <div>
                    <!-- <label for="first_name">First Name</label> -->
                    <input class="form-item-input" placeholder="First Name" name="first_name" value="" />
                  </div>

                  <div>
                    <!-- <label for="code">Entrance Code</label> -->
                    <input class="form-item-input" placeholder="Entrance Code" name="code" value="" />
                  </div>

                  <!-- <div class="submit-btn-container"> -->
                    <button class="submit-btn" type="submit">Enter</button>
                  <!-- </div> -->
                </form>
              </div>
            </div>
          </div>
        </div>
    </body>
</html>
