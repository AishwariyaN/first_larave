
<html>

<head>
  
</head>


@include('header')
@include('footer')

    <body>
      @yield('headerhead')
      <br><br>
      <table align="center" style="width:50%" border='1px solid black'>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th> 
        <th>Email</th>
        <th>School Name</th>
        <th>School_Rating</th>
        @if(Auth::id()==1)
        <th>Action</th>
        @endif
      </tr>
     
         @foreach ($query as $q)
          <tr>
            <td>{{ $q->first_name }}</td>
            <td>{{ $q->last_name }}</td>
            <td>{{ $q->email }}</td>
            <td>{{ $q->school_name }}</td>
            <td>{{ $q->school_rating }}</td>
            @if(Auth::id()==1)
            
            <td>
              <a href="{{ url('user/register/edit/'.$q->id) }}"> <i class="fa fa-edit" aria-hidden="true"></i></a>
              <a href="{{ url('user/register/delete/'.$q->id) }}"> <i class="fa fa-trash" aria-hidden="true"></i></a>
            </td>

            @endif
            </tr>
         @endforeach
       
         


    </table>
@yield('footerfoot')
  </body>
</html>