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

namespace BespokeSupport\MailWrapper;

use Zend\Mail\Message;

/**
 * Class MessageTransformerZend
 * @package BespokeSupport\MailWrapper
 */
class MessageTransformerZend implements MessageTransformerInterface
{
    /**
     * @inheritDoc
     */
    public static function fromWrappedMessage(MailWrappedMessage $wrappedMessage = null, $transport = null)
    {
        if (!($wrappedMessage instanceof MailWrappedMessage)) {
            throw new MailWrapperSetupException('Not MailWrappedMessage');
        }

        $message = new Message();

        foreach ($wrappedMessage->getToRecipients() as $address) {
            $message->addTo($address);
        }
        foreach ($wrappedMessage->getCcRecipients() as $address) {
            $message->addCc($address);
        }
        foreach ($wrappedMessage->getBccRecipients() as $address) {
            $message->addBcc($address);
        }

        $message->setSubject($wrappedMessage->getSubject());

        // todo multi-part
        $text = ($wrappedMessage->getContentHtml()) ?: $wrappedMessage->getContentText();
        $message->setBody($text);

        return $message;
    }

    /**
     * @param $message
     * @return bool
     */
    public static function isValid($message)
    {
        if (!$message) {
            return false;
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public static function toWrappedMessage($message, $transport = null)
    {
        if (!($message instanceof Message)) {
            throw new MailWrapperSetupException('Invalid Message');
        }

        $wrappedMessage = new MailWrappedMessage();
        $wrappedMessage->setWrappedMessage($message);

        $subject = $message->getSubject();
        $contentHtml = $message->getBody();
        $contentText = $message->getBodyText();

        $toRecipients = $message->getTo();
        $ccRecipients = $message->getCc();
        $bccRecipients = $message->getBcc();

        $from = $message->getFrom()->current();
        $replyTo = $message->getReplyTo()->current();

        $wrappedMessage->setFrom($from);
        $wrappedMessage->setReplyTo($replyTo);
        $wrappedMessage->setSubject($subject);
        $wrappedMessage->setContentText($contentText);
        $wrappedMessage->setContentHtml($contentHtml);

        foreach ($toRecipients as $address) {
            $wrappedMessage->addToRecipient($address->getEmail());
        }

        foreach ($ccRecipients as $address) {
            $wrappedMessage->addCcRecipient($address->getEmail());
        }

        foreach ($bccRecipients as $address) {
            $wrappedMessage->addBccRecipient($address->getEmail());
        }

        return $wrappedMessage;
    }
}