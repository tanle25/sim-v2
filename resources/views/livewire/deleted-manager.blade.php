<div>
    {{-- In work, do what you enjoy. --}}
    @livewire('livewire-toast')

    <div class="py-5">

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
                        <th class="py-3 px-6 text-left border-l border-white">Ngày nhập</th>
                        <th class="py-3 px-6 text-left border-l border-white">Người thực hiện</th>
                        <th class="py-3 px-6 text-left border-l border-white">Thời gian</th>
                        <th class="py-3 px-3 text-left border-l border-white">
                           Trạng thái
                        </th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($histories as $sim )
                    <tr class="border-b border-gray-200 hover:bg-gray-100">

                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <span class="font-medium">{{$sim->phone}}</span>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <span>{{$sim->iccid}}</span>
                        </td>

                        <td class="py-3 px-6 text-center">
                            <span>{{$sim->network->name ?? ''}}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span>{{number_format($sim->price_in)}}</span>
                        </td>

                        <td class="py-3 px-6 text-center">
                            <span>{{$sim->imported_at ?? ''}}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span>{{$sim->performed->name ?? ''}}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span>{{$sim->created_at->format('d-m-Y H:i')}}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{config("constrains.status.$sim->status")}}</span>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class=" py-4">
            {{ $histories->links('pagination::tailwind') }}
        </div>
    </div>
</div>
