-- WHERE
-- A. Column VS Value
-- 07. Hiển thị tất cả thông tin của kiến trúc sư 'le thanh tung'
SELECT * FROM sql_qlct.architect
WHERE name = "le thanh tung"; 

-- 08. Hiển thị tên, năm sinh của các công nhân có chuyên môn hàn hoặc điện
SELECT name, birthday, skill FROM sql_qlct.worker
WHERE skill = "han" OR skill = "dien";

-- 09. Hiển thị tên, năm sinh của các công nhân có chuyên môn hàn hoặc điện & năm sinh > 1948
SELECT name, birthday, skill FROM sql_qlct.worker
WHERE (skill = "han" OR skill = "dien") AND birthday > 1948;

-- B. Column VS Column
-- 10. Hiển thị những công nhân bắt đầu vào nghề khi tuổi dưới 20. (birthday + 20 > year)
SELECT * FROM sql_qlct.worker
WHERE birthday + 20 > year;

-- C. Column [NOT] IN <danh sach gia tri> (So sánh cột vs tập hợp nhiều giá trị)
-- 11.C1 Hiển thị những công nhân có năm sinh = 1940, 1945, 1948
SELECT * FROM sql_qlct.worker
WHERE birthday = 1940 OR birthday = 1945 OR birthday = 1948;

-- 11.C2
SELECT * FROM sql_qlct.worker
WHERE birthday IN (1940, 1945, 1948);

-- 11. Hiển thị những công nhân có năm sinh # 1940, 1945, 1948
SELECT * FROM sql_qlct.worker
WHERE birthday NOT IN (1940, 1945, 1948);

-- D. Column [NOT] BETWEEN <start> AND <end> (So sánh cột vs tập hợp nhiều giá trị)
-- 12.C1 Tìm các công trình có chi phí đầu tư từ 200 - 500
SELECT * FROM sql_qlct.building
WHERE cost >= 200 AND cost <= 500;

-- 12.C2
SELECT * FROM sql_qlct.building
WHERE cost BETWEEN 200 AND 500;

-- E. Column [NOT] LIKE <string>
-- 13. Tìm các kiến trúc sư có họ là "nguyen"
SELECT * FROM sql_qlct.architect
WHERE name LIKE "nguyen%";

-- 14. Tìm các kiến trúc sư có tên lót là "anh"
SELECT * FROM sql_qlct.architect
WHERE name LIKE "%anh%";

-- 15. Tìm các kiến trúc sư tên bắt đầu là "th" & gồm 3 kí tự
SELECT * FROM sql_qlct.architect
WHERE name LIKE "%th_";

-- F. Column IS [NOT] NULL
-- 16. Tìm các chủ thầu ko có sdt
SELECT * FROM sql_qlct.contractor
WHERE phone IS NULL;

-- 17. Tìm các chủ thầu có sdt
SELECT * FROM sql_qlct.contractor
WHERE phone IS NOT NULL;














