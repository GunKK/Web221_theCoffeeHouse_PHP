<?php



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

function verifyEmail($mail, $receiver, $verifyCode) {
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
        $mail->Subject = 'TheCoffeeHouse221 xác thực tải khoản';
        $mail->Body    = ' <html>
                                <body>
                                    <p>Thông tin tài khoản</p>
                                    <p>Tên đăng nhập: <b style="color:blue">'.$receiver['email'].'</b></p>
                                    <p>Mật khẩu: <b style="color:blue">'.$receiver['password'].'</b></p>
                                    <p>Quý khách vui lòng điền mã xác thực để kích hoạt dịch vụ</p>
                                    <p>Mã xác thực kích hoạt tài khoản</p>
                                    <div><b>'.$verifyCode.'</b></div>
                                    <p>Nếu quý khách không thực hiên được, liên hệ: 0909 1900 99</p>
                                    <p><b style="color: blue">TheCoffeeHouse221</b></p>
                                </body>
                            </html>';

        $mail->send();
        return true;
        } catch (Exception $e) {
            return false;
    }

}

function resetPassword($mail, $receiver) {
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
        $mail->Subject = 'TheCoffeeHouse221 cập nhật thông tin tài khoản';
        $mail->Body    = ' <html>
                                <body>
                                    <p>Thông tin tài khoản</p>
                                    <p>Tên đăng nhập: <b style="color:blue">'.$receiver['email'].'</b></p>
                                    <p>Mật khẩu: <b style="color:blue">'.$receiver['password'].'</b></p>
                                    <p>Quý khách vui lòng đăng nhập lại</p>
                                    <p>Nếu quý khách không thực hiên được, liên hệ: 0909 1900 99</p>
                                    <p><b style="color: blue">TheCoffeeHouse221</b></p>
                                </body>
                            </html>';

        $mail->send();
        return true;
        } catch (Exception $e) {
            return false;
    }

}

?>