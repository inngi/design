<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- https://github.com/yusufshakeel/dyCalendarJS --}}
    <link rel="stylesheet" href="{{ asset('css/dycalendar.css') }}">

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
            background: linear-gradient(#03a9f4, #161623);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 100px;
            overflow: hidden;
        }

        .sec::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: linear-gradient(#ffc107, #e91e63);
            border-radius: 50%;
            transform: translate(-250px, -120px);
        }

        .sec::after {
            content: '';
            position: absolute;
            width: 350px;
            height: 350px;
            background: linear-gradient(#2196f3, #31ff38);
            border-radius: 50%;
            transform: translate(250px, 150px);
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

        .box {
            position: relative;
            z-index: 1000;
        }

        .container {
            position: relative;
            width: 400px;
            min-height: 400px;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-right: 1px solid rgba(255, 255, 255, 0.2);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(25px);
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #dycalendar{
            width:100%;
            padding:20px;
        }
        #dycalendar table{
            width:100%;
            margin-top:40px;
            border-spacing:5px;
        }
        #dycalendar table tr:nth-child(1) td{
            background: white;
            color:black;
            border-radius: 4px;
            font-weight:600;
        }
        #dycalendar table td{
            color:white;
            padding:10px;
            cursor:pointer;
            border-radius:4px;
        }
        #dycalendar table td:hover{
            background:white;
            color:black!important;
        }
        .dycalendar-month-container .dycalendar-today-date, .dycalendar-month-container .dycalendar-target-date{
            background:white;
            color:black!important;
        }
        .dycalendar-month-container .dycalendar-header .dycalendar-prev-next-btn.prev-btn{
            background:white;
            color:black;
            width:44px;
            height:38px;
            border-radius:4px;
            display:flex;
            justify-content: center;
            align-items: center;
            font-size:24px;
        }
        .dycalendar-month-container .dycalendar-header .dycalendar-prev-next-btn.next-btn{
            background:white;
            color:black;
            width:44px;
            height:38px;
            border-radius:4px;
            display:flex;
            justify-content: center;
            align-items: center;
            font-size:24px;
        }
        .dycalendar-month-container .dycalendar-span-month-year{
            color:white;
            font-size:1.5em;
            font-weight:500;
        }
        
    </style>

</head>

<body>
    <section class="sec">
        <header>
            <a href="#" class="logo">inngi</a>
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

        {{-- calendar --}}
        <section>
            <div class="box">
                <div class="container">
                    <div id="dycalendar"></div>
                </div>
            </div>
        </section>

        <script src="{{ asset('js/dycalendar.js') }}"></script>
        <script>
            dycalendar.draw({
                target: '#dycalendar',
                type: 'month',
                dayformat: 'full',
                monthformat: 'full',
                highlighttargetdate: true,
                prevnextbutton:'show'
            })

        </script>
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

</html>
