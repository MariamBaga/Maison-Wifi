@php
    // Classe de base
    $topbarClass = 'topbar-one';

    // Ajouter --inner sur certaines pages
    $innerRoutes = ['contact.form', 'aboutus', 'cart.index', 'products.index', 'orders.index', 'products.show'];   

if (request()->routeIs($innerRoutes)) {
    $topbarClass .= ' topbar-one--inner';
}

@endphp

<div class="{{ $topbarClass }}">
    <div class="container-fluid">
        <div class="topbar-one__inner">
            <ul class="list-unstyled topbar-one__info">
                <li class="topbar-one__info__item">
                    <span class="topbar-one__info__icon"><i class="icon-mail"></i></span>
                    <a href="mailto:info@ienetmail.com">info@connectiixmail.com</a>
                </li>
                <li class="topbar-one__info__item">
                    <span class="topbar-one__info__icon"><i class="icon-maps-and-flags"></i></span>
                    Côte d’Ivoire, Abidjan, Abatta
                </li>
            </ul>
            <div class="topbar-one__right">
                <div class="topbar-one__social">
                    <a href="https://facebook.com/">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                        <span class="sr-only">Facebook</span>
                    </a>
                    <a href="https://twitter.com/">
                        <i class="fab fa-twitter" aria-hidden="true"></i>
                        <span class="sr-only">Twitter</span>
                    </a>
                    <a href="https://instagram.com/">
                        <i class="fab fa-instagram" aria-hidden="true"></i>
                        <span class="sr-only">Instagram</span>
                    </a>
                    <a href="https://www.youtube.com/">
                        <i class="fab fa-youtube" aria-hidden="true"></i>
                        <span class="sr-only">Youtube</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
