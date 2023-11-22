<!-- <div class="timkiem">
    <form action="">
        <input class="input_timkiem" type="text" placeholder="Nhập tên sản phẩm...">
        <button type="submit" class="button_timkiem">Tìm kiếm</button>
    </form>
</div> -->
<!--  -->
<!--  -->
<style>
    .slides{
        position: relative;
    }
    .mySlides>img {
        width: 100%;
        height: 500px;
    }
    .pre{
        
        position: absolute;
        left: 20px;
        top: 300px;
    }
    .next{
        
        position: absolute;
        right: 20px;
        top: 300px; 
    }
    .btn_go{
        font-size: 50px;
    }
</style>
<div class="slides">
    <div class="mySlides">
        <img src="../assets/img/banner2.jpg" alt="#">
    </div>
    <div class="mySlides">
        <img src="../assets/img/banner.jpg" alt="#">
    </div>
    <div class="mySlides">
        <img src="../assets/img/sale_banner1.jpg" alt="#">
    </div>
    <div class="mySlides">
        <img src="../assets/img/OIP1.jpg" alt="#">
    </div>
</div>
<div>
    <div class="pre"> <button onclick="indexSlides(-1) "><div class="btn_go"><</div></button></div>
    <!-- <button onclick="autoSlides()">Auto</button>
    <button onclick="stopAuto()">Stop Auto</button> -->
    <div class="next"> <button onclick="indexSlides(1)"><div class="btn_go">></div></button></div>
</div>
<!--  -->
<!-- content -->
<!-- <div class="cotent">
    <div class="article">
        <div class="article1">
            <p class="text_article1">Danh mục</p>
            <div class="danhmuc">
                <div class="box_danhmuc">
                    <a href="">Giày NIKE</a>
                </div>
                <div class="box_danhmuc">
                    <a href="">Giày ADIDAS</a> -->
                <!-- </div>
                <div class="box_danhmuc">
                    <a href="">Giày PUMA</a>
                </div>
                <div class="box_danhmuc">
                    <a href="">Giày MIZUNO</a>
                </div>
                <div class="box_danhmuc">
                    <a href="">Giày WIKA</a>
                </div>
            </div>
        </div> -->
        <!--  -->
        <!-- <div class="article1">
            <p class="text_article1">Top 5 bán chạy nhất</p>
            <div class="danhmuc">
                <div class="box_danhmuc">
                    <a href="">Nike Vapor 15 Elite Mercurial Dream Speed</a>
                </div>
                <div class="box_danhmuc">
                    <a href="">Nike Mercurial Vapor 15 Elite</a>
                </div>
                <div class="box_danhmuc">
                    <a href="">Nike Jr. Mercurial Superfly 9 Club</a>
                </div>
                <div class="box_danhmuc">
                    <a href="">Firm Ground Low Predator Accuracy.1</a>
                </div>
                <div class="box_danhmuc">
                    <a href="">Firm Ground Low Predator Edge.1.1</a>
                </div>
            </div>
        </div> -->
    <!-- </div> -->
    <!-- // -->
    <!-- <div class="article2">
        <div class="sale_banner">
            <a href="">
                <img src="../assets/img/sale_banner.jpg" alt="">
            </a>
        </div>
    </div>
<
/div> -->
<!-- content -->

<!-- banner, slide -->


<div class="carousel relative -z-10 container mx-auto" style="max-width: 1600px">
    <div id="default-carousel" class="relative" data-carousel="">
       
    </div>
</div>
<!-- danh mục -->
<div class="mx-auto">
<div class="px-6 pt-16 sm:pt-24 mx-auto">
    <h2 class="text-2xl font-bold tracking-tight text-gray-900 text-center">DANH MỤC SẢN PHẨM</h2>
    <div class="mt-6 p-2 grid grid-cols-3 gap-y-10 gap-x-6 sm:grid-cols-6 lg:grid-cols-6 xl:gap-x-5">
        <?php foreach ($categories as $key => $value) : ?>
            <a href="?category=<?= str_replace(' ', '-', $value['ten_dm']) ?>&id=<?= $value['id'] ?>" class="group relative bg-gray-200 rounded-md">
                <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md group-hover:opacity-75 lg:aspect-none flex items-center justify-center">
                    <img src="<?= $value['anh_sp'] ?>" alt=" <?= $value['ten_dm'] ?>" class="mt-4 h-16 w-16 lg:h-24 lg:w-24 rounded-full object-cover object-center">
                </div>
                <div class="text-base my-3 flex items-center justify-center px-2">
                    <?= $value['ten_dm'] ?>
                </div>
            </a>
        <?php endforeach ?>

        <!-- More products... -->
    </div>
</div>
</div>

