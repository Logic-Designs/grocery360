<x-layouts.admin.layout>

    <div class="page-header d-print-none">
        <div class="row align-items-center">
          <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
              @lang('admin.OVERVIEW')
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-body">
      <div class="container-xl">
        <div class="row row-deck row-cards">
          <div class="col-lg-12">
            <div class="row row-cards">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">@lang('admin.Logo')</h3>
                    <div id="chart-mentions" class="chart-lg">
                        <div class="page-header d-print-none">
                            <div class="row align-items-center">
                                <div class="col">
                                    @if($setting && $setting->logo)
                                        <img src="{{ url($setting->logo) }}" alt="Your Logo" height="mx-auto" width="mx-auto">
                                    @else
                                        <img src="{{ url('images/main/logo.png') }}" alt="Your Logo" height="mx-auto" width="mx-auto">
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>


        </div>
      </div>
    </div>
</x-layouts.admin.layout>
