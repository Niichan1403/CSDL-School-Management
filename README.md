# CSDL-School Management

Dự án BTL môn CSDL được nhóm mình thiết kế và phát triển trong vòng 3 tuần, với đề tài là phần mềm quản lý trường học dưới dạng 1 trang web. Trang web hiện tại vẫn còn nhiều chức năng chưa hoàn thiện, nhưng đã có đủ một số chức năng CRUD cơ bản nhất.

# Các thành viên của nhóm
- Trần Tuấn Anh - 21020281
- Trần Tuấn Việt - 
- Ma Thanh Thiện -

# Các công nghệ đã sử dụng
- Bootstrap: framework của CSS và Js, dùng để code giao diện
- Jquery và PHP: sử dụng để code chức năng (liên kết database, chỉnh sửa database ...)
- Xampp: lưu trữ database

# Các chức năng của trang web
- Homepage: trang chủ của trang web, đã hoàn thành UI/UX
- Admin page: trang quản lý page của admin, những tài khoản được cấp quyền admin có thể đăng nhập vào section này và thực hiện chỉnh sửa dữ liệu
- Admin page có nhiều section, trong đó một số section đã hoàn thành đầy đủ các chức năng CRUD như: Dashboard, Học sinh, Học phí, Thư viện ảnh. Admin có thể quản lý thêm, sửa, xóa, cập nhật thông tin qua các section này

# Cách cài đặt và kiểm thử
- Trước hết, các bạn cần clone project này về máy, để trong thư mục htdocs của Xampp ( đường dẫn sẽ có dạng ../Xampp/htdocs/tên-project )
_Lưu ý_ Bước này phải làm đúng nếu không sẽ không thể liên kết trang web với cơ sở dữ liệu
- Sau đó các bạn mở Xampp và khởi động Phpmyadmin, tạo một cơ sở dữ liệu mới tên 'school', sau đó copy phần code SQL trong file CreateDatabase.txt vào để add các bảng trong cơ sở dữ liệu
- Để kiểm thử sản phẩm, các bạn vào browser và truy cập địa chỉ http://localhost/tên-project/index.php để vào trang Homepage hoặc địa chỉ http://localhost/tên-project/admin/login.php để vào phần login admin (bạn cũng có thể vào trang login admin bằng nút login trong trang Homepage)
- Tài khoản và mật khẩu admin: niichan
