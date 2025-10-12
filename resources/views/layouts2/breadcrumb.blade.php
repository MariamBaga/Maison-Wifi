<section class="py-3 border-bottom d-none d-md-flex">
    <div class="container">
        <div class="page-breadcrumb d-flex align-items-center">
            <h3 class="breadcrumb-title pe-3">{{ $title ?? 'Page Title' }}</h3>
            <div class="ms-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}"><i class="bx bx-home-alt"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $title ?? 'Page Title' }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

