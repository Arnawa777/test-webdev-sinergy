<link rel="stylesheet" href="{{ asset('../css/sidebar.css') }}">
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block side-nav">
    <div class=" position-sticky pt-3">
        <a href="/url">
            <h1>Testing</h1>
        </a>
        <ul>
            <li class="first-item {{ Request::is('url') ? 'active' : '' }}"><a href="/url">
                    <p>Fetch Url</p>
                </a>
            </li>
            <li class="first-item {{ Request::is('products') ? 'active' : '' }}">
                <a href="/products">
                    <p>Product</p>
                </a>
            </li>
        </ul>
    </div>
</nav>
