<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('blank_page') }}">
                <i class="bi bi-file-earmark"></i>
                <span>Blank</span>
            </a>
        </li><!-- End Blank Page Nav -->

        {{-- OrderS Pages --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav-orders" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav-orders" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('orders/create') }}">
                        <i class="bi bi-circle"></i><span>New Order</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('orders') }}">
                        <i class="bi bi-circle"></i><span>Order List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('orders_report') }}">
                        <i class="bi bi-circle"></i><span>Orders Report</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->



        {{-- Brnaches Pages --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav-branches" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Branches</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav-branches" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('branches/create') }}">
                        <i class="bi bi-circle"></i><span>New Branch</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('branches') }}">
                        <i class="bi bi-circle"></i><span>Branch List</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        {{-- Products Pages --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav-products" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav-products" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('products/create') }}">
                        <i class="bi bi-circle"></i><span>New Product</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('products') }}">
                        <i class="bi bi-circle"></i><span>Product List</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->



        {{-- Zones Pages --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav-zones" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Zone</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav-zones" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('zones/create') }}">
                        <i class="bi bi-circle"></i><span>New Zone</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('zones') }}">
                        <i class="bi bi-circle"></i><span>Zone List</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

    </ul>

</aside><!-- End Sidebar-->
