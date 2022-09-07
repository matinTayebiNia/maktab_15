<?php
/**
 * @var object $patient
 *
 */
?>

<div class="flex flex-wrap w-full  flex-col px-4 py-8 bg-white rounded-lg shadow  sm:px-6 md:px-8 lg:px-10">
    <div class="self-start mb-2 text-xl font-light text-gray-800 sm:text-2xl ">
        ویرایش اطلاعات
    </div>
    <div class="p-6 mt-8">
        <form action="/admin/patients/<?= $patient->id ?>/update" method="post">
            <?= method("put") ?>
            <div class="flex flex-col mb-2">
                <div class=" relative ">
                    <label for="blood_type" class="mb-2 block font-semibold">گروه خونی:</label>
                    <input id="blood_type"
                              name="blood_type"
                           value="<?= old("blood_type", $patient->blood_type) ?>"
                              class="
                               rounded-lg block
                                   flex-1
                                    appearance-none border

                                       <?= errors("blood_type") ? " border-red-600" : "border-gray-300" ?>
                                     w-full md:w-1/2 py-2 px-4 bg-white text-gray-700
                                      placeholder-gray-400 shadow-sm text-base
                                       focus:outline-none focus:ring-2
                                       focus:ring-purple-600 focus:border-transparent

                                        "
                              placeholder="گروه خونی">
                    <p class=" text-red-700  m-3 font-semibold">
                        <?= errors("blood_type") ?>
                    </p>

                </div>
            </div>
            <div class="flex flex-col mb-2">
                <div class=" relative ">
                    <label for="Type_of_disease" class="mb-2 block font-semibold">نوع بیماری:</label>
                    <input id="Type_of_disease"
                           class="
                               <?= errors("Type_of_disease") ? " border-red-600" : "border-gray-300" ?>
                                    rounded-lg  flex-1
                                    appearance-none border
                                    w-full md:w-1/2 py-2 px-4 bg-white
                                     text-gray-700 placeholder-gray-400
                                     shadow-sm text-base focus:outline-none
                                     focus:ring-2 focus:ring-purple-600
                                     focus:border-transparent
                                      "
                           value="<?= old("Type_of_disease", $patient->Type_of_disease) ?>"
                           name="Type_of_disease" placeholder="نوع بیماری">
                    <p class=" text-red-700 m-3 font-semibold">
                        <?= errors("Type_of_disease") ?>
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
                    ویرایش
                </button>
            </div>
        </form>

    </div>
</div>

