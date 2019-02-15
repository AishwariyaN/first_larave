<html>
<head></head>
    <body>
      <table style="width:50%" border='1px solid black'>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th> 
        <th>Email</th>
        <th>School Name</th>
        <th>School_Rating</th>
        <th>Action</th>
      </tr>
     
         @foreach ($query as $q)
          <tr>
            <td>{{ $q->first_name }}</td>
            <td>{{ $q->last_name }}</td>
            <td>{{ $q->email }}</td>
            <td>{{ $q->school_name }}</td>
            <td>{{ $q->school_rating }}</td>
            <td><a href="{{ url('user/register/edit/'.$q->id) }}">Edit</a>
                <a href="{{ url('user/register/delete/'.$q->id) }}">Delete</a></td>
            </tr>
         @endforeach
       
      
   <div><a href='../../register'>Back</a></div>

    </table>
  </body>
</html>