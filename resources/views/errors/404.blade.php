<x-ufuadmin::layouts.base>
    @push('style')
        <link rel="stylesheet" href="{{ asset('vendor/ufuadmin/css/error.css') }}">
    @endpush

    <div class="content">
        <img src="{{ asset('vendor/ufuadmin/images/404.svg') }}" alt="">
        <div class="content-r">
            <h1>404</h1>
            <p>抱歉，你访问的页面不存在或仍在开发中</p>
            <a href="{{ url(config('ufuadmin.home.path','/')) }}"><button class="pear-btn pear-btn-primary">返回首页</button></a>
        </div>
    </div>
</x-ufuadmin::layouts.base>