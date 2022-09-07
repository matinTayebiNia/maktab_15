<?php
/**
 * @var array $data
 * @var int $paginate
 */

?>
<?php require_once viewPath("component/success") ?>
<div class="flex flex-col flex-wrap sm:flex-row ">
    <div class="container mx-auto px-4 sm:px-8 max-w-7xl ">
        <div class="py-8 ">
            <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                <h2 class="text-2xl leading-tight">پزشکان</h2>
                <div class=" text-end ">
                    <form action="" class="flex flex-col md:flex-row w-3/4 md:w-full max-w-sm
                    md:space-x-3 space-y-3 md:space-y-0 justify-center " method="get">
                        <div class="relative">
                            <input type="text" placeholder="جستجو" name="search" class="rounded-r-lg border-transparent
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
                                مدرک
                            </th>
                            <th scope="col" class="px-5 py-3 bg-white
                             border-b text-sm font-normal  border-gray-200 text-gray-800 text-right">
                                تخصص
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
                        <?php foreach ($data as $item): ?>
                            <tr>
                                <td class=" p-5 border-b border-gray-200 text-sm bg-white ">
                                    <div class="flex items-center ">
                                        <div class="flex-shrink-0 ">
                                            <a href="#" class="block relative">
                                                <img src="/images/man.png"
                                                     class="mx-auto object-cover rounded-full h-10 w-10" alt="users">
                                            </a>
                                        </div>
                                        <div class="mr-3 ">
                                            <p class="text-gray-900 whitespace-nowrap ">
                                                <?= $item->user->name
                                                . "  " . $item->user->lastname ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-5 border-b border-gray-200 text-sm bg-white">
                                    <p class="text-gray-900 whitespace-nowrap ">
                                        <?= $item->user()->first()->getTypeUser() ?>
                                    </p>
                                </td>
                                <td class="p-5 border-b border-gray-200 text-sm bg-white">
                                    <p class="text-gray-900 whitespace-nowrap ">
                                        <?= $item->Evidence ?>
                                    </p>
                                </td>
                                <td class="p-5 border-b border-gray-200 text-sm bg-white">
                                    <p class="text-gray-900 whitespace-nowrap ">
                                        <?= $item->Expert ?>
                                    </p>
                                </td>
                                <td class="p-5 border-b border-gray-200 text-sm bg-white">
                                    <?php if ($item->status): ?>
                                        <span class="relative inline-block px-3 py-2 text-white leading-tight   ">
                                    <span aria-hidden="true" class="absolute inset-0 bg-green-700  rounded">

                                    </span>
                                    <span class="relative ">
                                        فعال
                                    </span>
                                </span>
                                    <?php else: ?>
                                        <span class="relative inline-block px-3 py-2 text-white leading-tight   ">
                                    <span aria-hidden="true" class="absolute inset-0 bg-red-700  rounded">

                                    </span>
                                    <span class="relative ">
                                        غیر فعال
                                    </span>
                                </span>

                                    <?php endif; ?>
                                </td>
                                <td class="p-5 border-b border-gray-200 text-sm bg-white">
                                    <div class="flex">
                                        <a href="/admin/doctors/<?= $item->id ?>/edit" title="ویرایش">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                                 width="24px" fill="#F9A602">
                                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                <path d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"></path>
                                            </svg>
                                        </a>
                                        <a href="#" id="delete-doctor"
                                           onclick="toggleModal('modal-id','<?= $item->id ?>')"
                                           data-doctorid="<?= $item->id ?>" title="حذف">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                                 width="24px" fill="#FF0000">
                                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                <path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"></path>
                                            </svg>
                                        </a>
                                        <a href="/admin/doctors/<?= $item->id ?>/lab" id="delete-doctor"
                                           title="اضافه کردن دکتر به آزمایشگاه">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                 fill="currentColor" class="w-6 h-6 text-blue-500">
                                                <path fill-rule="evenodd"
                                                      d="M3 2.25a.75.75 0 000 1.5v16.5h-.75a.75.75 0 000 1.5H15v-18a.75.75 0 000-1.5H3zM6.75 19.5v-2.25a.75.75 0 01.75-.75h3a.75.75 0 01.75.75v2.25a.75.75 0 01-.75.75h-3a.75.75 0 01-.75-.75zM6 6.75A.75.75 0 016.75 6h.75a.75.75 0 010 1.5h-.75A.75.75 0 016 6.75zM6.75 9a.75.75 0 000 1.5h.75a.75.75 0 000-1.5h-.75zM6 12.75a.75.75 0 01.75-.75h.75a.75.75 0 010 1.5h-.75a.75.75 0 01-.75-.75zM10.5 6a.75.75 0 000 1.5h.75a.75.75 0 000-1.5h-.75zm-.75 3.75A.75.75 0 0110.5 9h.75a.75.75 0 010 1.5h-.75a.75.75 0 01-.75-.75zM10.5 12a.75.75 0 000 1.5h.75a.75.75 0 000-1.5h-.75zM16.5 6.75v15h5.25a.75.75 0 000-1.5H21v-12a.75.75 0 000-1.5h-4.5zm1.5 4.5a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008zm.75 2.25a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75h-.008zM18 17.25a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php require_once viewPath("component/pagination") ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hidden overflow-x-hidden bg-black bg-opacity-50  overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
     id="modal-id">
    <div class="relative w-auto my-6 mx-auto max-w-3xl">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
                <h3 class="text-3xl font-semibold">
                    حذف دکتر
                </h3>
                <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                        onclick="toggleModal('modal-id')">
          <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
            ×
          </span>
                </button>
            </div>
            <!--body-->
            <div class="relative pt-8 px-14 flex-auto">
                <p class="my-4 text-slate-500 text-lg leading-relaxed">
                    ایا از حذف دکتر مورد نظر مطمئن هستید
                </p>
            </div>
            <!--footer-->
            <form method="post" action="/admin/doctors/<?= rand(1, 5) ?>/delete">
                <?= method("delete") ?>
                <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                    <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            type="button" onclick="toggleModal('modal-id')">
                        بستن
                    </button>
                    <input type="hidden" id="delete_id" name="delete_id" value="">
                    <button class="bg-red-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            type="submit">
                        بله پاک کن
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
<script>

    function toggleModal(modalID, DoctorID) {
        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        document.getElementById(modalID).classList.toggle("flex");
        document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        const deleteInput = document.querySelector("input[type='hidden']#delete_id")
        deleteInput.value = DoctorID;
    }

</script>