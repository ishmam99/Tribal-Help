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

        <header>
            <div class="container">
                <div class="header_area">
                    <div class="logo">
                        <a href="{{url()->to('/')}}"><img src="{{'assets/assets/img/logo.png'}}" class="img-fluid" alt="logo"></a>
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
                        </div>
                    </nav>
                </div>
            </div>
        </header>

        <div class="row">
            @foreach ($contents as $item)


       <div class="info_box m-2 col-4">

                <div class=" about" style="background: #edf8f5;">

                    <div class="about_text">
                        <h2 class="heading text-center">{{$item->name}}</h2>
                        <div class="about_img text-center">

                            <div class="designation mt-3">
                                 <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="{{setImage($item->video)}} " allowfullscreen sandbox></iframe>
                                        </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <p>{{$item->description}}</p>
                        </div><br/>

                </div>
            </div>


            </div> @endforeach
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
