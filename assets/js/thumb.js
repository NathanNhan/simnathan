// $(document).ready(function(){
//   $('.owl-carousel').owlCarousel({
//     thumbs: true,
//     thumbsPrerendered: true,
//     items:1,
//     autoHeight:true
//   });
// });
$(document).ready(function () {
  $('.owl-carousel').owlCarousel({
    thumbs: true,
    thumbsPrerendered: true,
    items: 1,           // Mặc định cho màn hình lớn
    autoHeight: true,
    loop: true,         // Lặp vô tận giúp trải nghiệm vuốt tốt hơn trên mobile
    margin: 10,         // Khoảng cách giữa các item (tính bằng px)
    autoplay: true,     // Tự động chạy (tùy chọn)
    autoplayTimeout: 4000,
    smartSpeed: 800,    // Tốc độ chuyển slide mượt mà
    touchDrag: true,    // Bật tính năng vuốt bằng tay trên mobile
    mouseDrag: true,    // Bật kéo chuột trên desktop
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,       // Màn hình điện thoại nhỏ (0px trở lên): hiển thị 1 item
        nav: false,     // Ẩn nút điều hướng trái/phải cho đỡ vướng trên mobile
        dots: true      // Hiển thị chấm tròn phân trang
      },
      600: {
        items: 2,       // Màn hình tablet nhỏ (từ 600px trở lên): hiển thị 2 item
        nav: false
      },
      1000: {
        items: 3,       // Màn hình desktop (từ 1000px trở lên): hiển thị 3 item
        nav: true,
        loop: false
      }
    }
  });
});