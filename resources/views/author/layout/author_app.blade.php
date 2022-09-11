
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

<link rel="icon" type="image/png" href="{{ asset('admin_asset/uploads/favicon.png')}}">

<title>@yield('title')</title>
  @include('author.layout.head')
</head>

<body>
<div id="app">
    <div class="main-wrapper">

        @include('author.layout.navbar')


        <div class="main-sidebar">
          @include('author.layout.sidebar')
        </div>

        <div class="main-content">
          @yield('content')
        </div>

    </div>
</div>

@include('author.layout.script_footer')

@if ($errors->any())
@foreach ($errors->all() as $error)
<script>
iziToast.error({
    title: '',
    position:'topRight',
    message: '{{ $error }}',
});
</script>
@endforeach

@endif
@if (session()->get('error'))

<script>
iziToast.error({
    title: '',
    position:'center',
    message: '{{ session()->get('error') }}',
});
</script>
@endif
@if (session()->get('success'))

<script>
iziToast.success({
    title: '',
    position:'topRight',
    message: '{{ session()->get('success') }}',
});
</script>
@endif

</body>
</html>
