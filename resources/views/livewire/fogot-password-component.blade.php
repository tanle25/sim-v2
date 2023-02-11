<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gradient-to-tr from-green-300 to-green-600 py-12">
        <div class="relative bg-white px-6 pt-10 pb-9 shadow-xl mx-auto w-full max-w-lg rounded-2xl">
            @if (!$isSuccess)
            <div class="mx-auto flex w-full max-w-md flex-col space-y-5">
                <div class="flex flex-col items-center justify-center text-center space-y-2">
                  <div class="font-semibold text-3xl">
                    <p>Quên mật khẩu</p>
                  </div>
                  <div class="flex flex-row text-sm font-medium text-gray-400">
                    <p>Nhập email để khôi phục mật khẩu</p>
                  </div>
                  @error('email')
                  <div class="flex flex-row text-sm font-medium text-red-500">
                    <p>{{$message}}</p>
                  </div>
                  @enderror
                </div>

                <div>
                  <form wire:submit.prevent='sendEmail'>
                    <div class="flex flex-col space-y-5">
                      <div class="flex flex-row items-center justify-between mx-auto w-full">
                        <div class="w-full h-14 ">
                          <input wire:model='email' placeholder="Email" class="w-full h-full flex flex-col items-center justify-center px-5 outline-none rounded-xl border border-gray-200 text-lg bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700" type="text" name="" id="">
                        </div>

                      </div>

                      <div class="flex flex-col space-y-5">
                        <div>
                          <button type="submit" class="flex flex-row items-center justify-center text-center w-full border rounded-xl outline-none py-5 bg-blue-700 border-none text-white text-sm shadow-sm">
                            Lấy lại mật khẩu
                          </button>
                        </div>
                        <div class="flex flex-row items-center justify-center text-center text-sm font-medium space-x-1 text-gray-500">
                          <p>Bạn không nhận được email?</p> <a class="flex flex-row items-center text-blue-600" href="http://" target="_blank" rel="noopener noreferrer">Gửi lại</a>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div wire:loading wire:target='sendEmail' class=" absolute  top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                <div class="relative w-24 h-24 animate-spin rounded-full bg-gradient-to-r from-purple-400 via-blue-500 to-red-400 ">
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-20 h-20 bg-gray-200 rounded-full border-2 border-white "></div>
                </div>
            </div>
            @else
            <div class="mx-auto flex w-full max-w-md flex-col space-y-5">
                <div class="flex flex-col items-center justify-center text-center space-y-2">
                  <div class="font-semibold text-3xl">
                    <p>Quên mật khẩu</p>
                  </div>
                  <div class="flex flex-row text-sm font-medium text-gray-400">
                    <p>Liên kết thay đổi mật khẩu đa được gửi tới <span class=" text-green-600">{{$email}}</span> </p>
                  </div>

                </div>

                <div>
                    <div class="flex flex-col space-y-5">
                      <div class="flex flex-col space-y-5">

                        <div class="flex flex-row items-center justify-center text-center text-sm font-medium space-x-1 text-gray-500">
                          <p>Bạn không nhận được email?</p> <a wire:click='setStatus' class="flex flex-row items-center text-blue-600" href="javascript:;" rel="noopener noreferrer">Gửi lại</a>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            @endif

        </div>
      </div>
</div>

