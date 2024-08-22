<x-layouts.admin.layout>
    <x-admin.container.header title="Language Key" model="create-lang-key"/>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">

                <div class="col-md-12 col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Language</h3>

                      </div>
                      <form method="POST" action="{{ route('admin.languages.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="card-table table-responsive">
                                <table class="table table-vcenter">
                                <thead>
                                    <tr>
                                    <th>Key <strong>{{ $main_lang }}</strong></th>
                                    @foreach($languages as $lang)
                                        <th>{{ $lang }}</th>
                                    @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($strings[$main_lang] as $key=>$value)
                                        <tr>
                                            <td class="ms-1">{{ $key }}</td>
                                            @foreach($languages as $lang)
                                                <td>
                                                    <input class="form-control" type="text" name="{{ $lang }}[{{ $key }}]" value="{{ isset($strings[$lang][$key])?$strings[$lang][$key]:'' }}">
                                                </td>
                                            @endforeach

                                        </tr>
                                    @endforeach
                                </tbody>

                                </table>
                            </div>
                            <div class="card-footer text-center">
                                <button class="btn btn-success">Save changes</button>
                            </div>
                      </form>
                    </div>

                  </div>

            </div>
        </div>
    </div>

</x-layouts.admin.layout>
<x-admin.model.create-lang-key />
