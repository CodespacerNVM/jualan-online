<x-guest-layout>

    @push('head')
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    @endpush

    @push('foot')
        <script src="/ckeditor/ckeditor.js"></script>
    @endpush

    <div id="main" x-data="global()" x-init="themeInit()" class="tw-container">
        @include('posts.partials.navbar')

        @include('posts.partials.responsive-nav')

        <div>
            <div class="container mx-auto">
                <div class="pb-16 lg:pb-20">

                    <x-breadcrumbs home="/blog" />

                    <article aria-label="Posts section" class="pt-8 text-center lg:pt-12" x-data="{ body: '' }">
                        <form action="{{ route('blog.store') }}" method="POST"
                            class="pb-8 border-b border-grey-lighter">
                            @csrf
                            <div class="mb-3">
                                <x-label for="title">Title</x-label>
                                <x-input type="text" id="title" name="title" />
                                @error('title')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <p class="text-sm font-light">Posted by: {{ Auth::user()->name }}</p>
                            <div class="flex items-center justify-center pt-4 text-gray-500">
                                <p class="pr-2 font-light font-body"
                                    x-text="new Date('{{ now() }}').toLocaleDateString()"></p>
                                <span class="font-body text-grey ">//</span>
                                <p class="pl-2 font-light font-body"
                                    x-text="`${Math.ceil(body?.length / 230)} min read`">
                                    Getting Estimated Time...
                                </p>
                            </div>

                            <div class="my-12">
                                <textarea name="body" x-init="ClassicEditor
                                    .create($refs.editor)
                                    .then(editor => {
                                        editor.model.document.on('change:data', () => {
                                            body = editor.getData()
                                        })
                                    })
                                    .catch(error => {
                                        console.error(error);
                                    });" x-ref="editor">
                                </textarea>
                                @error('body')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <x-label for="tags">Tags</x-label>
                                <x-input id="tags" type="text" name="tags" placeholder="tags" />
                                @error('tags')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid my-12">
                                <x-button>Save</x-button>
                            </div>
                        </form>
                    </article>
                </div>
            </div>
        </div>

    </div>

</x-guest-layout>
<x-ui-footer />
