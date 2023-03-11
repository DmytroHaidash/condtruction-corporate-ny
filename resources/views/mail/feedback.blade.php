<h4>Contact:</h4>

<p>{{ $data->name }}, {{ $data->phone }}, {{ $data->email }}</p>
<p>Message</p>
<p>{{$data->message}}</p>

<br>
<p>-----<br>{{ \Carbon\Carbon::now()->formatLocalized('%d %B %Y') }}</p>