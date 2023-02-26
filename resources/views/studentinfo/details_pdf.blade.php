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
    padding: 10px 0px 0px 50px;
    font-size:12px;
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

  ?>
   <table id="maintable"  >
    <tr>
      <td width="20%" >  <img style="width:130px;height:130px;" src="/img/gonoprojatontrik.png"></td>
      <td width="60%" style="text-align:center;">
        <h1 style="font-size: 35px;">জেলা প্রশাসকের কার্যালয়, নেত্রকোণা</h1>
        <h4 style="font-size: 25px;">বঙ্গমাতা শেখ ফজিলাতুন্নেছা মুজিব উইমেনস কর্ণার

</h4><br>
        <h4 style="font-size: 23px;">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</h4>
      </td>
      <td width="20%" style="text-align:right;"> <img style="width:130px;height:130px;" src="/img/mujiblogo.png">
      </td>
    </tr>
    <tr>
      <td width="20%" ></td>
      <td width="60%" style="text-align:center;">
        
        <p style="font-size: 25px;">আবেদন ফরম</p>
        
      </td> 
      <td width="20%" style="text-align:right;">
        <p>তারিখ : {{bn2enNumber(date('d-m-Y', time() - 6*3600)) }} </p>
      </td>
    </tr>
  </table>
 
   <br>
    
         <table  id="maintable2" >
          <TBODY>
            <tr>
               <td width="25%"><p  style="font-weight: bold;">আবেদন আইডি</p></td><td><p>:</p></td><td colspan="2" ><p>{{bn2enNumber($helprequest->id)}}</p></td> 
            </tr>
            <tr>
               <td  width="25%"><p  style="font-weight: bold;">আবেদনের তারিখ</p></td><td><p>:</p></td><td colspan="2" ><p>{{bn2enNumber(date_format( date_create($helprequest->application_date),"d-m-Y"))}}</p></td> 
            </tr>
            <tr>
               <td  width="25%"><p  style="font-weight: bold;">সেবার বিষয়</p></td><td><p>:</p></td><td colspan="2" ><p>{{$helprequest->application_type}}</p></td> 
            </tr>
          
            <tr>
               <td  width="25%"><p  style="font-weight: bold;">সেবার ধরণ</p></td><td><p>:</p></td><td colspan="2" ><p>{{$helprequest->service_type}}</p></td> 
            </tr>
            <tr>
               <td  width="25%"><p  style="font-weight: bold;">ফোকাল পয়েন্ট</p></td><td><p>:</p></td><td colspan="2" ><p>{{$user->name}}</p></td> 
            </tr>
            <tr>
               <td  width="25%"><p  style="font-weight: bold;">আবেদনকারীর নাম</p></td><td><p>:</p></td><td colspan="2" ><p>{{$helprequest->applicant_name}}</p></td> 
            </tr>
            <tr>
               <td  width="25%"><p  style="font-weight: bold;">পিতা/স্বামীর নাম</p></td><td><p>:</p></td><td colspan="2" ><p>{{$helprequest->father_name}}</p></td> 
            </tr>
            <tr>
               <td  width="25%"><p  style="font-weight: bold;">মাতার নাম</p></td><td><p>:</p></td><td colspan="2" ><p>{{$helprequest->mother_name}}</p></td> 
            </tr>
            <tr>
               <td  width="25%"><p  style="font-weight: bold;">মোবাইল</p></td><td><p>:</p></td><td colspan="2" ><p>{{bn2enNumber($helprequest->mobile)}}</p></td> 
            </tr>
              <tr>
               <td  width="25%"><p  style="font-weight: bold;">এন আই ডি</p></td><td><p>:</p></td><td colspan="2" ><p>{{bn2enNumber($helprequest->nid)}}</p></td> 
            </tr>
            <tr>
               <td  width="25%"><p  style="font-weight: bold;">ইমেইল</p></td><td><p>:</p></td><td colspan="2" ><p>{{$helprequest->email}}</p></td> 
            </tr>
            <tr>
               <td  width="25%"><p  style="font-weight: bold;">ঠিকানা</p></td><td><p>:</p></td><td colspan="2" ><p>{{$helprequest->address}}</p></td> 
            </tr>
           

             
            <tr>
             <td></td><td></td><td></td>
            <td style="text-align: center;padding: 90px 0px 0px 5px;" >
                
                <p>স্বাক্ষর</p><p>-<br>বঙ্গমাতা শেখ ফজিলাতুন্নেছা মুজিব উইমেনস কর্ণার</p>
                
              </td> </tr>

          </TBODY>
    </table>
<!-- 
 <div style=" width: 100%; border-top: 1px dashed black; margin-top: 20px;margin-bottom: 10px;"></div> -->
 



</body>
</html>
