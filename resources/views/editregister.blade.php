<html>

 <head>
      <title>Form Example</title>
   </head>
   {{--these are comments--}}

   <body>
      <form action = "/user/register/update" method = "post">
         <input type = "hidden" name = "_token" value = "{{ csrf_token() }}">
         <input type = "hidden" name = "id" value = "{{ $queryedit[0]->id }}">
	
	 
         <table>
            <tr>
               <td>First Name</td>
               <td><input type = "text" name = "fname" value="{{ $queryedit[0]->first_name }}"/></td>
            </tr>
             <tr>
               <td>Last Name</td>
               <td><input type = "text" name = "lname" value="{{ $queryedit[0]->last_name }}"/></td>
            </tr>
            <tr>
               <td>Email Id</td>
               <td><input type = "text" name = "emailid" value="{{ $queryedit[0]->email }}"/></td>
            </tr>
            <tr>
               <td>School Name</td>
               <td><input type = "text" name = "sname" value="{{ $queryedit[0]->school_name }}"/></td>
            </tr>
            <tr>
               <td>School Rating</td>
               <td><input type = "text" name = "srating" value="{{ $queryedit[0]->school_rating }}"/></td>
            </tr>
            <tr>
               <td colspan = "2" align = "center">
		
                  <input type = "submit" value = "Update" />
               </td>
            </tr>
         </table>
      
      </form>
   </body>
</html>
