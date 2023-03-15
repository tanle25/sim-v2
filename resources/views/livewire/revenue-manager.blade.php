<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    @livewire('livewire-toast')

    <div class="py-5">
        <div class=" flex justify-between px-3">
            <div class=" flex">
                <input wire:model='start'  type="date" class=" px-3 mr-3 py-2.5 border border-gray-200 rounded" placeholder="Tìm kiếm...">
                <input wire:model='stop'  type="date" class=" px-3 py-2.5 border border-gray-200 rounded" placeholder="Tìm kiếm...">

            </div>
            {{-- <button class="px-3 py-2.5 rounded border border-gray-200 hover:bg-gray-100">Thêm</button> --}}

            <div class=" flex">
                <button wire:click='export' class=" px-3 py-2.5 mr-3 rounded border border-gray-200 hover:bg-gray-200">Export</button>

                <div class="relative px-3 py-2.5 rounded border border-gray-200 hover:bg-gray-200" x-data="{ isOpen: false}">
                    <button
                            @click="isOpen = !isOpen"
                            @keydown.escape="isOpen = false"
                            class="flex items-center"
                    >
                        {{-- <img src="http://www.gravatar.com/avatar?d=mm" alt="avatar" class="w-8 h-8 rounded-full"> --}}
                        <svg class=" w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M40 64C24.2 64 9.9 73.3 3.5 87.7s-3.8 31.3 6.8 43L112 243.8V368c0 10.1 4.7 19.6 12.8 25.6l64 48c9.7 7.3 22.7 8.4 33.5 3s17.7-16.5 17.7-28.6V243.8l101.7-113c10.6-11.7 13.2-28.6 6.8-43S327.8 64 312 64H40zM352 384c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H352zM320 256c0 17.7 14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H352c-17.7 0-32 14.3-32 32zM416 64c-17.7 0-32 14.3-32 32s14.3 32 32 32h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H416z"/></svg>
                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z" class="heroicon-ui"></path></svg>
                    </button>
                    <ul x-show="isOpen"
                        @click.away="isOpen = false"
                        class="absolute font-normal bg-white shadow overflow-hidden rounded w-48 border mt-2 py-1 right-0 z-20"
                    >
                        <li>

                            <label class="flex items-center px-3 py-3 hover:bg-gray-200">
                                <input wire:model='types' value="1" type="checkbox" class=" w-5 h-5">
                                <span class="px-3">Gia hạn</span>
                            </label>
                        </li>
                        <li>
                            <label class="flex items-center px-3 py-3 hover:bg-gray-200">
                                <input wire:model='types' value="0" type="checkbox" class=" w-5 h-5">
                                <span class="px-3">Cho thuê</span>
                            </label>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
        <div class="bg-white shadow-md rounded p-3 overflow-x-auto relative">
            <table class="min-w-max w-full table-auto overflow-x-auto border">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left border-l">Khách hàng</th>
                        <th class="py-3 px-6 text-left border-l">Số điện thoại</th>
                        <th class="py-3 px-6 text-left border-l">Loại</th>
                        <th class="py-3 px-6 text-left border-l">Loại khách hàng</th>
                        <th class="py-3 px-6 text-left border-l">Giá nhập</th>
                        <th class="py-3 px-6 text-left border-l">Giá cho thuê</th>
                        <th class="py-3 px-6 text-left border-l">Lợi nhuận</th>
                        <th class="py-3 px-6 text-left border-l">Ngày tạo</th>
                        <th class="py-3 px-6 text-left border-l">Ngày hết hạn</th>
                        <th class="py-3 px-3 text-left border-l border-white">
                        </th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($invoices as $invoice )
                    <tr class="border-b border-gray-200 hover:bg-gray-100">

                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <span class="font-medium">{{$invoice->invoiceable->name ?? ''}}</span>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <span class="font-medium">{{$invoice->sim->phone ?? ''}}</span>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <span class="font-medium">{{$invoice->type == 0 ?'Cho thuê' : 'Gia hạn'}}</span>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <span class="font-medium">{{$invoice->sim->owner->type ?? ''}}</span>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <span class="font-medium">{{number_format($invoice->price_in)}}</span>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <span class="font-medium">{{number_format($invoice->price_out)}}</span>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <span class="font-medium">{{number_format($invoice->price_out - $invoice->price_in)}}</span>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <span class="font-medium">{{$invoice->rent_at}}</span>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <span class="font-medium">{{$invoice->exprired_at}}</span>
                        </td>
                        <td class="py-3 px-6 text-right">
                            <button wire:click='$emit("openModal", "edit-admin-modal", {{ json_encode(["user" => $invoice->id]) }})' class="text-green-600 px-3 hover:text-green-800">
                                <svg fill="none" stroke="currentColor" class="w-6 h-6" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"></path>
                                  </svg>
                            </button>
                            <button wire:click='$emit("openModal", "delete-admin-modal", {{ json_encode(["user" => $invoice->id]) }})'  class="text-red-500 px-3 hover:text-red-700">
                                <svg fill="none" stroke="currentColor" class="w-6 h-6" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                  </svg>
                            </button>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left border-l border-white">Tổng</th>
                        <th class="py-3 px-6 text-left border-l border-white"></th>
                        <th class="py-3 px-6 text-left border-l border-white"></th>
                        <th class="py-3 px-6 text-left border-l border-white"></th>
                        <th class="py-3 px-6 text-left border-l border-white">{{number_format($priceIn)}}</th>
                        <th class="py-3 px-6 text-left border-l border-white">{{number_format($priceOut)}}</th>
                        <th class="py-3 px-6 text-left border-l border-white">{{number_format($priceOut - $priceIn)}}</th>
                        <th class="py-3 px-3 text-left border-l border-white">
                        </th>
                        <th class="py-3 px-3 text-left border-l border-white">
                        </th>
                        <th class="py-3 px-3 text-left border-l border-white">
                        </th>
                    </tr>
                </tfoot>
            </table>
            <div wire:loading class="flex absolute top-1/2 left-1/2 justify-center items-center w-full h-full">
                <div class="relative w-24 h-24 animate-spin rounded-full bg-gradient-to-r from-purple-400 via-blue-500 to-red-400 ">
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-20 h-20 bg-gray-200 rounded-full border-2 border-white"></div>
                </div>
            </div>
        </div>
        <div class=" py-4">
            {{ $invoices->links('pagination::tailwind') }}
        </div>

    </div>

</div>
