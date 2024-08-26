<table id="users" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>@lang('admin.Email')</th>
            <th>@lang('admin.Name')</th>
            <th>@lang('admin.Phone')</th>
            <th>@lang('admin.Action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td class="ms-1">{{ $user->email }}</td>
                <td class="ms-1">{{ $user->name }}</td>
                <td class="ms-1">{{ $user->phone }}</td>

                <td class="text-muted">
                    <x-admin.button.delete route="admin.users.destroy" :id="$user->id" />
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<x-slot name="extra_script">
    <script>
        new DataTable('#users');
    </script>
</x-slot>
