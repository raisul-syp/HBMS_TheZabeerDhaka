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
        .contact-msg h2 {
          font-size: 16px;
        }

        .contact-msg p {
          font-size: 12px;
        }

        .contact-information h3 {
          font-size: 14px;
        }

        .booking-table tr td {
          font-size: 11px;
        }

        .contact-information-table {
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
      style="width: 100%; table-layout: fixed; background-color: #ffd7004f;"
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

                  <div class="contact-msg" style="text-align: center; margin-bottom: 20px">
                    <h2 style="color: #dea500; font-weight: 300; margin: 0">Guest Enquery</h2>
                  </div>

                  <table
                    class="contact-information-table"
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
                  >
                    <tr>
                      <th style="font-size: 12px; padding: 10px; font-weight: 400; text-align: left;">Name</th>
                      <td style="margin: 0 auto; font-size: 12px; font-weight: 300; padding: 10px; text-align: left;">{{ $name }}</td>
                    </tr>
                    <tr>
                      <th style="font-size: 12px; padding: 10px; font-weight: 400; text-align: left;">Email</th>
                      <td style="margin: 0 auto; font-size: 12px; font-weight: 300; padding: 10px; text-align: left;">{{ $email }}</td>
                    </tr>
                    <tr>
                      <th style="font-size: 12px; padding: 10px; font-weight: 400; text-align: left;">Subject</th>
                      <td style="margin: 0 auto; font-size: 12px; font-weight: 300; padding: 10px; text-align: left;">{{ $subject }}</td>
                    </tr>
                    <tr>
                      <th style="font-size: 12px; padding: 10px; font-weight: 400; text-align: left;">Message</th>
                      <td style="margin: 0 auto; font-size: 12px; font-weight: 300; padding: 10px; text-align: left;">{{ $msg }}</td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
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