<!-- Sản phẩm best seller -->
<section class="bg-white pt-12">
    <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
        <div id="store" class="w-full z-30 top-0 px-6 py-1">
            <div class="w-full container mx-auto flex flex-wrap items-center justify-center mt-0 px-2 py-3">
                <h3 class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl">
                    SẢN PHẨM BEST SELLER
                    <div class="h-1 w-full bg-indigo-500 rounded"></div>
                </h3>
            </div>
        </div>
        <!-- show product -->
        <!--  -->

        <div id="user-id" class="mt-4 grid grid-cols-3 lg:grid-cols-5 gap-10 px-6" data-userId="<?= isset($_SESSION['user']['id_sp']) ? $_SESSION['user']['id_sp'] : 'null' ?>">
            <?php foreach ($productBestSl as $key => $value) : ?>
                
                    <div class="relative max-w-md w-full bg-gray-100 shadow-lg rounded-xl p-5">
                        <div class="absolute top-0 left-0 z-10 bg-red-500 rounded-l-lg px-2 text-white">
                            Bán chạy
                        </div>
                        <div class="relative">

                            <a href="?chi-tiet&id=<?= $value['id_sp'] ?>">
                                <div class=" h-56 mb-3">
                                    <img src="<?=$value['anh_sp'] ?>" alt="Just a flower" class="h-full w-full object-fill rounded-2xl" />
                                </div>
                                <div class="flex-auto justify-evenly">
                                    <div class="flex flex-wrap">
                                        <div class="w-full flex-none text-sm flex items-center text-gray-600"></div>
                                        <div class="flex items-center w-full justify-between min-w-0">
                                            <h2 class="text-xl mr-auto font-medium cursor-pointer text-black-100 hover:text-purple-500 truncate">
                                                <?= $value['ten_sp'] ?>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="mt-1 flex items-center justify-between">
                                        <span class="text-base text-yellow-600 font-normal"><?= number_format($value['gia_sp']) ?> VNĐ</span>
                                        <span class="text-xs text-black-400">Đã bán: <?= $value['luotban_sp'] ?></span>
                                    </div>

                                    <div class="flex space-x-2 text-sm font-medium justify-start my-3">
                                        <button class="w-full transition ease-in duration-300 inline-flex items-center justify-center text-sm font-medium mb-2 md:mb-0 bg-purple-500 px-5 py-2 hover:shadow-lg tracking-wider text-white rounded-full hover:bg-purple-600">
                                            <span>Xem chi tiết</span>
                                        </button>
                                    </div>

                                </div>
                            </a>
                        </div>
                    </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!--  -->
<section class="bg-white py-12">
    <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
        <div id="store" class="w-full z-30 top-0 px-6 py-1">
            <div class="w-full container mx-auto flex flex-wrap items-center justify-center mt-0 px-2 py-3">
                <h3 class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl">
                    SẢN PHẨM MỚI NHẤT
                    <div class="h-1 w-full bg-indigo-500 rounded"></div>
                </h3>
            </div>
        </div>
        <!-- show product -->
        <!--  -->
        <div id="user-id" class="mt-4 grid grid-cols-3 lg:grid-cols-5 gap-10 px-6" data-userId="<?= isset($_SESSION['user']['id_sp']) ? $_SESSION['user']['id_sp'] : 'null' ?>">
            <?php foreach ($products as $key => $value) : ?>

                <div class="max-w-md w-full bg-gray-100 shadow-lg rounded-xl p-5">
                    <div class="relative">
                      

                        <a href="?chi-tiet&id=<?= $value['id_sp'] ?>">
                            <div class=" h-56 mb-3">
                                <img src="<?=$value['anh_sp'] ?>" alt="Just a flower" class="h-full w-full object-fill rounded-2xl" />
                            </div>
                            <div class="flex-auto justify-evenly">
                                <div class="flex flex-wrap">
                                    <div class="w-full flex-none text-sm flex items-center text-gray-600"></div>
                                    <div class="flex items-center w-full justify-between min-w-0">
                                        <h2 class="text-xl mr-auto font-medium cursor-pointer text-black-100 hover:text-purple-500 truncate">
                                            <?= $value['ten_sp'] ?>
                                        </h2>
                                    </div>
                                </div>
                                <div class="mt-1 flex items-center justify-between">
                                    <span class="text-base text-yellow-600 font-normal"><?= number_format($value['gia_sp']) ?> VNĐ</span>
                                    <span class="text-xs text-black-400">Đã bán: <?= $value['luotban_sp'] ?></span>
                                </div>

                                <div class="flex space-x-2 text-sm font-medium justify-start my-3">
                                    <button class="w-full transition ease-in duration-300 inline-flex items-center justify-center text-sm font-medium mb-2 md:mb-0 bg-purple-500 px-5 py-2 hover:shadow-lg tracking-wider text-white rounded-full hover:bg-purple-600">
                                        <span>Xem chi tiết</span>
                                    </button>
                                </div>

                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <nav aria-label="Page navigation example" class="flex justify-center">
        <ul class="inline-flex items-center -space-x-px">
            <li>
                <a href="#" class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Previous</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </li>
            <li>
                <a href="?page=1" class="<?php if (!isset($_GET['page']) || $_GET['page'] == 1) echo "text-blue-600 bg-blue-50" ?> px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
            </li>
            <li>
                <a href="?page=2" class="<?php if (isset($_GET['page']) && $_GET['page'] == 2) echo "text-blue-600 bg-blue-50" ?> px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
            </li>
            <li>
                <a href="?page=3" aria-current="page" class="<?php if (isset($_GET['page']) && $_GET['page'] == 3) echo "text-blue-600 bg-blue-50" ?> z-10 px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">3</a>
            </li>
            <li>
                <a href="?page=4" class="<?php if (isset($_GET['page']) && $_GET['page'] == 4) echo "text-blue-600 bg-blue-50" ?> px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
            </li>
            <li>
                <a href="?page=5" class="<?php if (isset($_GET['page']) && $_GET['page'] == 5) echo "text-blue-600 bg-blue-50" ?>px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
            </li>
            <li>
                <a href="#" class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Next</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </li>
        </ul>
    </nav>


</section>


<div id="toast-fav" style="transform: translateX(-50%);" class="hidden z-50 fixed top-0 left-2/4 -translate-x-2/4 flex items-center p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
    <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div id="toast-conten-fav" class="ml-3 text-sm font-normal"></div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
    </button>
</div>

