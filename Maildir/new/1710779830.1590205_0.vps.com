Return-Path: <>
X-Original-To: beta@vps.com
Delivered-To: beta@vps.com
Received: by vps.com (Postfix)
	id 9CFDA2FC9D34; Mon, 18 Mar 2024 16:37:09 +0000 (UTC)
Date: Mon, 18 Mar 2024 16:37:09 +0000 (UTC)
From: MAILER-DAEMON@vps.com (Mail Delivery System)
Subject: Undelivered Mail Returned to Sender
To: beta@vps.com
Auto-Submitted: auto-replied
MIME-Version: 1.0
Content-Type: multipart/report; report-type=delivery-status;
	boundary="73F912FC9D35.1710779829/vps.com"
Content-Transfer-Encoding: 8bit
Message-Id: <20240318163709.9CFDA2FC9D34@vps.com>

This is a MIME-encapsulated message.

--73F912FC9D35.1710779829/vps.com
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
    k1-20020aa788c1000000b006e7243bbda7si2938367pff.367 - gsmtp (in reply to
    end of DATA command)

--73F912FC9D35.1710779829/vps.com
Content-Description: Delivery report
Content-Type: message/delivery-status

Reporting-MTA: dns; vps.com
X-Postfix-Queue-ID: 73F912FC9D35
X-Postfix-Sender: rfc822; beta@vps.com
Arrival-Date: Mon, 18 Mar 2024 16:37:08 +0000 (UTC)

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
    k1-20020aa788c1000000b006e7243bbda7si2938367pff.367 - gsmtp

--73F912FC9D35.1710779829/vps.com
Content-Description: Undelivered Message
Content-Type: message/rfc822
Content-Transfer-Encoding: 8bit

Return-Path: <beta@vps.com>
Received: by vps.com (Postfix, from userid 1029)
	id 73F912FC9D35; Mon, 18 Mar 2024 16:37:08 +0000 (UTC)
