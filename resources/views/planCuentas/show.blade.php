<!--*********************** VISTA MOSTRAR PLAN CUENTAS *****************************-->
<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mostrar Plan de Cuentas
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('planCuentas.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded" style="background: #6C757D; color:white"><i class="bi bi-backspace-fill"></i> Regresar</a>
            </div>

            <br><br>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Plan Cuentas
            </h2>

            <br>

            <table class="min-w-full divide-y divide-gray-200 w-full">
                <thead class="table-dark" class="cabecera-tabla">
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-s font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-s font-medium text-gray-500 uppercase tracking-wider">CLASE CUENTA</th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-s font-medium text-gray-500 uppercase tracking-wider">GRUPO CUENTA</th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-s font-medium text-gray-500 uppercase tracking-wider">ESTADO FINANCIERO</th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-s font-medium text-gray-500 uppercase tracking-wider">CODIGO</th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-s font-medium text-gray-500 uppercase tracking-wider">CUENTA</th>
                </thead>
                <tfoot class="tbody">

                </tfoot>
                <tbody>
                        <tr class="border-b">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">{{ $planCuentas->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">{{ $planCuentas->claseCuenta->codigo_cuenta }} {{ $planCuentas->claseCuenta->nombre_cuenta }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">{{ $planCuentas->grupoCuenta->codigo_cuenta }} {{ $planCuentas->grupoCuenta->nombre_cuenta }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">{{ $planCuentas->estadoFinanciero->estadoFinanciero }}
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">{{ $planCuentas->codigo_pc }}
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">{{ $planCuentas->cuenta_pc }}
                        </tr>
                </tbody>
            </table>




            <br><br>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detalle Auxiliar
            </h2>
            <br>

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead class="table-dark" class="cabecera-tabla">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-s font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-s font-medium text-gray-500 uppercase tracking-wider">CODIGO</th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-s font-medium text-gray-500 uppercase tracking-wider">CUENTA</th>
                                </thead>
                                <tfoot class="tbody">

                                </tfoot>
                                <tbody>
                                    @foreach ($detallePlanCuentas as $dato)

                                        <tr class="border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">{{ $dato->id}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">{{ $dato->codigo}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">{{ $dato->cuenta}}</td>

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
