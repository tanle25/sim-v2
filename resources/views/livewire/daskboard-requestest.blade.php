<div>
    {{-- Do your work, then step back. --}}
    <div class="bg-white shadow-md rounded my-6">
        {{-- <div class="mb-2 ">
            <div class="px-3 py-5 bg-white rounded shadow-lg border border-gray-50"> --}}
                <h2 class=" text-xl font-bold">Danh sách yêu cầu</h2>
            {{-- </div> --}}
        {{-- </div> --}}
        <table class="min-w-max w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Khách hàng</th>
                    <th class="py-3 px-6 text-left">Số điện thoại</th>
                    <th class="py-3 px-6 text-center">Yêu cầu</th>
                    <th class="py-3 px-6 text-center">Thời gian yêu cầu</th>
                    <th class="py-3 px-6 text-center"></th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($requestests as $request )
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <span class="font-medium">{{$request->user->name}}</span>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <span>{{$request->sim->phone}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span>{{config("constrains.status.".$request->status_to)}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class=" py-1 px-3 text-xs">{{$request->created_at->format('d-m-Y')}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex item-center justify-center">
                            <div wire:click='accept({{$request->id}})' class="w-4 group mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer" title="Gia hạn">
                                <a href="javascript:;">
                                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                                </a>
                                <span class="bg-gray-50 text-blue-900 invisible transition-opacity duration-500 ease-in-out opacity-0 group-hover:opacity-100 group-hover:visible absolute px-4 py-0.5 -right-2 -top-7 whitespace-nowrap rounded-md">Xác nhận</span>
                            </div>

                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <div class=" py-4">
            {{ $requestests->links('pagination::tailwind') }}
        </div>
    </div>
</div>
