-- TRUY VẤN ĐƠN GIẢN
-- 01.Hiển thị toàn bộ nội dung của bảng Architect;
SELECT * FROM architect;

-- 02. Hiển thị danh sách gồm họ tên & giới tính của kiến trúc sư
SELECT name, sex FROM architect; 

-- 03.C1 Hiển thị năm sinh của các kiến trúc sư
SELECT birthday FROM architect;
-- 03.C2 Hiển thị năm sinh của các kiến trúc sư
SELECT ALL birthday FROM architect;

-- 04. Hiển thị năm sinh của các kiến trúc sư (các năm sinh không trùng nhau)
SELECT DISTINCT birthday FROM architect;

-- SĂP XẾP KẾT QUẢ
-- 05.C1 Hiển thị danh sách các kiến trúc sư (họ tên & năm sinh) (các năm sinh theo thứ tự tăng dần)
SELECT name, birthday FROM architect
ORDER BY birthday ASC;
-- 05.C2 Hiển thị danh sách các kiến trúc sư (họ tên & năm sinh) (các năm sinh theo thứ tự tăng dần)
SELECT name, birthday FROM architect
ORDER BY birthday;

-- 06. Hiển thị danh sách các công trình có chi phí từ thấp đến cao.
-- Nếu 2 công trình có chi phí = nhau THÌ sắp xếp tên thành phố theo bảng chữ cái giẻm dần zyx -> bca (Hà Nội -> Cần Thơ)
SELECT name, city, cost FROM building
ORDER BY cost, city DESC;



