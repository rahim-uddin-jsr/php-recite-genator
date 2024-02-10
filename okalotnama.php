<?php

require_once './inch/connectDb.php';
require_once './inch/functions.php';

$orderId = $_GET['orderId'];
$order = getOrderDetails($conn, $orderId);
$user = getUserDetailById($conn, $order['user_id']);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Okalotnama</title>
    <link rel="stylesheet" href="./inch/assets/styles/styles.css">
    <style>
    .a4-page {
        width: 595px;
        height: 842px;
        border: 1px solid black;
        margin: 0 auto;
    }

    p {
        font-size: 13px;
        font-weight: 600;
    }

    .divider {
        height: 2px;
        width: 140%;
        background-color: #000;
    }

    .eci-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        /* width: 100%; */
    }

    .eci-container :last-child {
        padding: 13px 5px;
        margin: 0;
        /* color: red; */
        border-top: 1px solid black;
    }

    .serial-container {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .header-bottom {
        display: flex;
        /* gap: 50px; */
    }

    .header-bottom-title {
        /* width: 100%; */
        padding: 5px 0px;
        width: 80%;
        display: block;
        text-align: center;
        border: 2px solid red;
        margin-left: 30px;
    }

    .header-bottom-title h1 {
        color: red;
    }

    .header-subtitle {
        padding: 0 20px;
        margin: 0 auto;
        display: inline-block;
        text-align: center;
        color: #000;
        font-weight: 600;
        /* text-decoration: underline; */
        border-bottom: 4px double #000;
    }

    .header-subtitle-section {
        width: 100%;
        text-align: center;
        margin-bottom: 50px;
    }

    table tr td {
        vertical-align: top;
    }

    .second-data p {
        margin: 0;
    }

    .second-data {
        text-align: justify;
        padding: 0px 17px 0 58px !important;
    }

    .last-section {
        margin-left: 108px;
    }

    .last-table table {
        width: 100%;
    }

    .last-table table p {
        margin: 0;
    }

    .color-red {
        color: red;
    }

    .worning-section {
        margin-top: 15px;
        border-top: 1px solid red;
    }

    .serial {
        width: 60px;
    }

    .bb-1 {
        border-bottom: 1px solid #000;
    }
    .vertical-text1 {
    /* writing-mode: vertical-rl; vertical-rl for vertical right-to-left writing mode */
    transform: rotate(180deg); /* rotate text 180 degrees */
    font-weight: 600;
    transform-origin: 50% 50%;
    writing-mode: vertical-rl; 
    transform: rotate(180deg);
    font-weight: 600;
}

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.0/html2pdf.bundle.min.js"></script>

</head>

<body class="" id="contentToConvert">
    <header>
        <img src="./inch/assets/img/logo.jpg" alt="">
        <div class="header-bottom">
            <div class="serial-container">
                <p class="serial">ক্রমিক নং</p>
                <div class="eci-container">
                    <p>ইসি</p>
                    <p>২০২১-২১</p>
                </div>
            </div>
            <h1 class="header-bottom-title">ঢাকা আইনজীবী সমিতি</h1>
        </div>

    </header>
    <main>
        <table>
            <tr>
                <td>
                    <div class="card">
                        <div class="vertical-text-left">
                            <p class="">EC 2020-2021 : 8</p>
                        </div>
                        <p id="" class="vertical-text-right">TK.: <?php if ($order) { echo $order['product_price']; }?>/=</p>
                        <div class="logo-section">
                            <img src="./inch/assets/img/logo.jpg" alt="">
                        </div>
                        <div class="user-info">
                        <p class="bold">
                            Member ID: <?php
if ($user) {
    echo $user['id'];
}?>
                        </p>
                            <p class="bold">
                                Name : <?php
if ($user) {
    echo $user['name'];
}?>
                            </p>
                            <div class="bar-picture">
                                <div class="single-barcode-user-info">
                                    <img src="./inch/assets/img/barcode.jpg" alt="">
                                    <img src="./inch/assets/img/signature.jpg" alt="">
                                    <p>Senior Asst. <br> General Secretary</p>
                                </div>
                                <div class="single-barcode-user-info">
                                    <img class="user-profile" src="<?php
if ($user) {
    echo $user['photo_url'];
}?>" alt="">
                                    <img src="./inch/assets/img/signature.jpg" alt="">
                                    <p>General Secretary</p>
                                </div>
                            </div>
                            <p align='center' class="bold">01-04-2021 4:49:46PM</p>
                            <p align='center' class="powerd-by">Powerd by: Cyberdyne Technology Ltd</p>
                        </div>

                    </div>
                </td>
                <td class="second-data">
                    <div class="header-subtitle-section">
                        <p class="header-subtitle">ওকালতনামা</p>
                    </div>
                    <p>জেলা : ঢাকা </p>
                    <p>
                        বিজ্ঞ........................................... আদালত
                        মোকদ্দমা / মামলা নং............................২০
                        ধারা : .........................................................
                    </p>
                    <p>...................... বাদী /দরখাস্তকারী /আপিলকারী</p>
                    <p align='center'> বনাম
                    <p>
                    <p>..................... বিবাদী / প্রতিপক্ষ /রেসপেন্ডেন্ট</p>
                </td>
            </tr>
        </table>
        <section class="last-section">
            <p align='justify'>
                পক্ষে ওকালতনামা
                আমি আমার নিম্ন বর্ণিত বিজ্ঞ এডভোকেট সাহেব /সাহেবগণকে আমার/ আমাদের
                উপরোল্লিখিত মোকদ্দমা পরিচালনা করিবার জন্য আইনজীবী নিযুক্ত করিলাম এবং
                মোকদ্দমার মঙ্গলার্থেসমস্ত বৈধ কার্যক্রম গ্রহণ করা প্রয়োজন তাহা এবং আমার/ আমারদের
                পক্ষে টাকা জমা দেওয়া ও উঠানো , মোকাদ্দমার দলিল, কাগজপত্রাদি জমা দেওয়া, উঠানো
                যাবতীয় কার্যক্রম গ্রহণ করিবার সর্বময় ক্ষমতা অর্পণ করিলাম। আরও অঙ্গীকার করিতেছি
                যে, আমার/ আমাদের এবং এডভোকেট সাহেব/ সাহেবগণের মধ্যে স্থিরীকৃত নির্ধারিত ফি
                যথা সময়ে প্রদান করিতে বাধ্য রহিলাম। অন্যথায় আপনি বা আপনারা আমার প্রতিনিধিত্ব
                করিতে বা ধ্য নহেন। এতদ্বার্থেস্বেচ্ছায় অত্র ওকালতনামায় স্বাক্ষর/ টিপসহি প্রদান করিলাম।
                ইতি, তারিখ। .................................. ২০........
            </p>
            <div class="last-table">
                <table>
                    <tr class="color-red">
                        <td colspan="2">ক্ষমতা প্রাপ্ত আইনজীবী মহোদয়গণ - উপস্থাপনকারীর স্বাক্ষর :</td>
                        <td align="right">সম্পর্ক</td>
                    </tr>
                    <tr>
                        <td align="center"><span class="bb-1">নাম</span></td>
                        <td><span class="bb-1">সদস্য নং-</span> </td>
                        <td align="right"><span class="bb-1">মোবাইল নং</span></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p>১ ।</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p>২ ।</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p>৩ ।</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p>৪ ।</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p>৫ ।</p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="worning-section">
                <p class="color-red">বিঃ দ্রঃ- ওকালতনামা গ্রহণকারী বিজ্ঞ আইনজীবী অনুগ্রহপূর্বক "গৃহীত" লিখার পর সদস্য
                    নম্বর, ফোন নম্বর ও বর্তমান ঠিকানা উল্লেখসহ পূর্ণনাম সাক্ষর করিবেন।</p>
            </div>
        </section>
    </main>

<?php
if (isset($_GET['download'])) {?>


    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Get HTML content
    var htmlContent = document.getElementById('contentToConvert');
    // document.getElementById('vertical').style.transform='rotate(180)';
    // Options for PDF generation
    var options = {
        margin: 10,
        filename: 'converted.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
    };

    // Generate and download the PDF
    setTimeout(function() {

    html2pdf().from(htmlContent).set(options).save();
        // window.history.back();
    }, 0);
});
</script>
<?php
}else{
    echo "<script>
    print();
    </script>";
}
?>

</body>

</html>