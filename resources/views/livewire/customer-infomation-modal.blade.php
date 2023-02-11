<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <button wire:click="$emit('closeModal')"  type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Close modal</span>
        </button>
    <div class="mx-auto max-w-md overflow-hidden rounded-lg bg-white shadow">
        @if ($invoice)

            @if($invoice->image)
            <img
            src="{{asset($invoice->image->url)}}"
            class="aspect-video w-full object-cover"
            alt=""
            />
            @else
            <img
            src="{{asset('assets/img/noimage.png')}}"
            class="aspect-video w-full object-cover"
            alt=""
            />
            @endif
            <div class="p-4">
                <div class="flex justify-between">
                    <p class="m-0 text-sm text-primary-500">Ngày tạo hoá đơn • <time>{{$invoice->created_at->format('d-m-Y')}}</time></p>
                    <p class="mb-1 text-sm text-primary-500">Ngày hết hạn • <time>{{\Carbon\Carbon::parse($invoice->exprired_at)->format('d-m-Y')}}</time></p>
                </div>

            <h3 class="text-xl font-medium text-gray-900">{{$invoice->invoiceable->name}}</h3>
            <span
                class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600"
                >
                {{$invoice->type == 0 ?'Cho thuê' : 'Gia hạn'}}
                </span>
            <p class="mt-1 text-gray-500">Giá: {{$invoice->price_out}}</p>
            <p class="mt-1 text-gray-500">Facebook: <a class=" text-blue-600" href="{{$invoice->invoiceable->facebook ?? 'javascript:;'}}">{{$invoice->invoiceable->facebook ?? ''}}</a> </p>

            {{-- <div class="mt-4 flex gap-2">
                <span
                class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600"
                >
                Design
                </span>
                <span
                class="inline-flex items-center gap-1 rounded-full bg-indigo-50 px-2 py-1 text-xs font-semibold text-indigo-600"
                >
                Product
                </span>
                <span
                class="inline-flex items-center gap-1 rounded-full bg-orange-50 px-2 py-1 text-xs font-semibold text-orange-600"
                >
                Develop
                </span>
            </div> --}}
            @else
            <div class=" py-16">
                <h3 class="text-xl text-center font-medium text-gray-900">Không có thông tin hoá đơn</h3>

            </div>
            @endif

          <div class=" mt-5 border-t border-t-gray-300 py-4 flex justify-center">
            <button wire:click="$emit('closeModal')"  type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-10 py-2.5 text-center mr-2">
                Đóng
            </button>
          </div>
        </div>
      </div>
</div>
