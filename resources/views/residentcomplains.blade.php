	

@foreach($complains as $c)

<h1>{{ $c->res_name}}</h1><small>{{ $c->phn_number }}</small>


@foreach($c->complain as $d)

<p>Complains are : {{ $d['res_complain'] }}</p>


@endforeach

@endforeach