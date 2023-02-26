<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="google-site-verification" content="Sn7omJMnvkUdnwuWwaO_VpCFCqVgKkGpcOh8naXtvas" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>


    <!-- title -->
    <title>ক্ষুদ্র নৃ-গোষ্ঠী সেবা কর্ণার</title>
{{--
    <meta name="description" content="Bongomata women's corner (bwc) is a helping platform to reach poor women." />
    <meta name="robots" content="index" />
    <meta name="keywords" content="Bongomata women's corner, bwc, বঙ্গমাতা, netrokona, netrokona DC office, নেত্রকোনা, digitalnetrokona, digital netrokona, automate infosys" />

    <meta name="author" content="khaled mosharraf" /> --}}
    <link href="https://fonts.maateen.me/mukti/font.css" rel="stylesheet">

    <!-- fevicon -->
    <link rel="icon" href="{{'assets/assets/img/favicon.png'}}" type="image/x-icon" sizes="16x16">

    <link href="https://fonts.googleapis.com/css2?family=Galada&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link href="{{'assets/assets/css/bootstrap.min.css'}}" rel="stylesheet">

    <!-- font-awesome -->
    <link href="{{'assets/assets/css/all.min.css'}}" rel="stylesheet">

    <!-- owl carousel -->
    <link href="{{'assets/assets/css/owl-carousel.min.css'}}" rel="stylesheet">

    <!-- lightbox -->
    <link href="{{'assets/asset/css/lightbox.min.css'}}" rel="stylesheet">

    <!-- main css -->
    <link href="{{'assets/assets/css/style.css'}}" rel="stylesheet">

    <!-- responsive -->
    <link href="{{'assets/assets/css/responsive.css'}}" rel="stylesheet">

