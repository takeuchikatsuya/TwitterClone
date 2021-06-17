<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="discription=" content="ホーム画面です">
    <link rel="icon" href="img/logo-twitterblue.svg">
   <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">　
    <link href="css/style.css" rel="stylesheet">
    <title>ホーム画面/twitterクローン</title>
</head>
<body class="home">
    <div class="container">
        <div class="side">
            <div class="side-inner">
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="home.php" class="nav-link"><img src=".\img\logo-twitterblue.svg" alt="" class="icon"></a></li>
                    <li class="nav-item"><a href="home.php" class="nav-link"><img src=".\img\icon-home.svg" alt=""></a></li>
                    <li class="nav-item"><a href="search.php" class="nav-link"><img src=".\img\icon-search.svg" alt=""></a></li>
                    <li class="nav-item"><a href="notification.php" class="nav-link"><img src=".\img\icon-notification.svg" alt=""></a></li>
                    <li class="nav-item"><a href="profile.php" class="nav-link"><img src=".\img\icon-profile.svg" alt=""></a></li>
                    <li class="nav-item"><a href="post.php" class="nav-link"><img src=".\img\icon-post-tweet-twitterblue.svg" alt=""></a></li>
                    <li class="nav-item my-icon"><img src="./img_uploaded/user/sample-person.jpg" alt="顔写真" class="posttweet"></li>
                </ul>
            </div>
        </div> 
        <div class="main">
            <div class="main-header">
                <h1>ホーム</h1>
            </div>
            <div class="tweet-post">
                <div class="my-icon">
                <img src="./img_uploaded/user/sample-person.jpg" alt="">
                </div>
                <div class="input-area">
                    <form action="post.php" methot="post" enctype="multipart/form-date">
                        <textarea name="body" placeholder="いまどうしてる？" maxlenght="140"></textarea>
                        <div class="botom-area">
                            <div class="mb-0">
                                <input type="file" name="image" class="form-control form-control-sm">
                            </div>
                            <button class="btn" type="submit">つぶやく</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="ditch"></div>
                <div class="tweet-list">
                    <div class="tweet">
                        <div class="user">
                            <a href="profile.php?user_id=1">
                                <img src="./img_uploaded/user/sample-person.jpg" alt="">
                            </a>
                        </div>
                        <div class="content">
                            <div class="name">
                                <a href="profile.php?user_id=1">
                                    <span class="nickname">太郎</span>
                                    <span class="user-name">@太郎・23日前</span>
                                </a>
                            </div>
                            <p>今programmingをしています。</p>
                            <div class="icon-list">
                                <div class="like">
                                    <img src="img\icon-heart-twitterblue.svg" alt="">
                                </div>
                                <div class="lilevount">0</div>
                            </div>
                        </div>
                    </div>

                    <div class="tweet">
                        <div class="user">
                            <a href="profile.php?user_id=1">
                                <img src="img\icon-default-user.svg" alt="">
                            </a>
                        </div>
                        <div class="content">
                            <div class="name">
                                <a href="profile.php?user_id=1">
                                    <span class="nickname">次郎</span>
                                    <span class="user-name">@次郎・24日前</span>
                                </a>
                            </div>
                            <p>コワーキングスペースをオープンしました</p>
                            <div class="icon-list">
                                <img src="img\icon-post-tweet-twitterblue.svg" alt="" class="post-image">
                                <div class="like">
                                    <img src="img\icon-heart-twitterblue.svg" alt="">
                                </div>
                                <div class="like-count">1</div>
                            </div>  
                        </div>
                    </div>
                </div>        
        </div>
    </div>       
</body>
</html>