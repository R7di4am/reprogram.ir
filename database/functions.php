<?php
require_once __DIR__ . "/db.php";

function is_login_ok() {
    if(isset($_SESSION['fingerprint']) && isset( $_SESSION['id'] )) {
        $fingerprint = $_SESSION['fingerprint'];
        $id = $_SESSION['id'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $user = get_user_by_id($id);

        if($user) {
            $expected_fingerprint = hash('sha256', $ip . $user['token']);
            if($fingerprint == $expected_fingerprint && $user['ip_address'] == $ip){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function generate_key($length = 16)
{
    return bin2hex(random_bytes($length));
}
function sanitizeInput($input)
{
    return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}

function displaySafeOutput($input)
{
    return htmlspecialchars_decode($input, ENT_QUOTES);
}

function get_user_by_username($username)
{
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}
function get_user_by_id($id)
{
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}

function update_user_by_id($id, $token, $ip)
{
    global $pdo;
    $stmt = $pdo->prepare('UPDATE users SET token = ?, ip_address = ? WHERE id = ?');
    $stmt->execute([$token, $ip, $id]);
    return $stmt->rowCount() > 0;
}

?>