</head>
<body>

    <!-- ==================================================
                    Scroll_to_top Area
    =================================================== -->

    <div id="scroll_to_top">
        <a href="#topbar"><i class="fas fa-arrow-up"></i></a>
    </div>

    <div id="wrapper">
    <!-- ==================================================
                    Start Header Area
    =================================================== -->
        <div id="topbar" class="py-1">
            <div class="container">
                <div class="topbar">
                    <div class="topbar_left">
                        <span> </span>
                    </div>
                    <div class="topbar_right">
                        <span class="date"></span>
                    </div>
                </div>
            </div>
        </div>

        <?php
            //  function bn2enNumber ($number){
            //     $replace_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০",".");
            //     $search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0","-");
            //     $bn_number = str_replace($search_array, $replace_array, $number);

            //     return $bn_number;
            //   }
            //     $servername = "localhost";
            //     $username = "digitalnetrokona_user";
            //     $password = "parvez@good";
            //     $dbname = "digitalnetrokona_bongomata";

            //     $conn = new mysqli($servername, $username, $password, $dbname);
            //     if ($conn->connect_error) {
            //       die("Connection failed: " . $conn->connect_error);
            //     }
            //     $total_request = 0;
            //     $total_feedback = 0;
            //     $sql = "SELECT count(id) as cnt FROM helprequests";
            //     $result = $conn->query($sql);
            //     if ($result->num_rows > 0) {
            //       while($row = $result->fetch_assoc()) {
            //         $total_request =  bn2enNumber($row["cnt"]);
            //       }
            //     }
            //      $sql = "SELECT count(id) as cnt FROM helprequests where feedback_date is not null";
            //     $result = $conn->query($sql);
            //     if ($result->num_rows > 0) {
            //       while($row = $result->fetch_assoc()) {
            //         $total_feedback =  bn2enNumber($row["cnt"]);
            //       }
            //     }
            //     $conn->close();
        ?>
        <header>
            <div class="container">
                <div class="header_area">
                    <div class="logo">
                        <a href="#"><img src="{{'assets/assets/img/logo.png'}}" class="img-fluid" alt="logo"></a>
                    </div>
                    <div class="main_title d-flex flex-wrap">
                        <h1 style="color:rgb(168, 97, 4);font-family: 'Mukti', sans-serif;">ক্ষুদ্র নৃ-গোষ্ঠী সেবা কর্ণার
                             </h1>
                             <h5>"ICT ব্যবহারের মাধ্যমে ক্ষুদ্র নৃ-গোষ্ঠী জনগনের জীবন-মান উন্নয়ন"</h5>

                        {{-- <img src="{{'assets/assets/img/womenscorner2.png'}}" class="img-fluid" alt=""> --}}
                    </div>
                    <nav>

                        <div class="nav_bottom">
                            <form action="#">
                                <input type="text" placeholder="খুঁজুন">
                                <input type="submit" value="অনুসন্ধান">
                            </form>
                                 @if (!Auth::check())
                                    <a href="{{route('login')}}" ><button class="btn button apply">লগ ইন</button></a>
                           @endif


                        </div>
                    </nav>
                </div>
            </div>
        </header>

        <!-- ==================================================
                    Hero Area
        =================================================== -->

        <div id="hero_area">
            <div id="slider_area" class="owl-carousel">
                <div class="slide" style="background-image: url('{{'assets/assets/img/slide/1.jpg'}}');"></div>
                <div class="slide" style="background-image: url('{{'assets/assets/img/slide/2.jpg'}}');"></div>
                <div class="slide" style="background-image: url('{{'assets/assets/img/slide/3.jpg'}}');"></div>
                <div class="slide" style="background-image: url('{{'assets/assets/img/slide/4.jpg'}}');"></div>
                <div class="slide" style="background-image: url('{{'assets/assets/img/slide/5.jpg'}}');"></div>
                <div class="slide" style="background-image: url('{{'assets/assets/img/slide/6.jpg'}}');"></div>
                <div class="slide" style="background-image: url('{{'assets/assets/img/slide/7.jpg'}}');"></div>

            </div>
            <div class="slider_info">
                <p class="slide_caption">ক্ষুদ্র নৃ-গোষ্ঠী সংস্কৃতি
                </p>
                <div class="call_to_action">
                    <a href="{{route('application.create')}}" class="button apply"><i class="fas fa-paper-plane"></i>আবেদন করুন</a>
                    <a href="{{route('certificate.create')}}" class="button apply"><svg fill="#000" height="81px" width="81px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-112.64 -112.64 737.28 737.28" xml:space="preserve" stroke="#000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M486.881,68.409H25.119C11.268,68.409,0,79.677,0,93.528v324.944c0,13.851,11.268,25.119,25.119,25.119h94.419 c4.428,0,8.017-3.588,8.017-8.017c0-4.428-3.588-8.017-8.017-8.017H25.119c-5.01,0-9.086-4.076-9.086-9.086V93.528 c0-5.01,4.076-9.086,9.086-9.086h461.762c5.01,0,9.086,4.076,9.086,9.086v324.944c0,5.01-4.076,9.086-9.086,9.086H154.037 c-4.428,0-8.017,3.588-8.017,8.017c0,4.428,3.588,8.017,8.017,8.017h332.844c13.851,0,25.119-11.268,25.119-25.119V93.528 C512,79.677,500.732,68.409,486.881,68.409z"></path> </g> </g> <g> <g> <path d="M452.676,111.165h-59.858c-4.428,0-8.017,3.588-8.017,8.017s3.588,8.017,8.017,8.017h59.858 c0.294,0,0.534,0.241,0.534,0.534v256.534c0,0.294-0.241,0.534-0.534,0.534H59.324c-0.294,0-0.534-0.241-0.534-0.534V127.733 c0-0.294,0.241-0.534,0.534-0.534h298.934c4.428,0,8.017-3.588,8.017-8.017s-3.588-8.017-8.017-8.017H59.324 c-9.136,0-16.568,7.432-16.568,16.568v256.534c0,9.136,7.432,16.568,16.568,16.568h393.353c9.136,0,16.568-7.432,16.568-16.568 V127.733C469.244,118.597,461.812,111.165,452.676,111.165z"></path> </g> </g> <g> <g> <path d="M207.441,272.112c13.73-12.429,22.371-30.382,22.371-50.317c0-37.426-30.448-67.875-67.875-67.875 s-67.875,30.448-67.875,67.875c0,19.935,8.641,37.888,22.372,50.317l-21.943,64.316c-1.139,3.344,0.042,7.04,2.912,9.101 c2.87,2.061,6.748,2,9.554-0.15l14.926-11.44l4.822,18.179c0.905,3.414,3.94,5.834,7.469,5.956 c0.094,0.003,0.188,0.005,0.281,0.005c3.417,0,6.475-2.173,7.586-5.428l19.897-58.32l19.897,58.32 c1.111,3.255,4.167,5.428,7.586,5.428c0.093,0,0.187-0.002,0.281-0.005c3.531-0.122,6.565-2.542,7.469-5.956l4.822-18.179 l14.926,11.44c2.819,2.16,6.839,2.182,9.681,0.053c2.749-2.059,3.892-5.753,2.783-9.004L207.441,272.112z M135.415,322.416 c-1.014-3.823-1.707-7.895-5.845-9.579c-2.708-1.102-5.674-0.586-7.989,1.132c-1.134,0.842-2.244,1.72-3.365,2.579l11.884-34.831 c5.304,2.829,11.026,4.967,17.047,6.311L135.415,322.416z M161.937,273.637c-28.585,0-51.841-23.256-51.841-51.841 s23.256-51.841,51.841-51.841c28.585,0,51.841,23.256,51.841,51.841S190.523,273.637,161.937,273.637z M202.293,313.969 c-2.315-1.718-5.281-2.234-7.989-1.132c-4.137,1.684-4.83,5.756-5.845,9.579l-11.732-34.388c6.02-1.344,11.743-3.481,17.047-6.311 l11.884,34.831C204.537,315.689,203.428,314.811,202.293,313.969z"></path> </g> </g> <g> <g> <path d="M161.937,179.574c-23.281,0-42.221,18.941-42.221,42.221s18.941,42.221,42.221,42.221s42.221-18.941,42.221-42.221 S185.218,179.574,161.937,179.574z M161.937,247.983c-14.441,0-26.188-11.747-26.188-26.188s11.747-26.188,26.188-26.188 s26.188,11.747,26.188,26.188S176.378,247.983,161.937,247.983z"></path> </g> </g> <g> <g> <path d="M409.921,230.881h-17.102c-4.428,0-8.017,3.588-8.017,8.017s3.588,8.017,8.017,8.017h17.102 c4.428,0,8.017-3.588,8.017-8.017S414.349,230.881,409.921,230.881z"></path> </g> </g> <g> <g> <path d="M298.756,282.188h-25.653c-4.428,0-8.017,3.588-8.017,8.017c0,4.428,3.588,8.017,8.017,8.017h25.653 c4.428,0,8.017-3.588,8.017-8.017C306.772,285.776,303.184,282.188,298.756,282.188z"></path> </g> </g> <g> <g> <path d="M367.165,230.881h-25.653c-4.428,0-8.017,3.588-8.017,8.017s3.588,8.017,8.017,8.017h25.653 c4.428,0,8.017-3.588,8.017-8.017S371.593,230.881,367.165,230.881z"></path> </g> </g> <g> <g> <path d="M315.858,230.881h-42.756c-4.428,0-8.017,3.588-8.017,8.017s3.588,8.017,8.017,8.017h42.756 c4.428,0,8.017-3.588,8.017-8.017S320.286,230.881,315.858,230.881z"></path> </g> </g> <g> <g> <path d="M409.921,282.188h-85.511c-4.428,0-8.017,3.588-8.017,8.017c0,4.428,3.588,8.017,8.017,8.017h85.511 c4.428,0,8.017-3.588,8.017-8.017C417.937,285.776,414.349,282.188,409.921,282.188z"></path> </g> </g> <g> <g> <path d="M397.094,153.921H285.929c-11.493,0-20.843,9.351-20.843,20.843s9.351,20.843,20.843,20.843h111.165 c11.493,0,20.843-9.351,20.843-20.843S408.587,153.921,397.094,153.921z M397.094,179.574H285.929c-2.652,0-4.81-2.158-4.81-4.81 s2.158-4.81,4.81-4.81h111.165c2.652,0,4.81,2.158,4.81,4.81S399.746,179.574,397.094,179.574z"></path> </g> </g> <g> <g> <path d="M341.511,333.495h-68.409c-4.428,0-8.017,3.588-8.017,8.017c0,4.428,3.588,8.017,8.017,8.017h68.409 c4.428,0,8.017-3.588,8.017-8.017C349.528,337.083,345.94,333.495,341.511,333.495z"></path> </g> </g> <g> <g> <path d="M409.921,333.495h-42.756c-4.428,0-8.017,3.588-8.017,8.017c0,4.428,3.588,8.017,8.017,8.017h42.756 c4.428,0,8.017-3.588,8.017-8.017C417.937,337.083,414.349,333.495,409.921,333.495z"></path> </g> </g> </g></svg>সনদপত্র</a>
                    <a href="{{route('digital')}}" class="button apply"><i class="fas fa-mobile-alt"></i>ডিজিটাল কনটেন্ট</a>
                </div>
            </div>
            <div class="transparent_bg"></div>
        </div>

        <div class="top_news">
            <div class="container-fluid g-0">
                <div class="row g-0">
                    <div class="col-md-2 col-sm-3  col-4">
                        <div class="news_heading">
                            <i class="fas fa-bullhorn"></i>
                            <span class="ms-3">সর্বশেষ তথ্য</span>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-9 col-8">
                        <marquee behavior="" direction="left" onmouseover="stop()" onmouseout="start()" scrollamount="8">
                            <span>ক্ষুদ্র নৃ-গোষ্ঠী সেবা কর্ণারে আপনাকে স্বাগতম। আমাদের সেবাসমূহ পেতে ‘আবেদন করুন’ বাটনে ক্লিক করুন। আমাদের কার্যক্রম সম্পর্কে আপনার যেকোনো মূল্যবান মতামত দয়া করে ‘মতামত’ ফর্মটিতে আপনার নাম, মোবাইল নাম্বার ও মতামত সহ লিপিবদ্ধ করে সাবমিট করুন। ধন্যবাদ।</span>
                        </marquee>
                    </div>
                </div>
            </div>
        </div>

        <div id="searchbar_mobile" class="container mt-4 mb-1">
            {{-- <nav>
                <div class="nav_top">
                    <div class="nav_info">
                        <span class="title">উপজেলা</span>
                        <span class="number">১০</span>
                    </div>
                    <div class="nav_info">
                        <span class="title">আবেদন</span>
                        <span class="number">100</span>
                    </div>
                    <div class="nav_info">
                        <span class="title">সেবাদান</span>
                        <span class="number">200</span>
                    </div>
                </div>
                <div class="nav_bottom">
                    <form action="#">
                        <input type="text" placeholder="খুঁজুন">
                        <input type="submit" value="অনুসন্ধান">
                    </form>
                </div>
            </nav> --}}
        </div>

        <!-- ==================================================
                    About Area
        =================================================== -->

        <div id="about" class="section_margin">
            <div class="info_box">
                <div class="about_item preface" style="background: #d0e9ea;">
                    <div class="card_head_image">
                        <svg class="box_icon" viewBox="0 0 64 64"><g><path d="m32 30c-3.86 0-7 3.141-7 7s3.14 7 7 7 7-3.141 7-7-3.14-7-7-7zm0 12c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"/><path d="m56 17h-4v-16h-40v16h-4c-2.206 0-4 1.794-4 4v35c0 3.794 3.206 7 7 7h42c3.794 0 7-3.206 7-7v-35c0-2.206-1.794-4-4-4zm0 2c1.103 0 2 .897 2 2v12h-6v-14zm-30.401 28.365c.62.085 1.295.031 2.029-.181.539.612 1.541 1.415 3.15 1.701l-1.144 5.148-1.128-2.256-4.925 1.642zm13.716-.257 2.104 6.311-4.925-1.642-1.128 2.256-1.197-5.386c1.069-.375 1.779-.98 2.204-1.462 1.115.321 2.095.284 2.942-.077zm1.17-5.965-.482.292-.003.562c-.003.652-.227 2.488-1.208 3.148-.553.372-1.369.348-2.42-.074l-.836-.316-.423.785c-.033.06-.815 1.46-3.113 1.46s-3.08-1.4-3.105-1.447l-.412-.823-.854.342c-1.053.423-1.869.447-2.42.074-.982-.661-1.206-2.497-1.209-3.146v-.566l-.485-.291c-1.219-.731-1.896-1.562-2.011-2.467-.194-1.528 1.192-2.957 1.203-2.969l.437-.437-.195-.587c-.007-.02-.641-2.037.311-3.357.634-.88 1.892-1.326 3.74-1.326h.721l.228-.684c.008-.023.809-2.316 4.051-2.316 3.188 0 4.021 2.23 4.051 2.316l.228.684h.721c1.842 0 3.099.443 3.735 1.319.962 1.324.321 3.348.316 3.364l-.195.587.437.437c.014.014 1.392 1.439 1.205 2.96-.113.908-.79 1.741-2.013 2.476zm9.515-12.143h-8.875c-.902-.577-2.065-.909-3.486-.983-.164-.292-.41-.65-.739-1.017h13.1zm0-8h-2.869c.241-1.025.934-2.509 2.869-2.896zm0 2v2h-36v-2zm-27.125 6h-8.875v-2h13.1c-.329.366-.575.725-.739 1.017-1.421.074-2.584.406-3.486.983zm-8.875-8v-2.898c1.945.385 2.633 1.863 2.87 2.898zm0 10h7.173c-.291.674-.407 1.366-.425 2h-6.748zm29.253 2c-.018-.634-.134-1.326-.425-2h7.172v2zm6.747-27.102c-1.945-.384-2.633-1.863-2.87-2.898h2.87zm-4.911-2.898c.32 1.944 1.603 4.498 4.911 4.93v8.139c-3.308.433-4.591 2.987-4.911 4.93h-6.784c2.834-1.991 4.695-5.279 4.695-8.999s-1.861-7.008-4.695-9zm-13.089 18c-4.962 0-9-4.037-9-9s4.038-9 9-9 9 4.037 9 9-4.038 9-9 9zm-11-9c0 3.72 1.861 7.008 4.695 9h-6.784c-.319-1.944-1.602-4.498-4.911-4.93v-8.14c3.308-.433 4.591-2.987 4.911-4.93h6.784c-2.834 1.992-4.695 5.28-4.695 9zm-4.131-9c-.241 1.025-.935 2.509-2.869 2.896v-2.896zm-8.869 16h4v14h-6v-12c0-1.103.897-2 2-2zm45 42h-42c-2.664 0-5-2.337-5-5v-21h14.708c-.593.817-1.394 2.258-1.19 3.911.174 1.413 1.018 2.641 2.51 3.654.083.96.428 2.844 1.739 3.972l-3.348 10.044 7.075-2.358 2.872 5.744 2.135-9.607 2.135 9.607 2.872-5.744 7.075 2.358-3.62-10.86c.721-1.081.946-2.403 1.011-3.155 1.493-1.014 2.336-2.241 2.51-3.654.203-1.653-.597-3.094-1.19-3.911h14.706v21c0 2.662-2.336 4.999-5 4.999z"/><path d="m33 5h-2v2h-4v6h8v2h-8v2h4v2h2v-2h4v-6h-8v-2h8v-2h-4z"/></g></svg>
                        {{-- <img src="{{'assets/assets/img/shubornojayanti.jpg'}}" alt="Sheikh-Mujibur-Rahman"> --}}
                    </div>
                    <div class="preface_text">
                        <h2 class="heading text-center">সনদপত্র প্রদান</h2>
                        <div class="preface_img text-center">

                            <div class="designation mt-3">

 <a href="https://bwc.digitalnetrokona.org/application/create" class="button apply"><i class="fas fa-paper-plane"></i> সনদ পত্র পেতে এইখানে আবেদন করুন</a>

                </div>




                        </div>

                    </div>
                </div>
            </div>
            <div class="info_box">
                <div class="about_item about" style="background: #edf8f5;">
                    <div class="card_head_image"  style="margin-left: auto;left:-15px;">
                        <img src="{{'assets/assets/img/mujib_100.png'}}" alt="Sheikh-Mujibur-Rahman">
                    </div>
                    <div class="about_text">
                        <h2 class="heading text-center">ট্রেইনিং কর্ণার</h2>
                        <div class="about_img text-center">

                            <div class="designation mt-3">

                            </div>
                        </div>

                        <div class="text-end">

                        </div><br/>
                    </div>
                </div>
            </div>
        </div>

        <!-- ==================================================
                    Service Area
        =================================================== -->


        <!-- ==================================================
                    Gallery Area
        =================================================== -->



        <!-- ==================================================
                    Footer Area
        =================================================== -->

        <footer>
            <div class="footer_content links">
                <h4 class="heading">গুরুত্বপূর্ণ লিঙ্ক</h4>
                <div class="site_link">
                    <ul>
                        <li><a target="_blank" noopener norefferer href="https://bangabhaban.gov.bd">রাষ্ট্রপতির কার্যালয়</a></li>
                        <li><a target="_blank" noopener norefferer href="https://pmo.gov.bd/">প্রধানমন্ত্রীর কার্যালয়</a></li>
                        <li><a target="_blank" noopener norefferer href="http://www.parliament.gov.bd/">জাতীয় সংসদ</a></li>
                        <li><a target="_blank" noopener norefferer href="https://mopa.gov.bd/">জনপ্রশাসন মন্ত্রণালয়</a></li>
                        <li><a target="_blank" noopener norefferer href="https://bangladesh.gov.bd">জাতীয় তথ্য বাতায়ন</a></li>
                        <li><a target="_blank" noopener norefferer href="https://www.courseminded.com/tools">আরটিআই অনলাইন প্রশিক্ষণ</a></li>
                        <li><a target="_blank" noopener norefferer href="http://services.portal.gov.bd/">সেবাকুঞ্জ</a></li>
                        <li><a target="_blank" noopener norefferer href="http://forms.mygov.bd/">ফরমস পোর্টাল</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer_content comment">
                <h4 class="heading">মতামত</h4>
                <form action="#">
                    <div class="mb-3">
                        <div class="input-group-sm">
                            <input type="text" id="name" class="form-control" placeholder="নাম">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group-sm">
                            <input type="number" id="mobile" class="form-control" placeholder="মোবাইল নাম্বার">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group-sm">
                            <textarea class="form-control" id="comment" rows="4" placeholder="মন্তব্য"></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="সাবমিট">
                    </div>
                </form>
            </div>
            <div class="footer_content hotline">
                <h4 class="heading">হেল্পলাইন</h4>
                <div class="helpline">
                    <ul>
                        <li><span>দুদক</span><a href="tel:106">১০৬</a></li>
                        <li><span>জরুরি সেবা</span><a href="tel:999">৯৯৯</a></li>
                        <li><span>নাগরিক সেবা</span><a href="tel:333">৩৩৩</a></li>
                        <li><span>শিশু সহায়তা</span><a href="tel:1098">১০৯৮</a></li>
                        <li><span>নারী ও শিশু নির্যাতন প্রতিরোধ</span><a href="tel:109">১০৯</a></li>
                    </ul>
                </div>
            </div>
        </footer>

        <div class="copyright_area">
            <span>২০২১ &copy; অটোমেট ইনফোসিস</span>
        </div>


         <!-- Modal -->

        <div class="container">

            <div class="modal modal-dialog-scrollable fade" id="cardTraining" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header" style="background-color: #f2f2f2;">
                    <h5 class="modal-title">প্রশিক্ষণ ও কর্মশালা</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="info_para">
                        <div class="info_text">
                            <kbd class="mb-2 d-inline-block">প্রশিক্ষণ</kbd>
                            <ul>
                                <li>নারী উদ্যোক্তা প্রশিক্ষণ</li>
                                <li>উৎপাদন, বিপণন ও বাজার ব্যাবস্থাপনা প্রশিক্ষণ</li>
                                <li>ই-কমার্স প্রশিক্ষণ</li>
                                <li>স্টার্ট-আপ বিজনেস প্রশিক্ষণ</li>
                                <li>আইটি প্রশিক্ষণ</li>
                                <li>ড্রেস মেকিং প্রশিক্ষণ</li>
                                <li>ফ্যাশন ডিজাইন প্রশিক্ষণ</li>
                                <li>ব্লক, বাটিক প্রশিক্ষণ</li>
                                <li>নকশী কাথা তৈরি</li>
                                <li>ফুড প্রসেসিং প্রশিক্ষণ</li>
                                <li>বিউটি পার্লার প্রশিক্ষণ</li>
                                <li>ফ্রিল্যাসিং প্রশিক্ষণ</li>
                                <li>গ্রাফিক্স ডিজাইন প্রশিক্ষণ</li>
                                <li>বেসিক কম্পিউটার প্রশিক্ষণ</li>
                                <li>ওয়েব পেজ ডিজাইন প্রশিক্ষণ</li>
                                <li>সার্জ ইঞ্জিন অপটানাইজেশন(SEO) প্রশিক্ষণ</li>
                                <li>গাভী পালন ও গরু মোটাতাজাকরণ প্রশিক্ষণ</li>
                                <li>হাঁস, মুরগী পালন প্রশিক্ষণ</li>
                                <li>সবজি চাষ, মাশরুম চাষ, মৌচাষ প্রশিক্ষণ</li>
                                <li>মৎস চাষ প্রশিক্ষণ</li>
                                <li>ড্রাইভিং প্রশিক্ষণ</li>
                                <li>চারুকারু প্রশিক্ষণ</li>
                                <li>নার্সারি প্রশিক্ষণ</li>
                                <li>NGO, জব ফেয়ার, বৈদেশিক কর্মসংস্থান স্মপর্কে প্রশিক্ষণ</li>
                            </ul>
                            <kbd class="mb-2 d-inline-block">কর্মশালা</kbd>
                            <ul>
                                <li>পুলিশ বিভাগ</li>
                                <li>জেলা মহিলা বিষয়ক অধিদপ্তর</li>
                                <li>বিসিক</li>
                                <li>চেম্বার অব কমার্স</li>
                                <li>মহিলা উন্নয়ন সংস্থা</li>
                                <li>আমার বাড়ি আমার খামার</li>
                                <li>BIDA</li>
                                <li>জেলা যুব উন্নয়ন অধিদপ্তর</li>
                                <li>সমাজসেবা অধিদপ্তর</li>
                                <li>কৃষি সম্প্রসারণ অধিদপ্তর</li>
                                <li>প্রাণিসম্পদ অধিদপ্তর</li>
                                <li>জনশক্তি ও কর্মসংস্থান অধিদপ্তর</li>
                                <li>উপজেলা স্বাস্থ্য ও পরিবার কল্যাণ কেন্দ্র</li>
                                <li>ফ্যামিলী প্ল্যানিং অধিদপ্তর</li>
                                <li>ব্যাংক, এনজিও</li>
                                <li>সমাজসেবা অধিদপ্তর</li>
                                <li>পল্লী দারিদ্র বিমোচন ফাউন্ডেশন</li>
                                <li>মহিলা সংস্থা</li>
                            </ul>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal modal-dialog-scrollable fade" id="" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header" style="background-color: #f2f2f2;">
                    <h5 class="modal-title">কি কি সেবা পাবেন</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="info_para">
                        <div class="info_text">
                            <kbd class="d-inline-block mb-2">নারী নির্যাতন প্রতিরোধ ও ন্যায় বিচার প্রতিষ্ঠা</kbd>
                            <ul>
                                <li>যৌতুক নিরোধ</li>
                                <li>পারিবারিক কলহ</li>
                                <li>ভরন-পোষন</li>
                                <li>পিতা-মাতার সম্পত্তিতে নারীর অধিকার</li>
                                <li>হয়রানি রোধ</li>
                                <li>ইভটিজিং/ যৌনহয়রানি</li>
                                <li>হুমকি</li>
                                <li>আবাসন</li>
                                <li>আইনগত সহযোগিতা</li>
                                <li>বাল্য বিবাহ নিরোধ</li>
                                <li>অন্যান্য</li>
                            </ul>
                            <kbd class="d-inline-block mb-2">নারী উদ্যোক্তা প্রশিক্ষণ</kbd>
                            <ul>
                                <li>কাউন্সেলিং</li>
                                <li>উদ্যোক্তা প্রশিক্ষণ</li>
                                <li>প্রজেক্ট প্রফাইল</li>
                                <li>কারিগরী সহযোগিতা</li>
                                <li>ই-কমার্স</li>
                                <li>আর্থিক/ঋণ সহযোগিতা</li>
                                <li>অন্যান্য</li>
                            </ul>
                            <kbd class="d-inline-block mb-2">প্রশিক্ষণ ও কর্মসংস্থান</kbd>
                            <ul>
                                <li>ড্রেস মেকিং</li>
                                <li>ফ্যাশন ডিজাইন</li>
                                <li>ব্লক, বাটিক</li>
                                <li>নকশী কাথা</li>
                                <li>ফুড প্রসেসিং</li>
                                <li>বিউটি পার্লার</li>
                                <li>ফ্রিল্যাসিং</li>
                                <li>গ্রাফিক্স</li>
                                <li>ফ্রিল্যাসিং</li>
                                <li>বেসিক কম্পিউটার</li>
                                <li>ওয়েব পেজ ডিজাইন</li>
                                <li>সার্চ ইঞ্জিন অপটানাইজেশন(SEO)</li>
                                <li>গাভী পালন ও গরু মোটাতাজাকরণ</li>
                                <li>হাঁস, মুরগী পালন</li>
                                <li>সবজি চাষ</li>
                                <li>মৌচাষ</li>
                                <li>মৎস চাষ</li>
                                <li>ড্রাইভিং</li>
                                <li>চারুকারু</li>
                                <li>নার্সারি</li>
                                <li>আত্মকর্মসংস্থান (প্রশিক্ষণ এর মাধ্যমে)</li>
                                <li>NGO</li>
                                <li>জব ফেয়ার</li>
                                <li>ব্যবসায়ে উদ্যোগ (অনলাইন প্লাটফর্মে)</li>
                                <li>বৈদেশিক কর্মসংস্থান</li>
                                <li>অন্যান্য</li>
                            </ul>
                            <kbd class="d-inline-block mb-2">নিরাপদ মাতৃত্ব ও স্বাস্থসেবা</kbd>
                            <ul>
                                <li>পুষ্টি</li>
                                <li>টীকা প্রদান</li>
                                <li>রুটিন চেকআপ</li>
                                <li>কারিগরী সহযোগিতা</li>
                                <li>মাতৃত্বকালীন ভাতা</li>
                                <li>আর্থিক সহযোগিতা</li>
                                <li>নিরাপদ মাতৃত্ব</li>
                                <li>অন্যান্য</li>
                            </ul>
                            <kbd class="d-inline-block mb-2">নারীর অর্থনৈতিক কর্মকাণ্ডে অংশগ্রহণ</kbd>
                            <ul>
                                <li>ঋণ ও প্রশিক্ষণ সহযোগিতা</li>
                                <li>অনলাইন ব্যবসা প্রশিক্ষণ</li>
                                <li>ব্যবসায় সহযোগিতা</li>
                                <li>অন্যান্য</li>
                            </ul>
                            <kbd class="d-inline-block mb-2">শিক্ষা সহয়তা</kbd>
                            <ul>
                                <li>শিক্ষা উপকরণ</li>
                                <li>টিউশন ফি</li>
                                <li>ভর্তি সংক্রান্ত</li>
                                <li>শিক্ষাবৃত্তি</li>
                                <li>আর্থিক সহায়তা</li>
                                <li>অন্যান্য</li>
                            </ul>
                            <kbd class="d-inline-block mb-2">সামাজিক নিরাপত্তা বেষ্টনী</kbd>
                            <ul>
                                <li>বয়স্ক ভাতা</li>
                                <li>বিধবা ভাতা</li>
                                <li>ল্যাক্টেটিং মাদার ভাতা</li>
                                <li>অতিদরিদ্রদের জন্য কর্মসৃজন কর্মসূচি</li>
                                <li>OMS</li>
                            </ul>
                            <kbd class="d-inline-block mb-2">নারীর ক্ষমতায়ন</kbd>
                            <ul>
                                <li>GO/NGO সংগঠনে নারীর অংশগ্রহণ</li>
                                <li>নির্বাচনে নারী অংশগ্রহণ</li>
                                <li>জন প্রতিনিধিত্ব</li>
                                <li>লিঙ্গসমতা</li>
                            </ul>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal modal-dialog-scrollable fade" id="cardInstitute" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header" style="background-color: #f2f2f2;">
                    <h5 class="modal-title">সেবাদানকারী দপ্তর ও প্রতিষ্ঠান</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="info_para">
                        <div class="info_text">
                            <kbd class="mb-2 d-inline-block">জেলা পর্যায়ে দপ্তরসমূহ</kbd>
                            <ul>
                                <li>জেলা প্রশাসকের কার্যালয়, নেত্রকোণা</li>
                                <li>পুলিশ সুপারের কার্যালয়</li>
                                <li>সিভিল সার্জন কার্যালয়</li>
                                <li>জেলা লিগ্যাল এইড অফিস, নেত্রকোণা</li>
                                <li>শেখ কামাল আইটি, নেত্রকোণা</li>
                                <li>কৃষি সম্প্রসারণ অধিদপ্তর, নেত্রকোণা</li>
                                <li>জেলা প্রাণিসম্পদ অফিস, নেত্রকোণা</li>
                                <li>জেলা মৎস্য কর্মকর্তার দপ্তর, নেত্রকোণা</li>
                                <li>বাংলাদেশ কৃষি ব্যাংক </li>
                                <li>হাসপাতাল সমাজসেবা কার্যালয়, নেত্রকোণা</li>
                                <li>জেলা প্রাথমিক শিক্ষা অফিস, নেত্রকোণা</li>
                                <li>জেলা শিক্ষা অফিস, নেত্রকোণা জেলা কর্মসংস্থান ও জনশক্তি অফিস, নেত্রকোণা</li>
                                <li>জেলা সমবায় অফিসারের কার্যালয়, নেত্রকোণা</li>
                                <li>আমার বাড়ি আমার খামার</li>
                                <li>জেলা সমাজসেবা কার্যালয়, নেত্রকোণা</li>
                                <li>বাংলাদেশ পল্লী উন্নয়ন বোর্ড (বিআরডিবি), নেত্রকোণা</li>
                                <li>মহিলা বিষয়ক কর্মকর্তার কার্যালয়, নেত্রকোণা</li>
                                <li>যুব উন্নয়ন অধিদপ্তর, নেত্রকোণা</li>
                                <li>শহর সমাজসেবা কার্যালয়, নেত্রকোণা</li>
                                <li>জেলা ত্রাণ ও পুনর্বাসন অফিস, নেত্রকোণা</li>
                                <li>বাংলাদেশ ক্ষুদ্র ও কুটির শিল্প করপোরেশন, নেত্রকোণা</li>
                                <li>এন জি ও </li>
                            </ul>
                            <kbd class="mb-2 d-inline-block">উপজেলা পর্যায়ে দপ্তরসমূহ</kbd>
                            <ul>
                                <li>উপজেলা নির্বাহী অফিসারের কার্যালয়</li>
                                <li>উপজেলা ভূমি অফিস</li>
                            </ul>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- <div class="modal modal-dialog-scrollable fade" id="" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header" style="background-color: #f2f2f2;">
                    <h5 class="modal-title">সেবাদানকারী দপ্তর ও প্রতিষ্ঠান</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="info_para">
                        <div class="info_text">
                            <p>সেবাদাতা প্রতিষ্ঠানের কার্যাবলীঃ</p>
                            <p>সেবা দাতা প্রতিষ্ঠান সংশ্লিষ্ট সেবার হালনাগাদ তথ্য APPS  এ Upload করবেন। চাহিদানুযায়ী সেবা প্রদানে সুনির্দিষ্ট পদক্ষেপ গ্রহণ করবেন। বঙ্গমাতা শেখ ফজিলাতুন্নেছা মুজিব উইমেন্স কর্নার(BSFMWC), নেত্রকোণাসামাজিক-রাজনৈতিক-অর্থনৈতিক উন্নয়নসহ সকল ক্ষেত্রে নারীদের উন্নয়নের মূলশ্রোতধারায় সম্পৃক্ত করতে ব্যাপকভিত্তিক কার্যকর উদ্যোগ গ্রহন এবং তা স্বার্থক ও সফলভাবে বাস্তবায়নেরনিমিত্ত নার্ভ সেন্টার হিসাবে কাজ করবে।</p>
                            <kbd class="mb-2 d-inline-block">পুলিশ বিভাগ</kbd>
                            <ul>
                                <li>নরী নির্যাতন প্রতিরোধ</li>
                                <li>যৌন হয়রানি রোধ</li>
                                <li>সাইবার অপরাধ দমন</li>
                                <li>ব্লাকমেইলিং রোধ</li>
                                <li>পর্নগ্রাফি অপরাধ দমন</li>
                                <li>নিরাপত্তা</li>
                                <li>অন্যান্য</li>
                            </ul>
                            <kbd class="mb-2 d-inline-block">শেখ কামাল আইটি ইনকিউবেশন সেন্টার</kbd>
                            <ul>
                                <li>পরামর্শ</li>
                                <li>প্রশিক্ষণ</li>
                                <li>স্টার্ট-আপ হেল্প</li>
                                <li>ই-কমার্স</li>
                            </ul>
                            <kbd class="mb-2 d-inline-block">লিগাল এইড</kbd>
                            <ul>
                                <li>পরামর্শ</li>
                                <li>নরী নির্যাতন প্রতিরোধ</li>
                                <li>যৌন হয়রানি রোধ</li>
                                <li>সাইবার অপরাধ দমন</li>
                                <li>ব্লাকমেইলিং রোধ</li>
                                <li>পর্নগ্রাফি অপরাধ দমন</li>
                                <li>নিরাপত্তা ইত্যাদি ক্ষেতরে আইনী সহয়তা</li>
                                <li>অন্যান্য</li>
                            </ul>
                            <kbd class="mb-2 d-inline-block">ভূমি অফিস</kbd>
                            <ul>
                                <li>উত্তরাধিকার নিশ্চিতকরণ</li>
                                <li>পরামর্শ</li>
                            </ul>
                            <kbd class="mb-2 d-inline-block">যুব উন্নয়ন অধিদপ্তর</kbd>
                            <ul>
                                <li>প্রশিক্ষণ</li>
                                <li>ঋণ</li>
                                <li>উপকরণ</li>
                                <li>ঋণ</li>
                                <li>অন্যান্য</li>
                            </ul>
                            <kbd class="mb-2 d-inline-block">আমার বাড়ি আমার খামার</kbd>
                            <ul>
                                <li>ঋণসহায়তা</li>
                                <li>প্রশিক্ষণ</li>
                                <li>পরামর্শ</li>
                                <li>অন্যান্য</li>
                            </ul>
                            <kbd class="mb-2 d-inline-block">স্বাস্থ্য বিভাগ </kbd>
                            <ul>
                                <li>পরামর্শ</li>
                                <li>চিকিৎসা সেবা</li>
                                <li>অন্যান্য</li>
                                <li>চাকুরি</li>
                            </ul>
                            <kbd class="mb-2 d-inline-block">TTC and TSC</kbd>
                            <ul>
                                <li>পরামর্শ</li>
                                <li>প্রশিক্ষণ</li>
                                <li>অনুদান</li>
                                <li>চাকুরি</li>
                                <li>অন্যান্য</li>
                            </ul>
                            <kbd class="mb-2 d-inline-block">সমাজ সেবা</kbd>
                            <ul>
                                <li>ভাতা</li>
                                <li>প্রশিক্ষণ</li>
                                <li>পরামর্শ</li>
                                <li>অন্যান্য</li>
                            </ul>
                            <kbd class="mb-2 d-inline-block">কৃষি বিভাগ  (কৃষি, মৎস্য ও প্রাণী)</kbd>
                            <ul>
                                <li>প্রশিক্ষণ</li>
                                <li>কারিগরি সহায়তা</li>
                                <li>উপকরণ</li>
                                <li>পরামর্শ</li>
                                <li>চাকুরি</li>
                                <li>অন্যান্য</li>
                            </ul>
                            <kbd class="mb-2 d-inline-block">জেলা শিক্ষা ও প্রাথমিক শিক্ষা অফিস</kbd>
                            <ul>
                                <li>বৃত্তি</li>
                                <li>ভর্তি সহায়তা</li>
                                <li>শিক্ষা উপকরণ</li>
                                <li>অন্যান্য</li>
                            </ul>
                            <kbd class="mb-2 d-inline-block">ব্যাংক ও আর্থিক প্রতিষ্ঠান</kbd>
                            <ul>
                                <li>পরামর্শ</li>
                                <li>সহায়তা</li>
                                <li>অন্যান্য</li>
                            </ul>
                            <kbd class="mb-2 d-inline-block">মহিলা বিষয়ক অধিদপ্তর</kbd>
                            <ul>
                                <li>পরামর্শ</li>
                                <li>প্রশিক্ষণ</li>
                                <li>উপকরণ সহয়তা</li>
                                <li>বাল্যবিবাহ প্রতিরোধ</li>
                                <li>নরী নির্যাতন প্রতিরোধ</li>
                                <li>যৌন হয়রানি রোধ</li>
                                <li>নিরাপত্তা</li>
                                <li>ক্ষেতরে আইনী সহয়তা</li>
                                <li>অন্যান্য</li>
                            </ul>
                            <kbd class="mb-2 d-inline-block">চেম্বার অব কমার্স</kbd>
                            <ul>
                                <li>পরামর্শ</li>
                                <li>ঋণ সহায়তা</li>
                                <li>অন্যান্য</li>
                            </ul>
                            <kbd class="mb-2 d-inline-block">BIOA</kbd>
                            <ul>
                                <li>প্রশিক্ষণ</li>
                                <li>পরামর্শ</li>
                                <li>অন্যান্য</li>
                            </ul>
                            <kbd class="mb-2 d-inline-block">NGO</kbd>
                            <ul>
                                <li>পরামর্শ</li>
                                <li>ঋণ</li>
                                <li>প্রশিক্ষণ</li>
                                <li>চাকুরি</li>
                                <li>অন্যান্য</li>
                            </ul>
                            <kbd class="mb-2 d-inline-block">মহিলা সংস্থা</kbd>
                            <ul>
                                <li>পরামর্শ</li>
                                <li>আইনী সহয়তা</li>
                                <li>প্রশিক্ষণ</li>
                            </ul>
                            <kbd class="mb-2 d-inline-block">BMET</kbd>
                            <ul>
                                <li>বিদেশ গমন</li>
                                <li>ইচ্ছুকদের জন্য</li>
                                <li>পরামর্শ</li>
                                <li>প্রশিক্ষণ</li>
                                <li>ঋণসহায়তা</li>
                            </ul>
                            <kbd class="mb-2 d-inline-block">বিসিক</kbd>
                            <ul>
                                <li>প্রশিক্ষণ</li>
                                <li>ঋণ</li>
                                <li>পরামর্শ</li>
                                <li>Space</li>
                                <li>অন্যান্য</li>
                            </ul>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

        </div>













    </div>


    <!-- jquery -->
    <script src="{{'assets/assets/js/jquery-3.6.0.min.js'}}"></script>

    <!-- bootstrap js -->
    <script src="{{'assets/assets/js/bootstrap.bundle.min.js'}}"></script>

    <!-- owl carousel js -->
    <script src="{{'assets/assets/js/owl-carousel.min.js'}}"></script>

    <!-- lightbox js -->
    <script src="{{'assets/assets/js/lightbox.min.js'}}"></script>

    <!-- main js -->
    <script src="{{'assets/assets/js/main.js'}}"></script>


    <script>
        lightbox.option({
          'alwaysShowNavOnTouchDevices': true,
          'wrapAround': true
        })
    </script>
</body>
</html>
