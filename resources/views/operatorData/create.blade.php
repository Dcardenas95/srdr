<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               
                <form  method="POST" action="{{ route('operatordatas.store') }}">
                    @csrf
                    <a href="{{ route('operatordatas.index', $operator)}}">
                        <button type="button" class="text-white bg-green-400 hover:bg-green-500 ml-5 m-2 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                            Home
                        </button>
                    </a>
                    <div class="grid gap-6 mb-6 md:grid-cols-2 p-5">
                        <input
                        name="operator_id"
                        value="{{ $operator->id }}"
                        hidden
                        required />
                        <h1 class="block mb-2 text-xl font-medium text-gray-900">Cedula: {{ $operator->cedula }} </h1>
                        <h1 class="block mb-2 text-xl font-medium text-gray-900">Nombre: {{ $operator->name }} {{ $operator->last_name }}</h1>
                        <div>
                            <label for="countries"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Frutas
                            </label>
                            <select
                                name="fruit_type"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Tipo de fruta recolectada</option>
                                <option value="Banano">Bananos</option>
                                <option value="Manzanas">Manzanas</option>
                                <option value="Naranjas">Naranjas</option>
                                <option value="Limones">Limones</option>
                            </select>
                        </div>
                        <div>
                            <label 
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Peso de la fruta</label>
                            <input type="number"
                                name="fruit_weight"
                                placeholder="[kg]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div>
                            <label for="company"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de recolección</label>
                            <input type="date" id="company"
                                name="date_collection"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div>
                            <label 
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Horas trabajadas</label>
                            <input type="number"
                                name="hours_worked"
                                placeholder="[Horas]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div>
                            <label for="message"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Observaciones</label>
                            <textarea  rows="4"
                                name="observation"
                                placeholder="¡Si no hay observaciones¡ ESCRIBA Sin Observaciones"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        </div>
                        <div class="col-span-2">
                            <button type="submit"
                            class="text-white bg-gradient-to-r w-full from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 
                            focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                            >Crear Datos de Recolección</button>
                        </div>
                        
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
