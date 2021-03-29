
<?php
$towho = $_SESSION['pager'];

echo("<div>
<h4>Hit like or dislike on this profile</h4<br>
    <a href='profile.php?user=".$towho."&stage=like'><button id='likeb'>
        <svg width='40' height='40' viewBox='0 0 24 24'><path d='M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm0 7.58l5.995 5.988-1.416 1.414-4.579-4.574-4.59 4.574-1.416-1.414 6.006-5.988z'/></svg>
    </button></a>
    <a href='profile.php?user=".$towho."&stage=dislike'><button id='dislikeb'>
        <svg width='40' height='40' viewBox='0 0 24 24'><path d='M24 12c0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12 12-5.373 12-12zm-18.005-1.568l1.415-1.414 4.59 4.574 4.579-4.574 1.416 1.414-5.995 5.988-6.005-5.988z'/></svg>
    </button></a>
</div>");




if (isset($_REQUEST['stage']) && ($_REQUEST['stage'] == 'like')) {
    print("LIKLIKLIKLIK");
    
    $conn = create_conn();
    $sql = "UPDATE users SET likes = likes + 1 WHERE username = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$towho);
    $stmt->execute();
    $_SESSION[$towho] = 1;
    header('Refresh:0; url=profile.php?user='.$towho);

} else if (isset($_REQUEST['stage']) && ($_REQUEST['stage'] == 'dislike')) {
    print("DISDISDISDIS");
    $conn = create_conn();
    $sql = "UPDATE users SET likes = likes - 1 WHERE username = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$towho);
    $stmt->execute();
    $_SESSION[$towho] = 1;
    header('Refresh:0; url=profile.php?user='.$towho);

} else {
    echo("<br><h4>Leave a like or dislike</h4><br>");
}