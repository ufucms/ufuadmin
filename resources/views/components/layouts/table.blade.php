<x-layadmin::layouts.base class="pear-container">
    @php
        // todo
        $search = request('ufuadmin.page.components.search',[]);

        $table = request('ufuadmin.page.components.table',[]);

        $table['actions'] = collect(request('ufuadmin.page.components.table.actions',[]))->groupBy('position')->all();
    @endphp

    {{-- 搜索区 --}}
    @if($search)
        <div class="layui-card">
            <div class="layui-card-body">
                <x-layadmin::search :form="$search"></x-layadmin::search>
            </div>
        </div>
    @endif

    {{-- 数据表格 --}}
    <x-layadmin::table :table="$table"></x-layadmin::table>

    {{ $slot }}
</x-layadmin::layouts.base>