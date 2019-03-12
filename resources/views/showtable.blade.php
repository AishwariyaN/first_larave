
<html>

<head>
  
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
.alert {
  padding: 15px;
  background-color: #f44336;
  color: white;
  margin-bottom: 10px;
}

.success {
  padding: 20px;
  background-color: #32843e;
  color: white;
  margin-bottom: 10px;
}
</style>
</head>
 
@include('header')
@include('footer')
  <body>
      @yield('headerhead')
      <br><br>
  

@if(session()->get('successmsg') == "success")
  <div class="success" style="width:65%;margin-left:18%">
    <strong>Success!</strong> Data saved succesfully.
  </div>
@elseif(session()->get('successmsg') == "failure")
<div class="alert" style="width:65%;margin-left:18%">
    <strong>Error!</strong> Your data could not be saved
  </div>
@endif  
    <table align="center" style="width:50%" border='1px solid black'>
      <tr>
        <th>User Profile</th>
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

            @if(isset($q->user_image))
            <td><img height='50' width="50" src="{{ asset($q->user_image) }}" ></td>
            @else
            
             <td><img height='50' width="50" src="{{ asset('storage/uploads/user.png')}}"" ></td>
            @endif
            <td>{{ $q->first_name }}</td>
            <td>{{ $q->last_name }}</td>
            <td>{{ $q->email }}</td>
            <td>{{ $q->school_name }}</td>
            <td>{{ $q->school_rating }}</td>
            @if(Auth::id()==1)
            
            <td>
              <a href="{{ url('user/register/edit/'.$q->id) }}"> <i class="fa fa-edit" aria-hidden="true"></i></a>
              <a href="javascript:void(0);" onclick="deleterow({{$q->id}},'{{$q->user_image}}')"> <i class="fa fa-trash" aria-hidden="true"></i></a>
              <!-- {{ url('user/register/delete/'.$q->id) }} -->
            </td>

            @endif
            </tr>
         @endforeach

    </table>
          <div align="center">
            {{ $query->links() }}
          </div>
          <br><br><br>
          @yield('footerfoot')
  </body>
</html>
<script language='javascript'>

  function deleterow(id,user_image)
  {
    //alert('check');
        var check="{{ url('user/register/delete') }}";
   // alert(check);
    var conf=confirm("Are you sure you want to delete this record?");
    if(conf)
    {
     // alert('hi');
    // debugger;
      var delid=id;
        $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            type: "POST",
            url: check,
            data: {"id":delid,"img":user_image},
            success: function(result){
//alert(result);
              if(result=='true')
              {
                location.reload();
              }
              console.log(result);
            }
        });
    }
  }

</script>