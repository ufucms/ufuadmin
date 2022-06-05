<x-ufuadmin::layouts.base class="pear-container">
    <div class="layui-card">
        @if($header ?? '')
            <div class="layui-card-header">{{ $header }}</div>
        @endif
        <div class="layui-card-body">
            {{ $slot }}
        </div>
    </div>
</x-ufuadmin::layouts.base>