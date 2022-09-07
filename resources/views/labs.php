<?php
/**
 * @var array $data
 * @var int $paginate
 */

?>
<?php require_once viewPath("component/success") ?>
<div class="flex flex-col flex-wrap sm:flex-row mt-28 ">
    <div class="container mx-auto px-4 sm:px-8 max-w-7xl  ">
        <div class="py-8 ">

            <div class="mx-4 sm:mx-8  px-4 sm:px-8 py-4 overflow-x-auto ">

                <div class=" bg-white p-3  w-full shadow rounded-lg overflow-hidden ">
                    <form action="" class="flex flex-col md:flex-row w-1/2 p-4  md:w-full max-w-lg
                    md:space-x-3 space-y-3 md:space-y-0 justify-start " method="get">
                        <div class="relative w-full">
                            <input type="text" placeholder="جستجو" name="search" class="rounded-r-lg border-transparent
                            flex-1 border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400
                             shadow-sm text-base outline-none focus:ring-2 focus:ring-blue-600
                             focus:border-transparent focus:placeholder-gray-700 appearance-none">
                        </div>
                        <button class="flex-shrink-0 px-4 py-2 text-base
                             font-semibold text-white bg-blue-600 rounded-l-lg
                             shadow-md hover:bg-blue-400 focus:outline-none focus:ring-2
                            focus:bg-blue-500 focus:ring-offset-2 focus:ring-offset-blue-200 ">اعمال
                        </button>
                    </form>
                    <table class=" min-w-full leading-normal  ">

                        <tbody>
                        <?php foreach ($data as $item): ?>
                            <tr>
                                <td class=" p-5 border-b border-gray-200 text-sm bg-white ">
                                    <div class="flex items-center ">
                                        <div class="flex-shrink-0 ">
                                            <a href="#" class="block relative">
                                                <img src="/images/heart-beat.png"
                                                     class="mx-auto object-cover rounded-full h-10 w-10" alt="users">
                                            </a>
                                        </div>
                                        <div class="mr-3 ">
                                            <p class="text-gray-900 whitespace-nowrap ">
                                                <?= $item->labName ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-5 border-b border-gray-200 text-sm bg-white">
                                    <p class="text-gray-900 whitespace-nowrap ">
                                        <?= $item->address ?>
                                    </p>
                                </td>

                                <td class="p-5 border-b border-gray-200 text-sm bg-white">
                                    <div class="flex">
                                        <a href="/labs/doctors/<?= $item->id ?>"
                                           class="p-3 px-5 text-md
                                            text-white bg-blue-700 rounded
                                             baseline hover:bg-blue-600  "
                                           title="دکتران">
                                           دیدن دکتران
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
