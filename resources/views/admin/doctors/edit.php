<?php
/**
 * @var object $doctor
 *
 */
?>

<div class="flex flex-wrap w-full  flex-col px-4 py-8 bg-white rounded-lg shadow  sm:px-6 md:px-8 lg:px-10">
    <div class="self-start mb-2 text-xl font-light text-gray-800 sm:text-2xl ">
        ویرایش اطلاعات
    </div>
    <div class="p-6 mt-8">
        <form action="/admin/doctors/<?= $doctor->id ?>/update" method="post">
            <?= method("put") ?>
            <div class="flex flex-col mb-2">
                <div class=" relative ">
                    <label for="Evidence" class="mb-2 block font-semibold">مدرک:</label>
                    <textarea id="Evidence"
                              name="Evidence"
                              class="
                               rounded-lg block
                                   flex-1
                                    appearance-none border

                                       <?= errors("Evidence") ? " border-red-600" : "border-gray-300" ?>
                                     w-full md:w-1/2 py-2 px-4 bg-white text-gray-700
                                      placeholder-gray-400 shadow-sm text-base
                                       focus:outline-none focus:ring-2
                                       focus:ring-purple-600 focus:border-transparent

                                        "
                              placeholder="مدرک"><?= old("Evidence", $doctor->Evidence) ?></textarea>
                    <p class=" text-red-700  m-3 font-semibold">
                        <?= errors("Evidence") ?>
                    </p>

                </div>
            </div>
            <div class="flex flex-col mb-2">
                <div class=" relative ">
                    <label for="Expert" class="mb-2 block font-semibold">تخصص:</label>
                    <input id="Expert"
                           class="
                               <?= errors("Expert") ? " border-red-600" : "border-gray-300" ?>
                                    rounded-lg  flex-1
                                    appearance-none border
                                    w-full md:w-1/2 py-2 px-4 bg-white
                                     text-gray-700 placeholder-gray-400
                                     shadow-sm text-base focus:outline-none
                                     focus:ring-2 focus:ring-purple-600
                                     focus:border-transparent
                                      "
                           value="<?= old("Expert", $doctor->Expert) ?>"
                           name="Expert" placeholder="تخصص">
                    <p class=" text-red-700 m-3 font-semibold">
                        <?= errors("Expert") ?>
                    </p>
                </div>
            </div>
            <div class="flex flex-col mb-2">
                <label for="status">وضعیت پزشک</label>
                <select name="status" class=" rounded-lg  flex-1
                                    appearance-none border
                                    w-full md:w-1/2 py-2 px-4 bg-white
                                     text-gray-700 placeholder-gray-400
                                     shadow-sm text-base focus:outline-none
                                     focus:ring-2 focus:ring-purple-600
                                     focus:border-transparent"
                        id="status">
                    <option value="1" <?= old("status", $doctor->status) == 1 ? "selected" : "" ?>>فعال</option>
                    <option value="0" <?= old("status", $doctor->status) == 0 ? "selected" : "" ?>>غیر فعال</option>
                </select>
            </div>
            <div class="flex w-full my-4">
                <button type="submit"
                        class="py-2 px-4
                                 bg-purple-600 hover:bg-purple-700
                                 focus:ring-purple-500 focus:ring-offset-purple-200
                                  text-white w-1/5 transition ease-in duration-200
                                   text-center text-base font-semibold shadow-md
                                   focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                    ویرایش
                </button>
            </div>
        </form>

    </div>
</div>

