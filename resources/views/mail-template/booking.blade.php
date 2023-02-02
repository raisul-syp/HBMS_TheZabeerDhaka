<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>The Zabeer Dhaka</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500&display=swap"
      rel="stylesheet"
    />

    <style>
      @media screen and (max-width: 500px) {
        .booking-msg h2 {
          font-size: 16px;
        }

        .booking-msg p {
          font-size: 12px;
        }

        .booking-information h3 {
          font-size: 14px;
        }

        .booking-table tr td {
          font-size: 11px;
        }

        .room-information-table {
          border-width: 10px;
        }

        .contact-info {
          width: 90%;
        }

        .contact-info p {
          font-size: 11px;
        }
      }
    </style>
  </head>
  <body style="margin: 0; background-color: #f1f1f1">
    <!--[if lt IE 7]>
      <p class="browsehappy">
        You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to
        improve your experience.
      </p>
    <![endif]-->

    <center
      class="wrapper"
      width="100%"
      style="width: 100%; table-layout: fixed; background-color: #ffd7004f; padding: 30px 0;"
    >
      <table
        align="center"
        class="main"
        width="100%"
        style="
          padding: 0;
          background-color: #ffffff;
          margin: 0 auto;
          width: 100%;
          max-width: 650px;
          border-spacing: 0;
          color: #4a4a4a;
          font-family: 'Poppins', sans-serif;
          font-weight: 400;
          font-size: 14px;
        "
        bgcolor="#ffffff"
      >
        <tr>
          <td
            bgcolor="#F6F6F6"
            class="top-header"
            style="margin: 0 auto; position: relative; padding: 20px"
            colspan="2"
          >
            <table
              style="border-spacing: 0; padding: 0; margin: 0; position: relative; z-index: 2; width: 100%"
              class="header-wrapper"
              width="100%"
            >
              <tr></tr>
              <tr>
                <td
                  bgcolor="white"
                  style="margin: 0 auto; padding: 20px; box-shadow: 0px 3px 20px 0px rgb(155 155 157 / 13%)"
                  colspan="2"
                >
                  <div
                    class="header-logo"
                    style="
                      text-align: center;
                      padding: 15px 0;
                      border-bottom: 3px solid #dea500;
                      margin-bottom: 15px;
                      background: #2c2c2c;
                    "
                  >
                    <a href="https://thezabeerdhaka.com/" target="_blank">
                      <img
                        src="https://thezabeerdhaka.com/public/uploads/site/logo-the-zabeer-dhaka.png"
                        alt="The Zabeer"
                        width="120"
                        style="border: 0; display: inline-block"
                      />
                    </a>
                  </div>

                  <div class="booking-msg" style="text-align: center; margin-bottom: 20px">
                    <h2 style="color: #dea500; font-weight: 300; margin: 0">Thank you for Hotel Reservation !</h2>
                    <p style="font-weight: 300; margin: 0; padding: 0">We will contact to you shortly...</p>
                  </div>

                  <div class="booking-information" style="background: #f9f9f9; padding: 10px 15px">
                    <h3 style="margin: 0; font-weight: 400; color: #dda501">Booking Information</h3>
                  </div>

                  <table
                    class="booking-table"
                    style="border-spacing: 0; margin: 0; padding: 15px; width: 100%"
                    width="100%"
                  >
                    <tr>
                      <td
                        class="bold"
                        style="
                          padding: 0;
                          margin: 0 auto;
                          padding-bottom: 5px;
                          font-size: 13px;
                          font-weight: 400;
                        "
                      >
                        Guest Name :
                      </td>
                      <td
                        style="
                          padding: 0;
                          margin: 0 auto;
                          padding-bottom: 5px;
                          font-weight: 300;
                          font-size: 13px;
                        "
                      >
                        {{ $guest_name }}
                      </td>
                    </tr>
                    <tr>
                      <td
                        class="bold"
                        style="
                          padding: 0;
                          margin: 0 auto;
                          padding-bottom: 5px;
                          font-size: 13px;
                          font-weight: 400;
                        "
                      >
                        Email Address :
                      </td>
                      <td
                        style="
                          padding: 0;
                          margin: 0 auto;
                          padding-bottom: 5px;
                          font-weight: 300;
                          font-size: 13px;
                        "
                      >
                        {{ $guest_email }}
                      </td>
                    </tr>
                    <tr>
                      <td
                        class="bold"
                        style="
                          padding: 0;
                          margin: 0 auto;
                          padding-bottom: 5px;
                          font-size: 13px;
                          font-weight: 400;
                        "
                      >
                        Phone Number :
                      </td>
                      <td
                        style="
                          padding: 0;
                          margin: 0 auto;
                          padding-bottom: 5px;
                          font-weight: 300;
                          font-size: 13px;
                        "
                      >
                        {{ $guest_phone }}
                      </td>
                    </tr>
                    <tr>
                      <td
                        class="bold"
                        style="
                          padding: 0;
                          margin: 0 auto;
                          padding-bottom: 5px;
                          font-size: 13px;
                          font-weight: 400;
                        "
                      >
                        Booking Date :
                      </td>
                      <td
                        style="
                          padding: 0;
                          margin: 0 auto;
                          padding-bottom: 5px;
                          font-weight: 300;
                          font-size: 13px;
                        "
                      >
                        {{ date('d F Y, h:i A', strtotime($booking_date)) }}
                      </td>
                    </tr>
                    <tr>
                      <td
                        class="bold"
                        style="
                          padding: 0;
                          margin: 0 auto;
                          padding-bottom: 5px;
                          font-size: 13px;
                          font-weight: 400;
                        "
                      >
                        Payment Mode :
                      </td>
                      <td
                        style="
                          padding: 0;
                          margin: 0 auto;
                          padding-bottom: 5px;
                          font-weight: 300;
                          font-size: 13px;
                        "
                      >
                        {{ $payment_mode }}
                      </td>
                    </tr>
                  </table>

                  <div class="booking-information" style="background: #f9f9f9; padding: 10px 15px">
                    <h3 style="margin: 0; font-weight: 400; color: #dda501">Room Information</h3>
                  </div>
                  <table
                    class="room-information-table"
                    border="1"
                    style="
                      border-spacing: 0;
                      padding: 0;
                      margin: 0;
                      width: 100%;
                      text-align: center;
                      margin-top: 15px;
                      border-width: 15px;
                      border-color: #dda502;
                    "
                    width="100%"
                    align="center"
                  >
                    <tr>
                      <th style="font-size: 12px; padding: 10px; font-weight: 400">Room Name</th>
                      <th style="font-size: 12px; padding: 10px; font-weight: 400">Check-in</th>
                      <th style="font-size: 12px; padding: 10px; font-weight: 400">Check-out</th>
                      <th style="font-size: 12px; padding: 10px; font-weight: 400">Booking Status</th>
                      <th style="font-size: 12px; padding: 10px; font-weight: 400">Price</th>
                    </tr>
                    <tr>
                      <td style="margin: 0 auto; font-size: 12px; font-weight: 300; padding: 10px">{{ $room_name }}</td>
                      <td style="margin: 0 auto; font-size: 12px; font-weight: 300; padding: 10px">
                        {{ date('d F Y', strtotime($checkin_date)) }},
                        {{ date('h:i A', strtotime($checkin_time)) }}
                      </td>
                      <td style="margin: 0 auto; font-size: 12px; font-weight: 300; padding: 10px">
                        {{ date('d F Y', strtotime($checkout_date)) }},
                        {{ date('h:i A', strtotime($checkout_time)) }}
                      </td>
                      <td style="margin: 0 auto; font-size: 12px; font-weight: 300; padding: 10px">
                        @if ($booking_status == 0)
                        Pending
                        @elseif ($booking_status == 1)
                        Booked
                        @elseif ($booking_status == 2)
                        Cancel
                        @elseif ($booking_status == 3)
                        Payment Pending
                        @endif
                      </td>
                      <td style="margin: 0 auto; font-size: 12px; font-weight: 300; padding: 10px">{{ '$'.$room_price }}</td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <!-- Footer Section -->
        <tr>
          <td bgcolor="#2c2c2c" style="padding: 0; margin: 0 auto"></td>
        </tr>
        <tr>
          <td
            align="center"
            bgcolor="#2c2c2c"
            colspan="2"
            style="margin: 0 auto; padding: 20px 0px 0px 0; border-bottom: 1px solid #dea500; border-top: 3px solid #dea500;"
          >
            <a href="https://thezabeerdhaka.com/" target="_blank">
              <img
                src="https://thezabeerdhaka.com/public/uploads/site/logo-the-zabeer-dhaka.png"
                alt="Zabeer Logo"
                width="130"
                style="border: 0; display: block"
              />
            </a>
            <div class="contact-info" style="margin: 15px 0">
              <p style="font-size: 12px; color: white; font-weight: 300; margin: 5px 0">
                Call :
                <a style="color: white; text-decoration: none" href="tel:(+88) 02224470771-73"
                  >(+88) 02224470771-73</a
                >
              </p>
              <p style="font-size: 12px; color: white; font-weight: 300; margin: 5px 0">
                Email :
                <a style="color: white; text-decoration: none" href="mailto:info@thezabeerdhaka.com"
                  >info@thezabeerdhaka.com</a
                >
              </p>
              <p style="font-size: 12px; color: white; font-weight: 300; margin: 5px 0">
                Address : House-1, Road-2, Sector-1, Uttara Model Town, Dhaka-1230
              </p>
            </div>
          </td>
        </tr>
        <tr>
          <td bgcolor="#2c2c2c" align="center" style="margin: 0 auto; padding: 5px 0">
            <p style="color: white; font-weight: 300">Connect with us</p>
          </td>
          <td bgcolor="#2c2c2c" style="margin: 0 auto; padding: 5px 0">
            <div class="social" style="text-align: center">
              <a href="https://www.facebook.com/thezabeerdhaka" style="display: inline-block; margin: 0 5px"
                ><img
                  width="20"
                  src="https://cdn-icons-png.flaticon.com/512/733/733547.png"
                  alt="Social Icon"
                  style="border: 0; display: block"
              /></a>

              <a href="#" style="display: inline-block; margin: 0 5px"
                ><img
                  width="20"
                  src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png"
                  alt="Social Icon"
                  style="border: 0; display: block"
              /></a>
              <a href="#" style="display: inline-block; margin: 0 5px"
                ><img
                  width="20"
                  src="https://cdn-icons-png.flaticon.com/512/733/733585.png"
                  alt="Social Icon"
                  style="border: 0; display: block"
              /></a>
              <a href="https://www.youtube.com/@thezabeerdhaka" style="display: inline-block; margin: 0 5px"
                ><img
                  width="20"
                  src="https://cdn-icons-png.flaticon.com/512/1384/1384060.png"
                  alt="Social Icon"
                  style="border: 0; display: block"
              /></a>
            </div>
          </td>
        </tr>

        <!-- Bottom Border  -->
        <tr>
          <td
            height="5"
            colspan="2"
            style="
              padding: 0;
              margin: 0 auto;
              background: linear-gradient(
                to right,
                #814d01,
                #996101,
                #b07701,
                #c88d01,
                #dea500,
                #dea500,
                #dea500,
                #dea500,
                #c88d01,
                #b07701,
                #996101,
                #814d01
              );
            "
          ></td>
        </tr>
      </table>
    </center>
  </body>
</html>

