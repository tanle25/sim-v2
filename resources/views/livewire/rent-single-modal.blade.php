<div>
    {{-- Be like water. --}}
    <div
          class="container mx-auto p-4 mb-4"
          x-data="{ tab: 'tab1' }"
        >
            <h2 class="text-2xl font-bold">Cho thuê sim</h2>
            <ul class="flex border-b mt-2">
                <li class="-mb-px mr-1">
                    <a class="inline-block rounded-t py-2 px-4 font-semibold hover:text-blue-800"
                        :class="{ 'bg-white text-blue-700 border-l border-t border-r' : tab === 'tab1' }" href="#"
                        @click.prevent="tab = 'tab1'"
                    >Khách hàng cũ</a>
                </li>
                <li class="-mb-px mr-1">
                    <a class="inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold"
                        :class="{ 'bg-white text-blue-700 border-l border-t border-r' : tab === 'tab2' }" href="#"
                        @click.prevent="tab = 'tab2'"
                >Khách hàng mới</a>
                </li>

            </ul>
            <div class="content bg-white px-4 py-4 border-l border-r border-b pt-4">
                <div
                   x-show="tab === 'tab1'"
                >
                    <form wire:submit.prevent='submit'>
                        <div class="relative my-5">
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
                            <div class="">
                                @error('sim.price_in') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                            </div>
                            <div class="">
                                @error('sim.status') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
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
                                @error('contract.price_out') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                                <input wire:model='contract.price_out' type="number" placeholder="Giá" class="w-full px-3 py-2.5 border border-gray-200 h-full form-control focus:outline-none inline-block rounded-md shadow-sm">
                            </div>

                            <div class="my-2">
                                @error('contract.exprired_at') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                                <input wire:model='contract.exprired_at' type="date" class=" h-full form-control border px-3 py-2 border-gray-200 focus:outline-none inline-block w-full rounded-md shadow-sm">
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
                        <button wire:click="$emit('closeModal')" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Huỷ</button>
                    </form>
                </div>
                <div
                   x-show="tab === 'tab2'"
                >
                    <form wire:submit.prevent='createCustomer'>
                        <div class="">
                            <div class="">
                                @error('sims.*.network_id') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                            </div>
                            <div class="">
                                @error('sim.price_in') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                            </div>
                            <div class="">
                                @error('sim.status') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                            </div>
                            <div class="my-2">
                                @error('customer.name') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                                <input wire:model='customer.name' type="text" placeholder="Họ tên" class="w-full px-3 py-2.5 border border-gray-200 h-full form-control focus:outline-none inline-block rounded-md shadow-sm">
                            </div>

                            <div class="my-2">
                                @error('customer.address') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                                <input wire:model='customer.address' type="text" placeholder="Địa chỉ" class="w-full px-3 py-2.5 border border-gray-200 h-full form-control focus:outline-none inline-block rounded-md shadow-sm">
                            </div>
                            <div class="my-2">
                                @error('customer.facebook') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                                <input wire:model='customer.facebook' type="text" placeholder="Facebook" class="w-full px-3 py-2.5 border border-gray-200 h-full form-control focus:outline-none inline-block rounded-md shadow-sm">
                            </div>
                            <div class="my-2">
                                @error('contract.price_out') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                                <input wire:model='contract.price_out' type="number" placeholder="Giá" class="w-full px-3 py-2.5 border border-gray-200 h-full form-control focus:outline-none inline-block rounded-md shadow-sm">
                            </div>

                            <div class="my-2">
                                @error('contract.exprired_at') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                                <input wire:model='contract.exprired_at' type="date" class=" h-full form-control border px-3 py-2 border-gray-200 focus:outline-none inline-block w-full rounded-md shadow-sm">
                            </div>
                        </div>
                        <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            OK
                        </button>
                        <button wire:click="$emit('closeModal')" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Huỷ</button>
                    </form>
                </div>

            </div>
        </div>
</div>
