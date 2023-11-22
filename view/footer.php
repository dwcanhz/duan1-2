<!--footer  -->
<footer>
                <div class="menu_footer">
                    <H3>THÔNG TIN LIÊN HỆ</H3>
                    <p class="text_footer">
                        <b>ĐỊA CHỈ:</b>
                        13 phố Trịnh Văn Bô, phường Phương Canh,
                        <br>
                        quận Nam Từ Liêm, TP Hà Nội
                    </p>
                    <p class="text_footer">
                        <b>SỐ ĐIỆN THOẠI:</b>
                        1234567890
                    </p>
                    <p class="text_footer">
                        <b>EMAIL:</b>
                        mail@gmail.com
                    </p>
                    <p class="text_footer">
                        <b>THỜI gian làm việc:</b>
                        8:00 -> 17:00
                    </p>
                </div>
                <div class="menu_footer">
                    <H3>DỊCH VỤ KHÁCH HÀNG</H3>
                    <p class="text_footer">Dịch vụ vận chuyển</p>
                    <p class="text_footer">Giải đáp thắc mắc</p>
                    <p class="text_footer">Tìm kiếm nâng cao</p>
                    <p class="text_footer">Theo dõi đơn hàng</p>
                    <p class="text_footer">Tài khoản</p>
                </div>
            </footer>
            <!--  -->
        </div>
    </body>
    <script>
        // alert('Đây là trang học lập trình')
let index = 0;

//Quan ly vi tri
function indexSlides(n) {
    showSlides(index += n);

}

function showSlides() {
    //ket noi dom class
    let img = document.getElementsByClassName('mySlides');
    //neu tang vi tri anh len vuot qua vi tri cuoi cung cua ptu trong mang thi quay ve vi tri dau tien
    if (index >= img.length) {
        index = 0;
    }
    //neu giam vi tri nho hon 0 (day la vi tri dau tien)thi phai quay ve vi tri cuoi cung
    if (index < 0){
        index = img.length-1;
    }

    //an het all anh di
    for (let i = 0; i < img.length; i++) {
        img[i].style.display = 'none';

    }
    //hien thi anh theo vi tri mong muon
    img[index].style.display = 'block';
    //tang vi tri anh len
    // index++;

}
//luon giu anh dau tien khi vao trang
showSlides()

let auto;
function autoSlides(){
    //ket noi dom class
    let img = document.getElementsByClassName('mySlides');
    //neu tang vi tri anh len vuot qua vi tri cuoi cung cua ptu trong mang thi quay ve vi tri dau tien
    if (index >= img.length) {
        index = 0;
    }
    

    //an het all anh di
    for (let i = 0; i < img.length; i++) {
        img[i].style.display = 'none';

    }
    //hien thi anh theo vi tri mong muon
    img[index].style.display = 'block';
    //tang vi tri anh len
    index++;
    // dung setTimeOut de cai chay tu dong
    auto =setTimeout(autoSlides,3000);
}
autoSlides();
function stopAuto(){
    clearInterval(auto);
}
    </script>
</html>
