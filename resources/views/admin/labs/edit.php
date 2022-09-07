<?php
/**
 * @var object $lab
 */
?>
<div class="flex flex-wrap w-full  flex-col px-4 py-8 bg-white rounded-lg shadow  sm:px-6 md:px-8 lg:px-10">
    <div class="self-start mb-2 text-xl font-light text-gray-800 sm:text-2xl ">
        ویرایش آزمایشگاه
    </div>
    <div class="p-6 mt-8">
        <form action="/admin/labs/<?= $lab->id ?>/update" method="post">
            <?= method("put") ?>
            <div class="flex flex-col mb-2">
                <div class=" relative ">
                    <label for="labName" class="mb-2 block font-semibold">نام آزمایشگاه:</label>
                    <input id="labName"
                           name="labName"
                           value="<?= old("labName",$lab->labName) ?>"
                           class="
                               rounded-lg block
                                   flex-1
                                    appearance-none border

                                       <?= errors("labName") ? " border-red-600" : "border-gray-300" ?>
                                     w-full md:w-1/2 py-2 px-4 bg-white text-gray-700
                                      placeholder-gray-400 shadow-sm text-base
                                       focus:outline-none focus:ring-2
                                       focus:ring-purple-600 focus:border-transparent

                                        "
                           placeholder="آزمایشگاه">
                    <p class=" text-red-700  m-3 font-semibold">
                        <?= errors("labName") ?>
                    </p>

                </div>
            </div>
            <div class="flex flex-col mb-2">
                <div class=" relative ">
                    <label for="address" class="mb-2 block font-semibold">ادرس:</label>
                    <textarea id="address"
                              class="
                               <?= errors("address") ? " border-red-600" : "border-gray-300" ?>
                                    rounded-lg  flex-1
                                    appearance-none border
                                    w-full md:w-1/2 py-2 px-4 bg-white
                                     text-gray-700 placeholder-gray-400
                                     shadow-sm text-base focus:outline-none
                                     focus:ring-2 focus:ring-purple-600
                                     focus:border-transparent
                                      "
                              name="address" placeholder="ادرس"><?= old("address",$lab->address) ?></textarea>
                    <p class=" text-red-700 m-3 font-semibold">
                        <?= errors("address") ?>
                    </p>
                </div>
            </div>
            <div class="flex w-full my-4">
                <button type="submit"
                        class="py-2 px-4
                                 bg-purple-600 hover:bg-purple-700
                                 focus:ring-purple-500 focus:ring-offset-purple-200
                                  text-white w-1/5 transition ease-in duration-200
                                   text-center text-base font-semibold shadow-md
                                   focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                    ویرایش اطلاعات
                </button>
            </div>
        </form>

    </div>
</div>

