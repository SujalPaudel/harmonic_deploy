  @extends('layouts.frontLayout.front_design')
@section('content')

  <section id="form" style="margin-top: 100px;"><!--form-->
    <div class="container">
      <div class="row">


        <div class="col-sm-4">
          <div class="signup-form"><!--sign up form-->


            <h2>New User Signup!</h2>
            <form id="registerForm" name="registerForm" action="{{url('/user-register')}}" method = "post" required autocomplete="off">{{ csrf_field() }}
              <input name = "name" id = "name" type="text" placeholder="First Name"/>
              <input name = "last_name" id = "last_name" type="text" placeholder="Second Name"/>

              <input name = "email" id = "email" type="email" placeholder="Email Address"/>
              <input name = "password" id = "myPassword" type="password" placeholder="Password"/>
              <button type="submit" class="btn btn-default">Signup</button>
            </form>
          </div><!--/sign up form-->
        </div>
        </div>
        </div>
        </section>
        @endsection