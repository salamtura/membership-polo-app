<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Notice Board') }}
            </h2>
        </x-slot>

    <!-- component -->
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-wrap -m-4">
                @foreach($posts as $post)
                    <div class="p-4 md:w-1/3">
                        <div class="h-full border rounded-xl shadow-cla-blue bg-gradient-to-r from-indigo-50 to-blue-50 overflow-hidden">
                            <img class="lg:h-48 md:h-36 w-full object-cover object-center scale-110 transition-all duration-400 hover:scale-100"
                                 src="{{ $post->image != null ?  'storage/'.$post->image : 'images/notice.png'}}" alt="blog">
                            <div class="p-6">
                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">{{\Illuminate\Support\Str::upper($post->postcategory->name)}}</h2>
                                <h1 class="title-font text-lg font-medium text-gray-600 mb-3">{{$post->title}}</h1>
                                <p class="leading-relaxed mb-3">{!!$post->post!!}</p>
                                <div class="flex items-center flex-wrap ">
                                    <a href="/post-details/{{$post->id}}" class="bg-gradient-to-r from-cyan-400 to-blue-400 hover:scale-105 drop-shadow-md  shadow-cla-blue px-4 py-1 rounded-lg">Read more</a>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="p-4 md:w-1/3">
                    <div class="h-full rounded-xl shadow-cla-violate bg-gradient-to-r from-pink-50 to-red-50 overflow-hidden">
                        <img class="lg:h-48 md:h-36 w-full object-cover object-center scale-110 transition-all duration-400 hover:scale-100" src="https://images.unsplash.com/photo-1624628639856-100bf817fd35?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8M2QlMjBpbWFnZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=600&q=60" alt="blog">
                        <div class="p-6">
                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY-1</h2>
                            <h1 class="title-font text-lg font-medium text-gray-600 mb-3">The Catalyzer</h1>
                            <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
                            <div class="flex items-center flex-wrap ">
                                <button class="bg-gradient-to-r from-orange-300 to-amber-400 hover:scale-105 drop-shadow-md shadow-cla-violate px-4 py-1 rounded-lg">Learn more</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4 md:w-1/3">
                    <div class="h-full rounded-xl shadow-cla-pink bg-gradient-to-r from-fuchsia-50 to-pink-50 overflow-hidden">
                        <img class="lg:h-48 md:h-36 w-full object-cover object-center scale-110 transition-all duration-400 hover:scale-100" src="https://images.unsplash.com/photo-1631700611307-37dbcb89ef7e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDIwfHx8ZW58MHx8fHw%3D&auto=format&fit=crop&w=600&q=60" alt="blog">
                        <div class="p-6">
                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY-1</h2>
                            <h1 class="title-font text-lg font-medium text-gray-600 mb-3">The Catalyzer</h1>
                            <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
                            <div class="flex items-center flex-wrap ">
                                <button class="bg-gradient-to-r from-fuchsia-300 to-pink-400 hover:scale-105  shadow-cla-blue px-4 py-1 rounded-lg">Learn more</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
{{--                        <table class="min-w-full divide-y divide-gray-200 table-fixed">--}}
{{--                            <thead class="bg-gray-100 border-b-2">--}}
{{--                                <tr>--}}
{{--                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">Document</th>--}}
{{--                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">Category</th>--}}
{{--                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">Date</th>--}}
{{--                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">Download</th>--}}
{{--                                </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                                @foreach($docs as $doc)--}}
{{--                                    <tr class="hover:bg-gray-100 border-b">--}}
{{--                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">--}}
{{--                                            <div>{{$doc->title}}</div>--}}
{{--                                            <div>{{$doc->description}}</div>--}}
{{--                                        </td>--}}
{{--                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$doc->category->name}}</td>--}}
{{--                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$doc->created_at}}</td>--}}
{{--                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">--}}
{{--                                            <button class="btn btn-green">Download</button>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
                    </div>
                </div>
            </div>
        </div>
    <!-- component -->
    <script src="https://cdn.tailwindcss.com"></script>
</x-app-layout>

