<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="relative w-full h-full max-w-md md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button wire:click="$emit('closeModal')" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <form wire:submit.prevent='submit'>
                <div class="p-6 text-center">
                    {{-- <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> --}}
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Cập nhật thông tin sim</h3>

                    <div class=" text-left mb-3">
                        <label for="">Số điện thoại <span class="text-sm text-orange-500">(10-15 số)</span></label>
                        <div class="">
                            @error('sim.phone') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                        </div>
                        <input wire:model='sim.phone' type="number" class=" px-3 py-2.5 border border-gray-200 w-full rounded" placeholder="Số điện thoại">

                    </div>
                    <div class=" text-left mb-3">
                        <label for="">ICCID <span class="text-sm text-orange-500">(10-20 số)</span></label>
                        <div class="">
                            @error('sim.iccid') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                        </div>
                        <input  wire:model='sim.iccid' type="number" class=" px-3 py-2.5 border border-gray-200  w-full rounded" placeholder="Số điện thoại">

                    </div>

                    <div class=" text-left mb-3">
                        <label for="">Nhà mạng</label>
                        <div class="">
                            @error('sim.network_id') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                        </div>
                        <select wire:model='sim.network_id' class=" px-3 py-2.5 border border-gray-200  w-full rounded" >
                            <option>Chọn nhà mạng</option>
                            @foreach ($networks as $net )
                                <option value="{{$net->id}}">{{$net->name}}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" class=" px-3 py-2.5 border border-gray-200  w-full rounded" placeholder="Số điện thoại"> --}}
                    </div>
                    <div class=" text-left mb-3">
                        <label for="">Giá nhập</label>
                        <div class="">
                            @error('sim.price_in') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                        </div>
                        <input wire:model='sim.price_in' type="number" class=" px-3 py-2.5 border border-gray-200  w-full rounded" placeholder="Số điện thoại">
                    </div>
                    {{-- <div class=" text-left mb-3">
                        <label for="">Giá bán</label>
                        <div class="">
                            @error('sim.price_out') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                        </div>
                        <input wire:model='sim.price_out' type="number" class=" px-3 py-2.5 border border-gray-200  w-full rounded" placeholder="Số điện thoại">
                    </div> --}}
                    <div class=" text-left mb-3">
                        <label for="">Ngày nhập</label>
                        <div class="">
                            @error('sim.imported_at') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                        </div>
                        <input wire:model='sim.imported_at' type="date" class=" px-3 py-2.5 border border-gray-200  w-full rounded" placeholder="Số điện thoại">
                    </div>
                    <div class=" text-left mb-3">
                        <label for="">Ngày hết hạn</label>
                        <div class="">
                            @error('sim.expired_at') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                        </div>
                        <input wire:model='sim.expired_at' type="date" class=" px-3 py-2.5 border border-gray-200  w-full rounded" placeholder="Số điện thoại">
                    </div>
                    <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        OK
                    </button>
                    <button  wire:click="$emit('closeModal')" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                </div>
            </form>

        </div>
    </div>
</div>
