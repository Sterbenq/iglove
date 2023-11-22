<?php

$name = $_POST['name'];
$phone = $_POST['phone'];

if (strlen($phone) < 19) {
    echo "Ошибка: Некоректный номер телефона.";
    exit;
}

$telegramToken = '6502961874:AAHfXSdRkoItHae38jTJSfvmmDY_Sg3qsbE';
$chatId = '-1001671457551';
$message = "⭐️Нова заявка з сайту ⭐️\n👨Ім'я: $name\n📱Телефон: $phone";

// Отправляем запрос в Телеграм с использованием библиотеки cURL
$telegramApiUrl = "https://api.telegram.org/bot$telegramToken/sendMessage";
$telegramData = array('chat_id' => $chatId, 'text' => $message);

$ch = curl_init($telegramApiUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $telegramData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

// Отправляем ответ клиенту
echo "Данные успешно получены и отправлены в Телеграм!"


?>