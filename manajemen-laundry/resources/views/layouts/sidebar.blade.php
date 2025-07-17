<div class="sidebar d-none d-md-block">
    <div class="p-3">
        <h5 class="text-white mb-4">
            <i class="bi bi-house-door"></i> Menu Utama
        </h5>
        
        <nav class="nav flex-column">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            
            <a class="nav-link {{ request()->routeIs('pelanggans.*') ? 'active' : '' }}" href="{{ route('pelanggans.index') }}">
                <i class="bi bi-people"></i> Pelanggan
            </a>
            
            <a class="nav-link {{ request()->routeIs('layanans.*') ? 'active' : '' }}" href="{{ route('layanans.index') }}">
                <i class="bi bi-list-check"></i> Layanan
            </a>
            
            <a class="nav-link {{ request()->routeIs('transaksis.*') ? 'active' : '' }}" href="{{ route('transaksis.index') }}">
                <i class="bi bi-receipt"></i> Transaksi
            </a>
        </nav>
    </div>
</div>

<!-- Mobile Sidebar -->
<div class="collapse d-md-none" id="sidebarMenu">
    <div class="sidebar">
        <div class="p-3">
            <h5 class="text-white mb-4">
                <i class="bi bi-house-door"></i> Menu Utama
            </h5>
            
            <nav class="nav flex-column">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
                
                <a class="nav-link {{ request()->routeIs('pelanggans.*') ? 'active' : '' }}" href="{{ route('pelanggans.index') }}">
                    <i class="bi bi-people"></i> Pelanggan
                </a>
                
                <a class="nav-link {{ request()->routeIs('layanans.*') ? 'active' : '' }}" href="{{ route('layanans.index') }}">
                    <i class="bi bi-list-check"></i> Layanan
                </a>
                
                <a class="nav-link {{ request()->routeIs('transaksis.*') ? 'active' : '' }}" href="{{ route('transaksis.index') }}">
                    <i class="bi bi-receipt"></i> Transaksi
                </a>
            </nav>
        </div>
    </div>
</div> 