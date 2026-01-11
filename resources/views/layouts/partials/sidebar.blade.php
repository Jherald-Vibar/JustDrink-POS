<style>
    /* Default styles for links */
    .nav-link {
        display: flex;
        align-items: center;
        color: white;
        text-decoration: none;
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    /* Hover effect */
    .gradient-hover:hover {
        background-image: linear-gradient(to right, #D9A372 12%, #DBA677 17%, #EDCCB0 69%, #F6E4D5 88%, #F5F5F5 93%);
        color: #003c2f;
    }

    /* Remove gradient and revert color on mouse out */
    .gradient-hover {
        background-image: none;
        color: white;
    }
</style>

<aside class="main-sidebar sidebar-dark-green elevation-4" style="background-color: #003c2f; ">
    <!-- Sidebar Image (Added at the top) -->
    <div class="sidebar-image">
        <img src="{{ asset('images/lugu.png') }}" alt="Sidebar Image" style="width: 100%; height: auto; ">
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel  pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth()->user()->getAvatar() }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->getFullname() }}</a>
                <h6 style="color: white">{{auth()->user()->role}}</h6>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu" style="list-style: none; padding: 0;">
                @if(auth()->user()->role === 'admin')
                <li class="nav-item" style="margin-bottom: 5px;">
                    <a href="{{ route('home') }}" class="nav-link" style="display: flex; align-items: center; color: white; text-decoration: none; padding: 10px; border-radius: 5px; transition: background-color 0.3s, color 0.3s;"
                        onmouseover="this.style.backgroundImage='linear-gradient(to right, #D9A372 12%, #DBA677 17%, #EDCCB0 69%, #F6E4D5 88%, #F5F5F5 93%)'; this.style.color='#003c2f';"
                        onmouseout="this.style.backgroundImage='none'; this.style.color='white';"
                        onfocus="this.style.backgroundImage='linear-gradient(to right, #D9A372 12%, #DBA677 17%, #EDCCB0 69%, #F6E4D5 88%, #F5F5F5 93%)'; this.style.color='#003c2f';"
                        onblur="this.style.backgroundImage='none'; this.style.color='white';">
                        <i class="fas fa-th" style="margin-right: 10px; color: #ffc107;"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item" style="margin-bottom: 5px;">
                    <a href="{{ route('products.index') }}" class="nav-link" style="display: flex; align-items: center; color: white; text-decoration: none; padding: 10px; border-radius: 5px; transition: background-color 0.3s;"
                        onmouseover="this.style.backgroundImage='linear-gradient(to right, #D9A372 12%, #DBA677 17%, #EDCCB0 69%, #F6E4D5 88%, #F5F5F5 93%)'; this.style.color='#003c2f';"
                        onmouseout="this.style.backgroundImage='none'; this.style.color='white';"
                        onfocus="this.style.backgroundImage='linear-gradient(to right, #D9A372 12%, #DBA677 17%, #EDCCB0 69%, #F6E4D5 88%, #F5F5F5 93%)'; this.style.color='#003c2f';"
                        onblur="this.style.backgroundImage='none'; this.style.color='white';">
                        <i class="fas fa-gift" style="margin-right: 10px; color: #ffc107;"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item" style="margin-bottom: 5px;">
                    <a href="{{ route('orders.index') }}" class="nav-link" style="display: flex; align-items: center; color: white; text-decoration: none; padding: 10px; border-radius: 5px; transition: background-color 0.3s;"
                        onmouseover="this.style.backgroundImage='linear-gradient(to right, #D9A372 12%, #DBA677 17%, #EDCCB0 69%, #F6E4D5 88%, #F5F5F5 93%)'; this.style.color='#003c2f';"
                        onmouseout="this.style.backgroundImage='none'; this.style.color='white';"
                        onfocus="this.style.backgroundImage='linear-gradient(to right, #D9A372 12%, #DBA677 17%, #EDCCB0 69%, #F6E4D5 88%, #F5F5F5 93%)'; this.style.color='#003c2f';"
                        onblur="this.style.backgroundImage='none'; this.style.color='white';">
                        <i class="fas fa-chart-line" style="margin-right: 10px; color: #ffc107;"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li class="nav-item" style="margin-bottom: 5px;">
                    <a href="{{ route('settings.index') }}" class="nav-link" style="display: flex; align-items: center; color: white; text-decoration: none; padding: 10px; border-radius: 5px; transition: background-color 0.3s;"
                        onmouseover="this.style.backgroundImage='linear-gradient(to right, #D9A372 12%, #DBA677 17%, #EDCCB0 69%, #F6E4D5 88%, #F5F5F5 93%)'; this.style.color='#003c2f';"
                        onmouseout="this.style.backgroundImage='none'; this.style.color='white';"
                        onfocus="this.style.backgroundImage='linear-gradient(to right, #D9A372 12%, #DBA677 17%, #EDCCB0 69%, #F6E4D5 88%, #F5F5F5 93%)'; this.style.color='#003c2f';"
                        onblur="this.style.backgroundImage='none'; this.style.color='white';">
                        <i class="fas fa-cog" style="margin-right: 10px; color: #ffc107;"></i>
                        <p>Settings</p>
                    </a>
                </li>
                @else
                <li class="nav-item" style="margin-bottom: 5px;">
                    <a href="{{ route('cart.index') }}" class="nav-link" style="display: flex; align-items: center; color: white; text-decoration: none; padding: 10px; border-radius: 5px; transition: background-color 0.3s;"
                        onmouseover="this.style.backgroundImage='linear-gradient(to right, #D9A372 12%, #DBA677 17%, #EDCCB0 69%, #F6E4D5 88%, #F5F5F5 93%)'; this.style.color='#003c2f';"
                        onmouseout="this.style.backgroundImage='none'; this.style.color='white';"
                        onfocus="this.style.backgroundImage='linear-gradient(to right, #D9A372 12%, #DBA677 17%, #EDCCB0 69%, #F6E4D5 88%, #F5F5F5 93%)'; this.style.color='#003c2f';"
                        onblur="this.style.backgroundImage='none'; this.style.color='white';">
                        <i class="fas fa-cash-register" style="margin-right: 10px; color: #ffc107;"></i>
                        <p>POS System</p>
                    </a>
                </li>
                <li class="nav-item" style="margin-bottom: 5px;">
                    <a href="{{ route('customers.index') }}" class="nav-link" style="display: flex; align-items: center; color: white; text-decoration: none; padding: 10px; border-radius: 5px; transition: background-color 0.3s;"
                        onmouseover="this.style.backgroundImage='linear-gradient(to right, #D9A372 12%, #DBA677 17%, #EDCCB0 69%, #F6E4D5 88%, #F5F5F5 93%)'; this.style.color='#003c2f';"
                        onmouseout="this.style.backgroundImage='none'; this.style.color='white';"
                        onfocus="this.style.backgroundImage='linear-gradient(to right, #D9A372 12%, #DBA677 17%, #EDCCB0 69%, #F6E4D5 88%, #F5F5F5 93%)'; this.style.color='#003c2f';"
                        onblur="this.style.backgroundImage='none'; this.style.color='white';">
                        <i class="fas fa-user" style="margin-right: 10px; color: #ffc107;"></i>
                        <p>Customers</p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{route('logouts')}}" class="nav-link" style="display: flex; align-items: center; color: white; text-decoration: none; padding: 10px; border-radius: 5px; transition: background-color 0.3s;"
                        onclick="document.getElementById('logout-form').submit()"
                        onmouseover="this.style.backgroundImage='linear-gradient(to right, #D9A372 12%, #DBA677 17%, #EDCCB0 69%, #F6E4D5 88%, #F5F5F5 93%)'; this.style.color='#003c2f';"
                        onmouseout="this.style.backgroundImage='none'; this.style.color='white';"
                        onfocus="this.style.backgroundImage='linear-gradient(to right, #D9A372 12%, #DBA677 17%, #EDCCB0 69%, #F6E4D5 88%, #F5F5F5 93%)'; this.style.color='#003c2f';"
                        onblur="this.style.backgroundImage='none'; this.style.color='white';">
                        <i class="fas fa-power-off" style="margin-right: 10px; color: red;"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
