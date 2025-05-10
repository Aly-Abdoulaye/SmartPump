
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <img src="{{ asset('img/Logo.png') }}" alt="Logo" id="Logo" style="width: 227px; height: 66px; margin: 20px;">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

        

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('Dashboard.index') }}"  data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <img src="{{ asset('img/icons/grid-4.png') }}" alt="">
                    <span>Tableau de bord </span>
                </a>
            </li>
            <!-- Nav Item - Compagnies --> 
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <img src="{{ asset('img/icons/compagnie.png') }}" alt="">
                    <span>Compagnies</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class=" py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion des compagnies</h6>
                        <a class="collapse-item" href="{{ route('compagnie.create') }}">Ajouter compagnie</a>
                        <a class="collapse-item" href="{{ route('compagnie.index') }}">Listes de compagnies</a>
                    </div>
                </div>

            <!-- Nav Item - stations -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <img src="{{ asset('img/icons/gas-station (2) 1.png') }}" alt="">
                    <span>Stations</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class=" py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion des stations</h6>
                        <a class="collapse-item" href="{{ route('stations.create') }}">Ajouter stations</a>
                        <a class="collapse-item" href="{{ route('stations.index') }}">Tous les stations</a>
                        <h6 class="collapse-header">Gestion des cuves</h6>
                        <a class="collapse-item" href="#">Ajouter cuve</a>
                        
                    </div>
                </div>
            </li>

       
            <!-- Nav Item - Utilisateurs -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <img src="{{ asset('img/icons/users.png') }}" alt="">
                    <span>Utilisateurs</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class=" py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion des utilistateurs</h6>
                        <a class="collapse-item" href="{{ route('users.index') }}">Listes de utilisateurs</a>
                        <a class="collapse-item" href="#">Rôles et Permission</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - carburants -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCarburant"
                aria-expanded="true" aria-controls="collapseCarburant">
                    <img src="{{ asset('img/icons/station 1.png') }}" alt=""> 
                    <span>Carburants</span></a>
                
                
                
            </li>
            <!-- Nav Item -Fournisseurs -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#"  data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <img src="{{ asset('img/icons/parcelle.png') }}" alt="">
                    <span>Fournisseurs</span>
                </a>
            </li>
            <!-- Nav Item - Client -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#"  data-toggle="collapse" data-target="#collapsePages1"
                    aria-expanded="true" aria-controls="collapsePages1">
                    <img src="{{ asset('img/icons/poignee-de-main.png') }}" alt="">
                    <span>Clients</span>
                </a>
                <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class=" py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion des clients</h6>
                        <a class="collapse-item" href="{{ route('clients.create') }}">Ajouter un client</a>
                        <a class="collapse-item" href="{{ route('clients.index') }}">Listes de clients</a>
                        <a class="collapse-item" href="{{ route('bons.index') }}">Bons d'achat</a>
                        <a class="collapse-item" href="{{ route('factures.generate') }}">Factures</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item -Historiques -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#"  data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <img src="{{ asset('img/icons/archiver (1).png') }}" alt="">
                    <span>Historiques </span>
                </a>
            </li>
            <!-- Nav Item - Rapports -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#"data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                    <img src="{{ asset('img/icons/report 1.png') }}" alt="">
                    <span>Rapports</span></a>
            </li>
            <!-- Paramètre -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                    <img src="{{ asset('img/icons/settings.png') }}" alt="">
                    <span>Paramètre</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>