<aside
        class="fixed inset-y-0 flex-wrap items-center justify-between z-10 block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
        aria-expanded="false">
        <div class="h-19">
            <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"
                sidenav-close></i>
            <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700"
                href="{{url('/')}}" target="_blank">
                <img src="{{asset('assets/img/logo-ct-dark.png')}}"
                    class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8"
                    alt="main_logo" />
                <img src="{{asset('assets/img/logo-ct.png')}}"
                    class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8"
                    alt="main_logo" />
                <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">CTR CRM</span>
            </a>
        </div>

        <hr
            class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

        <div class="items-center block w-auto max-h-screen overflow-auto h-screen grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 {{request()->is('/') ? 'bg-blue-500/13' : ''}} dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors"
                        href="{{url('/')}}">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Tổng quan</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="javascript:;">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-orange-500">
                                <svg class=" w-5 h-5" version="1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" enable-background="new 0 0 48 48">
                                    <path fill="#009688" d="M36,45H12c-2.2,0-4-1.8-4-4V7c0-2.2,1.8-4,4-4h16.3c1.1,0,2.1,0.4,2.8,1.2l7.7,7.7c0.8,0.8,1.2,1.8,1.2,2.8 V41C40,43.2,38.2,45,36,45z"/>
                                    <path fill="#FF9800" d="M32,38H16c-1.1,0-2-0.9-2-2V24c0-1.1,0.9-2,2-2h16c1.1,0,2,0.9,2,2v12C34,37.1,33.1,38,32,38z"/>
                                    <path fill="#FFD54F" d="M29,30v3h5v2h-5v3h-2V22h2v6h5v2H29z M14,29v2h5v2h-5v2h5v3h2v-9H14z"/>
                                </svg>
                            </i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 font-bold pointer-events-none ease">Sim</span>
                    </a>
                    <ul class=" pl-5">
                        <li class="mt-0.5 w-full ">
                            <a class=" dark:text-white dark:opacity-80 py-2 rounded-lg {{request()->is('danh-sach-sim') ? 'bg-blue-500/13' : ''}} text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                                href="{{url('danh-sach-sim')}}">
                                <div
                                    class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5 text-blue-500">
                                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z"/></svg>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 font-medium pointer-events-none ease">Danh sách sim</span>
                            </a>
                        </li>

                        @can('is-admin')
                        <li class="mt-0.5 w-full ">
                            <a class=" dark:text-white dark:opacity-80 py-2 rounded-lg {{request()->is('sim-da-huy') ? 'bg-blue-500/13' : ''}}  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                            href="{{url('sim-da-huy')}}">
                                <div
                                    class="mr-2  flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5 text-blue-500">
                                    <svg  class="w-6 h-6" version="1.1" fill="currentColor"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" stroke="currentColor" stroke-width="0.00512"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g> <g> <g> <path d="M256,0C114.618,0,0,114.618,0,256s114.618,256,256,256s256-114.618,256-256S397.382,0,256,0z M256,469.333 c-117.818,0-213.333-95.515-213.333-213.333S138.182,42.667,256,42.667S469.333,138.182,469.333,256S373.818,469.333,256,469.333z "></path> </g> </g> </g></svg>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 font-medium pointer-events-none ease">Sim đã huỷ</span>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full ">
                            <a class=" dark:text-white dark:opacity-80 py-2 rounded-lg {{request()->is('sim-da-xoa') ? 'bg-blue-500/13' : ''}}  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                            href="{{url('sim-da-xoa')}}">
                                <div
                                    class="mr-2  flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5 text-blue-500">
                                    <svg  class="w-6 h-6" version="1.1" fill="currentColor"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" stroke="currentColor" stroke-width="0.00512"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g> <g> <g> <path d="M256,0C114.618,0,0,114.618,0,256s114.618,256,256,256s256-114.618,256-256S397.382,0,256,0z M256,469.333 c-117.818,0-213.333-95.515-213.333-213.333S138.182,42.667,256,42.667S469.333,138.182,469.333,256S373.818,469.333,256,469.333z "></path> </g> </g> </g></svg>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 font-medium pointer-events-none ease">Sim đã xoá</span>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full ">
                            <a class=" dark:text-white dark:opacity-80 py-2 rounded-lg {{request()->is('lich-su-thay-doi') ? 'bg-blue-500/13' : ''}}  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                            href="{{url('lich-su-thay-doi')}}">
                                <div
                                    class="mr-2  flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5 text-blue-500">
                                    <svg  class="w-6 h-6" version="1.1" fill="currentColor"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" stroke="currentColor" stroke-width="0.00512"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g> <g> <g> <path d="M256,0C114.618,0,0,114.618,0,256s114.618,256,256,256s256-114.618,256-256S397.382,0,256,0z M256,469.333 c-117.818,0-213.333-95.515-213.333-213.333S138.182,42.667,256,42.667S469.333,138.182,469.333,256S373.818,469.333,256,469.333z "></path> </g> </g> </g></svg>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 font-medium pointer-events-none ease">Lịch sử thay đổi</span>
                            </a>
                        </li>

                        <li class="mt-0.5 w-full">
                            <a class=" dark:text-white dark:opacity-80 py-2 rounded-lg {{request()->is('nha-mang') ? 'bg-blue-500/13' : ''}}  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                            href="{{url('nha-mang')}}">
                                <div
                                    class="mr-2  flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5 text-blue-500">
                                    <svg  class="w-6 h-6" version="1.1" fill="currentColor"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" stroke="currentColor" stroke-width="0.00512"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g> <g> <g> <path d="M256,0C114.618,0,0,114.618,0,256s114.618,256,256,256s256-114.618,256-256S397.382,0,256,0z M256,469.333 c-117.818,0-213.333-95.515-213.333-213.333S138.182,42.667,256,42.667S469.333,138.182,469.333,256S373.818,469.333,256,469.333z "></path> </g> </g> </g></svg>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 font-medium pointer-events-none ease">Nhà mạng</span>
                            </a>
                        </li>
                        @endcan
                        @can('is-admin')
                        <li class="mt-0.5 w-full ">
                            <a class=" dark:text-white dark:opacity-80 py-2 rounded-lg {{request()->is('danh-sach-yeu-cau') ? 'bg-blue-500/13' : ''}}  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                                href="{{url('danh-sach-yeu-cau')}}">
                                <div
                                    class="mr-2  flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5 text-blue-500">
                                    <svg  class="w-6 h-6" version="1.1" fill="currentColor"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" stroke="currentColor" stroke-width="0.00512"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g> <g> <g> <path d="M256,0C114.618,0,0,114.618,0,256s114.618,256,256,256s256-114.618,256-256S397.382,0,256,0z M256,469.333 c-117.818,0-213.333-95.515-213.333-213.333S138.182,42.667,256,42.667S469.333,138.182,469.333,256S373.818,469.333,256,469.333z "></path> </g> </g> </g></svg>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 font-medium pointer-events-none ease">Yêu cầu</span>
                            </a>
                        </li>
                        @else
                        <li class="mt-0.5 w-full ">
                            <a class=" dark:text-white dark:opacity-80 py-2 rounded-lg {{request()->is('yeu-cau-da-gui') ? 'bg-blue-500/13' : ''}}  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                                href="{{url('yeu-cau-da-gui')}}">
                                <div
                                    class="mr-2  flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5 text-blue-500">
                                    <svg  class="w-6 h-6" version="1.1" fill="currentColor"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" stroke="currentColor" stroke-width="0.00512"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g> <g> <g> <path d="M256,0C114.618,0,0,114.618,0,256s114.618,256,256,256s256-114.618,256-256S397.382,0,256,0z M256,469.333 c-117.818,0-213.333-95.515-213.333-213.333S138.182,42.667,256,42.667S469.333,138.182,469.333,256S373.818,469.333,256,469.333z "></path> </g> </g> </g></svg>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 font-medium pointer-events-none ease">Yêu cầu</span>
                            </a>
                        </li>
                        @endcan

                    </ul>
                </li>
                @can('is-admin')

                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2 rounded-lg {{request()->is('danh-sach-dai-ly') ? 'bg-blue-500/13' : ''}}   text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors xl:p-2.5"
                        href="{{url('danh-sach-dai-ly')}}">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center text-blue-500">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 640 512"><path d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"/></svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease font-bold">Đại lý</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2 rounded-lg {{request()->is('danh-sach-khach-hang') ? 'bg-blue-500/13' : ''}}  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors xl:p-2.5"
                        href="{{url('danh-sach-khach-hang')}}">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center text-blue-500">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 640 512"><path d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"/></svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease font-bold">Khách hàng</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2 rounded-lg {{request()->is('doanh-thu') ? 'bg-blue-500/13' : ''}} text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors xl:p-2.5"
                    href="{{url('doanh-thu')}}">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center text-blue-500">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V400c0 44.2 35.8 80 80 80H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H80c-8.8 0-16-7.2-16-16V64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L240 221.3l57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z"/></svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease font-bold">Doanh thu</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2 rounded-lg {{request()->is('danh-sach-quan-tri-vien') ? 'bg-blue-500/13' : ''}}  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors xl:p-2.5"
                        href="{{url('danh-sach-quan-tri-vien')}}">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center text-blue-500">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 640 512"><path d="M622.3 271.1l-115.2-45c-4.1-1.6-12.6-3.7-22.2 0l-115.2 45c-10.7 4.2-17.7 14-17.7 24.9 0 111.6 68.7 188.8 132.9 213.9 9.6 3.7 18 1.6 22.2 0C558.4 489.9 640 420.5 640 296c0-10.9-7-20.7-17.7-24.9zM496 462.4V273.3l95.5 37.3c-5.6 87.1-60.9 135.4-95.5 151.8zM224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm96 40c0-2.5.8-4.8 1.1-7.2-2.5-.1-4.9-.8-7.5-.8h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c6.8 0 13.3-1.5 19.2-4-54-42.9-99.2-116.7-99.2-212z"/></svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease font-bold">Quản trị viên</span>
                    </a>
                </li>
                @endcan



            </ul>
        </div>


    </aside>
