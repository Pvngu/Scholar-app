<table>
    <thead>
        <tr>
            <th>Departamentos</th>
            @foreach($columns as $column)
                <th>{{ $column }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($departamentos as $departamento)
            <tr>
                <td>{{ $departamento->Departamento }}</td>
                @foreach($columns as $column)
                    <td>{{ $departamento->$column }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>