To: jdtan33@gmail.com
Subject: Your Weekly WPForms Summary for beta.drba.org
Date: Mon, 18 Mar 2024 16:37:08 +0000
From: Dharma Realm Buddhist Association <jdtan33@gmail.com>
Reply-To: jdtan33@gmail.com
Message-ID: <YdL2RoDn6X05FrNBMYGHqgJGfhU4TXwwPB4D8NY92c@beta.drba.org>
X-Mailer: PHPMailer 6.8.1 (https://github.com/PHPMailer/PHPMailer)
MIME-Version: 1.0
Content-Type: text/html; charset=utf-8
Content-Transfer-Encoding: quoted-printable

<!doctype html>=0A<html lang=3D"en">=0A<head>=0A=09<meta http-equiv=3D"Cont=
ent-Type" content=3D"text/html; charset=3DUTF-8">=0A=09<meta http-equiv=3D"=
X-UA-Compatible" content=3D"IE=3Dedge">=0A=09<meta name=3D"viewport" conten=
t=3D"width=3Ddevice-width">=0A=09<title>WPForms</title>=0A<style type=3D"te=
xt/css">a {=0A  text-decoration: none;=0A}=0A=0A@media only screen and (max=
-width: 599px) {=0A  table.body .container {=0A    width: 95% !important;=
=0A  }=0A  .header {=0A    padding: 15px 15px 12px 15px !important;=0A  }=
=0A  .header img {=0A    width: 200px !important;=0A    height: auto !impor=
tant;=0A  }=0A  .content,=0A  .aside {=0A    padding: 30px 40px 20px 40px !=
important;=0A  }=0A  .upsell-pro table.features td {=0A    width: 100% !imp=
ortant;=0A    display: block !important;=0A  }=0A  table.receipt-details td=
.receipt-details-inner {=0A    padding: 30px 0px 20px 0px !important;=0A  }=
=0A}=0A=0A/*# sourceMappingURL=3Ddata:application/json;charset=3Dutf8;base6=
4,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiYXNzZXRzL2Nzcy9lbWFpbHMvcGFydGlhbHMvbWVkaWFfc=
XVlcmllcy5jc3MiLCJzb3VyY2VzIjpbImFzc2V0cy9zY3NzL2VtYWlscy9wYXJ0aWFscy9tZWRp=
YV9xdWVyaWVzLnNjc3MiXSwic291cmNlc0NvbnRlbnQiOlsiYSB7XG5cdHRleHQtZGVjb3JhdGl=
vbjogbm9uZTsgLy8gVGhpcyBvbmUgaXMgbmVlZGVkIGZvciBPdXRsb29rIGNvbXBhdGliaWxpdH=
kuXG59XG5cbkBtZWRpYSBvbmx5IHNjcmVlbiBhbmQgKG1heC13aWR0aDogNTk5cHgpIHtcblxuX=
HR0YWJsZS5ib2R5IC5jb250YWluZXIge1xuXHRcdHdpZHRoOiA5NSUgIWltcG9ydGFudDtcblx0=
fVxuXG5cdC5oZWFkZXIge1xuXHRcdHBhZGRpbmc6IDE1cHggMTVweCAxMnB4IDE1cHggIWltcG9=
ydGFudDtcblx0fVxuXG5cdC5oZWFkZXIgaW1nIHtcblx0XHR3aWR0aDogMjAwcHggIWltcG9ydG=
FudDtcblx0XHRoZWlnaHQ6IGF1dG8gIWltcG9ydGFudDtcblx0fVxuXG5cdC5jb250ZW50LFxuX=
HQuYXNpZGUge1xuXHRcdHBhZGRpbmc6IDMwcHggNDBweCAyMHB4IDQwcHggIWltcG9ydGFudDtc=
blx0fVxuXG5cdC51cHNlbGwtcHJvIHRhYmxlLmZlYXR1cmVzIHRkIHtcblx0XHR3aWR0aDogMTA=
wJSAhaW1wb3J0YW50O1xuXHRcdGRpc3BsYXk6IGJsb2NrICFpbXBvcnRhbnQ7XG5cdH1cblxuXH=
R0YWJsZS5yZWNlaXB0LWRldGFpbHMgdGQucmVjZWlwdC1kZXRhaWxzLWlubmVyIHtcblx0XHRwY=
WRkaW5nOiAzMHB4IDBweCAyMHB4IDBweCAhaW1wb3J0YW50O1xuXHR9XG59XG4iXSwibmFtZXMi=
OltdLCJtYXBwaW5ncyI6IkFBQUEsQUFBQSxDQUFDLENBQUM7RUFDRCxlQUFlLEVBQUUsSUFBSTt=
DQUNyQjs7QUFFRCxNQUFNLE1BQU0sTUFBTSxNQUFNLFNBQVMsRUFBRSxLQUFLO0VBRXZDLEFBQU=
EsS0FBSyxBQUFBLEtBQUssQ0FBQyxVQUFVLENBQUM7SUFDckIsS0FBSyxFQUFFLGNBQWM7R0FDc=
kI7RUFFRCxBQUFBLE9BQU8sQ0FBQztJQUNQLE9BQU8sRUFBRSw4QkFBOEI7R0FDdkM7RUFFRCxB=
QUFBLE9BQU8sQ0FBQyxHQUFHLENBQUM7SUFDWCxLQUFLLEVBQUUsZ0JBQWdCO0lBQ3ZCLE1BQU0=
sRUFBRSxlQUFlO0dBQ3ZCO0VBRUQsQUFBQSxRQUFRO0VBQ1IsTUFBTSxDQUFDO0lBQ04sT0FBTy=
xFQUFFLDhCQUE4QjtHQUN2QztFQUVELEFBQUEsV0FBVyxDQUFDLEtBQUssQUFBQSxTQUFTLENBQ=
UMsRUFBRSxDQUFDO0lBQzdCLEtBQUssRUFBRSxlQUFlO0lBQ3RCLE9BQU8sRUFBRSxnQkFBZ0I7=
R0FDekI7RUFFRCxBQUFBLEtBQUssQUFBQSxnQkFBZ0IsQ0FBQyxFQUFFLEFBQUEsc0JBQXNCLEN=
BQUM7SUFDOUMsT0FBTyxFQUFFLDRCQUE0QjtHQUNyQyJ9 */=0A</style>=0A</head>=0A<bo=
dy style=3D"height: 100% !important; width: 100% !important; min-width: 100=
%; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing:=
 border-box; -webkit-font-smoothing: antialiased !important; -moz-osx-font-=
