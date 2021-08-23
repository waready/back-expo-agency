<table>
    <thead>
        <tr>
            @if($nombres == 1)
            <th>Nombres</th>
            @endif
            @if($apellidos == 1)
            <th>Apellidos</th>
            @endif
            @if($dni == 1)
            <th>Dni</th>
            @endif
            @if($celular == 1)
            <th>Celular</th>
            @endif
            @if($email == 1)
            <th>Email</th>
            @endif
            @if($ugel == 1)
            <th>Ugel</th>
            @endif
            @if($rol == 1)
            <th>Rol</th>
            @endif
            @if($nivel == 1)
            <th>Nivel</th>
            @endif
            @if($area == 1)
            <th>Area</th>   
            @endif 
            @if($gestion == 1)
            <th>Gestion</th>
            @endif
            @if($condicion == 1)
            <th>Condicion</th>
            @endif
            @if($cargo == 1)
            <th>Cargo</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            @if($nombres == 1)
            <td>{{$user->nombres}}</td>
            @endif
            @if($apellidos == 1)
            <td>{{$user->apellidos}}</td>
            @endif
            @if($dni == 1)
            <td>{{$user->dni}}</td>
            @endif
            @if($celular == 1)
            <td>{{$user->celular}}</td>
            @endif
            @if($email == 1)
            <td>{{$user->email}}</td>
            @endif
            @if($ugel == 1)
            <td>{{$user->nombre}}</td>
            @endif
            @if($rol == 1)
            <td>{{$user->participante}}</td>
            @endif
            @if($nivel == 1)
            <td>{{$user->Nivel}}</td>
            @endif
            @if($area == 1)
            <td>{{$user->Area}}</td>
            @endif 
            @if($gestion == 1)
            <td>{{$user->Gestion}}</td>
            @endif
            @if($condicion == 1)
            <td>{{$user->condicion}}</td>
            @endif
            @if($cargo == 1)
            <td>{{$user->cargo}}</td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>