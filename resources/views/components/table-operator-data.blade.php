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

                        <?php $totalPeso = 0;
                        $totalHoras = 0; ?>
                        @foreach ($operatorDatas as $data)
                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <td class="p-3 px-5">{{ $data->fruit_type }}</td>
                                <td class="p-3 px-5">{{ $data->fruit_weight }}</td>
                                <td class="p-3 px-5">{{ $data->hours_worked }}</td>
                                <td class="p-3 px-5">{{ $data->date_collection->format('d/m/Y') }}</td>
                                <td class="p-3 px-5">{{ $data->observation }}</td>
                                @php
                                    $totalPeso += $data->fruit_weight;
                                    $totalHoras += $data->hours_worked;
                                @endphp
                                @if (Auth::user()->role == 'admin')
                                    <td class="p-3 px-5 flex gap-2">
                                        <a href="{{ route('operatordatas.edit', $data) }}" class="btn btn-xs btn-info">
                                            <i class="far fa-edit text-blue-800" style="margin-top: 15px"></i>
                                        </a>
                                        <form method="POST" action="{{ route('operatordatas.destroy', $data) }}"
                                            style="display: inline">
                                            {{ method_field('DELETE') }}
                                            @csrf
                                            <button class="btn btn-xs btn-danger"
                                                onclick="return confirm('¿ESTÁ SEGURO DE ELIMINAR LA INFORMACIÓN ASOCIADA A ESTE OPERADOR?')"><i
                                                    class="fas fa-trash-alt text-red-800" style="margin-top: 15px"></i>
                                                </i></button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="font-semibold text-gray-900 dark:text-white">
                            <th scope="row" class="px-6 py-3 text-left">Total</th>
                            <td class="px-6 py-3">{{ $totalPeso }}</td>
                            <td class="px-6 py-3">{{ $totalHoras }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
