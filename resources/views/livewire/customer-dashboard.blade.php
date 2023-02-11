<div>
    {{-- Stop trying to control. --}}
    <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <div class="flex items-start rounded-xl bg-white p-4 shadow-lg">
            <div class="flex h-12 w-12 items-center justify-center rounded-full border border-blue-100 bg-blue-50">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" class="w-6 h-6" version="1.1" id="Layer_1" viewBox="0 0 511.893 511.893" xml:space="preserve">
                    <g>
                        <g>
                            <g>
                                <path d="M331.04,202.667H164.107c-14.507,0-25.493,12.053-25.493,27.947v186.133c0,15.04,9.707,31.253,25.493,31.253H331.04     c15.36,0,31.573-16.107,31.573-31.253V230.613C362.613,214.827,345.653,202.667,331.04,202.667z M341.28,416.747     c0,3.307-6.827,9.92-10.24,9.92h-21.76v-64c0-5.867-4.8-10.667-10.667-10.667c-5.867,0-10.667,4.8-10.667,10.667v64h-32v-64     c0-5.867-4.8-10.667-10.667-10.667c-5.867,0-10.667,4.8-10.667,10.667v64H213.28v-64c0-5.867-4.8-10.667-10.667-10.667     c-5.867,0-10.667,4.8-10.667,10.667v64h-27.84c-0.96,0-4.16-4.267-4.16-9.92V230.613c0-0.32,0-6.613,4.16-6.613h27.84v53.333     c0,5.867,4.8,10.667,10.667,10.667c5.867,0,10.667-4.8,10.667-10.667V224h21.333v53.333c0,5.867,4.8,10.667,10.667,10.667     c5.867,0,10.667-4.8,10.667-10.667V224h32v53.333c0,5.867,4.8,10.667,10.667,10.667c5.867,0,10.667-4.8,10.667-10.667V224h21.76     c4.587,0,10.24,4.48,10.24,6.613V416.747z" style="&#10;"/>
                                <path  d="M445.707,77.867l-64-64.747C373.6,4.8,362.4,0,350.667,0H97.333C73.013,0,53.28,19.947,53.28,44.48v422.933     c0,24.533,19.733,44.48,44.053,44.48H414.56c24.32,0,44.053-19.947,44.053-44.48V109.227     C458.613,97.493,454.027,86.187,445.707,77.867z M437.28,467.52c0.107,12.693-10.027,23.04-22.72,23.147H97.333     c-12.693-0.107-22.827-10.56-22.72-23.147V44.48c-0.107-12.587,10.027-23.04,22.72-23.147h253.333c5.973,0,11.84,2.453,16,6.72     L430.56,92.8c4.267,4.373,6.72,10.347,6.72,16.427V467.52z"/>
                            </g>
                        </g>
                    </g>
                    </svg>
            </div>

            <div class="ml-4">
                <h2 class="font-semibold">{{$totalSim}} Sim</h2>
                {{-- <p class="mt-2 text-sm text-gray-500">Last opened 4 days ago</p> --}}
            </div>
        </div>

        <div class="flex items-start rounded-xl bg-white p-4 shadow-lg">
            <div class="flex h-12 w-12 items-center justify-center rounded-full border border-orange-100 bg-orange-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>

            <div class="ml-4">
                <h2 class="font-semibold">{{$exprired}} Sim sắp hết hạn</h2>
                {{-- <p class="mt-2 text-sm text-gray-500">Last checked 3 days ago</p> --}}
            </div>
        </div>
        <div class="flex items-start rounded-xl bg-white p-4 shadow-lg">
            <div class="flex h-12 w-12 items-center justify-center rounded-full border border-red-100 bg-red-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>

            <div class="ml-4">
                <h2 class="font-semibold">{{$requestest}} yêu cầu</h2>
                <p class="mt-2 text-sm text-gray-500">Last authored 1 day ago</p>
            </div>
        </div>

    </div>

    {{-- Sim sap het han --}}

    <div class="py-5">

        {{-- <div class="flex justify-between px-3">
            <div class="">
                <input wire:model.lazy='perPage' type="number" class="px-3 py-2.5 border border-gray-200 rounded w-20 " autocomplete="off">
                <input wire:model='keyword' type="text" class="px-3 py-2.5 border border-gray-200 rounded " autocomplete="off" placeholder="Số điện thoại, iccid">
            </div>
            <button wire:click='export' class="px-5 py-2.5 border border-gray-200 rounded hover:bg-gray-100">Export</button>

        </div> --}}

        <div class="p-6 rounded-lg bg-white mb-3">
            <h3 class="font-bold text-xl">Sim sắp hết hạn</h3>
        </div>
        <div class="bg-white shadow-md rounded p-3 overflow-x-auto min-h-50vh">
            <table class="min-w-max w-full table-auto overflow-x-auto border">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left border-l">Số điện thoại</th>
                        <th class="py-3 px-6 text-left border-l">ICCID</th>
                        <th class="py-3 px-3 text-left border-l border-white">
                           Nhà mạng
                        </th>
                        <th class="py-3 px-6 text-left border-l border-white">Giá nhập</th>

                        <th class="py-3 px-6 text-left border-l border-white">Ngày thuê</th>
                        <th class="py-3 px-6 text-left border-l border-white">Ngày hết hạn</th>
                        <th class="py-3 px-3 text-left border-l border-white">
                           Trạng thái
                        </th>
                        <th class="py-3 px-6 text-left border-l border-white"></th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($sims as $sim )
                    <tr class="border-b border-gray-200 hover:bg-gray-100">

                        <td class="py-3 px-6 text-left whitespace-nowrap border-l-gray-100 border-l">
                            <span class="font-medium">{{$sim->sim->phone}}</span>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <span>{{$sim->sim->iccid}}</span>
                        </td>

                        <td class="py-3 px-6 text-center border-l-gray-100 border-l">
                            <span>{{$sim->sim->network->name ?? ''}}</span>
                        </td>
                        <td class="py-3 px-6 text-center border-l-gray-100 border-l">
                            <span>{{number_format($sim->price)}}</span>
                        </td>
                        <td class="py-3 px-6 text-center border-l-gray-100 border-l">
                            <span>{{$sim->created_at->format('d-m-Y') ?? ''}}</span>
                        </td>

                        <td class="py-3 px-6 text-center border-l-gray-100 border-l">
                            <span>{{$sim->exprired_at->format('d-m-Y') ?? ''}}</span>
                        </td>
                        <td class="py-3 px-6 text-center border-l-gray-100 border-l">
                            <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{config("constrains.status.".$sim->sim->status)}}</span>
                        </td>
                        <td class="py-3 px-6 text-right">
                            <div class="relative" x-data="{ isOpen: false}">
                                <button
                                        @click="isOpen = !isOpen"
                                        @keydown.escape="isOpen = false"
                                        class=""
                                >
                                <svg class="inline-block h-6 w-6 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M12 6a2 2 0 110-4 2 2 0 010 4zm0 8a2 2 0 110-4 2 2 0 010 4zm-2 6a2 2 0 104 0 2 2 0 00-4 0z" />
                                </svg>
                                </button>
                                <ul x-show="isOpen"
                                    @click.away="isOpen = false"
                                    class="absolute font-normal z-10 text-left bg-white shadow overflow-hidden rounded w-52 border mt-2 py-1 right-5  {{$loop->count > 5 && $loop->count - $loop->index < 3 ? 'bottom-0' : ''}}"
                                >

                                    <li class="context-menu-item change-status" data-status="1">

                                        <a wire:click='changeStatus({{$sim->sim->id}},0)' href="javascript:;"
                                            class="block py-2 px-4 hover:hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white">{{__('active')}}</a>
                                    </li>

                                    <li class="context-menu-item change-status">

                                        <a wire:click='changeStatus({{$sim->sim->id}},1)'  href="javascript:;"
                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white">{{__('temporarily cut')}}</a>
                                    </li>
                                    <li class="context-menu-item change-status" >

                                        <a wire:click='changeStatus({{$sim->sim->id}},2)'  href="javascript:;"
                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white">{{__('Cancel')}}</a>
                                    </li>
                                    <li class="context-menu-item change-status" >
                                        <a wire:click='changeStatus({{$sim->sim->id}},3)'  href="javascript:;"
                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white">{{__('reset')}}</a>
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
            {{ $sims->links('pagination::tailwind') }}
        </div>
    </div>
</div>

