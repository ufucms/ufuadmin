<x-layadmin::layouts.base>
    @if($form = request('ufuadmin.page.components.form',[]))
        <x-layadmin::form :form="$form">
            {{ $slot }}
        </x-layadmin::form>
    @endif

</x-layadmin::layouts.base>
