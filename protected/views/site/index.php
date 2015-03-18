<h1>Локальный сервер компании Binet.pro</h1>

<h2>Локальные сервисы</h2>
<table class="table">
    <tr>
        <th>Redmine</th>
        <td>
            <a href="http://redmine.binet.loc" target="_blank">http://redmine.binet.loc <span class="glyphicon glyphicon-new-window"></span></a>
        </td>
    </tr>
    <tr>
        <th>PhpMyAdmin</th>
        <td>
            <a href="http://binet.loc/phpmyadmin/" target="_blank">http://binet.loc/phpmyadmin <span class="glyphicon glyphicon-new-window"></span></a>
        </td>
    </tr>
</table>
<script>
    $(function () {
        jQuery(document).ready(function () {
            jQuery.ajax({
                type: "GET",
                url: "http://ipgeobase.ru:7020/geo?ip=89.107.39.118",
                dataType: "xml",
                success: function (xml) {
                    jQuery(xml).find("ip").each(
                            function ()
                            {
                                var city = jQuery(this).find("city").text(),
                                        region = jQuery(this).find("region").text();
                                if (city != region) {
                                    ipg = city + ", " + region;
                                } else {
                                    ipg = city;
                                }
                                console.log(ipg);
                            });
                }
            });
        });
    });
</script>