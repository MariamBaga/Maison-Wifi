<!--start top header wrapper-->
<div class="header-wrapper bg-dark-1">
			<div class="top-menu border-bottom">
				<div class="container">
					<nav class="navbar navbar-expand">
						<div class="shiping-title text-uppercase font-13 text-white d-none d-sm-flex">Bienvenue!! Dans Maison Wifi</div>
						<ul class="navbar-nav ms-auto d-none d-lg-flex">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('orders.index') }}">Track Order</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('aboutus') }}">About</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('categories.index') }}">Our Stores</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('products.index') }}">Blog</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('contact.form') }}">Contact</a></li>
                    <li class="nav-item"> <a class="nav-link" href="javascript:;">Help & FAQs</a></li>
                </ul>
						<ul class="navbar-nav">
							<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">USD</a>
								<ul class="dropdown-menu dropdown-menu-lg-end">
									<li><a class="dropdown-item" href="#">USD</a>
									</li>
									<li><a class="dropdown-item" href="#">EUR</a>
									</li>
								</ul>
							</li>
							<!-- <li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
									<div class="lang d-flex gap-1">
										<div><i class="flag-icon flag-icon-um"></i>
										</div>
										<div><span>ENG</span>
										</div>
									</div>
								</a>
								<div class="dropdown-menu dropdown-menu-lg-end">
									<a class="dropdown-item d-flex allign-items-center" href="javascript:;"> <i class="flag-icon flag-icon-de me-2"></i><span>German</span>
									</a>	<a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i
								class="flag-icon flag-icon-fr me-2"></i><span>French</span></a>
									<a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i
								class="flag-icon flag-icon-um me-2"></i><span>English</span></a>
									<a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i
								class="flag-icon flag-icon-in me-2"></i><span>Hindi</span></a>
									<a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i
								class="flag-icon flag-icon-cn me-2"></i><span>Chinese</span></a>
									<a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i
						        class="flag-icon flag-icon-ae me-2"></i><span>Arabic</span></a>
								</div>
							</li> -->
						</ul>
						<ul class="navbar-nav social-link ms-lg-2 ms-auto">
    <li class="nav-item">
        <a class="nav-link" href="https://www.facebook.com/share/1Cqw2fha4c/" target="_blank">
            <i class='bx bxl-facebook'></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="https://www.instagram.com/connectiix?igsh=MW5mOXZrdHZrNXJqdw==" target="_blank">
            <i class='bx bxl-instagram'></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="https://www.linkedin.com/posts/connectiix_bonne-f%C3%AAte-de-tabaski-en-ce-jour-de-c%C3%A9l%C3%A9bration-activity-7336688602535378944-EiNR?utm_source=share&utm_medium=member_android&rcm=ACoAAA24VbIBop8-uRh2ODgVkuK6XYKDaal3ZvY" target="_blank">
            <i class='bx bxl-linkedin'></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="https://www.tiktok.com/@connectiix2?_t=ZM-8x3htpyKUEg&_r=1" target="_blank">
            <i class='bx bxl-tiktok'></i>
        </a>
    </li>
