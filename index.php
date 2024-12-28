<?php
header(header: "Access-Control-Allow-Origin: *");
header(header: "Access-Control-Allow-Methods: GET, POST, OPTIONS");
header(header: "Access-Control-Allow-Headers: Content-Type");
header(header: 'Content-Type: application/json');

$postData = $_POST;
$errors = [];

if (empty($postData['tel'])) {
    $errors['tel'] = 'Это обязательное поле' ;
}

if (empty($postData['surname'])) {
    $errors['surname'] = 'Это обязательное поле';
}

if (empty($postData['name'])) {
    $errors['name'] = 'Это обязательное поле';
}

if (empty($postData['email'])) {
    $errors['email'] = 'Это обязательное поле';
}

if (!empty($postData['email']) && !filter_var(value: $postData['email'], filter: FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Некорректный адрес электронной почты';
}

$response = [
    "success" => empty($errors) ? "true" : "false", 
    "errors" => empty($errors) ? (object)[] : $errors
];

echo json_encode(value: $response, flags: JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

/*
$to = "example@mail.com"; 
$subject = "Новое сообщение из профиля";
$message = "Email: " . $data['email'] . "\n" .
           "Телефон: " . $data['tel'] . "\n" .
           "Дополнительный номер: " . $data['tel1'] . "\n" .
           "Фамилия: " . $data['surname'] . "\n" .
           "Имя: " . $data['name'] . "\n" .
           "Отчество: " . $data['patronymic'] . "\n" .
           "Пол: " . $data['radio-blya'] . "\n" .
           "День: " . $data['day'] . "\n" .
           "Месяц: " . $data['month'] . "\n" .
           "Год: " . $data['year'] . "\n" ;
$headers = "From: noreply@example.com";

mail(to: $to, subject: $subject, message: $message, additional_headers: $headers);
*/

?>
