<div>
    {{-- The whole world belongs to you. --}}

    <div class="bg-white shadow-md rounded my-6">
        {{-- <div class="mb-2 ">
            <div class="px-3 py-5 bg-white rounded shadow-lg border border-gray-50"> --}}
                <h2 class=" text-xl font-bold">Sim sắp hết hạn</h2>
            {{-- </div>
        </div> --}}
        <table class="min-w-max w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Khách hàng</th>
                    <th class="py-3 px-6 text-left">Số điện thoại</th>
                    <th class="py-3 px-6 text-center">Ngày hết hạn</th>
                    <th class="py-3 px-6 text-center">Trạng thái</th>
                    <th class="py-3 px-6 text-center"></th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($sims as $sim )
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <span class="font-medium">{{$sim->userable->name}}</span>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <span>{{$sim->sim->phone}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span>{{$sim->exprired_at->format('d-m-Y')}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{config("constrains.status.".$sim->sim->status)}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex item-center justify-center">
                            <div wire:click='$emit("openModal", "extend-modal", {{ json_encode(["sim" => $sim->sim->id]) }})' class="w-4 group mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer" title="Gia hạn">
                                <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M128 0C110.3 0 96 14.3 96 32V64H48C21.5 64 0 85.5 0 112v48H448V112c0-26.5-21.5-48-48-48H352V32c0-17.7-14.3-32-32-32s-32 14.3-32 32V64H160V32c0-17.7-14.3-32-32-32zM256 368c0-91.8 70.3-167.2 160-175.3V192H0V464c0 26.5 21.5 48 48 48H330.8C285.6 480.1 256 427.5 256 368zM432 512c79.5 0 144-64.5 144-144s-64.5-144-144-144s-144 64.5-144 144s64.5 144 144 144zm16-208v48h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V384H368c-8.8 0-16-7.2-16-16s7.2-16 16-16h48V304c0-8.8 7.2-16 16-16s16 7.2 16 16z"/></svg>
                                <span
                                class="bg-gray-50 text-blue-900 invisible transition-opacity duration-500 ease-in-out opacity-0 group-hover:opacity-100 group-hover:visible absolute px-4 py-0.5 -right-2 -top-7 whitespace-nowrap rounded-md">Gia hạn</span>
                            </div>
                            <div class="w-4 mr-2 group transform cursor-pointer hover:text-purple-500 hover:scale-110">
                                <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>
                                <span
                                class="bg-gray-50 text-blue-900 invisible transition-opacity duration-500 ease-in-out opacity-0 group-hover:opacity-100 group-hover:visible absolute px-4 py-0.5 -right-2 -top-7 whitespace-nowrap rounded-md">Huỷ sim</span>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <div class=" py-4">
            {{ $sims->links('pagination::tailwind') }}
        </div>
    </div>
</div>
