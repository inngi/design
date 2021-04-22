<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>inngi responsive website design</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'sans-serif';
        }

        .sec {
            position: relative;
            width: 100%;
            min-height: 100vh;
            background: linear-gradient(#03a9f4, #b6cb30);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 100px;
        }

        .custom-shape-divider-bottom-1619070603 {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }

        .custom-shape-divider-bottom-1619070603 svg {
            position: relative;
            display: block;
            width: calc(162% + 1.3px);
            height: 168px;
        }

        .custom-shape-divider-bottom-1619070603 .shape-fill {
            fill: #FFFFFF;
        }

        header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 40px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .logo {
            font-size: 2em;
            color: #fff;
            text-decoration: none;
            font-weight: 700;
            text-transform: uppercase;
        }

        header .navigation {
            position: relative;
            display: flex;
        }

        header .navigation li {
            list-style: none;
        }

        header .navigation li a {
            text-decoration: none;
            margin-left: 40px;
            color: #fff;
        }

        .content {
            position: relative;
            max-width: 600px;
            z-index: 1;
        }

        .content h2 {
            color: #fff;
            font-size: 5em;
            line-height: 1em;
        }

        .content h2 span {
            color: #fff;
            font-size: 0.7em;
        }

        .content p {
            color: #fff;
            margin: 10px 0 20px;
        }

        .content a {
            text-decoration: none;
            background: #fff;
            padding: 10px 30px;
            display: inline-block;
            color: #111;
        }

        .girl {
            position: absolute;
            bottom: 0;
            height: 90%;
            right: 100px;
        }

        @media (max-width:991px) {
            header {
                padding: 40px 40px;
            }

            header ul.navigation {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(#03a9f4, #b6cb30);
                z-index: 100;
                display: none;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }

            header ul.navigation.active {
                display: flex;
            }

            header .navigation li a {
                text-decoration: none;
                margin-left: 0;
                color: #fff;
                font-size: 30px;
            }

            header .toggleMenu {
                position: relative;
                width: 30px;
                height: 30px;
                background: url(images/design/hamburger.png);
                background-size: 130px;
                background-repeat: no-repeat;
                background-position: center;
                z-index: 1000;
                cursor: pointer;
            }

            header .toggleMenu.active {
                position: fixed;
                right: 40px;
                background: url(images/design/close.png);
                background-size: 130px;
                background-repeat: no-repeat;
                background-position: center;
                z-index: 1000;
                cursor: pointer;
            }

            .sec {

                justify-content: center;
                align-items: center;
                padding: 40px;
                flex-direction: column
            }

            .content {
                max-width: 100%;
                margin-top: 120px
            }

            .content h2 {
                font-size: 3em;
            }

            .girl {
                position: relative;
                bottom: 0;
                height: inherit;
                right: inherit;
                max-width: 80%;
            }
        }

    </style>

</head>

<body>
    <section class="sec">
        <header>
            <a href="#" class="logo">Logo</a>
            <div class="toggleMenu" onclick="toggleMenu()"></div>
            <ul class="navigation">
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Work</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </header>

        <div class="content">
            <div class="textBx">
                <h2>Responsive<br><span>Webdesign</span></h2>
                <p>Responsive Webdesign 은 반응형 웹디자인을 말합니다. 스크린 사이즈에 상관없이, 모니터, 모바일 등 디바이스에 상관없이 디자인이 깨지지 않습니다.</p>
                <a href="http://">learn more</a>
            </div>
        </div>
        <div class="custom-shape-divider-bottom-1619070603">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                    class="shape-fill"></path>
            </svg>
        </div>
        <img src="/images/design/girl.png" alt="" class="girl">
    </section>

    <script>
        function toggleMenu() {
            const toggleMenu = document.querySelector('.toggleMenu');
            const navigation = document.querySelector('.navigation');
            toggleMenu.classList.toggle('active')
            navigation.classList.toggle('active')
        }

    </script>
</body>
수정됨 commit
</html>
