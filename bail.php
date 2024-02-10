<?php 

require_once('./inch/connectDb.php');
require_once('./inch/functions.php');

$orderId = $_GET['orderId'];
$order=getOrderDetails($conn,$orderId);
$user=getUserDetailById($conn,$order['user_id']);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bail Bond</title>
    <link rel="stylesheet" href="./inch/assets/styles/styles.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.0/html2pdf.bundle.min.js"></script>
</head>

<body id="contentToConvert">
    <header>
        <div class="header-top">
            <p>বাংলাদেশ ফরম নং ৩৯৯০</p>
            <p>হাইকোর্টক্রিমিনাল প্রসেস ফরম নং ৫৮-বি।</p>
        </div>
        <h3 align='center'>ম্যাজিস্ট্রেট সমক্ষে প্রাথমিক বিচারকালে নিবন্ধপত্র ও জামিননামা।</h3>
        <p align='center'>(সন ১৮৯৮ খ্রিস্টাব্দের ৫আইন, ৫ তফসিলের ৪২ সংখ্যা।)</p>
        <p align='center'> <span class="brakes">&#91;</span> ফৌজদারী কার্যবিধির ৪৯৬ ও ৪৯৯ ধারা <span
                class="brakes">&#93;</span></p>
    </header>
    <main class="">
        <p>(১) সাকিন।</p>
        <p>(২) নাম।</p>
        <p align='right'>(১) নিবাসী আমি (২) <span class="space">&nbsp;</span></p>
        <p align='right' class="mb-0">অপরাধে অভিযুক্ত হইয়া &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            মোকামের</p>

        <table>
            <tr>
                <td>
                    <p>(৩) অবস্থানুসাৰে যেমন <br> হইবে।</p>
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
                            } ?>" alt="">
                                    <img src="./inch/assets/img/signature.jpg" alt="">
                                    <p>General Secretary</p>
                                </div>
                            </div>
                            <p align='center' class="bold">01-04-2021 4:49:46PM</p>
                            <p align='center' class="powerd-by">Powerd by: Cyberdyne Technology Ltd</p>
                        </div>

                    </div>
                </td>
                <td align='justify'>
                    <p>
                    ম্যাজিস্ট্রেটের (৩) সমক্ষে আনীত হইয়া তাঁ হার আদালতে এবং আবশ্যক হইবে সেশন
                    আদালতে উপস্থিত হইবার জন্য জামিন দি বার প্রয়োজন হওয়ার আমি এতদ্বারা বন্ধ
                    হইয়া লিখিয়া দিতেছি যে, উক্ত অভিযোগে র প্রাথমিক বিচারকালে উক্ত ম্যাজিস্ট্রেটের
                    আদালতে প্রতিদিন উপস্থিত হইবে, এবং মো কদ্দমা সেশন আদালত কর্তৃক বিচার হইবা র
                    জন্য প্রেরিত হইলে আমার প্রতিকূলে যে অভিযোগ হইয়াছে তাহার উত্তর দিবার জন্য
                    উক্ত আদালতে উপস্থিত হইব ও থাকিব, এবং তাহাতে ক্রটি করিলে আমি বাংলাদেশ
                    সরকারকে
                    </p>
                    <p class="first-row-last-line">টাকা অর্থ দণ্ড দিতে বদ্ধ রহিলাম।</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>(৪) নাম।</p>
                    <p>(৫) আমি এতদ্বারা প্রকাশ <br>
                        করিতেছি অথবা আমরা <br>
                        একত্রে ও পৃথক রূপে <br>
                        প্রকাশ করিতেছি।</p>
                        <p>
                        (৬) আমি বা আমরা।
                        </p>
                </td>
                <td>
<p>সন ২০ <span class="space-0">  </span> খ্রিস্টাব্দ তারিখ অদ্য </p>
<p>উক্ত (৪)  <span class="space-1"></span> র পক্ষে জামিন (৫)</p>
<p align='justify'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; যে তিনি তাঁহার প্রতিকূলে হওয়া অভিযোগের বিচারকালে প্রতিদিন <br>
আদালতে উপস্থিত হইবেন এবং এই মোকদ্দমা সেশন আদালত কর্তৃক বিচারের জন্য
প্রেরিত হইলে তিনি তাঁহার প্রতিকূলে উপস্থিত অভিযোগের উত্তর দিবার জন্য উক্ত
আদালত সমক্ষে উপস্থিত হইবেন ও থাকিবেন; <br>
এবং তাহাতে তিনি ক্রটি করিলে <span class="space"></span>&nbsp;&nbsp;&nbsp;(৬) বাংলাদেশ সরকারকে 
</p>
<p align='right'>টাকা অর্থ দণ্ড দিতে বদ্ধ হইলাম। <span class="space"></span>সন</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">(স্থানীয় জামিনদার উপযুক্ত এবং ২০ <span class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>  সন তারিখ অদ্য
                <br> আমার সম্মুখে স্বাক্ষর করিলেন <br>
                আমি তাকে সনাক্ত করিলাম)</td>
            </tr>
            <tr>
                <td colspan="2" class="mt-3"><span class="brakes">&#91;</span> মুঃ আঃ নং-সি ৬৮/২০২০-২০২১, তাং-০১-১১-২০২০ইং <span
                class="brakes">&#93;</span></td>
            </tr>
        </table>
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
