<div>
    {{-- Be like water. --}}
    @livewire('livewire-toast')


    <div class="py-5">
        <div class=" flex justify-between px-3">
            <div class="flex">
                <input wire:model='start' type="date" class=" px-3 py-2.5 border border-gray-200 rounded mr-3">
                <input wire:model=stop type="date" class=" px-3 py-2.5 border border-gray-200 rounded">
            </div>
            <button wire:click='export' class="  px-5 py-2.5 border border-gray-200 rounded mr-3 hover:bg-gray-100">Export</button>
        </div>
        <div class="bg-white shadow-md rounded p-3 overflow-x-auto">
            <table class="min-w-max w-full table-auto overflow-x-auto border">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left border-l">Số điện thoại</th>
                        <th class="py-3 px-6 text-left border-l">ICCID</th>
                        <th class="py-3 px-3 text-left border-l border-white">
                           Nhà mạng
                        </th>
                        <th class="py-3 px-6 text-left border-l border-white">Giá nhập</th>
                        <th class="py-3 px-6 text-left border-l border-white">Giá cho thuê</th>
                        <th class="py-3 px-6 text-left border-l border-white">Ngày thuê</th>
                        <th class="py-3 px-6 text-left border-l border-white">Ngày hết hạn</th>
                        <th class="py-3 px-3 text-left border-l border-white">
                           Trạng thái
                        </th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($sims as $sim )
                    {{-- @dd($sim) --}}
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <span class="font-medium">{{$sim->sim->phone}}</span>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <span>{{$sim->sim->iccid}}</span>
                        </td>

                        <td class="py-3 px-6 text-center">
                            <span>{{$sim->sim->network->name ?? ''}}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span>{{number_format($sim->sim->price_in)}}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span>{{number_format($sim->price)}}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span>{{$sim->created_at->format('d-m-Y H:i')}}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span>{{$sim->exprired_at->format('d-m-Y')}}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span>{{config("constrains.status.".$sim->sim->status)}}</span>
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
