<h4>Contact:</h4>

<p>{{ $data->name }}, {{ $data->phone }}, {{ $data->email }}</p>

<br>
<p>-----<br>{{ \Carbon\Carbon::now()->formatLocalized('%d %B %Y') }}</p>