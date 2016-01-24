<?php
/**
 * Mail Wrapper
 *
 * PHP Version 5
 *
 * @author   Richard Seymour <web@bespoke.support>
 * @license  MIT
 * @link     https://github.com/BespokeSupport/MailWrapper
 */

namespace BespokeSupport\MailWrapper\TesterMessage;

use BespokeSupport\MailWrapper\Tests\MailWrapperTestBootstrap;
use Zend\Mail\Message;

/**
 * Class TesterMessageZend
 * @package BespokeSupport\MailWrapper\TesterMessage
 */
class TesterMessageZend
{
    /**
     * @return Message
     */
    public static function getNoValidBody()
    {
        $message = new Message();

        $message->setFrom(MailWrapperTestBootstrap::$from);
        $message->addTo(MailWrapperTestBootstrap::$toAddresses[0]);
        $message->addTo(MailWrapperTestBootstrap::$toAddresses[1]);
        $message->addCC(MailWrapperTestBootstrap::$ccAddresses[0]);
        $message->addCC(MailWrapperTestBootstrap::$ccAddresses[1]);
        $message->addBCC(MailWrapperTestBootstrap::$bccAddresses[0]);
        $message->addBCC(MailWrapperTestBootstrap::$bccAddresses[1]);
        $message->addReplyTo(MailWrapperTestBootstrap::$alternate);
        $message->setSubject(MailWrapperTestBootstrap::$subject);

        return $message;
    }

    /**
     * @return Message
     */
    public static function getNotValidNoCc()
    {
        $message = new Message();

        $message->setFrom(MailWrapperTestBootstrap::$from);
        $message->addTo(MailWrapperTestBootstrap::$toAddresses[0]);
        $message->addTo(MailWrapperTestBootstrap::$toAddresses[1]);
        $message->addReplyTo(MailWrapperTestBootstrap::$alternate);
        $message->setSubject(MailWrapperTestBootstrap::$subject);
        $message->setBody(MailWrapperTestBootstrap::$contentText);

        return $message;
    }

    /**
     * @return \PHPMailer
     */
    public static function getNotValidNoFrom()
    {
        $message = new Message();

        $message->addTo(MailWrapperTestBootstrap::$toAddresses[0]);
        $message->addTo(MailWrapperTestBootstrap::$toAddresses[1]);
        $message->addCC(MailWrapperTestBootstrap::$ccAddresses[0]);
        $message->addCC(MailWrapperTestBootstrap::$ccAddresses[1]);
        $message->addBCC(MailWrapperTestBootstrap::$bccAddresses[0]);
        $message->addBCC(MailWrapperTestBootstrap::$bccAddresses[1]);
        $message->addReplyTo(MailWrapperTestBootstrap::$alternate);
        $message->setSubject(MailWrapperTestBootstrap::$subject);
        $message->setBody(MailWrapperTestBootstrap::$contentText);

        return $message;
    }

    /**
     * @return Message
     */
    public static function getNotValidNoSubject()
    {
        $message = new Message();

        $message->setFrom(MailWrapperTestBootstrap::$from);
        $message->addTo(MailWrapperTestBootstrap::$toAddresses[0]);
        $message->addTo(MailWrapperTestBootstrap::$toAddresses[1]);
        $message->addCC(MailWrapperTestBootstrap::$ccAddresses[0]);
        $message->addCC(MailWrapperTestBootstrap::$ccAddresses[1]);
        $message->addBCC(MailWrapperTestBootstrap::$bccAddresses[0]);
        $message->addBCC(MailWrapperTestBootstrap::$bccAddresses[1]);
        $message->addReplyTo(MailWrapperTestBootstrap::$alternate);
        $message->setBody(MailWrapperTestBootstrap::$contentText);

        return $message;
    }

    /**
     * @return Message
     */
    public static function getNotValidNoTo()
    {
        $message = new Message();

        $message->setFrom(MailWrapperTestBootstrap::$from);
        $message->addCC(MailWrapperTestBootstrap::$ccAddresses[0]);
        $message->addCC(MailWrapperTestBootstrap::$ccAddresses[1]);
        $message->addBCC(MailWrapperTestBootstrap::$bccAddresses[0]);
        $message->addBCC(MailWrapperTestBootstrap::$bccAddresses[1]);
        $message->addReplyTo(MailWrapperTestBootstrap::$alternate);
        $message->setSubject(MailWrapperTestBootstrap::$subject);
        $message->setBody(MailWrapperTestBootstrap::$contentText);

        return $message;
    }

    /**
     * @return Message
     */
    public static function getValid()
    {
        $message = new Message();

        $message->setFrom(MailWrapperTestBootstrap::$from);
        $message->addTo(MailWrapperTestBootstrap::$toAddresses[0]);
        $message->addTo(MailWrapperTestBootstrap::$toAddresses[1]);
        $message->addCC(MailWrapperTestBootstrap::$ccAddresses[0]);
        $message->addCC(MailWrapperTestBootstrap::$ccAddresses[1]);
        $message->addBCC(MailWrapperTestBootstrap::$bccAddresses[0]);
        $message->addBCC(MailWrapperTestBootstrap::$bccAddresses[1]);
        $message->addReplyTo(MailWrapperTestBootstrap::$alternate);
        $message->setSubject(MailWrapperTestBootstrap::$subject);
        $message->setBody(MailWrapperTestBootstrap::$contentText);

        return $message;
    }
}
