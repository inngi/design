<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                            <div
                                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                                @if (str_contains($nasa['url'], 'youtube'))
                                    <iframe class=" object-center rounded" width="100%" height="500" src="{{ $nasa['url'] }}">
                                    </iframe>
                                @else
                                    <img class="object-cover object-center rounded" alt="hero"
                                        src="{{ $nasa['url'] }}">
                                @endif

                            </div>
                            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">

                                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                                    {{ $nasa['title'] }}
                                    {{-- <br class="hidden lg:inline-block "> --}}
                                </h1>
                                <p class="text-md text-right">{{ $nasa['copyRight'] }}</p>

                                <p class="mb-8 mt-3 leading-relaxed">{{ $nasa['explanation'] }}
                                </p>
                                <p class="text-md text-right"><span class="italic">{{ $nasa['date'] }} from Nasa
                                        APOD<br>(Astronomy Picture of the Day)</span></p>

                                {{-- <div class="flex justify-center">
                                    <button
                                        class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
                                    <button
                                        class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Button</button>
                                </div> --}}
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
