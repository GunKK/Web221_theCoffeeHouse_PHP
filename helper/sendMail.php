<?php

require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

function sendMailOrder($mail, $receiver, $content) {
    try {
         //Server settings
        $mail->isSMTP();     
        $mail->CharSet  = "utf-8";                                     
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth   = true;                                  
        $mail->SMTPSecure = "tls"; //ssl          
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->Port       = 587; //465                                    
        $mail->Username   = 'hau.nguyenbk8786@gmail.com';                    
        $mail->Password   = 'ufcvgxlxcnzztlyu';                              
        
        //Recipients
        $mail->setFrom('hau.nguyenbk8786@gmail.com', 'TheCoffeeHouse221');
        $mail->addAddress($receiver['email'], $receiver['name']);     
        $mail->addReplyTo('hau.nguyenbk8786@gmail.com', 'TheCoffeeHouse221');

        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'TheCoffeeHouse221 thông báo xác nhận đơn hàng #'.$receiver['id'];
        $mail->Body    = ' <html>
                                <body>
                                    <p>Xin chào quý khách <b>'.$receiver['name'].',</b></p>
                                    <p>Cảm ơn quý khách đã đặt hàng tại <a href="#">TheCoffeeHouse221</a>.</p>
                                    <p>Đơn hàng quý khách sẽ được gửi đi sau khi nhân viên xác nhận qua điện thoại, email,... Vui lòng không tra lời qua email này. Mọi chi tiết xin liên hệ 0909 1999 hoặc 1900 1900</p>

                                    <div>'.$content.'</div>
                                    <p><b style="color: blue">TheCoffeeHouse221</b></p>
                                </body>
                            </html>';

        $mail->send();
        return true;

        } catch (Exception $e) {
            return false;
    }

}

// function sendOTP($mail, $receiver, $OTP) {
//     try {
//     //Server settings
//         $mail->isSMTP();     
//         $mail->CharSet  = "utf-8";                                     
//         $mail->SMTPDebug = 0;
//         $mail->SMTPAuth   = true;                                  
//         $mail->SMTPSecure = "tls"; //ssl          
//         $mail->Host       = 'smtp.gmail.com';                     
//         $mail->Port       = 587; //465                                    
//         $mail->Username   = 'hau.nguyenbk8786@gmail.com';                    
//         $mail->Password   = '12345678';                              
        
//         //Recipients
//         $mail->setFrom('hau.nguyenbk8786@gmail.com', 'TheCoffeeHouse221');
//         $mail->addAddress($receiver['email'], $receiver['name']);     
//         $mail->addReplyTo('hau.nguyenbk8786@gmail.com', 'TheCoffeeHouse221');

//         //Content
//         $mail->isHTML(true);                                  
//         $mail->Subject = 'TheCoffeeHouse221 xác thực';
//         $mail->Body    = ' <html>
//                                 <body>
//                                     <p>Quý khách vui lòng điền mã xác thực để kích hoạt dịch vụ</p>
//                                     <p>Mã xác thực OTP kích hoạt</p>
//                                     <div><b>'.$OTP.'</b></div>
//                                     <p>Nếu quý khách không thực hiên được, liên hệ: 0909 1900 99</p>
//                                     <p><b style="color: blue">TheCoffeeHouse221</b></p>
//                                 </body>
//                             </html>';

//         $mail->send();
//         return true;

//         } catch (Exception $e) {
//             return false;
//     }

// }

?>