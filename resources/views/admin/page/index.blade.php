<x-layouts.admin.layout>

    <x-admin.container.header title="Page" name="pages" model="{{ $can_update_pages?'create-page-model': null }}"/>
    <div class="page-body">
      <div class="container-xl">
        <div class="row row-deck row-cards">

          <div class="col-md-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pages</h3>
                <div class="ms-auto text-muted">
                    <form action="{{ route('admin.pages.index') }}" method="get">
                            Search:
                            <div class="ms-2 d-inline-block">
                            <input name="key" required type="text" class="form-control form-control-sm" aria-label="Search invoice">
                            </div>
                            <button class="btn"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="21" y1="21" x2="15" y2="15"></line></svg></button>

                    </form>
                </div>
              </div>
              <div class="card-table table-responsive">
                <table class="table table-vcenter">
                  <thead>
                    <tr>
                      <th>Page Title</th>
                      <th>Page slug</th>
                      <th>Description</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pages as $page)
                        <tr>
                            <td class="ms-1">{{ $page->title }}</td>
                            <td>
                            /{{ $page->slug }}
                            <a href="{{ URL::to('/').'/'.$page->slug }}" class="ms-1" aria-label="Open website"><!-- Download SVG icon from http://tabler-icons.io/i/link -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" /><path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" /></svg>
                            </a>
                            </td>

                            <td>
                                {{ Str::limit(strip_tags($page->description), 30, '...') }}
                                @if($page->description)
                                    <x-admin.model.description :id="$page->id" :description="$page->description"/>
                                @endif
                            </td>

                            <td class="text-muted">
                                    <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-info" role="button">Edit</a>
                                @if($can_update_pages)
                                    <x-admin.button.delete route="admin.pages.destroy" :id="$page->id" />
                                @endif
                            </td>

                        </tr>
                    @endforeach
                  </tbody>

                </table>
              </div>
              <div class="card-footer text-center">
                @if(! $pages->count())
                    <h3>No pages</h3>
                @endif
                <h3 class="">{{ $pages->render('vendor.pagination.bootstrap-5') }}</h3>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    @if($can_update_pages)
        <x-admin.model.create-page />
    @endif
</x-layouts.admin.layout>
