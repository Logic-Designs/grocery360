<x-layouts.admin.layout>
    <x-admin.container.header title="Admin" name="admins" model="create-admin-model"/>
    <div class="page-body">
      <div class="container-xl">
        <div class="row row-deck row-cards">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admins</h3>
              </div>


              <div class="card-body border-bottom py-3">
                <div class="d-flex">
                  <div class="ms-auto text-muted">
                    Search:
                    <form action="{{ route('admin.admins.index') }}" method="get">
                        <div class="ms-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" aria-label="Search admin">
                          </div>

                    </form>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($admins as $admin)
                        <tr>
                            <td><span class="text-muted">{{ $loop->index + 1}}</span></td>
                            <td>{{ $admin->name }}</td>

                            <td>
                                {{ $admin->email }}
                            </td>

                            <td>
                                {{ $admin->role == 1? 'Admin': 'Sub admin' }}
                            </td>

                            <td>
                                    <a class="btn btn-success" href="{{ route('admin.admins.edit', $admin->id) }}">Edit</a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('admin.admins.destroy', $admin->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td align="center" colspan="11">
                                No data found
                            </td>

                        </tr>

                    @endforelse


                  </tbody>
                </table>
              </div>
              <div class="card-footer d-flex align-items-center">
                {{ $admins->links('pagination::bootstrap-4') }}
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <x-admin.model.create-admin />
</x-layouts.admin.layout>
