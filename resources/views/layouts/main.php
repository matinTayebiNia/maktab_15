<?php

use App\core\Auth;

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- tailwind CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <title><?= $title ?? app_name() ?></title>
</head>
<body class="bg-gray-50 font-body">
<nav class="fixed border-b mx-auto max-w-full overflow-y-auto container  p-5 top-0 left-0 right-0  bg-white ">
    <div class="flex  items-center justify-around ">
        <div class="pt-2">
            <a href="/">
                <img src="/images/logo.webp" alt="logo" class="">
            </a>
        </div>


        <div class="hidden md:flex gap-8">
            <a href="#" class="hover:underline hover:text-darkGrayishBlue">قیمت گذاری</a>
            <a href="#" class="hover:underline hover:text-darkGrayishBlue">تولید</a>
            <a href="#" class="hover:underline hover:text-darkGrayishBlue">درباره ما</a>
            <a href="#" class="hover:underline hover:text-darkGrayishBlue">مشاغل</a>
            <a href="#" class="hover:underline hover:text-darkGrayishBlue">انجمن</a>
        </div>
        <!--        Button-->
        <?php if (Auth::isGuest()): ?>
            <a href="/login"
               class="p-3 hidden md:block
            px-6 text-lg text-white bg-blue-700 rounded baseline hover:bg-blue-600  ">
                ورود
            </a>
        <?php else: ?>
            <?php
            $route = match (user()->TypeUser()) {
                "doctor" => "/doctors/index",
                "patient" => "/patient/index",
                "manager" => "/admin/index",
                default => false,
            };
            ?>
            <a href="<?= $route ?>"
               class="p-3 hidden md:block
            px-6 text-lg text-white bg-blue-700 rounded baseline hover:bg-blue-600  ">
                پنل کاربری
            </a>
        <?php endif; ?>
        <button class="block  hamburger md:hidden focus:outline-none" id="menu-btn">
            <span class="hamburger-top"></span>
            <span class="hamburger-middle"></span>
            <span class="hamburger-bottom"></span>
        </button>
    </div>


</nav>
<div class="md:hidden fixed  w-screen    ">
    <div id="menu" class="  bg-white flex-col items-center self-end hidden py-8 mt-5
gap-6 bg-transparent left-6 right-6 sm:w-auto sm:self-center">
        <a href="#" class="">قیمت گذاری</a>
        <a href="#" class="">تولید</a>
        <a href="#" class="">درباره ما</a>
        <a href="#" class="">مشاغل</a>
        <a href="#" class="">انجمن</a>
    </div>
</div>

{{content}}


<section id="cta" class=" -mb-8 md:mb-0 bg-gray-800 mt-5 ">
    <!--    Flex container-->
    <div class=" container flex  flex-col
     items-center justify-between md:px-12 py-24 gap-12
     mx-auto  md:gap-0 rtl:space-y-12 md:py-16
      md:rtl:space-y-0 md:flex-row  ">
        <!--        Heading -->
        <div class="flex items-center justify-center gap-4 ">
            <h1 class="text-white text-xl font-bold"> ما را دنبال کنید در </h1>

            <a href="#">
                <img src="/images/icon-facebook.svg" alt="facebook" class="h-5">
            </a>
            <a href="#">
                <img src="/images/icon-youtube.svg" alt="youtube" class="h-5">
            </a>
            <a href="#">
                <img src="/images/icon-twitter.svg" alt="twitter" class="h-5">
            </a>
            <a href="#">
                <img src="/images/icon-pinterest.svg" alt="pinterest" class="h-5">
            </a>

        </div>
        <!--        Button-->
        <div class=" flex gap-6 flex-col  md:flex-row items-center text-white ">
            <h1 class="text-white text-xl font-bold">عضویت در خبرنامه: </h1>
            <div class="flex w-72 md:w-96  ">
                <input type="text" placeholder="ورود ادرس ایمیل.." name="reports"
                       class="py-3 border  w-full  rounded-r-full text-black bg-white px-3 focus:outline-none focus:ring  ">
                <input type="button" name="btn_reports" value="عضویت"
                       class=" p-3 cursor-pointer  block px-6 pt-2 text-white bg-blue-700 rounded-l-full baseline hover:bg-blue-600  ">
            </div>
        </div>
    </div>
</section>

<section class="bg-gray-900 ">
    <div class="container flex flex-col-reverse justify-between px-6 py-10 mx-auto my-8 md:my-0 md:py-16 md:flex-row">
        <div class="flex flex-col-reverse gap-12 items-center justify-between my-12 md:flex-col md:my-0 md:items-start">
            <div class=" md:hidden mx-auto my-6 text-white text-center ">
                Copyright © 2022, All Rights Reserved
            </div>
            <div class="">
                <img src="/images/footerlogo.webp" class="h-12 " alt="logo">
            </div>
            <div class="flex justify-center gap-4">
                <a href="#">
                    <img src="/images/icon-facebook.svg" alt="facebook" class="h-8">
                </a>
                <a href="#">
                    <img src="/images/icon-youtube.svg" alt="youtube" class="h-8">
                </a>
                <a href="#">
                    <img src="/images/icon-twitter.svg" alt="twitter" class="h-8">
                </a>
                <a href="#">
                    <img src="/images/icon-pinterest.svg" alt="pinterest" class="h-8">
                </a>
                <a href="#">
                    <img src="/images/icon-instagram.svg" alt="instagram" class="h-8">
                </a>
            </div>
        </div>
        <div class="flex  justify-around gap-20  ">
            <div class="flex flex-col text-right rtl:space-y-3 text-white">
                <a href="#" class="hover:underline hover:text-brightRed">مشاغل</a>
                <a href="#" class="hover:underline hover:text-brightRed">انجمن</a>
                <a href="#" class="hover:underline hover:text-brightRed">سیاست حفظ حریم خصوصی</a>
            </div>
            <div class="flex flex-col text-right rtl:space-y-3 text-white">
                <a href="#" class="hover:underline hover:text-brightRed">صفحه اصلی</a>
                <a href="#" class="hover:underline hover:text-brightRed">قیمت گذاری</a>
                <a href="#" class="hover:underline hover:text-brightRed">محصولات</a>
                <a href="#" class="hover:underline hover:text-brightRed">درباره ما</a>
            </div>
        </div>
    </div>
</section>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="/js/script.js"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>
