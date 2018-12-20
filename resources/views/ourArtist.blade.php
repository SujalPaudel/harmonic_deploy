@extends('layouts.frontLayout.front_design')
@section('content')

<div class="container">
  <div class="row">

      <div class="col-sm-12">
        <div class = "head_content">

         <h2 style="text-transform: uppercase;">Our Artists</h2> 
            <hr style="border-top: 2px solid #8c8b8b;"> 
                      

            @foreach($interviews as $interview)

              <div class = "col-sm-6" style="margin-bottom: 10px;">
                <img src = "{{url('/images/backend_images/artist/'.$interview->artist_image)}}" width="100%" height="350px" style="border-radius: 5px;">
              </div>
            @endforeach

        </div>  
      </div>

  </div>
</div>


@endsection

      