
<div class="max-w-4xl mx-auto mt-8">
    <div class="mb-4">
        <h1 class="text-3xl font-bold">
            Add New Movies
        </h1>
        <div class="flex justify-end mt-5">
            
        </div>
    </div>

    <div class="flex flex-col mt-5">
        <div class="flex flex-col">
            <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">

                @if ($errors->any())
                    <div class="p-3 rounded bg-red-500 text-white m-3">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">

                        <form>
                        @csrf

                        <div>
                            <label class="block text-sm font-bold text-gray-700" for="title">Title</label>
                            <input type="text"  wire:model="title" name="title" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Name">
                        </div>
                        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
                        <div>
                            <label class="block text-sm font-bold text-gray-700" >release date</label>
                            <input type="date" name="release_date" wire:model="release_date" />
                        </div>
                        @error('release_date') <span class="text-danger">{{ $message }}</span>@enderror
                        <div class="mt-4">
                            <label class="block text-sm font-bold text-gray-700" for="overview">overview:</label>
                            <textarea  wire:model="overview" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="overview" placeholder="Body"></textarea>
                        </div>
                        @error('overview') <span class="text-danger">{{ $message }}</span>@enderror
                        
                        <div class="flex items-center justify-start mt-4 gap-x-2">
                            <button wire:click.prevent="store()" class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-green-100 bg-green-500 hover:bg-green-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">Submit</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>