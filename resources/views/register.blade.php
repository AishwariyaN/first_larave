<html>
 @include('header')
 @include('footer')
   <head>
      <style>

      </style>

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
      <form action = "/user/register" method = "post" align="center" name="contact" id="contact" enctype="multipart/form-data">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
	         <div class="row">
               <div class="col-25">
                  <label for="disp_img">User Image 
                  </label>
               </div>
               <div class="col-75">
                   <input type="file" name="disp_img" id="disp_img">
                   <img id="blah" height="50" width="50" src="#" alt="your image" />
               </div>
                
            </div>

	         <div class="row">
               <div class="col-25">
                  <label for="fname">First Name <span style="color:red">*</span></label>
               </div>
               <div class="col-75">
                  <input type="text" id="fname" name="fname" placeholder="Your name..">
               </div>
               <span class="help-block" id="showfnameerr" style="color:red"></span>
            </div>
            <div class="row">
               <div class="col-25">
                  <label for="lname">Last Name</label>
               </div>
               <div class="col-75">
                  <input type="text" id="lname" name="lname" placeholder="Your last name..">
               </div>
                <span class="help-block" id="showlnameerr" style="color:red"></span>
            </div>
            <div class="row">
               <div class="col-25">
                  <label for="emailid">Email Id <span style="color:red">*</span></label>
               </div>
               <div class="col-75">
                  <input type="text" id="emailid" name="emailid" placeholder="Your email id..">
               </div>
                <span class="help-block" id="showemailiderr" style="color:red"></span>
            </div>

            <div class="row">
               <div class="col-25">
                  <label for="sname">School Name <span style="color:red">*</span></label>
               </div>
               <div class="col-75">
                  <input type="text" id="sname" name="sname" placeholder="Your school name..">
               </div>
                <span class="help-block" id="showsnameerr" style="color:red"></span>
            </div>

            <div class="row">
               <div class="col-25">
                  <label for="srating">School Rating <span style="color:red">*</span></label>
               </div>
               <div class="col-75">
                  <input type="text" id="srating" name="srating" placeholder="Your school Rating..">
               </div>
                <span class="help-block" id="showsratingerr" style="color:red"></span>
            </div>
            <br>
            <button name="contact-submit" type="submit" id="contact-submit">Register</button>          
         
      
      </form>
   </div>
<br></br>
     @yield('footerfoot')
   </body>
</html>
<script type="text/javascript">

$(document).ready(function () {

   $('#blah').hide();
});

$("#disp_img").change(function() {
  readURL(this);
  $('#blah').show();
});

function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

</script>
