<html>

 <head>
      <title>Form Example</title>
   </head>
   @include('header')
   @include('footer')
      <body>
         @yield('headerhead')
      
	 
       <div class="containerform">

  
         @if (count($errors) > 0)
            <div class = "alert alert-danger">
               <ul>
                  @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
         @endif
     <form action = "/user/register/update" method = "post" id="contact">
         <input type = "hidden" name = "_token" value = "{{ csrf_token() }}">
         <input type = "hidden" name = "id" value = "{{ $queryedit[0]->id }}">
   
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
   
            <div class="row">
               <div class="col-25">
                  <label for="fname">First Name</label>
               </div>
               <div class="col-75">
                  <input type="text" id="fname" name="fname" placeholder="Your name.." value="{{ $queryedit[0]->first_name }}"/>
               </div>
            </div>
            <div class="row">
               <div class="col-25">
                  <label for="lname">Last Name</label>
               </div>
               <div class="col-75">
                  <input type="text" id="lname" name="lname" placeholder="Your last name.." value="{{ $queryedit[0]->last_name }}"/>
               </div>
            </div>
            <div class="row">
               <div class="col-25">
                  <label for="lname">Email Id</label>
               </div>
               <div class="col-75">
                  <input type="text" id="emailid" name="emailid" placeholder="Your email id.."value="{{ $queryedit[0]->email }}"/>
               </div>
            </div>

            <div class="row">
               <div class="col-25">
                  <label for="lname">School Name</label>
               </div>
               <div class="col-75">
                  <input type="text" id="sname" name="sname" placeholder="Your school name.." value="{{ $queryedit[0]->school_name }}"/>
               </div>
            </div>

            <div class="row">
               <div class="col-25">
                  <label for="lname">School Rating</label>
               </div>
               <div class="col-75">
                  <input type="text" id="srating" name="srating" placeholder="Your school Rating.." value="{{ $queryedit[0]->school_rating }}"/>
               </div>
            </div>
            <br>

 
             <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Register</button>             
         
      
      </form>
   </div>
<br></br>
      @yield('footerfoot')
   </body>
</html>
