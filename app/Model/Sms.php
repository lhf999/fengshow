<?php
/**
 * CLASS
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-8-7
 * Time: 9:58
 */
namespace App\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Model\Sms\SmsSingleSender;
use App\Model\Sms\EmptyClass;
use App\Model\Sms\TelClass;
/**
 * 单发短信类
 *
 */
class Sms extends Model
{
    public function sendMessage()
    {
        $random = rand(100000,999999);
        $type = Request()->input('type');
        $value = Request()->input('value');
        if ($type == 1) {
            $flag = $this->sendMail($value,'验证码',
                '<span style="color:skyblue;">'.$random.'</span><br/>');
            //邮箱
        } else {
            $flag = $this->sms($random,$type,$value);
        }
        return $flag;
    }

    /**
     * CLASS 拼接参数
     * Created by PhpStorm.
     * User: lv
     * Date: 2018-8-27
     * Time: 17:42
     */
    public function sms($random,$type,$value){
        $appId = env('APPID');
        $appKey = env('APPKEY');
        $sign = "菩提微视觉";
        $url = "https://yun.tim.qq.com/v5/tlssmssvr/sendsms";
        $curTime = time();
        $wholeUrl = $url . "?sdkappid=" . $appId . "&random=" . $random;
        $data = new EmptyClass();
        $tel = new TelClass();
        $tel->nationcode = "86";
        $tel->mobile = $value;
        $data->tel = $tel;
        $data->sig = $this->generateSig($appKey,$random,$curTime,$value);
        $data->tpl_id = '170596';
        $data->params = array($random);
        $data->sign = $sign;
        $data->time = $curTime;
        $data->extend = '';
        $data->ext = '';
        $re = $this->sendCurlPost($wholeUrl, $data);
        $res = json_decode($re);
        if($res->result == 0){
            return true;
        }else{
            return false;
        }

    }

    /**
     * 生成签名
     *
     * @param string $appkey        sdkappid对应的appkey
     * @param string $random        随机正整数
     * @param string $curTime       当前时间
     * @param array  $phoneNumbers  手机号码
     * @return string  签名结果
     */
    public function generateSig($appkey, $random, $curTime, $phoneNumbers)
    {
        return hash("sha256", "appkey=".$appkey."&random=".$random
            ."&time=".$curTime."&mobile=".$phoneNumbers);
    }

    /**
     * 发送请求
     *
     * @param string $url      请求地址
     * @param array  $dataObj  请求内容
     * @return string 应答json字符串
     */
    public function sendCurlPost($url, $dataObj)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($dataObj));
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        $ret = curl_exec($curl);
        if (false == $ret) {
            // curl_exec failed
            $result = "{ \"result\":" . -2 . ",\"errmsg\":\"" . curl_error($curl) . "\"}";
        } else {
            $rsp = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if (200 != $rsp) {
                $result = "{ \"result\":" . -1 . ",\"errmsg\":\"". $rsp
                    . " " . curl_error($curl) ."\"}";
            } else {
                $result = $ret;
            }
        }

        curl_close($curl);

        return $result;
    }

    /*发送邮件方法
     *@param $to：接收者 $title：标题 $content：邮件内容
     *@return bool true:发送成功 false:发送失败
     */

    function sendMail($to,$title,$content){
        //引入PHPMailer的核心文件 使用require_once包含避免出现PHPMailer类重复定义的警告
        $smtp = new Smtp();
        $mail = new Phpmailer();
        //$mail = new PHPMailer();//实例化PHPMailer核心类
        //$mail->SMTPDebug = 1;//是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
        $mail->isSMTP();//使用smtp鉴权方式发送邮件
        $mail->SMTPAuth=true;//smtp需要鉴权 这个必须是true
        $mail->Host = 'smtp.qq.com';//链接qq域名邮箱的服务器地址
        $mail->SMTPSecure = 'ssl';//设置使用ssl加密方式登录鉴权
        $mail->Port = 465;//设置ssl连接smtp服务器的远程服务器端口号，以前的默认是25，但是现在新的好像已经不可用了 可选465或587
        $mail->CharSet = 'UTF-8';//设置发送的邮件的编码 可选GB2312 我喜欢utf-8 据说utf8在某些客户端收信下会乱码
        $mail->FromName = '哈哈哈';//设置发件人姓名（昵称） 任意内容，显示在收件人邮件的发件人邮箱地址前的发件人姓名
        $mail->Username ='739813218@qq.com';//smtp登录的账号 这里填入字符串格式的qq号即可
        $mail->Password = 'fgsltfifgsedbbbe';//smtp登录的密码 使用生成的授权码（就刚才叫你保存的最新的授权码）【非常重要：在网页上登陆邮箱后在设置中去获取此授权码】ixywolcdurfqbdbf
        $mail->From = '739813218@qq.com';//设置发件人邮箱地址 这里填入上述提到的“发件人邮箱”
        $mail->isHTML(true);//邮件正文是否为html编码 注意此处是一个方法 不再是属性 true或false
        $mail->addAddress($to);//设置收件人邮箱地址
        $mail->Subject = $title;//添加该邮件的主题
        $mail->Body = $content;//添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取本地的html文件
        //简单的判断与提示信息
        if($mail->send()) {
            return true;
        }else{
            return false;
        }
    }

    public function curl($url,$data = null){
        $ch = curl_init();
        $data = array('name' => 'Foo', 'file' => '@/home/user/test.png');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $data = curl_exec($ch);
        curl_exec($ch);
        $data = json_decode($data,true);
        return $data;
    }
}
