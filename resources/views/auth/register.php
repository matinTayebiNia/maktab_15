<?php

?>

<section id="register" class="mt-24 pt-16">
    <div class="container py-12 px-6 h-full">
        <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
            <div class="xl:w-10/12">
                <div class="block bg-white shadow-lg rounded-lg">
                    <div class="lg:flex lg:flex-wrap g-0">
                        <div
                                class="lg:w-6/12 flex items-center lg:rounded-r-lg lg:rounded-bl-none rounded-b-lg "
                                style="
                background: linear-gradient(to right,
                          #203387FF,
                          #3e53a2,
                          #3e53a2,
                          #203387);
              "
                        >
                            <div class="text-white px-4 py-6 md:p-12 md:mx-6">
                                <h4 class="text-xl font-semibold mb-6">ما فراتر از یک شرکت هستیم</h4>
                                <p class="text-sm">
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای
                                    شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می
                                    باشد
                                </p>
                            </div>
                        </div>
                        <div class="lg:w-6/12 px-4 md:px-0">
                            <div class="md:p-12 md:mx-6">
                                <div class="text-center">
                                    <img
                                            class="mx-auto w-48"
                                            src="/images/logo.webp"
                                            alt="logo"
                                    />
                                    <h4 class="text-4xl font-semibold text-center mt-1 mb-12 pb-1">ثبت نام </h4>
                                </div>
                                <form method="post" action="/register">
                                    <p class="mb-4">لطفا اطلاعات خود را وارد کنید.</p>
                                    <div class="mb-4">
                                        <input
                                                type="text" name="name"
                                                class="form-control
                                                 <?= errors("name") ? " border-red-600" : "" ?>
                                                 input-filed"
                                                id="name"
                                                value="<?= old("name") ?>"
                                                placeholder="نام "
                                        />
                                        <p class=" text-red-700 font-semibold">
                                            <?= errors("name") ?>
                                        </p>

                                    </div>
                                    <div class="mb-4">
                                        <input
                                                type="text" name="lastName"
                                                class="form-control
                                                 <?= errors("lastName") ? " border-red-600" : "" ?>
                                                 input-filed"
                                                id="lastName"
                                                value="<?= old("lastName") ?>"
                                                placeholder="نام خانوادگی"
                                        />
                                        <p class=" text-red-700 font-semibold">
                                            <?= errors("lastName") ?>
                                        </p>

                                    </div>
                                    <div class="mb-4">
                                        <input
                                                type="number" name="National_Code"
                                                class="form-control input-filed
                                                 <?= errors("National_Code") ? " border-red-600" : "" ?>"
                                                value="<?= old("National_Code") ?>"
                                                id="National_Code"
                                                placeholder="کد ملی"
                                        />
                                        <p class=" text-red-700 font-semibold">
                                            <?= errors("National_Code") ?>
                                        </p>

                                    </div>
                                    <div class="mb-4">
                                        <input
                                                type="password" name="password"
                                                class="form-control
                                                <?= errors("password") ? " border-red-600" : "" ?>

                                                block  input-filed"
                                                id="exampleFormControlInput1"
                                                placeholder="رمز عبور "
                                        />
                                        <p class=" text-red-700 font-semibold">
                                            <?= errors("password") ?>
                                        </p>
                                    </div>
                                    <div class="text-center pt-1 mb-12 pb-1">
                                        <button
                                                class="inline-block px-6 py-2.5 text-white font-medium text-md leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
                                                type="submit"
                                                data-mdb-ripple="true"
                                                data-mdb-ripple-color="light"
                                                style="
                        background: linear-gradient(
                          to right,
                          #203387FF,
                          #3e53a2,
                          #3e53a2,
                          #203387
                        );
                      "
                                        >
                                            ثبت نام
                                        </button>
                                    </div>
                                    <div class="flex items-center justify-between pb-6">
                                        <p class="mb-0 mr-2">من اکانت دارم</p>
                                        <a
                                                href="/login"
                                                class="inline-block px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                                                data-mdb-ripple="true"
                                                data-mdb-ripple-color="light"
                                        >
                                            ورود
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
