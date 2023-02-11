<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="bg-gradient-to-tr from-green-300 to-green-600 h-screen w-full flex justify-center items-center">

        <div
            class="bg-green-600 w-full sm:w-1/2 md:w-9/12 lg:w-1/2 shadow-md flex flex-col md:flex-row items-center mx-5 sm:m-0 rounded my-5">
            <div class="w-full md:w-1/2 hidden md:flex flex-col justify-center items-center text-white">
                <h1 class="text-3xl">Hello</h1>
                <p class="text-5xl font-extrabold">Welcome!</p>
            </div>
            <div class="bg-white w-full md:w-1/2 flex flex-col items-center py-10 px-8  justify-center">
                <h3 class="text-3xl font-bold text-green-500 mb-4">
                    Đăng nhập
                </h3>
                @if (\Session::has('loginFail'))

                <span class=" text-sm text-red-500 text-center w-full">{{\Session::get('loginFail')}}</span>

                @endif
                <form wire:submit.prevent='submit' class="w-full flex flex-col justify-center">
                    <div class="mb-4">
                        @error('user.email')
                            <div class="">
                                <span class=" text-sm text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                        <input wire:model='user.email' type="text" placeholder="Email" name="email"
                            class="w-full p-3 rounded border placeholder-gray-400 focus:outline-none focus:border-green-600">
                    </div>
                    <div class="mb-4">
                        @error('user.password')
                            <div class="">
                                <span class=" text-sm text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                        <input wire:model='user.password' type="password" placeholder="Password" required="" name="password"
                            autocomplete="current-password"
                            class="w-full p-3 rounded border placeholder-gray-400 focus:outline-none focus:border-green-600">
                    </div>
                    <div class="flex items-center space-x-2 mb-2">
                        <input wire:model='remember' type="checkbox" id="remember" name="remember"
                            class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200">
                        <label for="remember" class="text-sm font-semibold text-gray-500">Ghi nhớ</label>

                    </div>
                    <div class="flex justify-between mb-3">
                        <a class="text-sm font-semibold text-blue-500" href="{{url('quen-mat-khau')}}">Quên
                            mật khẩu?</a>
                        <a class="text-sm font-semibold text-blue-500" href="{{url('dang-ky')}}">Tạo Tài
                            Khoản</a>
                    </div>
                    <button type="submit"
                        class="mb-2 w-full inline-block px-6 py-3 bg-blue-600 text-white font-bold  leading-normal uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Đăng
                        nhập</button>
                    <div class="flex flex-col space-y-5">
                        <span class="flex items-center justify-center space-x-2">
                            <span class="h-px bg-gray-400 w-14"></span>
                            <span class="font-normal text-gray-500">Hoặc đăng nhập bằng</span>
                            <span class="h-px bg-gray-400 w-14"></span>
                        </span>
                        <div class="flex flex-col space-y-4">
                            <a href="http://127.0.0.1:8001/login/facebook"
                                class="flex items-center justify-center px-4 py-2 space-x-2 transition-colors duration-300 border border-blue-500 rounded-md group hover:bg-blue-500 focus:outline-none h-11">
                                <i class=" text-blue-600">
                                    <svg class="w-6 h-6" fill="currentColor" stroke="none"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        version="1.1" x="0px" y="0px" viewBox="0 0 1000 1000"
                                        enable-background="new 0 0 1000 1000" xml:space="preserve">
                                        <g>
                                            <path
                                                d="M425,355.4v95.1h-76.1v114H425v266.2H539V564.6h114.1v-114H539.1v-76.1c0-22.8,15.2-38,38-38h76.1V222.4H558C485.8,222.4,425,283.2,425,355.4L425,355.4z" />
                                            <path
                                                d="M500,10C230.5,10,10,230.5,10,500c0,269.4,220.5,490,490,490c269.5,0,490-220.5,490-490C990,230.5,769.5,10,500,10z M500,949.2C252.9,949.2,50.8,747,50.8,500C50.8,253,252.9,50.8,500,50.8S949.2,253,949.2,500C949.2,747,747.1,949.2,500,949.2z" />
                                        </g>
                                    </svg>
                                </i>
                                <span class="text-sm font-medium text-gray-800 group-hover:text-white">Facebook</span>
                            </a>
                            <a href="http://127.0.0.1:8001/login/google"
                                class="flex items-center justify-center px-4 py-2 space-x-2 transition-colors duration-300 border border-blue-500 rounded-md group hover:bg-blue-500 focus:outline-none h-11">
                                <i class=" text-red-500 group-hover:text-white text-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                            fill="#4285F4" />
                                        <path
                                            d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                            fill="#34A853" />
                                        <path
                                            d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                                            fill="#FBBC05" />
                                        <path
                                            d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                                            fill="#EA4335" />
                                        <path d="M1 1h22v22H1z" fill="none" />
                                    </svg>
                                </i>
                                <span class="text-sm font-medium text-gray-800 group-hover:text-white">Google</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
