<h3>The Paginate Lesson One</h3>
@foreach($users as $user)
    <ul>
        <li>{{$user->name}}  {{$user->email}}</li>
    </ul>

@endforeach
