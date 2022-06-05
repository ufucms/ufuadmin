<x-ufuadmin::layouts.base>
    @push('style')
        <link rel="stylesheet" href="{{ asset('vendor/ufuadmin/css/error.css') }}">
    @endpush

    <div class="content">
        <img src="{{ asset('vendor/ufuadmin/images/403.svg') }}" alt="">
        <div class="content-r">
            <h1>403</h1>
            <p>抱歉，你无权访问该页面</p>
            <a href="{{ url(config('ufuadmin.home.path','/')) }}"><button class="pear-btn pear-btn-primary">返回首页</button></a>
        </div>
    </div>
</x-ufuadmin::layouts.base>
