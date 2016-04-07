<?php
if ($status) {
    echo json_encode(['result' => 1, 'errors' => []]);
} else {
//    print_r($errors);
    echo json_encode(['result' => 0, 'errors' => $errors]);
}
