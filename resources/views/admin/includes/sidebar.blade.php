<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.home') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('home') }}" aria-expanded="false" target="_blank"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Visit Site</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Carousel Image </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('add-carousel') }}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add Image </span></a></li>
                        <li class="sidebar-item"><a href="{{ route('manage-carousel') }}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Manage Image </span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Category </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('add-category') }}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add Category </span></a></li>
                        <li class="sidebar-item"><a href="{{ route('manage-category') }}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Manage Category </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Item </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('add-brand') }}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Add Item </span></a></li>
                        <li class="sidebar-item"><a href="{{ route('manage-brand') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Manage Item </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-move-resize-variant"></i><span class="hide-menu">Donate </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('add-product') }}" class="sidebar-link"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> Add Donate </span></a></li>
                        <li class="sidebar-item"><a href="{{ route('manage-product') }}" class="sidebar-link"><i class="mdi mdi-multiplication-box"></i><span class="hide-menu"> Manage Donate </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-key"></i><span class="hide-menu">Information </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('manage-admin') }}" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Admin Details</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('manage-register') }}" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> User Details </span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-list"></i><span class="hide-menu">Request </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('show-orders') }}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Request Order</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('done-order') }}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Done Order </span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Payment </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('show-payment') }}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Online Payment</span></a></li>
                        {{-- <li class="sidebar-item"><a href="{{ route('done-order') }}" class="sidebar-link"><i class="fa fa-list-ul"></i><span class="hide-menu"> Done Order </span></a></li> --}}
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Message </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('show-message') }}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Show Message</span></a></li>
                        {{-- <li class="sidebar-item"><a href="{{ route('done-order') }}" class="sidebar-link"><i class="fa fa-list-ul"></i><span class="hide-menu"> Done Order </span></a></li> --}}
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">About us </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('about-us') }}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add About</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('manage-about') }}" class="sidebar-link"><i class="fa fa-list-ul"></i><span class="hide-menu"> Manage About </span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">House/food/tube-well</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('house-us') }}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add </span></a></li>
                        <li class="sidebar-item"><a href="{{ route('manage-house') }}" class="sidebar-link"><i class="fa fa-list-ul"></i><span class="hide-menu"> Manage  </span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Previous Work </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('add-work') }}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add Work</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('manage-work') }}" class="sidebar-link"><i class="fa fa-list-ul"></i><span class="hide-menu"> Manage Work </span></a></li>
                    </ul>
                </li>

                {{-- <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-alert"></i><span class="hide-menu">Errors </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="error-403.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 403 </span></a></li>
                        <li class="sidebar-item"><a href="error-404.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 404 </span></a></li>
                        <li class="sidebar-item"><a href="error-405.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 405 </span></a></li>
                        <li class="sidebar-item"><a href="error-500.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 500 </span></a></li>
                    </ul>
                </li> --}}

                <li>

                    <a class="dropdown-item bg-success" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
