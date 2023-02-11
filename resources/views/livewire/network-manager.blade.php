<div>
    {{-- In work, do what you enjoy. --}}
    @livewire('livewire-toast')

    <div class="py-5">
        <div class=" flex justify-end px-3">
            <button wire:click="$emit('openModal', 'create-network-modal')" class="px-3 py-2.5 rounded border border-gray-200 hover:bg-gray-100">Thêm</button>
        </div>
        <div class="bg-white shadow-md rounded p-3 overflow-x-auto">
            <table class="min-w-max w-full table-auto overflow-x-auto border">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left border-l">Tên nhà mạng</th>

                        <th class="py-3 px-3 text-left border-l border-white">

                        </th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($networks as $network )
                    <tr class="border-b border-gray-200 hover:bg-gray-100">

                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <span class="font-medium">{{$network->name}}</span>
                        </td>

                        <td class="py-3 px-6 text-right">
                            <button wire:click='$emit("openModal", "edit-network-modal", {{ json_encode(["network" => $network->id]) }})' class="text-green-600 px-3 hover:text-green-800">
                                <svg fill="none" stroke="currentColor" class="w-6 h-6" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"></path>
                                  </svg>
                            </button>
                            <button wire:click='$emit("openModal", "delete-network-modal", {{ json_encode(["network" => $network->id]) }})'  class="text-red-500 px-3 hover:text-red-700">
                                <svg fill="none" stroke="currentColor" class="w-6 h-6" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                  </svg>
                            </button>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class=" py-4">
            {{ $networks->links('pagination::tailwind') }}
        </div>
    </div>
</div>
