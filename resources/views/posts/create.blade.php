<x-guest-layout :noSmoothScroll="true">

    @push('head')
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    @endpush

    @push('foot')
        <script src="/ckeditor/ckeditor.js"></script>
    @endpush

    <div id="main" x-data="global()" x-init="themeInit()" class="tw-container">
        @include('posts.partials.navbar')

        @include('posts.partials.responsive-nav')

        <div class="container mx-auto">

            <div class="pb-16 lg:pb-20">

                <x-breadcrumbs home="/blog" />

                <form aria-label="Posts section" class="pt-8 lg:pt-12" action="{{ route('blog.store') }}" method="POST"
                    x-data="{ title: '{{ old('title') }}' }">
                    @csrf


                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col gap-2 md:flex-row">
                            <section class="w-full">
                                <x-label for="title" value="Title" class="capitalize" required />
                                <x-input name="title" id="title" x-model="title" class="w-full p-2" required />
                                @error('title')
                                    <p error>{{ $message }}</p>
                                @enderror
                            </section>
                            <section class="w-full">
                                <x-label for="slug" value="slug" class="capitalize" />
                                <x-input name="slug" id="slug" class="w-full p-2 " value="{{ old('slug') }}"
                                    x-slug="title" />
                                @error('slug')
                                    <p error>{{ $message }}</p>
                                @enderror
                            </section>
                        </div>
                        <section class="w-full">
                            <x-label for="body" value="body" class="capitalize" required />
                            <div class="prose dark:prose-invert prose-code:text-gray-500 max-w-full">
                                <textarea x-cloak name="body" id="body" class="w-full p-2 " x-ref="editor" x-init="ClassicEditor.create($refs.editor, { licenseKey: '' }).then(editor => {
                                    window.editor = editor
                                }).catch((error) => {
                                    console.error('Oops, something went wrong!');
                                    console.error(
                                        'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
                                    );
                                    console.warn('Build id: jsxvfll26yf-sxy9feyqlss9');
                                    console.error(error);
                                })">{{ old('body') }}</textarea>
                            </div>
                            @error('body')
                                <p error>{{ $message }}</p>
                            @enderror
                        </section>
                        <section class="w-full">
                            <x-label for="categories" value="categories" class="capitalize" />
                            <x-alpine-multi-select elementId="categories" elementName="categories" :optionsData="$categories->map(fn($cat) => ['key' => $cat->id, 'value' => $cat->name])"
                                :selected="explode(',', old('categories'))" placeholder="Select Categories" />
                            @error('categories')
                                <p error>{{ $message }}</p>
                            @enderror
                        </section>
                        <section class="mt-4">
                            <x-button>Save</x-button>
                        </section>
                    </div>


                </form>
            </div>
        </div>

    </div>

</x-guest-layout>
<x-ui-footer />
