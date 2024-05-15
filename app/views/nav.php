<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="/app/css/style.scss">
    <link rel="stylesheet" type="text/css" href="/app/style.css">
    <script src="/app/script.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<nav class="menu">
    <ol>
        <?php if (!isset($_SESSION['employee_id'])): ?>
            <li class="menu-item"><a href="\Product\listing">Shop</a>
                <ol class="sub-menu">
                    <li class="menu-item"><a href="/Product/listing?type=optical_sun&filter=Optical">Eyeglasses</a>
                    </li>
                    <li class="menu-item"><a href="/Product/listing?type=optical_sun&filter=Sun">Sunglasses</a>
                    </li>
                </ol>
            </li>
        <?php endif; ?>
        <?php if (!isset($_SESSION['employee_id'])): ?>
            <li class="menu-item"><a href="/Product/more">Brands</a>
                <ol class="sub-menu">
                    <li class="menu-item"><a href="/Product/listing?type=brand&filter=Gucci">Gucci</a></li>
                    <li class="menu-item"><a href="/Product/listing?type=brand&filter=Cartier">Cartier</a></li>
                    <li class="menu-item"><a href="/Product/more">More ></a></li>
                </ol>
            </li>
        <?php endif; ?>

        <?php if (isset($_SESSION['isAdmin'])): ?>
            <li class="menu-item"><a href='\Admin\index'>Admin</a>
                <ol class="sub-menu">
                    <li class="menu-item"><a href='/Admin/create'><?= __('New Product') ?></a></li>
                    <li class="menu-item"><a href='/Ticket/ongoing'><?= __('Ongoing Tickets') ?></a></li>
                    <li class="menu-item"><a href='/Admin/index'><?= __('More') ?></a></li>
                </ol>
            </li>
        <?php endif; ?>

        <?php if (!isset($_SESSION['isAdmin']) && isset($_SESSION['employee_id'])): ?>
            <li class="menu-item"><a href='/Employee/index'>Employee</a></li>
        <?php endif; ?>

        <li class="menu-item"><a href="\about">About</a>
            <ol class="sub-menu">
                <li class="menu-item"><a href="\about">About Mes Yeux Tes Yeux</a></li>
                <li class="menu-item"><a href="\contact">Contact Us</a></li>
            </ol>
        </li>
        <li class="menu-item"><a href="\Customer\dashboard">Account</a>
            <ol class="sub-menu">
                <li class="menu-item"><a href="\Customer\dashboard">My Account</a></li>
                <li class="menu-item"><a href="\User\login">Login/Register</a></li>
            </ol>
        </li>

        <li class="menu-item">
            <div class="tools">
                <button>🔍</button>
            </div>
        </li>

        <li class="menu-item">
            <div class="tools">
                <button onclick="callLink('/Cart/view')">🛒</button>
            </div>
        </li>

        <li class="menu-item"><a href="">Language</a>
            <ol class="sub-menu">
                <li class="menu-item"><button onclick="updateLanguageCookie('fr')">french</button></li>
                <li class="menu-item"><button onclick="updateLanguageCookie('en')">english</button></li>
            </ol>
        </li>

        <li class="menu-item"><a href="\User\logout">Log Out</a></li>
    </ol>


    </div>
</nav>

</html>
<script>
    function callLink(url) {
        fetch('app\controllers\Cart.php', {
            method: 'POST',
            body: JSON.stringify({ action: 'viewCart' })
        })
            // Handle the response as needed)
            .catch(error => {
                // Handle errors if any
                console.error('Error:', error);
            });

    }
</script>

<script>
    // function switchLang() {
    //     var button = document.getElementById('langBtn')
    //     switch (button.value) {
    //         case 'en': {
    //             button.innerText = 'fr';
    //             updateLanguageCookie('fr');
    //             break;
    //         }
    //         case 'fr': {
    //             button.innerText = 'en';
    //             updateLanguageCookie('en');
    //             break;
    //         }
    //         default: {
    //             button.innerText = 'en';
    //             updateLanguageCookie('en');
    //         }
    //     }
    // }

    function updateLanguageCookie(lang) {
        document.cookie = "lang=" + lang + ";expires=" + new Date(Date.now() + (30 * 24 * 60 * 60 * 1000)).toUTCString() + ";path=/;SameSite=None;secure";

        window.location.reload();
    }

</script>