smoothing: grayscale !important; -ms-text-size-adjust: 100%; -webkit-text-s=
ize-adjust: 100%; color: #444444; font-family: 'Helvetica Neue', Helvetica,=
 Arial, sans-serif; font-weight: normal; padding: 0; margin: 0; Margin: 0; =
font-size: 14px; mso-line-height-rule: exactly; line-height: 140%; text-ali=
gn: center; background-color: #e9eaec;">=0A<table border=3D"0" cellpadding=
=3D"0" cellspacing=3D"0" width=3D"100%" height=3D"100%" class=3D"body" styl=
e=3D"border-collapse: collapse; border-spacing: 0; vertical-align: top; mso=
-table-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -web=
kit-text-size-adjust: 100%; height: 100% !important; width: 100% !important=
; min-width: 100%; -moz-box-sizing: border-box; -webkit-box-sizing: border-=
box; box-sizing: border-box; -webkit-font-smoothing: antialiased !important=
; -moz-osx-font-smoothing: grayscale !important; text-align: center; backgr=
ound-color: #e9eaec; color: #444444; font-family: 'Helvetica Neue', Helveti=
ca, Arial, sans-serif; font-weight: normal; padding: 0; margin: 0; Margin: =
0; font-size: 14px; mso-line-height-rule: exactly; line-height: 140%;">=0A=
=09<tr style=3D"padding: 0; vertical-align: top;">=0A=09=09<td align=3D"cen=
ter" valign=3D"top" class=3D"body-inner" style=3D"word-wrap: break-word; -w=
ebkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: co=
llapse !important; vertical-align: top; mso-table-lspace: 0pt; mso-table-rs=
pace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; colo=
r: #444444; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; fo=
nt-weight: normal; padding: 0; margin: 0; Margin: 0; font-size: 14px; mso-l=
ine-height-rule: exactly; line-height: 140%; text-align: center;">=0A=09=09=
=09<table border=3D"0" cellpadding=3D"0" cellspacing=3D"0" class=3D"contain=
er" style=3D"border-collapse: collapse; border-spacing: 0; padding: 0; vert=
ical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-siz=
e-adjust: 100%; -webkit-text-size-adjust: 100%; width: 600px; margin: 0 aut=
o 0 auto; Margin: 0 auto 0 auto; text-align: inherit;">=0A=09=09=09=09<tr s=
tyle=3D"padding: 0; vertical-align: top;">=0A=09=09=09=09=09<td align=3D"ce=
nter" valign=3D"middle" class=3D"header" style=3D"word-wrap: break-word; -w=
ebkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: co=
llapse !important; vertical-align: top; mso-table-lspace: 0pt; mso-table-rs=
pace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; colo=
r: #444444; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; fo=
nt-weight: normal; margin: 0; Margin: 0; font-size: 14px; mso-line-height-r=
ule: exactly; line-height: 140%; text-align: center; padding: 30px 30px 22p=
x 30px;">=0A=09=09=09=09=09=09=09=09=09=09=09=09=09<img src=3D"http://beta.=
drba.org/wp-content/plugins/wpforms-lite/assets/images/logo.png" width=3D"2=
50" alt=3D"Dharma Realm Buddhist Association" style=3D"outline: none; text-=
decoration: none; width: auto; clear: both; -ms-interpolation-mode: bicubic=
; display: inline-block !important; max-width: 45%px;">=0A=09=09=09=09=09=
=09=09=09=09=09=09</td>=0A=09=09=09=09</tr>=0A=09=09=09=09<tr style=3D"padd=
ing: 0; vertical-align: top;">=0A=09=09=09=09=09<td align=3D"left" valign=
=3D"top" class=3D"content" style=3D"word-wrap: break-word; -webkit-hyphens:=
 auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !import=
