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

    padding:1px;

  }
  p
  {
    font-size:20px;
    padding: 5px;

  }
  #maintable {
    font-family: nikosh, sans-serif;
    table-layout: fixed;
    width:100%;
    border: 0px solid black;
  }
  #maintable td {
    text-align:left";
    padding:2px;
    font-size:12px;
    border: 0px solid black;
  }
 #maintable2 {
    font-family: nikosh, sans-serif;
    table-layout: fixed;
    width:100%;
    border: 0px solid black;
  }
  #maintable2 td {
    text-align:left";
    vertical-align:top;
    padding: 10px 0px 0px 10px;
    font-size:20px;
    border: 0px solid black;
  }

</style>
<body>
  <?php

  function bn2enNumber ($number){
    $replace_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০","/");
    $search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0","-");
    $bn_number = str_replace($search_array, $replace_array, $number);

    return $bn_number;
  }
  function en2bnNumber ($number){
    $search_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০","/");
    $replace_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0","-");
    $bn_number = str_replace($search_array, $replace_array, $number);

    return $bn_number;
  }

  ?>
   <table id="maintable"  >
    <tr>

      <td width="60%" style="text-align:left;">
        <p style="font-size: 25px;">বরাবর,</p>

        <p style="font-size: 25px; padding-left:20px">উপজেলা নির্বাহী অফিসার,
</p>
        <p style="font-size: 25px;margin-left:20px">কলমাকান্দা, নেত্রকোনা।
</p><br>

      </td>

      <td width="20%" style="text-align:right;"> <img style="width:130px;height:130px;" src="{{setImage($image->file)}}">
      </td>
 </tr>
   </table>
 <table  id="maintable" >
          <TBODY>
 <tr>
     <td style="text-align: left;padding: 0px 0px 0px 5px;font-size: 25px;font-weight:bold;" >

      বিষয়ঃ ক্ষুদ্র নৃ-গোষ্ঠী সনদ পাওয়ার জন্য আবেদন।</td>
</tr>
          </TBODY>
 </table>
 <br><br>
 <table id="maintable2">
    <TBODY>
    <tr>
      <td width="100%" style="text-align:left;font-size: 25px;">
        <p>জনাব,</p>

        <p >সবিনয় নিবেদন এই যে, আমি {{$helprequest->applicant_name}}, পিতাঃ {{$helprequest->father_name}}, মাতাঃ {{$helprequest->mother_name}}, গ্রামঃ {{$helprequest->village}}, ডাকঘরঃ {{$helprequest->post_office}}, ইউনিয়নঃ {{$helprequest->union}}, উপজেলাঃ {{$helprequest->upazila}}, জেলাঃ {{$helprequest->zila}} । {{$helprequest->upazila}} উপজেলাধীন {{$helprequest->union}} ইউনিয়নের একজন আদিবাসী
         এবং জন্মসূত্রে একজন বাংলাদেশের নাগরিক। এমতাবস্তায় আমার ক্ষুদ্র নৃ-গোষ্ঠী সনদ প্রয়োজন</p>
         <br>
         <p>অতএব ,মহোদয়ের নিকট আমার একান্ত প্রার্থনা এই যে, আমাকে একটি ক্ষুদ্র নৃ-গোষ্ঠী সনদপত্র প্রদান করিতে আপনার সদয় মর্জি হয়।</p>
      </td>
    </tr>

     </TBODY>
  </table>

   <br>

         <table  id="maintable2" >
          <TBODY>




         <tr>
             <td></td><td></td><td width="70%" style="text-align: left;padding: 90px 0px 0px 5px"> তারিখঃ {{bn2enNumber(Carbon\Carbon::parse(($helprequest->created_at))->format('d/m/y'))}}</td>
            <td width="30%" style="text-align: center;padding: 90px 0px 0px 5px;" >

                <p>বিনীত
                    </p><p>{{$helprequest->applicant_name}}</p>
                    <p>মোবাইলঃ{{$helprequest->mobile}}</p>
              </td> </tr>

          </TBODY>
    </table>
<!--
 <div style=" width: 100%; border-top: 1px dashed black; margin-top: 20px;margin-bottom: 10px;"></div> -->




</body>
</html>
