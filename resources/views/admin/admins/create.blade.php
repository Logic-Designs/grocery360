<x-layouts.admin.layout>
    <x-admin.container.header title="Create Admin"/>

    <div class="page-body">
      <div class="container-xl">
        <form action="{{ route('admin.admins.store') }}" method="post">
            @csrf
            <fieldset class="form-fieldset">
                <div class="mb-3">
                  <label class="form-label required">Name</label>
                  <input name="name" type="text" class="form-control" autocomplete="off"/>
                </div>

                <div class="mb-3">
                    <label class="form-label required">Email</label>
                    <input name="email" type="email" class="form-control" autocomplete="off"/>
                  </div>

                <div class="mb-3">
                  <label class="form-label required">Password</label>
                  <input name="password" type="password" class="form-control"  autocomplete="off"/>
                </div>

                <div class="mb-3">
                    <label class="form-label required">Confirm Password</label>
                    <input name="password_confirmation" type="password" class="form-control"  autocomplete="off"/>
                  </div>
                  <div class="mb-3">
                    <div class="form-label">Select Role</div>
                    <select class="form-select" name="role">
                      <option value="1">Admin</option>
                      <option value="2">subadmin</option>
                    </select>
                  </div>
                <button class="btn btn-primary">Submit</button>
              </fieldset>

        </form>
      </div>
    </div>

</x-layouts.admin.layout>
