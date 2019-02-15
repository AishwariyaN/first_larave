<html>
  <div><a href='../user/register/show'>view table</a></div>
@if (count($errors) > 0)
   <div class = "alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
@endif
   <head>
      <title>Form Example</title>
   </head>
   {{--these are comments--}}

   <body>
      <form action = "/user/register" method = "post">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
	
	 
         <table>
            <tr>
               <td>First Name</td>
               <td><input type = "text" name = "fname" /></td>
            </tr>
             <tr>
               <td>Last Name</td>
               <td><input type = "text" name = "lname" /></td>
            </tr>
            <tr>
               <td>Email Id</td>
               <td><input type = "text" name = "emailid" /></td>
            </tr>
            <tr>
               <td>School Name</td>
               <td><input type = "text" name = "sname" /></td>
            </tr>
            <tr>
               <td>School Rating</td>
               <td><input type = "text" name = "srating" /></td>
            </tr>
            <tr>
               <td colspan = "2" align = "center">
		
                  <input type = "submit" value = "Register" />
               </td>
            </tr>
         </table>
      
      </form>
   </body>
</html>
