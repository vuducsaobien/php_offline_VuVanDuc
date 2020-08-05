-- 01. Hiển thị thông tin công trình có chi phí cao nhất
SELECT * FROM sql_qlct.building
WHERE cost = 
	(
		SELECT MAX(cost) FROM sql_qlct.building
	);

-- Dạng 02
-- 02. Hiển thị thông tin công trình có chi phí lớn hơn tất cả các công trình được xây dựng ở Cần Thơ

SELECT * FROM sql_qlct.building
WHERE cost > ALL
	(
		SELECT cost FROM sql_qlct.building
		WHERE city = 'can tho'
	);

-- 02. Hiển thị thông tin công trình có chi phí lớn hơn công trình lớn nhất được xây dựng ở Cần Thơ
SELECT * FROM sql_qlct.building
WHERE cost >
	(
		SELECT MAX(cost) FROM sql_qlct.building
		WHERE city = 'can tho'
	);

-- Dạng 03
-- 03. Hiển thị thông tin công trình có chi phí lớn hơn một trong các công trình được xây dựng ở Cần Thơ

SELECT * FROM building
WHERE city <> "can tho" AND cost > ANY
	(
		SELECT cost FROM building
		WHERE city = 'can tho'
	);

-- Dạng 04
-- 04. Hiển thị thông tin công trình chưa có kiến trúc sư thiết kế
SELECT * FROM sql_qlct.building
WHERE id NOT IN 
	(
		SELECT building_id FROM sql_qlct.design
	);

-- 04. Hiển thị thông tin công trình đã có kiến trúc sư thiết kế
SELECT * FROM sql_qlct.building
WHERE id IN 
	(
		SELECT building_id FROM sql_qlct.design
	);

-- 05. Hiển thị thông tin các kiến trúc sư cùng năm sinh và cùng nơi tốt nghiệp

SELECT name , birthday, place FROM sql_qlct.architect AS a
WHERE EXISTS 
	(
		SELECT * FROM sql_qlct.architect AS b
		WHERE a.birthday = b.birthday AND a.place = b.place
			AND a.id <> b.id
	)







