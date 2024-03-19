<div>
    <div>
        <div class="text-gray-900 bg-gray-200">
            <div class="overflow-auto rounded-lg shadow">
                <table class="w-full text-md bg-white shadow-md rounded mb-4">
                    <tbody>
                        <tr class="border-b">
                            <th class="text-left p-3 px-5">Tipo de Fruta Recolectada</th>
                            <th class="text-left p-3 px-5">Peso de Fruta recolectada [kg]</th>
                            <th class="text-left p-3 px-5">Cant de Horas Trabajadas</th>
                            <th class="text-left p-3 px-5">Fecha de Recolección</th>
                            <th class="text-left p-3 px-5">Observaciones</th>
                            <th></th>
                        </tr>
                        @foreach ($operatorDatas as $data)
                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <td class="p-3 px-5">{{ $data->fruit_type }}</td>
                                <td class="p-3 px-5">{{ $data->fruit_weight }}</td>
                                <td class="p-3 px-5">{{ $data->hours_worked }}</td>
                                <td class="p-3 px-5">{{ $data->date_collection->format('d/m/Y') }}</td>
                                <td class="p-3 px-5">{{ $data->observation }}</td>
                                <td class="p-3 px-5 flex gap-2">
                                    <a href="{{ route('operatordatas.edit', $data) }}" class="btn btn-xs btn-info">
                                        <i class="far fa-edit text-blue-800" style="margin-top: 15px"></i>
                                    </a>
                                    <form method="POST" action="{{ route('operatordatas.destroy', $data) }}"
                                        style="display: inline">
                                        {{ method_field('DELETE') }}
                                        @csrf
                                        <button class="btn btn-xs btn-danger"
                                            onclick="return confirm('¿ Estás seguro de eliminar La informacion  , asociada a este operador?')"><i
                                                class="fas fa-trash-alt text-red-800" style="margin-top: 15px"></i>
                                            </i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
