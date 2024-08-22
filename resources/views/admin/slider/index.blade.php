<x-layouts.admin.layout>
    <x-admin.container.header :title="__('admin.Slider')" name="sliders" model="create-slider-model"/>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">@lang('admin.Sliders')</h3>
                        </div>
                        <div class="card-table table-responsive">
                            <x-admin.tables.sliders :sliders="$sliders" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-admin.model.create-slider />
</x-layouts.admin.layout>
