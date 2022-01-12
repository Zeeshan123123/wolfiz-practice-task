<x-app-layout>
    <x-slot name="header">
        <div class="inline-flex items-center">
            <h2 class="float-left font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Companies') }}
            </h2>
            <a class="bg-indigo-50 font-bold hover:bg-grey inline-flex items-center ml-12 px-4 py-2 rounded text-grey-darkest"
               href="{{ route('companies.create') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                <span>New Company</span>
            </a>
        </div>
    </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @if( $companies->count() )
                        <x-alerts />
                        <x-table>
                            <x-slot name="header">
                                <x-table-col>Id</x-table-col>
                                <x-table-col>Name</x-table-col>
                                <x-table-col>Email</x-table-col>
                                <x-table-col>Website</x-table-col>
                                <x-table-col>Status</x-table-col>
                                <x-table-col>Created</x-table-col>
                                <x-table-col>Actions</x-table-col>
                            </x-slot>
                            @foreach($companies as $company)
                                <tr>
                                    <x-table-col>
                                        {{ $company->id }}
                                    </x-table-col>
                                    
                                    <x-table-col>
                                        <a href="{{ route('companies.show', $company) }}">
                                            {{ $company->name }}
                                        </a>
                                    </x-table-col>
                                    
                                    <x-table-col>
                                        {{ $company->email }}
                                    </x-table-col>
                                    
                                    <x-table-col>
                                        {{ $company->website }}
                                    </x-table-col>

                                    <x-table-col>
                                        {{ $company->status }}
                                    </x-table-col>

                                    <x-table-col>
                                        {{ ( $company->created_at ) ? $company->created_at->diffForHumans():'' }}
                                    </x-table-col>
                                    
                                    <x-table-col>
                                        <form class="inline-flex items-center" action="{{ route('companies.destroy', $company) }}" method="POST">
                                            <a class="bg-indigo-50 hover:bg-grey text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center"
                                               href="{{ route('companies.show', $company) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                </svg>

                                                <span class="ml-2">Show</span>
                                            </a>
                                            <a class="bg-indigo-50 ml-2 hover:bg-grey text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center"
                                               href="{{ route('companies.edit', $company) }}">
                                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="#212121" d="M13.6568542,2.34314575 C14.4379028,3.12419433 14.4379028,4.39052429 13.6568542,5.17157288 L6.27039414,12.558033 C5.94999708,12.87843 5.54854738,13.105727 5.10896625,13.2156223 L2.81796695,13.7883721 C2.45177672,13.8799197 2.12008033,13.5482233 2.21162789,13.182033 L2.78437771,10.8910338 C2.894273,10.4514526 3.12156995,10.0500029 3.44196701,9.72960586 L10.8284271,2.34314575 C11.6094757,1.56209717 12.8758057,1.56209717 13.6568542,2.34314575 Z M10.1212441,4.46435931 L4.14907379,10.4367126 C3.95683556,10.6289509 3.82045738,10.8698207 3.75452021,11.1335694 L3.38388341,12.6161166 L4.86643062,12.2454798 C5.1301793,12.1795426 5.37104912,12.0431644 5.56328736,11.8509262 L11.5352441,5.87835931 L10.1212441,4.46435931 Z M11.5355339,3.05025253 L10.8282441,3.75735931 L12.2422441,5.17135931 L12.9497475,4.46446609 C13.3402718,4.0739418 13.3402718,3.44077682 12.9497475,3.05025253 C12.5592232,2.65972824 11.9260582,2.65972824 11.5355339,3.05025253 Z"/></svg>
                                                <span>Edit</span>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-indigo-50 ml-2 hover:bg-red text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center" onclick="return confirm('Do you want to delete the company?')">
                                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" id="Layer_1" x="0" y="0" version="1.1" viewBox="0 0 29 29" xml:space="preserve"><path d="M19.795 27H9.205a2.99 2.99 0 0 1-2.985-2.702L4.505 7.099A.998.998 0 0 1 5.5 6h18a1 1 0 0 1 .995 1.099L22.78 24.297A2.991 2.991 0 0 1 19.795 27zM6.604 8L8.21 24.099a.998.998 0 0 0 .995.901h10.59a.998.998 0 0 0 .995-.901L22.396 8H6.604z"/><path d="M26 8H3a1 1 0 110-2h23a1 1 0 110 2zM14.5 23a1 1 0 01-1-1V11a1 1 0 112 0v11a1 1 0 01-1 1zM10.999 23a1 1 0 01-.995-.91l-1-11a1 1 0 01.905-1.086 1.003 1.003 0 011.087.906l1 11a1 1 0 01-.997 1.09zM18.001 23a1 1 0 01-.997-1.09l1-11c.051-.55.531-.946 1.087-.906a1 1 0 01.905 1.086l-1 11a1 1 0 01-.995.91z"/><path d="M19 8h-9a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h9a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1zm-8-2h7V4h-7v2z"/></svg>
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </x-table-col>
                                </tr>
                            @endforeach
                        </x-table>
                        <div class="px-4 py-4">
                            {{ $companies->links() }}
                        </div>
                    @else
                        <p class="p-6 text-center font-bold">No company exists.</p>
                    @endif
                </div>
            </div>
        </div>
</x-app-layout>
