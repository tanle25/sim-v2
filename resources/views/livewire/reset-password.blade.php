<div>
    {{-- Be like water. --}}
    <div
        class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gradient-to-tr from-green-300 to-green-600 py-12">
        <div class="relative bg-white px-6 pt-10 pb-9 shadow-xl mx-auto w-full max-w-lg rounded-2xl">
            <div class="mx-auto flex w-full max-w-md flex-col space-y-5">
                <div class="flex flex-col items-center justify-center text-center space-y-2">
                    <div class="font-semibold text-3xl">
                        <p>Thay đổi mật khẩu</p>
                    </div>
                    <div class="flex flex-row text-sm font-medium text-gray-400">

                    </div>
                    @error('password')
                    <div class="flex flex-row text-sm font-medium text-red-500">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>

                <div>
                    <form wire:submit.prevent='submit'>
                        <div class="flex flex-col space-y-5">
                            <div class="flex flex-col items-center justify-between mx-auto w-full">
                                <div class="w-full h-14 ">
                                    <input wire:model='password' type="password" placeholder="Mật khẩu"
                                        class="w-full h-full flex flex-col items-center justify-center px-5 outline-none rounded-xl border border-gray-200 text-lg bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700">
                                </div>
                                <div class="w-full h-14  mt-5">
                                    <input wire:model='password_confirmation' type="password"
                                        placeholder="Xác nhận mật khẩu"
                                        class="w-full h-full flex flex-col items-center justify-center px-5 outline-none rounded-xl border border-gray-200 text-lg bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700">
                                </div>
                            </div>

                            <div class="flex flex-col space-y-5">
                                <div>
                                    <button type="submit"
                                        class="flex flex-row items-center justify-center text-center w-full border rounded-xl outline-none py-5 bg-blue-700 border-none text-white text-sm shadow-sm">
                                        Lấy lại mật khẩu
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
