<?php  ini_set("pcre.backtrack_limit", "2000000000"); ?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style type="text/css" media="print">

  body {
    font-family: 'nikosh', sans-serif;
  }

  table
  {
    border-collapse: collapse;
    width: 100%;
    margin-top:1px;
    table-layout: fixed;

    border: 1px solid black;
    font-family: 'nikosh', sans-serif;
  }
  th {
    text-align:center;
    padding:1px;
    font-weight: normal;
    font-size: 19px;
    border: 1px solid black;
  }
  td {

    border: 1px solid black;
    padding:5px 2px 5px 2px;

  }
  p
  {
    font-size:17px;

  }
  #maintable {
    font-family: nikosh, sans-serif;
    table-layout: fixed;
    width:100%;
    border: 0px solid black;
  }
  #maintable td {
    text-align:left;
    padding:2px;
    font-size:12px;
    border: 0px solid black;
  }

</style>
<body>
  <?php

  function bn2enNumber ($number){
    $replace_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০",".");
    $search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0","-");
    $bn_number = str_replace($search_array, $replace_array, $number);
    
    return $bn_number;
  }

  ?>
  <table id="maintable"  >
    <tr>
      <td width="20%" >  <img style="width:100px;height:100px;" src="/img/gonoprojatontrik.png"></td>
      <td width="60%" style="text-align:center;">
        <h1 style="font-size: 25px;">জেলা প্রশাসকের কার্যালয়, নেত্রকোণা</h1>
        <h4 style="font-size: 20px;">বঙ্গমাতা শেখ ফজিলাতুন্নেছা মুজিব উইমেনস কর্ণার অ্যাপ

</h4><br>
        <h4 style="font-size: 15px;">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</h4>
      </td>
      <td width="20%" style="text-align:right;"> <img style="width:100px;height:100px;" src="/img/mujiblogo.png">
      </td>
    </tr>
    <tr>
      <td width="20%" ></td>
      <td width="60%" style="text-align:center;">
        <p style="font-size: 20px;">{{$reportTitle}}</p>
        
      </td> 
      <td width="20%" style="text-align:right;">
        <p>তারিখ : {{bn2enNumber(date('d-m-Y', time() - 6*3600)) }} </p>
      </td>
    </tr>
  </table>
 
     <br>
  
         <table>
          <THEAD>
           <tr>
            <th >ক্রমিক নং</th>
            <th>আবেদনের<br>আইডি</th>
            @if($dateS=="" OR $dateS!=$dateE)
            <th>আবেদনের<br> তারিখ</th>
            @endif
            <th>সেবার বিষয়</th>
            <th>সেবার ধরণ</th>
            <th>ফোকাল পয়েন্ট</th>
            <th>আবেদনকারীর<br>নাম</th>
            <th>মোবাইল</th>
            <th>NID</th>
            <th>ফিডব্যাক</th>
            <th>ফলাফল</th>
            <th>ফিডব্যাক<br>তারিখ</th>

           </tr>
         </THEAD>
         <TBODY>
                 <?php $i=1; ?>
                                        @foreach($helprequests as $helprequest)

                                              <tr @if($helprequest->status==1)style="background: #ffe2e2;"  @elseif($helprequest->status==2)style="background: #e2ffe2;" @endif>
                                           
                                                <td class="fixed-width-data" style="text-align: center;">{{bn2enNumber($i++)}}</td>
                                                <td class="fixed-width-data">{{bn2enNumber($helprequest->id)}}</td>
                                                @if($dateS=="" OR $dateS!=$dateE)
                                                <td class="fixed-width-data">{{bn2enNumber(date_format( date_create($helprequest->application_date),"d-m-Y"))}}</td>
                                                @endif
                                                <td class="fixed-width-data">{{$helprequest->application_type}}</td>
                                                <td class="fixed-width-data">{{$helprequest->service_type}}</td>
                                                <td class="fixed-width-data">{{$userArray[$helprequest->user_id]->name}}</td>
                                                <td class="fixed-width-data">{{$helprequest->applicant_name}}</td>
                                                <td class="fixed-width-data">{{bn2enNumber($helprequest->mobile)}}</td>
                                                     <td class="fixed-width-data">{{bn2enNumber($helprequest->nid)}}</td>
                                                <td class="">{{$helprequest->feedback_comment}}</td>
                                                <td class="">{{$helprequest->result}}</td>
                                                @if(isset($helprequest->feedback_date))
                                                <td class="fixed-width-data">{{bn2enNumber(date_format(date_create($helprequest->feedback_date),"d-m-Y"))}}</td>
                                                @else
                                                <td></td>
                                                @endif
                                            </tr>
                                        @endforeach

         </TBODY>
    </table>
        

</body>
</html>
