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
                                        onclick="return confirm('¿VAS A ELIMINAR AL OPERADOR CON CEDULA  {{$operator->cedula}}, LOS DATOS ASOCIADOS A ESTE, TAMBIÉN SERÁN ELIMINADOS?')"
                                    ><i class="fas fa-trash-alt text-red-800" style="margin-top: 15px"></i> </i></button>
                                </form>

                                <a href="{{ route('operatordatas.index', $operator)}}"><button type="button" class="text-white col-span-full bg-blue-700 hover:bg-green-500  focus:ring-4 focus:outline-none focus:ring-blue-100 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5
                                    text-center dark:bg-green-700 dark:hover:bg-green-500 dark:focus:ring-blue-100">Ver Datos de Recolección</button>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>