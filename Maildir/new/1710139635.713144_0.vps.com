Return-Path: <>
X-Original-To: beta@vps.com
Delivered-To: beta@vps.com
Received: by vps.com (Postfix)
	id 067B82800438; Mon, 11 Mar 2024 06:47:14 +0000 (UTC)
Date: Mon, 11 Mar 2024 06:47:14 +0000 (UTC)
From: MAILER-DAEMON@vps.com (Mail Delivery System)
Subject: Undelivered Mail Returned to Sender
To: beta@vps.com
Auto-Submitted: auto-replied
MIME-Version: 1.0
Content-Type: multipart/report; report-type=delivery-status;
	boundary="E2BC42803AA1.1710139634/vps.com"
Content-Transfer-Encoding: 8bit
Message-Id: <20240311064714.067B82800438@vps.com>

This is a MIME-encapsulated message.

--E2BC42803AA1.1710139634/vps.com
Content-Description: Notification
Content-Type: text/plain; charset=utf-8
Content-Transfer-Encoding: 8bit

This is the mail system at host vps.com.

I'm sorry to have to inform you that your message could not
be delivered to one or more recipients. It's attached below.

For further assistance, please send mail to postmaster.

If you do so, please include this problem report. You can
delete your own text from the attached returned message.

                   The mail system

<jdtan33@gmail.com>: host gmail-smtp-in.l.google.com[2607:f8b0:4023:c0d::1b]
    said: 550-5.7.1 [2a02:4780:10:d22e::1] The IP you're using to send mail is
    not 550-5.7.1 authorized to send email directly to our servers. Please use
    the SMTP 550-5.7.1 relay at your service provider instead. For more
    information, go to 550 5.7.1
    https://support.google.com/mail/?p=NotAuthorizedError
    m18-20020a170902f65200b001dd8b2a3858si3074866plg.233 - gsmtp (in reply to
    end of DATA command)

--E2BC42803AA1.1710139634/vps.com
Content-Description: Delivery report
Content-Type: message/delivery-status

Reporting-MTA: dns; vps.com
X-Postfix-Queue-ID: E2BC42803AA1
X-Postfix-Sender: rfc822; beta@vps.com
Arrival-Date: Mon, 11 Mar 2024 06:47:12 +0000 (UTC)

Final-Recipient: rfc822; jdtan33@gmail.com
Original-Recipient: rfc822;jdtan33@gmail.com
Action: failed
Status: 5.7.1
Remote-MTA: dns; gmail-smtp-in.l.google.com
Diagnostic-Code: smtp; 550-5.7.1 [2a02:4780:10:d22e::1] The IP you're using to
    send mail is not 550-5.7.1 authorized to send email directly to our
    servers. Please use the SMTP 550-5.7.1 relay at your service provider
    instead. For more information, go to 550 5.7.1
    https://support.google.com/mail/?p=NotAuthorizedError
    m18-20020a170902f65200b001dd8b2a3858si3074866plg.233 - gsmtp

--E2BC42803AA1.1710139634/vps.com
Content-Description: Undelivered Message
Content-Type: message/rfc822
Content-Transfer-Encoding: 8bit

Return-Path: <beta@vps.com>
Received: by vps.com (Postfix, from userid 1029)
	id E2BC42803AA1; Mon, 11 Mar 2024 06:47:12 +0000 (UTC)
To: jdtan33@gmail.com
Subject: =?us-ascii?Q?[Dharma_Realm_Buddhist_Association]_Your_Site_i?=
 =?us-ascii?Q?s_Experiencing_a_Technical_Issue?=
Date: Mon, 11 Mar 2024 06:47:12 +0000
From: WordPress <wordpress@beta.drba.org>
Message-ID: <skHIN1xHjCXHwJgwfOFc0MukcC4K0eKR2xs0S1EKE@beta.drba.org>
X-Mailer: PHPMailer 6.8.1 (https://github.com/PHPMailer/PHPMailer)
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8

Howdy!

WordPress has a built-in feature that detects when a plugin or theme causes a fatal error on your site, and notifies you with this automated email.

In this case, WordPress caught an error with one of your plugins, Firebase Posts.

First, visit your website (http://beta.drba.org/) and check for any visible issues. Next, visit the page where the error was caught (http://beta.drba.org/wp-admin/plugins.php) and check for any visible issues.

Please contact your host for assistance with investigating this issue further.

If your site appears broken and you can't access your dashboard normally, WordPress now has a special "recovery mode". This lets you safely login to your dashboard and investigate further.

http://beta.drba.org/wp-login.php?action=enter_recovery_mode&rm_token=7DhdSw69AdPUj2oHcfyGMd&rm_key=rqnLTmC85nHDJ5LYnyHpTy

To keep your site safe, this link will expire in 1 day. Don't worry about that, though: a new link will be emailed to you if the error occurs again after it expires.

When seeking help with this issue, you may be asked for some of the following information:
WordPress version 6.4.3
Active theme: DRBA Theme (version )
Current plugin: Firebase Posts (version )
PHP version 8.2.15



Error Details
=============
An error of type E_PARSE was caused in line 16 of the file /home/beta/public_html/wp-content/plugins/pull-firebase/index.php. Error message: syntax error, unexpected token "}", expecting "," or ";"


--E2BC42803AA1.1710139634/vps.com--
