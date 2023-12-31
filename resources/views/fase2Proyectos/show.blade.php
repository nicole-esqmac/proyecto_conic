<!--*********************** VISTA MOSTRAR FASE2 PROYECTOS *****************************-->

<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mostrar Fase 2 Proyectos
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('fase2Proyectos.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded" style="background: #6C757D; color:white"><i class="bi bi-backspace-fill"></i> Regresar</a>
            </div>

            <br><br>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Datos responsable proyectos
            </h2>
            <br>
            <table class="min-w-full divide-y divide-gray-200 w-full">
                <tr class="border-b">
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ID
                    </th>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                        {{ $fase2Proyecto->id }}
                    </td>
                </tr>
                <tr class="border-b">
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        NOMBRE DEL RESPONSABLE
                    </th>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                        {{ $fase2Proyecto->responsable_proyecto->nombre }} {{ $fase2Proyecto->responsable_proyecto->apellido }}
                    </td>
                </tr>
                <tr class="border-b">
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        nombre proyecto
                    </th>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                        {{-- SE AGREGA EL 1RO NOMBRE DECLARADO 2DO NOMBRE DE LA TABLA 3RO NOMBRE LA TABLA ROREING 4TO EL COLUMNA QUE DESEA --}}
                        {{ $fase2Proyecto->responsable_proyecto->proyectos->titulo}}
                    </td>
                </tr>

                <tr class="border-b">
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        observacion
                    </th>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                        {{ $fase2Proyecto->observacion }}
                    </td>
                </tr>

            </table>


            <br><br>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Datos de los beneficiarios
            </h2>
            <br>

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead class="table-dark" class="cabecera-tabla">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-s font-medium text-gray-500 uppercase tracking-wider">DPI</th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-s font-medium text-gray-500 uppercase tracking-wider">NOMBRE DEL BENEFICIARIO</th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-s font-medium text-gray-500 uppercase tracking-wider">DIRECCION</th>
                                </thead>
                                <tfoot class="tbody">

                                </tfoot>
                                <tbody>
                                    @foreach ($detalleFase2Proyecto as $dato)

                                        <tr class="border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">{{ $dato->dpi}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">{{ $dato->nombre}} {{ $dato->apellido}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">{{ $dato->direccion}}</td>

                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
