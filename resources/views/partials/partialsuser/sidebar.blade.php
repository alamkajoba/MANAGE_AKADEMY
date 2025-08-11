<ul style="background-color: rgb(7, 7, 99)" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('registration.index')}}">
                <div class="sidebar-brand-icon rotate-n-0">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div style="color:white;" class="sidebar-brand-text mx-3">Manage Akademy </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('registration.index')}}">
                    <i style="color:white;" class="fas fa-fw fa-tachometer-alt"></i>
                    <span style="color:white;">Acceuil</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div style="color:white;" class="sidebar-heading">
                Interface
            </div>

            {{-- registration manage--}}
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseregistration"
                    aria-expanded="true" aria-controls="collapseregistration">
                    <i style="color:white;" class="fas fa-fw fa-users"></i>
                    <span style="color:white;">Gestion des élèves</span>
                </a>
                <div id="collapseregistration" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 style="color:black;" class="collapse-header">Gestion des élèves:</h6>
                        <a style="color:black;" class="collapse-item" href="{{route('registration.index')}}">Liste des élèves</a>
                        <a style="color:black;" class="collapse-item" href="{{route('registration.create')}}">Inscription</a>
                        <a style="color:black;" class="collapse-item" href="{{route('reregistration.create')}}">Reinscription</a>
                    </div>
                </div>
            </li>

            {{-- Billing manage --}}
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBilling"
                    aria-expanded="true" aria-controls="collapseBilling">
                    <i style="color:white;" class="fas fa-cog"></i>
                    <span style="color:white;">Gestion des paiements</span>
                </a>
                <div id="collapseBilling" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 style="color:black;" class="collapse-header">Payement des frais:</h6>
                        <a style="color:black;" class="collapse-item" href="{{route('payment.create')}}">Effectuer un paiement</a>
                        <a style="color:black;" class="collapse-item" href="{{route('payment.create')}}">Payement des arriérés</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRecovery"
                    aria-expanded="true" aria-controls="collapseRecovery">
                    <i style="color:white;" class="fas fa-cog"></i>
                    <span style="color:white;">Gestion des recouvrements</span>
                </a>
                <div id="collapseRecovery" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 style="color:black;" class="collapse-header">Recouvrements:</h6>
                        <a style="color:black;" class="collapse-item" href="{{route('recovery.create')}}">Imprimer les listes</a>
                        <a style="color:black;" class="collapse-item" href="{{route('recovery.print')}}">listes des eleves en ordre</a>
                    </div>
                </div>
            </li>
                       
            {{-- <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i style="color:white;" class="fas fa-fw fa-chart-area"></i>
                    <span style="color:white;">Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i style="color:white;" class="fas fa-fw fa-table"></i>
                    <span style="color:white;">Tables</span></a>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>