ant; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -ms=
-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #444444; fo=
nt-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-weight: nor=
mal; margin: 0; Margin: 0; font-size: 14px; mso-line-height-rule: exactly; =
line-height: 140%; background-color: #ffffff; padding: 60px 75px 45px 75px;=
 border-top: 3px solid #e27730; border-right: 1px solid #dddddd; border-bot=
tom: 1px solid #dddddd; border-left: 1px solid #dddddd;">=0A=0A<table class=
=3D"summary-container" style=3D"border-collapse: collapse; border-spacing: =
0; padding: 0; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace=
: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; width: 1=
00%;">=0A=09<tbody>=0A=09<tr style=3D"padding: 0; vertical-align: top;">=0A=
=09=09<td style=3D"word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphe=
ns: auto; hyphens: auto; border-collapse: collapse !important; vertical-ali=
gn: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust=
: 100%; -webkit-text-size-adjust: 100%; font-family: 'Helvetica Neue', Helv=
etica, Arial, sans-serif; font-weight: normal; padding: 0; margin: 0; Margi=
n: 0; font-size: 14px; mso-line-height-rule: exactly; line-height: 140%; co=
lor: #777777;">=0A=09=09=09<h6 class=3D"greeting" style=3D"padding: 0; word=
-wrap: normal; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;=
 font-weight: bold; mso-line-height-rule: exactly; line-height: 130%; font-=
size: 18px; color: #444444; margin: 0 0 3px 0; Margin: 0 0 3px 0;">Hi there=
!</h6>=0A=09=09=09=09=09=09=09<p class=3D"large" style=3D"-ms-text-size-adj=
ust: 100%; -webkit-text-size-adjust: 100%; font-family: 'Helvetica Neue', H=
elvetica, Arial, sans-serif; font-weight: normal; padding: 0; mso-line-heig=
ht-rule: exactly; line-height: 140%; margin: 0 0 15px 0; Margin: 0 0 15px 0=
; overflow-wrap: break-word; word-wrap: break-word; -ms-word-break: break-a=
ll; word-break: break-all; -ms-hyphens: auto; -moz-hyphens: auto; -webkit-h=
yphens: auto; hyphens: auto; font-size: 16px; color: #777777;">Let=E2=80=
=99s see how your forms performed.</p>=0A=09=09=09=09<p class=3D"lite-discl=
aimer" style=3D"-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;=
 font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-weight: =
normal; padding: 0; mso-line-height-rule: exactly; line-height: 140%; overf=
low-wrap: break-word; word-wrap: break-word; -ms-word-break: break-all; wor=
d-break: break-all; -ms-hyphens: auto; -moz-hyphens: auto; -webkit-hyphens:=
 auto; hyphens: auto; color: #777777; font-size: 14px; margin: 25px 0 25px =
0; Margin: 25px 0 25px 0;">=0A=09=09=09=09=09Below is the total number of s=
ubmissions for each form. However, form entries are not stored by WPForms L=
ite.=09=09=09=09</p>=0A=0A=09=09=09=09=09=09=09=09=09=09<p class=3D"lite-di=
sclaimer" style=3D"-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 10=
0%; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-weigh=
t: normal; padding: 0; mso-line-height-rule: exactly; line-height: 140%; ov=
erflow-wrap: break-word; word-wrap: break-word; -ms-word-break: break-all; =
word-break: break-all; -ms-hyphens: auto; -moz-hyphens: auto; -webkit-hyphe=
ns: auto; hyphens: auto; color: #777777; font-size: 14px; margin: 25px 0 25=
px 0; Margin: 25px 0 25px 0;">=0A=09=09=09=09=09=09=09<strong>Note: Entry b=
ackups are not enabled.</strong><br>=0A=09=09=09=09=09=09=09We recommend th=
at you enable entry backups to guard against lost entries.=09=09=09=09=09=
=09</p>=0A=09=09=09=09=09=09<p class=3D"lite-disclaimer" style=3D"-ms-text-=
size-adjust: 100%; -webkit-text-size-adjust: 100%; font-family: 'Helvetica =
Neue', Helvetica, Arial, sans-serif; font-weight: normal; padding: 0; mso-l=
ine-height-rule: exactly; line-height: 140%; overflow-wrap: break-word; wor=
d-wrap: break-word; -ms-word-break: break-all; word-break: break-all; -ms-h=
yphens: auto; -moz-hyphens: auto; -webkit-hyphens: auto; hyphens: auto; col=
or: #777777; font-size: 14px; margin: 25px 0 25px 0; Margin: 25px 0 25px 0;=
">=0A=09=09=09=09=09=09=09Backups are completely free, 100% secure, and you=
 can turn them on in a few clicks! <a href=3D"https://wpforms.com/docs/how-=
