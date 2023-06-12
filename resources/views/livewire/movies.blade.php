<div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">  

        @include('livewire.create')
   

<div class="max-w-4xl mx-auto mt-8 mb-5">

    <div class="mb-4">
        <h1 class="text-3xl font-bold text-center">
            All Trending
            movises from database
        </h1>
    </div>

    <div class="flex justify-start mt-10">
        
        <button wire:click="crt()" class="px-2 py-1 rounded-md bg-blue-500  hover:bg-blue-700">+ Create New Movise</button>
    </div>

    <div class="flex flex-col mt-10 ">
        <div class="flex flex-col">
            <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">

                    @if ($message = Session::get('success'))
                        <div class="p-3 rounded bg-green-500 text-green-100 mb-4 m-3">
                            <span>{{ $message }}</span>
                        </div>
                    @endif

                 <table class="min-w-full">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">#</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Title</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Image</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Overview</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Release Date</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50" width="180px">Action</th>
                    </tr>
                    <tbody class="bg-white">
                        @foreach($movies as $value)
                        <tr>
                            <td class="px-6 whitespace-no-wrap border-b border-gray-200">{{ $value->id }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $value->title }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"><img src="https://image.tmdb.org/t/p/w500//{{ $value->poster_path }}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150"></td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $value->overview }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $value->release_date }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              
                                    
                                    <button wire:click="edit({{ $value->id }})" class="text-indigo-600 hover:text-indigo-900 text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg></button>
                                    
                   
                              
                                    <button wire:click="delete({{ $value->id }})" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600 hover:text-red-800 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex mb-5 mt-5" style="padding-bottom: 9px; margin-left: 1em;"> {{ $movies->links("pagination::bootstrap-4")}}</div>
               
            </div>
        </div>
    </div>
</div>