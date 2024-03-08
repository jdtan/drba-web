Return-Path: <>
X-Original-To: beta@vps.com
Delivered-To: beta@vps.com
Received: by vps.com (Postfix)
	id 1FC982FC9CB2; Mon,  4 Mar 2024 08:02:51 +0000 (UTC)
Date: Mon,  4 Mar 2024 08:02:51 +0000 (UTC)
From: MAILER-DAEMON@vps.com (Mail Delivery System)
Subject: Undelivered Mail Returned to Sender
To: beta@vps.com
Auto-Submitted: auto-replied
MIME-Version: 1.0
Content-Type: multipart/report; report-type=delivery-status;
	boundary="8EFC42FC9CB3.1709539371/vps.com"
Content-Transfer-Encoding: 8bit
Message-Id: <20240304080251.1FC982FC9CB2@vps.com>

This is a MIME-encapsulated message.

--8EFC42FC9CB3.1709539371/vps.com
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

<jdtan33+drba_admin@gmail.com>: host gmail-smtp-in.l.google.com[142.251.2.26]
    said: 550-5.7.26 This mail has been blocked because the sender is
    unauthenticated. 550-5.7.26 Gmail requires all senders to authenticate with
    either SPF or DKIM. 550-5.7.26  550-5.7.26  Authentication results:
    550-5.7.26  DKIM = did not pass 550-5.7.26  SPF [vps.com] with ip:
    [195.35.37.55] = did not pass 550-5.7.26  550-5.7.26  For instructions on
    setting up authentication, go to 550 5.7.26
    https://support.google.com/mail/answer/81126#authentication
    a8-20020aa78e88000000b006e5046146f1si7740791pfr.2 - gsmtp (in reply to end
    of DATA command)

--8EFC42FC9CB3.1709539371/vps.com
Content-Description: Delivery report
Content-Type: message/delivery-status

Reporting-MTA: dns; vps.com
X-Postfix-Queue-ID: 8EFC42FC9CB3
X-Postfix-Sender: rfc822; beta@vps.com
Arrival-Date: Mon,  4 Mar 2024 08:02:49 +0000 (UTC)

Final-Recipient: rfc822; jdtan33+drba_admin@gmail.com
Original-Recipient: rfc822;jdtan33+drba_admin@gmail.com
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
    a8-20020aa78e88000000b006e5046146f1si7740791pfr.2 - gsmtp

--8EFC42FC9CB3.1709539371/vps.com
Content-Description: Undelivered Message
Content-Type: message/rfc822
Content-Transfer-Encoding: 8bit

Return-Path: <beta@vps.com>
Received: by vps.com (Postfix, from userid 1029)
	id 8EFC42FC9CB3; Mon,  4 Mar 2024 08:02:49 +0000 (UTC)
