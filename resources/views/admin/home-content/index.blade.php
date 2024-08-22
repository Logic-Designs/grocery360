<x-layouts.admin.layout>
    <x-admin.container.header :title="__('admin.Home Content')"/>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <form action="{{ route('admin.home-content.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <div class="form-label">@lang('admin.Image')</div>
                            <input name="image" accept="image" type="file" class="form-control" />
                        </div>
                        @if($home)
                            <img src="{{ url($home->image ?: '') }}" alt="home">
                        @endif
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <div class="form-label">PDF</div>
                            <input name="pdf" accept="pdf" type="file" class="form-control" />
                        </div>
                        @if($home && $home->pdf)
                            <iframe src="{{ url($home->pdf ?: '') }}" style="width:600px; height:500px;" frameborder="0"></iframe>
                        @endif

                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <div class="form-label">Video Url (Empad from YouTube)</div>
                            <input name="video_url" type="url" class="form-control" value="{{ $home?$home->video_url: '' }}"/>
                        </div>
                        @if($home && $home->video_url)
                        <iframe width="420" height="315"
                        src="{{ url($home->video_url ?: '') }}">
                        </iframe>
                        @endif

                    </div>



                    <div class="col-lg-12">
                        <button class="btn btn-primary ms-auto">@lang('admin.Edit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin.layout>
