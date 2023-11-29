<!--  -->
<!-- <div class="pay">
                <div class="pay_sub_1">
                    <img src="<?= $product['anh_sp'] ?>" alt="">
                </div> -->
<!--  -->
<!-- <div class="pay_sub_2">
    <p class="name_pay"><?= $product['ten_sp'] ?></p>
    <p class="active">Status:available</p>
    <p class="price_pay">Price:<?= $product['gia_sp'] ?>$</p>
    <div class="box">
        <p class="size_text">Size:</p>
        <div class="size">
            <button type="submit">38</button>
            <button type="submit">39</button>
            <button type="submit">40</button>
            <button type="submit">41</button>
            <button type="submit">42</button>
            <button type="submit">43</button>
        </div>
        <div class="box_btn_pay">
            <div class="quantity">
                <label for="">Số lượng:</label>
                <input class="quantity_choose" type="number">
            </div>
            <a href="">
                <button type="submit" class="btn_pay">Thêm vào giỏ hàng</button>
            </a>
        </div> -->
<!--  -->
<!-- <div class="detail">
            <h2 class="text_detail">Mô tả :</h2>
            <?= $product['mota_sp'] ?>
        </div>
    </div>
</div>
</div>
<hr>
<div class="content_sanpham">
    <h3 class="name_kit">Một số sản phẩm khác</h3>
    <div class="products">
        <div class="products_sub">
            <a href="">
                <img class="img_sanpham" src="../assets/img/giay4.jpg" alt="">
            </a>
            <br>
            <p class="text_products">Firm Ground Low Predator Accuracy.1</p>
            <br>
            <mark class="price">1.500.000 VNĐ</mark>
            <br>
            <a href="">
                <button class="purchase">Mua Ngay</button>
            </a>
        </div>
        <div class="products_sub">
            <a href="">
                <img class="img_sanpham" src="../assets/img/giay5.jpg" alt="">
            </a>
            <br>
            <p class="text_products">Firm Ground Low Predator Edge.1.1</p>
            <br>
            <mark class="price">1.500.000 VNĐ</mark>
            <br>
            <a href="">
                <button class="purchase">Mua Ngay</button>
            </a>
        </div>
        <div class="products_sub">
            <a href="">
                <img class="img_sanpham" src="../assets/img/giay6.jpg" alt="">
            </a>
            <br>
            <p class="text_products">GIÀY ĐÁ BÓNG TURF X CRAZYFAST MESSI.3</p>
            <br>
            <mark class="price">1.500.000 VNĐ</mark>
            <br>
            <a href="">
                <button class="purchase">Mua Ngay</button>
            </a>
        </div>
    </div>
</div> -->

<!-- component -->
<?php
// if (is_array($getfullPro)) {
//   extract($getfullPro);
// }

?>
<section class="text-gray-700 body-font overflow-hidden bg-white">
    <div class="container px-5 py-24 mx-auto" id="data-product" data-id="<?= $product['id_sp'] ?>" data-product='<?php echo json_encode($product); ?>'>
        <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src="<?= $product['anh_sp'] ?>">
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h2 class="text-sm title-font text-gray-500 tracking-widest"> <b>Tên Giầy </b> </h2>
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1"><?= $product['ten_sp'] ?></h1>


                <!-- <p class="leading-relaxed">Số lượng: =</p> -->

                <p class="leading-relaxed">Trong kho: <?= $product['trongkho'] ?></p>

                <!-- <p class="leading-relaxed">Số lượng: =</p> -->

                <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
                    <div class="flex ml-6 items-center">
                        <input type="hidden" name="" id="" value="<?= $id ?>">
                        <span class="mr-3">Size</span>
                        <div class="relative">
                            <select id="size" class="rounded border appearance-none border-gray-400 py-2 focus:outline-none focus:border-red-500 text-base pl-3 pr-10">
                                <?php

                                foreach ($sizes as  $show) {
                                    extract($show);
                                    var_dump($show);
                                    if ($id  == $_GET['id'])
                                        echo '
                  <option value="' . $size . '" selected>' . $size . '</option> ';
                                    else echo '<option value="' . $size . '">' . $size . '</option> ';
                                }

                                ?>
                                <!-- <option>SM</option>
                <option>M</option>
                <option>L</option>
                <option>XL</option> -->
                            </select>
                            <span class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </div>
                    </div>

                    <!-- <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent ml-4">
                        <button type="button" data-action="decrement" class=" bg-gray-200 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                            <span class="m-auto text-2xl font-thin">−</span>
                        </button>
                        <input type="number" class="outline-none focus:outline-none text-center w-full bg-gray-100 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" id="slPrd" name="sl" value="1" min="0"></input>
                        <button type="button" data-action="increment" class="bg-gray-200 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                            <span class="m-auto text-2xl font-thin">+</span>
                        </button>
                    </div> -->
                </div>

                <div class="flex">
                    <span class="title-font font-medium text-2xl text-gray-900"><?= number_format($product['gia_sp']) ?> VNĐ</span>
                    <button id="btn-add-prd" class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">Mua
                        hàng</button>
                    <button class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                        <!-- <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"> -->
                        <i class='bx bx-cart-add'>
                     </i>
                            </path>
                            </svg>
                    </button>
                </div>

                <div class="detail max-h-[320px] overflow-y-auto border border-green-500 rounded-md px-4 py-2">
                    <h2 class="text_detail text-xl font-medium mb-2">Mô tả :</h2>
                    <?= $product['mota_sp'] ?>
                </div>
            </div>

        </div>
    </div>

    <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 container mx-auto " style="max-width: 950px;">
        <div class="px-4">
            <!-- form bình luận -->
            <!-- if mua hàng thì show form bình luân, else không show -->
            <?php if ($is_bought == 'login') { ?>
                <p>Vui lòng đăng nhập để thực hiện comment <a class="text-blue-500" href="?dangnhap">Đăng nhập </a></A></p>
            <?php } ?>

            <?php if ($is_bought == 'watch') echo  '<p class="">Hãy mua hàng và cho chúng tôi biết trải nghiệm của bạn về sản phẩm của chúng tôi</p>' ?>

            <?php if ($is_bought == 'cmt') echo '<div class="mb-6">
        <h1 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Viết bình luận của bạn tại đây</h1>
        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
          <label for="comment" class="sr-only">Your comment</label>
          <textarea id="comment-value" rows="2" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Viết bình luận..." required></textarea>
        </div>
        <button disabled id="btn-cmt" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-primary-900 hover:bg-blue-800">
          Gửi bình luận
        </button>
      </div>' ?>

            <!-- show bình luận -->

            <div id="list-cmt" class="overflow-y-auto" style="max-height: 800px;">

            </div>

        </div>
    </section>
</section>

<!-- Toast -->

<div id="toast-success" style="transform: translateX(-50%);" class="hidden fixed top-0 left-2/4 -translate-x-2/4 flex items-center p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
    <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ml-3 text-sm font-normal">Thêm sản phẩm vào giỏ thành công</div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
    </button>
</div>

<script src="./src/js/flowbite.js"></script>