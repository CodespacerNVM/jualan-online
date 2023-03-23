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

                <article aria-label="Posts section" class="pt-8 lg:pt-12" x-data="{ body: '' }">



                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col gap-2 md:flex-row">
                            <section class="w-full">
                                <x-label for="title" value="Title" class="capitalize" />
                                <x-input name="title" id="title" class="w-full p-2" />
                                @error('title')
                                    <p error>{{ $message }}</p>
                                @enderror
                            </section>
                            <section class="w-full">
                                <x-label for="slug" value="slug" class="capitalize" />
                                <x-input name="slug" id="slug" class="w-full p-2 " />
                                @error('slug')
                                    <p error>{{ $message }}</p>
                                @enderror
                            </section>
                        </div>
                        <section class="w-full">
                            <x-label for="body" value="body" class="capitalize" />
                            <x-input element="textarea" name="body" id="body" class="w-full p-2 " x-ref="editor"
                                x-init="" />
                            @error('body')
                                <p error>{{ $message }}</p>
                            @enderror
                        </section>
                        <section class="w-full">
                            <x-label for="tags" value="tags" class="capitalize" />
                            <x-input name="tags" id="tags" class="w-full p-2 " />
                            @error('tags')
                                <p error>{{ $message }}</p>
                            @enderror
                        </section>
                    </div>


                </article>
            </div>
        </div>

    </div>

</x-guest-layout>
<x-ui-footer />
