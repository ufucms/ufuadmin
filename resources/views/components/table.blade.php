{{--  数据表格：表头操作 --}}
@if(count($table['actions']['toolbar'] ?? []))
<script type="text/html" id="{{ $table['attributes']['id'].'-toolbar' }}">
    <x-ufuadmin::action :actions="$table['actions']['toolbar']"></x-ufuadmin::action>
</script>
@endif

{{-- 数据表格  --}}
<div class="layui-card">
    <div class="layui-card-body">
        <table @foreach($table['attributes'] as $key => $val) {{ $key }}="{{ $val }}" @endforeach></table>
    </div>
</div>

{{-- 数据表格：行操作按钮 --}}
@if(count($table['actions']['column'] ?? []))
<script type="text/html" id="{{ $table['attributes']['id'].'-bar' }}">
    <x-ufuadmin::action :actions="$table['actions']['column']"></x-ufuadmin::action>
</script>
@endif
