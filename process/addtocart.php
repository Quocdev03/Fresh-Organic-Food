<?php
// kiểm tra xem session đã được khởi tạo chưa
if (session_status() === PHP_SESSION_NONE) {
   session_start();
}
ob_start();
if (isset($_POST['productAdd']) && ($_POST['productAdd'])) {
   // Get value
   $productId = $_POST['productId'];
   $productName = $_POST['productName'];
   $productImage = $_POST['productImage'];
   $productPrice = $_POST['productPrice'];
   $productQuantity = $_POST['productQuantity'];
   // Create array child
   $product = array($productId, $productName, $productImage, $productPrice, $productQuantity);

   // Check if product already exists in cart
   $productIndex = -1;
   foreach ($_SESSION['cart'] as $index => $item) {
      if ($item[0] == $productId && $item[1] == $productName && $item[2] == $productImage) {
         $productIndex = $index;
         break;
      }
   }
   // If product already exists in cart, increase quantity
   if ($productIndex > -1) {
      $_SESSION['cart'][$productIndex][4] += 1;
   } else {
      // Add product to cart
      if (!isset($_SESSION['cart'])) {
         $_SESSION['cart'] = array();
      }
      array_push($_SESSION['cart'], $product);
   }
   // Redirect user to cart page
   // header('Location: index.php?url=cart');
   header("Location: {$_SERVER['HTTP_REFERER']}");
}
// Dòng 2-3: Hàm session_status() kiểm tra trạng thái của phiên làm việc và trả về một trong các giá trị sau đây: PHP_SESSION_DISABLED, PHP_SESSION_NONE hoặc PHP_SESSION_ACTIVE. Trong đoạn mã này, nếu phiên làm việc chưa được bắt đầu (trạng thái là PHP_SESSION_NONE), hàm session_start() được gọi để bắt đầu phiên làm việc.
// Dòng 4-5: Hàm ob_start() bắt đầu bộ đệm đầu ra. Bộ đệm này sẽ giữ tất cả nội dung được gửi đến trình duyệt cho đến khi bộ đệm được xóa hoặc đẩy ra ngoài.
// Dòng 6-23: Nếu nút "Thêm sản phẩm vào giỏ hàng" đã được nhấn (bằng cách kiểm tra nếu giá trị của $_POST['productAdd'] đã được đặt và khác rỗng), các giá trị của sản phẩm được lấy từ mẫu đăng nhập và được lưu trữ trong một mảng con $product. Các giá trị này bao gồm: mã sản phẩm ($productId), tên sản phẩm ($productName), hình ảnh sản phẩm ($productImage), giá sản phẩm ($productPrice) và số lượng sản phẩm ($productQuantity) mặc định là 1.
// Dòng 26-32: Với mỗi mục trong giỏ hàng hiện tại, đoạn mã kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa bằng cách so sánh thông tin của sản phẩm với từng mục trong giỏ hàng. Nếu sản phẩm đã tồn tại trong giỏ hàng, chỉ mục của sản phẩm đó trong mảng $_SESSION['cart'] được lưu trữ trong biến $productIndex. Nếu không, biến $productIndex sẽ giữ giá trị -1 để chỉ ra rằng sản phẩm chưa tồn tại trong giỏ hàng.
// Dòng 34-38: Nếu sản phẩm đã tồn tại trong giỏ hàng, số lượng sản phẩm được tăng lên một đơn vị. Điều này được thực hiện bằng cách tăng số lượng sản phẩm của sản phẩm tương ứng trong mảng $_SESSION['cart'].
// Dòng 40-44: Nếu sản phẩm chưa tồn tại trong giỏ hàng, một mảng mới $_SESSION['cart'] được tạo nếu giỏ hàng chưa được tạo trước đó, và mảng con của sản phẩm được thêm vào giỏ hàng bằng cách sử dụng hàm array_push().
// Dòng 47: Sau khi sản phẩm đã được thêm vào giỏ hàng, đoạn mã sử dụng hàm header() để chuyển hướng người dùng đến trang giỏ hàng của họ bằng cách thêm tham số truy vấn 'url=cart' vào URL của trang chủ. Hàm header() chỉ hoạt động nếu không có nội dung được gửi đến trình duyệt trước đó (tức là bộ đệm đầu ra đang hoạt động), vì vậy đoạn mã phải bắt đầu bộ đệm đầu ra bằng hàm ob_start() ở đầu.