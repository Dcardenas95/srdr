<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel Visualizar Datos de Recolección') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (Auth::user()->role == 'admin')
                        <form action="{{ route('operatordatas.export') }}" method="get">
                            <div class="space-y-4">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4">
                                    <div>
                                        <label for="from_date"
                                            class="block text-sm font-medium leading-5 text-gray-700">
                                            Desde
                                        </label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                            <input id="from_date" name="from_date" type="date"
                                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                value="{{ request('from_date', today()->startOfMonth()->format('Y-m-d')) }}" />
                                            <input type="text" name="cedula" hidden value="{{ $operator->cedula }}">
                                        </div>
                                    </div>

                                    <div>
                                        <label for="to_date" class="block text-sm font-medium leading-5 text-gray-700">
                                            Hasta
                                        </label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                            <input id="to_date" name="to_date" type="date"
                                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                value="{{ request('to_date', today()->endOfMonth()->format('Y-m-d')) }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="space-x-4 flex items-center">
                                    <div class="mt-1 relative rounded-md">
                                        <button type="submit"
                                            class="text-white bg-green-700 hover:bg-green-500 ml-5 m-3 focus:ring-4 focus:ring-green-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                                            Descargar Archivo Excel
                                        </button>
                                    </div>

                                    <div class="mt-1 relative rounded-md">
                                        <div class="inline-flex rounded-md shadow-sm">
                                            <a href="#"
                                                class="text-white bg-red-700 hover:bg-red-500 ml-5 m-3 focus:ring-4 focus:ring-red-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                                                Limpiar Filtros
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <a href="{{ route('operatordatas.create', $operator) }}">
                            <button type="button"
                                class="text-white bg-blue-700 hover:bg-blue-500 x-10 ml-5 m-8 focus:ring-4 focus:ring-blue-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                                Registrar Datos de Recolección
                            </button>
                        </a>
                    @endif
                    <h1 class="text-xl ml-2 font-semibold mb-1 text-gray-900 dark:text-white">Cedula :
                        <span>{{ $operator->cedula }}</span></h1>
                    <h1 class="text-xl ml-2 font-semibold mb-1 text-gray-900 dark:text-white">Nombre :
                        <span>{{ $operator->name }} {{ $operator->last_name }}</span></h1>
                    <x-table-operator-data :operatorDatas="$operatorDatas"></x-table-operator-data>
                    {{ $operatorDatas->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
