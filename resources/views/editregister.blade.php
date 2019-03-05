<html>
 @include('header')
   @include('footer')
  
 <head>
      <title>Form Example</title>
       <script type="text/javascript" src="{{ URL::asset('js/validateform.js') }}"></script>
   </head>
      <body>
         @yield('headerhead')
      
	 
       <div class="containerform">

  
         @if (count($errors) > 0)
            <div class = "alert alert-danger">
               <ul>
                  @foreach ($errors->all() as $error)
                     <li style="color: red">{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
         @endif
     <form action = "/user/register/update" align="center" method = "post" id="contact" enctype="multipart/form-data">

         <input type = "hidden" name = "_token" value = "{{ csrf_token() }}">
         <input type = "hidden" name = "id" value = "{{ $queryedit[0]->id }}">
            <div class="row">
               <div class="col-25">
                  <label for="disp_img">User Image 
                  </label>
               </div>
               <div class="col-75">
                   <input type="file" name="disp_img" id="disp_img">
                   @if(isset($queryedit[0]->user_image))
                   <img id="blah" height="50" width="50" src="{{asset($queryedit[0]->user_image)}}" alt="your image" />
                   @else
                   <img id="blahs" height="50" width="50" src="" alt="your image" />

                   @endif
               </div>
                
            </div>

       
   
            <div class="row">
               <div class="col-25">
                  <label for="fname">First Name <span style="color:red">*</span></label>
               </div>
               <div class="col-75">
                  <input type="text" id="fname" name="fname" placeholder="Your name.." value="{{ old('fname',$queryedit[0]->first_name) }}"/>
               </div>
            </div>
            <div class="row">
               <div class="col-25">
                  <label for="lname">Last Name</label>
               </div>
               <div class="col-75">
                  <input type="text" id="lname" name="lname" placeholder="Your last name.." value="{{ old('lname',$queryedit[0]->last_name) }}"/>
               </div>
            </div>
            <div class="row">
               <div class="col-25">
                  <label for="lname">Email Id <span style="color:red">*</span></label>
               </div>
               <div class="col-75">
                  <input type="text" id="emailid" name="emailid" placeholder="Your email id.."value="{{ old('emailid',$queryedit[0]->email) }}"/>
               </div>
            </div>

            <div class="row">
               <div class="col-25">
                  <label for="lname">School Name <span style="color:red">*</span></label>
               </div>
               <div class="col-75">
                  <input type="text" id="sname" name="sname" placeholder="Your school name.." value="{{ old('sname',$queryedit[0]->school_name) }}"/>
               </div>
            </div>

            <div class="row">
               <div class="col-25">
                  <label for="lname">School Rating <span style="color:red">*</span></label>
               </div>
               <div class="col-75">
                  <input type="text" id="srating" name="srating" placeholder="Your school Rating.." value="{{ old('srating',$queryedit[0]->school_rating) }}"/>
               </div>
            </div>
            <br>

 
             <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Update</button>             
         
      
      </form>
   </div>
<br></br>
      @yield('footerfoot')
   </body>
</html>
<script type="text/javascript">

$(document).ready(function () {

   $('#blahs').hide();

});

$("#disp_img").change(function() {
  readURL(this);
  $('#blahs').show();
});

function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {

      $('#blah').attr('src', e.target.result);
      $('#blahs').is(":visible")
      { 
       $('#blahs').attr('src', e.target.result);
      }
    }

    reader.readAsDataURL(input.files[0]);
  }
}

</script>

