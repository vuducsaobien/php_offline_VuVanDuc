-- 1.	Hiển thị danh sách các users, thông tin gồm: id, fullname và email (fullname = firstname + “ “ + lastname) 
SELECT id, CONCAT_WS('', lastname, ' ', firstname) AS fullName, email
FROM user;

-- 2.	Hiển thị danh sách các users có email thuộc tài khoản của gmail ( giá trị email có dạng xxx@gmail.com), thông tin 
-- gồm: id, fullname, email 

SELECT id, CONCAT_WS('', lastname, ' ', firstname) AS fullName, email
FROM user
	WHERE email LIKE "%@gmail.com";
    
-- 3.	Hiển thị danh sách các users chưa có avatar hoặc sign (chưa có hình ảnh hoặc chữ ký, nếu chưa có các giá trị này sẽ 
-- bằng rỗng) ), thông tin gồm: id, fullname, email 

SELECT id, CONCAT_WS('', lastname, ' ', firstname) AS fullName, email
FROM user
	WHERE avatar IS NULL
		OR sign IS NULL;

-- 4.	Hiển thị danh sách các users chưa được kích hoạt tài khoản (active_time là giá trị rỗng), thông tin gồm: id, fullname, email 

SELECT id, CONCAT_WS('', lastname, ' ', firstname) AS fullName, email
FROM user
	WHERE active_time IS NULL;
        
-- 5.	Hiển thị danh sách các users được tạo ra từ ngày 11/07/2020 đến 30/07/2020), thông tin gồm: id, fullname, email 

SELECT id, CONCAT_WS('', lastname, ' ', firstname) AS fullName, email
FROM user
	WHERE created BETWEEN '2020/07/11' AND '2020/07/30';
    
-- 6.	Hiển thị danh sách các users vừa được cập nhật trong 2 ngày gần đây nhất 

SELECT id, CONCAT_WS('', lastname, ' ', firstname) AS fullName, email
FROM user
	WHERE modified < DATE_ADD(NOW(), INTERVAL - 2 DAY);
    
-- 7.	Cho biết có bao nhiêu users chưa được active tài khoản 

SELECT id, CONCAT_WS('', lastname, ' ', firstname) AS fullName, email
FROM user
	WHERE active_time IS NULL;
    
-- 8.	Cho biết user nào vừa đăng ký vào website nhưng chưa active tài khoản 

SELECT id, CONCAT_WS('', lastname, ' ', firstname) AS fullName, email
FROM user
	WHERE register_time IS NOT NULL
		AND active_time IS NULL;
        
-- 9.	Hiển thị danh sách các users, thông tin gồm: id, fullname, email và tên group 

SELECT u.id, CONCAT_WS('', lastname, ' ', firstname) AS fullName, u.email, g.name
FROM user AS u, sql_user.group AS g
	WHERE u.group_id = g.id;

-- 10.	Thống kê tổng số users ở mỗi group 

SELECT g.name, COUNT(u.id) AS total_user
FROM user AS u, sql_user.group AS g
	WHERE u.group_id = g.id
	GROUP BY u.group_id;
    
-- 11.	Thống kê tổng số có bao nhiêu user có quyền truy cập vào Admin control panel (groupACP = 1)
-- 12.	Cho biết các quyền của group có name là Admin
