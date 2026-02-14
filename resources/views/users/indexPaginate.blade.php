<h1>The Paginate Lesson One</h1>
@foreach($users as $user)
    <ul>
        <li>{{$user->name}}  {{$user->email}}</li>
    </ul>

@endforeach
