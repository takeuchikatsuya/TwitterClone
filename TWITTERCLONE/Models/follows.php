<?php
///////////////////////////////////////
// フォローデータを処理
///////////////////////////////////////
 
/**
 * フォローを作成
 *
 * @param array $data
 * @return int|false
 */
function createFollow(array $data)
{
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    // 接続チェック
    if ($mysqli->connect_errno) {
        echo 'MySQLの接続に失敗しました。：' . $mysqli->connect_error . "\n";
        exit;
    }
 
    // SQLを作成
    $query = 'INSERT INTO follows (follow_user_id, followed_user_id) VALUES (?, ?)';
    $statement = $mysqli->prepare($query);
 
    // プレースホルダーに値をセット
    $statement->bind_param('ii', $data['follow_user_id'], $data['followed_user_id']);
 
    // SQL実行
    if ($statement->execute()) {
        // 結果をIDで返却
        $response = $mysqli->insert_id;
    } else {
        //結果を失敗で返却
        $response = false;
        echo 'エラーメッセージ：' . $mysqli->error . "\n";
    }
 
    // 接続を閉じる
    $statement->close();
    $mysqli->close();
 
    return $response;
}
 
/**
 * フォローを取り消し
 *
 * @param array $data
 * @return bool
 */
function deleteFollow(array $data)
{
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    // 接続チェック
    if ($mysqli->connect_errno) {
        echo 'MySQLの接続に失敗しました。：' . $mysqli->connect_error . "\n";
        exit;
    }
 
    // 更新日時
    $data['updated_at'] = date('Y-m-d H:i:s');
 
    // 更新のSQLを作成
    $query = 'UPDATE follows SET status = "deleted", updated_at = ? WHERE id = ? AND follow_user_id = ?';
    $statement = $mysqli->prepare($query);
 
    // プレースホルダーにセット
    $statement->bind_param('sii', $data['updated_at'], $data['follow_id'], $data['follow_user_id']);
 
    // SQL実行
    $response = $statement->execute();
 
    // 失敗した場合、エラー出力
    if ($response === false) {
        echo 'エラーメッセージ：' . $mysqli->error . "\n";
    }
 
    // 接続を閉じる
    $statement->close();
    $mysqli->close();
 
    return $response;
}
 
/**
 * 自分がフォーローしているユーザーID一覧を取得
 *
 * @param int $follow_user_id
 * @return array|false
 */
function findFollowingUserIds(int $follow_user_id)
{
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    // 接続チェック
    if ($mysqli->connect_errno) {
        echo 'MySQLの接続に失敗しました。：' . $mysqli->connect_error . "\n";
        exit;
    }
 
    // エスケープ
    $follow_user_id = $mysqli->real_escape_string($follow_user_id);
 
    // 検索のSQLを作成
    $query = 'SELECT followed_user_id FROM follows'
        . ' WHERE status = "active" AND follow_user_id ="' . $follow_user_id . '"';
 
    // SQL実行
    $result = $mysqli->query($query);
    if (!$result) {
        echo 'エラーメッセージ：' . $mysqli->error . "\n";
        // 接続を閉じる
        $mysqli->close();
        return false;
    }
 
    // フォロー一覧を取得
    $follows = $result->fetch_all(MYSQLI_ASSOC);
 
    // ユーザーIDの一覧を作成
    $following_user_ids = [];
    foreach ($follows as $follow) {
        $following_user_ids[] = $follow['followed_user_id'];
    }
 
    // 接続を閉じる
    $mysqli->close();
 
    return $following_user_ids;
}