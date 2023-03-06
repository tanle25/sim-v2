<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    @livewire('livewire-toast')

    <div class="py-5">

        <div class="flex justify-between px-3">
            <div class="">
                <input wire:model.lazy='perPage' type="number" class="px-3 py-2.5 border border-gray-200 rounded w-20 " autocomplete="off">
                <input wire:model='keyword' type="text" class="px-3 py-2.5 border border-gray-200 rounded " autocomplete="off" placeholder="Số điện thoại, iccid">
            </div>
            <div class=" ml-2 flex">
                {{-- <button wire:click='bulkAction' class="px-3 py-2.5 rounded border border-gray-200">
                    Hành động
                </button> --}}
                <div class="">
                    <div
                    x-data="{ open: false }"
                    class="relative"
                  >
                    <button
                        @if (count($sims) <=0)
                            disabled
                        @endif
                      x-on:click="open = true"
                      class="flex items-center {{count($sims) <= 0 ? 'bg-gray-50' : ''}} z-10 bg-white focus:bg-gray-400 text-gray-700 focus:text-gray-900 font-semibold rounded focus:outline-none focus:shadow-inner border border-gray-200 py-2.5 px-4"
                      type="button"
                    >
                       <span class="mr-1">Hành động</span>
                       <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"  style="margin-top:3px">
                          <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                       </svg>
                    </button>
                    <ul
                      x-show="open"
                      x-on:click.away="open = false"
                      class="bg-white text-gray-700 rounded shadow-lg absolute py-2 mt-1"
                      style="min-width:15rem"
                     >
                      <li>
                        <a wire:click="bulkAction" href="javascript:;"  class="block hover:bg-gray-200 whitespace-no-wrap py-2 px-4">
                          Phân phối sim
                        </a>
                      </li>
                      <li>
                        <a wire:click="bulkUpdate" href="javascript:;" class="block hover:bg-gray-200 whitespace-no-wrap py-2 px-4">
                          Cập nhật nhà mạng
                        </a>
                      </li>

                      <li>
                        <a wire:click="bulkUpdateInfo" href="javascript:;" class="block hover:bg-gray-200 whitespace-no-wrap py-2 px-4">
                          Cập nhật thông tin sim
                        </a>
                      </li>

                      <li>
                        <a wire:click="exportSelected" href="javascript:;" class="block hover:bg-gray-200 whitespace-no-wrap py-2 px-4">
                          Export sim đã chọn
                        </a>
                      </li>

                    </ul>
                  </div>
                </div>
                <button wire:click='exportAll' class="px-3 py-2.5 rounded border border-gray-200 hover:bg-gray-100">
                    Export
                </button>
                <button class="px-3 py-2.5 rounded border border-gray-200 hover:bg-gray-100">
                    Import
                </button>
                <button wire:click="$emit('openModal', 'add-sim-modal')" class="px-3 py-2.5 hover:bg-gray-100 rounded border border-gray-200">
                    Thêm
                </button>
                <div class="relative" x-data="{ isOpen: false}">
                    <button
                            @click="isOpen = !isOpen"
                            @keydown.escape="isOpen = false"
                            class="flex items-center px-3 py-2.5 hover:bg-gray-100 rounded border border-gray-200"
                    >

                    <div class=" text-gray-700">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class=" w-5 h-5" viewBox="0 0 1024 1024" version="1.1"><path d="M859.02 234.524l0.808-0.756 0.749-0.813c27.047-29.356 33.876-70.34 17.823-106.957-15.942-36.366-50.416-58.957-89.968-58.957H163.604c-38.83 0-73.043 22.012-89.29 57.444-16.361 35.683-10.632 76.301 14.949 106.004l0.97 1.126 280.311 266.85 2.032 312.074c0.107 16.502 13.517 29.805 29.995 29.805l0.2-0.001c16.568-0.107 29.912-13.626 29.804-30.194l-2.198-337.564-296.478-282.241c-9.526-11.758-11.426-26.933-5.044-40.851 6.446-14.059 19.437-22.452 34.75-22.452h624.828c15.6 0 28.69 8.616 35.017 23.047 6.31 14.391 3.924 29.831-6.354 41.497l-304.13 284.832 1.302 458.63c0.047 16.54 13.469 29.916 29.998 29.915h0.087c16.568-0.047 29.962-13.517 29.915-30.085L573.04 502.36l285.98-267.836z" fill=""/><path d="M657.265 595.287c0 16.498 13.499 29.997 29.997 29.997h243.897c16.498 0 29.997-13.498 29.997-29.997 0-16.498-13.499-29.997-29.997-29.997H687.262c-16.498 0-29.997 13.499-29.997 29.997z m273.894 138.882H687.262c-16.498 0-29.997 13.499-29.997 29.997s13.499 29.997 29.997 29.997h243.897c16.498 0 29.997-13.499 29.997-29.997 0-16.498-13.499-29.997-29.997-29.997z m0 168.878H687.262c-16.498 0-29.997 13.499-29.997 29.997s13.499 29.997 29.997 29.997h243.897c16.498 0 29.997-13.499 29.997-29.997 0-16.498-13.499-29.997-29.997-29.997z" fill=""/></svg>
                    </div>
                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z" class="heroicon-ui"></path></svg>
                    </button>
                    <div x-show="isOpen"
                    @click.away="isOpen = false"
                    class="absolute font-normal bg-white shadow overflow-hidden rounded w-48 border mt-2 py-1 right-0 z-20">

                    <ul
                        class=" max-h-96 overflow-y-auto"
                    >
                        <li class=" font-medium px-3 text-lg">Nhà mạng</li>
                        @foreach ($networks as $network )
                        <li >
                            <label class="flex items-center px-3 py-2 hover:bg-gray-200">
                                <input type="checkbox" class="p-3 w-5 h-5" wire:model='filterNetworks' value="{{$network->id}}">
                                <span class="ml-2">{{$network->name}}</span>
                            </label>
                        </li>
                        @endforeach


                        <li class=" font-medium px-3 text-lg">Trạng thái</li>
                        <li>
                            <label class="flex items-center px-3 py-2 hover:bg-gray-200">
                                <input type="checkbox" class="p-3 w-5 h-5" wire:model='filterStatus' value="0">
                                <span class="ml-2">Hoạt động</span>
                            </label>
                        </li>
                        <li>
                            <label class="flex items-center px-3 py-2 hover:bg-gray-200">
                                <input type="checkbox" class="p-3 w-5 h-5" wire:model='filterStatus' value="1">
                                <span class="ml-2">Tạm cắt</span>
                            </label>
                        </li>
                        <li>
                            <label class="flex items-center px-3 py-2 hover:bg-gray-200">
                                <input type="checkbox" class="p-3 w-5 h-5" wire:model='filterStatus' value="2">
                                <span class="ml-2">Huỷ</span>
                            </label>
                        </li>
                        <li>
                            <label class="flex items-center px-3 py-2 hover:bg-gray-200">
                                <input type="checkbox" class="p-3 w-5 h-5" wire:model='filterStatus' value="3">
                                <span class="ml-2">Đang làm mới</span>
                            </label>
                        </li>
                        <li class=" font-medium px-3 text-lg">Tình trạng</li>
                        <li>
                            <label class="flex items-center px-3 py-2 hover:bg-gray-200">
                                <input type="checkbox" class="p-3 w-5 h-5"  wire:model='filterRent' value="0">
                                <span class="ml-2">Chưa cho thuê</span>
                            </label>
                        </li>
                        <li>
                            <label class="flex items-center px-3 py-2 hover:bg-gray-200">
                                <input type="checkbox" class="p-3 w-5 h-5" wire:model='filterRent' value="1">
                                <span class="ml-2">Đang cho thuê</span>
                            </label>
                        </li>
                    </ul>
                    {{-- <button class=" w-full px-3 py-2.5 bg-green-600 text-white font-bold hover:bg-green-800 border rounded ">OK</button> --}}
                </div>

                </div>

            </div>
        </div>
        <div class="bg-white shadow-md rounded p-3 overflow-x-auto">
            <table class="min-w-max w-full table-auto overflow-x-auto border">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left border-l"><input type="checkbox" class="p-3 w-5 h-5" wire:model='checkedState'></th>
                        <th class="py-3 px-6 text-left border-l">Số điện thoại</th>
                        <th class="py-3 px-6 text-left border-l">ICCID</th>
                        <th class="py-3 px-6 text-left border-l border-white">ICCID cũ</th>
                        <th class="py-3 px-3 text-left border-l border-white">
                           Nhà mạng
                        </th>
                        <th class="py-3 px-6 text-left border-l border-white">Giá nhập</th>
                        <th class="py-3 px-6 text-left border-l border-white">Giá bán</th>
                        <th class="py-3 px-3 text-left border-l border-white">
                           Khách hàng
                        </th>
                        <th class="py-3 px-6 text-left border-l border-white">Loại KH</th>
                        <th class="py-3 px-6 text-left border-l border-white">Ngày nhập</th>
                        <th class="py-3 px-6 text-left border-l border-white">Ngày cho thuê</th>
                        <th class="py-3 px-6 text-left border-l border-white">Ngày hết hạn</th>
                        <th class="py-3 px-3 text-left border-l border-white">
                           Trạng thái
                        </th>
                        <th class="py-3 px-6 text-left border-l border-white"></th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($simCards as $sim )
                    {{-- @dd($sim) --}}
                    {{-- @dd($loop->count) --}}
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <input type="checkbox" class="p-3 w-5 h-5" wire:model='sims' value="{{$sim->id}}">
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <span class="font-medium">{{$sim->phone}}</span>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <span>{{$sim->iccid}}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span>{{$sim->old_iccid}}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span>{{$sim->network ? $sim->network->name : ''}}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span>{{number_format($sim->price_in)}}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span>{{number_format( $sim->owner->price ?? 0)}}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span>{{$sim->owner->userable->name ?? ''}}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span>{{$sim->owner->type ?? ''}}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span>{{$sim->imported_at ?? ''}}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span>{{$sim->owner->created_at ?? ''}}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span>{{$sim->owner->exprired_at ?? ''}}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{config("constrains.status.$sim->status")}}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="relative" x-data="{ isOpen: false}">
                                <button
                                        @click="isOpen = !isOpen"
                                        @keydown.escape="isOpen = false"
                                        class="flex items-center"
                                >
                                <svg class="inline-block h-6 w-6 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M12 6a2 2 0 110-4 2 2 0 010 4zm0 8a2 2 0 110-4 2 2 0 010 4zm-2 6a2 2 0 104 0 2 2 0 00-4 0z" />
                                </svg>
                                </button>
                                <ul x-show="isOpen"
                                    @click.away="isOpen = false"
                                    class="absolute font-normal z-10 text-left bg-white shadow overflow-hidden rounded w-52 border mt-2 py-1 right-5 {{$loop->count - $loop->index < 8 ? 'bottom-0' : ''}}"
                                >

                                    <li class="context-menu-item change-status" data-status="1">

                                        <a @click.away="isOpen = false" wire:click='changeStatus({{$sim->id}},0)' href="javascript:;"
                                            class="block py-2 px-4 hover:hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white">{{__('active')}}</a>
                                    </li>
                                    <li @click.away="isOpen = false" wire:click='$emit("openModal", "edit-sim-modal", {{ json_encode(["sim" => $sim->id]) }})'>
                                        <a href="javascript:;" class="btn-edit-sim block py-2 px-4 hover:hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white"
                                            >{{__('Edit')}}</a>
                                    </li>
                                    <li @click.away="isOpen = false" class="context-menu-item change-status">

                                        <a wire:click='changeStatus({{$sim->id}},1)'  href="javascript:;"
                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white">{{__('temporarily cut')}}</a>
                                    </li>
                                    <li @click.away="isOpen = false" class="context-menu-item change-status" >

                                        <a wire:click='changeStatus({{$sim->id}},2)'  href="javascript:;"
                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white">{{__('Cancel')}}</a>
                                    </li>
                                    <li @click.away="isOpen = false" class="context-menu-item change-status" >
                                        <a wire:click='changeStatus({{$sim->id}},3)'  href="javascript:;"
                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white">{{__('reset')}}</a>
                                    </li>
                                    <li @click.away="isOpen = false" class="invoice-btn">
                                        <a wire:click='$emit("openModal", "customer-infomation-modal", {{ json_encode(["id" => $sim->id]) }})' href="javascript:;" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white"
                                            >{{__('Customer inofmation')}}</a>
                                    </li>
                                    <li @click.away="isOpen = false">
                                        <a wire:click='$emit("openModal", "extend-modal", {{ json_encode(["sim" => $sim->id]) }})' href="javascript:;" class="rent-btn block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white">Gia hạn</a>
                                    </li>
                                    <li @click.away="isOpen = false">
                                        <a wire:click='$emit("openModal", "rent-single-modal", {{ json_encode(["sim" => $sim->id]) }})' href="javascript:;" class="rent-btn block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white"
                                            >{{__('rent')}}</a>
                                    </li>

                                    <li @click.away="isOpen = false" class="btn-delete-sim">
                                        <a wire:click='deleteSim({{$sim->id}})'
                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white">{{__('Delete')}}</a>
                                    </li>
                                    <li @click.away="isOpen = false" class="btn-history">
                                        <a href="{{url('lich-su-thay-doi', $sim->id)}}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white">{{__('Lịch sử
                                            thay đổi')}}</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
        <div class=" py-4">
            {{ $simCards->links('pagination::tailwind') }}
        </div>
    </div>


</div>
