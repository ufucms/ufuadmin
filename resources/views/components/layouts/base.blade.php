<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="{{ config('ufuadmin.desc') }}">
    <title>{{ request('ufuadmin.page.title') }}</title>

    {{-- 全局 styles --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
    <link rel="stylesheet" href="{{ asset('vendor/ufuadmin/component/pear/css/pear.css') }}"/>

    {{-- Page styles  --}}
    @foreach( request('ufuadmin.page.styles',[]) as $href)
        <link rel="stylesheet" href="{{ asset($href) }}"/>
    @endforeach

    {{-- 自定义 CSS   --}}
    @stack('style')
</head>
<body class="{{ $attributes->get('class') }}" background="{{ $attributes->get('background') }}" style="{{ $attributes->get('style') }}">
    {{ $slot }}

    {{-- 全局 scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('vendor/ufuadmin/component/pear/pear.js') }}"></script>
    <script>
      layui.sessionData('ufuadmin',{
        key:'version',
        value: '{{ request('ufuadmin.version') }}'
      });

      layui.sessionData('ufuadmin',{
        key:'config',
        value: @json(config('ufuadmin'))
      });

      layui.sessionData('ufuadmin',{
        key:'{{ request('ufuadmin.page.id') }}',
        value: @json( request('ufuadmin.page'))
      });

      layui.sessionData('ufuadmin',{
        key:'current',
        value: {
          id : '{{ request('ufuadmin.page.id') }}',
          params: @json(request('ufuadmin.params'))
        }
      })
    </script>

    {{-- Page scripts  --}}
    <script src="{{ asset('vendor/ufuadmin/component/app.js') }}"></script>
    @foreach(request('ufuadmin.page.scripts',[]) as $src)
        <script src="{{ asset($src) }}"></script>
    @endforeach

    {{--自定义 scripts--}}
    @stack('script')
</body>
</html>
