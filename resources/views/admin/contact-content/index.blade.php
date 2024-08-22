<x-layouts.admin.layout>
    <x-admin.container.header :title="__('admin.Contact content')"/>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <form action="{{ route('admin.contact-content.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">@lang('admin.Email')</label>
                            <input type="email" class="form-control" name="email" value="{{ $contact ? $contact->email : '' }}"
                                placeholder="@lang('admin.Email')" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('admin.Phone')</label>
                            <input type="tel" class="form-control" name="phone" value="{{ $contact ? $contact->phone : '' }}"
                                placeholder="@lang('admin.Phone')" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('admin.Address')</label>
                            <input type="text" class="form-control" name="address" value="{{ $contact ? $contact->address : '' }}"
                                placeholder="@lang('admin.Address')" />
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Social Links</label>
                            <div id="social-links">
                                @if($contact && $contact->social)
                                    @foreach(json_decode($contact->social, true) as $social)
                                        <div class="d-flex mb-2">
                                            <select class="form-control me-2" name="social[icon][]">
                                                <option value="fab fa-facebook-f" {{ $social['icon'] == 'fab fa-facebook-f' ? 'selected' : '' }}>Facebook</option>
                                                <option value="fab fa-twitter" {{ $social['icon'] == 'fab fa-twitter' ? 'selected' : '' }}>Twitter</option>
                                                <option value="fab fa-google" {{ $social['icon'] == 'fab fa-google' ? 'selected' : '' }}>Google</option>
                                                <option value="fab fa-instagram" {{ $social['icon'] == 'fab fa-instagram' ? 'selected' : '' }}>Instagram</option>
                                                <option value="fab fa-linkedin-in" {{ $social['icon'] == 'fab fa-linkedin-in' ? 'selected' : '' }}>LinkedIn</option>
                                                <option value="fab fa-pinterest" {{ $social['icon'] == 'fab fa-pinterest' ? 'selected' : '' }}>Pinterest</option>
                                                <option value="fab fa-vk" {{ $social['icon'] == 'fab fa-vk' ? 'selected' : '' }}>Vkontakte</option>
                                                <option value="fab fa-stack-overflow" {{ $social['icon'] == 'fab fa-stack-overflow' ? 'selected' : '' }}>Stack Overflow</option>
                                                <option value="fab fa-youtube" {{ $social['icon'] == 'fab fa-youtube' ? 'selected' : '' }}>YouTube</option>
                                                <option value="fab fa-slack-hash" {{ $social['icon'] == 'fab fa-slack-hash' ? 'selected' : '' }}>Slack</option>
                                                <option value="fab fa-github" {{ $social['icon'] == 'fab fa-github' ? 'selected' : '' }}>Github</option>
                                                <option value="fab fa-dribbble" {{ $social['icon'] == 'fab fa-dribbble' ? 'selected' : '' }}>Dribbble</option>
                                                <option value="fab fa-reddit-alien" {{ $social['icon'] == 'fab fa-reddit-alien' ? 'selected' : '' }}>Reddit</option>
                                                <option value="fab fa-whatsapp" {{ $social['icon'] == 'fab fa-whatsapp' ? 'selected' : '' }}>Whatsapp</option>
                                                <option value="fab fa-tiktok" {{ $social['icon'] == 'fab fa-tiktok' ? 'selected' : '' }}>TikTok</option>
                                                <option value="fab fa-snapchat-ghost" {{ $social['icon'] == 'fab fa-snapchat-ghost' ? 'selected' : '' }}>Snapchat</option>
                                            </select>
                                            <input type="url" class="form-control me-2" name="social[url][]" value="{{ $social['url'] }}" placeholder="URL" />
                                            <button type="button" class="btn btn-danger remove-social">Remove</button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="d-flex mb-2">
                                        <select class="form-control me-2" name="social[icon][]">
                                            <option value="fab fa-facebook-f">Facebook</option>
                                            <option value="fab fa-twitter">Twitter</option>
                                            <option value="fab fa-google">Google</option>
                                            <option value="fab fa-instagram">Instagram</option>
                                            <option value="fab fa-linkedin-in">LinkedIn</option>
                                            <option value="fab fa-pinterest">Pinterest</option>
                                            <option value="fab fa-vk">Vkontakte</option>
                                            <option value="fab fa-stack-overflow">Stack Overflow</option>
                                            <option value="fab fa-youtube">YouTube</option>
                                            <option value="fab fa-slack-hash">Slack</option>
                                            <option value="fab fa-github">Github</option>
                                            <option value="fab fa-dribbble">Dribbble</option>
                                            <option value="fab fa-reddit-alien">Reddit</option>
                                            <option value="fab fa-whatsapp">Whatsapp</option>
                                            <option value="fab fa-tiktok">TikTok</option>
                                            <option value="fab fa-snapchat-ghost">Snapchat</option>
                                        </select>
                                        <input type="url" class="form-control me-2" name="social[url][]" placeholder="URL" />
                                        <button type="button" class="btn btn-danger remove-social">Remove</button>
                                    </div>
                                @endif
                            </div>
                            <button type="button" class="btn btn-secondary mt-2" id="add-social">Add Social Link</button>
                        </div>
                        <button class="btn btn-primary ms-auto">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-slot name="extra_script">
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.getElementById('add-social').addEventListener('click', function () {
                    var socialLinks = document.getElementById('social-links');
                    var newLink = document.createElement('div');
                    newLink.className = 'd-flex mb-2';
                    newLink.innerHTML = `
                        <select class="form-control me-2" name="social[icon][]">
                            <option value="fab fa-facebook-f">Facebook</option>
                            <option value="fab fa-twitter">Twitter</option>
                            <option value="fab fa-google">Google</option>
                            <option value="fab fa-instagram">Instagram</option>
                            <option value="fab fa-linkedin-in">LinkedIn</option>
                            <option value="fab fa-pinterest">Pinterest</option>
                            <option value="fab fa-vk">Vkontakte</option>
                            <option value="fab fa-stack-overflow">Stack Overflow</option>
                            <option value="fab fa-youtube">YouTube</option>
                            <option value="fab fa-slack-hash">Slack</option>
                            <option value="fab fa-github">Github</option>
                            <option value="fab fa-dribbble">Dribbble</option>
                            <option value="fab fa-reddit-alien">Reddit</option>
                            <option value="fab fa-whatsapp">Whatsapp</option>
                            <option value="fab fa-tiktok">TikTok</option>
                            <option value="fab fa-snapchat-ghost">Snapchat</option>
                        </select>
                        <input type="url" class="form-control me-2" name="social[url][]" placeholder="URL" />
                        <button type="button" class="btn btn-danger remove-social">Remove</button>
                    `;
                    socialLinks.appendChild(newLink);
                });

                document.getElementById('social-links').addEventListener('click', function (e) {
                    if (e.target && e.target.classList.contains('remove-social')) {
                        e.target.closest('.d-flex').remove();
                    }
                });
            });
        </script>
    </x-slot>

</x-layouts.admin.layout>
