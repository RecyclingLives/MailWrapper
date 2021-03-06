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

namespace BespokeSupport\MailWrapper\Tests;

use BespokeSupport\MailWrapper\MailManager;

/**
 * Class SendGenericTest
 * @package BespokeSupport\MailWrapper\Tests
 */
class SendGenericTest extends MailWrapperTestBootstrap
{
    /**
     * @expectedException \BespokeSupport\MailWrapper\MailWrapperSetupException
     */
    public function testException()
    {
        $transport = null;
        MailManager::sendTo('hello@example.com', 'subject', 'content', null, $transport);
    }

    /**
     * @expectedException \BespokeSupport\MailWrapper\MailWrapperSetupException
     */
    public function testExceptionNullValidEmail()
    {
        MailManager::sendTo(null, null, null, 'hello@example.com', null);
    }

    /**
     * @expectedException \BespokeSupport\MailWrapper\MailWrapperSetupException
     */
    public function testExceptionNulls()
    {
        MailManager::sendTo(null, null, null, null, null);
    }

    /**
     * @expectedException \BespokeSupport\MailWrapper\MailWrapperSetupException
     */
    public function testSendExceptionMessage()
    {
        MailManager::send(null);
    }

    /**
     * @expectedException \BespokeSupport\MailWrapper\MailWrapperSetupException
     */
    public function testSendExceptionNullValidEmail()
    {
        MailManager::sendExceptionTo(null, null, new \Exception('test'), 'hello@example.com', null);
    }

    /**
     * @expectedException \BespokeSupport\MailWrapper\MailWrapperSetupException
     */
    public function testSendExceptionNulls()
    {
        MailManager::sendExceptionTo(null, null, new \Exception('test'), null, null);
    }

    /**
     * @expectedException \BespokeSupport\MailWrapper\MailWrapperSetupException
     */
    public function testSendMultipleException()
    {
        $transport1 = null;
        $message = MailManager::getMailMessage(
            'hello@example.com',
            'hello@example.com',
            'hello@example.com',
            'hello@example.com'
        );

        MailManager::send($message, $transport1);
    }

    /**
     * @expectedException \BespokeSupport\MailWrapper\MailWrapperSetupException
     */
    public function testSendNoTransport()
    {
        $message = MailManager::getMailMessage(
            'hello@example.com',
            'hello@example.com',
            'hello@example.com',
            'hello@example.com'
        );

        MailManager::send($message);
    }

    /**
     * @expectedException \BespokeSupport\MailWrapper\MailWrapperSetupException
     */
    public function testSendViaFail()
    {
        $message = MailManager::getMailMessage(
            'hello@example.com',
            'hello@example.com',
            'hello@example.com',
            'hello@example.com'
        );

        MailManager::sendVia($message, null);
    }
}
