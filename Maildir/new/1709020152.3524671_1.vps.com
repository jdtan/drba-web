Return-Path: <>
X-Original-To: beta@vps.com
Delivered-To: beta@vps.com
Received: by vps.com (Postfix)
	id 8F6D828056CF; Tue, 27 Feb 2024 07:49:12 +0000 (UTC)
Date: Tue, 27 Feb 2024 07:49:12 +0000 (UTC)
From: MAILER-DAEMON@vps.com (Mail Delivery System)
Subject: Undelivered Mail Returned to Sender
To: beta@vps.com
Auto-Submitted: auto-replied
MIME-Version: 1.0
Content-Type: multipart/report; report-type=delivery-status;
	boundary="76E1628056CE.1709020152/vps.com"
Content-Transfer-Encoding: 8bit
Message-Id: <20240227074912.8F6D828056CF@vps.com>

This is a MIME-encapsulated message.

--76E1628056CE.1709020152/vps.com
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

<jdtan33@gmail.com>: host gmail-smtp-in.l.google.com[142.251.2.27] said:
    550-5.7.26 This mail has been blocked because the sender is
    unauthenticated. 550-5.7.26 Gmail requires all senders to authenticate with
    either SPF or DKIM. 550-5.7.26  550-5.7.26  Authentication results:
    550-5.7.26  DKIM = did not pass 550-5.7.26  SPF [vps.com] with ip:
    [195.35.37.55] = did not pass 550-5.7.26  550-5.7.26  For instructions on
    setting up authentication, go to 550 5.7.26
    https://support.google.com/mail/answer/81126#authentication
    cj10-20020a056a00298a00b006e410699a61si5204388pfb.128 - gsmtp (in reply to
    end of DATA command)

--76E1628056CE.1709020152/vps.com
Content-Description: Delivery report
Content-Type: message/delivery-status

Reporting-MTA: dns; vps.com
X-Postfix-Queue-ID: 76E1628056CE
X-Postfix-Sender: rfc822; beta@vps.com
Arrival-Date: Tue, 27 Feb 2024 07:49:11 +0000 (UTC)

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
    cj10-20020a056a00298a00b006e410699a61si5204388pfb.128 - gsmtp

--76E1628056CE.1709020152/vps.com
Content-Description: Undelivered Message
Content-Type: message/rfc822
Content-Transfer-Encoding: 8bit

Return-Path: <beta@vps.com>
Received: by vps.com (Postfix, from userid 1029)
	id 76E1628056CE; Tue, 27 Feb 2024 07:49:11 +0000 (UTC)
To: jdtan33@gmail.com
Subject: New WordPress Site
Date: Tue, 27 Feb 2024 07:49:11 +0000
From: WordPress <wordpress@beta.drba.org>
Message-ID: <rVcir00Gtgi4EyXlJ4Nh9gWAjRqbaM408R6q5Sg@beta.drba.org>
X-Mailer: PHPMailer 6.8.1 (https://github.com/PHPMailer/PHPMailer)
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8

Your new WordPress site has been successfully set up at:

http://beta.drba.org

You can log in to the administrator account with the following information:

Username: beta
Password: The password you chose during installation.
Log in here: http://beta.drba.org/wp-login.php

We hope you enjoy your new site. Thanks!

--The WordPress Team
https://wordpress.org/


--76E1628056CE.1709020152/vps.com--