to-use-lite-connect-for-wpforms/?utm_source=3DWordPress&amp;utm_medium=3DWe=
ekly%20Summary%20Email&amp;utm_campaign=3Dliteplugin&amp;utm_content=3DDocu=
mentation#backup-with-lite-connect" target=3D"_blank" rel=3D"noopener noref=
errer" style=3D"-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;=
 font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-weight: =
normal; padding: 0; mso-line-height-rule: exactly; line-height: 140%; Margi=
n: inherit; margin: inherit; color: inherit; text-decoration: underline;">E=
nable entry backups now.</a>=09=09=09=09=09=09</p>=0A=09=09=09=09=09=09<p c=
lass=3D"lite-disclaimer" style=3D"-ms-text-size-adjust: 100%; -webkit-text-=
size-adjust: 100%; font-family: 'Helvetica Neue', Helvetica, Arial, sans-se=
rif; font-weight: normal; padding: 0; mso-line-height-rule: exactly; line-h=
eight: 140%; overflow-wrap: break-word; word-wrap: break-word; -ms-word-bre=
ak: break-all; word-break: break-all; -ms-hyphens: auto; -moz-hyphens: auto=
; -webkit-hyphens: auto; hyphens: auto; color: #777777; font-size: 14px; ma=
rgin: 25px 0 25px 0; Margin: 25px 0 25px 0;">=0A=09=09=09=09=09=09=09When y=
ou=E2=80=99re ready to manage your entries inside WordPress, <a href=3D"htt=
ps://wpforms.com/lite-upgrade/?utm_source=3DWordPress&amp;utm_medium=3DWeek=
ly%20Summary%20Email&amp;utm_campaign=3Dliteplugin&amp;utm_content=3DUpgrad=
e&amp;utm_locale=3Den_US" target=3D"_blank" rel=3D"noopener noreferrer" sty=
le=3D"-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-fami=
ly: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-weight: normal; pa=
dding: 0; mso-line-height-rule: exactly; line-height: 140%; Margin: inherit=
; margin: inherit; color: inherit; text-decoration: underline;">upgrade to =
Pro</a> to import your entries.=09=09=09=09=09=09</p>=0A=09=09=09=09=0A=09=
=09=09=09=09=09<table class=3D"email-summaries" style=3D"border-collapse: c=
ollapse; border-spacing: 0; padding: 0; vertical-align: top; mso-table-lspa=
ce: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-si=
ze-adjust: 100%; width: 100%; margin: 38px 0 0 0; Margin: 38px 0 0 0;">=0A=
=09=09=09=09<thead>=0A=09=09=09=09<tr style=3D"padding: 0; vertical-align: =
top;">=0A=09=09=09=09=09<th style=3D"font-family: 'Helvetica Neue', Helveti=
ca, Arial, sans-serif; margin: 0; Margin: 0; font-size: 14px; mso-line-heig=
ht-rule: exactly; line-height: 140%; font-weight: 700; color: #777777; back=
ground: #f1f1f1; border: 1px solid #f1f1f1; padding: 17px 20px 17px 20px;">=
Form</th>=0A=09=09=09=09=09<th class=3D"entries-column text-center" style=
=3D"font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; margin: 0;=
 Margin: 0; font-size: 14px; mso-line-height-rule: exactly; line-height: 14=
