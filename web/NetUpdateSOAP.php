<?php

function initialize()
{
    global $hdrs, $soapreq_data;
    $soapreq_data = file_get_contents("php://input");
    $hdrs = ['SOAPAction: "urn:nus.wsapi.broadon.com/GetSystemUpdate"', 'Content-Type: application/xml', 'Content-Size: ' . strlen($soapreq_data)];
}

function init_curl()
{
    global $curl_handle;
    $curl_handle = curl_init();
}

function close_curl()
{
    global $curl_handle;
    curl_close($curl_handle);
}

function send_httprequest($url)
{
    global $hdrs, $httpstat, $soapreq_data, $curl_handle;

    curl_setopt($curl_handle, CURLOPT_VERBOSE, true);
    curl_setopt($curl_handle, CURLOPT_USERAGENT, "CTR EC 040600 Mar 14 2012 13:32:39");
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $hdrs);
    curl_setopt($curl_handle, CURLOPT_POST, 1);
    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $soapreq_data);
    curl_setopt($curl_handle, CURLOPT_URL, $url);

    $buf = curl_exec($curl_handle);
    $errorstr = "";
    $httpstat = curl_getinfo($curl_handle, CURLINFO_HTTP_CODE);

    if ($buf === false) {
        $errorstr = "HTTP request failed: " . curl_error($curl_handle);
        $httpstat = "0";
    } else {
        if ($httpstat != "200") {
            $errorstr = "HTTP error $httpstat: " . curl_error($curl_handle);
        }
    }

    if ($errorstr != "") {
        $buf = $errorstr;
    }

    return $buf;
}

$SOAPAction = $_SERVER['HTTP_SOAPACTION'];
$SOAPAction_prefix = "urn:nus.wsapi.broadon.com/";
$reply_TitleHash = "00000000000000000000000000000000";
$soapdata = "";

if ($SOAPAction === $SOAPAction_prefix . "GetSystemTitleHash") {
    $GetSystemTitleHashResponse = "<?xml version=\"1.0\" encoding=\"utf-8\"?><soapenv:Envelope xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"><soapenv:Body><GetSystemTitleHashResponse xmlns=\"urn:nus.wsapi.broadon.com\"><Version>1.0</Version><DeviceId></DeviceId><MessageId></MessageId><TimeStamp></TimeStamp><ErrorCode>0</ErrorCode><TitleHash>$reply_TitleHash</TitleHash></GetSystemTitleHashResponse></soapenv:Body></soapenv:Envelope>";
    echo $GetSystemTitleHashResponse;
} elseif ($SOAPAction === $SOAPAction_prefix . "GetSystemUpdate") {
    $GetSystemUpdateResponse = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><soapenv:Envelope xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"><soapenv:Body><GetSystemUpdateResponse xmlns=\"urn:nus.wsapi.broadon.com\"><Version>1.0</Version><DeviceId></DeviceId><MessageId>1</MessageId><TimeStamp></TimeStamp><ErrorCode>0</ErrorCode><ContentPrefixURL>http://nus.cdn.c.shop.nintendowifi.net/ccs/download</ContentPrefixURL><UncachedContentPrefixURL>https://ccs.c.shop.nintendowifi.net/ccs/download</UncachedContentPrefixURL><TitleVersion><TitleId>0004003000008A02</TitleId><Version>0</Version><FsSize>262144</FsSize><TicketSize>848</TicketSize><TMDSize>4660</TMDSize></TitleVersion><UploadAuditData>1</UploadAuditData><TitleHash>$reply_TitleHash</TitleHash></GetSystemUpdateResponse></soapenv:Body></soapenv:Envelope>";
    if ($soapdata !== "") {
        $GetSystemUpdateResponse = $soapdata;
    }
    echo $GetSystemUpdateResponse;
} elseif ($SOAPAction === $SOAPAction_prefix . "GetSystemCommonETicket") {
    init_curl();
    initialize();
    $con = send_httprequest("https://nus.c.shop.nintendowifi.net/nus/services/NetUpdateSOAP");
    close_curl();
    echo $con;
} else {
    echo "Unrecognized SOAPAction header, it probably wasn't set correctly.";
}
