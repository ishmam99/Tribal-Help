@extends('layouts.default')

@section('title', 'Dashboard')

@section('content')
<div class="main-content">
    <div class="container-fluid">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">বয়স ভিত্তিক রিপোর্ট</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container">
            <div class="card col-8">
                <div class="p-5 m-5 text-center">
                    <form action="{{ route('age.report') }}" method="post">
                        @csrf
                        <h4 class="p-3">রোগ নির্বাচন করুন</h4>

                        <select name="disease" class="form-control" id="school" required>
                            <option value="" selected> --রোগ নির্বাচন করুন --</option>
                            <option value="neat_clean">পরিষ্কার পরিচ্ছন্নতা</option>
                            <option value="muac">পুষ্টিগত অবস্থান</option>
                            <option value="skin_disease">চর্ম রোগ</option>
                            <option value="cough">কাশি</option>
                            <option value="asthma">হাঁপানি</option>
                            <option value="diarrhoea">ডায়ারিয়া</option>
                            <option value="jaundice">জন্ডিস</option>
                            <option value="infection">সংক্রমণ</option>
                            <option value="epi_tt">ইপিআই টি.টি</option>
                            <option value="eye_test">দৃষ্টি পরীক্ষা</option>
                            <option value="anemia">রক্তশূন্যতা</option>
                            <option value="pulse">পালস ও হার্ট বিটঃ</option>

                        </select>
                        <div class="col-3 float-right p-2 m-4">
                            <button class="btn btn-primary">রিপোর্ট দেখুন</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
    </section>
@stop
