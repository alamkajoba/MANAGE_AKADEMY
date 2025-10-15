<ul style="background-color: rgb(7, 7, 99)" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('user.index')}}">
                <div class="sidebar-brand-icon rotate-n-0">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div style="color:white;" class="sidebar-brand-text mx-3">Manage Akademy </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.index')}}">
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
                        <a style="color:black;" class="collapse-item" href="{{route('registration.indexadmin')}}">Liste des élèves</a>
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
                    </div>
                </div>
            </li>
                        
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div style="color:white;" class="sidebar-heading">
                Interface
            </div>


            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                    aria-expanded="true" aria-controls="collapseUsers">
                    <i style="color:white;" class="fas fa-fw fa-wrench"></i>
                    <span style="color:white;">Gestion des utilisateurs</span>
                </a>
                <div id="collapseUsers" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 style="color:black;" class="collapse-header">Gestion des Utilisateurs:</h6>
                        <a style="color:black;" class="collapse-item" href="{{route('user.index')}}">Liste</a>
                        <a style="color:black;" class="collapse-item" href="{{route('user.create')}}">Ajouter</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFees"
                    aria-expanded="true" aria-controls="collapseFees">
                    <i style="color:white;" class="fas fa-fw fa-wrench"></i>
                    <span style="color:white;">Gestion des frais</span>
                </a>
                <div id="collapseFees" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 style="color:black;" class="collapse-header">Gestion des frais:</h6>
                        <a style="color:black;" class="collapse-item" href="{{route('fees.index')}}">Liste</a>
                        <a style="color:black;" class="collapse-item" href="{{route('fees.create')}}">Ajouter</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClasses"
                    aria-expanded="true" aria-controls="collapseClasses">
                    <i style="color:white;" class="fas fa-fw fa-wrench"></i>
                    <span style="color:white;">Gestion Année Scolaire</span>
                </a>
                <div id="collapseClasses" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 style="color:black;" class="collapse-header">Gestion :</h6>
                        <a style="color:black;" class="collapse-item" href="{{ route('admin.academic')}}">Année Scolaire</a>
                        <a style="color:black;" class="collapse-item" href="{{route('admin.classes')}}">Classes</a>
                        <a style="color:black;" class="collapse-item" href="{{route('admin.faculty')}}">Options</a>
                    </div>
                </div>
            </li>
                <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFinance"
                    aria-expanded="true" aria-controls="collapseFinance">
                    <i style="color:white;" class="fas fa-cog"></i>
                    <span style="color:white;">Gestion Finance</span>
                </a>
                <div id="collapseFinance" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 style="color:black;" class="collapse-header">Finance:</h6>
                        <a style="color:black;" class="collapse-item" href="{{route('finance.create')}}">Enregistrer depenses</a>
                        <a style="color:black;" class="collapse-item" href="{{route('finance.index')}}">Voir inventaire</a>
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