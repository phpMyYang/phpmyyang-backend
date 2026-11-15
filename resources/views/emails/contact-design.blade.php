<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Client Inquiry</title>
</head>
<body style="margin: 0; padding: 40px 16px; background-color: #e5e7eb; font-family: 'Courier New', Courier, 'Lucida Sans Typewriter', monospace; color: #1e293b; -webkit-font-smoothing: antialiased;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #e5e7eb;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width: 620px; background-color: #fcfbf7; border: 1px solid #d1d5db; border-top: 6px solid #FE7743; box-shadow: 0 8px 24px rgba(39, 63, 79, 0.12);">
                    
                    <tr>
                        <td style="background-color: #273F4F; padding: 26px 32px; border-bottom: 3px double #FE7743;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td align="left" style="vertical-align: middle;">
                                        <div style="font-family: 'Courier New', Courier, monospace; font-size: 11px; color: #FE7743; letter-spacing: 2px; text-transform: uppercase; font-weight: bold;">
                                            // INCOMING TRANSMISSION
                                        </div>
                                        <div style="font-family: 'Courier New', Courier, monospace; font-size: 20px; color: #ffffff; font-weight: bold; letter-spacing: 1px; margin-top: 6px;">
                                            CLIENT INQUIRY DOSSIER
                                        </div>
                                    </td>
                                    <td align="right" style="vertical-align: top;">
                                        <span style="display: inline-block; font-family: 'Courier New', Courier, monospace; font-size: 11px; color: #fcfbf7; border: 1px solid #FE7743; padding: 4px 8px; letter-spacing: 1px; background-color: rgba(254, 119, 67, 0.15);">
                                            VERIFIED
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 32px;">
                            <p style="font-family: 'Courier New', Courier, monospace; font-size: 14px; line-height: 1.6; color: #334155; margin: 0 0 24px 0;">
                                ATTN: <strong style="color: #111827; background-color: #f1efe7; padding: 2px 6px;">JEREMIAH LOPENA</strong><br>
                                <span style="font-size: 13px; color: #64748b;">A new inquiry has been logged via your portfolio terminal.</span>
                            </p>

                            <div style="border-top: 1px dashed #94a3b8; margin-bottom: 20px;"></div>

                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-bottom: 20px; font-family: 'Courier New', Courier, monospace; font-size: 14px;">
                                <tr>
                                    <td width="28%" style="padding: 8px 0; color: #64748b; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; vertical-align: top;">
                                        [SENDER]
                                    </td>
                                    <td width="72%" style="padding: 8px 0; color: #0f172a; font-weight: bold; vertical-align: top;">
                                        {{ $contactData['name'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td width="28%" style="padding: 8px 0; color: #64748b; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; vertical-align: top;">
                                        [REPLY-TO]
                                    </td>
                                    <td width="72%" style="padding: 8px 0; vertical-align: top;">
                                        <a href="mailto:{{ $contactData['email'] }}" style="color: #FE7743; text-decoration: underline; font-weight: bold;">
                                            {{ $contactData['email'] }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="28%" style="padding: 8px 0; color: #64748b; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; vertical-align: top;">
                                        [ORIGIN]
                                    </td>
                                    <td width="72%" style="padding: 8px 0; color: #334155; vertical-align: top;">
                                        phpMyYang Portfolio API
                                    </td>
                                </tr>
                            </table>

                            <div style="border-top: 1px dashed #94a3b8; margin-bottom: 24px;"></div>

                            <div style="font-family: 'Courier New', Courier, monospace; font-size: 12px; font-weight: bold; color: #273F4F; text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 10px;">
                                // MESSAGE TRANSCRIPT:
                            </div>

                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td style="background-color: #f4f1ea; border-left: 4px solid #273F4F; border-top: 1px solid #e2ddd3; border-right: 1px solid #e2ddd3; border-bottom: 1px solid #e2ddd3; padding: 22px; font-family: 'Courier New', Courier, monospace; font-size: 15px; line-height: 1.75; color: #1e293b;">
                                        {!! nl2br(e($contactData['message'])) !!}
                                    </td>
                                </tr>
                            </table>

                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top: 28px;">
                                <tr>
                                    <td align="right">
                                        <a href="mailto:{{ $contactData['email'] }}?subject=Re:%20Inquiry%20from%20phpMyYang%20Portfolio" style="display: inline-block; background-color: #273F4F; color: #ffffff; font-family: 'Courier New', Courier, monospace; font-size: 13px; font-weight: bold; text-decoration: none; padding: 12px 22px; border-bottom: 3px solid #FE7743; letter-spacing: 1px; text-transform: uppercase;">
                                            REPLY TO SENDER &rarr;
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="background-color: #f4f1ea; padding: 18px 32px; border-top: 1px solid #e2ddd3; text-align: center;">
                            <p style="margin: 0; font-family: 'Courier New', Courier, monospace; font-size: 11px; color: #64748b; letter-spacing: 0.5px;">
                                END OF DOCUMENT // AUTHENTICATED BY <strong style="color: #273F4F;">PHPMYYANG</strong>
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>