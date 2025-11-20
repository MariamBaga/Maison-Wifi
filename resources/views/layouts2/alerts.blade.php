{{-- 🎉 SUCCESS ALERT --}}
@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Succès ! 🎉',
    html: "<b>{{ session('success') }}</b>",
    timer: 3000,
    timerProgressBar: true,
    showConfirmButton: false,
    toast: true,
    position: 'top-end'
});
</script>
@endif

{{-- ❌ ERROR ALERT --}}
@if(session('error'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Erreur ! ❌',
    html: "<b>{{ session('error') }}</b>",
    confirmButtonText: 'OK',
    confirmButtonColor: '#d33',
    backdrop: `
        rgba(255,0,0,0.1)
        left top
        no-repeat
    `
});
</script>
@endif

{{-- ⚠️ WARNING ALERT --}}
@if(session('warning'))
<script>
Swal.fire({
    icon: 'warning',
    title: 'Attention ⚠️',
    html: "<b>{{ session('warning') }}</b>",
    confirmButtonText: 'Compris',
    confirmButtonColor: '#f39c12'
});
</script>
@endif

{{-- ✏️ VALIDATION ERRORS --}}
@if ($errors->any())
<script>
let msg = "";
@foreach ($errors->all() as $error)
    msg += "- {{ $error }} <br>";
@endforeach

Swal.fire({
    icon: 'error',
    title: 'Erreurs de validation ❌',
    html: msg,
    confirmButtonColor: '#d33'
});
</script>
@endif
