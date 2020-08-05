-- 01. Hãy cho biết tên và địa chỉ công trình (building) do chủ thầu Công ty xây dựng số 6 thi công (contractor)
SELECT b.name, b.address
FROM building AS b, contractor AS c
WHERE b.contractor_id = c.id
  AND c.name = 'cty xd so 6';

-- 02. Tìm tên và địa chỉ liên lạc của các chủ thầu (contractor) thi công công trình ở Cần Thơ (building) do kiến trúc sư 
-- Lê Kim Dung thiết kế (architect, design)
SELECT c.name, c.address
FROM building AS b, contractor AS c, architect AS a, design AS d
WHERE b.contractor_id = c.id
  AND b.id = d.building_id
  AND d.architect_id = a.id

  AND b.city = "can tho"
  AND a.name = "le kim dung";

-- 03. Hãy cho biết nơi tốt nghiệp của các kiến trúc sư (architect) đã thiết kế (design) công trình Khách Sạn Quốc Tế ở Cần Thơ (building)
SELECT place
FROM building AS b, design AS d, architect AS a
WHERE b.id = d.building_id
  AND d.architect_id = a.id
  
  AND b.name = 'khach san quoc te'
  AND b.city = 'can tho';

-- 04. Cho biết họ tên, năm sinh, năm vào nghề của các công nhân có chuyên môn hàn hoặc điện (worker)  đã tham gia 
-- các công trình (work) mà chủ thầu Lê Văn Sơn (contractor) đã trúng thầu (building)
SELECT w.name, w.birthday, w.year
FROM contractor AS c, building AS b, work AS d, worker AS w
WHERE b.contractor_id = c.id
  AND b.id = d.building_id
  AND d.worker_id = w.id
  
  AND c.name = 'le van son'
  AND (w.skill = 'han' OR w.skill = 'dien');
  
-- 05. Những công nhân nào (worker) đã bắt đầu tham gia công trình Khách sạn Quốc Tế ở Cần Thơ (building) trong giai đoạn từ 
-- ngày 15/12/1994 đến 31/12/1994 (work) số ngày tương ứng là bao nhiêu
SELECT w.name, d.total
FROM building AS b, work AS d, worker AS w
WHERE b.id = d.building_id
  AND w.id = d.worker_id
  
  AND b.name = 'khach san quoc te'
  AND b.city = 'can tho'
  AND d.date BETWEEN '1994/12/15' AND '1994/12/31';
  
-- 06. Cho biết họ tên và năm sinh của các kiến trúc sư đã tốt nghiệp ở Cần Thơ (architect) và đã thiết kế ít 
-- nhất một công trình (design) có kinh phí đầu tư trên 400 triệu đồng (building)
SELECT DISTINCT a.name, a.birthday
FROM building AS b, design AS d, architect AS a
WHERE b.id = d.building_id
  AND d.architect_id = a.id
  
  AND a.place = 'can tho'
  AND b.cost >= 400;


