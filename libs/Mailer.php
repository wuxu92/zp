<?php 

require_once APP_ROOT . '/ext/swiftmailer/lib/swift_required.php';

class Mailer 
{
    /**
     * 要发送的信息对象
     * @var Swift_message
     */
	private $_message;

    /**
     * port, 实例化smtp连接使用的参数
     * @var Swift_SmtpTransport
     */
	private $_transport;

    /**
     * 发送器
     * @var Swift_Mailer
     */
	private $_mailer;

    public $smtp_host;
    public $smtp_port = 465;
    public $smtp_username;
    public $smtp_password;
    public $smtp_type = 'ssl';

    // private $_

    /**
     * @var string message content to send
     */
    public $body;

    public function __construct($config)
    {

        // check proc* functions  exist
        if ( !function_exists('proc_open')) {
            throw new Exception("cannot send mail for proc_* functions is not available");
        }

        if (empty($config['smtp_host']) ||
            empty($config['smtp_username']) ||
            empty($config['smtp_password']))
        {
            throw new Exception("Mailer config error, host/username/password cannot be null");
        };

        foreach ($config as $name => $value) {
            if (property_exists("Mailer", $name)) {
                $this->$name = $value;
            }
        }
        // init here

        $this->_transport = new Swift_SmtpTransport($this->smtp_host, $this->smtp_port, $this->smtp_type);

        $this->_transport->setUsername($this->smtp_username);
        $this->_transport->setPassword($this->smtp_password);

        $this->_mailer = new Swift_Mailer($this->_transport);
    }


    public function newMessage()
    {
        $this->_message = new Swift_Message();
        return $this->_message;
    }

    public function getMessage()
    {
        if ($this->_message === null) {
            $this->_message = new Swift_Message();
        }

        return $this->_message;
    }

    public function send()
    {
        return $this->_mailer->send($this->_message);
    }

    /**
     * 设置邮件主题
     * @param $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->getMessage()->setSubject($subject);
        return $this;
    }
    /**
     * 设置body，返回this
     * @param $body
     * @return $this
     */
    public function setBody($body)
    {
        $this->getMessage()->setBody($body);

        return $this;
    }

    /**
     * 设置收件人，链式调用
     * $this->setTo([...])->setBody("ddd")->send();
     * @param $sendTo
     * @return $this
     */
    public function setTo($sendTo)
    {
        $this->getMessage()->setTo($sendTo);
        return $this;
    }

    /**
     * 修改抄送
     * @param $cc
     * @return $this
     */
    public function setCc($cc)
    {
        $this->getMessage()->setCc($cc);
        return $this;
    }
}