To: jdtan33+drba_admin@gmail.com
Subject: New Entry: Contact Form
Date: Mon, 4 Mar 2024 08:02:49 +0000
From: Dharma Realm Buddhist Association <jdtan33+drba_admin@gmail.com>
Reply-To: jdtan33+test@gmail.com
Message-ID: <CF5kRuVxlQUbnjJbtinZZbBLmuS5FwYnHa5Q8vuX3GI@beta.drba.org>
X-Mailer: PHPMailer 6.8.1 (https://github.com/PHPMailer/PHPMailer)
MIME-Version: 1.0
Content-Type: text/html; charset=utf-8
Content-Transfer-Encoding: quoted-printable

<!doctype html>=0A<html lang=3D"en-US">=0A<head>=0A=09<meta http-equiv=3D"C=
ontent-Type" content=3D"text/html; charset=3DUTF-8">=0A=09<meta content=3D"=
width=3Ddevice-width, initial-scale=3D1.0" name=3D"viewport">=0A=09<meta ht=
tp-equiv=3D"X-UA-Compatible" content=3D"IE=3Dedge">=0A=09<meta name=3D"colo=
r-scheme" content=3D"light dark">=0A=09<title>WPForms</title>=0A<style type=
=3D"text/css">/**=0A * Adjusts the display of header images based on the us=
er's preference for dark color schemes.=0A */=0A@media (prefers-color-schem=
e: light) {=0A  .header-wrapper.dark-mode {=0A    display: none !important;=
=0A  }=0A}=0A=0A@media (prefers-color-scheme: dark) {=0A  .header-wrapper.d=
ark-mode {=0A    display: table-row !important;=0A  }=0A  .header-wrapper.d=
ark-mode + .light-mode {=0A    display: none !important;=0A  }=0A}=0A=0A@me=
dia only screen and (max-width: 599px) {=0A  .body-inner {=0A    padding-to=
p: 25px !important;=0A    padding-bottom: 25px !important;=0A  }=0A  .wrapp=
er-inner {=0A    padding: 0 25px 25px 25px !important;=0A  }=0A  .header {=
=0A    padding-bottom: 25px !important;=0A  }=0A  .header .has-image-size-s=
mall img {=0A    max-height: 100px !important;=0A  }=0A  .header .has-image=
-size-medium img {=0A    max-height: 140px !important;=0A  }=0A  .header .h=
as-image-size-large img {=0A    max-height: 180px !important;=0A  }=0A}=0A=
=0A/*# sourceMappingURL=3Ddata:application/json;charset=3Dutf8;base64,eyJ2Z=
XJzaW9uIjozLCJmaWxlIjoiYXNzZXRzL2Nzcy9lbWFpbHMvcGFydGlhbHMvY2xhc3NpY19tZWRp=
YV9xdWVyaWVzLmNzcyIsInNvdXJjZXMiOlsiYXNzZXRzL3Njc3MvZW1haWxzL3BhcnRpYWxzL2N=
sYXNzaWNfbWVkaWFfcXVlcmllcy5zY3NzIiwiYXNzZXRzL3Njc3MvZW1haWxzL3BhcnRpYWxzL1=
9hcHBlYXJhbmNlLnNjc3MiXSwic291cmNlc0NvbnRlbnQiOlsiQGltcG9ydCAnYXBwZWFyYW5jZ=
Sc7XG5cbkBtZWRpYSBvbmx5IHNjcmVlbiBhbmQgKG1heC13aWR0aDogNTk5cHgpIHtcblx0LmJv=
ZHktaW5uZXIge1xuXHRcdHBhZGRpbmctdG9wOiAyNXB4ICFpbXBvcnRhbnQ7XG5cdFx0cGFkZGl=
uZy1ib3R0b206IDI1cHggIWltcG9ydGFudDtcblx0fVxuXG5cdC53cmFwcGVyLWlubmVyIHtcbl=
x0XHRwYWRkaW5nOiAwIDI1cHggMjVweCAyNXB4ICFpbXBvcnRhbnQ7XG5cdH1cblxuXHQuaGVhZ=
GVyIHtcblx0XHRwYWRkaW5nLWJvdHRvbTogMjVweCAhaW1wb3J0YW50O1xuXG5cdFx0Ly8gTWF4=
aW11bSBoZWlnaHQgc2l6ZXMgdG8gc2NhbGUgZG93biB0aGUgaGVhZGVyIGltYWdlLlxuXHRcdCR=
zaXplczpcblx0XHRcdFwic21hbGxcIiAxMDAsXG5cdFx0XHRcIm1lZGl1bVwiIDE0MCxcblx0XH=
RcdFwibGFyZ2VcIiAxODA7XG5cblx0XHRAZWFjaCAkbmFtZSwgJGhlaWdodCBpbiAkc2l6ZXMge=
1xuXHRcdFx0Lmhhcy1pbWFnZS1zaXplLSN7JG5hbWV9IHtcblx0XHRcdFx0aW1nIHtcblx0XHRc=
dFx0XHRtYXgtaGVpZ2h0OiAjeyRoZWlnaHR9cHggIWltcG9ydGFudDtcblx0XHRcdFx0fVxuXHR=
cdFx0fVxuXHRcdH1cblx0fVxufVxuXG4iLCIvKipcbiAqIEFkanVzdHMgdGhlIGRpc3BsYXkgb2=
YgaGVhZGVyIGltYWdlcyBiYXNlZCBvbiB0aGUgdXNlcidzIHByZWZlcmVuY2UgZm9yIGRhcmsgY=
29sb3Igc2NoZW1lcy5cbiAqL1xuQG1lZGlhIChwcmVmZXJzLWNvbG9yLXNjaGVtZTogbGlnaHQp=
IHtcblxuXHQuaGVhZGVyLXdyYXBwZXIge1xuXHRcdCYuZGFyay1tb2RlIHtcblx0XHRcdC8vIEh=
pZGUgdGhlIGRhcmsgaGVhZGVyIGltYWdlLlxuXHRcdFx0ZGlzcGxheTogbm9uZSAhaW1wb3J0YW=
50O1xuXHRcdH1cblx0fVxufVxuXG5AbWVkaWEgKHByZWZlcnMtY29sb3Itc2NoZW1lOiBkYXJrK=
SB7XG5cblx0LmhlYWRlci13cmFwcGVyIHtcblx0XHQmLmRhcmstbW9kZSB7XG5cdFx0XHQvLyBT=
aG93IHRoZSBkYXJrIGhlYWRlciBpbWFnZS5cblx0XHRcdGRpc3BsYXk6IHRhYmxlLXJvdyAhaW1=
wb3J0YW50O1xuXG5cdFx0XHQvLyBIaWRlIHRoZSBsaWdodCBoZWFkZXIgaW1hZ2UuXG5cdFx0XH=
QrIC5saWdodC1tb2RlIHtcblx0XHRcdFx0ZGlzcGxheTogbm9uZSAhaW1wb3J0YW50O1xuXHRcd=
Fx0fVxuXHRcdH1cblx0fVxufVxuIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQ0FBOztHQUVH=
O0FBQ0gsTUFBTSxFQUFFLG9CQUFvQixFQUFFLEtBQUs7RUFFbEMsQUFDQyxlQURjLEFBQ2IsVUF=
BVSxDQUFDO0lBRVgsT0FBTyxFQUFFLGVBQWU7R0FDeEI7OztBQUlILE1BQU0sRUFBRSxvQkFBb0=
IsRUFBRSxJQUFJO0VBRWpDLEFBQ0MsZUFEYyxBQUNiLFVBQVUsQ0FBQztJQUVYLE9BQU8sRUFBR=
SxvQkFBb0I7R0FNN0I7RUFURixBQU1FLGVBTmEsQUFDYixVQUFVLEdBS1IsV0FBVyxDQUFDO0lB=
Q2IsT0FBTyxFQUFFLGVBQWU7R0FDeEI7OztBRHJCSixNQUFNLE1BQU0sTUFBTSxNQUFNLFNBQVM=
sRUFBRSxLQUFLO0VBQ3ZDLEFBQUEsV0FBVyxDQUFDO0lBQ1gsV0FBVyxFQUFFLGVBQWU7SUFDNU=
IsY0FBYyxFQUFFLGVBQWU7R0FDL0I7RUFFRCxBQUFBLGNBQWMsQ0FBQztJQUNkLE9BQU8sRUFBR=
SwyQkFBMkI7R0FDcEM7RUFFRCxBQUFBLE9BQU8sQ0FBQztJQUNQLGNBQWMsRUFBRSxlQUFlO0dB=
ZS9CO0VBaEJELEFBV0csT0FYSSxDQVVMLHFCQUFxQixDQUNwQixHQUFHLENBQUM7SUFDSCxVQUF=
VLEVBQUUsS0FBYyxDQUFDLFVBQVU7R0FDckM7RUFiSixBQVdHLE9BWEksQ0FVTCxzQkFBc0IsQ0=
FDckIsR0FBRyxDQUFDO0lBQ0gsVUFBVSxFQUFFLEtBQWMsQ0FBQyxVQUFVO0dBQ3JDO0VBYkosQ=
UFXRyxPQVhJLENBVUwscUJBQXFCLENBQ3BCLEdBQUcsQ0FBQztJQUNILFVBQVUsRUFBRSxLQUFj=
LENBQUMsVUFBVTtHQUNyQyJ9 */=0A=0A@media (prefers-color-scheme: dark) {=0A=
=09body, .body {=0A=09=09background-color: #2d2f31 !important;=0A=09}=0A=0A=
=09.wrapper-inner {=0A=09=09background-color: #1f1f1f !important;=0A=09=09b=
order: 1px solid #525252 !important;=0A=09}=0A=0A=09body, table.body, h1, h=
2, h3, h4, h5, h6, p, td, th, a {=0A=09=09color: #dddddd !important;=0A=09=
=09font-family: -apple-system, BlinkMacSystemFont, avenir next, avenir, seg=
oe ui, helvetica neue, helvetica, Cantarell, Ubuntu, roboto, noto, arial, s=
ans-serif !important;=0A=09}=0A=0A=09a, a:visited,=0A=09a:hover, a:active,=
=0A=09h1 a, h1 a:visited,=0A=09h2 a, h2 a:visited,=0A=09h3 a, h3 a:visited,=
=0A=09h4 a, h4 a:visited,=0A=09h5 a, h5 a:visited,=0A=09h6 a, h6 a:visited =
{=0A=09=09color: #e27730 !important;=0A=09}=0A=0A=09a.button-link {=0A=09=
=09background-color: #1f1f1f !important;=0A=09=09border: 1px solid #e27730 =
!important;=0A=09=09color: #e27730 !important;=0A=09}=0A=0A=09.content .fie=
ld-value {=0A=09=09border-bottom: 1px solid #3e3e3e !important;=0A=09}=0A=
=0A=09.footer, .footer a {=0A=09=09color: #7a7a7a !important;=0A=09}=0A=0A=
=09=09.dark-mode .header-image {=0A=09=09max-width: 350px !important;=0A=09=
}=0A=09.dark-mode .header-image img {=0A=09=09max-height: 180px !important;=
=0A=09}=0A=09}=0A</style>=0A</head>=0A<body leftmargin=3D"0" marginwidth=3D=
"0" topmargin=3D"0" marginheight=3D"0" offset=3D"0" bgcolor=3D"#e9eaec" sty=
le=3D"height: 100% !important; width: 100% !important; min-width: 100%; -mo=
z-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: borde=
r-box; -webkit-font-smoothing: antialiased !important; -moz-osx-font-smooth=
ing: grayscale !important; -ms-text-size-adjust: 100%; -webkit-text-size-ad=
just: 100%; font-weight: normal; margin: 0; Margin: 0; font-size: 14px; mso=
-line-height-rule: exactly; text-align: center; padding: 0 25px 0 25px; lin=
e-height: 22px; background-color: #e9eaec; color: #333333; font-family: -ap=
ple-system, BlinkMacSystemFont, avenir next, avenir, segoe ui, helvetica ne=
ue, helvetica, Cantarell, Ubuntu, roboto, noto, arial, sans-serif;">=0A<tab=
le border=3D"0" cellpadding=3D"0" cellspacing=3D"0" width=3D"100%" height=
=3D"100%" class=3D"body" role=3D"presentation" style=3D"border-collapse: co=
llapse; border-spacing: 0; vertical-align: top; mso-table-lspace: 0pt; mso-=
table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 10=
0%; height: 100% !important; width: 100% !important; min-width: 100%; -moz-=
box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-=
box; -webkit-font-smoothing: antialiased !important; -moz-osx-font-smoothin=
g: grayscale !important; text-align: center; background-color: #e9eaec; fon=
t-weight: normal; padding: 0; margin: 0; Margin: 0; font-size: 14px; mso-li=
ne-height-rule: exactly; line-height: 22px; color: #333333; font-family: -a=
pple-system, BlinkMacSystemFont, avenir next, avenir, segoe ui, helvetica n=
eue, helvetica, Cantarell, Ubuntu, roboto, noto, arial, sans-serif;">=0A=09=
<tr style=3D"padding: 0; vertical-align: top;">=0A=09=09<td style=3D"word-w=
rap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; =
border-collapse: collapse !important; vertical-align: top; mso-table-lspace=
: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size=
-adjust: 100%; font-weight: normal; padding: 0; margin: 0; Margin: 0; font-=
size: 14px; mso-line-height-rule: exactly; color: #333333; font-family: -ap=
ple-system, BlinkMacSystemFont, avenir next, avenir, segoe ui, helvetica ne=
ue, helvetica, Cantarell, Ubuntu, roboto, noto, arial, sans-serif; line-hei=
ght: 22px;"><!-- Deliberately empty to support consistent sizing and layout=
 across multiple email clients. --></td>=0A=09=09<td align=3D"center" valig=
n=3D"top" class=3D"body-inner" width=3D"660" style=3D"word-wrap: break-word=
; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse=
: collapse !important; vertical-align: top; mso-table-lspace: 0pt; mso-tabl=
e-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; =
font-weight: normal; padding: 0; margin: 0; Margin: 0; font-size: 14px; mso=
-line-height-rule: exactly; color: #333333; font-family: -apple-system, Bli=
nkMacSystemFont, avenir next, avenir, segoe ui, helvetica neue, helvetica, =
Cantarell, Ubuntu, roboto, noto, arial, sans-serif; padding-top: 50px; padd=
ing-bottom: 50px; line-height: 22px;">=0A=09=09=09<div class=3D"wrapper" wi=
dth=3D"100%" dir=3D"ltr" style=3D"max-width: 660px;">=0A=09=09=09=09<table =
border=3D"0" cellpadding=3D"0" cellspacing=3D"0" width=3D"100%" class=3D"co=
ntainer" role=3D"presentation" style=3D"border-collapse: collapse; border-s=
pacing: 0; padding: 0; vertical-align: top; mso-table-lspace: 0pt; mso-tabl=
e-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; =
margin: 0 auto 0 auto; Margin: 0 auto 0 auto;">=0A=09=09=09=09=09=09=09=09=
=09=09=09=09=09=09=09<tr style=3D"padding: 0; vertical-align: top;">=0A=09=
=09=09=09=09=09<td class=3D"wrapper-inner" bgcolor=3D"#ffffff" style=3D"wor=
d-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: aut=
o; border-collapse: collapse !important; vertical-align: top; mso-table-lsp=
ace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-s=
ize-adjust: 100%; font-weight: normal; margin: 0; Margin: 0; font-size: 14p=
x; mso-line-height-rule: exactly; color: #333333; font-family: -apple-syste=
m, BlinkMacSystemFont, avenir next, avenir, segoe ui, helvetica neue, helve=
tica, Cantarell, Ubuntu, roboto, noto, arial, sans-serif; padding: 25px 30p=
x 50px 30px; background-color: #ffffff; border: 1px solid #c6c6c6; line-hei=
ght: 22px;">=0A=09=09=09=09=09=09=09<table border=3D"0" cellpadding=3D"0" c=
ellspacing=3D"0" width=3D"100%" role=3D"presentation" style=3D"border-colla=
pse: collapse; border-spacing: 0; padding: 0; vertical-align: top; mso-tabl=
e-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-t=
ext-size-adjust: 100%;">=0A=09=09=09=09=09=09=09=09<tr style=3D"padding: 0;=
 vertical-align: top;">=0A=09=09=09=09=09=09=09=09=09<td valign=3D"top" cla=
ss=3D"content" style=3D"word-wrap: break-word; -webkit-hyphens: auto; -moz-=
hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertica=
l-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-a=
djust: 100%; -webkit-text-size-adjust: 100%; font-weight: normal; padding: =
0; margin: 0; Margin: 0; font-size: 14px; mso-line-height-rule: exactly; co=
lor: #333333; font-family: -apple-system, BlinkMacSystemFont, avenir next, =
avenir, segoe ui, helvetica neue, helvetica, Cantarell, Ubuntu, roboto, not=
o, arial, sans-serif; line-height: 22px;">=0A=0A<table border=3D"0" cellpad=
ding=3D"0" cellspacing=3D"0" width=3D"100%" role=3D"presentation" style=3D"=
border-collapse: collapse; border-spacing: 0; padding: 0; vertical-align: t=
op; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100=
%; -webkit-text-size-adjust: 100%;">=0A=09<tbody>=0A=09=09=0A<tr style=3D"p=
adding: 0; vertical-align: top;">=0A=09<td class=3D"field-name" style=3D"wo=
rd-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: au=
to; border-collapse: collapse !important; vertical-align: top; mso-table-ls=
pace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-=
size-adjust: 100%; font-weight: normal; padding: 0; margin: 0; Margin: 0; f=
ont-size: 14px; mso-line-height-rule: exactly; color: #333333; font-family:=
 -apple-system, BlinkMacSystemFont, avenir next, avenir, segoe ui, helvetic=
a neue, helvetica, Cantarell, Ubuntu, roboto, noto, arial, sans-serif; line=
-height: 22px; padding-top: 25px; padding-bottom: 7px;"><strong style=3D"ma=
rgin-bottom: 0; Margin-bottom: 0;">Name</strong></td>=0A</tr>=0A<tr class=
=3D"field-name" style=3D"padding: 0; vertical-align: top; padding-top: 25px=
; padding-bottom: 7px;">=0A=09<td class=3D"field-value" style=3D"word-wrap:=
 break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; bord=
er-collapse: collapse !important; vertical-align: top; mso-table-lspace: 0p=
t; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adj=
ust: 100%; font-weight: normal; padding: 0; margin: 0; Margin: 0; font-size=
: 14px; mso-line-height-rule: exactly; color: #333333; font-family: -apple-=
system, BlinkMacSystemFont, avenir next, avenir, segoe ui, helvetica neue, =
helvetica, Cantarell, Ubuntu, roboto, noto, arial, sans-serif; line-height:=
 22px; padding-bottom: 25px; border-bottom: 1px solid #e2e2e2;">first name =
last name</td>=0A</tr>=0A=0A<tr style=3D"padding: 0; vertical-align: top;">=
=0A=09<td class=3D"field-name" style=3D"word-wrap: break-word; -webkit-hyph=
ens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !im=
portant; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt;=
 -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-weight: n=
ormal; padding: 0; margin: 0; Margin: 0; font-size: 14px; mso-line-height-r=
ule: exactly; color: #333333; font-family: -apple-system, BlinkMacSystemFon=
t, avenir next, avenir, segoe ui, helvetica neue, helvetica, Cantarell, Ubu=
ntu, roboto, noto, arial, sans-serif; line-height: 22px; padding-top: 25px;=
 padding-bottom: 7px;"><strong style=3D"margin-bottom: 0; Margin-bottom: 0;=
">Email</strong></td>=0A</tr>=0A<tr class=3D"field-email" style=3D"padding:=
 0; vertical-align: top;">=0A=09<td class=3D"field-value" style=3D"word-wra=
p: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; bo=
rder-collapse: collapse !important; vertical-align: top; mso-table-lspace: =
0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-a=
djust: 100%; font-weight: normal; padding: 0; margin: 0; Margin: 0; font-si=
ze: 14px; mso-line-height-rule: exactly; color: #333333; font-family: -appl=
e-system, BlinkMacSystemFont, avenir next, avenir, segoe ui, helvetica neue=
, helvetica, Cantarell, Ubuntu, roboto, noto, arial, sans-serif; line-heigh=
t: 22px; padding-bottom: 25px; border-bottom: 1px solid #e2e2e2;"><a href=
=3D"mailto:jdtan33+test@gmail.com" style=3D"-ms-text-size-adjust: 100%; -we=
bkit-text-size-adjust: 100%; font-weight: normal; padding: 0; margin: 0; Ma=
rgin: 0; mso-line-height-rule: exactly; line-height: 22px; font-family: -ap=
ple-system, BlinkMacSystemFont, avenir next, avenir, segoe ui, helvetica ne=
ue, helvetica, Cantarell, Ubuntu, roboto, noto, arial, sans-serif; color: #=
e27730; -ms-word-break: break-word; word-break: break-word; margin-bottom: =
0; Margin-bottom: 0;">jdtan33+test@gmail.com</a></td>=0A</tr>=0A=0A<tr styl=
e=3D"padding: 0; vertical-align: top;">=0A=09<td class=3D"field-name" style=
=3D"word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphe=
ns: auto; border-collapse: collapse !important; vertical-align: top; mso-ta=
ble-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit=
-text-size-adjust: 100%; font-weight: normal; padding: 0; margin: 0; Margin=
: 0; font-size: 14px; mso-line-height-rule: exactly; color: #333333; font-f=
amily: -apple-system, BlinkMacSystemFont, avenir next, avenir, segoe ui, he=
lvetica neue, helvetica, Cantarell, Ubuntu, roboto, noto, arial, sans-serif=
; line-height: 22px; padding-top: 25px; padding-bottom: 7px;"><strong style=
=3D"margin-bottom: 0; Margin-bottom: 0;">Comment or Message</strong></td>=
=0A</tr>=0A<tr class=3D"field-textarea" style=3D"padding: 0; vertical-align=
: top;">=0A=09<td class=3D"field-value" style=3D"word-wrap: break-word; -we=
bkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: col=
lapse !important; vertical-align: top; mso-table-lspace: 0pt; mso-table-rsp=
ace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-=
weight: normal; padding: 0; margin: 0; Margin: 0; font-size: 14px; mso-line=
-height-rule: exactly; color: #333333; font-family: -apple-system, BlinkMac=
SystemFont, avenir next, avenir, segoe ui, helvetica neue, helvetica, Canta=
rell, Ubuntu, roboto, noto, arial, sans-serif; line-height: 22px; padding-b=
ottom: 25px; border-bottom: 1px solid #e2e2e2;">test message</td>=0A</tr>=
=0A=09</tbody>=0A</table>=0A=0A=09=09=09=09=09=09=09=09=09</td>=0A=09=09=09=
=09=09=09=09=09</tr>=0A=09=09=09=09=09=09=09=09<tr style=3D"padding: 0; ver=
tical-align: top;">=0A=09=09=09=09=09=09=09=09=09<td align=3D"center" valig=
n=3D"top" class=3D"footer" style=3D"word-wrap: break-word; -webkit-hyphens:=
 auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !import=
ant; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -ms=
-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-weight: norma=
l; padding: 0; margin: 0; Margin: 0; mso-line-height-rule: exactly; font-fa=
mily: -apple-system, BlinkMacSystemFont, avenir next, avenir, segoe ui, hel=
vetica neue, helvetica, Cantarell, Ubuntu, roboto, noto, arial, sans-serif;=
 font-size: 12px; text-align: center; padding-top: 25px; color: #999999; li=
ne-height: 22px;">=0A=09=09=09=09=09=09=09=09=09=09Sent from <a href=3D"htt=
p://beta.drba.org" style=3D"-ms-text-size-adjust: 100%; -webkit-text-size-a=
djust: 100%; font-weight: normal; padding: 0; margin: 0; Margin: 0; mso-lin=
e-height-rule: exactly; line-height: 22px; font-family: -apple-system, Blin=
kMacSystemFont, avenir next, avenir, segoe ui, helvetica neue, helvetica, C=
antarell, Ubuntu, roboto, noto, arial, sans-serif; text-decoration: underli=
ne; color: #999999;">Dharma Realm Buddhist Association</a>=09=09=09=09=09=
=09=09=09=09</td>=0A=09=09=09=09=09=09=09=09</tr>=0A=09=09=09=09=09=09=09</=
table>=0A=09=09=09=09=09=09</td>=0A=09=09=09=09=09</tr>=0A=09=09=09=09</tab=
le>=0A=09=09=09</div>=0A=09=09</td>=0A=09=09<td style=3D"word-wrap: break-w=
ord; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-colla=
pse: collapse !important; vertical-align: top; mso-table-lspace: 0pt; mso-t=
able-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100=
%; font-weight: normal; padding: 0; margin: 0; Margin: 0; font-size: 14px; =
mso-line-height-rule: exactly; color: #333333; font-family: -apple-system, =
BlinkMacSystemFont, avenir next, avenir, segoe ui, helvetica neue, helvetic=
a, Cantarell, Ubuntu, roboto, noto, arial, sans-serif; line-height: 22px;">=
<!-- Deliberately empty to support consistent sizing and layout across mult=
iple email clients. --></td>=0A=09</tr>=0A</table>=0A</body>=0A</html>

--8EFC42FC9CB3.1709539371/vps.com--