0%; text-align: center; font-weight: 700; color: #777777; background: #f1f1=
f1; border: 1px solid #f1f1f1; padding: 17px 20px 17px 20px; width: 1px; wh=
ite-space: nowrap;">Entries</th>=0A=09=09=09=09</tr>=0A=09=09=09=09</thead>=
=0A=09=09=09=09<tbody>=0A=0A=09=09=09=09=09=09=09=09=09<tr style=3D"padding=
: 0; vertical-align: top;">=0A=09=09=09=09=09=09<td class=3D"text-large" st=
yle=3D"word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hy=
phens: auto; border-collapse: collapse !important; vertical-align: top; mso=
-table-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -web=
kit-text-size-adjust: 100%; font-family: 'Helvetica Neue', Helvetica, Arial=
, sans-serif; font-weight: normal; margin: 0; Margin: 0; mso-line-height-ru=
le: exactly; line-height: 140%; font-size: 16px; border-top: none; border-r=
ight: none; border-bottom: 1px solid #f1f1f1; border-left: none; color: #44=
4444; padding: 17px 20px 17px 20px;">Contact Form</td>=0A=09=09=09=09=09=09=
<td class=3D"entry-count text-large" style=3D"word-wrap: break-word; -webki=
t-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collap=
se !important; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace=
: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-fam=
ily: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-weight: normal; m=
argin: 0; Margin: 0; mso-line-height-rule: exactly; line-height: 140%; font=
-size: 16px; border-top: none; border-right: none; border-bottom: 1px solid=
 #f1f1f1; border-left: none; padding: 17px 20px 17px 20px; text-align: cent=
er; color: #e27730;">=0A=09=09=09=09=09=09=09=09=09=09=09=09=09=09=09<span =
style=3D"color: #e27730; text-align: center;">=0A=09=09=09=09=09=09=09=09=
=092=09=09=09=09=09=09=09=09</span>=0A=09=09=09=09=09=09=09=09=09=09=09=09=
=09</td>=0A=09=09=09=09=09</tr>=0A=09=09=09=09=0A=09=09=09=09=0A=09=09=09=
=09</tbody>=0A=09=09=09</table>=0A=0A=0A=09=09=09=09=09</td>=0A=09</tr>=0A=
=09</tbody>=0A</table>=0A=0A=09=09=09=09=09</td>=0A=09=09=09=09</tr>=0A=09=
=09=09=09<tr style=3D"padding: 0; vertical-align: top;">=0A=09=09=09=09=09<=
td align=3D"center" valign=3D"top" class=3D"footer" style=3D"word-wrap: bre=
ak-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-c=
ollapse: collapse !important; vertical-align: top; mso-table-lspace: 0pt; m=
so-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust:=
 100%; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-we=
ight: normal; margin: 0; Margin: 0; mso-line-height-rule: exactly; line-hei=
ght: 140%; padding: 30px; color: #72777c; font-size: 12px; text-align: cent=
er;">=0A=09=09=09=09=09=09This email was auto-generated and sent from <a hr=
ef=3D"http://beta.drba.org" style=3D"-ms-text-size-adjust: 100%; -webkit-te=
xt-size-adjust: 100%; font-family: 'Helvetica Neue', Helvetica, Arial, sans=
-serif; font-weight: normal; padding: 0; margin: 0; Margin: 0; mso-line-hei=
ght-rule: exactly; line-height: 140%; color: #72777c; text-decoration: unde=
rline;">Dharma Realm Buddhist Association</a>. Learn <a href=3D"https://wpf=
orms.com/docs/how-to-use-email-summaries/#faq" style=3D"-ms-text-size-adjus=
t: 100%; -webkit-text-size-adjust: 100%; font-family: 'Helvetica Neue', Hel=
vetica, Arial, sans-serif; font-weight: normal; padding: 0; margin: 0; Marg=
in: 0; mso-line-height-rule: exactly; line-height: 140%; color: #72777c; te=
xt-decoration: underline;">how to disable</a>.=09=09=09=09=09</td>=0A=09=09=
=09=09</tr>=0A=09=09=09</table>=0A=09=09</td>=0A=09</tr>=0A</table>=0A</bod=
y>=0A</html>

--73F912FC9D35.1710779829/vps.com--
