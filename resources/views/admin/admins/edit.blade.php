<x-layouts.admin.layout>
    <x-admin.container.header title="Slider" name="admins" back=1 />

    <div class="page-body">
      <div class="container-xl">
        <form action="{{ route('admin.admins.update', $admin->id) }}" method="post">
            @csrf
            @method('put')
            <fieldset class="form-fieldset">
                <div class="mb-3">
                  <label class="form-label required">Name</label>
                  <input name="name" value="{{ $admin->name }}" type="text" class="form-control" autocomplete="off"/>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Email</label>
                    <input name="email" value="{{ $admin->email }}" type="email" class="form-control" autocomplete="off"/>
                  </div>
                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input name="password" type="password" class="form-control"  autocomplete="off"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input name="password_confirmation" type="password" class="form-control"  autocomplete="off"/>
                  </div>

                  <div class="mb-3">
                    <div class="form-label">Select Role</div>
                    <select class="form-select" name="role">
                      <option value="1" {{ $admin->role == 1? 'selected': '' }}>Admin</option>
                      <option value="2" {{ $admin->role == 2? 'selected': '' }}>subadmin</option>
                    </select>
                  </div>

                <button class="btn btn-primary">Submit</button>
              </fieldset>

        </form>
      </div>
    </div>

</x-layouts.admin.layout>
