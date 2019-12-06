<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="molaris">
    <link rel="icon" href="{{asset('assets/back/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/back/images/favicon.png')}}" type="image/x-icon">
    <title>Reset Password Notification - Molaris</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <style type="text/css">
      body{
      width: 650px;
      font-family: work-Sans, sans-serif;
      background-color: #f6f7fb;
      display: block;
      }
      a{
      text-decoration: none;
      }
      span {
      font-size: 14px;
      }
      p {
          font-size: 13px;
         line-height: 1.7;
         letter-spacing: 0.7px;
         margin-top: 0;
      }
      .text-center{
      text-align: center
      }
      h6 {
      font-size: 16px;
      margin: 0 0 18px 0;
      }
    </style>
  </head>
  <body style="margin: 30px auto;">
    <table style="width: 100%">
      <tbody>
        <tr>
          <td>
            <table style="background-color: #f6f7fb; width: 100%">
              <tbody>
                <tr>
                  <td>
                    <table style="width: 650px; margin: 0 auto; margin-bottom: 30px">
                      <tbody>
                        <tr>
                          <td><img src="{{asset('assets/back/images/molaris-logo.png')}}" alt=""></td>
                          <td style="text-align: right; color:#999"><span>Some Description</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
            <table style="width: 650px; margin: 0 auto; background-color: #fff; border-radius: 8px">
              <tbody>
                <tr>
                  <td style="padding: 30px"> 
                    <h6 style="font-weight: 600">Forgot Password </h6>
                    <p>You are receiving this email because we received a password reset request for your account. Reset OTP number is.</p>
                    <p style="text-align: center">{{$otp}}</p>
                    <p>If you did not request a password reset, no further action is required. you can safely ignore his email.</p>
                    <p>Good luck! Hope it works.</p>
                    <p style="margin-bottom: 0">
                      Regards,<br>ProjectDemo</p>
                  </td>
                </tr>
              </tbody>
            </table>
            <table style="width: 650px; margin: 0 auto; margin-top: 30px; text-align: center">
              <tbody>
                <tr>
                  <td>
                    <p style="font-size:13px; margin:0;">2019 - 20 Copy Right by ProjectDemo</p>
                  </td>
                </tr>
                <tr>
                  <td><a href="#" style="font-size:13px; margin:0;text-decoration: underline;">Unsubscribe</a></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>