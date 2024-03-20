Return-Path: <>
X-Original-To: beta@vps.com
Delivered-To: beta@vps.com
Received: by vps.com (Postfix)
	id 29B0E28056D7; Tue, 19 Mar 2024 06:20:14 +0000 (UTC)
Date: Tue, 19 Mar 2024 06:20:14 +0000 (UTC)
From: MAILER-DAEMON@vps.com (Mail Delivery System)
Subject: Undelivered Mail Returned to Sender
To: beta@vps.com
Auto-Submitted: auto-replied
MIME-Version: 1.0
Content-Type: multipart/report; report-type=delivery-status;
	boundary="639B628056D4.1710829214/vps.com"
Content-Transfer-Encoding: 8bit
Message-Id: <20240319062014.29B0E28056D7@vps.com>

This is a MIME-encapsulated message.

--639B628056D4.1710829214/vps.com
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
    550-5.7.26 This mail has been blocked because the sender is
    unauthenticated. 550-5.7.26 Gmail requires all senders to authenticate with
    either SPF or DKIM. 550-5.7.26  550-5.7.26  Authentication results:
    550-5.7.26  DKIM = did not pass 550-5.7.26  SPF [vps.com] with ip:
    [195.35.37.55] = did not pass 550-5.7.26  550-5.7.26  For instructions on
    setting up authentication, go to 550 5.7.26
    https://support.google.com/mail/answer/81126#authentication
    jv5-20020a170903058500b001e04ad0ec24si265028plb.326 - gsmtp (in reply to
    end of DATA command)

--639B628056D4.1710829214/vps.com
Content-Description: Delivery report
Content-Type: message/delivery-status

Reporting-MTA: dns; vps.com
X-Postfix-Queue-ID: 639B628056D4
X-Postfix-Sender: rfc822; beta@vps.com
Arrival-Date: Tue, 19 Mar 2024 06:20:12 +0000 (UTC)

Final-Recipient: rfc822; jdtan33@gmail.com
Original-Recipient: rfc822;jdtan33@gmail.com
Action: failed
Status: 5.7.26
Remote-MTA: dns; gmail-smtp-in.l.google.com
Diagnostic-Code: smtp; 550-5.7.26 This mail has been blocked because the sender
    is unauthenticated. 550-5.7.26 Gmail requires all senders to authenticate
    with either SPF or DKIM. 550-5.7.26  550-5.7.26  Authentication results:
    550-5.7.26  DKIM = did not pass 550-5.7.26  SPF [vps.com] with ip:
    [195.35.37.55] = did not pass 550-5.7.26  550-5.7.26  For instructions on
    setting up authentication, go to 550 5.7.26
    https://support.google.com/mail/answer/81126#authentication
    jv5-20020a170903058500b001e04ad0ec24si265028plb.326 - gsmtp

--639B628056D4.1710829214/vps.com
Content-Description: Undelivered Message
Content-Type: message/rfc822
Content-Transfer-Encoding: 8bit

Return-Path: <beta@vps.com>
Received: by vps.com (Postfix, from userid 1029)
	id 639B628056D4; Tue, 19 Mar 2024 06:20:12 +0000 (UTC)
To: jdtan33@gmail.com
Subject: =?us-ascii?Q?[Dharma_Realm_Buddhist_Association]_Your_Site_i?=
 =?us-ascii?Q?s_Experiencing_a_Technical_Issue?=
Date: Tue, 19 Mar 2024 06:20:12 +0000
From: WordPress <wordpress@beta.drba.org>
Message-ID: <5D16NUGOb2lMohmo5hjai9iyXUrPZl5oF4RkBuZF3aQ@beta.drba.org>
X-Mailer: PHPMailer 6.8.1 (https://github.com/PHPMailer/PHPMailer)
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8

Howdy!

WordPress has a built-in feature that detects when a plugin or theme causes a fatal error on your site, and notifies you with this automated email.

In this case, WordPress caught an error with one of your plugins, Pull Firebase.

First, visit your website (http://beta.drba.org/) and check for any visible issues. Next, visit the page where the error was caught (http://beta.drba.org/wp-admin/admin.php?page=firebase_post) and check for any visible issues.

Please contact your host for assistance with investigating this issue further.

If your site appears broken and you can't access your dashboard normally, WordPress now has a special "recovery mode". This lets you safely login to your dashboard and investigate further.

http://beta.drba.org/wp-login.php?action=enter_recovery_mode&rm_token=xMtEgGF02HHk5BHhSL584X&rm_key=C6pVKTfkApFTRFBHIrvVuq

To keep your site safe, this link will expire in 1 day. Don't worry about that, though: a new link will be emailed to you if the error occurs again after it expires.

When seeking help with this issue, you may be asked for some of the following information:
WordPress version 6.4.3
Active theme: DRBA Theme (version )
Current plugin: Pull Firebase (version )
PHP version 8.2.15



Error Details
=============
An error of type E_PARSE was caused in line 119 of the file /home/beta/public_html/wp-content/plugins/pull-firebase/pull-firebase.php. Error message: syntax error, unexpected variable "$testing", expecting "," or ";"


--639B628056D4.1710829214/vps.com--
