<x-ufuadmin::layouts.base>
    @if($form = request('ufuadmin.page.components.form',[]))
        <x-ufuadmin::form :form="$form">
            {{ $slot }}
        </x-ufuadmin::form>
    @endif

</x-ufuadmin::layouts.base>
