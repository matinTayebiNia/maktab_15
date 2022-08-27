<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- tailwind CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <title>Hello, world!</title>
</head>
<body>
<nav class="relative  container mx-auto p-6">
    <div class="flex  items-center justify-between ">
        <div class="pt-2">
            <img src="/images/logo.svg" alt="logo" class="">
        </div>


        <div class="hidden md:flex gap-8">
            <a href="#" class="hover:underline hover:text-darkGrayishBlue">قیمت گذاری</a>
            <a href="#" class="hover:underline hover:text-darkGrayishBlue">تولید</a>
            <a href="#" class="hover:underline hover:text-darkGrayishBlue">درباره ما</a>
            <a href="#" class="hover:underline hover:text-darkGrayishBlue">مشاغل</a>
            <a href="#" class="hover:underline hover:text-darkGrayishBlue">انجمن</a>
        </div>
        <!--        Button-->
        <a href="/login" class="p-3 hidden md:block px-6 pt-2 text-white bg-blue-400 rounded-full baseline hover:bg-blue-500  ">
            ورود
        </a>

        <button class="block  hamburger md:hidden focus:outline-none" id="menu-btn">
            <span class="hamburger-top"></span>
            <span class="hamburger-middle"></span>
            <span class="hamburger-bottom"></span>
        </button>
    </div>
    <div class="md:hidden">
        <div id="menu" class="absolute  flex-col items-center self-end hidden py-8 mt-5
gap-6 bg-transparent left-6 right-6 sm:w-auto sm:self-center">
            <a href="#" class="">Pricing</a>
            <a href="#" class="">Product</a>
            <a href="#" class="">About us</a>
            <a href="#" class="">Careers</a>
            <a href="#" class="">Community</a>
        </div>
    </div>

</nav>


    {{content}}


<section id="cta" class="bg-blue-400   mt-5">
    <!--    Flex container-->
    <div class=" container flex  flex-col  items-center justify-around px-6 py-24 mx-auto  md:gap-0 rtl:space-y-12 md:py-16 md:rtl:space-y-0 md:flex-row ">
        <!--        Heading -->
        <h2 class="text-5xl font-bold leading-tight text-center text-white md:text-4xl md:max-w-xl md:text-left">
            نحوه کار تیم خود را امروز ساده کنید
        </h2>
        <!--        Button-->
        <div>
            <a href="#" class="p-3 px-6 pt-2  text-black bg-white shadow-2xl
                   rounded-full baseline hover:bg-gray-100  ">
                شروع کسب کار
            </a>
        </div>
    </div>
</section>

<section class="bg-veryDarkBlue ">
    <div class="container flex flex-col-reverse justify-between px-6 py-10 mx-auto my-8 md:my-0 md:py-16 md:flex-row">
        <div class="flex flex-col-reverse gap-12 items-center justify-between my-12 md:flex-col md:my-0 md:items-start">
            <div class=" md:hidden mx-auto my-6 text-white text-center ">
                Copyright © 2022, All Rights Reserved
            </div>
            <div class="">
                <img src="/images/logo-white.svg" class="h-8 " alt="logo">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>
