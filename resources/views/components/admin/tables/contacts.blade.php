<table id="contacts" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>@lang('admin.Email')</th>
            <th>@lang('admin.Name')</th>
            <th>@lang('admin.Phone')</th>
            <th>Message</th>
            <th>@lang('admin.Action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
            <tr>
                <td class="ms-1">{{ $contact->email }}</td>
                <td class="ms-1">{{ $contact->name }}</td>
                <td class="ms-1">{{ $contact->phone }}</td>
                <td>
                    {{ Str::limit(strip_tags($contact->message), 30, '...') }}
                    @if($contact->message)
                        <x-admin.model.description :id="$contact->id" :description="$contact->message"/>
                    @endif
                </td>
                <td class="text-muted">
                    <x-admin.button.delete route="admin.contacts.destroy" :id="$contact->id" />
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<x-slot name="extra_script">
    <script>
        new DataTable('#contacts');
    </script>
</x-slot>
