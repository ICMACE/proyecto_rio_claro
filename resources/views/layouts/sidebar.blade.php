<div class="sidebar">

    <ul class="nav flex-column">

        <li class="nav-item">
            <a href="{{ route('dashboard') }}"
               class="nav-link">
                <span class="material-icons mr-2">
                    dashboard
                </span>
                Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('productos.index') }}"
               class="nav-link">
                <span class="material-icons mr-2">
                    inventory_2
                </span>
                Productos
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('proveedores.index') }}"
               class="nav-link">
                <span class="material-icons mr-2">
                    business
                </span>
                Proveedores
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('facturas.index') }}"
               class="nav-link">
                <span class="material-icons mr-2">
                    receipt_long
                </span>
                Facturas
            </a>
        </li>
        <li class="nav-item">

            <a href="{{ route('auditoria.index') }}"
            class="nav-link">

                <span class="material-icons mr-2">

                    history

                </span>

                Auditoría

            </a>

        </li>
        <li class="nav-item">

            <a href="{{ route('movimientos.index') }}"
            class="nav-link">

                <span class="material-icons mr-2">

                    swap_horiz

                </span>

                Movimientos

            </a>

        </li>
        <li class="nav-item">

            <a href="{{ route('agente.index') }}"
            class="nav-link">

                <span class="material-icons mr-2">
                    smart_toy
                </span>

                Asistente IA

            </a>

        </li>
        <li class="nav-item">

            <a href="{{ route('agente.voz') }}"
            class="nav-link">

                <span class="material-icons mr-2">
                    keyboard_voice
                </span>

                Asistente Voz

            </a>

        </li>
    </ul>

</div>