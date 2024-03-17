Return-Path: <>
X-Original-To: beta@vps.com
Delivered-To: beta@vps.com
Received: by vps.com (Postfix)
	id 5F6852803B7C; Sun, 17 Mar 2024 06:11:17 +0000 (UTC)
Date: Sun, 17 Mar 2024 06:11:17 +0000 (UTC)
From: MAILER-DAEMON@vps.com (Mail Delivery System)
Subject: Undelivered Mail Returned to Sender
To: beta@vps.com
Auto-Submitted: auto-replied
MIME-Version: 1.0
Content-Type: multipart/report; report-type=delivery-status;
	boundary="E342D2803B6D.1710655877/vps.com"
Content-Transfer-Encoding: 8bit
Message-Id: <20240317061117.5F6852803B7C@vps.com>

This is a MIME-encapsulated message.

--E342D2803B6D.1710655877/vps.com
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

<jdtan33@gmail.com>: host gmail-smtp-in.l.google.com[142.251.2.26] said:
    550-5.7.25 [195.35.37.55] The IP address sending this message does not have
    a 550-5.7.25 PTR record setup, or the corresponding forward DNS entry does
    not 550-5.7.25 point to the sending IP. As a policy, Gmail does not accept
    messages 550-5.7.25 from IPs with missing PTR records. For more
    information, go to 550-5.7.25
    https://support.google.com/mail/answer/81126#ip-practices  550-5.7.25 To
    learn more about Gmail's sender policy, go to 550 5.7.25
    https://support.google.com/mail/answer/81126.
    x6-20020a056a00270600b006e68943a381si6398135pfv.233 - gsmtp (in reply to
    end of DATA command)

--E342D2803B6D.1710655877/vps.com
Content-Description: Delivery report
Content-Type: message/delivery-status

Reporting-MTA: dns; vps.com
X-Postfix-Queue-ID: E342D2803B6D
X-Postfix-Sender: rfc822; beta@vps.com
Arrival-Date: Sun, 17 Mar 2024 06:11:15 +0000 (UTC)

Final-Recipient: rfc822; jdtan33@gmail.com
Original-Recipient: rfc822;jdtan33@gmail.com
Action: failed
Status: 5.7.25
Remote-MTA: dns; gmail-smtp-in.l.google.com
Diagnostic-Code: smtp; 550-5.7.25 [195.35.37.55] The IP address sending this
    message does not have a 550-5.7.25 PTR record setup, or the corresponding
    forward DNS entry does not 550-5.7.25 point to the sending IP. As a policy,
    Gmail does not accept messages 550-5.7.25 from IPs with missing PTR
    records. For more information, go to 550-5.7.25
    https://support.google.com/mail/answer/81126#ip-practices  550-5.7.25 To
    learn more about Gmail's sender policy, go to 550 5.7.25
    https://support.google.com/mail/answer/81126.
    x6-20020a056a00270600b006e68943a381si6398135pfv.233 - gsmtp

--E342D2803B6D.1710655877/vps.com
Content-Description: Undelivered Message
Content-Type: message/rfc822
Content-Transfer-Encoding: 8bit

Return-Path: <beta@vps.com>
Received: by vps.com (Postfix, from userid 1029)
	id E342D2803B6D; Sun, 17 Mar 2024 06:11:15 +0000 (UTC)
To: jdtan33@gmail.com
Subject: =?us-ascii?Q?[Dharma_Realm_Buddhist_Association]_Your_Site_i?=
 =?us-ascii?Q?s_Experiencing_a_Technical_Issue?=
Date: Sun, 17 Mar 2024 06:11:15 +0000
From: WordPress <wordpress@beta.drba.org>
Message-ID: <35b3UUW14UQuQOO0pi5330qBm6tp5ILwAElyK9nSHs@beta.drba.org>
X-Mailer: PHPMailer 6.8.1 (https://github.com/PHPMailer/PHPMailer)
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8

Howdy!

WordPress has a built-in feature that detects when a plugin or theme causes a fatal error on your site, and notifies you with this automated email.

In this case, WordPress caught an error with one of your plugins, Firebase Posts.

First, visit your website (http://beta.drba.org/) and check for any visible issues. Next, visit the page where the error was caught (http://beta.drba.org/wp-admin/admin.php?page=firebase_post) and check for any visible issues.

Please contact your host for assistance with investigating this issue further.

If your site appears broken and you can't access your dashboard normally, WordPress now has a special "recovery mode". This lets you safely login to your dashboard and investigate further.

http://beta.drba.org/wp-login.php?action=enter_recovery_mode&rm_token=AFkWbxvkS4cTu0iB0m61Uy&rm_key=2Y7icLnLGwgHEIaX1HIEvq

To keep your site safe, this link will expire in 1 day. Don't worry about that, though: a new link will be emailed to you if the error occurs again after it expires.

When seeking help with this issue, you may be asked for some of the following information:
WordPress version 6.4.3
Active theme: DRBA Theme (version )
Current plugin: Firebase Posts (version )
PHP version 8.2.15



Error Details
=============
An error of type E_ERROR was caused in line 60 of the file /home/beta/public_html/wp-content/plugins/pull-firebase/index.php. Error message: Uncaught Error: Value of type null is not callable in /home/beta/public_html/wp-content/plugins/pull-firebase/index.php:60
Stack trace:
#0 /home/beta/public_html/wp-includes/class-wp-hook.php(324): show_page_menu()
#1 /home/beta/public_html/wp-includes/class-wp-hook.php(348): WP_Hook->apply_filters()
#2 /home/beta/public_html/wp-includes/plugin.php(517): WP_Hook->do_action()
#3 /home/beta/public_html/wp-admin/admin.php(259): do_action()
#4 {main}
  thrown


--E342D2803B6D.1710655877/vps.com--
