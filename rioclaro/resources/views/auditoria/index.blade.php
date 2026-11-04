@extends('layouts.app')

@section('title','Auditoría')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h2>

        Bitácora del Sistema

    </h2>

</div>

<div class="card">

    <div class="card-body">

        <table
            class="table table-sm table-striped">

            <thead>

                <tr>

                    <th>Fecha</th>

                    <th>Usuario</th>

                    <th>Módulo</th>

                    <th>Acción</th>

                    <th>IP</th>

                </tr>

            </thead>

            <tbody>

            @forelse($logs as $log)

                <tr>

                    <td>

                        {{
                            $log->created_at
                        }}

                    </td>

                    <td>

                        {{
                            $log->usuario?->name
                        }}

                    </td>

                    <td>

                        {{
                            $log->modulo
                        }}

                    </td>

                    <td>

                        <span
                           class="badge badge-info">

                            {{
                                $log->accion
                            }}

                        </span>

                    </td>

                    <td>

                        {{ $log->ip }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5">

                        Sin registros

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        {{ $logs->links() }}

    </div>

</div>

@endsection