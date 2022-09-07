<?php
/**
 * @var array $lab
 * @var object $room
 */
?>
<div class="flex flex-wrap w-full  flex-col px-4 py-8 bg-white rounded-lg shadow  sm:px-6 md:px-8 lg:px-10">
    <div class="self-start mb-2 text-xl font-light text-gray-800 sm:text-2xl ">
        ثبت اتاق
    </div>
    <div class="p-6 mt-8">
        <form action="/admin/rooms/<?= $room->id ?>/update" method="post">
            <?= method("put") ?>
            <div class="flex flex-col mb-2">
                <div class=" relative ">
                    <label for="name" class="mb-2 block font-semibold">نام اتاق:</label>
                    <input id="name"
                           name="name"
                           value="<?= old("name", $room->name) ?>"
                           class="
                               rounded-lg block
                                   flex-1
                                    appearance-none border

                                       <?= errors("name") ? " border-red-600" : "border-gray-300" ?>
                                     w-full md:w-1/2 py-2 px-4 bg-white text-gray-700
                                      placeholder-gray-400 shadow-sm text-base
                                       focus:outline-none focus:ring-2
                                       focus:ring-purple-600 focus:border-transparent

                                        "
                           placeholder="نام اتاق">
                    <p class=" text-red-700  m-3 font-semibold">
                        <?= errors("name") ?>
                    </p>

                </div>
            </div>
            <div class="flex flex-col mb-2">
                <div class=" relative ">
                    <label for="room_type" class="mb-2 block font-semibold">نوع اتاق:</label>
                    <input type="text" value="<?= old("room_type", $room->room_type) ?>"
                           class=" <?= errors("room_type") ? " border-red-600" : "border-gray-300" ?>
                                    rounded-lg  flex-1
                                    appearance-none border
                                    w-full md:w-1/2 py-2 px-4 bg-white
                                     text-gray-700 placeholder-gray-400
                                     shadow-sm text-base focus:outline-none
                                     focus:ring-2 focus:ring-purple-600
                                     focus:border-transparent" name="room_type" id="room_type">
                    <p class=" text-red-700 m-3 font-semibold">
                        <?= errors("room_type") ?>
                    </p>
                </div>
            </div>
            <div class="flex flex-col mb-2">
                <div class=" relative ">
                    <label for="status" class="mb-2 block font-semibold">وضعیت اتاق:</label>
                    <select
                            class=" <?= errors("status") ? " border-red-600" : "border-gray-300" ?>
                                    rounded-lg  flex-1
                                    appearance-none border
                                    w-full md:w-1/2 py-2 px-4 bg-white
                                     text-gray-700 placeholder-gray-400
                                     shadow-sm text-base focus:outline-none
                                     focus:ring-2 focus:ring-purple-600
                                     focus:border-transparent" name="status" id="status">
                        <option value="unused" <?= old("status", $room->status) == "unused" ? 'selected' : '' ?>>
                            استفاده نشده
                        </option>
                        <option value="using" <?= old("status", $room->status) == "using" ? 'selected' : '' ?>>
                            استفاده شده
                        </option>
                        <option value="broke" <?= old("status", $room->status) == "broke" ? 'selected' : '' ?>>خراب
                        </option>
                    </select>
                    <p class=" text-red-700 m-3 font-semibold">
                        <?= errors("status") ?>
                    </p>
                </div>
            </div>
            <div class="flex flex-col mb-2">
                <div class=" relative ">
                    <label for="lab" class="mb-2 block font-semibold">آزمایشگاه:</label>
                    <select
                            class=" <?= errors("lab") ? " border-red-600" : "border-gray-300" ?>
                                    rounded-lg  flex-1
                                    appearance-none border
                                    w-full md:w-1/2 py-2 px-4 bg-white
                                     text-gray-700 placeholder-gray-400
                                     shadow-sm text-base focus:outline-none
                                     focus:ring-2 focus:ring-purple-600
                                     focus:border-transparent" name="lab" id="lab">
                        <option value=""></option>
                        <?php foreach ($lab as $labs) : ?>
                            <option value="<?= $labs->id ?>"
                                <?= old("room_type", $room->lab_id) == $labs->id ? 'selected' : '' ?>>
                                <?= $labs->labName ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <p class=" text-red-700 m-3 font-semibold">
                        <?= errors("lab") ?>
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
                    ثبت اطلاعات
                </button>
            </div>
        </form>

    </div>
</div>


