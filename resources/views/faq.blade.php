@extends('layouts.app')
@section('head')
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Ziksales, Best E-commerce Site In Nigeria, I want to Buy, about Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen.">
    <meta name="description" content="Ziksales is an excellent E-commerce platform that makes buying and selling easy. We give you a safe, comfortable, secure and excellent shopping experience. We deal on products like Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. Feel free shopping with us.">

    <!-- FONT  -->
    <!-- <link rel="stylesheet" href="../fonts/fira-sans.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans">

    <!-- REQUIRED CSS: BOOTSTRAP, FONTAWESOME, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="../dist/css/vendor.min.css">


    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">


    <title>FAQ | {{config('app.name')}}</title>
  </head>
@endsection  

@section('main-content')

        <div class="col" id="main-content">

          <div class="row">
            <div class="col-12 mb-4">
              <h3 class="title">Frequently Asked Questions (FAQ)</h3>
              <hr>
            </div>
            <div class="col-md-3">
              <h5><i class="fa fa-shopping-cart fa-fw"></i> Shopping</h5>
            </div>
            <div class="col-md-9 mb-4">
              <div id="accordion1" role="tablist" class="mb-3">
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading1-1">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse1-1" aria-expanded="false" aria-controls="collapse1-1">
                        I see different prices with the same title. Why?
                    </a>
                  </div>
                  <div id="collapse1-1" class="collapse" role="tabpanel" aria-labelledby="heading1-1" data-parent="#accordion1">
                    <div class="card-body">
                      We have many marchants, selling the same product with different prices. The variation in prices depends on the marchant and also the location of the marchant's store.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading1-2">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse1-2" aria-expanded="false" aria-controls="collapse1-2">
                        Why do I see different prices for the same product?
                    </a>
                  </div>
                  <div id="collapse1-2" class="collapse" role="tabpanel" aria-labelledby="heading1-2" data-parent="#accordion1">
                    <div class="card-body">
                      We have many marchants, selling the same product with different prices. The variation in prices depends on the marchant and also the location of the marchant's store.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading1-3">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse1-3" aria-expanded="false" aria-controls="collapse1-3">
                        Is it necessary to have an account to shop on Ziksales?
                    </a>
                  </div>
                  <div id="collapse1-3" class="collapse" role="tabpanel" aria-labelledby="heading1-3" data-parent="#accordion1">
                    <div class="card-body">
                      Yes, because it's with the address and phone number in your profile that we will use and deliver what you have ordered.
                    </div>
                  </div>
                </div>
                {{--<div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading1-4">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse1-4" aria-expanded="false" aria-controls="collapse1-4">
                        What do I need to know before getting an order gift wrapped?
                    </a>
                  </div>
                  <div id="collapse1-4" class="collapse" role="tabpanel" aria-labelledby="heading1-4" data-parent="#accordion1">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab perferendis, similique a accusamus ipsum incidunt repellendus quis, soluta, minus molestiae illum eligendi id hic eum accusantium voluptatem quae facilis architecto.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading1-5">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse1-5" aria-expanded="false" aria-controls="collapse1-5">
                        What is Advantage?
                    </a>
                  </div>
                  <div id="collapse1-5" class="collapse" role="tabpanel" aria-labelledby="heading1-5" data-parent="#accordion1">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, culpa rem in voluptate inventore repudiandae officia ad eveniet aut reiciendis corrupti, odit, velit officiis voluptatibus, incidunt minima omnis voluptas. Similique.
                    </div>
                  </div>
                </div>--}}
              </div>
            </div>
            <div class="col-md-3">
              <h5><i class="fa fa-credit-card fa-fw"></i> Payments</h5>
            </div>
            <div class="col-md-9 mb-4">
              <div id="accordion2" role="tablist" class="mb-3">
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading2-1">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse2-1" aria-expanded="false" aria-controls="collapse2-1">
                        How do I pay for a purchase?
                    </a>
                  </div>
                  <div id="collapse2-1" class="collapse" role="tabpanel" aria-labelledby="heading2-1" data-parent="#accordion2">
                    <div class="card-body">
                      You can pay with your card or with your bank. Unfortunately, not all banks are listed on our payment system. it's most preferable to pay with your credit/debit card.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading2-2">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse2-2" aria-expanded="false" aria-controls="collapse2-2">
                        Are there any hidden charges (Octroi or Sales Tax) when I make a purchase?
                    </a>
                  </div>
                  <div id="collapse2-2" class="collapse" role="tabpanel" aria-labelledby="heading2-2" data-parent="#accordion2">
                    <div class="card-body">
                      No, there are no hidden charges.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading2-3">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse2-3" aria-expanded="false" aria-controls="collapse2-3">
                        Do you practice Cash on Delivery?
                    </a>
                  </div>
                  <div id="collapse2-3" class="collapse" role="tabpanel" aria-labelledby="heading2-3" data-parent="#accordion2">
                    <div class="card-body">
                      No, we don't practice cash on delivery because of some security issues.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading2-4">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse2-4" aria-expanded="false" aria-controls="collapse2-4">
                        How do I pay using a credit/debit card?
                    </a>
                  </div>
                  <div id="collapse2-4" class="collapse" role="tabpanel" aria-labelledby="heading2-4" data-parent="#accordion2">
                    <div class="card-body">
                      Once you click Pay Now button on your checkout page, you will be taken to a page where you will choose whether to pay with card or pay with bank. Choose pay with card then a page will appear for you to enter your credit/debit card details. The longer input box in that page is where you will enter the 16 digits infront of your card, the expiry date input box is where you will enter the expiry date of your card which is infront of your card. The CVV input box is the last 3 digit that is at the back of your card.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading2-5">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse2-5" aria-expanded="false" aria-controls="collapse2-5">
                        Is it safe to use my credit/debit card on ziksales?
                    </a>
                  </div>
                  <div id="collapse2-5" class="collapse" role="tabpanel" aria-labelledby="heading2-5" data-parent="#accordion2">
                    <div class="card-body">
                      Yes, our site is SSL Protected. All your transactions are being encrypted.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading2-6">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse2-6" aria-expanded="false" aria-controls="collapse2-6">
                        What is a 3D Secure password?
                    </a>
                  </div>
                  <div id="collapse2-6" class="collapse" role="tabpanel" aria-labelledby="heading2-6" data-parent="#accordion2">
                    <div class="card-body">
                      3D secure password is the One time Password normally called OTP. It will be sent to your Phone once you want to complete a transaction. Once the OTP gets to your phone as an SMS, you will be prompted to type in the 6 digits that is in that message into the current page that you are in.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading2-7">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse2-7" aria-expanded="false" aria-controls="collapse2-7">
                        How can I get the 3D Secure password for my credit/debit card?
                    </a>
                  </div>
                  <div id="collapse2-7" class="collapse" role="tabpanel" aria-labelledby="heading2-7" data-parent="#accordion2">
                    <div class="card-body">
                      Once you enter your card details and proceed for payment, the 3D secure password/OTP will automatically be sent to you as an SMS/Email.
                    </div>
                  </div>
                </div>
                {{--<div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading2-8">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse2-8" aria-expanded="false" aria-controls="collapse2-8">
                        Can I use my bank's Internet Banking feature to make a payment?
                    </a>
                  </div>
                  <div id="collapse2-8" class="collapse" role="tabpanel" aria-labelledby="heading2-8" data-parent="#accordion2">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, culpa rem in voluptate inventore repudiandae officia ad eveniet aut reiciendis corrupti, odit, velit officiis voluptatibus, incidunt minima omnis voluptas. Similique.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading2-9">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse2-9" aria-expanded="false" aria-controls="collapse2-9">
                        Can I make a credit/debit card or Internet Banking payment through my mobile?
                    </a>
                  </div>
                  <div id="collapse2-9" class="collapse" role="tabpanel" aria-labelledby="heading2-9" data-parent="#accordion2">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, culpa rem in voluptate inventore repudiandae officia ad eveniet aut reiciendis corrupti, odit, velit officiis voluptatibus, incidunt minima omnis voluptas. Similique.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading2-10">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse2-10" aria-expanded="false" aria-controls="collapse2-10">
                        How does 'Instant Cashback' work?
                    </a>
                  </div>
                  <div id="collapse2-10" class="collapse" role="tabpanel" aria-labelledby="heading2-10" data-parent="#accordion2">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, culpa rem in voluptate inventore repudiandae officia ad eveniet aut reiciendis corrupti, odit, velit officiis voluptatibus, incidunt minima omnis voluptas. Similique.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading2-11">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse2-11" aria-expanded="false" aria-controls="collapse2-11">
                        How do I place a Cash on Delivery (COD) order?
                    </a>
                  </div>
                  <div id="collapse2-11" class="collapse" role="tabpanel" aria-labelledby="heading2-11" data-parent="#accordion2">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, culpa rem in voluptate inventore repudiandae officia ad eveniet aut reiciendis corrupti, odit, velit officiis voluptatibus, incidunt minima omnis voluptas. Similique.
                    </div>
                  </div>
                </div>--}}
              </div>
            </div>
            <div class="col-md-3">
              <h5><i class="fa fa-user fa-fw"></i> My Account &amp; My Orders</h5>
            </div>
            <div class="col-md-9 mb-4">
              <div id="accordion3" role="tablist" class="mb-3">
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading3-1">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse3-1" aria-expanded="false" aria-controls="collapse3-1">
                        What is 'My Account'? How do I update my information ?
                    </a>
                  </div>
                  <div id="collapse3-1" class="collapse" role="tabpanel" aria-labelledby="heading3-1" data-parent="#accordion3">
                    <div class="card-body">
                      Once you login to your account, the first page that opens up is your profile; and this is where you can update your credentials.
                    </div>
                  </div>
                </div>
                {{--<div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading3-2">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse3-2" aria-expanded="false" aria-controls="collapse3-2">
                        How do I merge my accounts linked to different email ids?
                    </a>
                  </div>
                  <div id="collapse3-2" class="collapse" role="tabpanel" aria-labelledby="heading3-2" data-parent="#accordion3">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>--}}
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading3-3">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse3-3" aria-expanded="false" aria-controls="collapse3-3">
                        How do I know my order has been confirmed?
                    </a>
                  </div>
                  <div id="collapse3-3" class="collapse" role="tabpanel" aria-labelledby="heading3-3" data-parent="#accordion3">
                    <div class="card-body">
                      Once you make an order and it's confirmed, an Email will be sent to you automatically.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading3-4">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse3-4" aria-expanded="false" aria-controls="collapse3-4">
                        Can I order a product that is 'Out of Stock'?
                    </a>
                  </div>
                  <div id="collapse3-4" class="collapse" role="tabpanel" aria-labelledby="heading3-4" data-parent="#accordion3">
                    <div class="card-body">
                      No, Once a product becomes out of stock, you cannot make an order for it.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            {{--<div class="col-md-3">
              <h5><i class="fa fa-gift fa-fw"></i> Gift Voucher</h5>
            </div>
            <div class="col-md-9 mb-4">
              <div id="accordion4" role="tablist" class="mb-3">
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading4-1">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse4-1" aria-expanded="false" aria-controls="collapse4-1">
                        How do I buy/gift an e-Gift Voucher?
                    </a>
                  </div>
                  <div id="collapse4-1" class="collapse" role="tabpanel" aria-labelledby="heading4-1" data-parent="#accordion4">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading4-2">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse4-2" aria-expanded="false" aria-controls="collapse4-2">
                        How do I make a purchase with an e-Gift Voucher?
                    </a>
                  </div>
                  <div id="collapse4-2" class="collapse" role="tabpanel" aria-labelledby="heading4-2" data-parent="#accordion4">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading4-3">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse4-3" aria-expanded="false" aria-controls="collapse4-3">
                        Does an e-Gift Voucher expire?
                    </a>
                  </div>
                  <div id="collapse4-3" class="collapse" role="tabpanel" aria-labelledby="heading4-3" data-parent="#accordion4">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading4-4">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse4-4" aria-expanded="false" aria-controls="collapse4-4">
                        Can I use promotional codes with e-Gift Vouchers?
                    </a>
                  </div>
                  <div id="collapse4-4" class="collapse" role="tabpanel" aria-labelledby="heading4-4" data-parent="#accordion4">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading4-5">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse4-5" aria-expanded="false" aria-controls="collapse4-5">
                        Is there a limit on how many e-Gift vouchers I can use on a single order?
                    </a>
                  </div>
                  <div id="collapse4-5" class="collapse" role="tabpanel" aria-labelledby="heading4-5" data-parent="#accordion4">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading4-6">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse4-6" aria-expanded="false" aria-controls="collapse4-6">
                        What Terms & Conditions apply to e-Gift Vouchers?
                    </a>
                  </div>
                  <div id="collapse4-6" class="collapse" role="tabpanel" aria-labelledby="heading4-6" data-parent="#accordion4">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
              </div>
            </div>--}}
            <div class="col-md-3">
              <h5><i class="fa fa-question-circle fa-fw"></i> Order Status</h5>
            </div>
            <div class="col-md-9 mb-4">
              <div id="accordion5" role="tablist" class="mb-3">
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading5-1">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse5-1" aria-expanded="false" aria-controls="collapse5-1">
                        How do I check the current status of my orders?
                    </a>
                  </div>
                  <div id="collapse5-1" class="collapse" role="tabpanel" aria-labelledby="heading5-1" data-parent="#accordion5">
                    <div class="card-body">
                      Once you login to your account, click on orders button then you will see the list of your order(s). Click on the particular order you want to track then you will see the status of that order.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading5-2">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse5-2" aria-expanded="false" aria-controls="collapse5-2">
                        What do the different order status mean?
                    </a>
                  </div>
                  <div id="collapse5-2" class="collapse" role="tabpanel" aria-labelledby="heading5-2" data-parent="#accordion5">
                    <div class="card-body">
                      Processing means that your order has been confirmed and it's been processed. <br>
                      sending means that the order is on it's way to your specified address. <br>
                      delivered means that your order(s) have been collected by you. <br>
                      finished means you have received your order(s) successfully.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading5-3">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse5-3" aria-expanded="false" aria-controls="collapse5-3">
                        When and how can I cancel an order?
                    </a>
                  </div>
                  <div id="collapse5-3" class="collapse" role="tabpanel" aria-labelledby="heading5-3" data-parent="#accordion5">
                    <div class="card-body">
                      Before your order gets to you, you can cancel your order. For you to cancel your order, call 07031382795.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <h5><i class="fa fa-truck fa-fw"></i> Shipping</h5>
            </div>
            <div class="col-md-9 mb-4">
              <div id="accordion6" role="tablist" class="mb-3">
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading6-1">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse6-1" aria-expanded="false" aria-controls="collapse6-1">
                        What are the delivery charges?
                    </a>
                  </div>
                  <div id="collapse6-1" class="collapse" role="tabpanel" aria-labelledby="heading6-1" data-parent="#accordion6">
                    <div class="card-body">
                      The delivery charges depends on the type of product and the location of the customer. The delivery fee appears on the checkout page.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading6-2">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse6-2" aria-expanded="false" aria-controls="collapse6-2">
                        Are there any hidden costs (sales tax, octroi etc) on items sold by sellers?
                    </a>
                  </div>
                  <div id="collapse6-2" class="collapse" role="tabpanel" aria-labelledby="heading6-2" data-parent="#accordion6">
                    <div class="card-body">
                      No, there are no hidden charges.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading6-3">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse6-3" aria-expanded="false" aria-controls="collapse6-3">
                        What is the estimated delivery time?
                    </a>
                  </div>
                  <div id="collapse6-3" class="collapse" role="tabpanel" aria-labelledby="heading6-3" data-parent="#accordion6">
                    <div class="card-body">
                      If a product is coming from the same state as the customer, it will take 3 days otherwise it will take 6 days. Any Global product takes 21 days to get to the customers 
                    </div>
                  </div>
                </div>
                {{--<div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading6-4">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse6-4" aria-expanded="false" aria-controls="collapse6-4">
                        Why does the estimated delivery time vary from seller to seller?
                    </a>
                  </div>
                  <div id="collapse6-4" class="collapse" role="tabpanel" aria-labelledby="heading6-4" data-parent="#accordion6">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading6-5">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse6-5" aria-expanded="false" aria-controls="collapse6-5">
                        Why does the delivery date not correspond to the delivery timeline mentioned?
                    </a>
                  </div>
                  <div id="collapse6-5" class="collapse" role="tabpanel" aria-labelledby="heading6-5" data-parent="#accordion6">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading6-6">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse6-6" aria-expanded="false" aria-controls="collapse6-6">
                        Seller does not/cannot ship to my area. Why?
                    </a>
                  </div>
                  <div id="collapse6-6" class="collapse" role="tabpanel" aria-labelledby="heading6-6" data-parent="#accordion6">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>--}}
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading6-7">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse6-7" aria-expanded="false" aria-controls="collapse6-7">
                        I need to return an item, how do I arrange for a pick-up?
                    </a>
                  </div>
                  <div id="collapse6-7" class="collapse" role="tabpanel" aria-labelledby="heading6-7" data-parent="#accordion6">
                    <div class="card-body">
                      You can return your item and get a refund within 7 days of your order. call 07031382795
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading6-8">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse6-8" aria-expanded="false" aria-controls="collapse6-8">
                        Does deliver internationally?
                    </a>
                  </div>
                  <div id="collapse6-8" class="collapse" role="tabpanel" aria-labelledby="heading6-8" data-parent="#accordion6">
                    <div class="card-body">
                      Yes, we can deliver international products to you.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="alert alert-info" role="alert">
                Was this article helpful ? <a href="#" class="alert-link">Yes</a> / <a href="{{ route('contact') }}" class="alert-link">No, I want to contact support</a>
              </div>
            </div>
          </div>

@endsection        

@section('required-js')
    <!-- REQUIRED JS  -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <!-- Mimity JS  -->
    <script src="../dist/js/script.min.js"></script>
@endsection