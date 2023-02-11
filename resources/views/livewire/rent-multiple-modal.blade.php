<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    {{-- @dd($custommers) --}}
    <div class="relative w-full h-full max-w-md md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button  wire:click="$emit('closeModal')" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <form wire:submit.prevent='submit'>
                <div class="p-6 text-center">
                    {{-- <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> --}}
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Phân phối sim cho đại lý / Cộng tác viên</h3>

                {{-- Start input --}}
                <div class="relative mt-5">
                    <div class="">
                        @error('sims') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                    </div>
                    <div class="">
                        @error('sims.*.network_id') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                    </div>
                    <div class="">
                        @error('sims.*.status') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                    </div>
                    <div class="">
                        @error('user.id') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                    </div>
                    <span class="inline-block w-full rounded-md shadow-sm">
                        <button type="button" aria-haspopup="listbox" class="relative z-0 w-full py-2.5 pl-3 pr-10 text-left transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md cursor-default focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                        <input
                            wire:model="query"
                            wire:keydown.escape="resetInput"
                            wire:keydown.tab="resetInput"
                            wire:keydown.arrow-up="decrementHighlight"
                            wire:keydown.arrow-down="incrementHighlight"
                            wire:keydown.enter="selectContact"
                        placeholder="Nhập tên đại lý / Cộng tác viên" type="search" class="w-full h-full px-2.5 form-control focus:outline-none"/>
                        <span
                            class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                            <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                        </button>
                    </span>


                    {{-- End input --}}
                    @if(!empty($query) && $isShow)
                        {{-- <div class="fixed top-0 bottom-0 left-0 right-0" wire:click="reset"></div> --}}

                        <div class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group rounded overflow-y-auto">
                            @if(!empty($contacts))
                                @foreach($contacts as $i => $contact)
                                    <a wire:click='selectedUser({{$contact['id']}})' class="list-item list-none py-2 hover:bg-blue-400 hover:text-white hover:cursor-pointer {{ $highlightIndex === $i ? 'highlight' : '' }}">{{ $contact['name'] }}</a>
                                @endforeach
                            @else
                                <div class="list-item">No results!</div>
                            @endif
                        </div>
                    @endif

                </div>
                <div class="">
                    <div class="my-2">
                        @error('price') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                        <input wire:model='price' type="number" placeholder="Giá" class="w-full px-3 py-2.5 border border-gray-200 h-full form-control focus:outline-none inline-block rounded-md shadow-sm">
                    </div>

                    <div class="my-2">
                        @error('date') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                        <input wire:model='date' type="date" class=" h-full form-control border px-3 py-2 border-gray-200 focus:outline-none inline-block w-full rounded-md shadow-sm">
                    </div>
                    <div class="my-2">
                        {{-- <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Upload file</label> --}}
                        @error('image') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                        <label class="block">
                            <span class="sr-only">Choose profile photo</span>
                            <input wire:model='image' type="file" class="block w-full text-sm text-slate-500
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-full file:border-0
                              file:text-sm file:font-semibold
                              file:bg-violet-50 file:text-violet-700
                              hover:file:bg-violet-100
                            "/>
                          </label>
                    </div>
                </div>
                    <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        OK
                    </button>
                    <button  wire:click="$emit('closeModal')" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Huỷ</button>
                </div>
            </form>

        </div>
    </div>
</div>
