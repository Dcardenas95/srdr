<div class="container">
    <div class="text-gray-900 bg-gray-200">
        <div class="overflow-auto rounded-lg shadow">
            <table class="w-full text-md bg-white shadow-md rounded mb-4">
                <tbody>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Cedula</th>
                        <th class="text-left p-3 px-5">Nombre</th>
                        <th class="text-left p-3 px-5">Apellido</th>
                        <th class="text-left p-3 px-5">Direccion</th>
                        <th class="text-left p-3 px-5">Telefono</th>
                        <th class="text-left p-3 px-5">Tipo de sangre</th>
                        <th class="text-left p-3 px-5">Fecha de contratacion</th>
                        <th></th>
                    </tr>
                    @foreach ($operators as $operator)
                        <tr class="border-b hover:bg-orange-100 bg-gray-100">
                            <td class="p-3 px-5">{{ $operator->cedula }}</td>
                            <td class="p-3 px-5">{{ $operator->name }}</td>
                            <td class="p-3 px-5">{{ $operator->last_name }}</td>
                            <td class="p-3 px-5">{{ $operator->address }}</td>
                            <td class="p-3 px-5">{{ $operator->phone }}</td>
                            <td class="p-3 px-5">{{ $operator->type_blood }}</td>
                            <td class="p-3 px-5">{{ $operator->date_contract->format('d/m/Y') }}</td>
                            <td class="p-3 px-5 flex gap-2">
                                <a href="{{ route('operators.edit', $operator) }}"
                                class="btn btn-xs btn-info">
                                    <i class="far fa-edit text-blue-800" style="margin-top: 15px"></i>
                                </a> 

                                <form method="POST"
                                    action="{{ route('operators.destroy', $operator) }}"
                                    style="display: inline">
                                    {{ method_field('DELETE') }}
                                    @csrf
                                    <button class="btn btn-xs btn-danger"
                                        onclick="return confirm('¿ Estás seguro de eliminar el operador con cedula {{$operator->cedula}} , si elimina el operador los datos asociados a este seran  eliminados?')"
                                    ><i class="fas fa-trash-alt text-red-800" style="margin-top: 15px"></i> </i></button>
                                </form>

                                <a href="{{ route('operatordatas.index', $operator)}}"><button type="button" class="px-3 py-2 text-xs font-medium text-center
                                 text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 
                                 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700
                                  dark:focus:ring-blue-800">Registrar Datos de recoleccion</button>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>