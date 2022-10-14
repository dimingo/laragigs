<x-layout>
    <x-card 
    class="p-10 max-w-[80%] mx-auto mt-12"
    >
        
            <header>
                <h1
                    class="text-3xl text-center font-bold my-6 uppercase"
                >
                    Manage Gigs
                </h1>
            </header>

            <table class="w-full table-auto rounded-sm">
                <tbody>
                    {{-- loop through listings --}}
                    @unless($listings->isEmpty())
                    @foreach ($listings as $listing)
                    <tr class="border-gray-300">
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <a href="show.html">
                              {{$listing->title}} 
                            </a>
                        </td>
                        <td
                            class=" py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <a
                                href="/listings/{{$listing->id}}/edit"
                                class="text-blue-400 py-2 rounded-xl"
                                ><i
                                    class="fa-solid fa-pen-to-square"
                                ></i>
                                Edit</a
                            >
                        </td>
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                        <form method="POST" action="/listings/{{$listing->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" >
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                    @else  
                    <tr class="border-gray-300">
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <a href="show.html">
                                No listings found
                             
                            </a>
                        </td>
                        {{-- <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <a
                                href="edit.html"
                                class="text-blue-400 px-6 py-2 rounded-xl"
                                ><i
                                    class="fa-solid fa-pen-to-square"
                                ></i>
                                Edit</a
                            >
                        </td>
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        > --}}
                            {{-- <form action="">
                                <button class="text-red-600">
                                    <i
                                        class="fa-solid fa-trash-can"
                                    ></i>
                                    Delete
                                </button>
                            </form> --}}
                        </td>
                    </tr>
                    @endunless 

                </tbody>
            </table>
       
    </x-card>


</x-layout>