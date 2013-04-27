<h1>Users</h1>
<hr>
@foreach ($users as $user)
<p>
	<b>E-mail: </b>{{$user->email}}<br>
	<b>Created At: </b>{{$user->created_at}}<br>
	<b>Updated At: </b>{{$user->updated_at}}<br>
</p>
@endforeach