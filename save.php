<?php
// ファイルパス
$file = 'data.json';

// POSTデータ取得
$input = json_decode(file_get_contents('php://input'), true);
$text = $input['text'] ?? '';


if ($text !== '') {
    // 既存データ読み込み
    $data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

    // 新しいタスクを追加
    $newTask = ['text' => $text];
    $data[] = $newTask;

    // JSON保存
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    // 保存したデータを返す
    echo json_encode($newTask);
}
