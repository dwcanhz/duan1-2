<div class="flex flex-wrap min-h-screen w-full content-center justify-center bg-gray-200 py-10">

  <!-- Login component -->
  <div class="grid grid-cols-2 shadow-md">
    <!-- Login form -->
    <div class="flex flex-wrap content-center justify-center rounded-l-md bg-white px-6 py-4" >
      <div class="w-72">
        <!-- Heading -->
        <h1 class="text-xl font-semibold">Đăng ký</h1>
        <small class="text-gray-400">Welcome ! Please enter your details</small>

        <!-- Form -->
        <form class="mt-4" action="?act=dangky" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="mb-2 block text-xs font-semibold">Họ và tên</label>
            <input name="name_user" placeholder="Enter your name" class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
          </div>

          <div class="mb-3">
            <label class="mb-2 block text-xs font-semibold">Số điện thoại</label>
            <input name="phone" placeholder="Enter your phone" class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
          </div>

          <div class="mb-3">
            <label class="mb-2 block text-xs font-semibold">Quê quán</label>
            <input name="address" placeholder="Enter your address" class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
          </div>

          <div>
            <label class="mb-2 block text-xs font-semibold">Giới tính</label>
            <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option value="nam">Nam</option>
              <option value="nu">Nữ</option>
            </select>
          </div>

          <div>
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chọn ảnh đại diện
            </label>
            <input type="file" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
          </div>

          <div class="mb-3">
            <label class="mb-2 block text-xs font-semibold">Email</label>
            <input type="email" name="email" placeholder="Enter your email" class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
            <?php if (isset($_GET['error1']))  echo "Tài khoản và mật khẩu sai" ?>
          </div>

          <div class="mb-3">
            <label class="mb-2 block text-xs font-semibold">Password</label>
            <input type="password" name="password" placeholder="*****" class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
            <?php if (isset($_GET['error2']))  echo "Mật khẩu sai" ?>
          </div>

          <div class="mb-3 flex flex-wrap content-center">
            <!-- <input id="remember" type="checkbox" class="mr-1 checked:bg-purple-700" /> <label for="remember" class="mr-auto text-xs font-semibold">Remember for 30 days</label> -->
            <a href="/" class="text-xs font-semibold text-purple-700">Forgot password?</a>
          </div>

          <div class="mb-3">
            <button type="submit" name="register" class="mb-1.5 block w-full text-center text-white bg-purple-700 hover:bg-purple-900 px-2 py-1.5 rounded-md">Sign in</button>
          </div>
        </form>

        <!-- Footer -->
        <div class="text-center">
          <span class="text-xs text-gray-400 font-semibold">Don't have account?</span>
          <a href="#" class="text-xs font-semibold text-purple-700">Sign up</a>
        </div>
      </div>
    </div>

    <!-- Login banner -->
    <div class="flex flex-wrap content-center justify-center rounded-r-md" >
      <img class="w-full h-full bg-center bg-no-repeat bg-cover rounded-r-md" src="https://prosoccer.vn/wp-content/uploads/2020/04/Giay-da-bong-chinh-hang-cu-Nike-Adidas-puma-Mizuno-1-768x432.jpg">
    </div>

  </div>


</div>