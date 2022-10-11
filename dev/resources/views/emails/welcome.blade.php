<!DOCTYPE html>
<html>

<body
    style="background-color: #222533 !important; padding: 20px; font-family: font-size: 14px; line-height: 1.43; font-family: &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif;">

    <div
        style="max-width: 600px; margin: 0px auto; background-color: #F5F5F5; box-shadow: 0px 20px 50px rgba(0,0,0,0.05);">
        <table style="width: 100%;">
            <tr>
                <td style="background-color: #fff;">
                    <object data="happy.svg" width="300" height="300"> </object>
                    <img alt="" src="{{asset('assets/logowhite.png')}}" style="width: 70px; padding: 20px">
                </td>
                {{-- <td style="padding-left: 50px; text-align: right; padding-right: 20px;">
                    <a href="#"
                        style="color: #261D1D; text-decoration: underline; font-size: 14px; letter-spacing: 1px;">Sign
                        In</a><a href="#"
                        style="color: #7C2121; text-decoration: underline; font-size: 14px; margin-left: 20px; letter-spacing: 1px;">Forgot
                        Password</a>
                </td> --}}
            </tr>
        </table>
        <div style="padding: 60px 20px; border-top: 1px solid rgba(0,0,0,0.05);">
            <h1 style="margin-top: 0px;">
                {{$data[0]}}
            </h1>
            <div style="color: #636363; font-size: 14px;">
                <p>
                    {{$data[1]}}  <br> <br>
                    <a href="{{$data[2]}}"
                        style="padding: 8px 20px; background-color: #006798; color: #fff; font-weight: bolder; font-size: 16px; display: inline-block; margin: 10px 0px; text-decoration: none;">Activer
                        mon compte</a>
                </p>
            </div>

            <h4 style="margin-bottom: 10px;">
                {{$data[3]}} <br> {{$data[4]}}
            </h4>
            <div style="color: #A5A5A5; font-size: 12px;">
                <p>
                    {{$data[5]}} <br> <a href="mailto:support@bilan-pro.com"
                        style="text-decoration: underline; color: #006798;">support@bilan-pro.com</a>
                </p>
            </div>
        </div>

    </div>
</body>

</html>
