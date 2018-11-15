<?php

include './administrator/init.php';
$security = new security;
$connect = new connect;
/**
 * Sample php server script for a wookmark integration
 *
 * @author Sebastian Helzle <sebastian@helzle.net>
 */
/**
 * Basic class which provides all functions to retrieve and paginate pictures
 */
class PictureDatabase {

/**
 * @var array $data
 */
protected $data;

/**
 * @var int $itemsPerPage
 */
protected $itemsPerPage;

function __construct($data, $itemsPerPage) {
$this->data = $data;
$this->itemsPerPage = $itemsPerPage;
}

/**
 * Returns the pictures of the given page or an empty array if page doesn't exist
 * @param int $page
 * @return array
 */
public function getPage($page = 1) {
if ($page > 0 && $page <= $this->getNumberOfPages()) {
$startOffset = ($page - 1) * $this->itemsPerPage;
return array_slice($this->data, $startOffset, $this->itemsPerPage);
}
return array();
}

/**
 * Returns the maximum number of pages
 * @return int
 */
public function getNumberOfPages() {
return ceil(count($this->data) / $this->itemsPerPage);
}

}

// Our data source

$sql = "SELECT * FROM tbl_file WHERE status=1";

$result = $connect->query($sql);
$data = array(     );
    while ($rows = mysql_fetch_assoc($result)){

    }    


//$data = array(
//  array(
//    'id' => "12",
//    'title' => "First image",
//    'text' => "asdaasd asd asd asd asd",
//    'width' => "200",
//    'height' => "283",
//    'image' => "sample-images/image_1_big.jpg",
//    'preview' => "sample-images/image_1.jpg"
//  ), 
//     array(
//    'id' => "11",
//    'title' => "First image",
//    'text' => "asdasdasمتن کوتاهی در مورد پرونده ی آخر متن کوتاهی در مورد پرونده ی آخرمتن کوتاهی در مورد پرونده ی آخرمتن کوتاهی در مورد پروند    d",
//    'width' => "200",
//    'height' => "283",
//    'image' => "sample-images/image_1_big.jpg",
//    'preview' => "sample-images/image_1.jpg"
//  ),
//     array(
//    'id' => "0",
//    'title' => "First image",
//    'text' => "asdasd asd asd",
//    'width' => "200",
//    'height' => "283",
//    'image' => "sample-images/image_1_big.jpg",
//    'preview' => "sample-images/image_1.jpg"
//  ),
//      array(
//    'id' => "9",
//    'title' => "First image",
//    'text' => "asdaasd asd asd asd asd",
//    'width' => "200",
//    'height' => "283",
//    'image' => "sample-images/image_1_big.jpg",
//    'preview' => "sample-images/image_1.jpg"
//  ), 
//     array(
//    'id' => "8",
//    'title' => "First image",
//    'text' => "asdasdasمتن کوتاهی در مورد پرونده ی آخر متن کوتاهی در مورد پرونده ی آخرمتن کوتاهی در مورد پرونده ی آخرمتن کوتاهی در مورد پروند    d",
//    'width' => "200",
//    'height' => "283",
//    'image' => "sample-images/image_1_big.jpg",
//    'preview' => "sample-images/image_1.jpg"
//  ),
//     array(
//    'id' => "7",
//    'title' => "First image",
//    'text' => "asdasd asd asd",
//    'width' => "200",
//    'height' => "283",
//    'image' => "sample-images/image_1_big.jpg",
//    'preview' => "sample-images/image_1.jpg"
//  ),
//      array(
//    'id' => "6",
//    'title' => "First image",
//    'text' => "asdaasd asd asd asd asd",
//    'width' => "200",
//    'height' => "283",
//    'image' => "sample-images/image_1_big.jpg",
//    'preview' => "sample-images/image_1.jpg"
//  ), 
//     array(
//    'id' => "5",
//    'title' => "First image",
//    'text' => "asdasdasمتن کوتاهی در مورد پرونده ی آخر متن کوتاهی در مورد پرونده ی آخرمتن کوتاهی در مورد پرونده ی آخرمتن کوتاهی در مورد پروند    d",
//    'width' => "200",
//    'height' => "283",
//    'image' => "sample-images/image_1_big.jpg",
//    'preview' => "sample-images/image_1.jpg"
//  ),
//       array(
//    'id' => "5",
//    'title' => "First image",
//    'text' => "asdasdasمتن کوتاهی در مورد پرونده ی آخر متن کوتاهی در مورد پرونده ی آخرمتن کوتاهی در مورد پرونده ی آخرمتن کوتاهی در مورد پروند    d",
//    'width' => "200",
//    'height' => "283",
//    'image' => "sample-images/image_1_big.jpg",
//    'preview' => "sample-images/image_1.jpg"
//  ),
//       array(
//    'id' => "5",
//    'title' => "First image",
//    'text' => "asdasdasمتن کوتاهی در مورد پرونده ی آخر متن کوتاهی در مورد پرونده ی آخرمتن کوتاهی در مورد پرونده ی آخرمتن کوتاهی در مورد پروند    d",
//    'width' => "200",
//    'height' => "283",
//    'image' => "sample-images/image_1_big.jpg",
//    'preview' => "sample-images/image_1.jpg"
//  ),
//       array(
//    'id' => "5",
//    'title' => "First image",
//    'text' => "asdasdasمتن کوتاهی در مورد پرونده ی آخر متن کوتاهی در مورد پرونده ی آخرمتن کوتاهی در مورد پرونده ی آخرمتن کوتاهی در مورد پروند    d",
//    'width' => "200",
//    'height' => "283",
//    'image' => "sample-images/image_1_big.jpg",
//    'preview' => "sample-images/image_1.jpg"
//  ),
//       array(
//    'id' => "5",
//    'title' => "First image",
//    'text' => "asdasdasمتن کوتاهی در مورد پرونده ی آخر متن کوتاهی در مورد پرونده ی آخرمتن کوتاهی در مورد پرونده ی آخرمتن کوتاهی در مورد پروند    d",
//    'width' => "200",
//    'height' => "283",
//    'image' => "sample-images/image_1_big.jpg",
//    'preview' => "sample-images/image_1.jpg"
//  ),
//     array(
//    'id' => "4",
//    'title' => "First image",
//    'text' => "asdasd asd asd",
//    'width' => "200",
//    'height' => "283",
//    'image' => "sample-images/image_1_big.jpg",
//    'preview' => "sample-images/image_1.jpg"
//  )
//);
// Make data array a bit bigger to have more pages
// Create instance of picture database with 10 items per page and our data as source
$pictureDatabase = new PictureDatabase($data, 20);

$result = array(
'success' => TRUE,
 'message' => 'Retrieved pictures',
 'data' => array()
);

$callback = isset($_REQUEST['callback']) ? $_REQUEST['callback'] : false;

// Get requested page number from request and return error message if parameter is not a number
$page = 1;
try {
$page = intval($_REQUEST['page']);
} catch (Exception $e) {
$result['success'] = FALSE;
$result['message'] = 'Parameter page is not a number';
}

// Get data from database
$result['data'] = $pictureDatabase->getPage($page);

if (count($result['data']) == 0 || $page >= $pictureDatabase->getNumberOfPages()) {
$result['success'] = TRUE;
$result['message'] = 'No more pictures';
}

// Encode data as json or jsonp and return it
if ($callback) {
header('Content-Type: application/javascript');
echo $callback . '(' . json_encode($result) . ')';
} else {
header('Content-Type: application/json');
echo json_encode($result);
}