</ul>

					</nav>
				</div>
			</div>
			<div class="header-content pb-3 pb-md-0">
				<div class="container">
					<div class="row align-items-center">
						<div class="col col-md-auto">
							<div class="d-flex align-items-center">
								<div class="mobile-toggle-menu d-lg-none px-lg-2" data-trigger="#navbar_main"><i class='bx bx-menu'></i>
								</div>
								<div class="logo d-none d-lg-flex">
									<a href="{{ route('products.index') }}">
										<img src="assets/images/logo-icon.png" class="logo-icon" alt="" />
									</a>
								</div>
							</div>
						</div>
						<div class="col-12 col-md order-4 order-md-2">
    <div class="input-group flex-nowrap px-xl-4">
        <input type="text" class="form-control w-100" placeholder="recherchez des produits ici..." />

        <select class="form-select flex-shrink-0" aria-label="Default select example" style="width: 10.5rem;">
            <option value="" selected>Tous les Categories</option>
            @foreach(\App\Models\Category::all() as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <span class="input-group-text cursor-pointer"><i class='bx bx-search'></i></span>
    </div>
</div>

						<div class="col col-md-auto order-3 d-none d-xl-flex align-items-center">
							<div class="fs-1 text-white"><i class='bx bx-headphone'></i>
							</div>
							<div class="ms-2">
								<p class="mb-0 font-13">Appel nous maintenant</p>
								<h5 class="mb-0"><a href="tel:002250748088478">(225) 0748 088 478</a></h5>
							</div>
						</div>
						<div class="col col-md-auto order-2 order-md-4">
							<div class="top-cart-icons">
								<nav class="navbar navbar-expand">
									<ul class="navbar-nav ms-auto">
										<li class="nav-item"><a href="account-dashboard.html" class="nav-link cart-link"><i class='bx bx-user'></i></a>
										</li>
										<li class="nav-item"><a href="wishlist.html" class="nav-link cart-link"><i class='bx bx-heart'></i></a>
										</li>
										<li class="nav-item dropdown dropdown-large">
    <a href="#" class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative cart-link" data-bs-toggle="dropdown">
        <span class="alert-count">{{ $cartCount }}</span>
        <i class='bx bx-shopping-bag'></i>
    </a>

    <div class="dropdown-menu dropdown-menu-end">
        <a href="{{ route('cart.index') }}">
            <div class="cart-header">
                <p class="cart-header-title mb-0">{{ $cartCount }} {{ Str::plural('ITEM', $cartCount) }}</p>
                <p class="cart-header-clear ms-auto mb-0">VIEW CART</p>
            </div>
        </a>

        <div class="cart-list">
            @forelse($cartItems as $item)
                <a class="dropdown-item" href="{{ route('products.show', $item->id) }}">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="cart-product-title">{{ $item->name }}</h6>
                            <p class="cart-product-price">{{ $item->pivot->quantity }} x {{ number_format($item->price, 0, ',', ' ') }} FCFA</p>
                        </div>
                        <div class="position-relative">
                            <form method="POST" action="{{ route('cart.remove') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <button type="submit" class="cart-product-cancel position-absolute border-0 bg-transparent text-white">
                                    <i class='bx bx-x'></i>
                                </button>
                            </form>
                            <div class="cart-product">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="">
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="text-center p-3">
                    <p class="text-muted mb-0">Votre panier est vide.</p>
                </div>
            @endforelse
        </div>

        @if($cartCount > 0)
            <a href="{{ route('cart.index') }}">
                <div class="text-center cart-footer d-flex align-items-center">
                    <h5 class="mb-0">TOTAL</h5>
                    <h5 class="mb-0 ms-auto">{{ number_format($cartTotal, 0, ',', ' ') }} FCFA</h5>
                </div>
            </a>
            <div class="d-grid p-3 border-top">
                <a href="checkout.html" class="btn btn-light btn-ecomm">CHECKOUT</a>
            </div>
        @endif
    </div>
</li>

									</ul>
								</nav>
							</div>
						</div>
					</div>
					<!--end row-->
				</div>
			</div>
			<div class="primary-menu border-top">
				<div class="container">
					<nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg">
						<div class="offcanvas-header">
							<button class="btn-close float-end"></button>
							<h5 class="py-2 text-white">Navigation</h5>
						</div>
						<ul class="navbar-nav">
							<li class="nav-item active"> <a class="nav-link" href="{{ route('products.index') }}">Home </a>
							</li>
							<li class="nav-item dropdown">	<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">Categories <i class='bx bx-chevron-down'></i></a>
								<div class="dropdown-menu dropdown-large-menu">
									<div class="row">
										<div class="col-md-4">
											<h6 class="large-menu-title">Fashion</h6>
											<ul class="">
												<li><a href="#">Casual T-Shirts</a>
												</li>
												<li><a href="#">Formal Shirts</a>
												</li>
												<li><a href="#">Jackets</a>
												</li>
												<li><a href="#">Jeans</a>
												</li>
												<li><a href="#">Dresses</a>
												</li>
												<li><a href="#">Sneakers</a>
												</li>
												<li><a href="#">Belts</a>
												</li>
												<li><a href="#">Sports Shoes</a>
												</li>
											</ul>
										</div>
										<!-- end col-3 -->
										<div class="col-md-4">
											<h6 class="large-menu-title">Electronics</h6>
											<ul class="">
												<li><a href="#">Mobiles</a>
												</li>
												<li><a href="#">Laptops</a>
												</li>
												<li><a href="#">Macbook</a>
												</li>
												<li><a href="#">Televisions</a>
												</li>
												<li><a href="#">Lighting</a>
												</li>
												<li><a href="#">Smart Watch</a>
												</li>
												<li><a href="#">Galaxy Phones</a>
												</li>
												<li><a href="#">PC Monitors</a>
												</li>
											</ul>
										</div>
										<!-- end col-3 -->
										<div class="col-md-4">
											<div class="pramotion-banner1">
												<img src="assets/images/gallery/menu-img.jpg" class="img-fluid" alt="" />
											</div>
										</div>
										<!-- end col-3 -->
									</div>
									<!-- end row -->
								</div>
								<!-- dropdown-large.// -->
							</li>
							<li class="nav-item dropdown">	<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">Shop  <i class='bx bx-chevron-down'></i></a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="#">Shop Layouts <i class='bx bx-chevron-right float-end'></i></a>
										<ul class="submenu dropdown-menu">
											<li><a class="dropdown-item" href="shop-grid-left-sidebar.html">Shop Grid - Left Sidebar</a>
											</li>
											<li><a class="dropdown-item" href="shop-grid-right-sidebar.html">Shop Grid - Right Sidebar</a>
											</li>
											<li><a class="dropdown-item" href="shop-list-left-sidebar.html">Shop List - Left Sidebar</a>
											</li>
											<li><a class="dropdown-item" href="shop-list-right-sidebar.html">Shop List - Right Sidebar</a>
											</li>
											<li><a class="dropdown-item" href="shop-grid-filter-on-top.html">Shop Grid - Top Filter</a>
											</li>
											<li><a class="dropdown-item" href="shop-list-filter-on-top.html">Shop List - Top Filter</a>
											</li>
										</ul>
									</li>
									<li><a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="#">Shop Pages <i class='bx bx-chevron-right float-end'></i></a>
										<ul class="submenu dropdown-menu">
											<li><a class="dropdown-item" href="shop-cart.html">Shop Cart</a>
											</li>
											<li><a class="dropdown-item" href="shop-categories.html">Shop Categories</a>
											</li>
											<li><a class="dropdown-item" href="checkout-details.html">Checkout Details</a>
											</li>
											<li><a class="dropdown-item" href="checkout-shipping.html">Checkout Shipping</a>
											</li>
											<li><a class="dropdown-item" href="checkout-payment.html">Checkout Payment</a>
											</li>
											<li><a class="dropdown-item" href="checkout-review.html">Checkout Review</a>
											</li>
											<li><a class="dropdown-item" href="checkout-complete.html">Checkout Complete</a>
											</li>
											<li><a class="dropdown-item" href="order-tracking.html">Order Tracking</a>
											</li>
											<li><a class="dropdown-item" href="product-comparison.html">Product Comparison</a>
											</li>
										</ul>
									</li>
                                    <li><a class="dropdown-item" href="{{ route('aboutus') }}">About Us</a></li>
    <li><a class="dropdown-item" href="{{ route('contact.form') }}">Contact Us</a></li>
    <li><a class="dropdown-item" href="{{ route('login') }}">Sign In</a></li>
    <li><a class="dropdown-item" href="{{ route('register') }}">Sign Up</a></li>
									</li>
									<li><a class="dropdown-item" href="authentication-forgot-password.html">Forgot Password</a>
									</li>
								</ul>
							</li>
							<li class="nav-item"> <a class="nav-link" href="{{ route('products.index') }}">Blog</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('aboutus') }}">About Us</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('contact.form') }}">Contact Us</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('categories.index') }}">Our Store</a></li>
							<li class="nav-item dropdown">	<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">My Account  <i class='bx bx-chevron-down'></i></a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="account-dashboard.html">Dashboard</a>
									</li>
									<li><a class="dropdown-item" href="account-downloads.html">Downloads</a>
									</li>
									<li><a class="dropdown-item" href="account-orders.html">Orders</a>
									</li>
									<li><a class="dropdown-item" href="account-payment-methods.html">Payment Methods</a>
									</li>
									<li><a class="dropdown-item" href="account-user-details.html">User Details</a>
									</li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
