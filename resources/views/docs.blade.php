<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Document Center') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <table class="min-w-full w-full divide-y divide-gray-200 table-fixed">
                            <thead class="bg-gray-100 border-b-2">
                            <tr>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">Document</th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">Category</th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">Date</th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">Download</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($docs as $doc)
                                <tr class="hover:bg-gray-100 border-b">
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                        <div>{{$doc->title}}</div>
                                        <div>{{$doc->description}}</div>
                                    </td>
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$doc->documentcategory->name}}</td>
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{\Carbon\Carbon::parse($doc->created_at)->format('d m Y')}}</td>
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                        <button class="btn btn-green">Download</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <!-- component -->

</x-app-layout>

