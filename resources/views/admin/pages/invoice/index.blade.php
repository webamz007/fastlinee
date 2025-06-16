<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Invoice</title>

    <style>

        @import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);
        *{
            margin: 0;
            box-sizing: border-box;

        }
        body{
            /*background: #E0E0E0;*/
            font-family: 'Roboto', sans-serif;
        }
        ::selection {background: #f31544; color: #FFF;}
        ::moz-selection {background: #f31544; color: #FFF;}
        h1{
            font-size: 1.5em;
            color: #222;
        }
        h2{font-size: .9em;}
        h3{
            font-size: 1.2em;
            font-weight: 300;
            line-height: 2em;
        }
        p{
            font-size: .7em;
            color: #666;
            line-height: 1.2em;
        }

        #invoiceholder{
            width:100%;
            padding-top: 50px;
        }
        #invoice{
            position: relative;
            margin: 0 auto;
            /*width: 700px;*/
            background: #FFF;
        }

        [id*='invoice-']{ /* Targets all id with 'col-' */
            border-bottom: 1px solid #EEE;
            padding: 30px;
        }

        #invoice-top{min-height: 50px;}
        #invoice-mid{min-height: 50px;}

        .logo{
            float: left;
            height: 60px;
            width: 60px;
            background: url({{ asset('web-assets/img/header-logo.png') }}) no-repeat;
            background-size: 60px 60px;
        }
        .clientlogo{
            float: left;
            height: 60px;
            width: 60px;
            background: url({{ asset('assets/img/client.jpg') }}) no-repeat;
            background-size: 60px 60px;
            border-radius: 50px;
        }
        .info{
            display: block;
            float:left;
            margin-left: 20px;
        }
        .title{
            float: right;
        }
        .title p{text-align: right;}
        #project{margin-left: 52%;}
        table{
            width: 100%;
            border-collapse: collapse;
        }
        td{
            padding: 5px 0 5px 15px;
            border: 1px solid #EEE
        }
        .tabletitle{
            padding: 5px;
            background: #EEE;
        }
        .service{border: 1px solid #EEE;}
        .itemtext{font-size: .9em;}

        #legalcopy{
            margin-top: 30px;
        }
        form{
            float:right;
            margin-top: 30px;
            text-align: right;
        }
        .legal{
            width:70%;
        }
    </style>
</head>
<body>

<div id="invoiceholder">

    <div id="headerimage"></div>
    <div id="invoice" class="effect2">

        <div id="invoice-top">
            <div class="logo"></div>
            <div class="info">
                <h2>Fastlinee</h2>
                <p>info@fastlinee.com<br>
                    +447481691058
                </p>
            </div><!--End Info-->
            <div class="title">
                <h1>Invoice #{{ $booking->id }}</h1>
                <p>
                    Issued: {{ \Carbon\Carbon::now()->format('F d, Y') }}<br>
                    Payment Due: {{ \Carbon\Carbon::now()->addMonth()->format('F d, Y') }}
                </p>
            </div><!--End Title-->
        </div><!--End InvoiceTop-->



        <div id="invoice-mid">

            <div class="clientlogo"></div>
            <div class="info">
                <h2>{{ $booking->user_name }}</h2>
                <p>{{ $booking->user_email }}<br>{{ $booking->user_phone }}<br></p>
            </div>

            <div id="project">
                <h2>Booking Description</h2>
                <p>{{ $booking->location_from }} To {{ $booking->location_to }}</p>
            </div>

        </div><!--End Invoice Mid-->

        <div id="invoice-bot">

            <div id="table">
                <table>
                    <tr class="tabletitle">
                        <td class="subtotal"><h2>Description</h2></td>
                        <td class="subtotal"><h2>Quantity</h2></td>
                        <td class="item"><h2>Amount</h2></td>
                    </tr>

                    <tr class="service">
                        <td class="tableitem">
                            <p class="itemtext">
                                {{ $booking->location_from }} To {{ $booking->location_to }}
                            </p>
                        </td>
                        <td class="tableitem"><p class="itemtext">1.00</p></td>
                        <td class="tableitem"><p class="itemtext">{{ number_format($booking->total_price, 2) }} SR</p></td>
                    </tr>
                    <tr class="tabletitle">
                        <td></td>
                        <td class="Rate"><h2>Total</h2></td>
                        <td class="payment"><h2>{{ number_format($booking->total_price, 2) }} SR</h2></td>
                    </tr>

                </table>
            </div><!--End Table-->

            <div id="legalcopy">
                <p class="legal"><strong>Thank you for your booking!</strong> 
                </p>
            </div>

        </div><!--End InvoiceBot-->
    </div><!--End Invoice-->
</div><!-- End Invoice Holder-->
</body>
</html>
