<?php
/*
    count , array_key, array_values

    Một số hàm có sãn của PHP tiếp theo
*/

$num = [1,2,3,4,5,6,7,8,9,9,9,9,10];

// array_pop: Lấy ra phần tử cuối cùng trong mảng ( xóa phần tử cuối cùng tronng mảng)
// echo array_pop($num);

// array_push : Thêm vào 1 hoặc nhiều phần tử vào cuối mảng
// $num[] = 11;
// echo array_push($num, 11,12,13); // trả về độ dài mới của mảng

// array_unshift: Thêm 1 hoặc nhiều phần tử vào đầu mảng
// echo array_unshift($num, -2 , -1, 0); // trả về độ dài mới của mảng

// array_shift: Xóa phần tử đầu tiên trong mảng
echo array_shift($num); // trả về giá trị của phần tử vừa xóa
print_r($num);
echo "<hr>";

// array_merge($arr1, $arr2, $arr...n) Gộp 2 hay nhiều mảng
$num_2 = ['abc','xyz'];
print_r(array_merge($num, $num_2));

// array_search(giá trị phần tử, tên mảng):  Tìm kiếm 1 giá trị trong mảng, nếu có nó sẽ trả về vị trí key của phần tử đó 
echo array_search(5, $num);

// array_unique(): Loại bỏ những phần tử trùng nhau ( loai cả vị trí của phần tử đó )
print_r(array_unique($num)); // trả ra 1 mảng mới khi đã loại bỏ hết phần tử trùng nhau

// in_array(giá trị phần tử, tên mảng) Kiểm tra trong mảng có tồn tại giá trị nào đó hay k
in_array(2,$num); // trả về true nếu có và ngược lại

// Kiểm tra có phải 1 mảng hay k
is_array($num); // trả về true nếu đúng và ngược lại
?>