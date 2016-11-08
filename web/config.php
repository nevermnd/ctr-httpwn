<?php

if (isset($_SERVER['HTTPS']) && (strcasecmp($_SERVER['HTTPS'], 'on') === 0 || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strcasecmp($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') === 0
) {
    $http = 'https';
} else {
    $http = 'http';
}

$curUrl = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$curUrl = str_replace('config.php', 'NetUpdateSOAP.php', $curUrl);
$newUrl = "$http://$curUrl";
?>

<?xml version="1.0" encoding="UTF-8"?>
<config>

    <incompatsysver_message>The sysmodule version must be the one from system-version >=9.6.0-X.
    </incompatsysver_message>

    <targeturl>
        <!-- This is the URL used for doing the actual sysupdate check / getting the the list of sysupdate titles. -->
        <name>NetUpdateSOAP</name>
        <caps>SendPOSTDataRawTimeout</caps>
        <url>https://nus.c.shop.nintendowifi.net/nus/services/NetUpdateSOAP</url>
        <new_url><?= $newUrl ?></new_url>
    </targeturl>

    <targeturl>
        <name>nasc</name>
        <caps>AddRequestHeader AddPostDataAscii</caps>
        <url>https://nasc.nintendowifi.net/ac</url>

        <requestoverride type="reqheader">
            <name>User-Agent</name>
            <new_value>CTR FPD/0008</new_value>
        </requestoverride>

        <requestoverride type="postform">
            <name>fpdver</name>
            <new_value>MDAwOA**</new_value>
        </requestoverride>
    </targeturl>

    <targeturl> <!-- NNID -->
        <name>NNID</name>
        <caps>AddRequestHeader</caps>
        <url>https://account.nintendo.net/</url>

        <requestoverride type="reqheader">
            <id>3</id>
            <name>X-Nintendo-System-Version</name>
            <new_value>0230</new_value>
        </requestoverride>


        <!-- JPN eShop app titleID. -->
        <requestoverride type="reqheader">
            <id>16</id>
            <setid_onmatch>1</setid_onmatch>
            <name>X-Nintendo-Title-ID</name>
            <value>0004001000020900</value>
        </requestoverride>

        <!-- USA eShop app titleID. -->
        <requestoverride type="reqheader">
            <id>17</id>
            <setid_onmatch>1</setid_onmatch>
            <name>X-Nintendo-Title-ID</name>
            <value>0004001000021900</value>
        </requestoverride>

        <!-- EUR eShop app titleID. -->
        <requestoverride type="reqheader">
            <id>18</id>
            <setid_onmatch>1</setid_onmatch>
            <name>X-Nintendo-Title-ID</name>
            <value>0004001000022900</value>
        </requestoverride>

        <!-- JPN mint titleID. -->
        <requestoverride type="reqheader">
            <id>19</id>
            <setid_onmatch>1</setid_onmatch>
            <name>X-Nintendo-Title-ID</name>
            <value>000400300000C602</value>
        </requestoverride>

        <!-- USA mint titleID. -->
        <requestoverride type="reqheader">
            <id>20</id>
            <setid_onmatch>1</setid_onmatch>
            <name>X-Nintendo-Title-ID</name>
            <value>000400300000CE02</value>
        </requestoverride>

        <!-- EUR mint titleID. -->
        <requestoverride type="reqheader">
            <id>21</id>
            <setid_onmatch>1</setid_onmatch>
            <name>X-Nintendo-Title-ID</name>
            <value>000400300000D602</value>
        </requestoverride>

        <!-- JPN System Settings titleID. -->
        <requestoverride type="reqheader">
            <id>22</id>
            <setid_onmatch>1</setid_onmatch>
            <name>X-Nintendo-Title-ID</name>
            <value>0004001000020000</value>
        </requestoverride>

        <!-- USA System Settings titleID. -->
        <requestoverride type="reqheader">
            <id>23</id>
            <setid_onmatch>1</setid_onmatch>
            <name>X-Nintendo-Title-ID</name>
            <value>0004001000021000</value>
        </requestoverride>

        <!-- EUR System Settings titleID. -->
        <requestoverride type="reqheader">
            <id>24</id>
            <setid_onmatch>1</setid_onmatch>
            <name>X-Nintendo-Title-ID</name>
            <value>0004001000022000</value>
        </requestoverride>

        <!-- JPN System Transfer titleID. -->
        <requestoverride type="reqheader">
            <id>25</id>
            <setid_onmatch>1</setid_onmatch>
            <name>X-Nintendo-Title-ID</name>
            <value>0004001000020A00</value>
        </requestoverride>

        <!-- USA System Transfer titleID. -->
        <requestoverride type="reqheader">
            <id>26</id>
            <setid_onmatch>1</setid_onmatch>
            <name>X-Nintendo-Title-ID</name>
            <value>0004001000021A00</value>
        </requestoverride>

        <!-- EUR System Transfer titleID. -->
        <requestoverride type="reqheader">
            <id>27</id>
            <setid_onmatch>1</setid_onmatch>
            <name>X-Nintendo-Title-ID</name>
            <value>0004001000022A00</value>
        </requestoverride>

        <!-- JPN NNID Settings titleID. -->
        <requestoverride type="reqheader">
            <id>28</id>
            <setid_onmatch>1</setid_onmatch>
            <name>X-Nintendo-Title-ID</name>
            <value>000400100002BF00</value>
        </requestoverride>

        <!-- USA NNID Settings titleID. -->
        <requestoverride type="reqheader">
            <id>29</id>
            <setid_onmatch>1</setid_onmatch>
            <name>X-Nintendo-Title-ID</name>
            <value>000400100002C000</value>
        </requestoverride>

        <!-- EUR NNID Settings titleID. -->
        <requestoverride type="reqheader">
            <id>30</id>
            <setid_onmatch>1</setid_onmatch>
            <name>X-Nintendo-Title-ID</name>
            <value>000400100002C100</value>
        </requestoverride>

        <!-- Remaster version override for JPN eShop app. -->
        <requestoverride type="reqheader">
            <id>31</id>
            <required_id>16</required_id>
            <name>X-Nintendo-Application-Version</name>
            <new_value>0015</new_value>
        </requestoverride>

        <!-- Remaster version override for USA eShop app. -->
        <requestoverride type="reqheader">
            <id>32</id>
            <required_id>17</required_id>
            <name>X-Nintendo-Application-Version</name>
            <new_value>0015</new_value>
        </requestoverride>

        <!-- Remaster version override for EUR eShop app. -->
        <requestoverride type="reqheader">
            <id>33</id>
            <required_id>18</required_id>
            <name>X-Nintendo-Application-Version</name>
            <new_value>0016</new_value>
        </requestoverride>

        <!-- Remaster version override for JPN mint. -->
        <requestoverride type="reqheader">
            <id>34</id>
            <required_id>19</required_id>
            <name>X-Nintendo-Application-Version</name>
            <new_value>0010</new_value>
        </requestoverride>

        <!-- Remaster version override for USA mint. -->
        <requestoverride type="reqheader">
            <id>35</id>
            <required_id>20</required_id>
            <name>X-Nintendo-Application-Version</name>
            <new_value>0010</new_value>
        </requestoverride>

        <!-- Remaster version override for EUR mint. -->
        <requestoverride type="reqheader">
            <id>36</id>
            <required_id>21</required_id>
            <name>X-Nintendo-Application-Version</name>
            <new_value>0011</new_value>
        </requestoverride>

        <!-- Remaster version override for JPN System Settings. -->
        <requestoverride type="reqheader">
            <id>37</id>
            <required_id>22</required_id>
            <name>X-Nintendo-Application-Version</name>
            <new_value>000A</new_value>
        </requestoverride>

        <!-- Remaster version override for USA System Settings. -->
        <requestoverride type="reqheader">
            <id>38</id>
            <required_id>23</required_id>
            <name>X-Nintendo-Application-Version</name>
            <new_value>0009</new_value>
        </requestoverride>

        <!-- Remaster version override for EUR System Settings. -->
        <requestoverride type="reqheader">
            <id>39</id>
            <required_id>24</required_id>
            <name>X-Nintendo-Application-Version</name>
            <new_value>0009</new_value>
        </requestoverride>

        <!-- Remaster version override for JPN System Transfer. -->
        <requestoverride type="reqheader">
            <id>40</id>
            <required_id>25</required_id>
            <name>X-Nintendo-Application-Version</name>
            <new_value>0006</new_value>
        </requestoverride>

        <!-- Remaster version override for USA System Transfer. -->
        <requestoverride type="reqheader">
            <id>41</id>
            <required_id>26</required_id>
            <name>X-Nintendo-Application-Version</name>
            <new_value>0006</new_value>
        </requestoverride>

        <!-- Remaster version override for EUR System Transfer. -->
        <requestoverride type="reqheader">
            <id>42</id>
            <required_id>27</required_id>
            <name>X-Nintendo-Application-Version</name>
            <new_value>0006</new_value>
        </requestoverride>

        <!-- Remaster version override for JPN NNID Settings. -->
        <requestoverride type="reqheader">
            <id>43</id>
            <required_id>28</required_id>
            <name>X-Nintendo-Application-Version</name>
            <new_value>0003</new_value>
        </requestoverride>

        <!-- Remaster version override for USA NNID Settings. -->
        <requestoverride type="reqheader">
            <id>44</id>
            <required_id>29</required_id>
            <name>X-Nintendo-Application-Version</name>
            <new_value>0003</new_value>
        </requestoverride>

        <!-- Remaster version override for EUR NNID Settings. -->
        <requestoverride type="reqheader">
            <id>45</id>
            <required_id>30</required_id>
            <name>X-Nintendo-Application-Version</name>
            <new_value>0003</new_value>
        </requestoverride>
    </targeturl>
</config>

