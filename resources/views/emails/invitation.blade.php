<!DOCTYPE html>
<html>

<body align="center"
    style="background-color: #222533 !important; padding: 20px; font-family: font-size: 14px; line-height: 1.43; font-family: &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif;">

    <div
        style="max-width: 600px; margin: 0px auto; background-color: #F5F5F5; box-shadow: 0px 20px 50px rgba(0,0,0,0.05);">
        <table style="width: 100%;">
            <tr>
                <td style="background-color: #fff;">
                    <object data="happy.svg" width="300" height="300"> </object>
                    <img alt="" src="{{asset('assets/logowhite.png')}}" style="width: 130px; padding: 20px">
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
            <div style="align-content: center !important" align="center">
                <img src="{{asset('assets/icons/add-user.png')}}" style="height: 100px" alt="">

            </div>
            <h1 style="margin-top: 0px;">
                {{$data[0]}}
            </h1>
            <div style="color: #636363; font-size: 14px;">
                <p>
                    {{$data[1]}}  <br> <br>
                    <a href="{{$data[2]}}"
                        style="padding: 8px 20px; background-color: #006798; color: #fff; font-weight: bolder; font-size: 16px; display: inline-block; margin: 10px 0px; text-decoration: none;">{{__('messages.join')}}</a><br>
                        <a href="">{{__('messages.learn_more_about')}} Bilan Pro</a>
                </p>
            </div>
<hr>
<div align="center">
    <h4 style="margin-bottom: 10px; width:70% !important">
        {{$data[3]}} <br> <span style="color: #636363;">{{$data[4]}}</span> <br>
        <p>
          
            <a href="{{route('login')}}"
                style="padding: 8px 20px; background-color: #8a8b8d; color: rgb(255, 255, 255); font-weight: bolder; font-size: 16px; display: inline-block; margin: 10px 0px; text-decoration: none;">{{__('messages.sign_in')}}</a>
        </p>
    </h4>
</div>
            
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
