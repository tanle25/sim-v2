<div>
    {{-- Do your work, then step back. --}}
    <div class="relative w-full h-full max-w-md md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button wire:click="$emit('closeModal')" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400">Thêm khách hàng mới</h3>
                <form wire:submit.prevent='submit'>
                    <div class=" text-left my-5">
                        <div class="my-2">
                            <label for="">Họ tên</label>
                            <div class="">
                                @error('customer.name') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                            </div>
                            <input wire:model='customer.name' type="text" class="px-3 py-2.5 rounded border border-gray-200 w-full " placeholder="Họ tên">
                        </div>
                        <div class="my-2">
                            <label for="">Địa chỉ</label>
                            <div class="">
                                @error('customer.address') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                            </div>
                            <input wire:model='customer.address' type="text" class="px-3 py-2.5 rounded border border-gray-200 w-full " placeholder="Địa chỉ">
                        </div>
                        <div class="my-2">
                            <label for="">Facebook</label>
                            <div class="">
                                @error('customer.facebook') <span class=" text-red-500 text-sm">{{$message}}</span> @enderror
                            </div>
                            <input wire:model='customer.facebook' type="text" class="px-3 py-2.5 rounded border border-gray-200 w-full " placeholder="Facebook">
                        </div>
                    </div>
                    <button  type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        OK
                    </button>
                    <button wire:click="$emit('closeModal')" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Đóng</button>
                </form>

            </div>
        </div>
    </div>
</div>
