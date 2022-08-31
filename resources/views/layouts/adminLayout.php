<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <title><?= app_name() ?></title>

</head>
<body dir="rtl" class="bg-gray-100 rounded-2xl h-screen overflow-hidden relative font-body">
<div class="flex items-start justify-between ">
    <!--navbar-->
    <div class="h-screen hidden lg:block my-4 mr-4 shadow-lg relative w-80">
        <div class="bg-white h-full rounded-2xl ">
            <div class="flex items-center justify-center pt-6">
                <a href="/">
                    <img src="/images/logo.webp" alt="logo">
                </a>
            </div>

            <nav class="pt-6">
                <div class=" ">
                    <a href="/admin/index"
                       class="w-full p-4 my-2 text-gray-500 hover:text-blue-500  flex items-center justify-start
                       <?= isActive("/admin/index") ?>">
                            <span class="text-left">
                             <svg width="20" height="20" fill="currentColor" viewBox="0 0 2048 1792"
                                  xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1070 1178l306-564h-654l-306 564h654zm722-282q0 182-71 348t-191 286-286 191-348 71-348-71-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z">
                                    </path>
                                </svg>
                            </span>
                        <span class="mx-4 font-normal  <?= isActive("/admin/index", 'text-lg') ?> ">
                                داشبورد
                            </span>
                    </a>
                    <a href="/admin/doctors"
                       class="w-full p-4 my-2 text-gray-500 hover:text-blue-500 flex items-center justify-start
                         <?= isActive("/admin/doctors") ?> ">
                            <span class="text-left">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                     class="w-5 h-5">
                                 <path d="M11 5a3 3 0 11-6 0 3 3 0 016 0zM2.615 16.428a1.224 1.224 0 01-.569-1.175 6.002 6.002 0 0111.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 018 18a9.953 9.953 0 01-5.385-1.572zM16.25 5.75a.75.75 0 00-1.5 0v2h-2a.75.75 0 000 1.5h2v2a.75.75 0 001.5 0v-2h2a.75.75 0 000-1.5h-2v-2z"/>
                                </svg>

                            </span>
                        <span class="mx-4 font-normal  <?= isActive("/admin/doctors", 'text-lg') ?> ">
                                پزشکان
                            </span>
                    </a>
                    <a href="#"
                       class="w-full p-4 my-2 text-gray-500 hover:text-blue-500 flex items-center justify-start ">
                            <span class="text-left">
                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                  class="w-5 h-5">
                                <path d="M11 5a3 3 0 11-6 0 3 3 0 016 0zM2.046 15.253c-.058.468.172.92.57 1.175A9.953 9.953 0 008 18c1.982 0 3.83-.578 5.384-1.573.398-.254.628-.707.57-1.175a6.001 6.001 0 00-11.908 0zM12.75 7.75a.75.75 0 000 1.5h5.5a.75.75 0 000-1.5h-5.5z"/>
                            </svg>


                            </span>
                        <span class="mx-4 font-normal ">
                            بیماران
                            </span>
                    </a>
                    <a href="#"
                       class="w-full p-4 my-2 text-gray-500 hover:text-blue-500 flex items-center justify-start ">
                            <span class="text-left">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                               class="w-5 h-5">
                            <path d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 01-2.07-.655zM16.44 15.98a4.97 4.97 0 002.07-.654.78.78 0 00.357-.442 3 3 0 00-4.308-3.517 6.484 6.484 0 011.907 3.96 2.32 2.32 0 01-.026.654zM18 8a2 2 0 11-4 0 2 2 0 014 0zM5.304 16.19a.844.844 0 01-.277-.71 5 5 0 019.947 0 .843.843 0 01-.277.71A6.975 6.975 0 0110 18a6.974 6.974 0 01-4.696-1.81z"/>
                            </svg>
                            </span>
                        <span class="mx-4 font-normal ">
                            مدیران
                            </span>
                    </a>

                </div>
            </nav>
            <div class="absolute bottom-0  my-10 ">
                <a href="#" class="text-gray-500 hover:text-gray-800
                transition-colors duration-200 flex items-center py-2 px-8 ">
                    <span class="text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                          <path fill-rule="evenodd"
                                d="M16.403 12.652a3 3 0 000-5.304 3 3 0 00-3.75-3.751 3 3 0 00-5.305 0 3 3 0 00-3.751 3.75 3 3 0 000 5.305 3 3 0 003.75 3.751 3 3 0 005.305 0 3 3 0 003.751-3.75zm-2.546-4.46a.75.75 0 00-1.214-.883l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                clip-rule="evenodd"/>
                        </svg>
                    </span>
                    <span class="mx-2 font-normal ">
                           متین طیبی
                            </span>

                </a>
            </div>
        </div>

    </div>
    <!--!navbar-->
    <div class=" flex flex-col w-full pl-0 md:p-4 md:space-y-4  ">
        <header class="w-full shadow-lg bg-white items-center h-16 rounded-2xl z-40 ">
            <div class="relative z-20 flex flex-col justify-center h-full px-3 mx-auto ">
                <div class="relative items-center pl-1 flex w-full lg:max-w-68 sm:pr-2 sm:ml-0">
                    <div class="container relative left-0 z-50 flex w-3/4 h-auto h">
                        <div class="relative flex items-center w-full lg:w-64 h-full group">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 absolute right-0 z-20 hidden
                            mr-4
                            text-gray-500 pointer-events-none fill-current group-hover:text-gray-400 sm:block">
                                <path fill-rule="evenodd"
                                      d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                      clip-rule="evenodd"/>
                            </svg>
                            <input class="block w-full bg-gray-100  py-2 pr-10 leading-normal rounded-3xl
                            focus:border-transparent focus:ring-2 focus:ring-blue-500 ring-opacity-90 text-gray-400
                              focus:outline-none" type="text" placeholder="جستجو...">
                        </div>
                    </div>
                    <div class="relative p-1 flex items-center justify-end w-1/4 ml-5 mr-4 sm:mr-0 sm:right-auto">
                        <a href="#" class="block relative ">
                            <img src="/images/avatar-anisha.png" alt="profile"
                                 class="mx-auto object-cover rounded-full h-10 w-10">
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!--        main area -->
        <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
            {{content}}
        </div>
        <!--        !main area -->
    </div>
</div>

<script>
    function closeAlert() {
        const alert = document.getElementById("alert1");
        alert.classList.add("hidden");
    }
</script>
</body>
</html>