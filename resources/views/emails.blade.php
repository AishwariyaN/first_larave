<html>
 @include('header')
 @include('footer')
   <head>

      <title>Form Example</title>
         
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
      <form action = "/sendemail" method = "post" align="center" name="contact" id="contact">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
	         

	         <div class="row">
               <div class="col-25">
                  <label for="emailid">Email Id <span style="color:red">*</span></label>
               </div>
               <div class="col-75">
                  <input type="text" id="emailid" name="emailid" placeholder="Your email id..">
               </div>
                <span class="help-block" id="showemailiderr" style="color:red"></span>
            </div>

            <br>
            <button name="contact-submit" type="submit" id="contact-submit">Send Mail</button>          
         
      
      </form>
   </div>
<br></br>
     @yield('footerfoot')
   </body>
</html>


