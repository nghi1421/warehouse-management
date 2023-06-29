@if(count($users) > 0)
    @foreach($users as $user)
        <tr class="list-group-user">
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone_number }}</td>
        </tr>
    @endforeach
@else
    <li class="list-group-user">No Results Found</li>
@endif