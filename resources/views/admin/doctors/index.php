<?php
?>

<div class="flex flex-col flex-wrap sm:flex-row ">
    <div class="container mx-auto px-4 sm:px-8 max-w-7xl ">
        <div class="py-8 ">
            <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                <h2 class="text-2xl leading-tight">پزشکان</h2>
                <div class=" text-end ">
                    <form action="#" class="flex flex-col md:flex-row w-3/4 md:w-full max-w-sm
                    md:space-x-3 space-y-3 md:space-y-0 justify-center " method="post">
                        <div class="relative">
                            <input type="text" placeholder="جستجو" class="rounded-r-lg border-transparent
                            flex-1 border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-200
                             shadow-sm text-base outline-none focus:ring-2 focus:ring-purple-600
                             focus:border-transparent focus:placeholder-gray-700 appearance-none">
                        </div>
                        <button class="flex-shrink-0 px-4 py-2 text-base
                             font-semibold text-white bg-purple-600 rounded-l-lg
                             shadow-md hover:bg-purple-400 focus:outline-none focus:ring-2
                            focus:bg-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200 ">اعمال
                        </button>

                    </form>
                </div>
            </div>
            <div class="mx-4 sm:mx-8  px-4 sm:px-8 py-4 overflow-x-auto ">
                <div class="inline-block  w-full shadow rounded-lg overflow-hidden ">
                    <table class=" min-w-full leading-normal  ">
                        <thead class="">
                        <tr>
                            <th scope="col" class="px-5 py-3 bg-white
                             border-b text-sm font-normal  border-gray-200 text-gray-800 text-right">
                                پزشکان
                            </th>
                            <th scope="col" class="px-5 py-3 bg-white
                             border-b text-sm font-normal  border-gray-200 text-gray-800 text-right">
                                نقش
                            </th>
                            <th scope="col" class="px-5 py-3 bg-white
                             border-b text-sm font-normal  border-gray-200 text-gray-800 text-right">
                                ایجاد شده در
                            </th>
                            <th scope="col" class="px-5 py-3 bg-white
                             border-b text-sm font-normal  border-gray-200 text-gray-800 text-right">
                                وضعیت
                            </th>
                            <th scope="col" class="px-5 py-3 bg-white
                             border-b text-sm font-normal  border-gray-200 text-gray-800 text-right">
                                اقدامات
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class=" p-5 border-b border-gray-200 text-sm bg-white ">
                                <div class="flex items-center ">
                                    <div class="flex-shrink-0 ">
                                        <a href="#" class="block relative">
                                            <img src="/images/avatar-ali.png"
                                                 class="mx-auto object-cover rounded-full h-10 w-10" alt="users">
                                        </a>
                                    </div>
                                    <div class="mr-3 ">
                                        <p class="text-gray-900 whitespace-nowrap ">
                                            زهرا خسروجردی
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-5 border-b border-gray-200 text-sm bg-white">
                                <p class="text-gray-900 whitespace-nowrap ">
                                    پزشک
                                </p>
                            </td>
                            <td class="p-5 border-b border-gray-200 text-sm bg-white">
                                <p class="text-gray-900 whitespace-nowrap ">
                                    1401/05/30
                                </p>
                            </td>
                            <td class="p-5 border-b border-gray-200 text-sm bg-white">
                                <span class="relative inline-block px-3 py-2 text-white leading-tight   ">
                                    <span aria-hidden="true" class="absolute inset-0 bg-green-700  rounded">

                                    </span>
                                    <span class="relative ">
                                        فعال
                                    </span>
                                </span>
                            </td>
                            <td class="p-5 border-b border-gray-200 text-sm bg-white">
                                <div class="flex">
                                    <a href="#" title="ویرایش">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                             width="24px" fill="#F9A602">
                                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                                            <path d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"></path>
                                        </svg>
                                    </a>
                                    <a href="#" title="حذف">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                             width="24px" fill="#FF0000">
                                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                                            <path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <!-- paginate-->
                    <div class="px-5  bg-white py-5 flex flex-col items-center sm:flex-row sm:justify-center">
                        <div class="flex items-center">
                            <button type="button" class="w-full p-4 border text-base rounded-r-xl text-gray-600 bg-white hover:bg-gray-100">
                                <svg width="9" fill="currentColor" height="8" class="" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1427 301l-531 531 531 531q19 19 19 45t-19 45l-166 166q-19 19-45 19t-45-19l-742-742q-19-19-19-45t19-45l742-742q19-19 45-19t45 19l166 166q19 19 19 45t-19 45z">
                                    </path>
                                </svg>
                            </button>
                            <button type="button" class="w-full px-4 py-2 border-t border-b text-base text-indigo-500 bg-white hover:bg-gray-100 ">
                                ۱
                            </button>
                            <button type="button" class="w-full px-4 py-2 border text-base text-gray-600 bg-white hover:bg-gray-100">
                                ۲
                            </button>
                            <button type="button" class="w-full px-4 py-2 border-t border-b text-base text-gray-600 bg-white hover:bg-gray-100">
                                ۳
                            </button>
                            <button type="button" class="w-full px-4 py-2 border text-base text-gray-600 bg-white hover:bg-gray-100">
                                ۴
                            </button>
                            <button type="button" class="w-full p-4 border-t border-b border-l text-base  rounded-l-xl text-gray-600 bg-white hover:bg-gray-100">
                                <svg width="9" fill="currentColor" height="8" class="" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1363 877l-742 742q-19 19-45 19t-45-19l-166-166q-19-19-19-45t19-45l531-531-531-531q-19-19-19-45t19-45l166-166q19-19 45-19t45 19l742 742q19 19 19 45t-19 45z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- !paginate-->
                </div>
            </div>
        </div>
    </div>
</div>
