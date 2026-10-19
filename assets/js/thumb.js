$(document).ready(function () {
  $('.owl-carousel').owlCarousel({
    thumbs: true,
    thumbsPrerendered: true,
    items: 1,
    autoHeight: true,
    responsive: {
      0: {
        items: 2,       // Màn hình điện thoại nhỏ (0px trở lên): hiển thị 1 item
        nav: false,     // Ẩn nút điều hướng trái/phải cho đỡ vướng trên mobile
        dots: true      // Hiển thị chấm tròn phân trang
      },
      600: {
        items: 3,       // Màn hình tablet nhỏ (từ 600px trở lên): hiển thị 2 item
        nav: false
      },
      1000: {
        items: 4,       // Màn hình desktop (từ 1000px trở lên): hiển thị 3 item
        nav: true,
        loop: false
      }
    }
  });
});